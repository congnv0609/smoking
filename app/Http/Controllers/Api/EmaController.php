<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Ema1;
use App\Models\Ema2;
use App\Models\Ema3;
use App\Models\Ema4;
use App\Models\Ema5;
use App\Models\Incentive;
use DateInterval;
use DateTime;
use Illuminate\Support\Facades\DB;

class EmaController extends Controller
{

    private $accountId;

    public function __construct()
    {
        $this->accountId = request()->header('accountId');
    }

    /**
     * update an EMA and date values, use form url encoded
     * id [1=EMA1, 2=EMA2, 3=EMA3, 4=EMA4, 5=EMA5]
     * @header accountId integer required
     * @bodyParam date YYYY-MM-DD required 
     * @bodyParam completed integer [1=completed, default 0 incompleted]
     * @bodyParam time_taken integer taken time to do survey, maximum 15mins
     * @authenticated
     * 
     */
    public function update($id)
    {
        $data = request()->all();
        $data['submit_time'] = new DateTime();
        $ema = $this->getEma($id, $data);
        if (empty($ema)) {
            return response()->json(['msg' => 'Ema not found'], 404);
        }
        // $check = $this->checkValidTime($ema);
        // if ($check) {
        //     return response()->json(['msg' => 'Overdue'], 412);
        // }
        $ema->update($data);
        $this->updateIncentive($id, $data);
        return response()->json($ema, 200);
    }

    /**
     * set Attempt Time
     * id [1=EMA1, 2=EMA2, 3=EMA3, 4=EMA4, 5=EMA5]
     * @header accountId integer required
     * @bodyParam date YYYY-MM-DD required 
     * @authenticated
     * 
     */
    public function setAttemptTime($id)
    {
        $data['date'] = request()->input('date');
        $data['attempt_time'] = new DateTime();
        $ema = $this->getEma($id, $data);
        $ema->update($data);
        return response()->json($ema, 200);
    }

    /**
     * get next survey
     * @header accountId integer required
     * @authenticated
     */
    public function getNextSurvey()
    {
        $data = [];
        $data[] = $this->getPopupTimeEma1();
        $data[] = $this->getPopupTimeEma2();
        $data[] = $this->getPopupTimeEma3();
        $data[] = $this->getPopupTimeEma4();
        $data[] = $this->getPopupTimeEma5();
        foreach ($data as $value) {
            if (!empty($value)) {
                $delayMinutes = $this->getMinuteDelay($value);
                $next_popup_time = date_add(new Datetime($value->popup_time), date_interval_create_from_date_string("$delayMinutes minutes"));
                if ($next_popup_time > (new DateTime())) {
                    return response()->json(['next_survey_time' => date_format($next_popup_time, 'Y-m-d H:i'), 'popup_time' => $value->popup_time, 'postponded_1' => $value->postponded_1, 'postponded_2' => $value->postponded_2, 'postponded_3' => $value->postponded_3], 200);
                }
            }
        }
        return response()->json(['msg' => 'Not found next survey time'], 404);
    }

    private function getPopupTimeEma1()
    {
        return Ema1::select('popup_time', 'postponded_1', 'postponded_2', 'postponded_3')->where('account_id', $this->accountId)
            ->where('date', date_format(new DateTime(), 'Y-m-d'))
            ->first();
    }
    private function getPopupTimeEma2()
    {
        return Ema2::select('popup_time', 'postponded_1', 'postponded_2', 'postponded_3')->where('account_id', $this->accountId)
            ->where('date', date_format(new DateTime(), 'Y-m-d'))
            ->first();
    }
    private function getPopupTimeEma3()
    {
        return Ema3::select('popup_time', 'postponded_1', 'postponded_2', 'postponded_3')->where('account_id', $this->accountId)
            ->where('date', date_format(new DateTime(), 'Y-m-d'))
            ->first();
    }
    private function getPopupTimeEma4()
    {
        return Ema4::select('popup_time', 'postponded_1', 'postponded_2', 'postponded_3')->where('account_id', $this->accountId)
            ->where('date', date_format(new DateTime(), 'Y-m-d'))
            ->first();
    }
    private function getPopupTimeEma5()
    {
        return Ema5::select('popup_time', 'postponded_1', 'postponded_2', 'postponded_3')->where('account_id', $this->accountId)
            ->where('date', date_format(new DateTime(), 'Y-m-d'))
            ->first();
    }

    private function getEma(int $id, array $data)
    {
        switch ($id) {
            case 1:
                $ema = Ema1::where(['account_id' => $this->accountId, 'date' => $data['date']])->first();
                break;
            case 2:
                $ema = Ema2::where(['account_id' => $this->accountId, 'date' => $data['date']])->first();
                break;
            case 3:
                $ema = Ema3::where(['account_id' => $this->accountId, 'date' => $data['date']])->first();
                break;
            case 4:
                $ema = Ema4::where(['account_id' => $this->accountId, 'date' => $data['date']])->first();
                break;
            case 5:
                $ema = Ema5::where(['account_id' => $this->accountId, 'date' => $data['date']])->first();
                break;
        }
        return $ema;
    }

    private function updateIncentive(int $emaId, array $data)
    {
        $ret = [];
        $data['completed'] = !empty($data['completed']) ? $data['completed'] : 0;
        $incentive = Incentive::where(['account_id' => $this->accountId, 'date' => $data['date']])->first();
        $ema = "ema_$emaId";
        $incentive->{$ema} = $data["completed"];
        $incentive->valid_ema = $incentive->ema_1 + $incentive->ema_2 + $incentive->ema_3 + $incentive->ema_4 + $incentive->ema_5;
        $incentive->incentive = $incentive->valid_ema * 5;
        return $incentive->save();
    }

    private function getMinuteDelay($ema)
    {
        if ($ema->postponded_3) {
            return 30;
        } elseif ($ema->postponded_2) {
            return 15;
        } elseif ($ema->postponded_1) {
            return 5;
        }
        return 0;
    }

    // private function checkValidTime($ema)
    // {
    //     $takenTime = date_diff(new DateTime(), $ema->attempt_time)->format('%i');
    //     if ($takenTime > 15) {
    //         return true;
    //     }
    //     return false;
    // }
}

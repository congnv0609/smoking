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
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class EmaController extends Controller
{

    private $accountId;

    const DO_TIME = 15;

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
        $data['popup_time'] = $ema->popup_time;
        $this->updatePopupTime($data);
        $ema->update($data);
        Cache::forget('ema:schedule');
        Artisan::call('ema:get-schedule');
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
    public function getSurvey()
    {
        $data = [];
        $data[] = $this->getPopupTimeEma1();
        $data[] = $this->getPopupTimeEma2();
        $data[] = $this->getPopupTimeEma3();
        $data[] = $this->getPopupTimeEma4();
        $data[] = $this->getPopupTimeEma5();
        foreach ($data as $key => $value) {
            if (!empty($value)) {
                // $delayMinutes = $this->getMinuteDelay($value);
                // $endMinutes = $delayMinutes+15;
                // $popup_time = date_add(new Datetime($value->popup_time), date_interval_create_from_date_string("$delayMinutes minutes"));
                $popup_time = new Datetime($value->popup_time);
                // $end_time = date_add(new Datetime($value->popup_time), date_interval_create_from_date_string("$endMinutes minutes"));
                $end_time = date_add(new Datetime($value->popup_time), date_interval_create_from_date_string(self::DO_TIME . "minutes"));
                $current_ema = (new DateTime() > new DateTime($value->popup_time) && new DateTime() <= $end_time) ? 1 : 0;
                if ($end_time > (new DateTime())) {
                    return response()->json(['survey_time' => date_format($popup_time, 'Y-m-d H:i'), 'current_ema' => $current_ema, 'ema' => $key + 1, 'popup_time' => $value->popup_time, 'nth_day' => $value->nth_day, 'postponded_1' => $value->postponded_1, 'postponded_2' => $value->postponded_2, 'postponded_3' => $value->postponded_3], 200);
                }
            }
        }
        return response()->json(['msg' => 'Not found next survey time'], 404);
    }

    private function getPopupTimeEma1()
    {
        return Ema1::select('popup_time', 'nth_day', 'postponded_1', 'postponded_2')->where('account_id', $this->accountId)
            ->where('date', '>=', date_format(new DateTime(), 'Y-m-d'))
            ->first();
    }
    private function getPopupTimeEma2()
    {
        return Ema2::select('popup_time', 'nth_day', 'postponded_1', 'postponded_2')->where('account_id', $this->accountId)
            ->where('date', '>=', date_format(new DateTime(), 'Y-m-d'))
            ->first();
    }
    private function getPopupTimeEma3()
    {
        return Ema3::select('popup_time', 'nth_day', 'postponded_1', 'postponded_2')->where('account_id', $this->accountId)
            ->where('date', '>=', date_format(new DateTime(), 'Y-m-d'))
            ->first();
    }
    private function getPopupTimeEma4()
    {
        return Ema4::select('popup_time', 'nth_day', 'postponded_1', 'postponded_2')->where('account_id', $this->accountId)
            ->where('date', '>=', date_format(new DateTime(), 'Y-m-d'))
            ->first();
    }
    private function getPopupTimeEma5()
    {
        return Ema5::select('popup_time', 'nth_day', 'postponded_1', 'postponded_2')->where('account_id', $this->accountId)
            ->where('date', '>=', date_format(new DateTime(), 'Y-m-d'))
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

    private function getMinuteDelay($postponded)
    {
        if ($postponded) {
            return 30;
        } elseif ($postponded) {
            return 15;
        } elseif ($postponded) {
            return 5;
        }
        return 0;
    }

    private function updatePopupTime(&$data)
    {
        if (isset($data['postponded_1'])) {
            $delayMinutes = $this->getMinuteDelay($data['postponded_1']);
            if ($delayMinutes > 0) {
                $data['popup_time'] = date_format(date_add(date_create($data['popup_time']), date_interval_create_from_date_string("$delayMinutes minutes")), 'Y-m-d H:i:s');
            }
        }
        if (isset($data['postponded_2'])) {
            $delayMinutes = $this->getMinuteDelay($data['postponded_2']);
            if ($delayMinutes > 0) {
                $data['popup_time'] = date_format(date_add(date_create($data['popup_time']), date_interval_create_from_date_string("$delayMinutes minutes")), 'Y-m-d H:i:s');
            }
        }
        // if (isset($data['postponded_3'])) {
        //     $delayMinutes = $this->getMinuteDelay($data['postponded_3']);
        //     if ($delayMinutes > 0) {
        //         $data['popup_time'] = date_format(date_add(date_create($data['popup_time']), date_interval_create_from_date_string("$delayMinutes minutes")), 'Y-m-d H:i:s');
        //     }
        // }
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

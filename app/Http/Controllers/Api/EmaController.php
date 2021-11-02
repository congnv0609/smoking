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
     * @authenticated
     * 
     */
    public function update($id)
    {
        $data = request()->all();
        // $data['attempt_time'] = new DateTime();
        $data['submit_time'] = new DateTime();
        // $data['submit_time'] = (new DateTime())->add(new DateInterval('PT5M'));
        // $data['time_taken'] = 5;
        switch ($id) {
            case 1:
                $ema = Ema1::where(['account_id' => $this->accountId, 'date' => $data['date']])->first();
                $ema->update($data);
                break;
            case 2:
                $ema = Ema2::where(['account_id' => $this->accountId, 'date' => $data['date']])->first();
                $ema->update($data);
                break;
            case 3:
                $ema = Ema3::where(['account_id' => $this->accountId, 'date' => $data['date']])->first();
                $ema->update($data);
                break;
            case 4:
                $ema = Ema4::where(['account_id' => $this->accountId, 'date' => $data['date']])->first();
                $ema->update($data);
                break;
            case 5:
                $ema = Ema5::where(['account_id' => $this->accountId, 'date' => $data['date']])->first();
                $ema->update($data);
                break;
        }
        $this->updateIncentive($id, $data);
        return response()->json($ema,200);
    }

    private function updateIncentive(int $emaId, array $data) {
        $ret = [];
        $incentive = Incentive::where(['account_id' => $this->accountId, 'date' => $data['date']])->first();
        $validEma = $incentive->valid_ema + ($data['completed'] > 0 ? 1 : -1);
        $ret["valid_ema"] = $validEma;
        $ret["incentive"] = $validEma * 5;
        $ret["ema_$emaId"] = $data["completed"];
        return $incentive->update($ret);
    }
}

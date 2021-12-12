<?php

namespace App\Http\Controllers\Api;

use App\Models\Incentive;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Ema1;
use App\Models\Ema2;
use App\Models\Ema3;
use App\Models\Ema4;
use App\Models\Ema5;
use Illuminate\Support\Arr;

class IncentiveController extends Controller
{
    private $accountId;

    public function __construct()
    {
        $this->accountId = request()->header('accountId');
    }

    /**
     * Finished survey
     * @authenticated
     * @header accountId integer required
     * 
     */
    public function finished(){
        $data = [];
        // $data = Incentive::select('date','valid_ema', 'updated_at')->where('account_id', $this->accountId)->get();
        $ema1 = Ema1::select('account_id', 'date', 'nth_day', 'nth_ema', 'submit_time', 'completed')->where([['completed', true],['account_id', $this->accountId]])->get();
        $ema2 = Ema2::select('account_id', 'date', 'nth_day', 'nth_ema', 'submit_time', 'completed')->where([['completed', true],['account_id', $this->accountId]])->get();
        $ema3 = Ema3::select('account_id', 'date', 'nth_day', 'nth_ema', 'submit_time', 'completed')->where([['completed', true],['account_id', $this->accountId]])->get();
        $ema4 = Ema4::select('account_id', 'date', 'nth_day', 'nth_ema', 'submit_time', 'completed')->where([['completed', true],['account_id', $this->accountId]])->get();
        $ema5 = Ema5::select('account_id', 'date', 'nth_day', 'nth_ema', 'submit_time', 'completed')->where([['completed', true],['account_id', $this->accountId]])->get();
        if(!empty($ema1)) {
            $data[]=$ema1->toArray();
        }
        if (!empty($ema2)) {
            $data[] = $ema2->toArray();
        }
        if (!empty($ema3)) {
            $data[] = $ema3->toArray();
        }
        if (!empty($ema4)) {
            $data[] = $ema4->toArray();
        }
        if (!empty($ema5)) {
            $data[] = $ema5->toArray();
        }
        $data = Arr::collapse($data);
        $data = collect($data)->sortBy('nth_day')->toArray();
        $data = array_values($data);
        return response()->json($data, 200);
    }

    /**
     * Progress
     * @authenticated
     * @header accountId integer required
     * 
     */
    public function progress()
    {
        # code...
        $sum = Incentive::selectRaw('TRUNCATE(sum(valid_ema)/35*100,1) as percent_finished')->where('account_id', $this->accountId)->first();
        return response()->json($sum, 200);
    }

}

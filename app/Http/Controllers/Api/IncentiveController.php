<?php

namespace App\Http\Controllers\Api;

use App\Models\Incentive;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        $data = Incentive::select('date','valid_ema', 'updated_at')->where('account_id', $this->accountId)->get();
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

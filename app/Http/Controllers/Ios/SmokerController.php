<?php

namespace App\Http\Controllers\Ios;

use App\Http\Controllers\Controller;
use App\Models\Smoker;

class SmokerController extends Controller
{
    private $accountId;

    public function __construct()
    {
        $this->accountId = request()->header('accountId');
    }

    /**
     * Get schedule for an account
     * 
     * @header Content-Type application/json
     * @header Accept application/json
     * @header accountId integer
     * @authenticated
     */
    public function getSchedule()
    {
        $smoker = Smoker::where('id', $this->accountId)->first();

        return response()->json(['data' => $smoker], 200);
    }

    /**
     * Post schedule for an account
     * 
     * @header Content-Type application/json
     * @header Accept application/json
     * @header accountId integer
     * @authenticated
     * 
     * @bodyParam startDate string required YYYY-MM-DD
     * @bodyParam startTime string required hh:ii
     */
    public function postSchedule()
    {
        $smoker = Smoker::where('id', $this->accountId)->first();

        $date = request()->input('startDate');
        $time = request()->input('startTime');
        $strDateTime = sprintf("%s %s", $date, $time);
        $strDateTime = date_create($strDateTime);
        $startDateTime = date_format($strDateTime, "Y-m-d h:i");
        $endTime = date_add($strDateTime, date_interval_create_from_date_string("7 days"));
        $endDateTime = date_format($endTime, "Y-m-d h:i");
        $smoker->startDate = $startDateTime;
        $smoker->endDate = $endDateTime;
        $smoker->save();
        return response()->json(['data' => $smoker], 200);
    }

    /**
     * Update schedule for an account
     * 
     * @header Content-Type application/json
     * @header Accept application/json
     * @header accountId integer
     * @authenticated
     * 
     * @bodyParam startDate string required YYYY-MM-DD
     * @bodyParam startTime string required hh:ii
     */
    public function updateSchedule()
    {
        $smoker = Smoker::where('id', $this->accountId)->first();

        $date = request()->input('startDate');
        $time = request()->input('startTime');
        $strDateTime = sprintf("%s %s", $date, $time);
        $strDateTime = date_create($strDateTime);
        $startDateTime = date_format($strDateTime, "Y-m-d h:i");
        $endTime = date_add($strDateTime, date_interval_create_from_date_string("7 days"));
        $endDateTime = date_format($endTime, "Y-m-d h:i");
        $smoker->startDate = $startDateTime;
        $smoker->endDate = $endDateTime;
        $smoker->save();
        return response()->json(['data' => $smoker], 200);
    }
}

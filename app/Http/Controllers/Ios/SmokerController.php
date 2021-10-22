<?php

namespace App\Http\Controllers\Ios;

use App\Http\Controllers\Controller;
use App\Models\Smoker;
use App\Models\WakeTime;

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
        if (empty($smoker)) {
            return response()->json($smoker, 404);
        }
        return response()->json($smoker, 200);
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
     * @bodyParam notification integer default 1
     */
    public function postSchedule()
    {
        $data = $this->getParams();
        $smoker = Smoker::where("id", $this->accountId)->first();
        if (empty($smoker)) {
            return response()->json($smoker, 404);
        }
        $smoker->startDate = $data["startDate"];
        $smoker->endDate = $data["endDate"];
        $smoker->save();
        return response()->json($smoker, 200);
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
     * @bodyParam notification integer default 1
     */
    public function updateSchedule()
    {
        $data = $this->getParams();
        $smoker = Smoker::where('id', $this->accountId)->first();
        if (empty($smoker)) {
            return response()->json($smoker, 404);
        }
        $this->logChange($smoker, $data);
        $smoker->update($data);

        return response()->json($smoker, 200);
    }

    private function logChange($old, $new)
    {
        $data = [
            'account_id' => $old->id,
            'data_of_change' => !empty($old->startDate) ? date_format($old->startDate, "Y-m-d") : null,
            'old_wake' => !empty($old->startDate) ? date_format($old->startDate, "H:i") : null,
            'new_wake' => date_format(date_create($new["startDate"]), "H:i"),
        ];
        $wakeLog = WakeTime::create($data);
    }

    private function getParams()
    {
        $data = [];
        $date = request()->input('startDate');
        $time = request()->input('startTime');
        $notification = request()->input('notification');
        $strDateTime = sprintf("%s %s", $date, $time);
        $strDateTime = date_create($strDateTime);
        $startDateTime = date_format($strDateTime, "Y-m-d H:i");
        $endTime = date_add($strDateTime, date_interval_create_from_date_string("7 days"));
        $endDateTime = date_format($endTime, "Y-m-d H:i");
        $data['startDate'] = $startDateTime;
        $data['endDate'] = $endDateTime;
        $data['notification'] = $notification;
        return $data;
    }
}

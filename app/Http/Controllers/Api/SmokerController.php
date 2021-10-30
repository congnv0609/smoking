<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Incentive;
use App\Models\Smoker;
use App\Models\WakeTime;
use Illuminate\Http\Request;

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
        // DB::transaction(
        //     function () {
                $smoker = Smoker::where("id", $this->accountId)->first();
                if (empty($smoker)) {
                    return response()->json($smoker, 404);
                }
                if (empty($data)) {
                    return response()->json(['msg' => 'Nothing to update'], 200);
                }
                $smoker->startDate = $data["startDate"];
                $smoker->endDate = $data["endDate"];
                $smoker->save();
                $smokerData = $this->makeDateArray($data['startDate']);
                $this->createData($smokerData);
                return response()->json($smoker, 200);
        //     }
        // );
        // return response()->json($data, 400);
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
    public function updateSchedule(Request $request)
    {
        $data = $this->getParams();
        // DB::transaction(
        //     function () {
        $smoker = Smoker::where('id', $this->accountId)->first();
        if (empty($smoker)) {
            return response()->json($smoker, 404);
        }
        if (empty($data)) {
            return response()->json(['msg' => 'Nothing to update'], 200);
        }
        $this->logChange($smoker, $data);
        $smoker->update($data);
        $smokerData = $this->makeDateArray($data['startDate']);
        $this->updateData($smokerData);
        return response()->json($smoker, 200);
        //     }
        // );
        // return response()->json($data, 400);
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
        if (!empty($startDateTime)) {
            $data['startDate'] = $startDateTime;
        }
        if (!empty($endDateTime)) {
            $data['endDate'] = $endDateTime;
        }
        if (!empty($notification)) {
            $data['notification'] = $notification;
        }

        return $data;
    }

    private function makeDateArray($startDate)
    {
        $data = [];
        $dateString = date_create($startDate);
        for ($i = 0; $i < 7; $i++) {
            $record = [];
            $record['account_id'] = $this->accountId;
            $record['date'] = $i > 0 ? date_format(date_add($dateString, date_interval_create_from_date_string("1 days")), 'Y-m-d') : date_format($dateString, 'Y-m-d');
            $data[] = $record;
        }
        return $data;
    }

    private function createData($data)
    {
        if (!empty($data)) {
            foreach ($data as $item) {
                Incentive::create($item);
            }
        }
    }

    private function updateData($data)
    {
        if (!empty($data)) {
            $oldData = Incentive::where('account_id', $this->accountId)->get();
            foreach($oldData as $key => $item) {
                $item->update($data[$key]);
            }
        }
    }
}

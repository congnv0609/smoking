<?php

namespace App\Http\Controllers\Cms;
use App\Http\Controllers\Controller;
use App\Models\Smoker;


class SmokerController extends Controller
{

    /**
     * Get schedule for an account
     * 
     * @header Content-Type application/json
     * @header Accept application/json
     * @header accountId integer
     * @authenticated
     * 
     */
    public function getSchedule()
    {
        $smoker = Smoker::where('id', $this->accountId)->first();

        return response()->json($smoker, 200);
    }

    /**
     * Post schedule for an account
     * 
     * @header Content-Type application/json
     * @header Accept application/json
     * @authenticated
     * 
     * @bodyParam startDate string required YYYY-MM-DD
     * @bodyParam startTime string required hh:ii
     * @bodyParam notification integer default 1
     */
    public function postSchedule()
    {
        $data = $this->getPrams();
        $smoker = Smoker::where('id', $this->accountId)->first();

        $smoker->update($data);
        return response()->json($smoker, 200);
    }

    private function getPrams()
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

    /**
     * List of smokers
     */
    public function list() {
        $size = request()->input('size');
        $list = Smoker::paginate($size)->withQueryString();
        return response()->json($list, 200);
    }

    /**
     * Detail of smoker
     * @authenticated
     */
    public function detail($id)
    {
        # code...
        $smoker = Smoker::find($id);
        return response()->json($smoker, 200);
    }

    /**
     * Update schedule for an account
     * 
     * @header Content-Type application/json
     * @header Accept application/json
     * @authenticated
     * 
     * @bodyParam startDate string required YYYY-MM-DD
     * @bodyParam startTime string required hh:ii
     * @bodyParam notification integer default 1
     */
    public function updateSchedule($id)
    {
        $smoker = Smoker::find($id);

        $date = request()->input('startDate');
        $time = request()->input('startTime');
        $strDateTime = sprintf("%s %s", $date, $time);
        $strDateTime = date_create($strDateTime);
        $startDateTime = date_format($strDateTime, "Y-m-d H:i");
        $endTime = date_add($strDateTime, date_interval_create_from_date_string("7 days"));
        $endDateTime = date_format($endTime, "Y-m-d H:i");
        $smoker->startDate = $startDateTime;
        $smoker->endDate = $endDateTime;
        $smoker->save();
        return response()->json($smoker, 200);
    }

}

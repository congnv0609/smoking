<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Http\Traits\ReportTrait;
use App\Models\Ema1;
use App\Models\Smoker;
use App\Models\Survey;

class SmokerController extends Controller
{
    use ReportTrait;

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
        $data = $this->getParams();
        $smoker = Smoker::where('id', $this->accountId)->first();

        $smoker->update($data);
        return response()->json($smoker, 200);
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

    /**
     * List of smokers
     * @authenticated
     * @queryParam page integer page number
     * @queryParam size integer number of row per page
     */
    public function list()
    {
        $list = [];
        $size = request()->input('size');
        $query = request()->query();
        $account = $query['account']??null;
        $sort = explode(',', $query['sort']);
        $list = Survey::where(function ($con) use ($account) {
            if(!empty($account)) {
                $con->where('account', 'like', $account);
            }
        })->orderBy($sort[0], $sort[1])->orderBy('nth_day_current', 'asc')->paginate($size)->withQueryString();
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

    /**
     * Get overview personal description
     * 
     */
    public function overview($accountId){
        $data = [];
        $data = $this->getOverviewData($accountId);
        if(!empty($data)) {
            return response()->json($data,200);
        }
        return response()->json($data, 404);
    }

}

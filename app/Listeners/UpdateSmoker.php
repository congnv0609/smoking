<?php

namespace App\Listeners;

use App\Events\SmokerProcessed;
use App\Models\Ema1;
use App\Models\Incentive;
use App\Models\Smoker;
use DateTime;

class UpdateSmoker
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  SmokerProcessed  $event
     * @return void
     */
    public function handle(SmokerProcessed $event)
    {
        // $date = date_format(new DateTime(), 'Y-m-d');
        // $userList = Smoker::where(['startDate', '<=', $date], ['endDate', '>=', $date])->get();
        // if (!empty($userList)) {
        //     foreach ($userList as $key => $value) {
        //         $data = [];
        //         $ema = Ema1::where(['date', $date], ['account_id', $value->id])->first();
        //         $incentive = Incentive::where(['date', $date], ['account_id', $value->id])->first();
        //         $incentive_total = Incentive::where(['account_id', $value->id], ['date', $date])->sum('incentive');
        //         // $data['id'] = $ema->account_id;
        //         $data['nth_day'] = $ema->nth_day;
        //         $data['ema_completed_nth_day'] = $incentive->valid_ema;
        //         $data['incentive_nth_day'] = $incentive->incentive;
        //         $data['incentive_total'] = $incentive_total;
        //         $value->update($data);
        //     }
        // }

        // $data['incentive_total'] = $incentive->incentive_total;
    }
}

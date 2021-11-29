<?php

namespace App\Console\Commands;

use App\Models\Ema1;
use App\Models\Incentive;
use App\Models\Smoker;
use DateTime;
use Illuminate\Console\Command;

class UpdateSmokerCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'smoker:update-info';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update smoker information';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // return Command::SUCCESS;
        $date = date_format(new DateTime(), 'Y-m-d');
        $userList = Smoker::where([['startDate', '<=', $date], ['endDate', '>=', $date]])->get();
        if (!empty($userList)) {
            foreach ($userList as $key => $value) {
                $ema = Ema1::where([['date', $date], ['account_id', $value->id]])->first();
                $incentive = Incentive::where([['date', $date], ['account_id', $value->id]])->first();
                $incentive_total = Incentive::where([['account_id', $value->id], ['incentive', '>=', '15']])->sum('incentive');
                $value->nth_day_current = $ema->nth_day;
                $value->ema_completed_nth_day = $incentive->valid_ema;
                $value->incentive_nth_day = $incentive->incentive >= 15 ? $incentive->incentive : 0;
                $value->incentive_total = (int)$incentive_total;
                $value->save();
            }
        }
    }
}

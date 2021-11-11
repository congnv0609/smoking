<?php

namespace App\Console\Commands;

use App\Models\Ema1;
use App\Models\Ema2;
use App\Models\Ema3;
use App\Models\Ema4;
use App\Models\Ema5;
use DateTime;
use Illuminate\Console\Command;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cache;

class GetEmaSchedule extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ema:get-schedule';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Getting all ema need to push notification';

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
        $this->getEmaSchedule();
    }

    private function getEmaSchedule(){
        $data = [];
        $data[] = $this->getEma1()->toArray();
        $data[] = $this->getEma2()->toArray();
        $data[] = $this->getEma3()->toArray();
        $data[] = $this->getEma4()->toArray();
        $data[] = $this->getEma5()->toArray();
        // $data = Arr::collapse($ema1, $ema2, $ema3, $ema4, $ema5);
        $data = Arr::collapse($data);
        Cache::put('ema:schedule', $data, 60*60*24);
        //put to queue
        // return $data;
    }

    private function getEma1(){
        $data = [];
        $date = date_format(new DateTime(), 'Y-m-d');
        $data = Ema1::select('id', 'account_id', 'date', 'popup_time', 'postponded_1', 'postponded_2')->where('date', $date)->get();
        return $data;
    }

    private function getEma2()
    {
        $data = [];
        $date = date_format(new DateTime(), 'Y-m-d');
        $data = Ema2::select('id', 'account_id', 'date', 'popup_time', 'postponded_1', 'postponded_2')->where('date', $date)->get();
        return $data;
    }

    private function getEma3()
    {
        $data = [];
        $date = date_format(new DateTime(), 'Y-m-d');
        $data = Ema3::select('id', 'account_id', 'date', 'popup_time', 'postponded_1', 'postponded_2')->where('date', $date)->get();
        return $data;
    }

    private function getEma4()
    {
        $data = [];
        $date = date_format(new DateTime(), 'Y-m-d');
        $data = Ema4::select('id', 'account_id', 'date', 'popup_time', 'postponded_1', 'postponded_2')->where('date', $date)->get();
        return $data;
    }

    private function getEma5()
    {
        $data = [];
        $date = date_format(new DateTime(), 'Y-m-d');
        $data = Ema5::select('id', 'account_id', 'date', 'popup_time', 'postponded_1', 'postponded_2')->where('date', $date)->get();
        return $data;
    }

}

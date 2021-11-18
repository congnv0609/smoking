<?php

namespace App\Http\Traits;

use App\Models\Ema1;
use App\Models\Ema2;
use App\Models\Ema3;
use App\Models\Ema4;
use App\Models\Ema5;
use DateTime;
use Illuminate\Support\Arr;

trait EmaTrait {

    public function getEmaSchedule(){
        $data = [];
        $data[] = $this->getEma1()->toArray();
        $data[] = $this->getEma2()->toArray();
        $data[] = $this->getEma3()->toArray();
        $data[] = $this->getEma4()->toArray();
        $data[] = $this->getEma5()->toArray();
        $data = Arr::collapse($data);
        return $data;
    }

    private function getEma1()
    {
        $data = [];
        $date = date_format(new DateTime(), 'Y-m-d');
        $data = Ema1::select('id', 'account_id', 'date', 'nth_popup', 'popup_time', 'popup_time1', 'popup_time2', 'postponded_1', 'postponded_2', 'postponded_3')->where('date', $date)->get();
        return $data;
    }

    private function getEma2()
    {
        $data = [];
        $date = date_format(new DateTime(), 'Y-m-d');
        $data = Ema2::select('id', 'account_id', 'date', 'nth_popup', 'popup_time', 'popup_time1', 'popup_time2', 'postponded_1', 'postponded_2', 'postponded_3')->where('date', $date)->get();
        return $data;
    }

    private function getEma3()
    {
        $data = [];
        $date = date_format(new DateTime(), 'Y-m-d');
        $data = Ema3::select('id', 'account_id', 'date', 'nth_popup', 'popup_time', 'popup_time1', 'popup_time2', 'postponded_1', 'postponded_2', 'postponded_3')->where('date', $date)->get();
        return $data;
    }

    private function getEma4()
    {
        $data = [];
        $date = date_format(new DateTime(), 'Y-m-d');
        $data = Ema4::select('id', 'account_id', 'date', 'nth_popup', 'popup_time', 'popup_time1', 'popup_time2', 'postponded_1', 'postponded_2', 'postponded_3')->where('date', $date)->get();
        return $data;
    }

    private function getEma5()
    {
        $data = [];
        $date = date_format(new DateTime(), 'Y-m-d');
        $data = Ema5::select('id', 'account_id', 'date', 'nth_popup', 'popup_time', 'popup_time1', 'popup_time2', 'postponded_1', 'postponded_2', 'postponded_3')->where('date', $date)->get();
        return $data;
    }

    private function getEma(int $id, array $data)
    {
        switch ($id) {
            case 1:
                $ema = Ema1::where(['account_id' => $data['account_id'], 'date' => $data['date']])->first();
                break;
            case 2:
                $ema = Ema2::where(['account_id' => $data['account_id'], 'date' => $data['date']])->first();
                break;
            case 3:
                $ema = Ema3::where(['account_id' => $data['account_id'], 'date' => $data['date']])->first();
                break;
            case 4:
                $ema = Ema4::where(['account_id' => $data['account_id'], 'date' => $data['date']])->first();
                break;
            case 5:
                $ema = Ema5::where(['account_id' => $data['account_id'], 'date' => $data['date']])->first();
                break;
        }
        return $ema;
    }

}
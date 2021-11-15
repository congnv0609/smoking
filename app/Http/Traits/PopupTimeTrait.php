<?php

namespace App\Http\Traits;

use App\Models\Ema1;
use App\Models\Ema2;
use App\Models\Ema3;
use App\Models\Ema4;
use App\Models\Ema5;
use DateTime;
use stdClass;

trait PopupTimeTrait {

    public function getPopupTime(){
        $data = [];
        $data[] = $this->getPopupTimeEma1();
        $data[] = $this->getPopupTimeEma2();
        $data[] = $this->getPopupTimeEma3();
        $data[] = $this->getPopupTimeEma4();
        $data[] = $this->getPopupTimeEma5();
        $curEma = new stdClass();
        foreach ($data as $key => $value) {
            if (!empty($value)) {
                $end_time = date_add(new Datetime($value->popup_time), date_interval_create_from_date_string("15 minutes"));
                $current_ema = (new DateTime() > new DateTime($value->popup_time) && new DateTime() <= $end_time) ? 1 : 0;
                if ($end_time > (new DateTime())) {
                    $curEma = $value;
                    $curEma->end_time = $end_time;
                    $curEma->current_ema = $current_ema;
                    $curEma->ema = $key+1;
                    return $curEma;
                }
            }
        }
    }

    private function getPopupTimeEma1()
    {
        return Ema1::select('popup_time', 'nth_day', 'postponded_1', 'postponded_2', 'postponded_3')->where('account_id', $this->accountId)
            ->where('date', '>=', date_format(new DateTime(), 'Y-m-d'))
            ->first();
    }
    private function getPopupTimeEma2()
    {
        return Ema2::select('popup_time', 'nth_day', 'postponded_1', 'postponded_2', 'postponded_3')->where('account_id', $this->accountId)
            ->where('date', '>=', date_format(new DateTime(), 'Y-m-d'))
            ->first();
    }
    private function getPopupTimeEma3()
    {
        return Ema3::select('popup_time', 'nth_day', 'postponded_1', 'postponded_2', 'postponded_3')->where('account_id', $this->accountId)
            ->where('date', '>=', date_format(new DateTime(), 'Y-m-d'))
            ->first();
    }
    private function getPopupTimeEma4()
    {
        return Ema4::select('popup_time', 'nth_day', 'postponded_1', 'postponded_2', 'postponded_3')->where('account_id', $this->accountId)
            ->where('date', '>=', date_format(new DateTime(), 'Y-m-d'))
            ->first();
    }
    private function getPopupTimeEma5()
    {
        return Ema5::select('popup_time', 'nth_day', 'postponded_1', 'postponded_2', 'postponded_3')->where('account_id', $this->accountId)
            ->where('date', '>=', date_format(new DateTime(), 'Y-m-d'))
            ->first();
    }
}
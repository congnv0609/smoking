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

    public function updateCountPush($ema) {
        $ema->nth_push = $ema->nth_push+1;
        $ema->save();
    }

    public function getPopupTime($accountId){
        $data = [];
        $data[] = $this->getPopupTimeEma1($accountId);
        $data[] = $this->getPopupTimeEma2($accountId);
        $data[] = $this->getPopupTimeEma3($accountId);
        $data[] = $this->getPopupTimeEma4($accountId);
        $data[] = $this->getPopupTimeEma5($accountId);
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

    public function getPromptMessage($ema)
    {
        $postponded_1 = $ema->postponded_1;
        $postponded_2 = $ema->postponded_2;
        if ($postponded_2 > 0) {
            switch ($postponded_2) {
                case 1: {
                        $title = "2nd Reminder alert";
                        $msg = "吸煙雷達邀請你做問卷了！放棄填寫會損失是次現金禮券";
                        break;
                    }
                case 2: {
                        $title = "2nd Reminder alert";
                        $msg = "吸煙雷達邀請你做問卷了！放棄填寫會損失是次現金禮券";
                        break;
                    }
                case 3: {
                        $title = "2nd Reminder alert";
                        $msg = "吸煙雷達邀請你做問卷了！放棄填寫會損失是次現金禮券";
                        break;
                    }
            }
            return ['title' => $title, 'body' => $msg];
        } else {
            $title = "2nd Reminder alert";
            $msg = "最後一次機會做這份問卷！放棄填寫會損失是次現金禮券!";
        }
        if ($postponded_1 > 0) {
            switch ($postponded_1) {
                case 1: {
                        $title = "1st Reminder alert";
                        $msg = "吸煙雷達邀請你做問卷了！放棄填寫會損失是次現金禮券";
                        break;
                    }
                case 2: {
                        $title = "1st Reminder alert";
                        $msg = "吸煙雷達邀請你做問卷了！放棄填寫會損失是次現金禮券";
                        break;
                    }
                case 3: {
                        $title = "1st Reminder alert";
                        $msg = "吸煙雷達邀請你做問卷了！放棄填寫會損失是次現金禮券";
                        break;
                    }
            }
            return ['title' => $title, 'body' => $msg];
        } else {
            $title = "1st Reminder alert";
            $msg = "吸煙雷達邀請你做問卷了";
        }
        return ['title' => $title, 'body' => $msg];
    }

    private function getPopupTimeEma1($accountId)
    {
        return Ema1::select('popup_time', 'nth_day', 'postponded_1', 'postponded_2', 'postponded_3')->where('account_id', $accountId)
            ->where('date', '>=', date_format(new DateTime(), 'Y-m-d'))
            ->first();
    }
    private function getPopupTimeEma2($accountId)
    {
        return Ema2::select('popup_time', 'nth_day', 'postponded_1', 'postponded_2', 'postponded_3')->where('account_id', $accountId)
            ->where('date', '>=', date_format(new DateTime(), 'Y-m-d'))
            ->first();
    }
    private function getPopupTimeEma3($accountId)
    {
        return Ema3::select('popup_time', 'nth_day', 'postponded_1', 'postponded_2', 'postponded_3')->where('account_id', $accountId)
            ->where('date', '>=', date_format(new DateTime(), 'Y-m-d'))
            ->first();
    }
    private function getPopupTimeEma4($accountId)
    {
        return Ema4::select('popup_time', 'nth_day', 'postponded_1', 'postponded_2', 'postponded_3')->where('account_id', $accountId)
            ->where('date', '>=', date_format(new DateTime(), 'Y-m-d'))
            ->first();
    }
    private function getPopupTimeEma5($accountId)
    {
        return Ema5::select('popup_time', 'nth_day', 'postponded_1', 'postponded_2', 'postponded_3')->where('account_id', $accountId)
            ->where('date', '>=', date_format(new DateTime(), 'Y-m-d'))
            ->first();
    }
}
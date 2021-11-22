<?php

namespace App\Http\Traits;

use App\Models\Ema1;
use App\Models\Ema2;
use App\Models\Ema3;
use App\Models\Ema4;
use App\Models\Ema5;
use DateTime;
use Illuminate\Support\Arr;

trait EmaTrait
{

    public function getEmaSchedule()
    {
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
        $data = Ema1::select('id', 'account_id', 'date', 'nth_day', 'nth_ema', 'nth_popup', 'popup_time', 'popup_time1', 'popup_time2', 'postponded_1', 'postponded_2', 'postponded_3')->where('date', $date)->get();
        return $data;
    }

    private function getEma2()
    {
        $data = [];
        $date = date_format(new DateTime(), 'Y-m-d');
        $data = Ema2::select('id', 'account_id', 'date', 'nth_day', 'nth_ema', 'nth_popup', 'popup_time', 'popup_time1', 'popup_time2', 'postponded_1', 'postponded_2', 'postponded_3')->where('date', $date)->get();
        return $data;
    }

    private function getEma3()
    {
        $data = [];
        $date = date_format(new DateTime(), 'Y-m-d');
        $data = Ema3::select('id', 'account_id', 'date', 'nth_day', 'nth_ema', 'nth_popup', 'popup_time', 'popup_time1', 'popup_time2', 'postponded_1', 'postponded_2', 'postponded_3')->where('date', $date)->get();
        return $data;
    }

    private function getEma4()
    {
        $data = [];
        $date = date_format(new DateTime(), 'Y-m-d');
        $data = Ema4::select('id', 'account_id', 'date', 'nth_day', 'nth_ema', 'nth_popup', 'popup_time', 'popup_time1', 'popup_time2', 'postponded_1', 'postponded_2', 'postponded_3')->where('date', $date)->get();
        return $data;
    }

    private function getEma5()
    {
        $data = [];
        $date = date_format(new DateTime(), 'Y-m-d');
        $data = Ema5::select('id', 'account_id', 'date', 'nth_day', 'nth_ema', 'nth_popup', 'popup_time', 'popup_time1', 'popup_time2', 'postponded_1', 'postponded_2', 'postponded_3')->where('date', $date)->get();
        return $data;
    }

    private function getEma(int $id, array $data)
    {
        switch ($id) {
            case 1:
                $ema = Ema1::where(['account_id' => $data['account_id'], 'date' => $data['date']])->first();
                return $ema;
            case 2:
                $ema = Ema2::where(['account_id' => $data['account_id'], 'date' => $data['date']])->first();
                return $ema;
            case 3:
                $ema = Ema3::where(['account_id' => $data['account_id'], 'date' => $data['date']])->first();
                return $ema;
            case 4:
                $ema = Ema4::where(['account_id' => $data['account_id'], 'date' => $data['date']])->first();
                return $ema;
            case 5:
                $ema = Ema5::where(['account_id' => $data['account_id'], 'date' => $data['date']])->first();
                return $ema;
        }
        return null;
    }

    public function getEmaList(int $id, $size)
    {
        switch ($id) {
            case 1:
                $ema = Ema1::paginate($size)->withQueryString();
                break;
            case 2:
                $ema = Ema2::paginate($size)->withQueryString();
                break;
            case 3:
                $ema = Ema3::paginate($size)->withQueryString();
                break;
            case 4:
                $ema = Ema4::paginate($size)->withQueryString();
                break;
            case 5:
                $ema = Ema5::paginate($size)->withQueryString();
                break;
        }
        return $ema;
    }

    public function updateCountPush(&$data)
    {
        unset($data['current_ema']);
        $ema = $this->getEma($data['nth_ema'], $data);
        $ema->update($data);
    }

    public function getPopupInfo(array $data)
    {
        $end_time = date_add(new Datetime($data['popup_time']), date_interval_create_from_date_string("15 minutes"));
        $current_ema = (new DateTime() > new DateTime($data['popup_time']) && new DateTime() <= $end_time) ? 1 : 0;
        $data['nth_popup'] = $data['nth_popup'] < 3 ? $data['nth_popup'] + 1 : 3;
        $data['current_ema'] = $current_ema;
        return $data;
    }

    public function getPromptMessage($ema)
    {
        $nth_popup = $ema['nth_popup'];
        $postponded_1 = $ema['postponded_1'];
        $postponded_2 = $ema['postponded_2'];
        $postponded_3 = $ema['postponded_3'];
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

    public function getNextSurvey($accountId)
    {
        // $data = $this->getEmaSchedule();
        $data = [];
        $date = date_format(new DateTime(), 'Y-m-d');
        $data[] = Ema1::select('id', 'account_id', 'date', 'nth_day', 'nth_ema', 'nth_popup', 'popup_time', 'popup_time1', 'popup_time2', 'postponded_1', 'postponded_2', 'postponded_3')->where('date', '>=', $date)->where('account_id', $accountId)->orderby('date', 'asc')->first();
        $data[] = Ema2::select('id', 'account_id', 'date', 'nth_day', 'nth_ema', 'nth_popup', 'popup_time', 'popup_time1', 'popup_time2', 'postponded_1', 'postponded_2', 'postponded_3')->where('date', '>=', $date)->where('account_id', $accountId)->orderby('date', 'asc')->first();
        $data[] = Ema3::select('id', 'account_id', 'date', 'nth_day', 'nth_ema', 'nth_popup', 'popup_time', 'popup_time1', 'popup_time2', 'postponded_1', 'postponded_2', 'postponded_3')->where('date', '>=', $date)->where('account_id', $accountId)->orderby('date', 'asc')->first();
        $data[] = Ema4::select('id', 'account_id', 'date', 'nth_day', 'nth_ema', 'nth_popup', 'popup_time', 'popup_time1', 'popup_time2', 'postponded_1', 'postponded_2', 'postponded_3')->where('date', '>=', $date)->where('account_id', $accountId)->orderby('date', 'asc')->first();
        $data[] = Ema5::select('id', 'account_id', 'date', 'nth_day', 'nth_ema', 'nth_popup', 'popup_time', 'popup_time1', 'popup_time2', 'postponded_1', 'postponded_2', 'postponded_3')->where('date', '>=', $date)->where('account_id', $accountId)->orderby('date', 'asc')->first();
        if (!empty($data)) {
            foreach ($data as $key => $value) {
                if (!empty($value)) {
                    $end_time = date_add(new Datetime($value->popup_time), date_interval_create_from_date_string("15 minutes"));
                    $current_ema = (new DateTime() > new DateTime($value->popup_time) && new DateTime() <= $end_time) ? 1 : 0;
                    if ($end_time > (new DateTime())) {
                        $value->current_ema = $current_ema;
                        return $value->toArray();
                    }
                }
            }
        }
        return null;
    }
}

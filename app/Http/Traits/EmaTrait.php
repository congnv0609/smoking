<?php

namespace App\Http\Traits;

use App\Models\Ema1;
use App\Models\Ema2;
use App\Models\Ema3;
use App\Models\Ema4;
use App\Models\Ema5;
use App\Models\Survey;
use DateTime;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

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
        $data = Ema1::select('id', 'account_id', 'date', 'nth_day', 'nth_ema', 'nth_popup', 'popup_time', 'popup_time1', 'popup_time2', 'postponded_1', 'postponded_2', 'postponded_3')->where([['date', $date], ['completed', false]])->get();
        return $data;
    }

    private function getEma2()
    {
        $data = [];
        $date = date_format(new DateTime(), 'Y-m-d');
        $data = Ema2::select('id', 'account_id', 'date', 'nth_day', 'nth_ema', 'nth_popup', 'popup_time', 'popup_time1', 'popup_time2', 'postponded_1', 'postponded_2', 'postponded_3')->where([['date', $date], ['completed', false]])->get();
        return $data;
    }

    private function getEma3()
    {
        $data = [];
        $date = date_format(new DateTime(), 'Y-m-d');
        $data = Ema3::select('id', 'account_id', 'date', 'nth_day', 'nth_ema', 'nth_popup', 'popup_time', 'popup_time1', 'popup_time2', 'postponded_1', 'postponded_2', 'postponded_3')->where([['date', $date], ['completed', false]])->get();
        return $data;
    }

    private function getEma4()
    {
        $data = [];
        $date = date_format(new DateTime(), 'Y-m-d');
        $data = Ema4::select('id', 'account_id', 'date', 'nth_day', 'nth_ema', 'nth_popup', 'popup_time', 'popup_time1', 'popup_time2', 'postponded_1', 'postponded_2', 'postponded_3')->where([['date', $date], ['completed', false]])->get();
        return $data;
    }

    private function getEma5()
    {
        $data = [];
        $date = date_format(new DateTime(), 'Y-m-d');
        $data = Ema5::select('id', 'account_id', 'date', 'nth_day', 'nth_ema', 'nth_popup', 'popup_time', 'popup_time1', 'popup_time2', 'postponded_1', 'postponded_2', 'postponded_3')->where([['date', $date], ['completed', false]])->get();
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

    public function getEmaList(int $id, $accountId, $size)
    {
        switch ($id) {
            case 1:
                $ema = DB::table('ema1s');
                if($accountId>0) {
                    $ema->where('ema1s.account_id', $accountId);
                }
                $ema = $ema->join('smokers', 'ema1s.account_id', '=', 'smokers.id')->paginate($size);
                return $ema;
            case 2:
                $ema = DB::table('ema2s');
                if ($accountId > 0) {
                    $ema->where('ema2s.account_id', $accountId);
                }
                $ema = $ema->join('smokers', 'ema2s.account_id', '=', 'smokers.id')->paginate($size);
                return $ema;
            case 3:
                $ema = DB::table('ema3s');
                if ($accountId > 0) {
                    $ema->where('ema3s.account_id', $accountId);
                }
                $ema = $ema->join('smokers', 'ema3s.account_id', '=', 'smokers.id')->paginate($size);
                return $ema;
            case 4:
                $ema = DB::table('ema4s');
                if ($accountId > 0) {
                    $ema->where('ema4s.account_id', $accountId);
                }
                $ema = $ema->join('smokers', 'ema4s.account_id', '=', 'smokers.id')->paginate($size);
                return $ema;
            case 5:
                $ema = DB::table('ema5s');
                if ($accountId > 0) {
                    $ema->where('ema5s.account_id', $accountId);
                }
                $ema = $ema->join('smokers', 'ema5s.account_id', '=', 'smokers.id')->paginate($size);
                return $ema;
        }
        return null;
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
        $data['nth_popup'] = (int)$data['nth_popup'] < 3 ? (int)$data['nth_popup'] + 1 : 3;
        $data['current_ema'] = $current_ema;
        return $data;
    }

    public function getPromptMessage($ema)
    {
        $nth_popup = $ema['nth_popup'];
        $postponded_1 = $ema['postponded_1'];
        $postponded_2 = $ema['postponded_2'];
        $postponded_3 = $ema['postponded_3'];
        switch ($nth_popup) {
            case 1: {
                    switch ($postponded_1) {
                        case 1: {
                                $title = "1st Reminder alert";
                                $msg = "吸煙雷達邀請你做問卷了！放棄填寫會損失是次現金禮券！";
                                break;
                            }
                        case 2: {
                                $title = "1st Reminder alert";
                                $msg = "吸煙雷達邀請你做問卷了！放棄填寫會損失是次現金禮券！";
                                break;
                            }
                        default:
                            $title = "1st Reminder alert";
                            $msg = "吸煙雷達邀請你做問卷了！";
                            break;
                    }
                    break;
                }
            case 2: {
                    switch ($postponded_2) {
                        case 1: {
                                $title = "2nd Reminder alert";
                                $msg = "吸煙雷達邀請你做問卷了！放棄填寫會損失是次現金禮券！";
                                break;
                            }
                        case 2: {
                                $title = "2nd Reminder alert";
                                $msg = "吸煙雷達邀請你做問卷了！放棄填寫會損失是次現金禮券！";
                                break;
                            }
                        default:
                            $title = "2nd Reminder alert";
                            $msg = "吸煙雷達邀請你做問卷了！";
                            break;
                    }
                    break;
                }
            case 3: {
                    switch ($postponded_3) {
                        case 1: {
                                $title = "3rd Reminder alert";
                                $msg = "吸煙雷達邀請你做問卷了！放棄填寫會損失是次現金禮券！";
                                break;
                            }
                        case 2: {
                                $title = "3rd Reminder alert";
                                $msg = "吸煙雷達邀請你做問卷了！放棄填寫會損失是次現金禮券！";
                                break;
                            }
                        default:
                            $title = "3rd Reminder alert";
                            $msg = "最後一次機會做這份問卷！放棄填寫會損失是次現金禮券！";
                            break;
                    }
                    break;
                }
        }
        return ['title' => $title, 'body' => $msg];
    }

    public function getNextSurvey($accountId)
    {
        // $data = $this->getEmaSchedule();
        $data = [];
        $date = date_format(date_sub(new DateTime(), date_interval_create_from_date_string("15 minutes")), 'Y-m-d H:i:s');
        $data[] = Ema1::select('id', 'account_id', 'date', 'nth_day', 'nth_ema', 'nth_popup', 'popup_time', 'popup_time1', 'popup_time2', 'postponded_1', 'postponded_2', 'postponded_3')->where('popup_time', '>=', $date)->where([['account_id', $accountId], ['completed', false]])->orderby('date', 'asc')->first();
        $data[] = Ema2::select('id', 'account_id', 'date', 'nth_day', 'nth_ema', 'nth_popup', 'popup_time', 'popup_time1', 'popup_time2', 'postponded_1', 'postponded_2', 'postponded_3')->where('popup_time', '>=', $date)->where([['account_id', $accountId], ['completed', false]])->orderby('date', 'asc')->first();
        $data[] = Ema3::select('id', 'account_id', 'date', 'nth_day', 'nth_ema', 'nth_popup', 'popup_time', 'popup_time1', 'popup_time2', 'postponded_1', 'postponded_2', 'postponded_3')->where('popup_time', '>=', $date)->where([['account_id', $accountId], ['completed', false]])->orderby('date', 'asc')->first();
        $data[] = Ema4::select('id', 'account_id', 'date', 'nth_day', 'nth_ema', 'nth_popup', 'popup_time', 'popup_time1', 'popup_time2', 'postponded_1', 'postponded_2', 'postponded_3')->where('popup_time', '>=', $date)->where([['account_id', $accountId], ['completed', false]])->orderby('date', 'asc')->first();
        $data[] = Ema5::select('id', 'account_id', 'date', 'nth_day', 'nth_ema', 'nth_popup', 'popup_time', 'popup_time1', 'popup_time2', 'postponded_1', 'postponded_2', 'postponded_3')->where('popup_time', '>=', $date)->where([['account_id', $accountId], ['completed', false]])->orderby('date', 'asc')->first();
        $next_survey = reset($data);
        if (!empty($data)) {
            foreach ($data as $key => $value) {
                //old
                if (!empty($value->popup_time) && !empty($next_survey->popup_time)) {
                    if ($value->popup_time <= $next_survey->popup_time) {
                        $next_survey = $value;
                        // $end_time = date_add(new Datetime($next_survey->popup_time), date_interval_create_from_date_string("15 minutes"));
                        // $current_ema = (new DateTime() >= new DateTime($next_survey->popup_time) && new DateTime() <= $end_time) ? 1 : 0;
                        // $next_survey->current_ema = $current_ema;
                    }
                }
            }

            //current ema
            if ($next_survey->postponded_3 > 0) {
                $end_time = date_add(new Datetime($next_survey->popup_time2), date_interval_create_from_date_string("15 minutes"));
                $current_ema = (new DateTime() >= new DateTime($next_survey->popup_time2) && new DateTime() <= $end_time) ? 1 : 0;
            } elseif ($next_survey->postponded_2 > 0) {
                $end_time = date_add(new Datetime($next_survey->popup_time1), date_interval_create_from_date_string("15 minutes"));
                $current_ema = (new DateTime() >= new DateTime($next_survey->popup_time1) && new DateTime() <= $end_time) ? 1 : 0;
            } else {
                $end_time = date_add(new Datetime($next_survey->popup_time), date_interval_create_from_date_string("15 minutes"));
                $current_ema = (new DateTime() >= new DateTime($next_survey->popup_time) && new DateTime() <= $end_time) ? 1 : 0;
            }

            $next_survey->current_ema = $current_ema;
            return $next_survey;
        }
        return null;
    }

    private function getEma1ByCond($cond)
    {
        $data = [];
        if (empty($cond)) {
            return [];
        }
        $data = Ema1::select('id', 'account_id', 'date', 'nth_day', 'nth_ema', 'nth_popup', 'popup_time', 'popup_time1', 'popup_time2', 'postponded_1', 'postponded_2', 'postponded_3')->where($cond)->first();
        return $data;
    }

    private function getEma2ByCond($cond)
    {
        $data = [];
        if (empty($cond)) {
            return [];
        }
        $data = Ema2::select('id', 'account_id', 'date', 'nth_day', 'nth_ema', 'nth_popup', 'popup_time', 'popup_time1', 'popup_time2', 'postponded_1', 'postponded_2', 'postponded_3')->where($cond)->first();
        return $data;
    }

    private function getEma3ByCond($cond)
    {
        $data = [];
        if (empty($cond)) {
            return [];
        }
        $data = Ema3::select('id', 'account_id', 'date', 'nth_day', 'nth_ema', 'nth_popup', 'popup_time', 'popup_time1', 'popup_time2', 'postponded_1', 'postponded_2', 'postponded_3')->where($cond)->first();
        return $data;
    }

    private function getEma4ByCond($cond)
    {
        $data = [];
        if (empty($cond)) {
            return [];
        }
        $data = Ema4::select('id', 'account_id', 'date', 'nth_day', 'nth_ema', 'nth_popup', 'popup_time', 'popup_time1', 'popup_time2', 'postponded_1', 'postponded_2', 'postponded_3')->where($cond)->first();
        return $data;
    }

    private function getEma5ByCond($cond)
    {
        $data = [];
        if (empty($cond)) {
            return [];
        }
        $data = Ema5::select('id', 'account_id', 'date', 'nth_day', 'nth_ema', 'nth_popup', 'popup_time', 'popup_time1', 'popup_time2', 'postponded_1', 'postponded_2', 'postponded_3')->where($cond)->first();
        return $data;
    }

    public function getEmaByQuery($query)
    {
        switch ($query['nth_ema']) {
            case 1:
                return $this->getEma1ByCond($query);
            case 2:
                return $this->getEma2ByCond($query);
            case 3:
                return $this->getEma3ByCond($query);
            case 4:
                return $this->getEma4ByCond($query);
            case 5:
                return $this->getEma5ByCond($query);
        }
        return null;
    }

    public function makeSurvey(array $data)
    {
        $ret = [];
        for ($i = 0; $i < 7; $i++) {
            $record = [];
            $record['account_id'] = $data['account_id'];
            $record['account'] = $data['account'];
            $record['start_date'] = date_format(new DateTime($data['start_date']), 'Y-m-d');
            $record['end_date'] = date_format(new DateTime($data['end_date']), 'Y-m-d');
            $record['nth_day_current'] = $i + 1;
            $ret[] = $record;
        }

        return $ret;
    }

    public function saveSurvey($data)
    {
        if (!empty($data)) {
            foreach ($data as $item) {
                Survey::create($item);
            }
        }
    }
}

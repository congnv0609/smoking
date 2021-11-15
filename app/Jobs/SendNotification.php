<?php

namespace App\Jobs;

use App\Http\Traits\PopupTimeTrait;
use App\Models\Smoker;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendNotification implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, PopupTimeTrait;

    private $_ema = [];

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(array $ema)
    {
        //
        $this->_ema = $ema;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
        $smoker = Smoker::whereNotNull('device_token')->where('id', $this->_ema['account_id'])->first();
        if (!empty($smoker)) {
            $this->push($smoker);
        }
    }

    private function push($smoker)
    {
        $url = 'https://fcm.googleapis.com/fcm/send';
        // $DeviceToken = Smoker::whereNotNull('device_token')->pluck('device_token')->all();
        $FcmKey = 'AAAAGOcfFW8:APA91bFltHXEGi6__AWHagTK2cv6T3tEbxydQsKKFrQriX14fhx0e5Elerf9CFIu_MerWA6J7e4fQEBtmAi9LMOGijROedN8UWelgeTaf1Mg8U4_kCRnKkYM9eczWYFNKuIEfMA2N8Ya';
        // $FcmKey = env('FCM');
        $info = $this->getPromptMessage();
        $ema = $this->getPopupTime();
        $data = [
            "registration_ids" => [$smoker->device_token],
            "notification" => [
                "title" => $info["title"],
                "body" => $info["body"],
                'sound' => $smoker->notification == 1 ? "default" : "",
            ],
            "data" => ["current_ema" => $ema->current_ema, "ema"=>$ema->ema],
        ];

        $RESPONSE = json_encode($data);

        $headers = [
            'Authorization:key=' . $FcmKey,
            'Content-Type: application/json',
        ];

        // CURL
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $RESPONSE);

        $output = curl_exec($ch);
        if ($output === FALSE) {
            die('Curl error: ' . curl_error($ch));
        }
        curl_close($ch);
        // dd($output);
    }

    private function getPromptMessage()
    {
        $postponded_1 = $this->_ema['postponded_1'];
        $postponded_2 = $this->_ema['postponded_2'];
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
}

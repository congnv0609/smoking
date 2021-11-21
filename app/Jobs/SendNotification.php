<?php

namespace App\Jobs;

use App\Http\Traits\EmaTrait;
use App\Models\Smoker;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Artisan;

class SendNotification implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, EmaTrait;

    private $_ema = [];

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(array $ema)
    {
        $this->_ema = $ema;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $smoker = Smoker::whereNotNull('device_token')->where('id', $this->_ema['account_id'])->first();
        if (!empty($smoker)) {
            $this->push($smoker);
        }
    }

    private function push($smoker)
    {
        $url = 'https://fcm.googleapis.com/fcm/send';
        $FcmKey = 'AAAAGOcfFW8:APA91bFltHXEGi6__AWHagTK2cv6T3tEbxydQsKKFrQriX14fhx0e5Elerf9CFIu_MerWA6J7e4fQEBtmAi9LMOGijROedN8UWelgeTaf1Mg8U4_kCRnKkYM9eczWYFNKuIEfMA2N8Ya';
        // $FcmKey = env('FCM');
        $ema = $this->getPopupInfo($this->_ema);
        $info = $this->getPromptMessage($ema);
        $data = [
            "registration_ids" => [$smoker->device_token],
            "notification" => [
                "title" => $info["title"],
                "body" => $info["body"],
                'sound' => $smoker->notification == 1 ? "default" : "",
            ],
            "data" => ["current_ema" => $ema['current_ema'], "ema" => $ema['nth_ema'], "nth_popup" => $ema['nth_popup'], "postponded_1" => $ema['postponded_1'], "postponded_2" => $ema['postponded_2'], "postponded_3" => $ema['postponded_3']],
        ];
        $this->updateCountPush($ema);
        Artisan::call('ema:schedule-get');
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
}

<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Artisan;
use App\Http\Traits\EmaTrait;

class UpdateCountPush implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, EmaTrait;

    private $_ema;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($ema)
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
        $this->updateCountPush($this->_ema);
        Artisan::call('ema:schedule-get');
    }
}

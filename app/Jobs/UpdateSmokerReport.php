<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Artisan;

class UpdateSmokerReport implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $_smoker;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($smoker)
    {
        //
        $this->_smoker = $smoker;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //make report
        Artisan::call('smoker:report', ['account_id' => $this->_smoker->id]);
    }
}

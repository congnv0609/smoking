<?php

namespace App\Jobs;

use App\Http\Traits\ReportTrait;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Cache;

class MakeReport implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, ReportTrait;

    private $_accountId;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($accountId)
    {
        //
        $this->_accountId = $accountId;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
        $data = $this->getOverviewData($this->_accountId);
        if(!empty($data)) {
            Cache::put("report:$this->_accountId", $data, 3600 * 72);
        }
    }
}

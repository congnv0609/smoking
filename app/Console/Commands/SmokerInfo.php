<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Smoker;

class SmokerInfo extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'smoker:info';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Show smoker info';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $account_id = $this->ask('account_id');
        $smoker = Smoker::find($account_id);
        if(!empty($smoker)) {
            dd($smoker);
        }
        dd("Account ID not found");
        // return 0;
    }
}

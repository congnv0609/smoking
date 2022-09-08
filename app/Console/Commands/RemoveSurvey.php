<?php

namespace App\Console\Commands;

use App\Models\Survey;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class RemoveSurvey extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ema:remove-survey {--id=*}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Removing survey by id';

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
        $surveyIdArray = $this->option('id');
        if(!empty($surveyIdArray)) {
            DB::beginTransaction();
            try{
                Survey::destroy($surveyIdArray);
                $idStr = implode(",", $surveyIdArray);
                $this->info("removed survey $idStr");
                DB::commit();
            } catch (\Exception $e) {
                DB::rollback();
                $this->info('Rolled back!');
                // something went wrong
            }
        } else {
            $this->info('No any survey found!');
        }
        // return 0;
    }
}

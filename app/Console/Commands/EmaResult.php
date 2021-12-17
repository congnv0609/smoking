<?php

namespace App\Console\Commands;

use App\Http\Traits\EmaTrait;
use Illuminate\Console\Command;

class EmaResult extends Command
{
    use EmaTrait;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ema:display';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        // return Command::SUCCESS;
        $emaId = $this->ask('Which ema do you want to show?');
        $data["account_id"] = $this->ask('Which account do you want to show?');
        $data["date"] = $this->ask('Which date yyyy-mm-dd do you want to show?');
        $ema = $this->getEma($emaId, $data);
        dd($ema);
    }
}

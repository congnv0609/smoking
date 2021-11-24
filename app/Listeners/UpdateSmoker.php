<?php

namespace App\Listeners;

use App\Events\SmokerProcessed;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdateSmoker
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  SmokerProcessed  $event
     * @return void
     */
    public function handle(SmokerProcessed $event)
    {
        //
    }
}

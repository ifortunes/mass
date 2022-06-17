<?php

namespace App\Providers\API\Application;

use App\Providers\API\Application\ApplicationActions;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ChangeStatusApplication
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
     * @param  \App\Providers\API\Application\ApplicationActions  $event
     * @return void
     */
    public function handle(ApplicationActions $event)
    {
        //
    }
}

<?php

namespace App\Providers;

use App\Events\AppointmentEvent;
use App\Listeners\DatabaseChange;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }

    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        AppointmentEvent::class => [
            DatabaseChange::class,
        ],
    ];
}

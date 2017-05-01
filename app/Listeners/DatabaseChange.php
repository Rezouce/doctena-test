<?php

namespace App\Listeners;

use App\Events\AppointmentEvent;
use App\Jobs\LogDatabaseChange;

class DatabaseChange
{
    public function handle(AppointmentEvent $event)
    {
        dispatch(new LogDatabaseChange($event->getAppointment()->getTable(), $event->getAction()));
    }
}

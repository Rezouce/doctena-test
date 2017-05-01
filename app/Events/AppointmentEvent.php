<?php

namespace App\Events;

use App\Appointment;

interface AppointmentEvent
{
    public function getAppointment(): Appointment;

    public function getAction(): string;
}

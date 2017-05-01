<?php

namespace App\Events;

use App\Appointment;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;

class AppointmentCreated implements AppointmentEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    private $appointment;

    public function __construct(Appointment $appointment)
    {
        $this->appointment = $appointment;
    }

    public function getAppointment(): Appointment
    {
        return $this->appointment;
    }

    public function getAction(): string
    {
        return 'creation';
    }
}

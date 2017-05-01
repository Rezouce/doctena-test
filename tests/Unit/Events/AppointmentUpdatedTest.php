<?php

namespace Tests\Unit\Events;

use App\Appointment;
use App\Events\AppointmentUpdated;
use PHPUnit\Framework\TestCase;

class AppointmentUpdatedTest extends TestCase
{

    /** @test */
    public function it_should_specify_which_type_of_action_it_is()
    {
        $event = new AppointmentUpdated(new Appointment);

        $this->assertEquals('update', $event->getAction());
    }

    /** @test */
    public function it_should_returns_its_appointment()
    {
        $appointment = new Appointment;

        $event = new AppointmentUpdated($appointment);

        $this->assertSame($appointment, $event->getAppointment());
    }
}

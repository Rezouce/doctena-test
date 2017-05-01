<?php

namespace Tests\Unit\Events;

use App\Appointment;
use App\Events\AppointmentCreated;
use PHPUnit\Framework\TestCase;

class AppointmentCreatedTest extends TestCase
{

    /** @test */
    public function it_should_specify_which_type_of_action_it_is()
    {
        $event = new AppointmentCreated(new Appointment);

        $this->assertEquals('creation', $event->getAction());
    }

    /** @test */
    public function it_should_returns_its_appointment()
    {
        $appointment = new Appointment;

        $event = new AppointmentCreated($appointment);

        $this->assertSame($appointment, $event->getAppointment());
    }
}

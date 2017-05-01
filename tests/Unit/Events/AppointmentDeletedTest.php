<?php

namespace Tests\Unit\Events;

use App\Appointment;
use App\Events\AppointmentDeleted;
use PHPUnit\Framework\TestCase;

class AppointmentDeletedTest extends TestCase
{

    /** @test */
    public function it_should_specify_which_type_of_action_it_is()
    {
        $event = new AppointmentDeleted(new Appointment);

        $this->assertEquals('deletion', $event->getAction());
    }

    /** @test */
    public function it_should_returns_its_appointment()
    {
        $appointment = new Appointment;

        $event = new AppointmentDeleted($appointment);

        $this->assertSame($appointment, $event->getAppointment());
    }
}

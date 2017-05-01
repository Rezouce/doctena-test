<?php

namespace Tests\Integration\Events;

use App\Appointment;
use App\Events\AppointmentDeleted;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class AppointmentDeletedTest extends TestCase
{
    use DatabaseMigrations;
    use DatabaseTransactions;

    /** @test */
    public function the_appointment_deleted_event_is_trigger_when_an_appointment_has_been_deleted()
    {
        \Event::fake();

        /** @var Appointment $appointment */
        $appointment = factory(Appointment::class)->create();

        $appointment->delete();

        \Event::assertDispatched(AppointmentDeleted::class, function (AppointmentDeleted $event) use ($appointment) {
            return $event->getAppointment()->id === $appointment->id;
        });
    }
}

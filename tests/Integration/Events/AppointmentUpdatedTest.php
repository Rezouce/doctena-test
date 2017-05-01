<?php

namespace Tests\Integration\Events;

use App\Appointment;
use App\Events\AppointmentUpdated;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class AppointmentUpdatedTest extends TestCase
{
    use DatabaseMigrations;
    use DatabaseTransactions;

    /** @test */
    public function the_appointment_deleted_event_is_trigger_when_an_appointment_has_been_deleted()
    {
        \Event::fake();

        /** @var Appointment $appointment */
        $appointment = factory(Appointment::class)->create();

        $appointment->patient_name = 'new name';
        $appointment->save();

        \Event::assertDispatched(AppointmentUpdated::class, function (AppointmentUpdated $event) use ($appointment) {
            return $event->getAppointment()->id === $appointment->id;
        });
    }
}

<?php

namespace Tests\Integration\Events;

use App\Appointment;
use App\Events\AppointmentCreated;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class AppointmentCreatedTest extends TestCase
{
    use DatabaseMigrations;
    use DatabaseTransactions;

    /** @test */
    public function the_appointment_created_event_is_trigger_when_an_appointment_has_been_created()
    {
        \Event::fake();

        $appointment = Appointment::create([
            'patient_name' => 'name',
            'patient_phone' => 'phone',
            'date' => '2017-05-01 16:20:00',
            'comments' => 'comments',
        ]);

        \Event::assertDispatched(AppointmentCreated::class, function (AppointmentCreated $event) use ($appointment) {
            return $event->getAppointment()->id === $appointment->id;
        });
    }
}

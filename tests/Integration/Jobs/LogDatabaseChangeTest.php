<?php

namespace Tests\Integration\Jobs;

use App\Appointment;
use App\Jobs\LogDatabaseChange;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class LogDatabaseChangeTest extends TestCase
{
    use DatabaseMigrations;
    use DatabaseTransactions;

    /** @test */
    public function it_logs_an_appointment_creation()
    {
        \Queue::fake();

        Appointment::create([
            'patient_name' => 'name',
            'patient_phone' => 'phone',
            'date' => '2017-05-01 16:20:00',
            'comments' => 'comments',
        ]);

        \Queue::assertPushed(LogDatabaseChange::class);
    }

    /** @test */
    public function it_logs_an_appointment_update()
    {
        \Queue::fake();

        /** @var Appointment $appointment */
        $appointment = factory(Appointment::class)->create();

        $appointment->patient_name = 'new name';
        $appointment->save();

        \Queue::assertPushed(LogDatabaseChange::class);
    }

    /** @test */
    public function it_logs_an_appointment_deletion()
    {
        \Queue::fake();

        /** @var Appointment $appointment */
        $appointment = factory(Appointment::class)->create();

        $appointment->delete();

        \Queue::assertPushed(LogDatabaseChange::class);
    }
}

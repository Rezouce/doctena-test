<?php

namespace Tests\Feature;

use App\Appointment;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AppointmentTest extends TestCase
{
    use DatabaseMigrations;
    use DatabaseTransactions;

    /** @test */
    public function testBasicTest()
    {
        $appointments = factory(Appointment::class)->times(5)->create();

        $response = $this->get('/appointments');

        $response->assertStatus(200);

        $appointments->each(function (Appointment $appointment) use ($response) {
            $response->assertSee($appointment->patient_name);
            $response->assertSee($appointment->patient_phone);
            $response->assertSee($appointment->date->toDateTimeString());
            $response->assertSee($appointment->comments);
        });
    }
}

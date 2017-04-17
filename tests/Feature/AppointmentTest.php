<?php

namespace Tests\Feature;

use App\Appointment;
use Carbon\Carbon;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AppointmentTest extends TestCase
{
    use DatabaseMigrations;
    use DatabaseTransactions;

    /** @test */
    public function it_retrieves_a_list_of_all_appointments()
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

    /** @test */
    public function it_creates_a_new_appointment()
    {
        $data = [
            'patient_name' => 'Albert Dupond',
            'patient_phone' => '+33 6 58 62 51 10',
            'date' => Carbon::now()->toDateTimeString(),
            'comments' => 'New patient.',
        ];

        $response = $this->post('/appointments', $data);

        $response->assertStatus(302);
        $this->assertDatabaseHas('appointments', $data);
    }

    /** @test */
    public function it_deletes_an_existing_appointment()
    {
        $appointment = factory(Appointment::class)->create();
        $this->assertDatabaseHas('appointments', $appointment->toArray());

        $response = $this->delete('/appointments/' . $appointment->id);

        $response->assertStatus(302);
        $this->assertDatabaseMissing('appointments', $appointment->toArray());
    }

    /** @test */
    public function it_has_a_page_to_edit_an_appointment()
    {
        $appointment = factory(Appointment::class)->create();

        $response = $this->get('/appointments/' . $appointment->id);

        $response->assertSee($appointment->patient_name);
        $response->assertSee($appointment->patient_phone);
        $response->assertSee($appointment->date->toDateTimeString());
        $response->assertSee($appointment->comments);
    }

    /** @test */
    public function it_can_update_an_appointment()
    {
        $appointment = factory(Appointment::class)->create();
        $this->assertDatabaseHas('appointments', $appointment->toArray());

        $data = [
            'patient_name' => 'Albert Dupond',
            'patient_phone' => '+33 6 58 62 51 10',
            'date' => Carbon::now()->toDateTimeString(),
            'comments' => 'New patient.',
        ];

        $response = $this->put('/appointments/' . $appointment->id, $data);

        $response->assertStatus(302);
        $this->assertDatabaseMissing('appointments', $appointment->toArray());
        $this->assertDatabaseHas('appointments', $data);
    }
}

<?php

namespace App\Http\Controllers;

use App\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{

    public function index()
    {
        return view('appointments/index', ['appointments' => Appointment::all()]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'patient_name' => 'required',
            'patient_phone' => 'required',
            'date' => 'date_format:Y-m-d H:i:s|required',
        ]);

        Appointment::create($request->all());

        return redirect('appointments');
    }

    public function delete(Appointment $appointment)
    {
        $appointment->delete();

        return redirect('appointments');
    }

    public function show(Appointment $appointment)
    {
        return view('appointments/edit', ['appointment' => $appointment]);
    }

    public function update(Request $request, Appointment $appointment)
    {
        $this->validate($request, [
            'patient_name' => 'required',
            'patient_phone' => 'required',
            'date' => 'date_format:Y-m-d H:i:s|required',
        ]);

        $appointment->update($request->all());

        return redirect('appointments');
    }
}

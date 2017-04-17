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
}

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
}

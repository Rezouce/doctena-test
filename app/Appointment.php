<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = ['patient_name', 'patient_phone', 'date', 'comments'];

    protected $dates = ['date'];
}

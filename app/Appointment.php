<?php

namespace App;

use App\Events\AppointmentCreated;
use App\Events\AppointmentDeleted;
use App\Events\AppointmentUpdated;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Appointment extends Model
{
    use Notifiable;

    protected $fillable = ['patient_name', 'patient_phone', 'date', 'comments'];

    protected $dates = ['date'];

    protected $events = [
        'created' => AppointmentCreated::class,
        'updated' => AppointmentUpdated::class,
        'deleted' => AppointmentDeleted::class,
    ];
}

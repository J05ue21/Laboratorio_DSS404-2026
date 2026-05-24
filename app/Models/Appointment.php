<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    // Proteccion contra Mass Assignment Vulnerability
    protected $fillable = [
                            'patient_id',
                            'doctor_id', 
                            'specialty_id',
                            'appointment_date',
                            'appointment_time',
                            'symptoms',
                            'status'
                            ];

    // relacion con el Paciente (mapea con la columna patient_id)
    public function patient()
    {
        return $this->belongsTo(User::class, 'patient_id');
    }

    // relacion con el Doctor (mapea con la columna doctor_id)
    public function doctor()
    {
        return $this->belongsTo(User::class, 'doctor_id');
    }

    // relacion con la Especialidad (mapea con la columna specialty_id)
    public function specialty()
    {
        return $this->belongsTo(Specialty::class, 'specialty_id');
    }
}

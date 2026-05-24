<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\User;
use App\Models\Specialty;
use App\Http\Requests\StoreAppointmentRequest; // importamos el validador

class AppointmentController extends Controller
{
    // Lista general (Index) ----------------------------------------------------------------------
    public function index()
    {
        // recuperar al usuario logueado durante esta sesión
        $currentUser = auth()->user();
        
        if ($currentUser->role === 'doctor') {
        // si es un  rol = Doctor, ve las citas asignadas a su ID
        $appointments = Appointment::with(['patient', 'specialty'])
                                    ->where('doctor_id', $currentUser->id)
                                    ->get();

        } 
        else {    
                // para mostrar la cita perteneciente al paciente logueado, 
                // junto con el id del doctor y la especialidad
                $appointments = Appointment::with(['doctor', 'specialty'])
                                    ->where('patient_id', $currentUser->id)
                                    ->get();
            }
        
        return view('appointments.index', compact('appointments', 'currentUser'));
    }

    // formulario para crear (Create) ----------------------------------------------------------------
    public function create()
    {
        // obtenemos solo los usuario (rol = doctor) y todas las especialidades
        $doctors = User::where('role', 'doctor')->get();
        $specialties = Specialty::all();

        return view('appointments.create', compact('doctors', 'specialties'));
    }

    // para guardar en la base de datos ---------------------------------------------------------------
    public function store(StoreAppointmentRequest $request)
    {
        $appointment = new Appointment();
        $appointment->doctor_id = $request->input('doctor_id');
        $appointment->specialty_id = $request->input('specialty_id');
        $appointment->appointment_date = $request->input('appointment_date');
        $appointment->appointment_time = $request->input('appointment_time');
        $appointment->symptoms = $request->input('symptoms');

        // tomando el ID del usuario autenticado
        $appointment->patient_id = auth()->id();
        $appointment->status = 'pendiente';
        
        $appointment->save();   //Appointment::create($data)

        // redirección mostrando mensaje de éxito
        return redirect()->route('appointments.index')->with('success', '¡Su cita médica ha sido reservada con éxito!');
    }

    
    public function show(Appointment $appointment) // ---------------------------------------------------
    {
        $appointment->load(['doctor', 'specialty', 'patient']);

        return view('appointments.show', compact('appointment'));
    }

    
    // formulario de modificacion del registro actual ---------------------------------------------------
    public function edit(Appointment $appointment)
    {
        $doctors = User::where('role', 'doctor')->get();
        $specialties = Specialty::all();

        // pasamos la cita seleccionada a la vista del formulario edit
        return view('appointments.edit', compact('appointment', 'doctors', 'specialties'));
    }

    // ejecutar la actualización en la Base de Datos ---------------------------------------------------
    public function update(StoreAppointmentRequest $request, Appointment $appointment)
    {
        // pasamos los datos validados del Form Request
        $data = $request->validated();

        // se actualiza el registro  [$fillable]
        $appointment->update($data);

        // redireccion al listado y mostrando un mensaje exitodo
        return redirect()->route('appointments.index')->with('success', '¡La cita médica se ha actualizado correctamente!');
    }

    
    // elimina el registro de la base de datos --------------------------------------------------------------------
    public function destroy(Appointment $appointment)
    {
        // hace un DELETE en la base de datos
        $appointment->delete();

        return redirect()->route('appointments.index')->with('success', '¡La cita médica ha sido cancelada y eliminada!');
    }

    // con este método se guardar el detalle de diagnóstico y se actualiza el estado de la cita
    public function diagnose(\Illuminate\Http\Request $request, Appointment $appointment)
    {
        // validar campo diagnosis del formulario
        $request->validate([
            'diagnosis' => 'required|string|max:1000',
        ]);

        // concatenar el detalle del diagnóstico en la columna 'symptoms' 
        $appointment->symptoms = $appointment->symptoms . "\n\n [DIAGNÓSTICO MÉDICO]: " . $request->input('diagnosis');
        
        // cambiar el estado ('pendiente' a 'completada')
        $appointment->status = 'Completada';
        
        // guardamos los cambios en MySQL
        $appointment->save();

        // redireccionar con un mensaje
        return redirect()->route('appointments.index')->with('success', '¡Diagnóstico y recomendaciones del paciente registrados!');
    }
    
}

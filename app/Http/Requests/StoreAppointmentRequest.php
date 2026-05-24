<?php

namespace App\Http\Requests;

//use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreAppointmentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;    //para permitir el flujo de las validaciones
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'doctor_id'        => 'required|exists:users,id',
            'specialty_id'     => 'required|exists:specialties,id',
            'appointment_date' => 'required|date|after_or_equal:today', // no permitir elegir citas en fechas pasadas
            'appointment_time' => 'required',
            'symptoms'         => 'nullable|string|max:1000',
        ];
    }

    public function messages(): array   //mensajes o avisos de error en validacione de campos de entrada
    {
        return [
            'doctor_id.required'        => 'Debe elegir un médico',
            'specialty_id.required'     => 'Por favor seleccione la especialidad',
            'appointment_date.required' => 'Es necesario elegir la fecha para la cita',
            'appointment_date.after_or_equal' => 'La fecha no puede ser anterior a este día',
            'appointment_time.required' => 'Seleccione una hora para la cita',
        ];
    }
}

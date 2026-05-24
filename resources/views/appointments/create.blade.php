@extends('layouts.app')

@section('title', 'Agendar Cita')

@section('content')
<div class="max-w-xl mx-auto bg-white p-8 rounded-xl shadow-sm border border-slate-100">
    
    <div class="mb-6">
        <h2 class="text-xl font-bold text-slate-800">📅 Reservar Cita Médica</h2>
        <p class="text-sm text-slate-500">Por favor, selecciona los detalles del médico y tu horario de atención.</p>
    </div>

    <form action="{{ route('appointments.store') }}" method="POST" class="space-y-5">
        @csrf <div>
            <label class="block text-sm font-semibold text-slate-700 mb-1.5">Especialidad Requerida</label>
            <select name="specialty_id" class="w-full p-2.5 border rounded-lg bg-white shadow-sm text-sm focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 outline-none border-slate-200">
                <option value="">-- Selecciona una Especialidad --</option>
                @foreach($specialties as $specialty)
                    <option value="{{ $specialty->id }}" {{ old('specialty_id') == $specialty->id ? 'selected' : '' }}>
                        {{ $specialty->name }}
                    </option>
                @endforeach
            </select>
            @error('specialty_id') <p class="text-red-500 text-xs mt-1.5 font-medium">⚠️ {{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-sm font-semibold text-slate-700 mb-1.5">Médico Especialista</label>
            <select name="doctor_id" class="w-full p-2.5 border rounded-lg bg-white shadow-sm text-sm focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 outline-none border-slate-200">
                <option value="">-- Selecciona un Médico --</option>
                @foreach($doctors as $doctor)
                    <option value="{{ $doctor->id }}" {{ old('doctor_id') == $doctor->id ? 'selected' : '' }}>
                        {{ $doctor->name }}
                    </option>
                @endforeach
            </select>
            @error('doctor_id') <p class="text-red-500 text-xs mt-1.5 font-medium">⚠️ {{ $message }}</p> @enderror
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Fecha de la Cita</label>
                <input type="date" name="appointment_date" value="{{ old('appointment_date') }}" class="w-full p-2.5 border rounded-lg shadow-sm text-sm focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 outline-none border-slate-200">
                @error('appointment_date') <p class="text-red-500 text-xs mt-1.5 font-medium">⚠️ {{ $message }}</p> @enderror
            </div>
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Hora de Atención</label>
                <input type="time" name="appointment_time" value="{{ old('appointment_time') }}" class="w-full p-2.5 border rounded-lg shadow-sm text-sm focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 outline-none border-slate-200">
                @error('appointment_time') <p class="text-red-500 text-xs mt-1.5 font-medium">⚠️ {{ $message }}</p> @enderror
            </div>
        </div>

        <div>
            <label class="block text-sm font-semibold text-slate-700 mb-1.5">Describe tus síntomas</label>
            <textarea name="symptoms" rows="3" placeholder="Ej: Dolor de cabeza persistente, fiebre moderada..." class="w-full p-2.5 border rounded-lg shadow-sm text-sm focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 outline-none border-slate-200">{{ old('symptoms') }}</textarea>
            @error('symptoms') <p class="text-red-500 text-xs mt-1.5 font-medium">⚠️ {{ $message }}</p> @enderror
        </div>

        <div class="flex justify-end gap-3 pt-2">
            <a href="{{ route('appointments.index') }}" class="bg-slate-100 hover:bg-slate-200 text-slate-700 px-4 py-2 rounded-lg text-sm font-semibold transition">
                Cancelar
            </a>
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-lg text-sm font-semibold shadow-sm transition">
                Confirmar Reserva
            </button>
        </div>
    </form>
</div>
@endsection
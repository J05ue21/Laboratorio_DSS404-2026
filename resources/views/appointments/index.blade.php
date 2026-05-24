@extends('layouts.app')
@section('title', $currentUser->role === 'doctor' ? 'Agenda Médica' : 'Mis Citas')
@section('content')

<div class="bg-white p-6 rounded-xl shadow-sm border border-slate-100">
    
    <div class="flex justify-between items-center mb-6">
        <div>
            <h2 class="text-2xl font-bold text-slate-800">
                {{ $currentUser->role === 'doctor' ? '📋 Panel de Control Médico' : 'Control de Citas Médicas' }}
            </h2>
            <p class="text-sm text-slate-500">
                {{ $currentUser->role === 'doctor' ? 'Listado de consultas y pacientes asignados a tu agenda' : 'Historial y estado de tus consultas agendadas' }}
            </p>
        </div>
        
        @if($currentUser->role === 'paciente')
            <a href="{{ route('appointments.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2.5 rounded-lg text-sm font-semibold shadow-sm transition">
                ➕ Agendar Nueva Cita
            </a>
        @endif
    </div>

    @if(session('success'))
        <div class="mb-4 bg-green-50 border-l-4 border-green-500 text-green-700 p-4 rounded-xl text-sm font-medium shadow-sm animate-fade-in">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto rounded-lg border border-slate-100">
        <table class="min-w-full divide-y divide-slate-200 text-left">
            <thead class="bg-slate-50 text-slate-500 text-xs uppercase font-bold tracking-wider">
                <tr>
                    <th class="p-4">Fecha y Hora</th>
                    <th class="p-4">{{ $currentUser->role === 'doctor' ? 'Paciente' : 'Médico' }}</th>
                    <th class="p-4">Especialidad</th>
                    <th class="p-4">Síntomas / Diagnostico</th>
                    <th class="p-4 text-center">Estado</th>
                    <th class="p-4 text-center">Acciones</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100 text-sm text-slate-600 bg-white">
                @forelse($appointments as $appointment)
                    <tr class="hover:bg-slate-50/80 transition duration-150">
                        <td class="p-4 font-medium text-slate-900">
                            <span class="block">{{ \Carbon\Carbon::parse($appointment->appointment_date)->format('d/m/Y') }}</span>
                            <span class="text-xs text-slate-400 font-mono">{{ \Carbon\Carbon::parse($appointment->appointment_time)->format('g:i a') }}</span>
                        </td>
                        
                        <td class="p-4">
                            @if($currentUser->role === 'doctor')
                                <span class="font-semibold text-slate-700">{{ $appointment->patient?->name ?? 'No registrado' }}</span>
                            @else
                                <span class="font-semibold text-slate-700">Dr. {{ $appointment->doctor?->name ?? 'No asignado' }}</span>
                            @endif
                        </td>

                        <td class="p-4">
                            <span class="inline-block bg-blue-50 text-blue-700 px-2.5 py-0.5 rounded text-xs font-bold uppercase tracking-wide">
                                {{ $appointment->specialty?->name ?? 'General' }}
                            </span>
                        </td>
                        <td class="p-4 max-w-xs truncate text-slate-500" title="{{ $appointment->symptoms }}">
                            {{ $appointment->symptoms }}
                        </td>
                        <td class="p-4 text-center">
                            <span class="px-2.5 py-1 rounded-full text-xs font-bold uppercase tracking-wider
                                {{ $appointment->status === 'pendiente' ? 'bg-amber-100 text-amber-700' : '' }}
                                {{ $appointment->status === 'completada' ? 'bg-green-100 text-green-700' : '' }}
                                {{ $appointment->status === 'cancelada' ? 'bg-red-100 text-red-700' : '' }}
                            ">
                                {{ $appointment->status }}
                            </span>
                        </td>
                        <td class="p-4 text-center flex justify-center gap-1.5 items-center">
                            <a href="{{ route('appointments.show', $appointment->id) }}" class="bg-slate-500 hover:bg-slate-600 text-white px-3 py-1.5 rounded-md text-xs font-medium transition shadow-sm">
                                Ver
                            </a>

                            @if($currentUser->role === 'doctor')
                                @if($appointment->status === 'pendiente')
                                    <button onclick="toggleDiagnosisForm({{ $appointment->id }})" class="bg-emerald-600 hover:bg-emerald-700 text-white px-3 py-1.5 rounded-md text-xs font-medium transition shadow-sm">
                                        👨‍⚕️ Atender
                                    </button>
                                @else
                                    <span class="text-xs text-slate-400 italic font-medium">Finalizada</span>
                                @endif
                            @else
                                @if($appointment->status === 'pendiente')
                                    <a href="{{ route('appointments.edit', $appointment->id) }}" class="bg-amber-500 hover:bg-amber-600 text-white px-3 py-1.5 rounded-md text-xs font-medium transition shadow-sm">
                                        Editar
                                    </a>
                                    <form action="{{ route('appointments.destroy', $appointment->id) }}" method="POST" class="inline" onsubmit="return confirm('¿Estás seguro de que deseas cancelar de forma permanente esta cita?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1.5 rounded-md text-xs font-medium transition shadow-sm">
                                            Cancelar
                                        </button>
                                    </form>
                                @else
                                    <span class="text-xs text-slate-400 font-medium italic bg-slate-100 px-2 py-1 rounded-md">
                                        Sin acciones ({{ ucfirst($appointment->status) }})
                                    </span>
                                @endif
                            @endif
                        </td>
                    </tr>

                    @if($currentUser->role === 'doctor' && $appointment->status === 'pendiente')
                        <tr id="diag-box-{{ $appointment->id }}" class="hidden bg-slate-50/50">
                            <td colspan="6" class="p-4 border-t border-emerald-100">
                                <div class="max-w-xl mx-auto bg-white p-5 rounded-xl border border-emerald-100 shadow-sm">
                                    <h4 class="text-xs font-bold text-slate-700 uppercase tracking-wide mb-3 flex items-center gap-1.5">
                                        <span>📋 Registro de Diagnóstico Clínico</span>
                                    </h4>
                                    <form action="{{ route('appointments.diagnose', $appointment->id) }}" method="POST" class="space-y-3">
                                        @csrf
                                        @method('PUT')
                                        <div>
                                            <textarea name="diagnosis" rows="3" required class="w-full p-2.5 text-xs border rounded-lg bg-white outline-none focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 border-slate-200" placeholder="Escriba las indicaciones médicas, medicamentos recetados u observaciones clínicas..."></textarea>
                                        </div>
                                        <div class="flex justify-end pt-1">
                                            <button type="submit" class="bg-emerald-600 hover:bg-emerald-700 text-white px-4 py-1.5 rounded-lg text-xs font-bold shadow-sm transition">
                                                Finalizar y Guardar
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endif

                @empty
                    <tr>
                        <td colspan="6" class="p-8 text-center text-slate-400">
                            <p class="text-lg">📭 No hay citas registradas en tu control.</p>
                            @if($currentUser->role === 'paciente')
                                <p class="text-xs text-slate-400 mt-1">Haz clic en "Agendar Nueva Cita" para comenzar</p>
                            @endif
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<script>
    function toggleDiagnosisForm(id) {
        var box = document.getElementById('diag-box-' + id);
        if(box) {
            box.classList.toggle('hidden');
        }
    }
</script>

@endsection

<?php $__env->startSection('title', 'Detalle de la Cita'); ?>
<?php $__env->startSection('content'); ?>
<div class="max-w-2xl mx-auto bg-white p-8 rounded-xl shadow-sm border border-slate-100">
    
    <div class="flex justify-between items-center mb-6 border-b border-slate-100 pb-4">
        <div>
            <h2 class="text-xl font-bold text-slate-800">🔍 Detalle de Cita Médica</h2>
            <p class="text-xs text-slate-400 font-mono mt-1">ID de Control: #<?php echo e($appointment->id); ?></p>
        </div>
        <span class="px-3 py-1 rounded-full text-xs font-bold uppercase <?php echo e($appointment->status === 'pendiente' ? 'bg-amber-100 text-amber-700' : 'bg-green-100 text-green-700'); ?>">
            <?php echo e($appointment->status); ?>

        </span>
    </div>

    <div class="space-y-6">
        <div class="grid grid-cols-2 gap-4 bg-slate-50 p-4 rounded-lg border border-slate-100">
            <div>
                <span class="block text-xs font-semibold text-slate-400 uppercase tracking-wider">Fecha Asignada</span>
                <span class="text-sm font-medium text-slate-700 font-mono"><?php echo e($appointment->appointment_date); ?></span>
            </div>
            <div>
                <span class="block text-xs font-semibold text-slate-400 uppercase tracking-wider">Hora de Atención</span>
                <span class="text-sm font-medium text-slate-700 font-mono"><?php echo e($appointment->appointment_time); ?></span>
            </div>
        </div>

        <div class="space-y-3">
            <div>
                <span class="block text-xs font-semibold text-slate-400 uppercase tracking-wider">Médico Especialista</span>
                <span class="text-base font-semibold text-slate-800">Dr. <?php echo e($appointment->doctor?->name); ?></span>
            </div>
            <div>
                <span class="block text-xs font-semibold text-slate-400 uppercase tracking-wider">Especialidad Médica</span>
                <span class="inline-block bg-blue-50 text-blue-700 px-2.5 py-1 rounded text-xs font-bold mt-1">
                    <?php echo e($appointment->specialty?->name); ?>

                </span>
            </div>
            <div>
                <span class="block text-xs font-semibold text-slate-400 uppercase tracking-wider">Paciente Solicitante</span>
                <span class="text-sm font-medium text-slate-600"><?php echo e($appointment->patient?->name); ?></span>
            </div>
        </div>

        <div class="border-t border-slate-100 pt-4">
            <span class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-1.5">Síntomas Descritos</span>
            <p class="text-sm text-slate-600 bg-slate-50 p-3 rounded-lg italic border border-slate-100 leading-relaxed whitespace-pre-line">
                <?php echo e($appointment->symptoms ?? 'No se describieron síntomas específicos para esta consulta.'); ?>

            </p>
        </div>

        <div class="text-[11px] text-slate-400 flex justify-between pt-2 border-t border-slate-100">
            <span>Registrada el: <?php echo e($appointment->created_at->format('d/m/Y g:i a')); ?></span>
            <span>Última actualización: <?php echo e($appointment->updated_at->format('d/m/Y g:i a')); ?></span>
        </div>

        <div class="flex justify-end pt-4">
            <a href="<?php echo e(route('appointments.index')); ?>" class="bg-slate-800 hover:bg-slate-900 text-white px-5 py-2 rounded-lg text-sm font-semibold shadow-sm transition">
                Volver al Panel Principal
            </a>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\Users\Josue\UDB\2026\DSS404\Laboratorio\Desafio 3\control_citas_medica\resources\views/appointments/show.blade.php ENDPATH**/ ?>
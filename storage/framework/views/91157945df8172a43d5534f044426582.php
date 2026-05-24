

<?php $__env->startSection('title', 'Agendar Cita'); ?>

<?php $__env->startSection('content'); ?>
<div class="max-w-xl mx-auto bg-white p-8 rounded-xl shadow-sm border border-slate-100">
    
    <div class="mb-6">
        <h2 class="text-xl font-bold text-slate-800">📅 Reservar Cita Médica</h2>
        <p class="text-sm text-slate-500">Por favor, selecciona los detalles del médico y tu horario de atención.</p>
    </div>

    <form action="<?php echo e(route('appointments.store')); ?>" method="POST" class="space-y-5">
        <?php echo csrf_field(); ?> <div>
            <label class="block text-sm font-semibold text-slate-700 mb-1.5">Especialidad Requerida</label>
            <select name="specialty_id" class="w-full p-2.5 border rounded-lg bg-white shadow-sm text-sm focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 outline-none border-slate-200">
                <option value="">-- Selecciona una Especialidad --</option>
                <?php $__currentLoopData = $specialties; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $specialty): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($specialty->id); ?>" <?php echo e(old('specialty_id') == $specialty->id ? 'selected' : ''); ?>>
                        <?php echo e($specialty->name); ?>

                    </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <?php $__errorArgs = ['specialty_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-red-500 text-xs mt-1.5 font-medium">⚠️ <?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div>
            <label class="block text-sm font-semibold text-slate-700 mb-1.5">Médico Especialista</label>
            <select name="doctor_id" class="w-full p-2.5 border rounded-lg bg-white shadow-sm text-sm focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 outline-none border-slate-200">
                <option value="">-- Selecciona un Médico --</option>
                <?php $__currentLoopData = $doctors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doctor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($doctor->id); ?>" <?php echo e(old('doctor_id') == $doctor->id ? 'selected' : ''); ?>>
                        <?php echo e($doctor->name); ?>

                    </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <?php $__errorArgs = ['doctor_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-red-500 text-xs mt-1.5 font-medium">⚠️ <?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Fecha de la Cita</label>
                <input type="date" name="appointment_date" value="<?php echo e(old('appointment_date')); ?>" class="w-full p-2.5 border rounded-lg shadow-sm text-sm focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 outline-none border-slate-200">
                <?php $__errorArgs = ['appointment_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-red-500 text-xs mt-1.5 font-medium">⚠️ <?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Hora de Atención</label>
                <input type="time" name="appointment_time" value="<?php echo e(old('appointment_time')); ?>" class="w-full p-2.5 border rounded-lg shadow-sm text-sm focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 outline-none border-slate-200">
                <?php $__errorArgs = ['appointment_time'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-red-500 text-xs mt-1.5 font-medium">⚠️ <?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
        </div>

        <div>
            <label class="block text-sm font-semibold text-slate-700 mb-1.5">Describe tus síntomas</label>
            <textarea name="symptoms" rows="3" placeholder="Ej: Dolor de cabeza persistente, fiebre moderada..." class="w-full p-2.5 border rounded-lg shadow-sm text-sm focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 outline-none border-slate-200"><?php echo e(old('symptoms')); ?></textarea>
            <?php $__errorArgs = ['symptoms'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-red-500 text-xs mt-1.5 font-medium">⚠️ <?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div class="flex justify-end gap-3 pt-2">
            <a href="<?php echo e(route('appointments.index')); ?>" class="bg-slate-100 hover:bg-slate-200 text-slate-700 px-4 py-2 rounded-lg text-sm font-semibold transition">
                Cancelar
            </a>
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-lg text-sm font-semibold shadow-sm transition">
                Confirmar Reserva
            </button>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\Users\Josue\UDB\2026\DSS404\Laboratorio\Desafio 3\control_citas_medica\resources\views/appointments/create.blade.php ENDPATH**/ ?>
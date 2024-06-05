<?php $__env->startSection('header', 'Agregar asistencias'); ?>
<?php $__env->startSection('content'); ?>

    <div class="card" style="padding: 10px;">
        <div class="card-body">
            <form method="GET" action="<?php echo e(route('assists.create')); ?>" class="text-center">
                <div class="form-row align-items-center justify-content-center">
                    <?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-label','data' => ['for' => 'dni','value' => __('DNI')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('input-label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => 'dni','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('DNI'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-input','data' => ['id' => 'dni','class' => 'mt-1','type' => 'number','name' => 'dni','value' => old('dni', isset($dni) ? $dni : null),'required' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'dni','class' => 'mt-1','type' => 'number','name' => 'dni','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(old('dni', isset($dni) ? $dni : null)),'required' => true]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-error','data' => ['messages' => $errors->get('dni'),'class' => 'mt-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['messages' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->get('dni')),'class' => 'mt-2']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>
                    <br>
                    <button type="submit" class="btn btn-primary btn-sm mt-2">Buscar</button>
                </div>
            </form>
        </div>
    </div>


    <?php if(Session::has('success')): ?>
        <div class="alert alert-success mt-3">
            <?php echo e(Session::get('success')); ?>

        </div>
    <?php endif; ?>

    <?php if(Session::has('error')): ?>
        <div class="alert alert-danger">
            <?php echo e(Session::get('error')); ?>

        </div>
    <?php endif; ?>

    <?php if(isset($students)): ?>
        
        <div class="table-responsive mt-3 mx-auto" style="max-width: 800px;">
            <table class="table table-striped mx-auto">
                <thead>
                    <tr>
                        <th scope="col">Dni</th>
                        <th scope="col">Apellido</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Nacimiento</th>
                        <th scope="col">Año</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td><?php echo e($student->dni); ?></td>
                            <td><?php echo e($student->apellido); ?></td>
                            <td><?php echo e($student->nombre); ?></td>
                            <td><?php echo e(date('d-m-Y', strtotime($student->nacimiento))); ?></td>
                            <td><?php echo e($student->anio); ?></td>
                            <td style="text-align: center">
                                <form method="POST" action="<?php echo e(route('assists.store')); ?>">
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" name="student_id" value="<?php echo e($student->id); ?>">
                                    <button type="submit" class="btn btn-primary btn-sm">Agregar Asistencia</button>
                                </form>
                            </td>
                        <tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                            <td colspan="6">
                                <span class="text-danger">
                                    <strong>Estudiante no encontrado</strong>
                                </span>
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>


    </body>

    </html>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\laravel-crud - copia\resources\views/assists/create.blade.php ENDPATH**/ ?>
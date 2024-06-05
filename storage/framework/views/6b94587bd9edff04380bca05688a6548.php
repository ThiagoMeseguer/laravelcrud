<?php $__env->startSection('content'); ?>
    <div class="row justify-content-center mt-3">
        <div class="col-md-8">

            <?php if($message = Session::get('success')): ?>
                <div class="alert alert-success" role="alert">
                    <?php echo e($message); ?>

                </div>
            <?php endif; ?>

            <div class="card">
                <div class="card-header">
                    <div class="float-start">
                        Actualizar Estudiante
                    </div>
                    <div class="float-end">
                        <a href="<?php echo e(route('students.index')); ?>" class="btn btn-primary btn-sm">&larr; Back</a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="<?php echo e(route('students.update', $students->id)); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>

                        <input type="hidden" name="id" value="<?php echo e($students->id); ?>">
                        <div class="mb-3 row">
                            <label for="dni" class="col-md-4 col-form-label text-md-end text-start">Dni</label>
                            <div class="col-md-6">
                                <input type="number" class="form-control <?php $__errorArgs = ['dni'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="dni"
                                    name="dni" value="<?php echo e($students->dni); ?>">
                                <?php if($errors->has('dni')): ?>
                                    <span class="text-danger"><?php echo e($errors->first('dni')); ?></span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="nombre" class="col-md-4 col-form-label text-md-end text-start">Nombre</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control <?php $__errorArgs = ['nombre'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    id="nombre" name="nombre" value="<?php echo e($students->nombre); ?>">
                                <?php if($errors->has('nombre')): ?>
                                    <span class="text-danger"><?php echo e($errors->first('nombre')); ?></span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="apellido" class="col-md-4 col-form-label text-md-end text-start">Apellido</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control <?php $__errorArgs = ['apellido'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    id="apellido" name="apellido" value="<?php echo e($students->apellido); ?>">
                                <?php if($errors->has('apellido')): ?>
                                    <span class="text-danger"><?php echo e($errors->first('apellido')); ?></span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="nacimiento"
                                class="col-md-4 col-form-label text-md-end text-start">Nacimiento</label>
                            <div class="col-md-6">
                                <input type="date" class="form-control <?php $__errorArgs = ['nacimiento'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    id="nacimiento" name="nacimiento" value="<?php echo e($students->nacimiento); ?>">
                                <?php if($errors->has('nacimiento')): ?>
                                    <span class="text-danger"><?php echo e($errors->first('nacimiento')); ?></span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="anio" class="col-md-4 col-form-label text-md-end text-start">Año</label>
                            <div class="col-md-6">
                                <select class="form-control <?php $__errorArgs = ['anio'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="anio" name="anio">
                                    <option value="1" <?php echo e($students->anio == 1 ? 'selected' : ''); ?>>1</option>
                                    <option value="2" <?php echo e($students->anio == 2 ? 'selected' : ''); ?>>2</option>
                                    <option value="3" <?php echo e($students->anio == 3 ? 'selected' : ''); ?>>3</option>
                                </select>
                                <?php if($errors->has('anio')): ?>
                                    <span class="text-danger"><?php echo e($errors->first('anio')); ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Update">
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\laravel-crud - copia\resources\views/students/edit.blade.php ENDPATH**/ ?>
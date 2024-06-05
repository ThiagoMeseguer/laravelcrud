<?php $__env->startSection('content'); ?>
    <div class="row justify-content-center mt-3">
        <div class="col-md-6">

            <?php if($message = Session::get('success')): ?>
                <div class="alert alert-success" role="alert">
                    <?php echo e($message); ?>

                </div>
            <?php endif; ?>
            
            <div class="card">
                <div class="card-header">
                    <div class="float-start">
                        Parametros
                    </div>
                    <div class="float-end">
                        <a href="<?php echo e(route('students.index')); ?>" class="btn btn-primary btn-sm">&larr; Back Students</a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="<?php echo e(route('parameters.update', $parameters[0]->id)); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                        
                        <input name="id" type="hidden" value=1>
                        <div class="mb-3 row">
                            <label for="cant_dias" class="col-md-4 offset-md-1 col-form-label text-md-end text-start">Cantidad de dias</label>
                            <div class="col-md-6">
                                <input type="number" class="form-control-sm <?php $__errorArgs = ['cant_dias'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> text-center" id="cant_dias" name="cant_dias" value="<?php echo e($parameters[0]->cant_dias); ?>">
                                <?php if($errors->has('cant_dias')): ?>
                                    <span class="text-danger"><?php echo e($errors->first('cant_dias')); ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                       
                        <div class="mb-3 row">
                            <label for="promocion" class="col-md-4 offset-md-1 col-form-label text-md-end text-start">Promocion</label>
                            <div class="col-md-6">
                                <input type="number" class="form-control-sm <?php $__errorArgs = ['promocion'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> text-center" id="promocion" name="promocion" value="<?php echo e($parameters[0]->promocion); ?>">
                                <?php if($errors->has('promocion')): ?>
                                    <span class="text-danger"><?php echo e($errors->first('promocion')); ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                    
                        <div class="mb-3 row">
                            <label for="regular" class="col-md-4 offset-md-1 col-form-label text-md-end text-start">Regular</label>
                            <div class="col-md-6">
                                <input type="number" class="form-control-sm <?php $__errorArgs = ['regular'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> text-center" id="regular" name="regular" value="<?php echo e($parameters[0]->regular); ?>">
                                <?php if($errors->has('regular')): ?>
                                    <span class="text-danger"><?php echo e($errors->first('regular')); ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="mb-3 row justify-content-center">
                            <div class="col-md-6 text-center">
                                <input type="submit" class="btn btn-primary" value="Update">
                            </div>
                        </div>
                    </form>                    
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\laravel-crud - copia\resources\views/parameter/index.blade.php ENDPATH**/ ?>
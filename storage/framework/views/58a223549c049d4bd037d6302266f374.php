<?php $__env->startSection('content'); ?>

<div class="row justify-content-center mt-3">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Student Information
                </div>
                <div class="float-end">
                    <a href="<?php echo e(route('students.index')); ?>" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">

                    <div class="row">
                        <label for="dni" class="col-md-4 col-form-label text-md-end text-start"><strong>Dni:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            <?php echo e($student->dni); ?>

                        </div>
                    </div>

                    <div class="row">
                        <label for="nombre" class="col-md-4 col-form-label text-md-end text-start"><strong>Nombre:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            <?php echo e($student->nombre); ?>

                        </div>
                    </div>
                    
                    <div class="row">
                        <label for="apellido" class="col-md-4 col-form-label text-md-end text-start"><strong>Apellido:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            <?php echo e($student->apellido); ?>

                        </div>
                    </div>

                    <div class="row">
                        <label for="nacimiento" class="col-md-4 col-form-label text-md-end text-start"><strong>nacimiento:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            <?php echo e($student->nacimiento); ?>

                        </div>
                    </div>

                    <div class="row">
                        <label for="porcentaje" class="col-md-4 col-form-label text-md-end text-start"><strong>Porcentaje:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            <?php echo e($student->porcentaje); ?>

                        </div>
                    </div>

                    <div class="row">
                        <label for="grupo" class="col-md-4 col-form-label text-md-end text-start"><strong>Grupo:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            <?php echo e($student->condicion); ?>

                        </div>
                    </div>
        
            </div>
        </div>
    </div>    
</div>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\laravel-crud\resources\views/students/show.blade.php ENDPATH**/ ?>
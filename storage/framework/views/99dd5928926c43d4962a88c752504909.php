<?php $__env->startSection('header'); ?>

<?php $__env->startSection('content'); ?>

    <div class="row justify-content-center mt-3">
        <div class="col-md-12">
            <?php if($message = Session::get('success')): ?>
                <div class="alert alert-success" role="alert">
                    <?php echo e($message); ?>

                </div>
            <?php endif; ?>

            <div class="card">
                <div class="card-header">
                    <a>Assists List </a>
                </div>
                <div class="card-body container-md">
                    
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Apellido</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Cantidad de Asistencia</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td> <?php echo e($student->apellido); ?> </td>
                                    <td> <?php echo e($student->nombre); ?> </td>
                                    <td> <?php echo e($student->assist->count()); ?> </td>
                                    <td>
                                        <a href="<?php echo e(route('assists.show', $student->id)); ?>"
                                        class="btn btn-warning btn-sm <?php echo e($student->assist->count() == 0 ? ' disabled' : ''); ?> ">
                                        <i class="bi bi-eye"></i> Show</a>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="6">
                                        <span class="text-danger">
                                            <strong>No Student Found!</strong>
                                        </span>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\laravel-crud\resources\views/assists/index.blade.php ENDPATH**/ ?>
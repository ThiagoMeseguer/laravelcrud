<?php $__env->startSection('content'); ?>
    <div class="row justify-content-center mt-3">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="float-start">
                        Asistencias de <?php echo e($student->nombre); ?> <?php echo e($student->apellido); ?>.
                    </div>
                    <div class="float-end">
                        <a href="<?php echo e(route('assists.index')); ?>" class="btn btn-primary btn-sm">&larr; Back</a>
                    </div>
                </div>
                <div class="card-body d-flex justify-content-center">
                    <div class="col-md-6" style="line-height: 0px;">
                        <h5> Cantidad total de asistencias: <?php echo e($assists->count()); ?> </h5>
                        <table class="table table-striped table-bordered">
                            <?php $__currentLoopData = $assists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $assist): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td class="p-4"> <?php echo e($assist->fecha); ?> </td>
                                    <td>
                                        <form action="<?php echo e(route('assists.destroy', $assist->id)); ?>" method="post">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Do you want to delete this student?');"><i
                                                    class="bi bi-trash"></i> Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\laravel-crud\resources\views/assists/show.blade.php ENDPATH**/ ?>
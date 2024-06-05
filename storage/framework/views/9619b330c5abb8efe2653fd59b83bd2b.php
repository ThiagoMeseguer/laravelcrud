<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Reporte</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
    <table class="table table-striped table-bordered text-center">
        <thead>
            <tr>
                <th scope="col">Dni</th>
                <th scope="col">Apellido</th>
                <th scope="col">Nombre</th>
                <th scope="col">Año</th>
                <th scope="col">Asistencia</th>
                <th scope="col">Condicion</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                    <td><?php echo e($student->dni); ?></td>
                    <td><?php echo e($student->apellido); ?></td>
                    <td><?php echo e($student->nombre); ?></td>
                    <td><?php echo e($student->anio); ?></td>
                    <td><?php echo e(count($student->assist)); ?></td>
                    <td><?php echo e($student->condicion); ?></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </body>
    </html><?php /**PATH C:\laragon\www\laravel-crud - copia\resources\views/exports/pdf.blade.php ENDPATH**/ ?>
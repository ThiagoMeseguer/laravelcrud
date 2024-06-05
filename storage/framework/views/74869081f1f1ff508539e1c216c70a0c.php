<?php $__env->startSection('header'); ?>

<?php $__env->startSection('content'); ?>

    <div class="row justify-content-center mt-3">
        <div class="col-md-12">
            <?php if(!empty($birthdays)): ?>
                <div class="alert alert-success alert-dismissible fade show container-md" role="alert">
                    <h2>Estudiantes que cumplen años hoy</h2>
                    <?php $__currentLoopData = $birthdays; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        🎉 <?php echo e($student->apellido); ?>,<?php echo e($student->nombre); ?> <br>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>
            <?php if($message = Session::get('success')): ?>
                <div class="alert alert-success alert-dismissible fade show container-md" role="alert">
                    <i class="bi bi-exclamation-triangle-fill"></i> <?php echo e($message); ?>

                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                
            <?php endif; ?>
            <?php if($message = Session::get('error')): ?>
                <div class="alert alert-danger alert-dismissible fade show container-md" role="alert">
                    <i class="bi bi-exclamation-triangle-fill"></i> <?php echo e($message); ?>

                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>
            <?php if($message = Session::get('parameters')): ?>
                <div class="alert alert-danger fade show container-md" role="alert">
                    <i class="bi bi-exclamation-triangle-fill"></i> <?php echo e($message); ?>

                </div>
            <?php endif; ?>

            <div class="card container-md ">
                <div class="card-header">
                    <a>Student List </a>
                </div>
                <div class="card-body">
                    <div class="form-group flex p-1 gap-1">
                        <a href="<?php echo e(route('students.create')); ?>" class="btn btn-success btn-sm mb-3"><i
                                class="bi bi-plus-circle"></i> Añadir Estudiante</a>
                        <a href="<?php echo e(Route('assists.create')); ?>" class="btn btn-success btn-sm mb-3"><i
                                class="bi bi-plus-circle"></i> Agregar Asistencia por DNI</a>
                        
                        <div class="dropdown">
                            <button class="btn btn-primary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Exportar Lista Actual
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo e(route('export.pdf', ['students' => json_encode($students)])); ?>"
                                        class="dropdown-item">Como PDF</a></li>
                                <li><a href="<?php echo e(route('export.excel', ['students' => json_encode($students)])); ?>"
                                        class="dropdown-item">Como Excel</a></li>
                            </ul>
                        </div>
                    </div>
                    <form method="GET" action="<?php echo e(route('students.index')); ?>">
                        <div class="form-group flex ">
                            <a class="px-1">Nombre:</a>
                            <input type="text" class="w-30 h-7 rounded-sm border border-gray-300 " name="nombre"
                                value="<?php echo e(request('nombre')); ?>">
                            <a class="px-1">Año:</a>
                            <select name="anio" class="h-7 px-15 py-1 text-sm rounded-sm border border-gray-300">
                                <option value="">Todos</option>
                                <option value="1" <?php echo e(request('anio') == '1' ? 'selected' : ''); ?>>1ro</option>
                                <option value="2" <?php echo e(request('anio') == '2' ? 'selected' : ''); ?>>2do</option>
                                <option value="3" <?php echo e(request('anio') == '3' ? 'selected' : ''); ?>>3ro</option>
                            </select>
                            <button type="submit" class="btn btn-primary  h-7 pb-3 pt-0 mb-4 mx-2 border-gray-300"><span
                                    class="bi bi-search"></span> Filtrar
                            </button>
                            <?php if(request()->has('nombre') || request()->has('anio')): ?>
                                <a href=" <?php echo e(route('students.index')); ?>"
                                    class="btn btn-primary h-7 pb-3 pt-0 mb-4 mx-2 border-gray-300">
                                    Mostrar todos
                                </a>
                            <?php endif; ?>
                        </div>
                    </form>
                    <table class="table table-striped table-bordered text-center">
                        <thead>
                            <tr>
                                <th scope="col">Dni</th>
                                <th scope="col">Apellido</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Nacimiento</th>
                                <th scope="col">Año</th>
                                <th scope="col">Asistencia</th>
                                <th scope="col">Condicion</th>
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
                                    <td>
                                        <?php if(isset($student->porcentaje)): ?>
                                            <?php echo e($student->porcentaje); ?> %
                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo e($student->condicion); ?></td>
                                    <td>
                                        <div class="form-group flex gap-1">
                                            <a href="<?php echo e(route('students.show', $student->id)); ?>"
                                            class="btn btn-warning btn-sm"><i class="bi bi-eye"></i> Show</a>

                                            <a href="<?php echo e(route('students.edit', $student->id)); ?>"
                                            class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>

                                            <form action="<?php echo e(route('students.destroy', $student->id)); ?>" method="post"
                                                id="delete">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <button type="button" class="btn btn-danger btn-sm"
                                                    onclick="confirmDelete('<?php echo e(route('students.destroy', $student->id)); ?>')">
                                                    <i class="bi bi-trash"></i> Delete
                                                </button>
                                            </form>
                                            
                                            <form method="POST" action="<?php echo e(route('assists.store')); ?>">
                                                <?php echo csrf_field(); ?>
                                                <input type="hidden" name="student_id" value="<?php echo e($student->id); ?>">
                                                <button type="submit" class="btn btn-success btn-sm"><i class="bi bi-plus-circle"></i>
                                                Agregar Asistencia</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="6">
                                        <span class="text-danger">
                                            <strong>No hay estudiantes</strong>
                                        </span>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        function confirmDelete(deleteUrl) {
            Swal.fire({
                title: 'Estas seguro?',
                text: 'Tambien se perderan las asistencias',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: 'Eliminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete').submit();
                }
            });
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\laravel-crud - copia\resources\views/students/index.blade.php ENDPATH**/ ?>
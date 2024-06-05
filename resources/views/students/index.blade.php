@extends('layouts.app')

@section('header')

@section('content')

    <div class="row justify-content-center mt-3">
        <div class="col-md-12">
            @if (!empty($birthdays))
                <div class="alert alert-success alert-dismissible fade show container-md" role="alert">
                    <h2>Estudiantes que cumplen años hoy</h2>
                    @foreach ($birthdays as $student)
                        🎉 {{ $student->apellido }},{{ $student->nombre }} <br>
                    @endforeach
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show container-md" role="alert">
                    <i class="bi bi-exclamation-triangle-fill"></i> {{ $message }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                {{-- <div class="alert alert-success container-md" role="alert">
                    {{ $message }}
                </div> --}}
            @endif
            @if ($message = Session::get('error'))
                <div class="alert alert-danger alert-dismissible fade show container-md" role="alert">
                    <i class="bi bi-exclamation-triangle-fill"></i> {{ $message }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if ($message = Session::get('parameters'))
                <div class="alert alert-danger fade show container-md" role="alert">
                    <i class="bi bi-exclamation-triangle-fill"></i> {{ $message }}
                </div>
            @endif

            <div class="card container-md ">
                <div class="card-header">
                    <a>Student List </a>
                </div>
                <div class="card-body">
                    <div class="form-group flex p-1 gap-1">
                        <a href="{{ route('students.create') }}" class="btn btn-success btn-sm mb-3"><i
                                class="bi bi-plus-circle"></i> Añadir Estudiante</a>
                        <a href="{{ Route('assists.create') }}" class="btn btn-success btn-sm mb-3"><i
                                class="bi bi-plus-circle"></i> Agregar Asistencia por DNI</a>
                        {{-- <a href="{{ route('students.export', [$students]) }}" class="btn btn-success btn-sm mb-3"><i
                                    class="bi bi-plus-circle"></i> Exportar</a> --}}
                        <div class="dropdown">
                            <button class="btn btn-primary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Exportar Lista Actual
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="{{ route('export.pdf', ['students' => json_encode($students)]) }}"
                                        class="dropdown-item">Como PDF</a></li>
                                <li><a href="{{ route('export.excel', ['students' => json_encode($students)]) }}"
                                        class="dropdown-item">Como Excel</a></li>
                            </ul>
                        </div>
                    </div>
                    <form method="GET" action="{{ route('students.index') }}">
                        <div class="form-group flex ">
                            <a class="px-1">Nombre:</a>
                            <input type="text" class="w-30 h-7 rounded-sm border border-gray-300 " name="nombre"
                                value="{{ request('nombre') }}">
                            <a class="px-1">Año:</a>
                            <select name="anio" class="h-7 px-15 py-1 text-sm rounded-sm border border-gray-300">
                                <option value="">Todos</option>
                                <option value="1" {{ request('anio') == '1' ? 'selected' : '' }}>1ro</option>
                                <option value="2" {{ request('anio') == '2' ? 'selected' : '' }}>2do</option>
                                <option value="3" {{ request('anio') == '3' ? 'selected' : '' }}>3ro</option>
                            </select>
                            <button type="submit" class="btn btn-primary  h-7 pb-3 pt-0 mb-4 mx-2 border-gray-300"><span
                                    class="bi bi-search"></span> Filtrar
                            </button>
                            @if (request()->has('nombre') || request()->has('anio'))
                                <a href=" {{ route('students.index') }}"
                                    class="btn btn-primary h-7 pb-3 pt-0 mb-4 mx-2 border-gray-300">
                                    Mostrar todos
                                </a>
                            @endif
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
                            @forelse ($students as $student)
                                <tr>
                                    <td>{{ $student->dni }}</td>
                                    <td>{{ $student->apellido }}</td>
                                    <td>{{ $student->nombre }}</td>
                                    <td>{{ date('d-m-Y', strtotime($student->nacimiento)) }}</td>
                                    <td>{{ $student->anio }}</td>
                                    <td>
                                        @isset($student->porcentaje)
                                            {{ $student->porcentaje }} %
                                        @endisset
                                    </td>
                                    <td>{{ $student->condicion }}</td>
                                    <td>
                                        <div class="form-group flex gap-1">
                                            <a href="{{ route('students.show', $student->id) }}"
                                            class="btn btn-warning btn-sm"><i class="bi bi-eye"></i> Show</a>

                                            <a href="{{ route('students.edit', $student->id) }}"
                                            class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>

                                            <form action="{{ route('students.destroy', $student->id) }}" method="post"
                                                id="delete">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-danger btn-sm"
                                                    onclick="confirmDelete('{{ route('students.destroy', $student->id) }}')">
                                                    <i class="bi bi-trash"></i> Delete
                                                </button>
                                            </form>
                                            
                                            <form method="POST" action="{{ route('assists.store') }}">
                                                @csrf
                                                <input type="hidden" name="student_id" value="{{ $student->id }}">
                                                <button type="submit" class="btn btn-success btn-sm"><i class="bi bi-plus-circle"></i>
                                                Agregar Asistencia</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6">
                                        <span class="text-danger">
                                            <strong>No hay estudiantes</strong>
                                        </span>
                                    </td>
                                </tr>
                            @endforelse
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
@endsection

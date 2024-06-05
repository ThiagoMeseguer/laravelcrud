@extends('layouts.app')
@section('header', 'Agregar asistencias')
@section('content')

    <div class="card" style="padding: 10px;">
        <div class="card-body">
            <form method="GET" action="{{ route('assists.create') }}" class="text-center">
                <div class="form-row align-items-center justify-content-center">
                    <x-input-label for="dni" :value="__('DNI')" />
                    <x-text-input id="dni" class="mt-1" type="number" name="dni" :value="old('dni', isset($dni) ? $dni : null)" required />
                    <x-input-error :messages="$errors->get('dni')" class="mt-2" />
                    <br>
                    <button type="submit" class="btn btn-primary btn-sm mt-2">Buscar</button>
                </div>
            </form>
        </div>
    </div>


    @if (Session::has('success'))
        <div class="alert alert-success mt-3">
            {{ Session::get('success') }}
        </div>
    @endif

    @if (Session::has('error'))
        <div class="alert alert-danger">
            {{ Session::get('error') }}
        </div>
    @endif

    @if (isset($students))
        {{-- @dd($student->nombre) --}}
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
                    @forelse ($students as $student)
                        <tr>
                            <td>{{ $student->dni }}</td>
                            <td>{{ $student->apellido }}</td>
                            <td>{{ $student->nombre }}</td>
                            <td>{{ date('d-m-Y', strtotime($student->nacimiento)) }}</td>
                            <td>{{ $student->anio }}</td>
                            <td style="text-align: center">
                                <form method="POST" action="{{ route('assists.store') }}">
                                    @csrf
                                    <input type="hidden" name="student_id" value="{{ $student->id }}">
                                    <button type="submit" class="btn btn-primary btn-sm">Agregar Asistencia</button>
                                </form>
                            </td>
                        <tr>
                    @empty
                    <tr>
                            <td colspan="6">
                                <span class="text-danger">
                                    <strong>Estudiante no encontrado</strong>
                                </span>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    @endif


    </body>

    </html>

@endsection

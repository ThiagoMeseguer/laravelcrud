@extends('layouts.app')

@section('content')
    <div class="row justify-content-center mt-3">
        <div class="col-md-12">
            @if ($message = Session::get('success'))
                <div class="alert alert-success" role="alert">
                    {{ $message }}
                </div>
            @endif

            <div class="card container-md ">
                <div class="card-header">
                    <a>Assists List </a>
                </div>
                <div class="card-body container-md d-flex justify-content-center">
                    
                    <table class="table table-striped table-bordered text-center" style="max-width: 700px">
                        <thead>
                            <tr>
                                <th scope="col">Apellido</th>
                                <th scope="col">Nombre</th>
                                <th scope="col" style="width: 140px">Cant Asistencia</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($students as $student)
                                <tr>
                                    <td> {{ $student->apellido }} </td>
                                    <td> {{ $student->nombre }} </td>
                                    <td> {{ $student->assist->count() }} </td>
                                    <td>
                                        <a href="{{ route('assists.show', $student->id) }}"
                                            class="btn btn-warning btn-sm {{ $student->assist->count() == 0 ? ' disabled' : '' }} ">
                                            <i class="bi bi-eye"></i> Show</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6">
                                        <span class="text-danger">
                                            <strong>No Student Found!</strong>
                                        </span>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center">
                        {{-- {{ $students->links() }} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

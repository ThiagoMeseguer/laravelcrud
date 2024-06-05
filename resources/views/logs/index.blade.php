@extends('layouts.app')

@section('content')
<div class="container mt-5 d-flex justify-content-center">
    <div class="card w-100" style="max-width: 1000px;">
        <div class="card-body">
            <h5 class="card-title mb-4">Logs</h5>
            <table class="table table-striped table-bordered text-center">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">User ID</th>
                        <th scope="col">Accion</th>
                        <th scope="col">Direccion IP</th>
                        <th scope="col">Navegador</th>
                        <th scope="col">Fecha y Hora</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($logs as $log)
                        <tr>
                            <td>{{ $log->id }}</td>
                            <td>{{ $log->id_user }}</td>
                            <td>{{ $log->accion }}</td>
                            <td>{{ $log->ip }}</td>
                            <td>{{ $log->navegador }}</td>
                            <td>{{ $log->created_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
<table class="table table-striped table-bordered text-center">
    <thead>
        <tr>
            <th scope="col">Dni</th>
            <th scope="col">Apellido</th>
            <th scope="col">Nombre</th>
            <th scope="col">Año</th>
            <th scope="col">Asistencia</th>
            <th scope="col">Condicion</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($students as $student)
            <tr>
                <td>{{ $student->dni }}</td>
                <td>{{ $student->apellido }}</td>
                <td>{{ $student->nombre }}</td>
                <td>{{ $student->anio }}</td>
                <td>{{ count($student->assist) }}</td>
                <td>{{ $student->condicion }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

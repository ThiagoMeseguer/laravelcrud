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
            @foreach ($students as $student)
            <tr>
                    <td>{{ $student->dni }}</td>
                    <td>{{ $student->apellido }}</td>
                    <td>{{ $student->nombre }}</td>
                    <td>{{ $student->anio }}</td>
                    <td>{{ count($student->assist)}}</td>
                    <td>{{ $student->condicion }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </body>
    </html>
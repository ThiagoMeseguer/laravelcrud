@extends('layouts')
@section('titulo', 'Asistencias')
@section('content')
{{-- Arrays student y assists --}}
    <h4>Asistencias de {{ $student->apellido }},{{ $student->nombre }}</h4>

    <ul>
        @if (count($assists) > 0)
            <h6>Cantidad de Asistencias: {{count($assists)}}</h6>
            @foreach ($assists as $assist)
            <li>{{ date_format($assist->created_at,"d-m-Y") }} </li>
            @endforeach
        @else
            <h6>No tiene asistencias</h6>
        @endif
    </ul>
@endsection
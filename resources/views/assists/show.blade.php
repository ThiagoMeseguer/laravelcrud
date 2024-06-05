@extends('layouts.app')

@section('content')
    <div class="row justify-content-center mt-3">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="float-start">
                        Asistencias de {{ $student->nombre }} {{ $student->apellido }}.
                    </div>
                    <div class="float-end">
                        <a href="{{ route('assists.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                    </div>
                </div>
                <div class="card-body d-flex justify-content-center">
                    <div class="col-md-6" style="line-height: 0px;">
                        <h5> Cantidad total de asistencias: {{ $assists->count() }} </h5>
                        <table class="table table-striped table-bordered">
                            @foreach ($assists as $assist)
                                <tr>
                                    <td class="p-4"> {{ $assist->fecha }} </td>
                                    <td>
                                        <form action="{{ route('assists.destroy', $assist->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Do you want to delete this student?');"><i
                                                    class="bi bi-trash"></i> Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

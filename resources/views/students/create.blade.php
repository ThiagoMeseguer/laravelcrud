@extends('layouts.app')

@section('content')

<div class="row justify-content-center mt-3">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Añadir Estudiante
                </div>
                <div class="float-end">
                    <a href="{{ url()->previous() }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('students.store') }}" method="post">
                    @csrf

                    <div class="mb-3 row">
                        <label for="dni" class="col-md-4 col-form-label text-md-end text-start">Dni</label>
                        <div class="col-md-6">
                          <input type="number" class="form-control @error('dni') is-invalid @enderror" id="dni" name="dni" value="{{ old('dni') }}">
                            @if ($errors->has('dni'))
                                <span class="text-danger">{{ $errors->first('dni') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="nombre" class="col-md-4 col-form-label text-md-end text-start">Nombre</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('nombre') is-invalid @enderror" id="nombre" name="nombre" value="{{ old('nombre') }}">
                            @if ($errors->has('nombre'))
                                <span class="text-danger">{{ $errors->first('nombre') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="apellido" class="col-md-4 col-form-label text-md-end text-start">Apellido</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('apellido') is-invalid @enderror" id="apellido" name="apellido" value="{{ old('apellido') }}">
                            @if ($errors->has('apellido'))
                                <span class="text-danger">{{ $errors->first('apellido') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="nacimiento" class="col-md-4 col-form-label text-md-end text-start">Nacimiento</label>
                        <div class="col-md-6">
                          <input type="date" class="form-control @error('nacimiento') is-invalid @enderror" id="nacimiento" name="nacimiento" value="{{ old('nacimiento') }}">
                            @if ($errors->has('nacimiento'))
                                <span class="text-danger">{{ $errors->first('nacimiento') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="anio" class="col-md-4 col-form-label text-md-end text-start">Año</label>
                        <div class="col-md-6">
                            <select class="form-control @error('description') is-invalid @enderror" id="anio" name="anio">
                                <option value="1">1ro</option>
                                <option value="2">2do</option>
                                <option value="3">3ro</option>
                            </select>
                            @if ($errors->has('anio'))
                                <span class="text-danger">{{ $errors->first('anio') }}</span>
                            @endif
                        </div>
                    </div>
                    
                    <div class="mb-3 row">
                        <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Add Student">
                    </div>
                    
                </form>
            </div>
        </div>
    </div>    
</div>
    
@endsection
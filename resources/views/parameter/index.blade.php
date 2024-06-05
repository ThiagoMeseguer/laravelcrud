@extends('layouts.app')

@section('content')
    <div class="row justify-content-center mt-3">
        <div class="col-md-6">

            @if ($message = Session::get('success'))
                <div class="alert alert-success" role="alert">
                    {{ $message }}
                </div>
            @endif
            {{-- @dd($parameters[0]->cant_dias) --}}
            <div class="card">
                <div class="card-header">
                    <div class="float-start">
                        Parametros
                    </div>
                    <div class="float-end">
                        <a href="{{ route('students.index') }}" class="btn btn-primary btn-sm">&larr; Back Students</a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('parameters.update', $parameters[0]->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        
                        <input name="id" type="hidden" value=1>
                        <div class="mb-3 row">
                            <label for="cant_dias" class="col-md-4 offset-md-1 col-form-label text-md-end text-start">Cantidad de dias</label>
                            <div class="col-md-6">
                                <input type="number" class="form-control-sm @error('cant_dias') is-invalid @enderror text-center" id="cant_dias" name="cant_dias" value="{{ $parameters[0]->cant_dias }}">
                                @if ($errors->has('cant_dias'))
                                    <span class="text-danger">{{ $errors->first('cant_dias') }}</span>
                                @endif
                            </div>
                        </div>
                       
                        <div class="mb-3 row">
                            <label for="promocion" class="col-md-4 offset-md-1 col-form-label text-md-end text-start">Promocion</label>
                            <div class="col-md-6">
                                <input type="number" class="form-control-sm @error('promocion') is-invalid @enderror text-center" id="promocion" name="promocion" value="{{ $parameters[0]->promocion }}">
                                @if ($errors->has('promocion'))
                                    <span class="text-danger">{{ $errors->first('promocion') }}</span>
                                @endif
                            </div>
                        </div>
                    
                        <div class="mb-3 row">
                            <label for="regular" class="col-md-4 offset-md-1 col-form-label text-md-end text-start">Regular</label>
                            <div class="col-md-6">
                                <input type="number" class="form-control-sm @error('regular') is-invalid @enderror text-center" id="regular" name="regular" value="{{ $parameters[0]->regular }}">
                                @if ($errors->has('regular'))
                                    <span class="text-danger">{{ $errors->first('regular') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row justify-content-center">
                            <div class="col-md-6 text-center">
                                <input type="submit" class="btn btn-primary" value="Update">
                            </div>
                        </div>
                    </form>                    
                </div>
            </div>
        </div>
    </div>
@endsection

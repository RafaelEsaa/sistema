@extends('layouts.app')

@include('layouts.menu')

@section('content')

    <div class="col-sm-9">

        <h2 class="text-center">Registrar Grado</h2>
        <div class="col-sm-12">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
        </div>

        <div class="col-sm-8 col-sm-offset-2">
            <form action="/register-grado" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group form-group{{ $errors->register->has('nombre_grado') ? ' has-error' : '' }}">
                    <label>Grado</label>
                    <select name="nombre_grado" class="form-control">
                        <option value="1er año">1er año</option>
                        <option value="2do año">2do año</option>
                        <option value="3er año">3er año</option>
                        <option value="4to año">4to año</option>
                        <option value="5to año">5to año</option>
                    </select>
                    @if ($errors->register->has('nombre_grado'))
                        <p class="message-danger">
                            {{ $errors->register->first('nombre_grado') }}
                        </p>
                    @endif
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
        </div>
    </div>

@endsection
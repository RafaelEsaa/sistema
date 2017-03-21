@extends('layouts.app')

@section('title', 'Page Title')

@include('layouts.menu')

@section('content')

    <div class="col-sm-9">

        <h2 class="text-center">Registrar Sección</h2>
        <div class="col-sm-12">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
        </div>

        <div class="col-sm-8 col-sm-offset-2">
            <form action="/register-seccion" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group form-group{{ $errors->register->has('nombre_seccion') ? ' has-error' : '' }}">
                    <label>Sección</label>
                    <input type="text" name="nombre_seccion" value="{{ old('nombre_seccion') }}" class="form-control" maxlength="1" placeholder="Sección">
                    @if ($errors->register->has('nombre_seccion'))
                        <p class="message-danger">
                            {{ $errors->register->first('nombre_seccion') }}
                        </p>
                    @endif
                </div>
                <input type="hidden" name="status" value="activo">

                <button type="submit" class="btn btn-default">Submit</button>
            </form>
        </div>
    </div>

@endsection

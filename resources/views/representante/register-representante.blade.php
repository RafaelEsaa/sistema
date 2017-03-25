@extends('layouts.app')

@section('title', 'Page Title')

@include('layouts.menu')

@section('content')

    <div class="col-sm-9 no-padding">
        <h2 class="text-center">Datos del Representante</h2>
        <div class="col-sm-12">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
        </div>
        <div class="col-sm-8 col-sm-offset-2">
            <form action="/register-representante" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group form-group{{ $errors->register->has('cedula') ? ' has-error' : '' }}">
                    <label>Cedula</label>
                    <input type="text" name="cedula" value="{{ old('cedula') }}" class="form-control" maxlength="8" placeholder="Cedula">
                    @if ($errors->register->has('cedula'))
                        <p class="message-danger">
                            {{ $errors->register->first('cedula') }}
                        </p>
                    @endif
                </div>
                <div class="form-group form-group{{ $errors->register->has('primer_nombre') ? ' has-error' : '' }}">
                    <label>Primer Nombre</label>
                    <input type="text" name="primer_nombre" value="{{ old('primer_nombre') }}" class="form-control" maxlength="45" placeholder="Primer Nombre">
                    @if ($errors->register->has('primer_nombre'))
                        <p class="message-danger">
                            {{ $errors->register->first('primer_nombre') }}
                        </p>
                    @endif
                </div>
                <div class="form-group form-group{{ $errors->register->has('segundo_nombre') ? ' has-error' : '' }}">
                    <label>Segundo Nombre</label>
                    <input type="text" name="segundo_nombre" value="{{ old('segundo_nombre') }}" class="form-control" maxlength="45" placeholder="Segundo Nombre">
                    @if ($errors->register->has('segundo_nombre'))
                        <p class="message-danger">
                            {{ $errors->register->first('segundo_nombre') }}
                        </p>
                    @endif
                </div>
                <div class="form-group form-group{{ $errors->register->has('primer_apellido') ? ' has-error' : '' }}">
                    <label>Primer Apellido</label>
                    <input type="text" name="primer_apellido" value="{{ old('primer_apellido') }}" class="form-control" maxlength="45" placeholder="Primer Apellido">
                    @if ($errors->register->has('primer_apellido'))
                        <p class="message-danger">
                            {{ $errors->register->first('primer_apellido') }}
                        </p>
                    @endif
                </div>
                <div class="form-group form-group{{ $errors->register->has('segundo_apellido') ? ' has-error' : '' }}">
                    <label>Segundo Apellido</label>
                    <input type="text" name="segundo_apellido" value="{{ old('segundo_apellido') }}" class="form-control" maxlength="45" placeholder="Segundo Apellido">
                    @if ($errors->register->has('segundo_apellido'))
                        <p class="message-danger">
                            {{ $errors->register->first('segundo_apellido') }}
                        </p>
                    @endif
                </div>
                <div class="form-group form-group{{ $errors->register->has('fecha_nacimiento') ? ' has-error' : '' }}">
                    <label>Fecha Nacimiento</label>
                    <input type="date" name="fecha_nacimiento" value="{{ old('fecha_nacimiento') }}" class="form-control" placeholder="Fecha Nacimiento">
                    @if ($errors->register->has('fecha_nacimiento'))
                        <p class="message-danger">
                            {{ $errors->register->first('fecha_nacimiento') }}
                        </p>
                    @endif
                </div>
                <div class="form-group form-group{{ $errors->register->has('telefono') ? ' has-error' : '' }}">
                    <label>Telefono</label>
                    <input type="text" name="telefono" value="{{ old('telefono') }}" class="form-control" maxlength="11" placeholder="Telefono">
                    @if ($errors->register->has('telefono'))
                        <p class="message-danger">
                            {{ $errors->register->first('telefono') }}
                        </p>
                    @endif
                </div>
                <div class="form-group form-group{{ $errors->register->has('direccion') ? ' has-error' : '' }}">
                    <label>Dirección</label>
                    <input type="text" name="direccion" value="{{ old('direccion') }}" class="form-control" maxlength="45" placeholder="Dirección">
                    @if ($errors->register->has('direccion'))
                        <p class="message-danger">
                            {{ $errors->register->first('direccion') }}
                        </p>
                    @endif
                </div>
                <div class="form-group form-group{{ $errors->register->has('sueldo_mensual') ? ' has-error' : '' }}">
                    <label for="exampleInputEmail1">Sueldo Mensual</label>
                    <input type="text" name="sueldo_mensual" maxlength="8" value="{{ old('sueldo_mensual') }}" class="form-control" placeholder="Sueldo Mensual">
                    @if ($errors->register->has('sueldo_mensual'))
                        <p class="message-danger">
                            {{ $errors->register->first('sueldo_mensual') }}
                        </p>
                    @endif
                </div>


                <button type="submit" class="btn btn-default">Submit</button>
            </form>
        </div>
    </div>
    </div>



@endsection
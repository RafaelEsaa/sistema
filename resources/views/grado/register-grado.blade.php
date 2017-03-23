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
                <div class="form-group form-group{{ $errors->register->has('nombre_seccion') ? ' has-error' : '' }}">
                    <label>Grado</label>
                    <select name="grados_id" class="form-control">

                        @foreach($grado as $grados)
                            <option value="{{$grados->id}}">{{$grados->nombre_grado}}</option>
                        @endforeach
                    </select>
                    @if ($errors->register->has('grados_id'))
                        <p class="message-danger">
                            {{ $errors->register->first('grados_id') }}
                        </p>
                    @endif

                    <label>Sección</label>
                    <select name="secciones_id" class="form-control">

                        @foreach($seccion as $secciones)
                            <option value="{{$secciones->id}}">{{$secciones->nombre_seccion}}</option>
                        @endforeach
                    </select>
                    @if ($errors->register->has('secciones_id'))
                        <p class="message-danger">
                            {{ $errors->register->first('secciones_id') }}
                        </p>
                    @endif

                    <input name="ano_escolar_id" value="2016">
                    <input name="user_id" value="1">
                </div>
                <input type="hidden" name="status" value="activo">

                <button type="submit" class="btn btn-default">Submit</button>
            </form>
        </div>
    </div>

@endsection
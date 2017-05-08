@extends('layouts.app')

@include('layouts.menu')

@section('content')

    <div class="col-sm-9">

        <h2 class="text-center">Registrar Grado y Sección</h2>
        <div class="col-sm-12">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
        </div>

        <div class="col-sm-8 col-sm-offset-2">
            <form action="/register-gradoseccion" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group form-group{{ $errors->register->has('nombre_grado') ? ' has-error' : '' }}">
                    <label>Grado</label>
                    <select name="grado_id" class="form-control">
                        @foreach($grado as $grados)
                            <option value="{{$grados->id}}">{{$grados->nombre_grado}}</option>
                        @endforeach
                    </select>
                    <label>Seccion</label>
                    <select name="seccion_id" class="form-control">
                        @foreach($seccion as $secciones)
                            <option value="{{$secciones->id}}">{{$secciones->nombre_seccion}}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
        </div>
    </div>

@endsection
@extends('layouts.app')

@section('title', 'Page Title')

@include('layouts.menu')

@section('content')

    <div class="col-sm-9 no-padding">
        <h2 class="text-center">Busqueda! Datos del Estudiante</h2>
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
            <form action="/buscar-student" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group form-group{{ $errors->buscar->has('cedula') ? ' has-error' : '' }}">
                    <label>Cedula de Identidad</label>
                    <input type="text" name="cedula" value="{{ old('cedula') }}" class="form-control" maxlength="8" placeholder="Cedula">
                    @if ($errors->buscar->has('cedula'))
                        <p class="message-danger">
                            {{ $errors->buscar->first('cedula') }}
                        </p>
                    @endif
                </div>

                <button type="submit" class="btn btn-default">Submit</button>
            </form>

            <table class="table table-hover">

            </table>
            @if(isset($student))
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Datos</th>
                        <th>Resultado</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Primer Nombre</td>
                            <td><p>{{$student->primer_nombre}}</p></td>
                        </tr>
                        <tr>
                            <td>Segundo Nombre</td>
                            <td><p>{{$student->segundo_nombre}}</p></td>
                        </tr>
                        <tr>
                            <td>Primer Apellido</td>
                            <td><p>{{$student->primer_apellido}}</p></td>
                        </tr>
                        <tr>
                            <td>Segundo Apellido</td>
                            <td><p>{{$student->segundo_apellido}}</p></td>
                        </tr>
                        <tr>
                            <td>Fecha de Nacimiento</td>
                            <td><p>{{$student->fecha_nacimiento}}</p></td>
                        </tr>
                        <tr>
                            <td>Dirección</td>
                            <td><p>{{$student->direccion}}</p></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td><p>{{$student->segundo_apellido}}</p></td>
                        </tr>
                        <tr>
                            <td>Grado/Sección</td>
                                <td>
                        @foreach($student->gradoseccion as $grado)
                                <p>{{$grado->grado->nombre_grado}} {{$grado->seccion->nombre_seccion}}</p>
                        @endforeach
                                </td>
                        </tr>
                        <tr>
                            <td>Representante</td>
                            <td><p>{{$student->representante->primer_nombre}}
                                {{$student->representante->segundo_nombre}}
                                {{$student->representante->primer_apellido}}
                                {{$student->representante->segundo_apellido}}</p></td>
                        </tr>
                        <tr>
                            <td>Cedula Representante</td>
                            <td><p>{{$student->representante->cedula}}</p></td>
                        </tr>
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection
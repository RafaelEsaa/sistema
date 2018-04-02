@extends('layouts.app')

@section('title', 'Page Title')

@include('layouts.menu')

@section('content')

<h2 class="text-center">Listar Grado</h2>

    <div class="col-sm-9">
        <div class="col-sm-8 col-sm-offset-2">

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Registro</th>
                        <th>Status</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($grado as $grados)
                    <tr>
                        <td>{{$grados->nombre_grado}}</td>
                        @if($grados->status == "enable")
                            <td><p class="message-success">Habilitado</p></td>
                            <td>
                                <a href="{{url('/listar-grado-disable/'.$grados->id)}}"><button type="button" class="btn btn-danger">Inhabilitar</button></a>
                            </td>
                        @else
                            <td><p class="message-danger">Inhabilitado</p></td>
                            <td>
                                <a href="{{url('/listar-grado-enable/'.$grados->id)}}"><button type="button" class="btn btn-primary">Habilitar</button></a>
                            </td>
                        @endif

                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>




@endsection

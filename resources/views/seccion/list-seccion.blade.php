@extends('layouts.app')

@section('title', 'Page Title')

@include('layouts.menu')

@section('content')

    <div class="col-sm-9">
        <div class="col-sm-8 col-sm-offset-2">

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Registro</th>
                        <th>Seccion</th>
                        <th>Status</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($seccion as $secciones)
                    <tr>
                        <td>Seccion</td>
                        <td>{{$secciones->nombre_seccion}}</td>
                        @if($secciones->status == "Habilitado")
                            <td><p class="message-success">{{$secciones->status}}</p></td>
                            <td>
                                <a href="{{url('/listar-seccion-disable/'.$secciones->id)}}"><button type="button" class="btn btn-danger">Inhabilitar</button></a>
                                <a href="{{url('/xxxx/'.$secciones->id)}}"><button type="button" class="btn btn-primary">Actualizar</button></a>
                            </td>
                        @else
                            <td><p class="message-danger">{{$secciones->status}}</p></td>
                            <td>
                                <a href="{{url('/listar-seccion-enable/'.$secciones->id)}}"><button type="button" class="btn btn-primary">Habilitar</button></a>
                                <a href="{{url('/xxxx/'.$secciones->id)}}"><button type="button" class="btn btn-primary">Actualizar</button></a>
                            </td>
                        @endif

                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>




@endsection

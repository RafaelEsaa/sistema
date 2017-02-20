@extends('layouts.app')

@section('title', 'Page Title')

@include('layouts.menu')

@section('content')

    <div class="col-sm-9 no-padding">
        <p>Main content goes here</p>
        <div class="col-sm-8 col-sm-offset-2">
            <form action="/register-student" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <label>Primer Nombre</label>
                    <input type="text" name="primer_nombre" class="form-control" placeholder="Primer Nombre">
                </div>
                <div class="form-group">
                    <label>Segundo Nombre</label>
                    <input type="text" name="segundo_nombre" class="form-control" placeholder="Segundo Nombre">
                </div>
                <div class="form-group">
                    <label>Primer Apellido</label>
                    <input type="text" name="primer_apellido" class="form-control" placeholder="Primer Apellido">
                </div>
                <div class="form-group">
                    <label>Segundo Apellido</label>
                    <input type="text" name="segundo_apellido" class="form-control" placeholder="Segundo Apellido">
                </div>
                <div class="form-group">
                    <label>Fecha Nacimiento</label>
                    <input type="date" name="fecha_nacimiento" class="form-control" placeholder="Fecha Nacimiento">
                </div>
                <div class="form-group">
                    <label>Telefono</label>
                    <input type="text" name="telefono" class="form-control" placeholder="Telefono">
                </div>
                <div class="form-group">
                    <label>Dirección</label>
                    <input type="text" name="direccion" class="form-control" placeholder="Dirección">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Email">
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
        </div>
    </div>
</div>

@endsection
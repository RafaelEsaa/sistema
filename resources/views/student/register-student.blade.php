@extends('layouts.app')

@section('title', 'Page Title')

@include('layouts.menu')

@section('content')

    <div class="col-sm-9 no-padding">
        <h2 class="text-center">Datos del Estudiante</h2>
        <div class="col-sm-12">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
        </div>
        <div class="col-sm-8 col-sm-offset-2">
            <form action="/register-student" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group form-group{{ $errors->register->has('cedula') ? ' has-error' : '' }}">
                    <label>Cedula de Identidad</label>
                    <input type="text" name="cedula" value="{{ old('cedula') }}" class="form-control" maxlength="8" placeholder="Cedula">
                    @if ($errors->register->has('cedula'))
                        <p class="message-danger">
                            {{ $errors->register->first('cedula') }}
                        </p>
                    @endif
                </div>
                <div class="form-group form-group{{ $errors->register->has('primer_nombre') ? ' has-error' : '' }}">
                    <label>Primer Nombre</label>
                    <input type="text" name="primer_nombre" value="{{ old('primer_nombre') }}" maxlength="45" class="form-control" placeholder="Primer Nombre">
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
                    <input type="date" name="fecha_nacimiento" value="{{ old('fecha_nacimiento') }}" class="form-control" maxlength="45" placeholder="Fecha Nacimiento">
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
                <div class="form-group form-group{{ $errors->register->has('email') ? ' has-error' : '' }}">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="text" name="email" value="{{ old('email') }}" class="form-control" placeholder="Email">
                    @if ($errors->register->has('email'))
                        <p class="message-danger">
                            {{ $errors->register->first('email') }}
                        </p>
                    @endif
                </div>

                <div class="form-group {{ $errors->register->has('representante_id') ? ' has-error' : '' }}">
                    <label>Representante</label>
                    <input type="text" placeholder="Buscar Representante" class="form-control" id="search_text">
                    <input type="hidden" name="representante_id" id="buscado">
                    @if ($errors->register->has('representante_id'))
                        <p class="message-danger">
                            {{ $errors->register->first('representante_id') }}
                        </p>
                    @endif
                </div>

                <label>Grado</label>
                <select name="grado_id" class="form-control">

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
                <select name="seccion_id" class="form-control">

                    @foreach($seccion as $secciones)
                        <option value="{{$secciones->id}}">{{$secciones->nombre_seccion}}</option>
                    @endforeach
                </select>
                @if ($errors->register->has('secciones_id'))
                    <p class="message-danger">
                        {{ $errors->register->first('secciones_id') }}
                    </p>
                @endif

                <button type="submit" class="btn btn-default">Submit</button>
            </form>
        </div>
    </div>
</div>

    <script>
        $(document).ready(function() {
            src = "{{ route('searchajax') }}";
            $('#search_text').autocomplete({
                source: function(request, response) {
                    $.ajax({
                        url: src,
                        dataType: "json",
                        data: {
                            term : request.term
                        },
                        success: function(data) {
                            console.log(data)
                            response(data);

                        }
                    });
                },
                min_length: 3,
                select: function(event, ui) {
                    console.log(ui)
                    $('#buscado').val(ui.item.id);
                }

            });
        });
    </script>

@endsection
@extends('layouts.app')

@section('title', 'Page Title')

@include('layouts.menu')

@section('content')

    <div class="col-sm-9">

        <h2 class="text-center">Registrar Año Escolar</h2>
        <div class="col-sm-12">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
        </div>

        <div class="col-sm-8 col-sm-offset-2">
            <form action="/register-ano-escolar" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group {{ $errors->register->has('nombre_ano') ? ' has-error' : '' }}">
                    <label>Año Escolar</label>
                    <input type="text" placeholder="2001-2002" maxlength="9" name="nombre_ano" class="form-control" id="ano_escolar">
                    @if ($errors->register->has('nombre_ano'))
                        <p class="message-danger">
                            {{ $errors->register->first('nombre_ano') }}
                        </p>
                    @endif
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
        </div>
    </div>

    <script>

        function textLegth(value){

            if(value.length == 4) return true;
            return false
        }

        var inputBox = document.getElementById('ano_escolar');

        inputBox.onkeyup = function(key){
            /*const firstHalt = inputBox.value.substr(0,4);
            const secondHalf = inputBox.value.substr(4,8);
            const strAno = firstHalt+'-'+secondHalf;*/

            if(key.code == 'Backspace'){
                inputBox.value = '';
            }
            if (textLegth(inputBox.value)){
                console.log(inputBox.value.split(""));
                inputBox.value += '-';
            }
        }
    </script>
@endsection
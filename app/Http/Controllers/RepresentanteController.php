<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Representante;
use App\Validations\RepresentanteValidations;

class RepresentanteController extends Controller{

    public function getViewRegister(){

        return view('representante/register-representante');
    }

    public function registerRepresentante(Request $request) {

        $data = $request->all();

        $validator = RepresentanteValidations::registerRepresentanteValidation($data);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator, 'register')
                ->withInput();
        }

        $userRepresentante = new Representante();
        $userRepresentante->cedula= $data['cedula'];
        $userRepresentante->primer_nombre = $data['primer_nombre'];
        $userRepresentante->segundo_nombre = $data['segundo_nombre'];
        $userRepresentante->primer_apellido = $data['primer_apellido'];
        $userRepresentante->segundo_apellido = $data['segundo_apellido'];
        $userRepresentante->fecha_nacimiento = $data['fecha_nacimiento'];
        $userRepresentante->telefono = $data['telefono'];
        $userRepresentante->direccion = $data['direccion'];
        $userRepresentante->sueldo_mensual = $data['sueldo_mensual'];

        $userRepresentante->save();

        if ($userRepresentante->save()){

            return back()->with('status', 'Representante Registrado!');
        }

        return back()->with('status', 'Fallo el Registro!');
    }

    public function getViewLista(){

        return view('representante/lista-representante');
    }
}
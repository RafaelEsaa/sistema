<?php

namespace App\Http\Controllers;

use App\Models\Seccion;
use Illuminate\Http\Request;
use App\Validations\SeccionValidations;

class SeccionController extends Controller
{

    public function getViewRegisterSeccion()
    {
        return view('seccion/register-seccion');
    }

    public function registerSeccion(Request $request)
    {
        $data = $request->all();

        $validator = SeccionValidations::registerSeccionValidation($data);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator, 'register')
                ->withInput();
        }

        $seccion = new Seccion();
        $seccion->nombre_seccion = strtoupper($data['nombre_seccion']);
        $seccion->status = $data['status'];
        $seccion->save();
    }

    public function getListSeccion(){

        $seccion = Seccion::all();

        return view('seccion/list-seccion')->with('seccion', $seccion);
    }

    public function getDisableSeccion($id){

        $seccion = Seccion::find($id);
        $seccion->status = "Deshabilitado";
        $seccion->save();

        return back();
    }

    public function getEnableSeccion($id){

        $seccion = Seccion::find($id);
        $seccion->status = "Habilitado";
        $seccion->save();

        return back();
    }
}

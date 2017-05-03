<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Seccion;
use App\Models\Grado;
use App\Validations\GradoValidations;


class GradoController extends Controller
{
    public function getViewRegisterGrado(){
        $seccion = Seccion::all();
        $grado = Grado::all();
        return view('grado/register-grado')->with('seccion', $seccion)->with('grado', $grado);
    }

    public function registerGrado(Request $request){

        $data = $request->all();

        if ($data['nombre_grado'] == "1er año" || $data['nombre_grado'] == "2do año"
            || $data['nombre_grado'] == "3er año" || $data['nombre_grado'] == "4to año"
            || $data['nombre_grado'] == "5to año"){

            $validator = GradoValidations::registerGradoValidation($data);
            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator, 'register')
                    ->withInput();
            }

                $grado = new Grado();
                $grado->nombre_grado = $data['nombre_grado'];
                $grado->status = "enable";
                $grado->save();

                if ($grado->save()){
                    return back()->with('status', 'Grado registrado!');
                }
                return back()->with('status', 'Ocurrio un ERROR!');
            }

        return back();
    }

    public function listarGrado(){
        $grado = Grado::all();

        return view('grado/listar-grado')->with('grado', $grado);
    }

    public function getDisableGrado($id){

        $grado = Grado::find($id);
        $grado->status = "disable";
        $grado->save();

        return back();
    }

    public function getEnableGrado($id){

        $grado = Grado::find($id);
        $grado->status = "enable";
        $grado->save();

        return back();
    }
}
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

    public function registerGradoSeccion(Request $request){

        $data = $request->all();

//        $validator = GradoValidations::registerGradoValidation($data);
//        if ($validator->fails()) {
//            return redirect()->back()
//                ->withErrors($validator, 'register')
//                ->withInput();
//        }

        $grado = new Grado();
        //::find(1)->roles()->save($role, ['expires' => $expires]);
        $grado->secciones()->attach([['seccion_id' => 1, 'grado_id' => 1,'ano_escolar_id' => 1, 'user_id' => 1]]);

        echo "Listo";
    }
}
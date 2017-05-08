<?php

namespace App\Http\Controllers;

use App\Models\Grado;
use App\Models\Seccion;
use App\Models\GradoSeccion;
use Illuminate\Http\Request;
use App\Validations\GradoSeccionValidations;

class GradoSeccionController extends Controller
{
    public function getViewRegisterGradoSeccion(){

        $grado = Grado::all()->where('status', 'enable');
        $seccion = Seccion::all()->where('status', 'enable');

        return view('gradoseccion/register-gradoseccion')->with('grado', $grado)->with('seccion',$seccion);
    }

    public function registerGradoSeccion(Request $request){

        $data = $request->all();
        $gradoid = $data['grado_id'];
        $seccionid = $data['seccion_id'];

        $validator = GradoSeccionValidations::registerGradoSeccion($data);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator, 'register')
                ->withInput();
        }


        $busqueda = GradoSeccion::where([['grado_id', $gradoid], ['seccion_id', $seccionid]])->first();

        if (isset($busqueda)){
            return back()->with('error', 'Grado y Sección ya Registrada');
        }

        $gradoSeccion = new GradoSeccion();
        $gradoSeccion->status = "enable";
        $gradoSeccion->grado_id = $data['grado_id'];
        $gradoSeccion->seccion_id = $data['seccion_id'];

        $gradoSeccion->save();

        return back()->with('status', 'Grado y Sección Registrado');
    }
}

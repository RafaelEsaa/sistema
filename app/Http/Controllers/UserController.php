<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Grado;
use App\Models\Seccion;
use App\Models\AnoEscolar;
use App\Models\GradoSeccion;
use App\Models\Representante;
use Illuminate\Http\Request;
use App\Validations\UserValidations;

class UserController extends Controller
{

    public function autoComplete(Request $request) {

        $query = $request->get('term','');

        $representante = Representante::where('cedula','LIKE','%'.$query.'%')->get();

        $data=array();
        foreach ($representante as $product) {
            $data[]=array('value'=>$product->primer_nombre.' '.$product->segundo_nombre.' '.$product->primer_apellido,'id'=>$product->id);
        }
        if(count($data))
            return $data;
        else
            return ['value'=>'No Result Found','id'=>''];
    }

    public function getViewRegisterStudent(){
        //return view('student/register-student');
        $grado = Grado::all();
        $seccion = Seccion::all();
        $anoEscolar = AnoEscolar::all()->where('status', 'enable');
        return view('student/register-student')
            ->with('saludo', 'Hola Mundo')
            ->with('grado', $grado)
            ->with('seccion', $seccion)
            ->with('anoEscolar', $anoEscolar);
    }

    public function registerStudent(Request $request){

        /*$validator = RepresentanteValidations::registerRepresentanteValidation($data);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator, 'registerRepresentante')
                ->withInput();
        }*/

        /*$studentValidation = UserValidations::registerValidation($data);
        $representanteValidation = RepresentanteValidations::registerRepresentanteValidation($data);

        if ($studentValidation->fails() && $representanteValidation->fails()) {
            return redirect()->back()
                ->withErrors($studentValidation, 'register')
                ->withErrors($representanteValidation,'registerRepresentante')
                ->withInput();
        }*/

        $data = $request->all();

        $validator = UserValidations::registerValidation($data);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator, 'register')
                ->withInput();
        }

        $grado = new Grado();

        $userStudent = new User();
        $userStudent->cedula= $data['cedula'];
        $userStudent->primer_nombre = $data['primer_nombre'];
        $userStudent->segundo_nombre = $data['segundo_nombre'];
        $userStudent->primer_apellido = $data['primer_apellido'];
        $userStudent->segundo_apellido = $data['segundo_apellido'];
        $userStudent->fecha_nacimiento = $data['fecha_nacimiento'];
        $userStudent->telefono = $data['telefono'];
        $userStudent->direccion = $data['direccion'];
        $userStudent->email = $data['email'];
        $password = $userStudent->createPassword();
        $userStudent->password = $password;
        $userStudent->representante_id = $data['representante_id'];

        $userStudent->save();

        if ($userStudent->save()){

            $userStudent->roles()->attach(5);
            $grado->secciones()->attach([
                    ['seccion_id' => $request['seccion_id'],
                    'grado_id' => $data['grado_id'],
                    'ano_escolar_id' => $data['ano_escolar_id'],
                    'user_id' => $userStudent->id]]);

            return back()->with('status', 'Estudiante Inscrito y Representante Asignado!');
        }

        return back()->with('status', 'Estudiante Inscrito y Representante NO Asignado!');
    }

    public function getViewBuscarStudent(){

        return view('student/buscar-student');
    }

    public function buscarStudent(Request $request){

        $data = $request->all();

        $student = User::where('cedula', $data['cedula'])->first();

        return view('student/buscar-student')->with('student', $student);
    }
}

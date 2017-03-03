<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Representante;
use Illuminate\Http\Request;
use App\Validations\UserValidations;
use App\Validations\RepresentanteValidations;

class UserController extends Controller
{

    public function autoComplete(Request $request) {

        $query = $request->get('term','');

        $representante = Representante::where('primer_nombre','LIKE','%'.$query.'%')->get();

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
        return view('student/register-student');
    }

    public function registerStudent(Request $request){

        $data = $request->all();

        dd($data);

        $validator = UserValidations::registerValidation($data);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator, 'register')
                ->withInput();
        }

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

        $userStudent = new User();
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

        /*$userRepresentante = new Representante();
        $userRepresentante->primer_nombre = $data['primer_nombre_representante'];
        $userRepresentante->segundo_nombre = $data['segundo_nombre_representante'];
        $userRepresentante->primer_apellido = $data['primer_apellido_representante'];
        $userRepresentante->segundo_apellido = $data['segundo_apellido_representante'];
        $userRepresentante->fecha_nacimiento = $data['fecha_nacimiento_representante'];
        $userRepresentante->telefono = $data['telefono_representante'];
        $userRepresentante->direccion = $data['direccion_representante'];
        $userRepresentante->sueldo_mensual = $data['sueldo_mensual_representante'];*/

        //$userStudent->save();
        //$userRepresentante->save();

        return back()->with('status', 'Estudiante Inscrito y Representante Registrado!');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Validations\UserValidations;

class UserController extends Controller
{

    public function getViewRegisterStudent(){
        return view('student/register-student');
    }

    public function registerStudent(Request $request){

        $data = $request->all();

        $validator = UserValidations::registerValidation($data);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator, 'register')
                ->withInput();
        }

        $userStudent = new User();
        $password = $userStudent->createPassword();
        $userStudent->primer_nombre = $data['primer_nombre'];
        $userStudent->segundo_nombre = $data['segundo_nombre'];
        $userStudent->primer_apellido = $data['primer_apellido'];
        $userStudent->segundo_apellido = $data['segundo_apellido'];
        $userStudent->fecha_nacimiento = $data['fecha_nacimiento'];
        $userStudent->telefono = $data['telefono'];
        $userStudent->direccion = $data['direccion'];
        $userStudent->email = $data['email'];
        $userStudent->password = $password;

        $userStudent->save();

        //return back()->withInput();
        return back()->with('status', 'Estudiante Inscrito!');
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

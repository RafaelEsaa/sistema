<?php

namespace App\Http\Controllers;

use DB;
use App\Models\AnoEscolar;
use Illuminate\Http\Request;
use App\Validations\AnoEscolarValidations;

class AnoEscolarController extends Controller
{
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
     * @param  \App\AnoEscolar  $anoEscolar
     * @return \Illuminate\Http\Response
     */
    public function show(AnoEscolar $anoEscolar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AnoEscolar  $anoEscolar
     * @return \Illuminate\Http\Response
     */
    public function edit(AnoEscolar $anoEscolar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AnoEscolar  $anoEscolar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AnoEscolar $anoEscolar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AnoEscolar  $anoEscolar
     * @return \Illuminate\Http\Response
     */
    public function destroy(AnoEscolar $anoEscolar)
    {
        //
    }

    public function getViewRegisterAnoEscolar(){
        return view('anoescolar/register-ano-escolar');
    }

    public function registerAnoEscolar(Request $request){

        $data = $request->all();

        $validator = AnoEscolarValidations::registerAnoEscolar($data);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator, 'register')
                ->withInput();
        }

        $anoEscolar = new AnoEscolar();
        $anoEscolar->nombre_ano = $data['nombre_ano'];
        $anoEscolar->status = 0;

        if ($anoEscolar->save()) return back()->with('status', 'Año Escolar Registrado!');
    }

    public function getViewListarAnoEscolar(){

        $anoEscolar = AnoEscolar::all();
        return view('anoescolar/listar-ano-escolar')->with('anoEscolar', $anoEscolar);
    }

    //Inhabilitar Ano Escolar
    public function getDisableAnoEscolar($id){
        echo "disable";
        /*$anoEscolar = AnoEscolar::find($id);
        $anoEscolar->status = "disable";
        $anoEscolar->save();*/

        return back();
    }

    //Habilitar Ano Escolar
    public function getEnableAnoEscolar($id){
        echo "enable";
        /*$anoEscolar = AnoEscolar::find($id);
        $anoEscolar->status = "enable";
        $anoEscolar->save();*/

        return back();
    }

}

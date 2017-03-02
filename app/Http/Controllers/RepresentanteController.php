<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Representante;

class RepresentanteController extends Controller{

    public function getViewRegister(){

        return view('representante/register-representante');
    }

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
}
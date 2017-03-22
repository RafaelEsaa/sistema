<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GradoController extends Controller
{
    public function getViewRegisterGrado(){
        return view('grado/register-grado');
    }
}

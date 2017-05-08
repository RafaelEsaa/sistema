<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GradoSeccionEstudiante extends Model
{
    protected $table = 'grado_seccion_estudiante';

    public function gradoseccion()
    {
        return $this->belongsTo('App\Models\GradoSeccion');
    }
}

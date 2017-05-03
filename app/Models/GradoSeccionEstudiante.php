<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GradoSeccionEstudiante extends Model
{
    protected $table = 'grado_seccion_estudiante';

    public function seccion()
    {
        return $this->belongsTo('App\Models\Seccion');
    }

    public function grado()
    {
        return $this->belongsTo('App\Models\Grado');
    }
}

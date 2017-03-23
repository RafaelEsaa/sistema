<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grado extends Model
{
    protected $fillable = [
        'nombre_grado',
    ];

    protected $table = 'grados';

    public function secciones()
    {
        return $this->belongsToMany('App\Models\Seccion', 'grado_seccion', 'seccion_id', 'grado_id', 'ano_escolar_id', 'user_id');
    }
}
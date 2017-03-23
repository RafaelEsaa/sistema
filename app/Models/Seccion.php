<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seccion extends Model
{
    protected $fillable = [
        'nombre_seccion',
    ];

    protected $table = 'secciones';

    public function grados()
    {
        return $this->belongsToMany('App\Models\Grado', 'grado_seccion',
            'seccion_id', 'grado_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grado extends Model
{
    protected $fillable = [
        'nombre_grado',
    ];

    protected $table = 'grados';

    public function gradoseccion()
    {
        return $this->belongsToMany('App\Models\GradoSeccion');
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seccion extends Model
{
    protected $fillable = [
        'nombre_seccion'
    ];

    protected $table = 'secciones';
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GradoSeccion extends Model
{
    protected $table = 'grado_seccion';

    protected $fillable = [
        'status',
    ];

    public function users()
    {
        return $this->belongsToMany('App\Models\User');
    }

    public function grado()
    {
        return $this->belongsTo('App\Models\Grado');
    }

    public function seccion()
    {
        return $this->belongsTo('App\Models\Seccion');
    }

    public function gradoSeccionEstudiantes(){
        return $this->hasMany('App\Models\GradoSeccionEstudiante');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Representante extends Model
{
    /**
     * Get the students for the representante or parient.
     */
    public function users()
    {
        return $this->hasMany('App\Models\User');
    }
}
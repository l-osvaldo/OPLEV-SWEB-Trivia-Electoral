<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AppUser extends Model
{
    protected $fillable = [
        'id',
        'nombre',
        'email',
        'edad',
        'sexo',
        'municipio',
        'password',
    ];
}

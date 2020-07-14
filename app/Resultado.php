<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resultado extends Model
{
    protected $fillable = [
        'id',
        'id_user_app',
        'aciertos',
        'errores',
    ];
}

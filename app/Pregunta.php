<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pregunta extends Model
{
    protected $fillable = [
        'id',
        'idrubro',
        'rubro',
        'idsubrubro',
        'subrubro',
        'etiquetas',
        'pregunta',
        'opcion_a',
        'opcion_b',
        'opcion_c',
        'respuesta',
        'complemento_error',
        'version',
        'status',
        'status_error',
        'actualizar_banco',
    ];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Areas extends Model
{
  protected $fillable = [
        'nombre', 'abreviatura', 'identificador', 'selloDigital',
    ];
}

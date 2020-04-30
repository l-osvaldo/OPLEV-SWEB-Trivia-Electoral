<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
  protected $fillable = [
    'nombre',
    'abreviatura',
    'identificador',
    'sello_digital',
  ];
}
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    protected $fillable = [
        'numdto',
        'nombredto',
        'nummpio',
        'nombrempio',
    ];
}

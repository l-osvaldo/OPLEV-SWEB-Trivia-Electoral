<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Distrito extends Model
{
    protected $fillable = [
        'numdto',
        'nombredto',
        'nombrecorto',
    ];
}

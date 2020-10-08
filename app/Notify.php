<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Date\Date;

class Notify extends Model
{
    protected $fillable = [
        'idUser', 'mensaje', 'email', 'nombre', 'created_at',
    ];

    public function getCreatedAtAttribute($date)
    {
        return new Date($date);
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkDay extends Model
{
    //se definen los campos actualizables en la tabla
    protected $fillable = [
        'day',
        'status',
        'mornning_start',
        'mornning_end',
        'afternoon_start',
        'afternoon_end',
        'user_id',

    ];
}

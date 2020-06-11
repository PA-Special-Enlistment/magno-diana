<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Returns extends Model
{
    protected $table = 'return';
    protected $fillable = [
        'assign_id',
        'equipment_id',
        'staff_id',
        'date_return',
        'remarks',
        'count'
    ];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assign extends Model
{
    protected $table = 'assign';
    protected $fillable = [
        'assign_date',
        'staff_id',
        'equipment_id',
        'count'
    ];
}

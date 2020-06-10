<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    protected $table = 'equipment';
    protected $fillable = [
        'user_id',
        'code',
        'name',
        'registration_date'
    ];
}

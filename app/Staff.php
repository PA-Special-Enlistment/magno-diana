<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $table = 'staff';
    protected $fillable = [
        'last_name',
        'first_name',
        'middle_name',
        'suffix_name',
        'designation',
        'mobile_number',
        'email',
        'birthdate'
    ];
}

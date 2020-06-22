<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LibEquipmentType extends Model
{
    protected $table = 'lib_type_equipment';

    protected $fillable = [
        'equipment_code',
        'equipment_desc'
    ];
}

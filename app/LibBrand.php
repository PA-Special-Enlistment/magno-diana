<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LibBrand extends Model
{
    protected $table = 'lib_brand';

    public function type(){
        return $this->hasOne('App\LibEquipmentType','equipment','equipment_desc');
        }
    
      public function brand(){
        return $this->belongsTo('App\LibBrand','brand','brand_desc');
        }
}

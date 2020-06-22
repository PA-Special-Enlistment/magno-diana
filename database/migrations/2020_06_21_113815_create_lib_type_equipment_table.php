<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLibTypeEquipmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lib_type_equipment', function (Blueprint $table) {
            $table->string('equipment_code');
            $table->string('equipment_desc');
        });

        DB::table('lib_type_equipment')
            ->insert([
                ['equipment_code' => '01', 'equipment_desc' => 'Laptop'],
                ['equipment_code' => '02', 'equipment_desc' => 'Desktop'],
                ['equipment_code' => '03', 'equipment_desc' => 'Mouse'],
                ['equipment_code' => '04', 'equipment_desc' => 'Keyboard'],
                ['equipment_code' => '05', 'equipment_desc' => 'Flashdrive']
            ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lib_type_equipment');
    }
}

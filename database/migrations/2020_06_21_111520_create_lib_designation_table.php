<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLibDesignationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lib_designation', function (Blueprint $table) {
            $table->string('code');
            $table->string('desc');
        });

        DB::table('lib_designation')
            ->insert([
                ['code' => '01', 'desc' => 'Clerk'],
                ['code' => '02', 'desc' => 'Technical Staff'],
                ['code' => '03', 'desc' => 'Software Developer']
            ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lib_designation');
    }
}

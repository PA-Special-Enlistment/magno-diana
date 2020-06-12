<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLibSuffixNameTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lib_suffix_name', function (Blueprint $table) {
            $table->char('suffix_code',5);
            $table->string('suffix_desc');
          });

      DB::table('lib_suffix_name')
        ->insert([
          ['suffix_code' => 'II', 'suffix_desc' => 'II'],
          ['suffix_code' => 'III', 'suffix_desc' => 'III'],
          ['suffix_code' => 'IV', 'suffix_desc' => 'IV'],
          ['suffix_code' => 'JR', 'suffix_desc' => 'Jr.'],
          ['suffix_code' => 'NOTAP', 'suffix_desc' => 'Not Applicable'],
          ['suffix_code' => 'SR', 'suffix_desc' => 'Sr.'],
          ['suffix_code' => 'V', 'suffix_desc' => 'V']
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lib_suffix_name');
    }
}

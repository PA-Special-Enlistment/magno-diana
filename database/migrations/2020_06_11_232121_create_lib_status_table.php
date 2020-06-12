<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLibStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lib_status', function (Blueprint $table) {
            $table->string('id');
            $table->string('desc');
        });
        DB::table('lib_status')
            ->insert([
                ['id' => 'new', 'desc' => 'New'],
                ['id' => 'assign', 'desc' => 'Assign'],
                ['id' => 'return', 'desc' => 'Return']
            ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lib_status');
    }
}

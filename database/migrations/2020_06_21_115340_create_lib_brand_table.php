<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLibBrandTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lib_brand', function (Blueprint $table) {
            $table->char('brand_code');
            $table->string('brand_desc');
            $table->string('category');
        });

        DB::table('lib_brand')
            ->insert([
                ['brand_code' => '01', 'brand_desc' => 'Asus', 'category' => 'Laptop'],
                ['brand_code' => '02', 'brand_desc' => 'MSI', 'category' => 'Laptop'],
                ['brand_code' => '03', 'brand_desc' => 'Lenovo', 'category' => 'Laptop'],
                ['brand_code' => '04', 'brand_desc' => 'A4Tech', 'category' => 'Mouse'],
                ['brand_code' => '05', 'brand_desc' => 'RAKK', 'category' => 'Keyboard']
            ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lib_brand');
    }
}

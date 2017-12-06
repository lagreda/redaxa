<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEcCitiesFk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ec_cities', function (Blueprint $table) {
            $table->integer('ec_province_id')->unsigned();
            $table->foreign('ec_province_id')->references('id')->on('ec_provinces');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ec_cities', function (Blueprint $table) {
            //
        });
    }
}

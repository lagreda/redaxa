<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProgramsAfterEspaeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programs_after_espae', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('program');
            $table->string('other')->nullable();
            $table->integer('status')->default(1);
            $table->string('additional1')->nullable();
            $table->string('additional2')->nullable();
            $table->string('additional3')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('programs_after_espae');
    }
}

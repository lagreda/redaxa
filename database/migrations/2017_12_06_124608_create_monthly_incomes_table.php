<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMonthlyIncomesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monthly_incomes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('income');
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
        Schema::dropIfExists('monthly_incomes');
    }
}

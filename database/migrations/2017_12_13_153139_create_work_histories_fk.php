<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkHistoriesFk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('work_histories', function (Blueprint $table) {
            $table->integer('business_area_id')->unsigned();
            $table->foreign('business_area_id')->references('id')->on('business_areas');
            $table->integer('job_position_id')->unsigned();
            $table->foreign('job_position_id')->references('id')->on('job_positions');
            $table->integer('monthly_income_id')->unsigned();
            $table->foreign('monthly_income_id')->references('id')->on('monthly_incomes');
            $table->integer('country_id')->unsigned();
            $table->foreign('country_id')->references('id')->on('countries');
            $table->integer('student_id')->unsigned();
            $table->foreign('student_id')->references('id')->on('students');
            $table->integer('working_area_id')->unsigned();
            $table->foreign('working_area_id')->references('id')->on('working_areas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('work_histories', function (Blueprint $table) {
            //
        });
    }
}

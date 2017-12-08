<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsFk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('students', function (Blueprint $table) {
            $table->integer('program_id')->unsigned();
            $table->foreign('program_id')->references('id')->on('programs');
            $table->integer('country_id_birth')->unsigned();
            $table->foreign('country_id_birth')->references('id')->on('countries');
            $table->integer('country_id_residence')->unsigned();
            $table->foreign('country_id_residence')->references('id')->on('countries');
            $table->integer('ec_city_id_birth')->unsigned()->nullable();
            $table->foreign('ec_city_id_birth')->references('id')->on('ec_cities');
            $table->integer('ec_city_id_residence')->unsigned()->nullable();
            $table->foreign('ec_city_id_residence')->references('id')->on('ec_cities');
            $table->integer('civil_status_id')->unsigned();
            $table->foreign('civil_status_id')->references('id')->on('civil_status');
            $table->integer('blood_type_id')->unsigned();
            $table->foreign('blood_type_id')->references('id')->on('blood_types');
            $table->integer('gender_id')->unsigned();
            $table->foreign('gender_id')->references('id')->on('genders');
            $table->integer('ethnic_group_id')->unsigned();
            $table->foreign('ethnic_group_id')->references('id')->on('ethnic_groups');
            $table->integer('job_status_id')->unsigned();
            $table->foreign('job_status_id')->references('id')->on('job_status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}

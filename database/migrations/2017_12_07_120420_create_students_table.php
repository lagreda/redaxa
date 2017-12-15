<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->string('legal_id')->unique();
            $table->string('passport_id')->unique();
            $table->string('photo')->nullable();
            $table->integer('program_group')->nullable();
            $table->string('name');
            $table->string('surname');
            $table->string('main_email')->unique();
            $table->string('mobile_number')->nullable();
            $table->string('home_number')->nullable();
            $table->string('work_number')->nullable();
            $table->date('birth_date')->nullable();
            $table->string('other_city_of_birth')->nullable();
            $table->string('home_address_1')->nullable();
            $table->string('home_address_2')->nullable();            
            $table->string('zip_code')->nullable();
            $table->string('map_lat')->nullable();
            $table->string('map_lon')->nullable();
            $table->string('facebook_url')->nullable();
            $table->string('linkedin_url')->nullable();
            $table->string('twitter_url')->nullable();
            $table->string('personal_url')->nullable();                                  
            $table->integer('current_job_experience_time')->nullable();
            $table->integer('current_managerial_experience_time')->nullable();
            $table->integer('planning_to_open_company')->nullable();
            $table->integer('main_obstacle_create_company')->nullable();            
            $table->integer('had_promotion_after_espae')->nullable();
            $table->integer('had_incomes_increase')->nullable();
            $table->integer('had_responsabilities_increase')->nullable();
            $table->integer('life_plan_after_espae')->nullable();
            $table->integer('reality_vs_expectative')->nullable();
            $table->integer('belong_level_espae')->nullable();
            $table->integer('work_knowledge_value')->nullable();
            $table->integer('life_knowledge_value')->nullable();
            $table->integer('satisfaction_level_espae')->nullable();                  
            $table->integer('would_recomend_espae')->nullable();
            $table->integer('graduate_services_wish')->nullable();
            $table->integer('satisfaction_level_graduate_relation')->nullable();
            $table->integer('other_programs_espae_in_future')->nullable();                  
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
        Schema::dropIfExists('students');
    }
}

<?php

use Illuminate\Database\Seeder;

class StudentLanguagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\StudentLanguage::class, 250)->create();
    }
}

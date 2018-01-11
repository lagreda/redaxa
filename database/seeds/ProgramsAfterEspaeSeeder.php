<?php

use Illuminate\Database\Seeder;

class ProgramsAfterEspaeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\ProgramAfterEspae::class, 190)->create();
    }
}

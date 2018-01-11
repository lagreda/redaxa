<?php

use Illuminate\Database\Seeder;

class WorkHistoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\WorkHistory::class, 450)->create();
    }
}

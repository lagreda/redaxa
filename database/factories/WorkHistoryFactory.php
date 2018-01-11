<?php

use Faker\Generator as Faker;

$factory->define(\App\WorkHistory::class, function (Faker $faker) {
    $current_job = $faker->numberBetween(0, 1);
    $finish_date = '2999-12-31';
    if($current_job == '0')
        $finish_date = $faker->dateTimeBetween('2018-01-05', 'now');
    return [
        'company' => $faker->company,
        'company_size' => $faker->numberBetween(1, 4),
        'address_1' => $faker->address,
        'address_2' => '',
        'phone' => $faker->phoneNumber,
        'ext' => '',
        'work_email' => $faker->email,
        'start_date' => $faker->date('Y-m-d', '2018-01-01'),
        'curret_job' => $current_job,
        'finish_date' => $finish_date,
        'yearly_sales' => $faker->numberBetween(30000, 1000000),
        'main_incomes_origin' => $faker->numberBetween(1, 5),
        'business_area_id' => $faker->numberBetween(1, 5),
        'job_position_id' => $faker->numberBetween(1, 5),
        'monthly_income_id' => $faker->numberBetween(1, 5),
        'country_id' => $faker->numberBetween(1, 10),
        'student_id' => $faker->numberBetween(2, 199),
        'working_area_id' => $faker->numberBetween(1, 5),

    ];
});

<?php

use Faker\Generator as Faker;

$factory->define(\App\ProgramAfterEspae::class, function (Faker $faker) {
    return [
        'program' => $faker->numberBetween(1, 10),
        'other' => '',
        'student_id' => $faker->numberBetween(2, 199),
    ];
});

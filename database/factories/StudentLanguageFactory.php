<?php

use Faker\Generator as Faker;

$factory->define(\App\StudentLanguage::class, function (Faker $faker) {
    return [
        'level' => $faker->numberBetween(1, 9),
        'language_id' => $faker->numberBetween(1, 5),
        'student_id' => $faker->numberBetween(2, 199),
    ];
});

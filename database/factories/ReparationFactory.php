<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Reparation;
use Faker\Generator as Faker;

$factory->define(Reparation::class, function (Faker $faker) {
    return [
        'matricula'=>$faker->word,
        'fecha'=>$faker->date($format = 'Y-m-d', $max = 'now'),
        'desrepara'=>$faker->text($maxNbChars = 200),
        'kilometros'=>$faker->numberBetween($min = 1000, $max = 199000)

    ];
});
<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Branche;
use Faker\Generator as Faker;
use Carbon\Carbon;

$factory->define(Branche::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'sales' => $faker->numberBetween(10000, 100000),
        'expenses' => $faker->numberBetween(1000, 9000),
        'date' => Carbon::parse(Carbon::yesterday())->format('Y/m/d'),
    ];
});

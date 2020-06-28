<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use Modules\Companies\Entities\Company;

$factory->define(Company::class, function (Faker $faker) {
    return [
        'uuid' => $faker->uuid,
        'name' => $faker->company,
        'description' => $faker->sentence
    ];
});

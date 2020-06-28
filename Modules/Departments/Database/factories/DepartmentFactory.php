<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use Modules\Departments\Entities\Department;

$factory->define(Department::class, function (Faker $faker) {
    return [
        'uuid' => $faker->uuid,
        'company_uuid' => $faker->uuid,
        'name' => $faker->name,
        'description' => $faker->sentence
    ];
});
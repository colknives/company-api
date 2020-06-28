<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use Modules\Employees\Entities\Employee;

$factory->define(Employee::class, function (Faker $faker) {
    return [
        'uuid' => $faker->uuid,
        'department_uuid' => $faker->uuid,
        'firstname' => $faker->firstName,
        'lastname' => $faker->lastName,
        'email' => $faker->email
    ];
});

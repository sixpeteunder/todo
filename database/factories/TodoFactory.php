<?php

/** @var Factory $factory */

use App\Todo;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Todo::class, function (Faker $faker) {
    return [
        'subject' => $faker->sentence(),
        'content' => $faker->text(),
        'context' => $faker->boolean(),
        'due_at' => $faker->optional()->dateTimeThisDecade('+1 year'),
    ];
});

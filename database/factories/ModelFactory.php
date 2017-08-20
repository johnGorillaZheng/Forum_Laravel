<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'avatar' => '/image/avatars/default.png',
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
        'confirmation_token' => str_random(10),
    ];
});


$factory->define(App\Topic::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->word,
        'bio' => $faker->paragraph,
        'question_count' => 1,
    ];
});

$factory->define(App\Question::class, function (Faker\Generator $faker) {

    return [
        'title' => $faker->word,
        'body' => $faker->paragraph,
        'user_id' => random_int(1, 201),
        'answers_count' => 0,
    ];
});



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

$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'username' => $faker->word,
        'dob' => Carbon\Carbon::parse('May 2 1999'),
        'password' => $password ? : $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});
$factory->define(App\Article::class, function (Faker\Generator $faker) {

    return [
        'user_id' => App\User::all()->random()->id,
        'content' => $faker->paragraph(5),
        'live' => $faker->boolean(60),//70% chance to get a value true
        'post_on' => Carbon\Carbon::parse('+2 week'),
    ];
});
$factory->define(App\Comment::class, function (Faker\Generator $faker) {

    return [
        'user_id' => App\User::all()->random()->id,
        'body' => $faker->sentence,
        'commentable_id' => App\Article::all()->random()->id,
    ];
});
$factory->define(App\Reply::class, function (Faker\Generator $faker) {

    return [
        'user_id' => App\User::all()->random()->id,
        'reply' => $faker->sentence,
        'parent_id' => App\Comment::all()->random()->id,
    ];
});


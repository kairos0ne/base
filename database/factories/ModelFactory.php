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
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Portfolio::class, function (Faker\Generator $faker) {
    return [
        'user_id' => factory('App\User')->create()->id,
        'title' => $faker->sentence,
        'subtitle' => $faker->sentence,
        'description' => $faker->text,
        'thumbnail' => 'https://placeholdit.imgix.net/~text?txtsize=23&txt=200%C3%97120&w=200&h=120',
        'pdfurl' => $faker->url,
        'intro'=> $faker->text,
        'bodycontent' => $faker->text,
    ];
});
$factory->define(App\Brief::class, function (Faker\Generator $faker) {
    return [
        'project_id' => factory('App\Project')->create()->id,
        'overview' => $faker->paragraph(),
        'objective' => $faker->paragraph(),
        'session_token' => str_random(10),
    ];
});
$factory->define(App\Access::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'session_token' => str_random(10),
    ];
});
$factory->define(App\Project::class, function (Faker\Generator $faker) {
    return [
        'client_id' => factory('App\Client')->create()->id,
        'name' => $faker->sentence(),
        'description' => $faker->paragraph(),
        'session_token' => str_random(10),
    ];
});
$factory->define(App\Client::class, function (Faker\Generator $faker) {
    return [
        'user_id' => factory('App\User')->create()->id,
        'name' => $faker->sentence(),
        'business_area' => $faker->paragraph(),
        'session_token' => str_random(10),
    ];
});
$factory->define(App\File::class, function (Faker\Generator $faker) {
    return [
        'user_id' => factory('App\User')->create()->id,
        'portfolio_id' => factory('App\Portfolio')->create()->id,
        'project_id' => factory('App\Project')->create()->id,
        'client_id' => factory('App\Client')->create()->id,
        'brief_id' => factory('App\Brief')->create()->id,
        'type' => 'PDF',
        'name' => $faker->name(),
        'path' => $faker->url(),
    ];
});
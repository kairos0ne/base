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
$factory->define(App\Brief::class, function (Faker\Generator $faker) {
    return [
        'project_id' => factory('App\Project')->create()->id,
        'overview' => $faker->paragraph(),
        'objective' => $faker->paragraph(),
        'ticket' => $faker->unique()->randomNumber,
        'status' => 'New',
        'status_value' => '1',
        'jira_epic' => str_random(10),

    ];
});
$factory->define(App\Project::class, function (Faker\Generator $faker) {
    return [
        'client_id' => factory('App\Client')->create()->id,
        'name' => $faker->sentence(),
        'description' => $faker->paragraph(),
        'status' => 'New',
        'status_value' => '1',

    ];
});
$factory->define(App\Client::class, function (Faker\Generator $faker) {
    return [
        'user_id' => factory('App\User')->create()->id,
        'name' => $faker->company(),
        'business_area' => $faker->bs()
    ];
});

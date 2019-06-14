<?php

use Faker\Generator as Faker;

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

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name'           => $faker->name,
        'userName'       => $faker->name,
        'email'          => $faker->unique()->safeEmail,
        'password'       => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',   
        'remember_token' => str_random(10),
        'api_token'      => str_random(60),
    ];
});

$factory->define(App\Article::class, function (Faker $faker) {
    return [
	    'title'        =>  $faker->sentence(1),
	    'slug'         =>  $faker->sentence(1),
	    'body'         =>  $faker->paragraph(2) ,
        'image'        => 'https://roocket.ir/public/image/2018/1/21/1516505980bootstrap4-cover-1.jpg',
        'commentCount' =>  $faker->numberBetween(1,100),
        'viewCount'    =>  $faker->numberBetween(1,50),
    ];
});

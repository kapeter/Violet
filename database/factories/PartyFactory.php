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

$factory->define(App\Models\Party::class, function (Faker $faker) {
    return [
        'openid' => str_random(10), 
        'nickname' =>  $faker->name, 
        'headimgurl' => 'https://picsum.photos/400/400/?image='. rand(0, 250), 
        'fullname'=> $faker->name, 
        'number' => 123456, 
        'has_drawn' => false
    ];
});

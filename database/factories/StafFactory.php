<?php

use Faker\Generator as Faker;

$factory->define(App\staf::class, function (Faker $faker) {
    return [
    	'user_id'=>rand(1,10),
        'nama'=>$faker->name,
        'gender'=>rand(1,2),
        'tmp_lahir'=>$faker->city,
        'tgl_lahir'=>$faker->date,
        'alamat'=>$faker->address,
        'pendidikan'=>rand(0,7),
        'almamater'=>$faker->city,
        'photo'=> 'no photo',
        'status_id'=>rand(1,3)
    ];
});

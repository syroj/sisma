<?php

use Faker\Generator as Faker;

$factory->define(App\siswa::class, function (Faker $faker) {
    return [
        'nama'	=> $faker->name,
        'nik' 	=> mt_rand(),
        'no_kk'	=> mt_rand(),
        'nis'	=> mt_rand(),
        'nisn'	=> mt_rand(),
        'tmp_lahir' => $faker->city,
        'tgl_lahir'	=> $faker->date,
        'jml_saudara'	=> mt_rand(1,10),
        'anak_ke'       => mt_rand(1,10),
        'status_id'	    =>rand(1,3)
    ];
});

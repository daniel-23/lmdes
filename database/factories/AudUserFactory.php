<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\AudUser;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(AudUser::class, function (Faker $faker) {
    return [
        'IdUser' => 1,
        'SessionTime' => 360,
        'DateStartSession' => now(),
        'DateEndSession' => now(),
        'DateEvent' => now(),
        'IpConection' => '127.0.0.1', // password
        'IdEvent' => rand(1,8),
    ];
});

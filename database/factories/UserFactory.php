<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Frontend\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

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

$factory->define(User::class, function (Faker $faker) {

    $FN_1 = Array("山","川","谷","田","小","石","水","大","橋","野","池","吉","中");
    $FN_2 = Array("田","本","川","口","野","村","崎","山","島","上","浦","内","原");
    $LN_1 = Array("順","優","恵","浩","裕","正","昭","真","純","清","博","孝","幸");
    $LN_2 = Array("","一","二","子","美","一郎","実","義","夫","雄","太郎","彦");
    $gendar = [1,2];
    $role_id = [1,10,20,30,40,50,60];

    return [
        'name_first'        => $faker->randomElement($FN_1).$faker->randomElement($FN_2),
        'name_second'       => $faker->randomElement($LN_1).$faker->randomElement($LN_2),
        'kana_first'        => 'カタカナミョウジ',
        'kana_second'       => 'カタカナナマエ',
        'gender'            => $faker->randomElement($gendar),
        'birthday'          => $faker->datetime($max = 'now', $timezone = date_default_timezone_get()),
        'phone'             => '09012345678',
        'role_id'           => $faker->randomElement($role_id),
        'email'             => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password'          => Hash::make('1234'),
        'remember_token'    => Str::random(10),
    ];
});

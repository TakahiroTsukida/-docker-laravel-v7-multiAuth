<?php

use Illuminate\Database\Seeder;
use App\Models\Frontend\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 50)->create();

//        DB::table('users')->insert([
//            'name_first'        => '田中',
//            'name_second'       => '太郎',
//            'kana_first'        => 'タナカ',
//            'kana_second'       => 'タロウ',
//            'gender'            => 1,
//            'phone'             => '09012345678',
//            'role_id'           => 1,
//            'email'             => 'user@test.test',
//            'password'          => Hash::make('1234'),
//            'remember_token'    => Str::random(10),
//        ]);
//
//        DB::table('users')->insert([
//            'name_first'        => '後藤',
//            'name_second'       => '琴美',
//            'kana_first'        => 'ゴトウ',
//            'kana_second'       => 'コトミ',
//            'gender'            => 2,
//            'phone'             => '09087654321',
//            'role_id'           => 5,
//            'email'             => 'user2@test.test',
//            'password'          => Hash::make('1234'),
//            'remember_token'    => Str::random(10),
//        ]);
    }
}

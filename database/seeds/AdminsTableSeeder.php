<?php

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'name'              => 'admin',
            'email'             => 'admin@test.test',
            'password'          => Hash::make('1234'),
            'role_id'           => 1,
            'remember_token'    => Str::random(10),
        ]);

        DB::table('admins')->insert([
            'name'              => 'staff',
            'email'             => 'staff@test.test',
            'password'          => Hash::make('1234'),
            'role_id'           => 5,
            'remember_token'    => Str::random(10),
        ]);
    }
}

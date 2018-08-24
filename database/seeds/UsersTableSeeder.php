<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('users')->truncate();
        \Illuminate\Support\Facades\DB::table('users')->insert([
            [
                'name' => 'phuongnam97',
                'email' => 'namgay@gmail.com',
                'password' => Hash::make('nam123456')
            ]
        ]);
    }
}

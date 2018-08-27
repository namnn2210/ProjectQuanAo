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
                'username'=>'namnn',
                'password'=>hash::make('namnn1234'),
                'full_name'=>'Ngo Ngoc Nam',
                'gender'=>1,
                'address'=>'Hanoi',
                'email'=>'namnn@gmail.com',
                'DOB'=>'1997-10-22',
                'phone'=>'01673924314',
                'role'=>1,
                'status'=>1
            ],

            [
                'username'=>'phucvt',
                'password'=>hash::make('phucvt1234'),
                'full_name'=>'Vu Tien Phuc',
                'gender'=>1,
                'address'=>'Hanoi',
                'email'=>'phucvt@gmail.com',
                'DOB'=>'1997-03-04',
                'phone'=>'01654875269',
                'role'=>1,
                'status'=>1
            ],

            [
                'username'=>'datdt',
                'password'=>hash::make('datdt1234'),
                'full_name'=>'Dang Thanh Dat',
                'gender'=>1,
                'address'=>'Hanoi',
                'email'=>'datdt@gmail.com',
                'DOB'=>'1995-01-12',
                'phone'=>'0989580578',
                'role'=>1,
                'status'=>1
            ],

            [
                'username'=>'namvhp',
                'password'=>hash::make('namvhp1234'),
                'full_name'=>'Vo Ho Phuong Nam',
                'gender'=>1,
                'address'=>'Hanoi',
                'email'=>'namvhp@gmail.com',
                'DOB'=>'1995-11-18',
                'phone'=>'01232301997',
                'role'=>1,
                'status'=>1
            ],

            [
                'username'=>'quangdd',
                'password'=>hash::make('quangdd1234'),
                'full_name'=>'Dang Doanh Quang',
                'gender'=>1,
                'address'=>'Hanoi',
                'email'=>'quangdd@gmail.com',
                'DOB'=>'1995-10-15',
                'phone'=>'01234587458',
                'role'=>1,
                'status'=>1
            ],
        ]);
    }
}

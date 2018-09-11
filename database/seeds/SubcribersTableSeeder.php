<?php

use Illuminate\Database\Seeder;

class SubcribersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('subscribeds')->truncate();
        \Illuminate\Support\Facades\DB::table('subscribeds')->insert([
            [
                'email'=>'vohophuongnam@gmail.com',
                'name'=>'Vo Ho Phuong Nam',
                'address'=>'Hanoi',
                'phone'=>'01232301997',
                'status'=>1,
            ],[
                'email'=>'ngongocnam221097@gmail.com',
                'name'=>'Ngo Ngoc Nam',
                'address'=>'Hanoi',
                'phone'=>'01678884544',
                'status'=>1,
            ],[
                'email'=>'hahoanglc97@gmail.com',
                'name'=>'Hoang Ha <3 Nam Gay',
                'address'=>'Hanoi',
                'phone'=>'01659632564',
                'status'=>1,
            ],
        ]);
    }
}

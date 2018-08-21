<?php

use Illuminate\Database\Seeder;

class CartsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('carts')->truncate();
        \Illuminate\Support\Facades\DB::table('carts')->insert([
            [
                'id'=>'1',
                'cart_name'=>'1'
            ],[
                'id'=>'2',
                'cart_name'=>'2'
            ],[
                'id'=>'3',
                'cart_name'=>'3'
            ],[
                'id'=>'4',
                'cart_name'=>'4'
            ],[
                'id'=>'5',
                'cart_name'=>'5'
            ]
        ]);
    }
}

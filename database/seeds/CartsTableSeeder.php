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
        \Illuminate\Support\Facades\DB::table('accounts')->truncate();
        \Illuminate\Support\Facades\DB::table('accounts')->insert([
            [
                'cart_id'=>'1',
                'cart_name'=>'namnn'
            ],[
                'cart_id'=>'2',
                'cart_name'=>'phucvt'
            ],[
                'cart_id'=>'3',
                'cart_name'=>'datdt'
            ],[
                'cart_id'=>'4',
                'cart_name'=>'namvhp'
            ],[
                'cart_id'=>'5',
                'cart_name'=>'quangdd'
            ]
        ]);
    }
}

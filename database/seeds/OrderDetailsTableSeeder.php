<?php

use Illuminate\Database\Seeder;

class OrderDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \Illuminate\Support\Facades\DB::statement('SET FOREIGN_KEY_CHECKS=0');
        \Illuminate\Support\Facades\DB::table('order_details')->truncate();
        \Illuminate\Support\Facades\DB::table('order_details')->insert([
            [
                'order_id'=>1,
                'product_id'=>2,
                'quantity'=>1,
                'unit_price'=>1750000
            ],
            [
                'order_id'=>2,
                'product_id'=>3,
                'quantity'=>1,
                'unit_price'=>790000
            ],
            [
                'order_id'=>3,
                'product_id'=>5,
                'quantity'=>1,
                'unit_price'=>2500000
            ],
            [
                'order_id'=>4,
                'product_id'=>6,
                'quantity'=>1,
                'unit_price'=>4000000
            ],
            [
                'order_id'=>5,
                'product_id'=>2,
                'quantity'=>1,
                'unit_price'=>5000000
            ],
            [
                'order_id'=>6,
                'product_id'=>3,
                'quantity'=>1,
                'unit_price'=>678000
            ],
            [
                'order_id'=>7,
                'product_id'=>2,
                'quantity'=>1,
                'unit_price'=>890000
            ],
            [
                'order_id'=>8,
                'product_id'=>2,
                'quantity'=>1,
                'unit_price'=>1270000
            ],
            [
                'order_id'=>9,
                'product_id'=>2,
                'quantity'=>1,
                'unit_price'=>1460000
            ],
            [
                'order_id'=>10,
                'product_id'=>2,
                'quantity'=>1,
                'unit_price'=>150000
            ],
        ]);
    }
}

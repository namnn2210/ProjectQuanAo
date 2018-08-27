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
                'order_id'=>'OD1451875977',
                'product_id'=>2,
                'quantity'=>1,
                'unit_price'=>1750000
            ],
            [
                'order_id'=>'OD6874815984',
                'product_id'=>3,
                'quantity'=>1,
                'unit_price'=>790000
            ],
            [
                'order_id'=>'OD1547856982',
                'product_id'=>5,
                'quantity'=>1,
                'unit_price'=>2500000
            ],
            [
                'order_id'=>'OD0214879956',
                'product_id'=>6,
                'quantity'=>1,
                'unit_price'=>4000000
            ],
            [
                'order_id'=>'OD9874514875',
                'product_id'=>2,
                'quantity'=>1,
                'unit_price'=>5000000
            ],
            [
                'order_id'=>'OD3651487598',
                'product_id'=>3,
                'quantity'=>1,
                'unit_price'=>678000
            ],
            [
                'order_id'=>'OD1547749963',
                'product_id'=>2,
                'quantity'=>1,
                'unit_price'=>890000
            ],
            [
                'order_id'=>'OD1548789513',
                'product_id'=>2,
                'quantity'=>1,
                'unit_price'=>1270000
            ],
            [
                'order_id'=>'OD3214874945',
                'product_id'=>2,
                'quantity'=>1,
                'unit_price'=>1460000
            ],
            [
                'order_id'=>'OD1568797866',
                'product_id'=>2,
                'quantity'=>1,
                'unit_price'=>150000
            ],
        ]);
    }
}

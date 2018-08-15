<?php

use Illuminate\Database\Seeder;

class CollectionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('collections')->truncate();
        \Illuminate\Support\Facades\DB::table('collections')->insert([
            [
                'collection_id' => '1',
                'collection_name' => 'Bộ sưu tập mua hè',
                'product_id' => '1',
                'description' => 'Mặc vào mùa hè mát mẻ'
            ],[
                'collection_id' => '1',
                'collection_name' => 'Bộ sưu tập mua hè',
                'product_id' => '2',
                'description' => 'Mặc vào mùa hè mát mẻ'
            ],[
                'collection_id' => '1',
                'collection_name' => 'Bộ sưu tập mua hè',
                'product_id' => '3',
                'description' => 'Mặc vào mùa hè mát mẻ'
            ],[
                'collection_id' => '1',
                'collection_name' => 'Bộ sưu tập mua hè',
                'product_id' => '4',
                'description' => 'Mặc vào mùa hè mát mẻ'
            ],[
                'collection_id' => '2',
                'collection_name' => 'Bộ sưu tập mua đông',
                'product_id' => '5',
                'description' => 'Mặc vào mùa đông lạnh lẽo'
            ],[
                'collection_id' => '2',
                'collection_name' => 'Bộ sưu tập mua đông',
                'product_id' => '6',
                'description' => 'Mặc vào mùa đông lạnh lẽo'
            ],[
                'collection_id' => '2',
                'collection_name' => 'Bộ sưu tập mua đông',
                'product_id' => '7',
                'description' => 'Mặc vào mùa đông lạnh lẽo'
            ],[
                'collection_id' => '2',
                'collection_name' => 'Bộ sưu tập mua đông',
                'product_id' => '8',
                'description' => 'Mặc vào mùa đông lạnh lẽo'
            ]
            ]);
    }
}

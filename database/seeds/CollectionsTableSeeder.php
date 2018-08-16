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
                'description' => 'Mặc vào mùa hè mát mẻ'
            ],[
                'collection_id' => '2',
                'collection_name' => 'Bộ sưu tập mua đông',
                'description' => 'Mặc vào mùa đông lạnh lẽo'
            ]
            ]);
    }
}

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
        \Illuminate\Support\Facades\DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        \Illuminate\Support\Facades\DB::table('collections')->truncate();
        \Illuminate\Support\Facades\DB::table('collections')->insert([
            [
                'name' => 'Bộ sưu tập mua hè',
                'description' => 'Mặc vào mùa hè mát mẻ'
            ],[
                'name' => 'Bộ sưu tập mua đông',
                'description' => 'Mặc vào mùa đông lạnh lẽo'
            ]
            ]);
    }
}

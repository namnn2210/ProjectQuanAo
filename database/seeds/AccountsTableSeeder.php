<?php

use Illuminate\Database\Seeder;

class AccountsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \Illuminate\Support\Facades\DB::table('accounts')->truncate();
        \Illuminate\Support\Facades\DB::table('accounts')->insert([
            [
                'username'=>''
            ]
        ]);
    }
}

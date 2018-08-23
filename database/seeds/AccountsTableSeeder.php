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
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        \Illuminate\Support\Facades\DB::table('accounts')->truncate();
        \Illuminate\Support\Facades\DB::table('accounts')->insert([
            [
                'username'=>'namnn',
                'password'=>'namnn1234',
                'full_name'=>'Ngo Ngoc Nam',
                'gender'=>1,
                'address'=>'Hanoi',
                'email'=>'namnn@gmail.com',
                'DOB'=>'1997-10-22',
                'phone'=>'01673924314',
                'role'=>1
            ],

            [
                'username'=>'phucvt',
                'password'=>'phucvt1234',
                'full_name'=>'Vu Tien Phuc',
                'gender'=>1,
                'address'=>'Hanoi',
                'email'=>'phucvt@gmail.com',
                'DOB'=>'1997-03-04',
                'phone'=>'01654875269',
                'role'=>1
            ],

            [
                'username'=>'datdt',
                'password'=>'datdt1234',
                'full_name'=>'Dang Thanh Dat',
                'gender'=>1,
                'address'=>'Hanoi',
                'email'=>'datdt@gmail.com',
                'DOB'=>'1995-01-12',
                'phone'=>'0989580578',
                'role'=>1
            ],

            [
                'username'=>'namvhp',
                'password'=>'namvhp1234',
                'full_name'=>'Vo Ho Phuong Nam',
                'gender'=>1,
                'address'=>'Hanoi',
                'email'=>'namvhp@gmail.com',
                'DOB'=>'1995-11-18',
                'phone'=>'01232301997',
                'role'=>1
            ],

            [
                'username'=>'quangdd',
                'password'=>'quangdd1234',
                'full_name'=>'Dang Doanh Quang',
                'gender'=>1,
                'address'=>'Hanoi',
                'email'=>'quangdd@gmail.com',
                'DOB'=>'1995-10-15',
                'phone'=>'01234587458',
                'role'=>1
            ],
        ]);
    }
}

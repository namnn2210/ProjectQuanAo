<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        \Illuminate\Support\Facades\DB::table('categories') -> truncate();
        \Illuminate\Support\Facades\DB::table('categories') -> insert([
           [
               'name' => 'Áo khoác',
               'description' => 'Áo khoác xịn',
               'image' => 'https://res.cloudinary.com/dncvywdxi/image/upload/v1534344733/Category%20Img/%E1%BA%A2nh_ch%E1%BB%A5p_M%C3%A0n_h%C3%ACnh_2018-08-15_l%C3%BAc_12.42.14.png',
           ],
           [
               'name' => 'Áo phông',
               'description' => 'Áo phông xịn',
               'image' => 'https://res.cloudinary.com/dncvywdxi/image/upload/v1534344744/Category%20Img/%E1%BA%A2nh_ch%E1%BB%A5p_M%C3%A0n_h%C3%ACnh_2018-08-15_l%C3%BAc_15.56.36.png',
           ],
           [
               'name' => 'Áo sơ-mi',
               'description' => 'Áo sơ-mi xịn',
               'image' => 'https://res.cloudinary.com/dncvywdxi/image/upload/v1534344751/Category%20Img/%E1%BA%A2nh_ch%E1%BB%A5p_M%C3%A0n_h%C3%ACnh_2018-08-15_l%C3%BAc_13.22.59.png',
           ],
           [
               'name' => 'Balo',
               'description' => 'Balo',
               'image' => 'https://res.cloudinary.com/dncvywdxi/image/upload/v1534344823/Category%20Img/%E1%BA%A2nh_ch%E1%BB%A5p_M%C3%A0n_h%C3%ACnh_2018-08-15_l%C3%BAc_17.03.04.png',
           ],
           [
               'name' => 'Giày',
               'description' => 'Giày xịn',
               'image' => 'https://res.cloudinary.com/dncvywdxi/image/upload/v1534344829/Category%20Img/%E1%BA%A2nh_ch%E1%BB%A5p_M%C3%A0n_h%C3%ACnh_2018-08-15_l%C3%BAc_16.39.02.png',
           ],
           [
               'name' => 'Phụ kiện',
               'description' => 'Phụ kiện xịn',
               'image' => 'https://res.cloudinary.com/dncvywdxi/image/upload/v1534344842/Category%20Img/%E1%BA%A2nh_ch%E1%BB%A5p_M%C3%A0n_h%C3%ACnh_2018-08-15_l%C3%BAc_17.24.39.png',
           ],
           [
               'name' => 'Quần',
               'description' => 'Quần xịn',
               'image' => 'https://res.cloudinary.com/dncvywdxi/image/upload/v1534344848/Category%20Img/%E1%BA%A2nh_ch%E1%BB%A5p_M%C3%A0n_h%C3%ACnh_2018-08-15_l%C3%BAc_16.14.14.png',
           ],
           [
               'name' => 'Vest',
               'description' => 'Vest xịn',
               'image' => 'https://res.cloudinary.com/dncvywdxi/image/upload/v1534344858/Category%20Img/%E1%BA%A2nh_ch%E1%BB%A5p_M%C3%A0n_h%C3%ACnh_2018-08-15_l%C3%BAc_13.23.46.png',
           ],
        ]);
    }
}

<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        \Illuminate\Support\Facades\DB::table('products')->truncate();
        \Illuminate\Support\Facades\DB::table('products')->insert([
            [
                'name' => 'Áo Khoác Balmain',
                'description' => 'Áo khoác dạ phối da lộn',
                'category_id' => '1',
                'price' => 2000000,
                'discount' => 10,
                'brand_id' => '1',
                'images' => 'http://res.cloudinary.com/dyyybxgae/image/upload/v1534688728/Fashion/%C3%81o%20Kho%C3%A1c/Balmain/A%CC%89nh_chu%CC%A3p_Ma%CC%80n_hi%CC%80nh_2018-08-15_lu%CC%81c_12.42.17.png&https://res.cloudinary.com/dyyybxgae/image/upload/v1534688728/Fashion/%C3%81o%20Kho%C3%A1c/Balmain/A%CC%89nh_chu%CC%A3p_Ma%CC%80n_hi%CC%80nh_2018-08-15_lu%CC%81c_12.42.21.png&https://res.cloudinary.com/dyyybxgae/image/upload/v1534688728/Fashion/%C3%81o%20Kho%C3%A1c/Balmain/A%CC%89nh_chu%CC%A3p_Ma%CC%80n_hi%CC%80nh_2018-08-15_lu%CC%81c_12.42.14.png&',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Áo khoác Burberry',
                'description' => 'Áo khoác lông cừu cao cấp',
                'category_id' => '1',
                'price' => 1500000,
                'discount' => 15,
                'brand_id' => '2',
                'images' => 'https://res.cloudinary.com/dyyybxgae/image/upload/v1534688840/Fashion/%C3%81o%20Kho%C3%A1c/Burberry/A%CC%89nh_chu%CC%A3p_Ma%CC%80n_hi%CC%80nh_2018-08-15_lu%CC%81c_12.07.21.png&https://res.cloudinary.com/dyyybxgae/image/upload/v1534688839/Fashion/%C3%81o%20Kho%C3%A1c/Burberry/A%CC%89nh_chu%CC%A3p_Ma%CC%80n_hi%CC%80nh_2018-08-15_lu%CC%81c_12.07.38.png&https://res.cloudinary.com/dyyybxgae/image/upload/v1534688839/Fashion/%C3%81o%20Kho%C3%A1c/Burberry/A%CC%89nh_chu%CC%A3p_Ma%CC%80n_hi%CC%80nh_2018-08-15_lu%CC%81c_12.07.25.png&',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Áo khoác Gucci',
                'description' => 'Áo khoác caro thêu hoa',
                'category_id' => '1',
                'price' => 1850000,
                'discount' => 0,
                'brand_id' => '3',
                'images' => 'https://res.cloudinary.com/dyyybxgae/image/upload/v1534688762/Fashion/%C3%81o%20Kho%C3%A1c/Gucci/A%CC%89nh_chu%CC%A3p_Ma%CC%80n_hi%CC%80nh_2018-08-15_lu%CC%81c_13.16.24.png&https://res.cloudinary.com/dyyybxgae/image/upload/v1534688762/Fashion/%C3%81o%20Kho%C3%A1c/Gucci/A%CC%89nh_chu%CC%A3p_Ma%CC%80n_hi%CC%80nh_2018-08-15_lu%CC%81c_13.16.28.png&https://res.cloudinary.com/dyyybxgae/image/upload/v1534688762/Fashion/%C3%81o%20Kho%C3%A1c/Gucci/A%CC%89nh_chu%CC%A3p_Ma%CC%80n_hi%CC%80nh_2018-08-15_lu%CC%81c_13.16.32.png&',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Áo khoác Lanvin',
                'description' => 'Áo khoác da phối lông chồn',
                'category_id' => '1',
                'price' => 1100000,
                'discount' => 0,
                'brand_id' => '4',
                'images' => 'https://res.cloudinary.com/dyyybxgae/image/upload/v1534688803/Fashion/%C3%81o%20Kho%C3%A1c/Lanvin/A%CC%89nh_chu%CC%A3p_Ma%CC%80n_hi%CC%80nh_2018-08-15_lu%CC%81c_13.22.06.png&https://res.cloudinary.com/dyyybxgae/image/upload/v1534688803/Fashion/%C3%81o%20Kho%C3%A1c/Lanvin/A%CC%89nh_chu%CC%A3p_Ma%CC%80n_hi%CC%80nh_2018-08-15_lu%CC%81c_13.22.00.png&https://res.cloudinary.com/dyyybxgae/image/upload/v1534688803/Fashion/%C3%81o%20Kho%C3%A1c/Lanvin/A%CC%89nh_chu%CC%A3p_Ma%CC%80n_hi%CC%80nh_2018-08-15_lu%CC%81c_13.22.04.png&',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Áo phông Balmain',
                'description' => 'Áo phông in logo',
                'category_id' => '2',
                'price' => 500000,
                'discount' => 0,
                'brand_id' => '1',
                'images' => 'https://res.cloudinary.com/dncvywdxi/image/upload/1534644117.png&https://res.cloudinary.com/dncvywdxi/image/upload/1534644126.png&',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Áo phông Gucci',
                'description' => 'Áo phông in hoạ tiết và logo hãng',
                'category_id' => '2',
                'price' => 650000,
                'discount' => 10,
                'brand_id' => '3',
                'images' => 'https://res.cloudinary.com/dyyybxgae/image/upload/v1534688972/Fashion/Ao%20Phong/Gucci/A%CC%89nh_chu%CC%A3p_Ma%CC%80n_hi%CC%80nh_2018-08-15_lu%CC%81c_15.56.17.png&https://res.cloudinary.com/dyyybxgae/image/upload/v1534688972/Fashion/Ao%20Phong/Gucci/A%CC%89nh_chu%CC%A3p_Ma%CC%80n_hi%CC%80nh_2018-08-15_lu%CC%81c_15.56.14.png&https://res.cloudinary.com/dyyybxgae/image/upload/v1534688972/Fashion/Ao%20Phong/Gucci/A%CC%89nh_chu%CC%A3p_Ma%CC%80n_hi%CC%80nh_2018-08-15_lu%CC%81c_15.56.10.png&',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Áo phông Kenzo',
                'description' => 'Áo phông in hoạ tiết',
                'category_id' => '2',
                'price' => 750000,
                'discount' => 0,
                'brand_id' => '7',
                'images' => 'https://res.cloudinary.com/dyyybxgae/image/upload/v1534689025/Fashion/Ao%20Phong/Kenzo/A%CC%89nh_chu%CC%A3p_Ma%CC%80n_hi%CC%80nh_2018-08-15_lu%CC%81c_16.01.11.png&https://res.cloudinary.com/dyyybxgae/image/upload/v1534689024/Fashion/Ao%20Phong/Kenzo/A%CC%89nh_chu%CC%A3p_Ma%CC%80n_hi%CC%80nh_2018-08-15_lu%CC%81c_16.01.08.png&https://res.cloudinary.com/dyyybxgae/image/upload/v1534689024/Fashion/Ao%20Phong/Kenzo/A%CC%89nh_chu%CC%A3p_Ma%CC%80n_hi%CC%80nh_2018-08-15_lu%CC%81c_16.01.05.png&',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Áo phông Valentino',
                'description' => 'Áo phông in hoạ tiết',
                'category_id' => '2',
                'price' => 550000,
                'discount' => 0,
                'brand_id' => '6',
                'images' => 'https://res.cloudinary.com/dyyybxgae/image/upload/v1534689047/Fashion/Ao%20Phong/Valentino/A%CC%89nh_chu%CC%A3p_Ma%CC%80n_hi%CC%80nh_2018-08-15_lu%CC%81c_15.58.20.png&https://res.cloudinary.com/dyyybxgae/image/upload/v1534689047/Fashion/Ao%20Phong/Valentino/A%CC%89nh_chu%CC%A3p_Ma%CC%80n_hi%CC%80nh_2018-08-15_lu%CC%81c_15.58.14.png&https://res.cloudinary.com/dyyybxgae/image/upload/v1534689047/Fashion/Ao%20Phong/Valentino/A%CC%89nh_chu%CC%A3p_Ma%CC%80n_hi%CC%80nh_2018-08-15_lu%CC%81c_15.58.18.png&',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Áo sơ mi Saint Laurent',
                'description' => 'Áo sơ mi Denim in logo',
                'category_id' => '3',
                'price' => 850000,
                'discount' => 0,
                'brand_id' => '9',
                'images' => 'https://res.cloudinary.com/dyyybxgae/image/upload/v1534688902/Fashion/Ao%20So%20Mi/Sant%20Laurent/A%CC%89nh_chu%CC%A3p_Ma%CC%80n_hi%CC%80nh_2018-08-15_lu%CC%81c_13.22.59.png&https://res.cloudinary.com/dyyybxgae/image/upload/v1534688902/Fashion/Ao%20So%20Mi/Sant%20Laurent/A%CC%89nh_chu%CC%A3p_Ma%CC%80n_hi%CC%80nh_2018-08-15_lu%CC%81c_13.23.06.png&https://res.cloudinary.com/dyyybxgae/image/upload/v1534688902/Fashion/Ao%20So%20Mi/Sant%20Laurent/A%CC%89nh_chu%CC%A3p_Ma%CC%80n_hi%CC%80nh_2018-08-15_lu%CC%81c_13.23.02.png&',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Áo sơ mi Valentino',
                'description' => 'Áo sơ mi in logo',
                'category_id' => '3',
                'price' => 720000,
                'discount' => 15,
                'brand_id' => '6',
                'images' => 'https://res.cloudinary.com/dyyybxgae/image/upload/v1534688937/Fashion/Ao%20So%20Mi/Valentino/A%CC%89nh_chu%CC%A3p_Ma%CC%80n_hi%CC%80nh_2018-08-15_lu%CC%81c_13.22.24.png&https://res.cloudinary.com/dyyybxgae/image/upload/v1534688938/Fashion/Ao%20So%20Mi/Valentino/A%CC%89nh_chu%CC%A3p_Ma%CC%80n_hi%CC%80nh_2018-08-15_lu%CC%81c_13.22.31.png&https://res.cloudinary.com/dyyybxgae/image/upload/v1534688937/Fashion/Ao%20So%20Mi/Valentino/A%CC%89nh_chu%CC%A3p_Ma%CC%80n_hi%CC%80nh_2018-08-15_lu%CC%81c_13.22.27.png&',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Balo Balenciaga',
                'description' => 'Balo da cao cấp',
                'category_id' => '4',
                'price' => 790000,
                'discount' => 0,
                'brand_id' => '8',
                'images' => 'https://res.cloudinary.com/dyyybxgae/image/upload/v1534689479/Fashion/Balo/Balenciaga/A%CC%89nh_chu%CC%A3p_Ma%CC%80n_hi%CC%80nh_2018-08-15_lu%CC%81c_17.03.04.png&https://res.cloudinary.com/dyyybxgae/image/upload/v1534689478/Fashion/Balo/Balenciaga/A%CC%89nh_chu%CC%A3p_Ma%CC%80n_hi%CC%80nh_2018-08-15_lu%CC%81c_17.03.10.png&https://res.cloudinary.com/dyyybxgae/image/upload/v1534689478/Fashion/Balo/Balenciaga/A%CC%89nh_chu%CC%A3p_Ma%CC%80n_hi%CC%80nh_2018-08-15_lu%CC%81c_17.03.07.png&',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Balo Burberry',
                'description' => 'Balo da in logo',
                'category_id' => '4',
                'price' => 430000,
                'discount' => 0,
                'brand_id' => '2',
                'images' => 'https://res.cloudinary.com/dyyybxgae/image/upload/v1534689503/Fashion/Balo/Burberry/A%CC%89nh_chu%CC%A3p_Ma%CC%80n_hi%CC%80nh_2018-08-15_lu%CC%81c_16.57.53.png&https://res.cloudinary.com/dyyybxgae/image/upload/v1534689502/Fashion/Balo/Burberry/A%CC%89nh_chu%CC%A3p_Ma%CC%80n_hi%CC%80nh_2018-08-15_lu%CC%81c_16.57.56.png&https://res.cloudinary.com/dyyybxgae/image/upload/v1534689503/Fashion/Balo/Burberry/A%CC%89nh_chu%CC%A3p_Ma%CC%80n_hi%CC%80nh_2018-08-15_lu%CC%81c_16.58.09.png&',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Balo Fendi',
                'description' => 'Balo da phối hoạ tiết',
                'category_id' => '4',
                'price' => 890000,
                'discount' => 20,
                'brand_id' => '6',
                'images' => 'https://res.cloudinary.com/dyyybxgae/image/upload/v1534689522/Fashion/Balo/Fendi/A%CC%89nh_chu%CC%A3p_Ma%CC%80n_hi%CC%80nh_2018-08-15_lu%CC%81c_17.00.38.png&https://res.cloudinary.com/dyyybxgae/image/upload/v1534689523/Fashion/Balo/Fendi/A%CC%89nh_chu%CC%A3p_Ma%CC%80n_hi%CC%80nh_2018-08-15_lu%CC%81c_17.00.43.png&https://res.cloudinary.com/dyyybxgae/image/upload/v1534689523/Fashion/Balo/Fendi/A%CC%89nh_chu%CC%A3p_Ma%CC%80n_hi%CC%80nh_2018-08-15_lu%CC%81c_17.00.47.png&',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Túi xách Fendi',
                'description' => 'Túi xách PeekABoo phối hoạ tiết',
                'category_id' => '4',
                'price' => 750000,
                'discount' => 0,
                'brand_id' => '6',
                'images' => 'https://res.cloudinary.com/dyyybxgae/image/upload/v1534689538/Fashion/Balo/Fendi/A%CC%89nh_chu%CC%A3p_Ma%CC%80n_hi%CC%80nh_2018-08-15_lu%CC%81c_17.02.19.png&https://res.cloudinary.com/dyyybxgae/image/upload/v1534689539/Fashion/Balo/Fendi/A%CC%89nh_chu%CC%A3p_Ma%CC%80n_hi%CC%80nh_2018-08-15_lu%CC%81c_17.02.22.png&https://res.cloudinary.com/dyyybxgae/image/upload/v1534689538/Fashion/Balo/Fendi/A%CC%89nh_chu%CC%A3p_Ma%CC%80n_hi%CC%80nh_2018-08-15_lu%CC%81c_17.02.35.png&',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Balo Gucci',
                'description' => 'Balo vải canvas phối sticker',
                'category_id' => '4',
                'price' => 760000,
                'discount' => 15,
                'brand_id' => '3',
                'images' => 'https://res.cloudinary.com/dyyybxgae/image/upload/v1534689574/Fashion/Balo/Gucci/A%CC%89nh_chu%CC%A3p_Ma%CC%80n_hi%CC%80nh_2018-08-15_lu%CC%81c_16.59.23.png&https://res.cloudinary.com/dyyybxgae/image/upload/v1534689574/Fashion/Balo/Gucci/A%CC%89nh_chu%CC%A3p_Ma%CC%80n_hi%CC%80nh_2018-08-15_lu%CC%81c_16.59.27.png&https://res.cloudinary.com/dyyybxgae/image/upload/v1534689573/Fashion/Balo/Gucci/A%CC%89nh_chu%CC%A3p_Ma%CC%80n_hi%CC%80nh_2018-08-15_lu%CC%81c_16.59.29.png&',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Túi xách Saint Laurent',
                'description' => 'Túi xách da cao cấp',
                'category_id' => '4',
                'price' => 1450000,
                'discount' => 0,
                'brand_id' => '9',
                'images' => 'https://res.cloudinary.com/dyyybxgae/image/upload/v1534689614/Fashion/Balo/Sant%20Laurent/A%CC%89nh_chu%CC%A3p_Ma%CC%80n_hi%CC%80nh_2018-08-15_lu%CC%81c_17.04.20.png&https://res.cloudinary.com/dyyybxgae/image/upload/v1534689614/Fashion/Balo/Sant%20Laurent/A%CC%89nh_chu%CC%A3p_Ma%CC%80n_hi%CC%80nh_2018-08-15_lu%CC%81c_17.04.23.png&https://res.cloudinary.com/dyyybxgae/image/upload/v1534689614/Fashion/Balo/Sant%20Laurent/A%CC%89nh_chu%CC%A3p_Ma%CC%80n_hi%CC%80nh_2018-08-15_lu%CC%81c_17.04.32.png&',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Balo Saint Laurent',
                'description' => 'Balo da phối sequin',
                'category_id' => '4',
                'price' => 1640000,
                'discount' => 20,
                'brand_id' => '9',
                'images' => 'https://res.cloudinary.com/dyyybxgae/image/upload/v1534689602/Fashion/Balo/Sant%20Laurent/A%CC%89nh_chu%CC%A3p_Ma%CC%80n_hi%CC%80nh_2018-08-15_lu%CC%81c_17.01.25.png&https://res.cloudinary.com/dyyybxgae/image/upload/v1534689603/Fashion/Balo/Sant%20Laurent/A%CC%89nh_chu%CC%A3p_Ma%CC%80n_hi%CC%80nh_2018-08-15_lu%CC%81c_17.01.27.png&https://res.cloudinary.com/dyyybxgae/image/upload/v1534689604/Fashion/Balo/Sant%20Laurent/A%CC%89nh_chu%CC%A3p_Ma%CC%80n_hi%CC%80nh_2018-08-15_lu%CC%81c_17.01.31.png&',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Balo Valentino',
                'description' => 'Balo da cao cấp in logo',
                'category_id' => '4',
                'price' => 1230000,
                'discount' => 0,
                'brand_id' => '6',
                'images' => 'https://res.cloudinary.com/dyyybxgae/image/upload/v1534689638/Fashion/Balo/Valentino/A%CC%89nh_chu%CC%A3p_Ma%CC%80n_hi%CC%80nh_2018-08-15_lu%CC%81c_16.58.22.png&https://res.cloudinary.com/dyyybxgae/image/upload/v1534689639/Fashion/Balo/Valentino/A%CC%89nh_chu%CC%A3p_Ma%CC%80n_hi%CC%80nh_2018-08-15_lu%CC%81c_16.58.25.png&https://res.cloudinary.com/dyyybxgae/image/upload/v1534689638/Fashion/Balo/Valentino/A%CC%89nh_chu%CC%A3p_Ma%CC%80n_hi%CC%80nh_2018-08-15_lu%CC%81c_16.58.30.png&',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Giày Balenciaga',
                'description' => 'Giày thể thao để ba lớp',
                'category_id' => '5',
                'price' => 700000,
                'discount' => 0,
                'brand_id' => '8',
                'images' => 'https://res.cloudinary.com/dyyybxgae/image/upload/v1534689331/Fashion/Giay/Balenciaga/A%CC%89nh_chu%CC%A3p_Ma%CC%80n_hi%CC%80nh_2018-08-15_lu%CC%81c_16.39.02.png&https://res.cloudinary.com/dyyybxgae/image/upload/v1534689331/Fashion/Giay/Balenciaga/A%CC%89nh_chu%CC%A3p_Ma%CC%80n_hi%CC%80nh_2018-08-15_lu%CC%81c_16.39.04.png&https://res.cloudinary.com/dyyybxgae/image/upload/v1534689331/Fashion/Giay/Balenciaga/A%CC%89nh_chu%CC%A3p_Ma%CC%80n_hi%CC%80nh_2018-08-15_lu%CC%81c_16.39.08.png&',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Giày Balenciaga',
                'description' => 'Giày thể thao flyknit',
                'category_id' => '5',
                'price' => 900000,
                'discount' => 30,
                'brand_id' => '8',
                'images' => 'https://res.cloudinary.com/dyyybxgae/image/upload/v1534689313/Fashion/Giay/Balenciaga/A%CC%89nh_chu%CC%A3p_Ma%CC%80n_hi%CC%80nh_2018-08-15_lu%CC%81c_16.40.24.png&https://res.cloudinary.com/dyyybxgae/image/upload/v1534689313/Fashion/Giay/Balenciaga/A%CC%89nh_chu%CC%A3p_Ma%CC%80n_hi%CC%80nh_2018-08-15_lu%CC%81c_16.40.28.png&https://res.cloudinary.com/dyyybxgae/image/upload/v1534689314/Fashion/Giay/Balenciaga/A%CC%89nh_chu%CC%A3p_Ma%CC%80n_hi%CC%80nh_2018-08-15_lu%CC%81c_16.40.32.png&',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Giày da Gucci',
                'description' => 'Giày da phối lông cao cấp ',
                'category_id' => '5',
                'price' => 1690000,
                'discount' => 0,
                'brand_id' => '3',
                'images' => 'https://res.cloudinary.com/dyyybxgae/image/upload/v1534689407/Fashion/Giay/Gucci/A%CC%89nh_chu%CC%A3p_Ma%CC%80n_hi%CC%80nh_2018-08-15_lu%CC%81c_16.41.28.png&https://res.cloudinary.com/dyyybxgae/image/upload/v1534689406/Fashion/Giay/Gucci/A%CC%89nh_chu%CC%A3p_Ma%CC%80n_hi%CC%80nh_2018-08-15_lu%CC%81c_16.41.20.png&https://res.cloudinary.com/dyyybxgae/image/upload/v1534689406/Fashion/Giay/Gucci/A%CC%89nh_chu%CC%A3p_Ma%CC%80n_hi%CC%80nh_2018-08-15_lu%CC%81c_16.41.25.png&',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Giày thể thao ',
                'description' => 'Giày thể thao in logo',
                'category_id' => '5',
                'price' => 950000,
                'discount' => 0,
                'brand_id' => '3',
                'images' => 'https://res.cloudinary.com/dyyybxgae/image/upload/v1534689393/Fashion/Giay/Gucci/A%CC%89nh_chu%CC%A3p_Ma%CC%80n_hi%CC%80nh_2018-08-15_lu%CC%81c_16.38.10.png&https://res.cloudinary.com/dyyybxgae/image/upload/v1534689393/Fashion/Giay/Gucci/A%CC%89nh_chu%CC%A3p_Ma%CC%80n_hi%CC%80nh_2018-08-15_lu%CC%81c_16.38.20.png&https://res.cloudinary.com/dyyybxgae/image/upload/v1534689393/Fashion/Giay/Gucci/A%CC%89nh_chu%CC%A3p_Ma%CC%80n_hi%CC%80nh_2018-08-15_lu%CC%81c_16.38.14.png&',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Dép Gucci',
                'description' => 'Dép cao su hoạ tiết',
                'category_id' => '5',
                'price' => 490000,
                'discount' => 0,
                'brand_id' => '3',
                'images' => 'https://res.cloudinary.com/dyyybxgae/image/upload/v1534689382/Fashion/Giay/Gucci/A%CC%89nh_chu%CC%A3p_Ma%CC%80n_hi%CC%80nh_2018-08-15_lu%CC%81c_16.42.03.png&https://res.cloudinary.com/dyyybxgae/image/upload/v1534689382/Fashion/Giay/Gucci/A%CC%89nh_chu%CC%A3p_Ma%CC%80n_hi%CC%80nh_2018-08-15_lu%CC%81c_16.42.00.png&https://res.cloudinary.com/dyyybxgae/image/upload/v1534689382/Fashion/Giay/Gucci/A%CC%89nh_chu%CC%A3p_Ma%CC%80n_hi%CC%80nh_2018-08-15_lu%CC%81c_16.42.06.png&',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Giày Slipon Kenzo',
                'description' => 'Giày thêu hoạ tiế',
                'category_id' => '5',
                'price' => 360000,
                'discount' => 0,
                'brand_id' => '7',
                'images' => 'https://res.cloudinary.com/dyyybxgae/image/upload/v1534689430/Fashion/Giay/Kenzo/A%CC%89nh_chu%CC%A3p_Ma%CC%80n_hi%CC%80nh_2018-08-15_lu%CC%81c_16.39.46.png&https://res.cloudinary.com/dyyybxgae/image/upload/v1534689430/Fashion/Giay/Kenzo/A%CC%89nh_chu%CC%A3p_Ma%CC%80n_hi%CC%80nh_2018-08-15_lu%CC%81c_16.39.43.png&https://res.cloudinary.com/dyyybxgae/image/upload/v1534689430/Fashion/Giay/Kenzo/A%CC%89nh_chu%CC%A3p_Ma%CC%80n_hi%CC%80nh_2018-08-15_lu%CC%81c_16.39.40.png&',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Khăn Balenciaga',
                'description' => 'Khăn lông cừu in logo',
                'category_id' => '6',
                'price' => 330000,
                'discount' => 0,
                'brand_id' => '8',
                'images' => 'https://res.cloudinary.com/dyyybxgae/image/upload/v1534689686/Fashion/Phu%20Kien/Khan/A%CC%89nh_chu%CC%A3p_Ma%CC%80n_hi%CC%80nh_2018-08-15_lu%CC%81c_17.22.36.png&https://res.cloudinary.com/dyyybxgae/image/upload/v1534689684/Fashion/Phu%20Kien/Khan/A%CC%89nh_chu%CC%A3p_Ma%CC%80n_hi%CC%80nh_2018-08-15_lu%CC%81c_17.22.33.png&https://res.cloudinary.com/dyyybxgae/image/upload/v1534689685/Fashion/Phu%20Kien/Khan/A%CC%89nh_chu%CC%A3p_Ma%CC%80n_hi%CC%80nh_2018-08-15_lu%CC%81c_17.22.39.png&',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Kính Valentino',
                'description' => 'Kính mắt mèo phủ titan',
                'category_id' => '6',
                'price' => '460000',
                'discount' => '15',
                'brand_id' => '6',
                'images' => 'https://res.cloudinary.com/dyyybxgae/image/upload/v1534689719/Fashion/Phu%20Kien/Kinh/A%CC%89nh_chu%CC%A3p_Ma%CC%80n_hi%CC%80nh_2018-08-15_lu%CC%81c_17.25.34.png&https://res.cloudinary.com/dyyybxgae/image/upload/v1534689719/Fashion/Phu%20Kien/Kinh/A%CC%89nh_chu%CC%A3p_Ma%CC%80n_hi%CC%80nh_2018-08-15_lu%CC%81c_17.25.39.png&https://res.cloudinary.com/dyyybxgae/image/upload/v1534689719/Fashion/Phu%20Kien/Kinh/A%CC%89nh_chu%CC%A3p_Ma%CC%80n_hi%CC%80nh_2018-08-15_lu%CC%81c_17.25.41.png&',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Kính Fendi',
                'description' => 'Kính mạ vàng mặt gương',
                'category_id' => '6',
                'price' => '450000',
                'discount' => '50',
                'brand_id' => '5',
                'images' => 'https://res.cloudinary.com/dyyybxgae/image/upload/v1534689704/Fashion/Phu%20Kien/Kinh/A%CC%89nh_chu%CC%A3p_Ma%CC%80n_hi%CC%80nh_2018-08-15_lu%CC%81c_17.24.39.png&https://res.cloudinary.com/dyyybxgae/image/upload/v1534689705/Fashion/Phu%20Kien/Kinh/A%CC%89nh_chu%CC%A3p_Ma%CC%80n_hi%CC%80nh_2018-08-15_lu%CC%81c_17.24.42.png&https://res.cloudinary.com/dyyybxgae/image/upload/v1534689705/Fashion/Phu%20Kien/Kinh/A%CC%89nh_chu%CC%A3p_Ma%CC%80n_hi%CC%80nh_2018-08-15_lu%CC%81c_17.24.45.png&',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Mũ Burberry ',
                'description' => 'Mũ lưỡi trai caro',
                'category_id' => '6',
                'price' => 250000,
                'discount' => 50,
                'brand_id' => '2',
                'images' => 'https://res.cloudinary.com/dyyybxgae/image/upload/v1534689797/Fashion/Phu%20Kien/Mu/A%CC%89nh_chu%CC%A3p_Ma%CC%80n_hi%CC%80nh_2018-08-15_lu%CC%81c_17.32.01.png&https://res.cloudinary.com/dyyybxgae/image/upload/v1534689797/Fashion/Phu%20Kien/Mu/A%CC%89nh_chu%CC%A3p_Ma%CC%80n_hi%CC%80nh_2018-08-15_lu%CC%81c_17.32.04.png&https://res.cloudinary.com/dyyybxgae/image/upload/v1534689798/Fashion/Phu%20Kien/Mu/A%CC%89nh_chu%CC%A3p_Ma%CC%80n_hi%CC%80nh_2018-08-15_lu%CC%81c_17.32.06.png&',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Mũ Balenciaga ',
                'description' => 'Mũ lữoi trai in logo ',
                'category_id' => '6',
                'price' => '350000',
                'discount' => '0',
                'brand_id' => '8',
                'images' => 'https://res.cloudinary.com/dyyybxgae/image/upload/v1534689784/Fashion/Phu%20Kien/Mu/A%CC%89nh_chu%CC%A3p_Ma%CC%80n_hi%CC%80nh_2018-08-15_lu%CC%81c_17.32.37.png&https://res.cloudinary.com/dyyybxgae/image/upload/v1534689783/Fashion/Phu%20Kien/Mu/A%CC%89nh_chu%CC%A3p_Ma%CC%80n_hi%CC%80nh_2018-08-15_lu%CC%81c_17.32.39.png&https://res.cloudinary.com/dyyybxgae/image/upload/v1534689784/Fashion/Phu%20Kien/Mu/A%CC%89nh_chu%CC%A3p_Ma%CC%80n_hi%CC%80nh_2018-08-15_lu%CC%81c_17.32.42.png&',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Mũ Kenzo ',
                'description' => 'Mũ lưỡi trai in hoạ tiết',
                'category_id' => '6',
                'price' => '90000',
                'discount' => '0',
                'brand_id' => '7',
                'images' => 'https://res.cloudinary.com/dyyybxgae/image/upload/v1534689808/Fashion/Phu%20Kien/Mu/A%CC%89nh_chu%CC%A3p_Ma%CC%80n_hi%CC%80nh_2018-08-15_lu%CC%81c_17.21.45.png&https://res.cloudinary.com/dyyybxgae/image/upload/v1534689809/Fashion/Phu%20Kien/Mu/A%CC%89nh_chu%CC%A3p_Ma%CC%80n_hi%CC%80nh_2018-08-15_lu%CC%81c_17.21.51.png&https://res.cloudinary.com/dyyybxgae/image/upload/v1534689809/Fashion/Phu%20Kien/Mu/A%CC%89nh_chu%CC%A3p_Ma%CC%80n_hi%CC%80nh_2018-08-15_lu%CC%81c_17.21.48.png&',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Nơ Balmain',
                'description' => 'Nơ nhung mềm mượt',
                'category_id' => '6',
                'price' => '390000',
                'discount' => '0',
                'brand_id' => '1',
                'images' => 'https://res.cloudinary.com/dyyybxgae/image/upload/v1534689827/Fashion/Phu%20Kien/No/A%CC%89nh_chu%CC%A3p_Ma%CC%80n_hi%CC%80nh_2018-08-15_lu%CC%81c_17.29.46.png&https://res.cloudinary.com/dyyybxgae/image/upload/v1534689827/Fashion/Phu%20Kien/No/A%CC%89nh_chu%CC%A3p_Ma%CC%80n_hi%CC%80nh_2018-08-15_lu%CC%81c_17.29.53.png&',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Thắt lưng Gucci',
                'description' => 'Thắt lưng logo ',
                'category_id' => '6',
                'price' => '600000',
                'discount' => '0',
                'brand_id' => '3',
                'images' => 'https://res.cloudinary.com/dyyybxgae/image/upload/v1534689892/Fashion/Phu%20Kien/That%20Lung/A%CC%89nh_chu%CC%A3p_Ma%CC%80n_hi%CC%80nh_2018-08-15_lu%CC%81c_17.27.08.png&https://res.cloudinary.com/dyyybxgae/image/upload/v1534689893/Fashion/Phu%20Kien/That%20Lung/A%CC%89nh_chu%CC%A3p_Ma%CC%80n_hi%CC%80nh_2018-08-15_lu%CC%81c_17.27.11.png&',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Thắt lưng Burberry ',
                'description' => 'Thắt lưng caro in hoạ tiết',
                'category_id' => '6',
                'price' => '390000',
                'discount' => '10',
                'brand_id' => '2',
                'images' => 'https://res.cloudinary.com/dyyybxgae/image/upload/v1534689880/Fashion/Phu%20Kien/That%20Lung/A%CC%89nh_chu%CC%A3p_Ma%CC%80n_hi%CC%80nh_2018-08-15_lu%CC%81c_17.27.27.png&https://res.cloudinary.com/dyyybxgae/image/upload/v1534689880/Fashion/Phu%20Kien/That%20Lung/A%CC%89nh_chu%CC%A3p_Ma%CC%80n_hi%CC%80nh_2018-08-15_lu%CC%81c_17.27.30.png&',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Caravat Valentino ',
                'description' => 'Caravat in hoạ tiết',
                'category_id' => '6',
                'price' => '290000',
                'discount' => '0',
                'brand_id' => '6',
                'images' => 'https://res.cloudinary.com/dyyybxgae/image/upload/v1534689859/Fashion/Phu%20Kien/Tie/A%CC%89nh_chu%CC%A3p_Ma%CC%80n_hi%CC%80nh_2018-08-15_lu%CC%81c_17.28.51.png&https://res.cloudinary.com/dyyybxgae/image/upload/v1534689861/Fashion/Phu%20Kien/Tie/A%CC%89nh_chu%CC%A3p_Ma%CC%80n_hi%CC%80nh_2018-08-15_lu%CC%81c_17.28.54.png&',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Caravat Burberry ',
                'description' => 'Caravat hoạ tiết caro',
                'category_id' => '6',
                'price' => '250000',
                'discount' => '0',
                'brand_id' => '2',
                'images' => 'https://res.cloudinary.com/dyyybxgae/image/upload/v1534689848/Fashion/Phu%20Kien/Tie/A%CC%89nh_chu%CC%A3p_Ma%CC%80n_hi%CC%80nh_2018-08-15_lu%CC%81c_17.29.18.png&https://res.cloudinary.com/dyyybxgae/image/upload/v1534689850/Fashion/Phu%20Kien/Tie/A%CC%89nh_chu%CC%A3p_Ma%CC%80n_hi%CC%80nh_2018-08-15_lu%CC%81c_17.29.21.png&',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Ví Fendi ',
                'description' => 'Ví da phối hoạ tiết ',
                'category_id' => '6',
                'price' => '390000',
                'discount' => '0',
                'brand_id' => '5',
                'images' => 'https://res.cloudinary.com/dyyybxgae/image/upload/v1534689909/Fashion/Phu%20Kien/Vi/A%CC%89nh_chu%CC%A3p_Ma%CC%80n_hi%CC%80nh_2018-08-15_lu%CC%81c_17.22.14.png&https://res.cloudinary.com/dyyybxgae/image/upload/v1534689908/Fashion/Phu%20Kien/Vi/A%CC%89nh_chu%CC%A3p_Ma%CC%80n_hi%CC%80nh_2018-08-15_lu%CC%81c_17.22.20.png&https://res.cloudinary.com/dyyybxgae/image/upload/v1534689908/Fashion/Phu%20Kien/Vi/A%CC%89nh_chu%CC%A3p_Ma%CC%80n_hi%CC%80nh_2018-08-15_lu%CC%81c_17.22.17.png&',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Quần Balenciaga ',
                'description' => 'Quần thể thao',
                'category_id' => '7',
                'price' => '890000',
                'discount' => '0',
                'brand_id' => '8',
                'images' => 'https://res.cloudinary.com/dyyybxgae/image/upload/v1534689168/Fashion/Quan/Balenciaga/A%CC%89nh_chu%CC%A3p_Ma%CC%80n_hi%CC%80nh_2018-08-15_lu%CC%81c_16.15.05.png&https://res.cloudinary.com/dyyybxgae/image/upload/v1534689168/Fashion/Quan/Balenciaga/A%CC%89nh_chu%CC%A3p_Ma%CC%80n_hi%CC%80nh_2018-08-15_lu%CC%81c_16.15.11.png&https://res.cloudinary.com/dyyybxgae/image/upload/v1534689169/Fashion/Quan/Balenciaga/A%CC%89nh_chu%CC%A3p_Ma%CC%80n_hi%CC%80nh_2018-08-15_lu%CC%81c_16.15.08.png&',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Quần Balmain ',
                'description' => 'Quần biker cao cấp phối gấu',
                'category_id' => '7',
                'price' => '1100000',
                'discount' => '15',
                'brand_id' => '1',
                'images' => 'https://res.cloudinary.com/dyyybxgae/image/upload/v1534689186/Fashion/Quan/Balmain/A%CC%89nh_chu%CC%A3p_Ma%CC%80n_hi%CC%80nh_2018-08-15_lu%CC%81c_16.14.14.png&https://res.cloudinary.com/dyyybxgae/image/upload/v1534689186/Fashion/Quan/Balmain/A%CC%89nh_chu%CC%A3p_Ma%CC%80n_hi%CC%80nh_2018-08-15_lu%CC%81c_16.14.21.png&https://res.cloudinary.com/dyyybxgae/image/upload/v1534689186/Fashion/Quan/Balmain/A%CC%89nh_chu%CC%A3p_Ma%CC%80n_hi%CC%80nh_2018-08-15_lu%CC%81c_16.14.17.png&',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Quần Burberry ',
                'description' => 'Quần kaki phối hoạ tiết caro ',
                'category_id' => '7',
                'price' => '790000',
                'discount' => '20',
                'brand_id' => '2',
                'images' => 'https://res.cloudinary.com/dyyybxgae/image/upload/v1534689217/Fashion/Quan/Burberry/A%CC%89nh_chu%CC%A3p_Ma%CC%80n_hi%CC%80nh_2018-08-15_lu%CC%81c_16.16.04.png&https://res.cloudinary.com/dyyybxgae/image/upload/v1534689217/Fashion/Quan/Burberry/A%CC%89nh_chu%CC%A3p_Ma%CC%80n_hi%CC%80nh_2018-08-15_lu%CC%81c_16.16.10.png&https://res.cloudinary.com/dyyybxgae/image/upload/v1534689216/Fashion/Quan/Burberry/A%CC%89nh_chu%CC%A3p_Ma%CC%80n_hi%CC%80nh_2018-08-15_lu%CC%81c_16.16.07.png&',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Quần Gucci',
                'description' => 'Quần lụa phối hoạ tiết ',
                'category_id' => '7',
                'price' => '1690000',
                'discount' => '0',
                'brand_id' => '3',
                'images' => 'https://res.cloudinary.com/dyyybxgae/image/upload/v1534689135/Fashion/Quan/Gucci/A%CC%89nh_chu%CC%A3p_Ma%CC%80n_hi%CC%80nh_2018-08-15_lu%CC%81c_16.11.15.png&https://res.cloudinary.com/dyyybxgae/image/upload/v1534689135/Fashion/Quan/Gucci/A%CC%89nh_chu%CC%A3p_Ma%CC%80n_hi%CC%80nh_2018-08-15_lu%CC%81c_16.11.21.png&https://res.cloudinary.com/dyyybxgae/image/upload/v1534689135/Fashion/Quan/Gucci/A%CC%89nh_chu%CC%A3p_Ma%CC%80n_hi%CC%80nh_2018-08-15_lu%CC%81c_16.11.18.png&',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Quần Kenzo',
                'description' => 'Quần jean phối hoạ tiết ',
                'category_id' => '7',
                'price' => '390000',
                'discount' => '0',
                'brand_id' => '7',
                'images' => 'https://res.cloudinary.com/dyyybxgae/image/upload/v1534689244/Fashion/Quan/Kenzo/A%CC%89nh_chu%CC%A3p_Ma%CC%80n_hi%CC%80nh_2018-08-15_lu%CC%81c_16.12.41.png&https://res.cloudinary.com/dyyybxgae/image/upload/v1534689244/Fashion/Quan/Kenzo/A%CC%89nh_chu%CC%A3p_Ma%CC%80n_hi%CC%80nh_2018-08-15_lu%CC%81c_16.12.47.png&https://res.cloudinary.com/dyyybxgae/image/upload/v1534689244/Fashion/Quan/Kenzo/A%CC%89nh_chu%CC%A3p_Ma%CC%80n_hi%CC%80nh_2018-08-15_lu%CC%81c_16.12.44.png&',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Quần Valentino ',
                'description' => 'Quần thể thao cao cấp phối hoạ tiết ',
                'category_id' => '7',
                'price' => '1290000',
                'discount' => '15',
                'brand_id' => '6',
                'images' => 'https://res.cloudinary.com/dyyybxgae/image/upload/v1534689264/Fashion/Quan/Valentino/A%CC%89nh_chu%CC%A3p_Ma%CC%80n_hi%CC%80nh_2018-08-15_lu%CC%81c_16.12.15.png&https://res.cloudinary.com/dyyybxgae/image/upload/v1534689264/Fashion/Quan/Valentino/A%CC%89nh_chu%CC%A3p_Ma%CC%80n_hi%CC%80nh_2018-08-15_lu%CC%81c_16.12.21.png&https://res.cloudinary.com/dyyybxgae/image/upload/v1534689264/Fashion/Quan/Valentino/A%CC%89nh_chu%CC%A3p_Ma%CC%80n_hi%CC%80nh_2018-08-15_lu%CC%81c_16.12.18.png&',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Áo Vest Balmain ',
                'description' => 'Áo vest lụa cao cấp phối nhung ',
                'category_id' => '8',
                'price' => '1900000',
                'discount' => '0',
                'brand_id' => '1',
                'images' => 'https://res.cloudinary.com/dyyybxgae/image/upload/v1534689940/Fashion/Vest/A%CC%89nh_chu%CC%A3p_Ma%CC%80n_hi%CC%80nh_2018-08-15_lu%CC%81c_13.23.46.png&https://res.cloudinary.com/dyyybxgae/image/upload/v1534689941/Fashion/Vest/A%CC%89nh_chu%CC%A3p_Ma%CC%80n_hi%CC%80nh_2018-08-15_lu%CC%81c_13.23.39.png&https://res.cloudinary.com/dyyybxgae/image/upload/v1534689940/Fashion/Vest/A%CC%89nh_chu%CC%A3p_Ma%CC%80n_hi%CC%80nh_2018-08-15_lu%CC%81c_13.23.49.png&',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
        ]);
    }
}

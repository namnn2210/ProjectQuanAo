<?php

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        \Illuminate\Support\Facades\DB::table('products')->truncate();
        \Illuminate\Support\Facades\DB::table('products')->insert([
           [
               'name' => 'Ao 1',
               'description' => 'Ao xin',
               'categoryId' => '1',
               'price' => '15',
               'brand_id' => '1',
               'images' => 'https://res.cloudinary.com/dncvywdxi/image/upload/c_fit,h_150,w_150/1534644117.png&https://res.cloudinary.com/dncvywdxi/image/upload/c_fit,h_150,w_150/1534644126.png&',
           ],
           [
               'name' => 'Ao 2',
               'description' => 'Ao xin',
               'categoryId' => '1',
               'price' => '15',
               'brand_id' => '1',
               'images' => 'https://res.cloudinary.com/dncvywdxi/image/upload/c_fit,h_150,w_150/1534644117.png&https://res.cloudinary.com/dncvywdxi/image/upload/c_fit,h_150,w_150/1534644126.png&',
           ],
           [
               'name' => 'Ao 3',
               'description' => 'Ao xin',
               'categoryId' => '1',
               'price' => '15',
               'brand_id' => '1',
               'images' => 'https://res.cloudinary.com/dncvywdxi/image/upload/c_fit,h_150,w_150/1534644117.png&https://res.cloudinary.com/dncvywdxi/image/upload/c_fit,h_150,w_150/1534644126.png&',],
           [
               'name' => 'Ao 4',
               'description' => 'Ao xin',
               'categoryId' => '1',
               'price' => '15',
               'brand_id' => '1',
               'images' => 'https://res.cloudinary.com/dncvywdxi/image/upload/c_fit,h_150,w_150/1534644117.png&https://res.cloudinary.com/dncvywdxi/image/upload/c_fit,h_150,w_150/1534644126.png&',
           ],
           [
               'name' => 'Ao 5',
               'description' => 'Ao xin',
               'categoryId' => '1',
               'price' => '15',
               'brand_id' => '1',
               'images' => 'https://res.cloudinary.com/dncvywdxi/image/upload/c_fit,h_150,w_150/1534644117.png&https://res.cloudinary.com/dncvywdxi/image/upload/c_fit,h_150,w_150/1534644126.png&',
           ],
           [
               'name' => 'Ao 6',
               'description' => 'Ao xin',
               'categoryId' => '1',
               'price' => '15',
               'brand_id' => '1',
               'images' => 'https://res.cloudinary.com/dncvywdxi/image/upload/c_fit,h_150,w_150/1534644117.png&https://res.cloudinary.com/dncvywdxi/image/upload/c_fit,h_150,w_150/1534644126.png&',
           ],
           [
               'name' => 'Ao 7',
               'description' => 'Ao xin',
               'categoryId' => '1',
               'price' => '15',
               'brand_id' => '1',
               'images' => 'https://res.cloudinary.com/dncvywdxi/image/upload/c_fit,h_150,w_150/1534644117.png&https://res.cloudinary.com/dncvywdxi/image/upload/c_fit,h_150,w_150/1534644126.png&',
           ],
           [
               'name' => 'Ao 8',
               'description' => 'Ao xin',
               'categoryId' => '1',
               'price' => '15',
               'brand_id' => '1',
               'images' => 'https://res.cloudinary.com/dncvywdxi/image/upload/c_fit,h_150,w_150/1534644117.png&https://res.cloudinary.com/dncvywdxi/image/upload/c_fit,h_150,w_150/1534644126.png&',
           ],
           [
               'name' => 'Ao 9',
               'description' => 'Ao xin',
               'categoryId' => '1',
               'price' => '15',
               'brand_id' => '1',
               'images' => 'https://res.cloudinary.com/dncvywdxi/image/upload/c_fit,h_150,w_150/1534644117.png&https://res.cloudinary.com/dncvywdxi/image/upload/c_fit,h_150,w_150/1534644126.png&',
           ],
           [
               'name' => 'Ao 10',
               'description' => 'Ao xin',
               'categoryId' => '1',
               'price' => '15',
               'brand_id' => '1',
               'images' => 'https://res.cloudinary.com/dncvywdxi/image/upload/c_fit,h_150,w_150/1534644117.png&https://res.cloudinary.com/dncvywdxi/image/upload/c_fit,h_150,w_150/1534644126.png&',
           ],
            [
                'name' => 'Ao 11',
                'description' => 'Ao xin',
                'categoryId' => '1',
                'price' => '15',
                'brand_id' => '1',
                'images' => 'https://res.cloudinary.com/dncvywdxi/image/upload/c_fit,h_150,w_150/1534644117.png&https://res.cloudinary.com/dncvywdxi/image/upload/c_fit,h_150,w_150/1534644126.png&',
            ],
            [
                'name' => 'Ao 12',
                'description' => 'Ao xin',
                'categoryId' => '1',
                'price' => '15',
                'brand_id' => '1',
                'images' => 'https://res.cloudinary.com/dncvywdxi/image/upload/c_fit,h_150,w_150/1534644117.png&https://res.cloudinary.com/dncvywdxi/image/upload/c_fit,h_150,w_150/1534644126.png&',
            ],
            [
                'name' => 'Ao 13',
                'description' => 'Ao xin',
                'categoryId' => '1',
                'price' => '15',
                'brand_id' => '1',
                'images' => 'https://res.cloudinary.com/dncvywdxi/image/upload/c_fit,h_150,w_150/1534644117.png&https://res.cloudinary.com/dncvywdxi/image/upload/c_fit,h_150,w_150/1534644126.png&',
            ],
            [
                'name' => 'Ao 14',
                'description' => 'Ao xin',
                'categoryId' => '1',
                'price' => '15',
                'brand_id' => '1',
                'images' => 'https://res.cloudinary.com/dncvywdxi/image/upload/c_fit,h_150,w_150/1534644117.png&https://res.cloudinary.com/dncvywdxi/image/upload/c_fit,h_150,w_150/1534644126.png&',
            ],
            [
                'name' => 'Ao 15',
                'description' => 'Ao xin',
                'categoryId' => '1',
                'price' => '15',
                'brand_id' => '1',
                'images' => 'https://res.cloudinary.com/dncvywdxi/image/upload/c_fit,h_150,w_150/1534644117.png&https://res.cloudinary.com/dncvywdxi/image/upload/c_fit,h_150,w_150/1534644126.png&',
            ],
            [
                'name' => 'Ao 16',
                'description' => 'Ao xin',
                'categoryId' => '1',
                'price' => '15',
                'brand_id' => '1',
                'images' => 'https://res.cloudinary.com/dncvywdxi/image/upload/c_fit,h_150,w_150/1534644117.png&https://res.cloudinary.com/dncvywdxi/image/upload/c_fit,h_150,w_150/1534644126.png&',
            ],
            [
                'name' => 'Ao 17',
                'description' => 'Ao xin',
                'categoryId' => '1',
                'price' => '15',
                'brand_id' => '1',
                'images' => 'https://res.cloudinary.com/dncvywdxi/image/upload/c_fit,h_150,w_150/1534644117.png&https://res.cloudinary.com/dncvywdxi/image/upload/c_fit,h_150,w_150/1534644126.png&',
            ],
            [
                'name' => 'Ao 18',
                'description' => 'Ao xin',
                'categoryId' => '1',
                'price' => '15',
                'brand_id' => '1',
                'images' => 'https://res.cloudinary.com/dncvywdxi/image/upload/c_fit,h_150,w_150/1534644117.png&https://res.cloudinary.com/dncvywdxi/image/upload/c_fit,h_150,w_150/1534644126.png&',
            ],
            [
                'name' => 'Ao 19',
                'description' => 'Ao xin',
                'categoryId' => '1',
                'price' => '15',
                'brand_id' => '1',
                'images' => 'https://res.cloudinary.com/dncvywdxi/image/upload/c_fit,h_150,w_150/1534644117.png&https://res.cloudinary.com/dncvywdxi/image/upload/c_fit,h_150,w_150/1534644126.png&',
            ],
            [
                'name' => 'Ao 20',
                'description' => 'Ao xin',
                'categoryId' => '1',
                'price' => '15',
                'brand_id' => '1',
                'images' => 'https://res.cloudinary.com/dncvywdxi/image/upload/c_fit,h_150,w_150/1534644117.png&https://res.cloudinary.com/dncvywdxi/image/upload/c_fit,h_150,w_150/1534644126.png&',
            ],
        ]);
    }
}

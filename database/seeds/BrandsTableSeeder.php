<?php

use Illuminate\Database\Seeder;

class BrandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        \Illuminate\Support\Facades\DB::table('brands')->truncate();
        \Illuminate\Support\Facades\DB::table('brands')->insert([
           [
               'name' => 'Balmain',
               'description' => 'Hãng thời trang cao cấp của Pháp',
               'country' => 'Pháp',
               'logo' => 'https://res.cloudinary.com/dncvywdxi/image/upload/v1534344051/Brand%20Img/balmain_logo.png'
           ],
           [
               'name' => 'Burberry',
               'description' => 'Hãng thời trang cao cấp của Anh',
               'country' => 'Anh',
               'logo' => 'https://res.cloudinary.com/dncvywdxi/image/upload/v1534344051/Brand%20Img/burberry_logo.png'
           ],
           [
               'name' => 'Gucci',
               'description' => 'Hãng thời trang cao cấp của Ý',
               'country' => 'Ý',
               'logo' => 'https://res.cloudinary.com/dncvywdxi/image/upload/v1534344052/Brand%20Img/gucci_logo.png'
           ],
           [
               'name' => 'Lanvin',
               'description' => 'Hãng thời trang cao cấp của Pháp',
               'country' => 'Pháp',
               'logo' => 'https://res.cloudinary.com/dncvywdxi/image/upload/v1534344053/Brand%20Img/lanvin_logo.png'
           ],
            [
                'name' => 'Fendi',
                'description' => 'Hãng thời trang cao cấp của Ý',
                'country' => 'Ý',
                'logo' => 'https://res.cloudinary.com/dncvywdxi/image/upload/v1534345608/Brand%20Img/fendi_logo.png'
            ],
            [
                'name' => 'Valentino',
                'description' => 'Hãng thời trang cao cấp của Ý',
                'country' => 'Ý',
                'logo' => 'https://res.cloudinary.com/dncvywdxi/image/upload/v1534345610/Brand%20Img/valentation_logo.png'
            ],
            [
                'name' => 'Kenzo',
                'description' => 'Hãng thời trang cao cấp của Pháp',
                'country' => 'Pháp',
                'logo' => 'https://res.cloudinary.com/dncvywdxi/image/upload/v1534345608/Brand%20Img/kenzo_logo.png'
            ],
            [
                'name' => 'Balenciaga',
                'description' => 'Hãng thời trang cao cấp của Tây Ban Nha',
                'country' => 'Tây Ban Nha',
                'logo' => 'https://res.cloudinary.com/dncvywdxi/image/upload/v1534345611/Brand%20Img/balenciaga_logo.png'
            ],
            [
                'name' => 'Saint Laurent',
                'description' => 'Hãng thời trang cao cấp của Pháp',
                'country' => 'Pháp',
                'logo' => 'https://res.cloudinary.com/dyyybxgae/image/upload/v1534695307/Fashion/logo-Yves-Saint-Laurent.jpg'
            ],
        ]);
    }
}

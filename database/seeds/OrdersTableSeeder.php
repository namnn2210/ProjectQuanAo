<?php

use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder
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
        \Illuminate\Support\Facades\DB::table('orders')->truncate();
        \Illuminate\Support\Facades\DB::table('orders')->insert([
            [
                'customer_id'=>'KH1568456924',
                'total_price'=>1750000,
                'ship_name'=>'Ngô Ngọc Nam',
                'ship_address'=>'Hà Nội',
                'ship_phone'=>'01548795621',
                'ship_email'=>'ngongocnam2210@gmail.com',
                'payment_method' => 'paypal',
                'created_at'=>\Carbon\Carbon::create(2018, 6, 20, 6, 32, 34),
                'updated_at'=>\Carbon\Carbon::create(2018, 6, 20, 12, 15, 15),
                'status'=>0
            ],
            [
                'customer_id'=>'KH4158745198',
                'total_price'=>790000,
                'ship_name'=>'Vũ Tiến Phúc',
                'ship_address'=>'Hà Nội',
                'ship_phone'=>'0989874514',
                'ship_email'=>'vu.tienphuc97@gmail.com',
                'payment_method' => 'paypal',
                'created_at'=>\Carbon\Carbon::create(2018, 5, 26, 3, 33, 33),
                'updated_at'=>\Carbon\Carbon::create(2018, 5, 26, 11, 16, 16),
                'status'=>1
            ],
            [
                'customer_id'=>'KH2648741598',
                'total_price'=>2500000,
                'ship_name'=>'Võ Hồ Phương Nam',
                'ship_address'=>'Hà Nội',
                'ship_phone'=>'012345667889',
                'ship_email'=>'vohophuongnam@gmail.com',
                'payment_method' => 'paypal',
                'created_at'=>\Carbon\Carbon::create(2018, 2, 24, 3, 32, 32),
                'updated_at'=>\Carbon\Carbon::create(2018, 2, 24, 13, 17, 17),
                'status'=>0
            ],
            [
                'customer_id'=>'KH1478495247',
                'total_price'=>4000000,
                'ship_name'=>'Đặng Thành Đạt',
                'ship_address'=>'Hà Nội',
                'ship_phone'=>'01678411215',
                'ship_email'=>'abcdefghij@gmail.com',
                'payment_method' => 'cod',
                'created_at'=>\Carbon\Carbon::create(2018, 3, 21, 2, 31, 31),
                'updated_at'=>\Carbon\Carbon::create(2018, 3, 21, 8, 30, 20),
                'status'=>2
            ],
            [
                'customer_id'=>'KH7854995632',
                'total_price'=>5000000,
                'ship_name'=>'Đặng Doanh Quảng',
                'ship_address'=>'Hà Nội',
                'ship_phone'=>'01232547741',
                'ship_email'=>'abcdefghij9999@gmail.com',
                'payment_method' => 'paypal',
                'created_at'=>\Carbon\Carbon::create(2018, 4, 22, 1, 20, 20),
                'updated_at'=>\Carbon\Carbon::create(2018, 4, 22, 14, 20, 20),
                'status'=>0
            ],
            [
                'customer_id'=>'KH3269874415',
                'total_price'=>678000,
                'ship_name'=>'Nguyễn Tuấn Anh',
                'ship_address'=>'Thái Bình',
                'ship_phone'=>'01697511478',
                'ship_email'=>'abcdefghij7@gmail.com',
                'payment_method' => 'cod',
                'created_at'=>\Carbon\Carbon::create(2018, 7, 23, 9, 20, 20),
                'updated_at'=>\Carbon\Carbon::create(2018, 7, 23, 15, 14, 20),
                'status'=>-1
            ],
            [
                'customer_id'=>'KH1205480697',
                'total_price'=>890000,
                'ship_name'=>'Bùi Đông Tùng',
                'ship_address'=>'Hà Nội',
                'ship_phone'=>'0988507254',
                'ship_email'=>'abcdefghij123456@gmail.com',
                'payment_method' => 'cod',
                'created_at'=>\Carbon\Carbon::create(2018, 7, 10, 10, 35, 28),
                'updated_at'=>\Carbon\Carbon::create(2018, 7, 10, 16, 37, 21),
                'status'=>0
            ],
            [
                'customer_id'=>'KH0210054895',
                'total_price'=>1270000,
                'ship_name'=>'Nguyễn Mạnh ĐỨc',
                'ship_address'=>'Bắc Giang',
                'ship_phone'=>'01478479815',
                'ship_email'=>'abcdefghij1234@gmail.com',
                'payment_method' => 'cod',
                'created_at'=>\Carbon\Carbon::create(2018, 8, 20, 10, 20, 20),
                'updated_at'=>\Carbon\Carbon::create(2018, 8, 20, 17, 27, 45),
                'status'=>1
            ],
            [
                'customer_id'=>'KH3652114778',
                'total_price'=>1460000,
                'ship_name'=>'Hoàng Hồng Hà',
                'ship_address'=>'Lào Cai',
                'ship_phone'=>'01254789856',
                'ship_email'=>'quangbobby163@gmail.com',
                'payment_method' => 'cod',
                'created_at'=>\Carbon\Carbon::create(2018, 8, 21, 11, 26, 22),
                'updated_at'=>\Carbon\Carbon::create(2018, 8, 21, 18, 26, 29),
                'status'=>0
            ],
            [
                'customer_id'=>'KH0214587498',
                'total_price'=>150000,
                'ship_name'=>'Nguyễn Hải Anh',
                'ship_address'=>'Thái Nguyên',
                'ship_phone'=>'01548745981',
                'ship_email'=>'mocchua97@gmail.com',
                'payment_method' => 'paypal',
                'created_at'=>\Carbon\Carbon::create(2018, 8, 22, 12, 23, 22),
                'updated_at'=>\Carbon\Carbon::create(2018, 8, 22, 19, 24, 25),
                'status'=>-1
            ],
            [
                'customer_id'=>'KH1536666037',
                'total_price'=>4048000,
                'ship_name'=>'Dang Doanh Quang',
                'ship_address'=>'Ha Noi',
                'ship_phone'=>'0987667106',
                'created_at'=>\Carbon\Carbon::create(2018, 9, 11, 11, 40, 36),
                'updated_at'=>\Carbon\Carbon::create(2018, 9, 11, 11, 40, 37),
                'status'=>-1
            ],
            [
                'customer_id'=>'KH1536893174',
                'total_price'=>5144000,
                'ship_name'=>'Nguyễn Linh Anh',
                'ship_address'=>'Hà Nội',
                'ship_phone'=>'0987556190',
                'created_at'=>\Carbon\Carbon::create(2018, 9, 14, 02, 46, 14),
                'updated_at'=>\Carbon\Carbon::create(2018, 9, 14, 02, 46, 14),
                'status'=>-1
            ],
            [
                'customer_id'=>'KH1536893262',
                'total_price'=>5500000,
                'ship_name'=>'Lê Hà Trang',
                'ship_address'=>'Hà Nội',
                'ship_phone'=>'0987667106',
                'created_at'=>\Carbon\Carbon::create(2018, 8, 10, 9, 19, 22),
                'updated_at'=>\Carbon\Carbon::create(2018, 8, 10, 9, 19, 25),
                'status'=>-1
            ],
            [
                'customer_id'=>'KH1536893325',
                'total_price'=>3488000,
                'ship_name'=>'Trần Anh Minh',
                'ship_address'=>'Hải Dương',
                'ship_phone'=>'0912476495',
                'created_at'=>\Carbon\Carbon::create(2018, 8, 12, 8, 12, 11),
                'updated_at'=>\Carbon\Carbon::create(2018, 8, 12, 8, 14, 10),
                'status'=>-1
            ],
            [
                'customer_id'=>'KH1536893401',
                'total_price'=>3212000,
                'ship_name'=>'Lê Anh Khôi',
                'ship_address'=>'Hải Phòng',
                'ship_phone'=>'0966739485',
                'created_at'=>\Carbon\Carbon::create(2018, 6, 8, 15, 34, 12),
                'updated_at'=>\Carbon\Carbon::create(2018, 6, 8, 15, 39, 13),
                'status'=>-1
            ],
            [
                'customer_id'=>'KH1536893480',
                'total_price'=>6832000,
                'ship_name'=>'Nguyễn Ngọc Linh',
                'ship_address'=>'Hà Nội',
                'ship_phone'=>'0965334859',
                'created_at'=>\Carbon\Carbon::create(2018, 7, 12, 8, 15, 23),
                'updated_at'=>\Carbon\Carbon::create(2018, 7, 12, 8, 24, 25),
                'status'=>-1
            ],
            [
                'customer_id'=>'KH1536896608',
                'total_price'=>7940000,
                'ship_name'=>'Đặng Nam Anh',
                'ship_address'=>'Hưng Yên',
                'ship_phone'=>'0988671360',
                'created_at'=>\Carbon\Carbon::create(2018, 7, 10, 12, 30, 10),
                'updated_at'=>\Carbon\Carbon::create(2018, 7, 10, 12, 37, 15),
                'status'=>-1
            ],
            [
                'customer_id'=>'KH1536896644',
                'total_price'=>1514000,
                'ship_name'=>'Lê Minh Đăng',
                'ship_address'=>'Hưng Yên',
                'ship_phone'=>'0937349328',
                'created_at'=>\Carbon\Carbon::create(2018, 6, 27, 22, 12, 22),
                'updated_at'=>\Carbon\Carbon::create(2018, 6, 27, 22, 12, 25),
                'status'=>-1
            ],
            [
                'customer_id'=>'KH1536896686',
                'total_price'=>4743000,
                'ship_name'=>'Đặng Hoài Nam',
                'ship_address'=>'Hà Nội',
                'ship_phone'=>'09871234124',
                'created_at'=>\Carbon\Carbon::create(2018, 7, 01, 8, 39, 22),
                'updated_at'=>\Carbon\Carbon::create(2018, 7, 01, 8, 44, 25),
                'status'=>-1
            ],
            [
                'customer_id'=>'KH1536897128',
                'total_price'=>3600000,
                'ship_name'=>'Nguyễn Ngọc Anh',
                'ship_address'=>'Hưng Yên',
                'ship_phone'=>'0983742345',
                'created_at'=>\Carbon\Carbon::create(2018, 8, 30, 19, 34, 22),
                'updated_at'=>\Carbon\Carbon::create(2018, 8, 30, 19, 44, 25),
                'status'=>-1
            ],
            [
                'customer_id'=>'KH1536912791',
                'total_price'=>4187000,
                'ship_name'=>'Trần Hải Đăng',
                'ship_address'=>'Hà Nội',
                'ship_phone'=>'0934839211',
                'created_at'=>\Carbon\Carbon::create(2018, 5, 28, 19, 23, 22),
                'updated_at'=>\Carbon\Carbon::create(2018, 5, 28, 19, 29, 25),
                'status'=>-1
            ],
            [
                'customer_id'=>'KH1536912838',
                'total_price'=>3864000,
                'ship_name'=>'Đặng Minh Anh',
                'ship_address'=>'Hải Dương',
                'ship_phone'=>'0978324170',
                'created_at'=>\Carbon\Carbon::create(2018, 4, 8, 17, 21, 22),
                'updated_at'=>\Carbon\Carbon::create(2018, 4, 8, 17, 29, 25),
                'status'=>-1
            ],
            [
                'customer_id'=>'KH1536912901',
                'total_price'=>4954000,
                'ship_name'=>'Nguyễn Đăng Nguyên',
                'ship_address'=>'Hà Nội',
                'ship_phone'=>'0937632823',
                'created_at'=>\Carbon\Carbon::create(2018, 3, 16, 16, 36, 22),
                'updated_at'=>\Carbon\Carbon::create(2018, 3, 16, 16, 39, 25),
                'status'=>-1
            ],
            [
                'customer_id'=>'KH1536912947',
                'total_price'=>4762000,
                'ship_name'=>'Nguyễn Kiều Anh',
                'ship_address'=>'Hà Nội',
                'ship_phone'=>'0937412732',
                'created_at'=>\Carbon\Carbon::create(2018, 2, 14, 13, 12, 22),
                'updated_at'=>\Carbon\Carbon::create(2018, 2, 14, 13, 24, 25),
                'status'=>-1
            ],
            [
                'customer_id'=>'KH1536913019',
                'total_price'=>7650000,
                'ship_name'=>'Lê Anh',
                'ship_address'=>'Hà Nội',
                'ship_phone'=>'0932714380',
                'created_at'=>\Carbon\Carbon::create(2018, 1, 18, 14, 13, 22),
                'updated_at'=>\Carbon\Carbon::create(2018, 1, 18, 14, 19, 25),
                'status'=>-1
            ],
            [
                'customer_id'=>'KH1536913116',
                'total_price'=>8740000,
                'ship_name'=>'Nguyễn Hải Đăng',
                'ship_address'=>'Hà Nội',
                'ship_phone'=>'0923782144',
                'created_at'=>\Carbon\Carbon::create(2018, 2, 18, 15, 23, 22),
                'updated_at'=>\Carbon\Carbon::create(2018, 2, 18, 15, 29, 25),
                'status'=>-1
            ],
            [
                'customer_id'=>'KH1536913289',
                'total_price'=>3680000,
                'ship_name'=>'An Như',
                'ship_address'=>'Hà Nội',
                'ship_phone'=>'0932746378',
                'created_at'=>\Carbon\Carbon::create(2018, 3, 14, 10, 13, 22),
                'updated_at'=>\Carbon\Carbon::create(2018, 3, 14, 10, 19, 25),
                'status'=>-1
            ],
            [
                'customer_id'=>'KH1536942906',
                'total_price'=>1424000,
                'ship_name'=>'Phạm Hương Giang',
                'ship_address'=>'Hưng Yên',
                'ship_phone'=>'0983473780',
                'created_at'=>\Carbon\Carbon::create(2018, 3, 15, 11, 15, 22),
                'updated_at'=>\Carbon\Carbon::create(2018, 3, 15, 11, 16, 25),
                'status'=>-1
            ],
            [
                'customer_id'=>'KH1536943872',
                'total_price'=>1500000,
                'ship_name'=>'Hoàng Mai Phương',
                'ship_address'=>'Hà Nội',
                'ship_phone'=>'0938174294',
                'created_at'=>\Carbon\Carbon::create(2018, 3, 22, 18, 13, 22),
                'updated_at'=>\Carbon\Carbon::create(2018, 3, 22, 18, 19, 25),
                'status'=>-1
            ],
            [
                'customer_id'=>'KH1536943932',
                'total_price'=>1224000,
                'ship_name'=>'Lê Na',
                'ship_address'=>'Hải Dương',
                'ship_phone'=>'0932536577',
                'created_at'=>\Carbon\Carbon::create(2018, 3, 13, 19, 13, 22),
                'updated_at'=>\Carbon\Carbon::create(2018, 3, 13, 19, 19, 25),
                'status'=>-1
            ],
            [
                'customer_id'=>'KH1536944039',
                'total_price'=>1260000,
                'ship_name'=>'Đào Hải Nam',
                'ship_address'=>'Hà Nội',
                'ship_phone'=>'0932746378',
                'created_at'=>\Carbon\Carbon::create(2018, 3, 24, 20, 13, 22),
                'updated_at'=>\Carbon\Carbon::create(2018, 3, 24, 20, 19, 25),
                'status'=>-1
            ],
            [
                'customer_id'=>'KH1536944260',
                'total_price'=>860000,
                'ship_name'=>'Đặng Đạt',
                'ship_address'=>'Hà Nội',
                'ship_phone'=>'0983215443',
                'created_at'=>\Carbon\Carbon::create(2018, 4, 14, 10, 13, 22),
                'updated_at'=>\Carbon\Carbon::create(2018, 4, 14, 10, 19, 25),
                'status'=>-1
            ],
            [
                'customer_id'=>'KH1536944300',
                'total_price'=>3380000,
                'ship_name'=>'Nguyễn Khải',
                'ship_address'=>'Hà Nội',
                'ship_phone'=>'0932312582',
                'created_at'=>\Carbon\Carbon::create(2018, 4, 16, 11, 13, 22),
                'updated_at'=>\Carbon\Carbon::create(2018, 4, 16, 11, 19, 25),
                'status'=>-1
            ],[
                'customer_id'=>'KH1536944374',
                'total_price'=>2550000,
                'ship_name'=>'Lâm An',
                'ship_address'=>'Hà Nội',
                'ship_phone'=>'0934733252',
                'created_at'=>\Carbon\Carbon::create(2018, 4, 22, 10, 13, 22),
                'updated_at'=>\Carbon\Carbon::create(2018, 4, 22, 10, 19, 25),
                'status'=>-1
            ],
            [
                'customer_id'=>'KH1536944523',
                'total_price'=>2460000,
                'ship_name'=>'Trương An',
                'ship_address'=>'Hà Nội',
                'ship_phone'=>'0932746378',
                'created_at'=>\Carbon\Carbon::create(2018, 6, 14, 12, 13, 22),
                'updated_at'=>\Carbon\Carbon::create(2018, 6, 14, 12, 19, 25),
                'status'=>-1
            ],
            [
                'customer_id'=>'KH1536944559',
                'total_price'=>2624000,
                'ship_name'=>'Trương Thái An',
                'ship_address'=>'Hà Nội',
                'ship_phone'=>'0973683342',
                'created_at'=>\Carbon\Carbon::create(2018, 6, 15, 11, 13, 22),
                'updated_at'=>\Carbon\Carbon::create(2018, 6, 15, 11, 19, 25),
                'status'=>-1
            ],
            [
                'customer_id'=>'KH1536944639',
                'total_price'=>1170000,
                'ship_name'=>'Nguyễn Mạnh',
                'ship_address'=>'Hà Nội',
                'ship_phone'=>'0973215235',
                'created_at'=>\Carbon\Carbon::create(2018, 6, 22, 13, 13, 22),
                'updated_at'=>\Carbon\Carbon::create(2018, 6, 22, 13, 19, 25),
                'status'=>-1
            ],[
                'customer_id'=>'KH1536944787',
                'total_price'=>680000,
                'ship_name'=>'Nguyễn Tiến',
                'ship_address'=>'Hà Nội',
                'ship_phone'=>'0943566342',
                'created_at'=>\Carbon\Carbon::create(2018, 6, 24, 10, 13, 22),
                'updated_at'=>\Carbon\Carbon::create(2018, 6, 24, 10, 19, 25),
                'status'=>-1
            ],
            [
                'customer_id'=>'KH1536944867',
                'total_price'=>2900000,
                'ship_name'=>'Đặng Quảng',
                'ship_address'=>'Hà Nội',
                'ship_phone'=>'0983343215',
                'created_at'=>\Carbon\Carbon::create(2018, 6, 16, 14, 13, 22),
                'updated_at'=>\Carbon\Carbon::create(2018, 6, 16, 14, 19, 25),
                'status'=>-1
            ],
            [
                'customer_id'=>'KH1536944907',
                'total_price'=>1580000,
                'ship_name'=>'Lê Nam',
                'ship_address'=>'Hà Nội',
                'ship_phone'=>'0932746378',
                'created_at'=>\Carbon\Carbon::create(2018, 7, 14, 15, 13, 22),
                'updated_at'=>\Carbon\Carbon::create(2018, 7, 14, 15, 19, 25),
                'status'=>-1
            ],
            [
                'customer_id'=>'KH1536944947',
                'total_price'=>1500000,
                'ship_name'=>'Ngô Nam',
                'ship_address'=>'Hà Nội',
                'ship_phone'=>'0932746378',
                'created_at'=>\Carbon\Carbon::create(2018, 7, 16, 17, 13, 22),
                'updated_at'=>\Carbon\Carbon::create(2018, 7, 16, 17, 19, 25),
                'status'=>-1
            ],
            [
                'customer_id'=>'KH1536944978',
                'total_price'=>1700000,
                'ship_name'=>'Võ Nam',
                'ship_address'=>'Hà Nội',
                'ship_phone'=>'0932155323',
                'created_at'=>\Carbon\Carbon::create(2018, 7, 22, 13, 13, 22),
                'updated_at'=>\Carbon\Carbon::create(2018, 7, 22, 13, 19, 25),
                'status'=>-1
            ],
            [
                'customer_id'=>'KH1536945029',
                'total_price'=>1900000,
                'ship_name'=>'Nguyễn Phúc',
                'ship_address'=>'Hà Nội',
                'ship_phone'=>'0932746378',
                'created_at'=>\Carbon\Carbon::create(2018, 8, 16, 10, 13, 22),
                'updated_at'=>\Carbon\Carbon::create(2018, 8, 16, 10, 19, 25),
                'status'=>-1
            ],
            [
                'customer_id'=>'KH1536945075',
                'total_price'=>1870000,
                'ship_name'=>'Vũ Phúc',
                'ship_address'=>'Hà Nội',
                'ship_phone'=>'0931243223',
                'created_at'=>\Carbon\Carbon::create(2018, 8, 24, 11, 13, 22),
                'updated_at'=>\Carbon\Carbon::create(2018, 8, 24, 11, 19, 25),
                'status'=>-1
            ],[
                'customer_id'=>'KH1536945130',
                'total_price'=>15480000,
                'ship_name'=>'Đặng Đạt',
                'ship_address'=>'Hà Nội',
                'ship_phone'=>'0932143521',
                'created_at'=>\Carbon\Carbon::create(2018, 8, 30, 12, 13, 22),
                'updated_at'=>\Carbon\Carbon::create(2018, 8, 30, 12, 19, 25),
                'status'=>-1
            ],
            [
                'customer_id'=>'KH1536945172',
                'total_price'=>13250000,
                'ship_name'=>'Ngô Ngọc',
                'ship_address'=>'Hà Nội',
                'ship_phone'=>'0932145332',
                'created_at'=>\Carbon\Carbon::create(2018, 9, 10, 14, 13, 22),
                'updated_at'=>\Carbon\Carbon::create(2018, 9, 10, 14, 19, 25),
                'status'=>-1
            ],
            [
                'customer_id'=>'KH1536945228',
                'total_price'=>11000000,
                'ship_name'=>'Võ Phương Nam',
                'ship_address'=>'Hà Nội',
                'ship_phone'=>'0932746378',
                'created_at'=>\Carbon\Carbon::create(2018, 9, 12, 13, 13, 22),
                'updated_at'=>\Carbon\Carbon::create(2018, 9, 12, 13, 19, 25),
                'status'=>-1
            ],
            [
                'customer_id'=>'KH1536945262',
                'total_price'=>10800000,
                'ship_name'=>'Vũ Nam',
                'ship_address'=>'Hà Nội',
                'ship_phone'=>'0943125233',
                'created_at'=>\Carbon\Carbon::create(2018, 9, 13, 14, 13, 22),
                'updated_at'=>\Carbon\Carbon::create(2018, 9, 13, 14, 19, 25),
                'status'=>-1
            ],
            [
                'customer_id'=>'KH1536945302',
                'total_price'=>7400000,
                'ship_name'=>'Đặng Thành',
                'ship_address'=>'Hà Nội',
                'ship_phone'=>'0931453412',
                'created_at'=>\Carbon\Carbon::create(2018, 9, 14, 15, 13, 22),
                'updated_at'=>\Carbon\Carbon::create(2018, 9, 14, 15, 19, 25),
                'status'=>-1
            ],
            [
                'customer_id'=>'KH1536945350',
                'total_price'=>1400000,
                'ship_name'=>'Vũ Nam',
                'ship_address'=>'Hà Nội',
                'ship_phone'=>'0932746378',
                'created_at'=>\Carbon\Carbon::create(2018, 9, 14, 10, 13, 22),
                'updated_at'=>\Carbon\Carbon::create(2018, 9, 14, 10, 19, 25),
                'status'=>-1
            ],
        ]);
    }
}

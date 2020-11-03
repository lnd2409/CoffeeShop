<?php

use Illuminate\Database\Seeder;

class KhachHangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $loaiKhachHang = [
            [
                'lkh_ten' => 'Khách hàng thường'
            ],
            [
                'lkh_ten' => 'Khách hàng VIP'
            ]
        ];

        DB::table('loaikhachhang')->insert($loaiKhachHang);

        $khachHang = [
            [
                'kh_ten' => 'Dương Ngọc Tâm',
                'kh_sdt' => '123456789',
                'username' => 'khachhang1',
                'password' => Hash::make(123),
                'lkh_id' => rand(1,2)
            ],
            [
                'kh_ten' => 'Lê Ngọc Đức',
                'kh_sdt' => '123456789',
                'username' => 'khachhang2',
                'password' => Hash::make(123),
                'lkh_id' => rand(1,2)
            ],
            [
                'kh_ten' => 'Lê Minh Nghĩa',
                'kh_sdt' => '123456789',
                'username' => 'khachhang3',
                'password' => Hash::make(123),
                'lkh_id' => rand(1,2)
            ],
            [
                'kh_ten' => 'Trần Thanh Phụng',
                'kh_sdt' => '123456789',
                'username' => 'khachhang4',
                'password' => Hash::make(123),
                'lkh_id' => rand(1,2)
            ],
        ];

        DB::table('khachhang')->insert($khachHang);
    }
}

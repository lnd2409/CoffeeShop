<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'username' => 'admin',
                'password' => Hash::make(123),
                'nv_ten' => 'Dương Ngọc Tâm',
                'nv_cmnd' => 1234567890,
                'nv_sdt' => '1234567890',
                'nv_quyen'=>0
                
            ]
        ];
        DB::table('nhanvien')->insert($user);
        $loaikhuyenmai = [
            [
                'lkm_ten' => 'Loại sản phẩm',
            ],
            [
                'lkm_ten'=>'Voucher'
            ]
        ];
        DB::table('loaikhuyenmai')->insert($loaikhuyenmai);

        $loaibanan = [
            [
                'lba_ten' => 'Bàn dài nhiều người (trên 10 người)'
            ],
            [
                'lba_ten' => 'Bàn vip'
            ],
            [
                'lba_ten' => 'Bàn tròn (10 người)'
            ],
            [
                'lba_ten' => 'Bàn thường'
            ],
        ];

        DB::table('loaibanan')->insert($loaibanan);

        DB::table('loaikhachhang')->insert([
            [
                'lkh_id'=>1,
                'lkh_ten'=>'khách hàng mới'
            ],
            [
                'lkh_id'=>2,
                'lkh_ten'=>'khách hàng đồng'
            ],
            [
                'lkh_id'=>3,
                'lkh_ten'=>'khách hàng bạc'
            ],
            [
                'lkh_id'=>4,
                'lkh_ten'=>'khách hàng vàng'
            ],
            [
                'lkh_id'=>5,
                'lkh_ten'=>'khách hàng kim cương'
            ],
        ]);


        $nhomnonan = [
            [
                'nma_ten' => 'Pizza'
            ],
            [
                'nma_ten' => 'Coffe'
            ],
            [
                'nma_ten' => 'Sinh tố'
            ],
            [
                'nma_ten' => 'Thịt Bò'
            ],
            [
                'nma_ten' => 'Thịt Cá'
            ],
            [
                'nma_ten' => 'Thịt Heo'
            ],
            [
                'nma_ten' => 'Hải sản'
            ],
           
        ];

        DB::table('nhommonan')->insert($nhomnonan);



        $monan = [
            [
                'ma_ten' => 'Pizza trứng muối',
                'ma_chuthich'=>'Thích đượic ăn FREE',
                'ma_gia'=>500000,
                'nma_id'=>1
            ],
            [
                'ma_ten' => 'Pizza hải sản',
                'ma_chuthich'=>'Thích đượic ăn FREE',
                'ma_gia'=>500000,
                'nma_id'=>1
            ],
            [
                'ma_ten' => 'Cafe sữa nóng',
                'ma_chuthich'=>'Thích đượic ăn FREE',
                'ma_gia'=>140000,
                'nma_id'=>2
            ],
            [
                'ma_ten' => 'Sinh tố dâu',
                'ma_chuthich'=>'Thích đượic ăn FREE',
                'ma_gia'=>140000,
                'nma_id'=>3
            ],
            [
                'ma_ten' => 'Sinh tố bơ',
                'ma_chuthich'=>'Thích đượic ăn FREE',
                'ma_gia'=>140000,
                'nma_id'=>3
            ],
            [
                'ma_ten' => 'Cafe sữa đá',
                'ma_chuthich'=>'Thích đượic ăn FREE',
                'ma_gia'=>140000,
                'nma_id'=>2
            ],
            [
                'ma_ten' => 'Bò Cô-Be',
                'ma_chuthich'=>'Thích đượic ăn FREE',
                'ma_gia'=>100000000,
                'nma_id'=>4
            ],
            [
                'ma_ten' => 'Cá Tai Tượng Chiên xù',
                'ma_chuthich'=>'Thích đượic ăn FREE',
                'ma_gia'=>15000000,
                'nma_id'=>5
            ],
            [
                'ma_ten' => 'Heo Chiên giòn',
                'ma_chuthich'=>'Thích đượic ăn FREE',
                'ma_gia'=>15000000,
                'nma_id'=>6
            ],
            [
                'ma_ten' => 'Tôm hùm Alaska nướng cháy tỏi',
                'ma_chuthich'=>'Thích đượic ăn FREE',
                'ma_gia'=>500000,
                'nma_id'=>7
            ],
            [
                'ma_ten' => 'Bào ngư nướng mỡ hành',
                'ma_chuthich'=>'Thích đượic ăn FREE',
                'ma_gia'=>500000,
                'nma_id'=>7
            ],
            [
                'ma_ten' => 'Vây cá mập xông khói',
                'ma_chuthich'=>'Thích đượic ăn FREE',
                'ma_gia'=>500000,
                'nma_id'=>7
            ],
           
           
           
        ];

        DB::table('monan')->insert($monan);

        $banan = [
            [
               'ba_trangthai'=>0,
               'lba_id'=>4
            ],

           
        ];
        for($i=1; $i<=10 ; $i++)
         DB::table('banan')->insert($banan);


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

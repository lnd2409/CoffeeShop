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
                'nv_sdt' => '1234567890'
            ]
        ];
        DB::table('nhanvien')->insert($user);

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
                'nma_id'=>'1'
            ],
            [
                'ma_ten' => 'Pizza hải sản',
                'ma_chuthich'=>'Thích đượic ăn FREE',
                'ma_gia'=>500000,
                'nma_id'=>'1'
            ],
            [
                'ma_ten' => 'Tôm hùm Alaska nướng cháy tỏi',
                'ma_chuthich'=>'Thích đượic ăn FREE',
                'ma_gia'=>500000,
                'nma_id'=>'7'
            ],
            [
                'ma_ten' => 'Bào ngư nướng mỡ hành',
                'ma_chuthich'=>'Thích đượic ăn FREE',
                'ma_gia'=>500000,
                'nma_id'=>'7'
            ],
            [
                'ma_ten' => 'Vây cá mập xông khói',
                'ma_chuthich'=>'Thích đượic ăn FREE',
                'ma_gia'=>500000,
                'nma_id'=>'7'
            ],
           
           
           
        ];

        DB::table('monan')->insert($monan);
    }
}

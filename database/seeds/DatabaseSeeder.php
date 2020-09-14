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
    }
}

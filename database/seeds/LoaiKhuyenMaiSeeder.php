<?php

use Illuminate\Database\Seeder;

class LoaiKhuyenMaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $loaiKhuyenMai = [
            [
                'lkm_ten' => 'Khuyến mãi trên tổng hóa đơn'
            ],
            [
                'lkm_ten' => 'Khuyễn mãi theo code'
            ],
            [
                'lkm_ten' => 'Khuyến mãi theo nhóm món ăn'
            ],
            [
                'lkm_ten' => 'Khuyến mãi theo món ăn'
            ]
        ];

        DB::table('loaikhuyenmai')->insert($loaiKhuyenMai);
    }
}

<?php

use Illuminate\Database\Seeder;

class nhanvien extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nhanvien=[
            [
                'nv_ten'=>'Dương Ngọc Tâm',
                'nv_cmnd'=>334567876,
                'nv_sdt'=>'897977966',
                'nv_quyen'=>1,
                'username'=>'tam',
                'password'=>Hash::make(123),
            ]
        ];
        DB::table('nhanvien')->insert($nhanvien);
    }
}

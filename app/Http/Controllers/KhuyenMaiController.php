<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class KhuyenMaiController extends Controller
{
    public function index()
    {
        $loaiKhuyenMai = DB::table('loaikhuyenmai')->get();
        $khuyenMai = DB::table('khuyenmai')->join('loaikhuyenmai','loaikhuyenmai.lkm_id','khuyenmai.lkm_id')->orderBy('km_id','DESC')->get();
        return view('admin.khuyenmai.index', compact('loaiKhuyenMai','khuyenMai'));
    }

    #thêm khuyến mãi
    public function themKhuyenMai(Request $request)
    {
        $loaiKhuyenMai = DB::table('loaikhuyenmai')->get();
        $nhomMonAn = DB::table('nhommonan')->get();
        return view('admin.khuyenmai.add',compact('loaiKhuyenMai','nhomMonAn'));
    }

    #cập nhật trạng thái khuyến mãi
    public function updateStatus($idKhuyenMai)
    {
        try {
            //code...
            $nhomMonAn = DB::table('chitietkhuyenmai')->where('km_id',$idKhuyenMai)->first();
            if ($nhomMonAn) {
                # code...
                $update = DB::table('monan')->where('nma_id',$nhomMonAn->nma_id)->update(
                    [
                        'ma_giakhuyenmai' => NULL
                    ]
                );
            }
            DB::table('khuyenmai')->where('km_id',$idKhuyenMai)->update(
                [
                    'km_trangthai' => 0
                ]
            );
            return redirect()->back();
        } catch (\Throwable $th) {
            //throw $th;
            dd($th);
        }
    }

    #Khuyến mãi theo nhóm món ăn
    public function khuyenMaiNhomMonAn(Request $request)
    {
        #tạo khuyến mãi
        $tenKhuyenMai = $request->tenKhuyenMai;
        $noiDung = $request->noiDung;
        $ngayBatDau = $request->ngayBatDau;
        $ngayKetThuc = $request->ngayKetThuc;

        $khuyenMai = DB::table('khuyenmai')->insertGetId(
            [
                'km_ten' => $tenKhuyenMai,
                'km_noidung' => $noiDung,
                'km_ngaybatdau' => $ngayBatDau,
                'km_ngayketthuc' => $ngayKetThuc,
                'km_giamphantram' => $request->phanTram,
                'lkm_id' => 3
            ]
        );

        #thêm vào bảng chi tiết
        $chiTietKhuyenMai = DB::table('chitietkhuyenmai')
                            ->insert(
                                [
                                    'km_id' => $khuyenMai,
                                    'nma_id' => $request->nhomMonAn
                                ]
                            );

        #thực hiện giảm giá
        $nhomMonAn = $request->nhomMonAn;
        $phanTram = $request->phanTram;
        $monAn = DB::table('monan')->where('nma_id',$nhomMonAn)->get();
        foreach ($monAn as $key => $value) {
            # code...
            $giaKhuyenMai = $value->ma_gia - ($value->ma_gia * $phanTram / 100);
            $updateKM = DB::table('monan')
            ->where('ma_id',$value->ma_id)
            ->update(
                [
                    'ma_giakhuyenmai' => $giaKhuyenMai
                ]
            );
        }
        return redirect()->route('khuyen-mai');
    }

    #khuyến mãi theo voucher
    public function khuyenMaiVoucher(Request $request)
    {
        #tạo khuyến mãi
        $tenKhuyenMai = $request->tenKhuyenMai;
        $noiDung = $request->noiDung;
        $ngayBatDau = $request->ngayBatDau;
        $ngayKetThuc = $request->ngayKetThuc;
        $phanTram = $request->phanTram;
        $gia = $request->gia;
        $code = $request->code;
        $khuyenMai = DB::table('khuyenmai')->insert(
            [
                'km_ten' => $tenKhuyenMai,
                'km_noidung' => $noiDung,
                'km_ngaybatdau' => $ngayBatDau,
                'km_ngayketthuc' => $ngayKetThuc,
                'km_giamphantram' => $phanTram,
                'km_giamgiatien' => $gia,
                'km_code' => $code,
                'lkm_id' => 2
            ]
        );
        return redirect()->route('khuyen-mai');
    }
}

<?php

namespace App\Http\Controllers\TrangChu;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use DB;
class KhachHangController extends Controller
{
    public function loginCus()
    {
        if (Auth::guard('khachhang')->check()) {
            # code...
            return redirect()->route('trang-chu');
        }
        return view('client.khach-hang.login');
    }

    public function handleLogin(Request $request)
    {
        $arr = [
            'username' => $request->username,
            'password' => $request->password
        ];

        if (Auth::guard('khachhang')->attempt($arr)) {
            # code...
            return redirect()->back();
        }
        else
        {
            dd("Không thành công");
        }
    }

    public function logoutCus()
    {
        Auth::guard('khachhang')->logout();
        return redirect()->back();
    }

    //Trang chủ
    public function homePage()
    {
        $cacMonDatGanDay = DB::table('chitietphieudat')
                            ->join('monan','monan.ma_id','chitietphieudat.ma_id')
                            ->paginate(4);
        $monAn = DB::table('monan')->where('ma_giakhuyenmai','<>', null)->paginate(8);
        return view('client.index', compact('cacMonDatGanDay','monAn'));
    }
    public function LienHe()
    {

        return view('client.lien-he.contact');
    }

}

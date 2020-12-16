<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class KhuyenMaiController extends Controller
{
    public function index()
    {
        $loaiKhuyenMai = DB::table('loaikhuyenmai')->get();
        return view('admin.khuyenmai.index', compact('loaiKhuyenMai'));
    }

    public function themKhuyenMai(Request $request)
    {
        $loaiKhuyenMai = DB::table('loaikhuyenmai')->get();
        return view('admin.khuyenmai.add',compact('loaiKhuyenMai'));
    }
}

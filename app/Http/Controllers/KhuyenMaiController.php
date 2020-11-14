<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KhuyenMaiController extends Controller
{
    public function index()
    {
        $loaiKhuyenMai = DB::table('loaikhuyenmai')->get();
        return view('admin.khuyenmai.index', compact('loaiKhuyenMai'));
    }
}

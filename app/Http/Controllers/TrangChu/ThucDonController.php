<?php

namespace App\Http\Controllers\TrangChu;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class ThucDonController extends Controller
{
    public function index()
    {
        $nhomMonAn = DB::table('nhommonan')->get();
        $monAn = array();
        foreach ($nhomMonAn as $key => $value) {
            # code...
            $monAn[$value->nma_id] = DB::table('monan')->where('nma_id',$value->nma_id)->get();
        }
        // $monAn = DB::table('monan')->get();
        return view('client.thuc-don.index', compact('nhomMonAn','monAn'));
    }

    public function category($idCategory)
    {
        $nhomMonAn = DB::table('nhommonan')->get();
        $nhomMonAnSelected = DB::table('nhommonan')->where('nma_id',$idCategory)->first();
        $monAn = DB::table('monan')->where('nma_id',$idCategory)->get();
        return view('client.thuc-don.category', compact('monAn','nhomMonAn','nhomMonAnSelected'));
    }
}

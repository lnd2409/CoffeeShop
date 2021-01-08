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
        $monAn = DB::table('monan')->where('nma_id',$idCategory)->paginate(4);
        return view('client.thuc-don.category', compact('monAn','nhomMonAn','nhomMonAnSelected'));
    }

    public function TimKiem(Request $request){
        // dd($request->NoiDung);
        $nhomMonAn = DB::table('nhommonan')->get();
        $monAn = array();
        foreach ($nhomMonAn as $key => $value) {
            # code...
            $monAn[$value->nma_id] = DB::table('monan')
                                    ->where('nma_id',$value->nma_id)
                                    ->where('ma_ten','like','%'.$request->NoiDung.'%')
                                    ->get();
        }
        // $monAn = DB::table('monan')->get();
        // dd($monAn);
        return view('client.thuc-don.index', compact('nhomMonAn','monAn'));
    }
    public function TimKiemGia(Request $request)
    {
        // dd($request->all());
        $nhomMonAn = DB::table('nhommonan')->get();
        $nhomMonAnSelected = DB::table('nhommonan')->where('nma_id',$request->nma_id)->first();
        if($request->SapXep ==0)
        {
             $monAn = DB::table('monan')->where('nma_id',$request->nma_id)
                ->orderBy('ma_gia','DESC')
                ->paginate(4);
        }
        else
        {
            $monAn = DB::table('monan')->where('nma_id',$request->nma_id)
                ->orderBy('ma_gia','ASC')
                ->paginate(4);
        }

        // dd($monAn);
        return view('client.thuc-don.category', compact('monAn','nhomMonAn','nhomMonAnSelected'));
    }
}

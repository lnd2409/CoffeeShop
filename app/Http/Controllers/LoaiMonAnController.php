<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class LoaiMonAnController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $loai = DB::table('nhommonan')->get();
        $monan = DB::table('monan')
        ->orderBy('nma_id','DESC')
        ->get();
        return view('admin.monan.index',compact('loai','monan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function LoaiThem(Request $request)
    {
        $data['nma_ten']=$request->nma_ten;
        // dd($data);
        DB::table('nhommonan')->insert($data);
        return redirect()->back();
    }


    public function MonThem(Request $request)
    {
       $data['ma_ten'] = $request->ma_ten;
       $data['ma_chuthich'] = $request->ma_ghichu;
       $data['ma_gia'] = $request->ma_gia;
       $data['nma_id'] = $request->loai_id;

       DB::table('monan')->insert($data);
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function LoaiXoa($id)
    {
        DB::table('nhommonan')->where('nma_id',$id)->delete();
        return redirect()->back();
    }
    public function MonAnXoa($id)
    {
        DB::table('monan')->where('ma_id',$id)->delete();
        return redirect()->back();
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

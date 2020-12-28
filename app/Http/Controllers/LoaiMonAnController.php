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
        $loai = DB::table('nhommonan')->orderBy('nma_id','DESC')->paginate(4);
        $loai1 = DB::table('nhommonan')->get();
        $monan = DB::table('monan')
        ->orderBy('nma_id','DESC')
        ->paginate(10);
        return view('admin.monan.index',compact('loai','monan','loai1'));
    }

   //Lấy nhóm món ăn ajax
    public function AjaxGetNMA(Request $request)
    {
        if($request->ajax())
        {
            $data =DB::table('nhommonan')->where('nma_id',$request->nma_id)->first();
            return response()->json($data, 200);
        }
    }



   //Lấy món ăn ajax
    public function AjaxGetMA(Request $request)
    {
        if($request->ajax())
        {
            $data =DB::table('monan')->where('ma_id',$request->ma_id)->first();
            return response()->json($data, 200);
        }
    }
    public function LoaiThem(Request $request)
    {
        $data['nma_ten']=$request->nma_ten;
        // dd($data);
        DB::table('nhommonan')->insert($data);
        return redirect()->back();
    }

    public function UpdateNhomMonAn(Request $request)
    {
        $data['nma_ten']=$request->nma_tenmon;
        // dd($data);
        DB::table('nhommonan')->where('nma_id',$request->nma_id)->update($data);
        return redirect()->back();
    }


    public function MonThem(Request $request)
    {
        if ($request->hasFile('ma_hinhanh')) {
            $file = $request->ma_hinhanh;

            $name = $file->getClientOriginalName();
            $file->move('upload/mon-an', $file->getClientOriginalName());
            $data['ma_hinhanh'] = $name;
        }




       $data['ma_ten'] = $request->ma_ten;
       $data['ma_chuthich'] = $request->ma_ghichu;
       $data['ma_gia'] = $request->ma_gia;
       $data['nma_id'] = $request->loai_id;

    //    dd($data);
       DB::table('monan')->insert($data);
        return redirect()->back();

    }


    public function UpdateMonAn(Request $request)
    {
        if ($request->hasFile('ma_hinhanh')) {
            $file = $request->ma_hinhanh;

            $name = $file->getClientOriginalName();
            $file->move('upload/mon-an', $file->getClientOriginalName());
            $data['ma_hinhanh'] = $name;
        }




       $data['ma_ten'] = $request->ma_ten;
       $data['ma_chuthich'] = $request->ma_mota;
       $data['ma_gia'] = $request->ma_gia;
    //    $data['nma_id'] = $request->loai_id;

    //    dd($data);
       DB::table('monan')->where('ma_id',$request->ma_id)->update($data);
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

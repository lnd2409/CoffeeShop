<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class KhachHangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $khachhang = DB::table('khachhang')
        ->join('loaikhachhang as lkh','lkh.lkh_id','khachhang.lkh_id')
        ->get();
        // dd($khachhang);
        return view('admin.khachhang.index',compact('khachhang'));
    }
    public function indexAjax(Request $request)
    {

       if($request->ajax())
       {
            $khachhang = DB::table('khachhang')
            ->join('loaikhachhang as lkh','lkh.lkh_id','khachhang.lkh_id')
            ->where('kh_id',$request->kh_id)
            ->first();

            return response()->json($khachhang, 200);
       }
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $data['kh_ten']=$request->kh_ten;
       $data['kh_sdt']=$request->kh_sdt;
       $data['lkh_id']=$request->lkh_id;

    //    dd($data);
        
        DB::table('khachhang')->where('kh_id',$request->kh_id)->update($data);
        return redirect()->back();
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        DB::table('khachhang')->where('kh_id',$id)->delete();
        return redirect()->back();
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Hash;
class NhanVienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nhanvien = DB::table('nhanvien')
        ->whereNotIn('nv_quyen', [0])->get();
        // dd($nhanvien);
        return view('admin.nhanvien.index',compact('nhanvien'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $nhanvien['nv_ten']=$request->nv_ten;
        $nhanvien['nv_sdt']=$request->nv_sdt;
        $nhanvien['nv_cmnd']=$request->nv_cmnd;
        $nhanvien['nv_quyen']=$request->nv_quyen;
        $nhanvien['username']=$request->username;
        $nhanvien['password']=Hash::make($request->nv_Pss2);

        DB::table('nhanvien')->insert($nhanvien);
        return redirect()->back();

        // dd($nhanvien);
    }



    public function CheckPass(Request $request)
    {
        // dd($request->all());
       if($request->ajax())
       {
           $data=0;
           if($request->p1 === $request->p2)
           {
                $data=1;
                return response()->json($data, 200);
           }
           else
           {
            return response()->json($data, 200);
           }
          
       }
    }


    public function indexAjax(Request $request)
    {

       if($request->ajax())
       {
            $nhanvien = DB::table('nhanvien')
            // ->join('loaikhachhang as lkh','lkh.lkh_id','khachhang.lkh_id')
            ->where('nv_id',$request->nv_id)
            ->first();

            return response()->json($nhanvien, 200);
       }
       
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
    public function update(Request $request)
    {
       $result = DB::table('nhanvien')->where('nv_id',$request->nv_id)->update([
           'nv_ten'=>$request->nv_ten,
           'nv_sdt'=>$request->nv_sdt,
           'nv_cmnd'=>$request->nv_cmnd,
           'nv_quyen'=>$request->nv_quyen,
       ]);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('nhanvien')->where('nv_id',$id)->delete();
        return redirect()->back();
    }
}

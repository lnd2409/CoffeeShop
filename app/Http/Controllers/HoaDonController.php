<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use carbon\Carbon;
class HoaDonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hoadon =DB::table('hoadon as hd')
        ->join('nhanvien as nv','nv.nv_id','hd.nv_id')
        ->get();
        // dd($hoadon);
        return view('admin.hoadon.index',compact('hoadon'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ngay = Carbon::now();
        $data['ngaylap']=$ngay;
        if($request->lkm_id == 0)
        {
            $data['tiengiam']=0;
        }
        else
        {
            $data['tiengiam']=$request->tiengiam;
        }
        $data['tongtien']= $request->tongtien;
        $data['ba_id']=$request->ba_id;
        $data['nv_id']=auth::guard('nhanvien')->id();

        DB::table('phieuyeucau')->where('ba_id',$request->ba_id)->delete();
        $data1['ba_trangthai']=0;
        DB::table('banan')->where('ba_id',$request->ba_id)->update($data1);
        DB::table('hoadon')->insert($data);
        return redirect()->back();

        // dd($data);
        
        
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
        $del = DB::table('hoadon')->where('hd_id',$id)->delete();
        return redirect()->back();
    }
}

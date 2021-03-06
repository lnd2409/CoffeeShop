<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BanAnController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $banan = DB::table('banan')->join('loaibanan','loaibanan.lba_id','banan.lba_id')->get();
        // $loaibanan = DB::table('loaibanan')->get();
        // return view('admin.ban-an.index',compact(['banan','loaibanan']));
    //     $result1 = DB::table('phieuyeucau as pyc')
    //    ->join('chitietphieuyeucau as ctpyc','ctpyc.pyc_id','pyc.pyc_id')
    //     ->where('pyc.ba_id',1)
    //     ->get();
    //     dd( $result1);
        $banan = DB::table('banan')->get();
        $nhom = DB::table('nhommonan')->get();
        $loaikhuyenmai = DB::table('loaikhuyenmai')->get();


        


        return view('admin.ban-an.index2',compact('banan','nhom','loaikhuyenmai'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function NhomAjax(Request $request)
    {
        $id =$request->nhom;
        $data = DB::table('monan')->where('nma_id',$id)->get();
        return response()->json($data,200);
    }


    //kiểm tra khuyến mãi
    public function CheckKMAjax(Request $request)
    {
        // $data['code'] =$request->code;
        // $data['loaiKM'] =$request->loaiKM;
        // $data['tongtien'] =$request->tongtien;
   
        $Gia = DB::table('khuyenmai')
        // ->where('km_code',$request->code)
        ->where('lkm_id',$request->loaiKM)
        ->where('km_trangthai',1)
        ->get();
       
        
        return response()->json($Gia,200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tableInCat = DB::table('banan')->where('lba_id',$request->loaibanan)->get();
        // dd($request->loaibanan);
        if(count($tableInCat) == 0){
            $arrTable = [
                'ba_soban' => 1,
                'ba_sochongoi' => $request->sochongoi,
                'ba_trangthai' => 1,
                'lba_id' => $request->loaibanan
            ];
            $tableNew = DB::table('banan')->insert($arrTable);
            return redirect()->route('ban-an');
        }
        dd($tableInCat);
        // $arrTable = [
        //     ''
        // ];
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
        //
    }
}

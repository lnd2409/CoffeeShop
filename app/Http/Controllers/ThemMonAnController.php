<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Carbon\Carbon;
class ThemMonAnController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $ba =  DB::table('banan')->where('ba_id',$id)->first();
        // dd($banan);
        $danhsachmonan = DB::table('chitietphieuyeucau as ctpyc')
        ->join('monan as ma','ma.ma_id','ctpyc.ma_id')
        ->join('phieuyeucau as pyc','pyc.pyc_id','ctpyc.pyc_id')
        ->get();
        // dd($danhsachmonan);
        $monan = DB::table('monan')->get();

        
        return view('admin.ban-an.them-mon',compact('monan','ba','danhsachmonan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $soluong =$request->SoLuong;
        $pyc['pyc_ngaylap']=Carbon::now();
        $pyc['pyc_giatientamtinh']=0;
        $pyc['pyc_trangthai']=0;
        $pyc['ba_id'] = $request->BanAn;

        $data['ma_id'] = $request->MonAn;
        $data['ctpyc_soluongmonan'] = $soluong;
        $danhsachmonan = DB::table('chitietphieuyeucau as ctpyc')
        ->join('monan as ma','ma.ma_id','ctpyc.ma_id')
        ->join('phieuyeucau as pyc','pyc.pyc_id','ctpyc.pyc_id')
        ->get();

        $data['pyc_id'] = DB::table('phieuyeucau')->insertGetId($pyc);

        $status['ba_trangthai'] = 1;
        DB::table('banan')->where('ba_id',$request->BanAn)->update($status);
        
        
       

        foreach($danhsachmonan as $vl)
        {
            if($vl->ma_id == $request->MonAn && $vl->ba_id == $request->BanAn)
            {
                $data['ctpyc_soluongmonan']= $soluong + $vl->ctpyc_soluongmonan;
                 DB::table('chitietphieuyeucau')->where('ma_id',$request->MonAn)->update($data);
                 $result1 = DB::table('chitietphieuyeucau as ctpyc')
                 ->join('phieuyeucau as pyc','pyc.pyc_id','ctpyc.pyc_id')
                 ->join('monan as ma','ma.ma_id','ctpyc.ma_id')
                 ->where('pyc.ba_id',$request->BanAn)
                 ->get();
                 return response()->json($result1, 200);
            }
        }
       
        
    
        $result = DB::table('chitietphieuyeucau')->insert($data);
        // dd($pyc_id);
        $result1 = DB::table('chitietphieuyeucau as ctpyc')
        ->join('phieuyeucau as pyc','pyc.pyc_id','ctpyc.pyc_id')
        ->join('monan as ma','ma.ma_id','ctpyc.ma_id')
        ->where('pyc.ba_id',$request->BanAn)
        ->get();
       
      
        return response()->json($result1, 200);

       
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
    public function GetAllFood(Request $request)
    {
        $data = DB::table('chitietphieuyeucau as ctpyc')
        ->join('phieuyeucau as pyc','pyc.pyc_id','ctpyc.pyc_id')
        ->join('monan as ma','ma.ma_id','ctpyc.ma_id')
        ->where('pyc.ba_id',$request->BanAn)
        ->get();
        return response()->json($data, 200);
    }



    public function DeleteFood(Request $request)
    {
        $data = $request->all();
        DB::table('chitietphieuyeucau')
        ->where('ma_id',$request->ma_id)
        ->where('pyc_id',$request->pyc_id)
        ->delete();
        DB::table('phieuyeucau')->where('pyc_id',$request->pyc_id)->delete();
        $data = DB::table('chitietphieuyeucau as ctpyc')
        ->join('phieuyeucau as pyc','pyc.pyc_id','ctpyc.pyc_id')    
        ->join('monan as ma','ma.ma_id','ctpyc.ma_id')
        ->where('pyc.ba_id',$request->BanAn)
        ->get();
        return response()->json($data, 200);
    }




    public function CheckBanAjax(Request $request)
    {
      
        $data['ba_trangthai']=1;
        $result = DB::table('phieuyeucau')->where('ba_id',$request->ba_id)->get();
        if(count($result) > 0){
            DB::table('banan')->where('ba_id',$request->ba_id)->update($data);
            return response()->json(count($result));
        }
        else
        {
            $data['ba_trangthai']=0;
            DB::table('banan')->where('ba_id',$request->ba_id)->update($data);
            return response()->json(count($result));
        }   

    }






    public function update(Request $request)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idpyc,$idma)
    {
        $result = DB::table('chitietphieuyeucau')->where('pyc_id',$idpyc)->where('ma_id',$idma)->delete();
        if($result)
        {
            return redirect()->back();
        }
        else
        {
            dd('Loi xoa');
        }
    }
}

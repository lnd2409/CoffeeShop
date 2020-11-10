<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PhieuDat;
use Illuminate\Support\Facades\Input;
use DB;
use Carbon\Carbon;
class DatMonController extends Controller
{
    public function index()
    {
        $monan=\DB::table('nhommonan')
        ->join('monan','monan.nma_id','nhommonan.nma_id')
        ->get();
        return view('client.datmon.index',compact('monan'));
    }
    public function setTable(Request $request)
    {
        // \dd($request);
        // \dd(Carbon::parse($request->time));
        DB::beginTransaction();
       
        try {
            $phieudat_id=\DB::table('phieudat')->insertGetId([
                'pd_ngaylap' => date("Y-m-d"),
                'pd_soluongkhach' => $request->amountCustomer,
                'pd_ngayden' => date("Y-m-d"),
                'pd_gioden' => Carbon::parse($request->time),
                'pd_ghichu' => $request->note,
                'pd_sotientongtamtinh' => $request->total,
                'kh_id' => \Auth::guard('khachhang')->id(),
            ]);
            //không chọn món trước
            if($request->inputChooseFood==null){
                \DB::table('chitietphieudat')->insert([
                    'pd_id'=>$phieudat_id
                    ]);
                }
            // có chọn món
            if($request->inputChooseFood=='on' && $request->food!=null){

                foreach($request->food as $key=> $item){
                    // nếu chọn món thì lưu vào chi tiết
                    if($item!=0){
                        \DB::table('chitietphieudat')->insert([
                            'pd_id'=>$phieudat_id,
                            'ma_id'=>$item,
                            'ctpd_soluong'=>$request->amount[$key]
                        ]);
                        
                    }
                }
            }
            if($request->inputChooseFood=='on' && $request->food==null){

                return redirect()->back()->withInput();
            }
            \DB::commit();
        }catch (\Exception $e) {
            \DB::rollback();
            throw $e;
        // something went wrong
        }catch (\Throwable $e) {
            \DB::rollback();
            throw $e;
        }
    }
    public function booked()
    {
        $phieudat=\DB::table('phieudat')
        ->where('phieudat.pd_ngayden','>=', date("Y-m-d"))
        ->where('phieudat.kh_id',\Auth::guard('khachhang')->id())
        ->get();
        foreach ($phieudat as $key => $value) {
            
            $chitiet=\DB::table('chitietphieudat')
            ->join('monan','monan.ma_id','chitietphieudat.ma_id')
            ->where('chitietphieudat.pd_id',$value->pd_id)
            ->get();
            $value->chitiet=$chitiet;
        }
        // dd($phieudat);
        return view('client.index',compact('phieudat'));
    }
    public function listOrder()
    {
        $phieudat=\DB::table('phieudat')
        ->join('khachhang','khachhang.kh_id','phieudat.kh_id')
        // ->where('phieudat.pd_ngayden','>=', date("Y-m-d"))
        ->where('phieudat.nv_id',null)
        ->get();
        $ban=\DB::table('banan')->get();
        foreach ($phieudat as $key => $value) {
            $value->ban=$ban;
            $chitiet=\DB::table('chitietphieudat')
            ->join('monan','monan.ma_id','chitietphieudat.ma_id')
            ->where('chitietphieudat.pd_id',$value->pd_id)
            ->get();
            $value->chitiet=$chitiet;

            
            
            //bàn ăn
            foreach($value->ban as $value2){
                
                //lịch đặt bàn
                $banan=\DB::table('banan')
                ->join('chitietphieudat','chitietphieudat.ba_id','banan.ba_id')
                ->join('phieudat','phieudat.pd_id','chitietphieudat.pd_id')
                ->where('banan.ba_id',$value2->ba_id)
                ->whereDate('pd_ngayden','=',$value->pd_ngayden) // các bàn có lịch đặt vào ngày hôm đó
                ->get();
                // dd($banan);
                $value2->banan=$banan;
                

            }
            // dump($value);
            

        }
        // dd($phieudat);
        // dd($phieudat[0]->ban[1]->banan);
        // die;

        return view('admin.datban.pending',compact('phieudat'));
    }
}


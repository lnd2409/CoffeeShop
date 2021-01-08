<?php

namespace App\Http\Controllers;

use Auth;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;

class DatMonController extends Controller
{
    public function index()
    {
        #Gợi ý thông minh
        //Gợi ý món ăn người dùng đó đã đặt
        $foodOrdered = DB::table('chitietphieudat')
            ->join('phieudat', 'phieudat.pd_id', 'chitietphieudat.pd_id')
            ->join('monan', 'monan.ma_id', 'chitietphieudat.ma_id')
            ->where('phieudat.kh_id', Auth::guard('khachhang')->id())
            ->get();
        // dd($foodOrdered);
        //Gợi ý món ăn được đặt nhiều nhất
        $bestFood = DB::table('chitietphieudat')
            ->join('phieudat', 'phieudat.pd_id', 'chitietphieudat.pd_id')
            ->join('monan', 'monan.ma_id', 'chitietphieudat.ma_id')
            ->select('monan.ma_id', 'monan.ma_ten')->get();
        // foreach ($bestFood as $key => $value) {
        //     # code...

        // }
        // dd($bestFood);

        $monan = \DB::table('nhommonan')
            ->join('monan', 'monan.nma_id', 'nhommonan.nma_id')
            ->get();
        return view('client.datmon.index', compact('monan'));
    }
    public function setTable(Request $request)
    {
        // \dd($request);
        // \dd(Carbon::parse($request->time));
        DB::beginTransaction();

        try {
            $tong = 0;

            //không chọn món trước
            if ($request->inputChooseFood == null) {
                dd('null');
                $phieudat_id = \DB::table('phieudat')->insertGetId([
                    'pd_ngaylap' => date("Y-m-d"),
                    'pd_soluongkhach' => $request->amountCustomer,
                    'pd_ngayden' => date("Y-m-d"),
                    'pd_gioden' => Carbon::parse($request->time),
                    'pd_ghichu' => $request->note,
                    'pd_sotientongtamtinh' => 0,
                    'kh_id' => \Auth::guard('khachhang')->id(),
                ]);

                \DB::table('chitietphieudat')->insert([
                    'pd_id' => $phieudat_id,
                ]);
            }
            // có chọn món
            if ($request->inputChooseFood == 'on' && $request->food != null) {
                // dd('mon');
                foreach ($request->food as $key => $value) {
                    # code...
                    $mon = \DB::table('monan')->where('ma_id', $value)->first();
                    $tong += $request->amount[$key] * $mon->ma_gia;
                }
                // dd('inset phiếu đặt');
                $phieudat_id = \DB::table('phieudat')->insertGetId([
                    'pd_ngaylap' => date("Y-m-d"),
                    'pd_soluongkhach' => $request->amountCustomer,
                    'pd_ngayden' => date("Y-m-d"),
                    'pd_gioden' => Carbon::parse($request->time),
                    'pd_ghichu' => $request->note,
                    'pd_sotientongtamtinh' => $tong,
                    'kh_id' => \Auth::guard('khachhang')->id(),
                ]);
                // dd($phieudat_id);
                // dd('chitiet');
                foreach ($request->food as $key => $item) {
                    // nếu chọn món thì lưu vào chi tiết
                    if ($item != 0) {
                        \DB::table('chitietphieudat')->insert([
                            'pd_id' => $phieudat_id,
                            'ma_id' => $item,
                            'ctpd_soluong' => $request->amount[$key],
                        ]);

                    }
                }
                // dd('xong');
            }
            if ($request->inputChooseFood == 'on' && $request->food == null) {

                return redirect()->back()->withInput();
            }
            \DB::commit();
            return redirect()->route('trang-chu');
        } catch (\Exception $e) {
            dd($e);
            \DB::rollback();
            throw $e;
            // something went wrong
        } catch (\Throwable $e) {
            dd($e);
            \DB::rollback();
            throw $e;
        }
    }
    public function updateTable(Request $request, $id)
    {
        // dd(date('H:i:s', strtotime($request->time)));
        // \dd($request);
        // \dd(Carbon::parse($request->time));
        DB::beginTransaction();

        try {
            $tong = 0;

            //không chọn món trước
            if ($request->inputChooseFood == null) {
                \DB::table('phieudat')
                    ->where('pd_id', $id)
                    ->update([
                        'pd_ngaylap' => date("Y-m-d"),
                        'pd_soluongkhach' => $request->amountCustomer,
                        'pd_ngayden' => date('Y-m-d', strtotime($request->time)),
                        'pd_gioden' => date('H:i:s', strtotime($request->time)),
                        'pd_ghichu' => $request->note,
                        'pd_sotientongtamtinh' => 0,
                    ]);

            }
            // có chọn món
            if ($request->food != null) {
                // dd('mon');
                foreach ($request->food as $key => $value) {
                    # code...
                    $mon = \DB::table('monan')->where('ma_id', $value)->first();
                    $tong += $request->amount[$key] * $mon->ma_gia;
                }
                // dd('inset phiếu đặt');
                \DB::table('phieudat')
                    ->where('pd_id', $id)
                    ->update([
                        'pd_ngaylap' => date("Y-m-d"),
                        'pd_soluongkhach' => $request->amountCustomer,
                        'pd_ngayden' => date('Y-m-d', strtotime($request->time)),
                        'pd_gioden' => date('H:i:s', strtotime($request->time)),
                        'pd_ghichu' => $request->note,
                        'pd_sotientongtamtinh' => 0,
                    ]);
                // dd('chitiet');
                \DB::table('chitietphieudat')
                    ->where('pd_id', $id)->delete();

                foreach ($request->food as $key => $item) {
                    // nếu chọn món thì lưu vào chi tiết
                    if ($item != 0) {
                        \DB::table('chitietphieudat')
                            ->insert([
                                'pd_id' => $id,
                                'ma_id' => $item,
                                'ctpd_soluong' => $request->amount[$key],
                            ]);

                    }
                }
                // dd('xong');
            }
            if ($request->food == null) {

                return redirect()->back()->withInput();
            }
            \DB::commit();
            return redirect()->route('trang-chu');
        } catch (\Exception $e) {
            dd($e);
            \DB::rollback();
            throw $e;
            // something went wrong
        } catch (\Throwable $e) {
            dd($e);
            \DB::rollback();
            throw $e;
        }
    }
    public function deleteTable($id)
    {
        \DB::table('chitietphieudat')->where('pd_id', $id)->delete();
        \DB::table('chitietbanan')->where('pd_id', $id)->delete();
        \DB::table('phieudat')->where('pd_id', $id)->delete();
        return back()->with('success', 'Đã huỷ đặt bàn');
    }
    public function booked()
    {
        $phieudat = \DB::table('phieudat')
            ->where('phieudat.pd_ngayden', '>=', date("Y-m-d"))
            ->where('phieudat.kh_id', \Auth::guard('khachhang')->id())
            ->get();
        foreach ($phieudat as $key => $value) {

            $chitiet = \DB::table('chitietphieudat')
                ->join('monan', 'monan.ma_id', 'chitietphieudat.ma_id')
                ->where('chitietphieudat.pd_id', $value->pd_id)
                ->get();
            $banan = \DB::table('chitietbanan')
            // ->join('banan','banan.ba_id','chitietbanan.ba_id')
                ->where('chitietbanan.pd_id', $value->pd_id)
                ->get();
            $value->chitiet = $chitiet;
            $value->banan = $banan;
        }
        // dd($phieudat);
        return view('client.index');
    }
    public function listOrder()
    {
        $phieudat = \DB::table('phieudat')
            ->join('khachhang', 'khachhang.kh_id', 'phieudat.kh_id')
        // ->where('phieudat.pd_ngayden','>=', date("Y-m-d"))
        // ->where('phieudat.nv_id', null)
            ->get();
        $ban = \DB::table('banan')->get();
        foreach ($phieudat as $key => $value) {
            $value->ban = $ban;
            $chitiet = \DB::table('chitietphieudat')
                ->join('monan', 'monan.ma_id', 'chitietphieudat.ma_id')
                ->where('chitietphieudat.pd_id', $value->pd_id)
                ->get();
            $value->chitiet = $chitiet;

            //bàn ăn
            foreach ($value->ban as $value2) {

                //lịch đặt bàn
                $banan = \DB::table('banan')
                    ->join('chitietbanan', 'chitietbanan.ba_id', 'banan.ba_id')
                    ->join('phieudat', 'phieudat.pd_id', 'chitietbanan.pd_id')
                    ->where('banan.ba_id', $value2->ba_id)
                    ->whereDate('pd_ngayden', '=', $value->pd_ngayden) // các bàn có lịch đặt vào ngày hôm đó
                    ->get();
                // dd($banan);
                $value2->banan = $banan;

            }
            // dump($value);
            $bandadat = \DB::table('chitietbanan')->where('pd_id', $value->pd_id)->get();
            $value->bandadat = $bandadat;

        }
        // dd($phieudat);
        // dd($phieudat[0]->ban[1]->banan);
        // die;

        return view('admin.datban.pending', compact('phieudat'));
    }
    public function confirmOrder(Request $request)
    {
        // dd($request);
        // dd(\Auth::guard('nhanvien')->id());
        \DB::table('chitietbanan')
            ->where('pd_id', $request->id)
            ->delete();
        foreach ($request->tableNumber as $key => $value) {

            $chitiet = \DB::table('chitietbanan')
                ->insert([
                    'pd_id' => $request->id,
                    'ba_id' => $value,
                    'nv_id' => \Auth::guard('nhanvien')->id(),
                ]);

        }
        if ($chitiet) {

            $chitiet = \DB::table('chitietphieudat')
                ->where('pd_id', $request->id)
                ->update([
                    'nv_id' => \Auth::guard('nhanvien')->id(),
                ]);
            $chitiet = \DB::table('phieudat')
                ->where('pd_id', $request->id)
                ->update([
                    'nv_id' => \Auth::guard('nhanvien')->id(),
                ]);
        }
        return redirect()->route('listOrder');
    }
}

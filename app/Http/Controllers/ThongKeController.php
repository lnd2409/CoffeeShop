<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use Auth;
class ThongKeController extends Controller
{
    public function index()
    {
        $now = Carbon::now();
        // dd($now);
        $orderInDay = DB::table('hoadon')->whereDate('ngaylap',$now->day)->sum('tongtien');
        $orderInMonth = DB::table('hoadon')->whereMonth('ngaylap',$now->month)->sum('tongtien');
        $orderNotAcp = DB::table('phieudat')->where('nv_id',NULL)->count();
        // $totalByMonth = DB::table('')
        $totalArr = array();
        for ($i=1 ; $i <= 12 ; $i++) {
            # code...
            $orderByMonth = DB::table('hoadon')->whereMonth('ngaylap',$i)->count();
            // echo $orderByMonth.'<br>';
            array_push($totalArr,$orderByMonth);
        }
        // dd($totalArr);
        return view('admin.index',compact('orderInDay','orderInMonth','orderNotAcp','totalArr'));
    }
}

<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use DB;
use View;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $phieudat=\DB::table('phieudat')
        ->where('phieudat.pd_ngayden','>=', date("Y-m-d"))
        ->get();
        foreach ($phieudat as $key => $value) {

            $chitiet=\DB::table('chitietphieudat')
            ->join('monan','monan.ma_id','chitietphieudat.ma_id')
            ->where('chitietphieudat.pd_id',$value->pd_id)
            ->get();
            $banan=\DB::table('chitietbanan')
            // ->join('banan','banan.ba_id','chitietbanan.ba_id')
            ->where('chitietbanan.pd_id',$value->pd_id)
            ->get();
            $value->chitiet=$chitiet;
            $value->banan=$banan;
        }
        View::share('phieudat',$phieudat);


        $loaikhachhang = DB::table('loaikhachhang')->get();
        view()->share('loaikhachhang', $loaikhachhang);
    }
}

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
        $banan = DB::table('banan')->join('loaibanan','loaibanan.lba_id','banan.lba_id')->get();
        $loaibanan = DB::table('loaibanan')->get();
        return view('admin.ban-an',compact(['banan','loaibanan']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

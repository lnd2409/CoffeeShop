<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class MonAnController extends Controller
{
    public function index()
    {
        $monAn = DB::table('monan')->get();
        dd($monAn);
    }
}

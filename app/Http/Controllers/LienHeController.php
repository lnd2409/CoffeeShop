<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LienHeController extends Controller
{
    public function index()
    {
        return view('client.lien-he');
    }
}

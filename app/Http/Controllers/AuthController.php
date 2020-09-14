<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::guard('nhanvien')->check()){
            return redirect()->route('admin');
        }
        return view('admin.login');
    }

    //Đăng nhập
    public function login(Request $request)
    {
        $arr = [
            'username' => $request->username,
            'password' => $request->password,
        ];
        if ($request->remember == 'on') {
            $remember = true;
        } else {
            $remember = false;
        }
        if (Auth::guard('nhanvien')->attempt($arr, $remember)) {
            return redirect()->route('admin');
        } else {
            $alert = "Sai tên tài khoản hoặc mật khẩu";
            return response()->json($alert, 400);
        }
    }
    //Đăng xuất
    public function logout(){
        if(Auth::guard('nhanvien')->check()){
            Auth::guard('nhanvien')->logout();
        }
        if(Auth::guard('khachhang')->check()){
            Auth::guard('khachhang')->logout();
        }
        return redirect()->route('get-login');
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
        //
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
    public function signup(Request $request)
    {
        // dd($request);
        $arr = [
            'username' => $request->username,
            'password' => $request->password
        ];
         
        $find=\DB::table('khachhang')->where('username',$request->username)->first();
        if($find){
            $alert = "Tài khoản đã tồn tại";
            return response()->json($alert, 400);
        }
        else{
            $find_tel=\DB::table('khachhang')->where('kh_sdt',$request->tel)->first();
            if($find_tel){
                $alert = "Số điện thoại đã tồn tại";
                return response()->json($alert, 400);
            }
            else{
                
                \DB::table('khachhang')->insert([
                    'kh_ten'=> $request->name,
                    'kh_sdt'=>$request->tel,
                    'username'=>$request->username,
                    'password'=>$request->password,
                    'lkh_id'=>1
                ]);
                
                Auth::guard('khachhang')->attempt($arr,false);
                    return redirect()->route('trang-chu');
            }

           
        }
    }
}

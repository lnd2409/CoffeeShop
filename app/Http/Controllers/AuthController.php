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
        else if(Auth::guard('khachhang')->check()){
            return redirect()->route('trang-chu');
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
        } else if (Auth::guard('khachhang')->attempt($arr, $remember)) {
            return redirect()->route('trang-chu');
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
                    // 'password'=>$request->password,
                    'password'=>\Hash::make($request->password),
                    'lkh_id'=>1
                ]);
                
                Auth::guard('khachhang')->attempt($arr,false);
                    return redirect()->route('trang-chu');
            }

           
        }
    }
    public function changePass(Request $request)
    {
        
         
        $find=\DB::table('khachhang')->where('username',$request->username)->first();
        // dd($find->password);
        // dd($request->password_old);
        // dd(\Hash::check($request->password_old,$find->password ));
        // dd(\Hash::check($find->password, $request->password_new1));
        if($find){
            // if ($find->password==$request->password_old) {
            if (\Hash::check($request->password_old,$find->password)) {
                \DB::table('khachhang')->where('kh_id',$find->kh_id)->update([
                    'password'=>\Hash::make($request->password_new1)
                ]);
                return redirect()->route('get-login');
            }
            else{

                $alert = "Mật khẩu không đúng";
                return response()->json($alert, 400);
            }
        }
        else{
                $alert = "Tài khoản không tồn tại";
                return response()->json($alert, 400);
           

           
        }
    }
}

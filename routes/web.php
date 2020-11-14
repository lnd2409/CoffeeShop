<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Route::get('/', 'DatMonController@booked')->name('trang-chu');
Route::get('/', function () {
    return view('client.index');
})->name('trang-chu');

//Đăng nhập
Route::get('dang-nhap', 'AuthController@index')->name('get-login');
Route::post('xu-ly-dang-nhap', 'AuthController@login')->name('login');
//đăng ký
Route::view('dang-ky', 'client.signup');
Route::post('dang-ky-thanh-vien', 'AuthController@signup')->name('signup');

//Đổi mât khẩu
Route::view('doi-mat-khau', 'client.changepass');
Route::post('doi-mat-khau', 'AuthController@changePass')->name('changePass');
// Phần admin
Route::group(['prefix' => 'admin', 'middleware' => 'checkNhanVien'], function () {
    Route::get('/', function () {
        return view('admin.index');
    })->name('admin');
    //Bàn ăn
    Route::get('/ban-an', 'BanAnController@index')->name('ban-an');
    Route::post('/ban-an/them-ban-an', 'BanAnController@store')->name('them-ban-an');


    //Phần này của Phụng nhé! ---Yêu mọi người-----
    Route::get('/ban-an/chi-tiet/{id}', 'ThemMonAnController@index')->name('chi-tiet-ban-an');

    Route::post('/ban-an/them-mon/', 'ThemMonAnController@store')->name('them-mon-an-submit');

    Route::get('/ban-an/xoa-mon/{idpyc}/{idma}', 'ThemMonAnController@destroy')->name('xoa-mon-an');

    Route::get('/ban-an/sua-mon/{idpyc}/{idma}', 'ThemMonAnController@update')->name('sua-mon-an');

    Route::post('/ban-an/lay-mon-an', 'ThemMonAnController@GetAllFood')->name('lay-all-mon-an-theo-ban');

    Route::post('/ban-an/nhom', 'BanAnController@NhomAjax')->name('ban-an-Ajax');


    Route::get('/danh-sach-dat-ban', 'DatMonController@listOrder')->name('listOrder');
    Route::post('/xac-nhan-dat-ban', 'DatMonController@confirmOrder')->name('confirmOrder');


    //Đăng xuất
    Route::get('/dang-xuat', 'AuthController@logout')->name('dang-xuat');
});

// đặt món
Route::group(['prefix' => 'dat-ban'], function () {
    Route::get('/','DatMonController@index')->name('datban.index');
    Route::post('/','DatMonController@setTable')->name('datban.setTable');
});

#Khách hàng
Route::get('thuc-don', 'TrangChu\ThucDonController@index')->name('thuc-don');
Route::get('/thuc-don/nhom-mon-an/{idCategory}','TrangChu\ThucDonController@category')->name('thuc-don.theo-loai');

#Khách hàng - đăng nhập
Route::get('/khach-hang/dang-nhap', 'TrangChu\KhachHangController@loginCus')->name('khach-hang.dang-nhap');
Route::post('khach-hang/xu-ly-dang-nhap','TrangChu\KhachHangController@handleLogin')->name('khach-hang.xu-ly-dang-nhap');
Route::get('/dang-xuat-khach-hang', 'TrangChu\KhachHangController@logoutCus')->name('khach-hang.dang-xuat');
Route::get('/dang-ky', function () {
    return view('client.khach-hang.register');
})->name('khach-hang.dang-ky');


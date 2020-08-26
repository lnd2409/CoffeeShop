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

Route::get('/', function () {
    return view('client.index');
})->name('trang-chu');

//Đăng nhập
Route::get('dang-nhap', 'AuthController@index')->name('get-login');
Route::post('xu-ly-dang-nhap', 'AuthController@login')->name('login');

// Phần admin
Route::group(['prefix' => 'admin', 'middleware' => 'checkNhanVien'], function () {
    Route::get('/', function () {
        return view('admin.index');
    })->name('admin');
    //Bàn ăn
    Route::get('/ban-an', 'BanAnController@index')->name('ban-an');
    Route::post('/ban-an/them-ban-an', 'BanAnController@store')->name('them-ban-an');

    //Đăng xuất
    Route::get('dang-xuat', 'AuthController@logout')->name('dang-xuat');
});

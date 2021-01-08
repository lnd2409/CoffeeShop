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
Route::get('/', 'TrangChu\KhachHangController@homePage')->name('trang-chu');
Route::get('/lien-he', 'LienHeController@index')->name('lien-he');


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




    Route::get('/', 'ThongKeController@index')->name('admin');
    //Bàn ăn
    Route::get('/ban-an', 'BanAnController@index')->name('ban-an');
    Route::post('/ban-an/them-ban-an', 'BanAnController@store')->name('them-ban-an');


    //Phần này của Phụng nhé! ---Yêu mọi người-----
    Route::get('/ban-an/chi-tiet/{id}', 'ThemMonAnController@index')->name('chi-tiet-ban-an');

    Route::post('/ban-an/them-mon/', 'ThemMonAnController@store')->name('them-mon-an-submit');

    Route::get('/ban-an/xoa-mon/{idpyc}/{idma}', 'ThemMonAnController@destroy')->name('xoa-mon-an');

    Route::get('/ban-an/sua-mon/{idpyc}/{idma}', 'ThemMonAnController@update')->name('sua-mon-an');

    Route::post('/ban-an/lay-mon-an', 'ThemMonAnController@GetAllFood')->name('lay-all-mon-an-theo-ban');

    Route::post('/ban-an/xoa-mon-an', 'ThemMonAnController@DeleteFood')->name('xoa-mon-an-theo-ban');

    Route::post('/ban-an/nhom', 'BanAnController@NhomAjax')->name('ban-an-Ajax');

    Route::post('/ban-an/kiem-tra-ban', 'ThemMonAnController@CheckBanAjax')->name('check-status-table');

    //Thanh toán, kiểm tra khuyên mãi
    Route::post('/thanh-toan/chekc-KM', 'BanAnController@CheckKMAjax')->name('ban-an-KMAjax');

    //Lưu hóa đơn nè
    Route::post('/thanh-toan/hoa-don', 'HoaDonController@store')->name('ban-an-luu-hoa-don');


    Route::get('/thanh-toan/hoa-don', 'HoaDonController@index')->name('hoa-don-get');

    Route::get('/xoa-hoa-don/{id}','HoaDonController@destroy')->name('hoa-don.xoa');




    //Quản lí khách hàng =>phụng

    Route::group(['prefix' => 'khach-hang'], function () {

        Route::get('/','KhachHangController@index')->name('admin.khach-hang');

        Route::post('/get-all-kh','KhachHangController@indexAjax')->name('admin.khach-hang.ajax');

        Route::post('/luu','KhachHangController@store')->name('admin.khach-hang.submit');

        Route::get('/xoa/{id}','KhachHangController@destroy')->name('admin.khach-hang.delete');

    });


    //Thêm loại và món ăn
    Route::group(['prefix' => 'loai-mon-an'], function () {

        Route::get('/','LoaiMonAnController@index')->name('admin.loai-mon-an');

        Route::post('/them-loai','LoaiMonAnController@LoaiThem')->name('admin.loai-mon-an.submit');

        Route::post('/them-mon','LoaiMonAnController@MonThem')->name('admin.mon-an.submit');

        Route::get('/loai-xoa/{id}','LoaiMonAnController@LoaiXoa')->name('admin.loai-mon-an.xoa');

        Route::get('/monan-xoa/{id}','LoaiMonAnController@MonAnXoa')->name('admin.mon-an.xoa');

        Route::post('/nhom-mon-an/get','LoaiMonAnController@AjaxGetNMA')->name('admin.get-nhom-ma');

        Route::post('/mon-an/get','LoaiMonAnController@AjaxGetMA')->name('admin.get-mon-ma');

        Route::post('/cap-nhat/nhom-mon-an','LoaiMonAnController@UpdateNhomMonAn')->name('admin.loai-mon-an.update');

        Route::post('/cap-nhat/mon-an','LoaiMonAnController@UpdateMonAn')->name('admin.mon-an.update');

    });

    // Nhân viên
    Route::group(['prefix' => 'nhan-vien'], function () {

        Route::get('/','NhanVienController@index')->name('nhanvien');

        Route::post('/them','NhanVienController@store')->name('nhanvien.submit');

        Route::post('/cap-nhat','NhanVienController@update')->name('admin.nhan-vien.submit');

        Route::post('/get-all-nhanvien','NhanVienController@indexAjax')->name('admin.nhanvien.ajax');

        //kiểm tra mật khẩu
        Route::post('/checkpass','NhanVienController@CheckPass')->name('nhanvien.checkpass');

        Route::get('/xoa/{id}','NhanVienController@destroy')->name('admin.nhan-vien.delete');

    });


    Route::get('/danh-sach-dat-ban', 'DatMonController@listOrder')->name('listOrder');
    Route::post('/xac-nhan-dat-ban', 'DatMonController@confirmOrder')->name('confirmOrder');

    /* Đức làm */
    #Món ăn
    Route::get('mon-an', 'MonAnController@index')->name('mon-an.danh-sach');

    #Khuyến mãi
    Route::get('khuyen-mai', 'KhuyenMaiController@index')->name('khuyen-mai');
    Route::get('khuyen-mai/them-khuyen-mai', 'KhuyenMaiController@themKhuyenMai')->name('khuyen-mai.them-khuyen-mai');
    Route::post('khuyen-mai/nhom-mon-an', 'KhuyenMaiController@khuyenMaiNhomMonAn')->name('khuyen-mai.nhom-mon-an');
    Route::post('khuyen-mai/voucher','KhuyenMaiController@khuyenMaiVoucher')->name('khuyen-mai.voucher');
    Route::get('khuyen-mai/{idKhuyenMai}/cap-nhat-trang-thai', 'KhuyenMaiController@updateStatus')->name('khuyen-mai.cap-nhat-trang-thai');
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


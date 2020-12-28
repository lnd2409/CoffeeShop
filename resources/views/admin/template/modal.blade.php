{{-- Khách hàng --}}
  <!-- Modal -->
  <div class="modal fade" id="UpdateKhachHang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Thông tin khách hàng</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{ route('admin.khach-hang.submit') }}" method="post">
                            @csrf
                            <div class="form-group">
                              <label for="">Họ tên</label>
                              <input type="text"
                                class="form-control" name="kh_ten" id="kh_ten" >
                              <input type="hidden"
                                class="form-control" name="kh_id"  id="kh_id" >
                            </div>
                            <div class="form-group">
                              <label for="">Số điện thoại</label>
                              <input type="text"
                                class="form-control" name="kh_sdt" id="kh_sdt" >
                            </div>
                            <div class="form-group">
                              <label for="">Loại khách hàng</label>
                              <input type="text"
                                class="form-control" name="" id="lkh_ten" disabled>
                              <input type="hidden"
                                 name="lkh_id" id="lkh_id" >
                            </div>
                            <div class="form-group">
                              <label for="">Loại khách hàng</label>
                              <select class="form-control" name="lkh_id" id="">
                                <option disabled selected>---Chọn loại khách hàng---</option>
                                @foreach ($loaikhachhang as $item)
                                    <option value=" {{$item->lkh_id}} "> {{$item->lkh_ten}} </option>
                                @endforeach
                              </select>
                            </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
          <button type="submit" class="btn btn-primary">Cập nhật</button>
        </div></form>
      </div>
    </div>
  </div>

{{-- Cập nhật Nhóm món ăn --}}
<div class="modal fade" id="CapNhatNhomMon" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cập nhật loại món ăn</h5>
      </div>
      <div class="modal-body">
        <form action="{{ route('admin.loai-mon-an.update') }}" method="post">
          @csrf
          <div class="form-group">
            <input type="text"
              class="form-control" name="nma_tenmon" id="nma_tenmonUpdate" >
              <input type="hidden" name="nma_id" id="nma_idUpdate">
          </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
        <button type="submit" class="btn btn-primary">Cập nhật</button></form>
      </div>
    </div>
  </div>
</div>
{{-- Cập nhật món ăn --}}
<div class="modal fade" id="CapNhatMonAn" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cập nhật món ăn</h5>
      </div>
      <div class="modal-body">
        <form action="{{ route('admin.mon-an.update') }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label for="">Tên món ăn</label>
            <input type="text"
              class="form-control" name="ma_ten" id="ma_tenUpdate" >
              <input type="hidden" name="ma_id" id="ma_idUpdate">
          </div>
          <div class="form-group">
            <label for="">Giá</label>
            <input type="number"
              class="form-control" name="ma_gia" id="ma_giaUpdate" >
          
          </div>
          <div class="form-group">
            <label for="">Mô tả</label>
            <input type="text"
              class="form-control" name="ma_mota" id="ma_motaUpdate" >
          </div>
          <input type="file" name="ma_hinhanh" class="form-control" id="" onchange="readURL1(this);">
          <img src="" style="width:30%; margin:20px"  alt="" id="HinhAnhMon">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
        <button type="submit" class="btn btn-primary">Cập nhật</button></form>
      </div>
    </div>
  </div>
</div>


{{-- Thêm nhân viên --}}
<div class="modal fade" id="ThemNhanVien" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Thêm nhân viên</h5>
      </div>
      <div class="modal-body">
        <form action="{{ route('nhanvien.submit') }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label for="">Tên nhân viên</label>
            <input type="text"
              class="form-control" name="nv_ten" id="ma_tenUpdate" >
              <input type="hidden" name="ma_id" id="ma_idUpdate">
          </div>
          <div class="form-group">
            <label for="">Số điện thoại</label>
            <input type="text"
              class="form-control" name="nv_sdt" id="ma_giaUpdate" >
          
          </div>
          <div class="form-group">
            <label for="">Chứng minh (ID)</label>
            <input type="number"
              class="form-control" name="nv_cmnd" id="ma_motaUpdate" >
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="">Tên đăng nhập</label>
                <input type="text"
                  class="form-control" name="username" id="ma_motaUpdate" >
              </div>
          
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="">Phân quyền</label>
                <select class="form-control" name="nv_quyen" id="">
                  <option value="0" selected>Admin</option>
                  <option value="1" selected>Nhân viên</option>
                </select>
              </div>
            </div>
          </div>
         <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="">Nhập mật khẩu</label>
                <input type="text"
                  class="form-control" name="pass1" id="Pss1" >
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="">Nhập lại mật khẩu</label>
                <input type="text"
                  class="form-control" name="nv_Pss2" id="Pss2" >
              </div>
            </div>
         </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
        <button type="submit" class="btn btn-primary" id="CheckSubmit">  Cập nhật</button></form>
      </div>
    </div>
  </div>
</div>
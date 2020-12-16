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
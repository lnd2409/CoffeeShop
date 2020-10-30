@extends('admin.template.master')
@section('title')
    Thêm món ăn
@endsection
@push('css')
<style>
 .additems {
    background: white;
    width: 100%;
}   
</style>
@endpush
@section('content')
<form action="{{ route('them-mon-an-submit') }}" method="post">
    @csrf
<div class="row">
    <div class="col-md-12">
    <h4>Chi tiết bàn ăn</h4>
    <div class="col-sm-12 mt-2" style="clear: right;">
        <div class="additems">
            <table class="table table-hover table-bordered">
                <thead>
                  <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Tên món ăn</th>
                    <th scope="col">Số lượng</th>
                    <th scope="col">Giá tiền</th>
                    <th scope="col">Thành tiền</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    <?php $i=1 ; $total=0?>
                  @foreach ($danhsachmonan as $ma)
                    <tr>
                        <th > {{$i++}}</th>
                        <td> {{$ma->ma_ten}} </td>
                        <td style="width:110px; "> <input type="number" class="form-control" name="" id="" value="{{$ma->ctpyc_soluongmonan}}" style="text-align:center"></td>
                        <td>{{ number_format($ma->ma_gia)}}  vnđ</td>
                        <td>{{number_format($ma->ma_gia * $ma->ctpyc_soluongmonan)}}  vnđ</td>
                        <td style="width:190px;">
                            <a href="#" class="btn btn-warning" > <i class="fa fa-share-square-o" aria-hidden="true"></i>Cập nhật</a>
                            <input type="hidden" id="pyc_id" value=" {{$ma->pyc_id}} ">
                            <input type="hidden" id="ma_id" value=" {{$ma->ma_id}} ">
                            <a href="{{ route('xoa-mon-an', ['idpyc'=>$ma->pyc_id,'idma'=>$ma->ma_id]) }}" class="btn btn-danger" onclick="return XoaMonAn()"> <i class="fa fa-trash-o" aria-hidden="true"></i> Xóa</a>
                        </td>
                    </tr>
                    <?php $total = $total + ($ma->ma_gia * $ma->ctpyc_soluongmonan) ?>
                  @endforeach
                  <tr>
                      <th colspan="4">Tổng tiền tạm tính</th>
                      <td > {{number_format($total)}} vnđ</td>
                      <td>
                        <button class="btn btn-success">Thanh toán</button>
                      </td>
                  </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
</form>
<!-- Cập nhật món -->
<div class="modal fade" id="CapNhatMonAn" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Cập nhật món ăn</h5>
        </div>
        {{-- <form action="" method="post"> --}}
            <div class="modal-body">
            ...
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
            <button type="button" class="btn btn-primary">Lưu</button>
            </div>
        {{-- </form> --}}
      </div>
    </div>
  </div>
@endsection
@push('script')
<script>
function XoaMonAn(){
    if( confirm('Bạn có muốn xóa ?') ){
        return true;
    }
    return false;
}
</script>
@endpush


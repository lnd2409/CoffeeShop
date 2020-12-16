@extends('admin.template.master')
@section('title')
    Khách hàng
@endsection
@push('css')
<style>
    .bg-monan {
    width: 100%;
    background: white;
    -webkit-box-shadow: 10px 10px 3px -5px rgba(0,0,0,0.15);
    -moz-box-shadow: 10px 10px 3px -5px rgba(0,0,0,0.15);
    box-shadow: 10px 10px 3px -5px rgba(0,0,0,0.15);
    margin: 0 0px;
}
</style>
@endpush
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-5 bg-monan"  >
            <h3 style="margin: 30px">Loại món ăn</h3>
            <form action="{{ route('admin.loai-mon-an.submit') }}" method="post" id="idForm">
                @csrf
                <div class="form-group">
                  <input type="text"
                    class="form-control" name="nma_ten" id="nma_ten" placeholder="Nhập loại món...">
                </div>
            </form>
            <div class="row">
                <div class="col-md">
                    <table class="table table-striped " >
                        <thead class="thead-inverse">
                            <tr>
                                <th>STT</th>
                                <th>Tên loại</th>
                                <th>Thao tác</th>
                            </tr>
                            </thead>
                            <?php $i=1?>
                            <tbody>
                                @foreach ($loai as $item)
                                <tr>
                                    <td> {{$i++}} </td>
                                    <td style="width:150px"> {{$item->nma_ten}} </td>
                                    <td> <a href="{{ route('admin.loai-mon-an.xoa', ['id'=>$item->nma_id]) }}">Xóa</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6 bg-monan" style="margin-left:60px">
            <h3 style="margin: 30px">Món ăn</h3>
            <form action="{{ route('admin.mon-an.submit') }}" method="post" id="idForm2">
                @csrf
                <div class="form-group">
                  <select class="form-control" name="loai_id" id="loai_id" required>
                   <option value="" disabled selected>--chọn loại---</option>
                   @foreach ($loai as $item)
                      <option value=" {{$item->nma_id}} "> {{$item->nma_ten}} </option> 
                   @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <input type="text"
                    class="form-control" name="ma_ten" id="ma_ten" placeholder="Nhập món..." required>
                </div>
                <div class="form-group">
                  <input type="text"
                    class="form-control" name="ma_gia" id="ma_gia" placeholder="Nhập giá..." required>
                </div>
                <div class="form-group">
                  <input type="text"
                    class="form-control" name="ma_ghichu" id="ma_ghichu" placeholder="Ghi chú..." required>
                    <button style="float: right; width:200px; margin:10px" type="submit" class="btn btn-success">Lưu</button>
                </div>
            </form>
            <div class="row" style="clear: right">
                <div class="col-md">
                    <table class="table table-striped " >
                        <thead class="thead-inverse">
                            <tr>
                                <th>STT</th>
                                <th>Tên loại</th>
                                <th>Thao tác</th>
                            </tr>
                            </thead>
                            <?php $i=1?>
                            <tbody>
                                @foreach ($monan as $item)
                                <tr>
                                    <td> {{$i++}} </td>
                                    <td > {{$item->ma_ten}} </td>
                                    <td> <a href="{{ route('admin.mon-an.xoa', ['id'=>$item->ma_id]) }}">Xóa</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>



@endsection
@push('script')
<script>
$('#nma_ten').keypress(function (e) {
  if (e.which == 13) {
    $('form#idForm').submit();
    return false; 
  }
});

</script> 
@endpush


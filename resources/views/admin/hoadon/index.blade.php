@extends('admin.template.master')
@section('title')
    Hóa Đơn
@endsection
@push('css')
<style>
    #detailFood{
        width: 100%;
        border: 1px solid wheat;
        background: aliceblue;
        margin: auto;
    }
</style>
@endpush
@section('content')
<div class="container">
    <div class="row" id="detailFood">
        <h4 style="margin: 20px; text-align:center; width:100%;">Danh sách hóa đơn</h4>
        <div class="col-md-12" >
            <!-- Table  -->
            <table class="table table-bordered" style="margin: 20px 0">
                <!-- Table head -->
                <thead>
                <tr>
                   
                    <th>STT</th>
                    <th>Nhân viên lập đơn</th>
                    <th>Bàn ăn</th>
                    <th>Tiền giảm</th>
                    <th>Tổng tiền</th>
                    <th>Thao tác</th>
                </tr>
                </thead>
                <!-- Table head -->
            
                <!-- Table body -->
                <tbody> <?php $i=1;?>
                    @foreach ($hoadon as $item)
                    <tr>
                        <th> {{$i++}} </th>
                        <th> {{$item->nv_ten}} </th>
                        <th> {{$item->ba_id}} </th>
                        <th> {{$item->tiengiam}} VNĐ</th>
                        <th> {{$item->tongtien}} VNĐ</th>
                        <td>
                            <a href="{{ route('hoa-don.xoa', ['id'=> $item->hd_id]) }}" onclick="return alertDel();">Xóa</a>
                        </td>
                    </tr>
                    @endforeach
              
                </tbody>
                <!-- Table body -->
            </table>
            <!-- Table  -->
        </div>
    </div>
</div>



@endsection
@push('script')
    <script>
        function alertDel()
        {
            var del = comfirm("Bạn có đồng ý xóa");
            if(del == true){
                return true;
            }else{
                return false;
            }
        }
    </script>
@endpush


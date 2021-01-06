@extends('admin.template.master')
@section('title')
    Khách hàng
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
        <h4 style="margin: 20px; text-align:center; width:100%;">Danh sách khách hàng</h4>
        <div class="col-md-12" >
            <!-- Table  -->
            <table class="table table-bordered" style="margin: 20px 0">
                <!-- Table head -->
                <thead>
                <tr>
                   
                    <th>Họ tên</th>
                    <th>Số điện thoại</th>
                    <th>Loại khách hàng</th>
                    <th>Thao tác</th>
                </tr>
                </thead>
                <!-- Table head -->
            
                <!-- Table body -->
                <tbody>
                    @foreach ($khachhang as $item)
                <tr>
                   
                        <td> <strong>{{$item->kh_ten}}</strong> </td>
                        <td>{{$item->kh_sdt}} </td>
                        <td>{{$item->lkh_ten}} </td>
                        <td style="width:150px">
                            <a href="#"  data-kh_id="{{$item->kh_id}} " class="GetInfoKH btn btn-warning" data-toggle="modal" data-target="#UpdateKhachHang">Sửa</a>
                            <a onclick=" return DeleteKH()" href="{{ route('admin.khach-hang.delete', ['id'=>$item->kh_id]) }}" class="btn btn-danger">Xóa</a>
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
function DeleteKH()
{
    if(confirm("Bạn có muốn xóa ? ")){
        return true;
    }
    return false;
}


$(document).ready(function () {
    $('.GetInfoKH').click(function (e) { 
        e.preventDefault();

        var kh_id =$(this).attr('data-kh_id');
        $.ajaxSetup({
        headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: "post",
            url: " {{route('admin.khach-hang.ajax')}} ",
            dataType: "json",
            data:{kh_id:kh_id},
            success: function (response) {
                console.log(response);
                $('#kh_ten').val(response.kh_ten);
                $('#kh_sdt').val(response.kh_sdt);
                $('#lkh_ten').val(response.lkh_ten);
                $('#kh_id').val(response.kh_id);
                $('#lkh_id').val(response.lkh_id);
            }
        });



    });
});
</script> 
@endpush


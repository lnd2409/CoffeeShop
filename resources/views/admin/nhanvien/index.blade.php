@extends('admin.template.master')
@section('title')
    Nhân viên
@endsection
@push('css')
<style>
    #detailFood{
        width: 100%;
        border: 1px solid wheat;
        background: aliceblue;
        margin: auto;
    }
    .checkpassY{
        border: 1px solid green;
    }
    .checkpassN{
        border: 1px solid red;
    }
</style>
@endpush
@section('content')
<div class="container">
    <div class="row" id="detailFood">
        <div class="col-md-12">
            <button class="btn btn-success" style="margin:10px" data-toggle="modal" data-target="#ThemNhanVien">Thêm nhân viên</button>
        </div>
        <h4 style="margin: 20px; text-align:center; width:100%;">Danh sách nhân viên</h4>
        <div class="col-md-12" >
            <!-- Table  -->
            <table class="table table-bordered" style="margin: 20px 0">
                <!-- Table head -->
                <thead>
                <tr>
    
                    <th>Họ tên</th>
                    <th>Số điện thoại</th>
                    <th>CMND</th>
                    <th>Thao tác</th>
                </tr>
                </thead>
                <!-- Table head -->
            
                <!-- Table body -->
                <tbody>
                    @foreach ($nhanvien as $item)
                <tr>
                    
                        <td> <strong>{{$item->nv_ten}}</strong> </td>
                        <td>{{$item->nv_sdt}} </td>
                        <td>{{$item->nv_cmnd}} </td>
                        <td style="width:150px">
                            <a href="#"  data-nv_id="{{$item->nv_id}} " class="GetInfoNV btn btn-warning" data-toggle="modal" data-target="#UpdateNhanVien">Sửa</a>
                            <a onclick=" return DeleteNV()" href="{{ route('admin.nhan-vien.delete', ['id'=>$item->nv_id]) }}" class="btn btn-danger">Xóa</a>
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
function DeleteNV()
{
    if(confirm("Bạn có muốn xóa ? ")){
        return true;
    }
    return false;
}


$(document).ready(function () {
    $('.GetInfoNV').click(function (e) { 
        e.preventDefault();

        var nv_id =$(this).attr('data-nv_id');
        // alert(nv_id);
        $.ajaxSetup({
        headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: "post",
            url: " {{route('admin.nhanvien.ajax')}} ",
            dataType: "json",
            data:{nv_id:nv_id},
            success: function (response) {
                console.log(response);
                $('#nv_ten').val(response.nv_ten);
                $('#nv_sdt').val(response.nv_sdt);
                $('#nv_cmnd').val(response.nv_cmnd);
                $('#nv_id').val(response.nv_id);
              
            }
        });



    });
});
</script> 
@endpush


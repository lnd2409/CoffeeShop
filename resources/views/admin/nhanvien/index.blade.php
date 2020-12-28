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
                    <th style="width:50px;">
                    <!-- Default unchecked -->
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="tableDefaultCheck1">
                    </div>
                    </th>
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
                    <th scope="row">
                        <!-- Default unchecked -->
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id=" kh{{$item->nv_id}} " checked>
                            <label class="custom-control-label" for="kh{{$item->nv_id}} "></label>
                        </div>
                        </th>
                        <td> <strong>{{$item->nv_ten}}</strong> </td>
                        <td>{{$item->nv_sdt}} </td>
                        <td>{{$item->nv_cmnd}} </td>
                        <td style="width:150px">
                            <a href="#"  data-kh_id="{{$item->nv_id}} " class="GetInfoKH btn btn-warning" data-toggle="modal" data-target="#UpdateKhachHang">Sửa</a>
                            <a onclick=" return DeleteKH()" href="{{ route('admin.khach-hang.delete', ['id'=>$item->nv_id]) }}" class="btn btn-danger">Xóa</a>
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
    $('#CheckSubmit').attr('disabled',true);
    //Kiểm tra mật khẩu
    $('#Pss2').keyup(function (e) { 


        var p2 = $(this).val();
        var p1 = $('#Pss1').val();
        $.ajaxSetup({
        headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: "post",
            url: " {{route('nhanvien.checkpass')}} ",
            data: {p1:p1,p2:p2},
            dataType: "json",
            success: function (response) {
                console.log(response);
                if(response==1)
                {
                    $('#Pss1').removeClass('checkpassN');
                    $('#Pss2').removeClass('checkpassN');
                     $('#Pss1').addClass('checkpassY');
                     $('#Pss2').addClass('checkpassY');
                     $('#CheckSubmit').attr('disabled',false);
                }
                else
                {
                    $('#CheckSubmit').attr('disabled',true);
                    $('#Pss1').removeClass('checkpassY');
                    $('#Pss2').removeClass('checkpassY');
                    $('#Pss1').addClass('checkpassN');
                     $('#Pss2').addClass('checkpassN');
                }
               
            }
        });


    });














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


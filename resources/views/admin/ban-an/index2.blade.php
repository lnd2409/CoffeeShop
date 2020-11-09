@extends('admin.template.master')
@section('title')
    Bàn ăn
@endsection
@push('css')
<style>
    #detailFood{
        width: 100%;
        border: 1px solid wheat;
        background: aliceblue;
        margin: auto;
    }
    .change_backgruond{
        background: #daff7f !important;
    }
    div#sl {
    width: 127px;
    margin: 5px 0;
}
#table-detail td, #table-detail th {
  border: 1px solid #483333;
  padding: 8px;
}

#table-detail tr:nth-child(even){background-color: #f2f2f2;}

#table-detail tr:hover {background-color: #ddd;}
tr.tr_td td {
    line-height: 35px;
}
table#table-detail th {
    text-align: center;
    color: black;
    font-size: 17px;
    font-weight: 700;
}
</style>
@endpush
@section('content')
<div class="row">
    <div class="col-md-12">
        <h3>Danh sách bàn ăn</h3>
        <div class="row" style="width:100%;overflow: auto;margin:auto;border: 1px solid wheat;background: aliceblue;margin-top: 20px;padding: 10px;">
            @foreach ($banan as $item)
            <div class="col-sm-2 BanAn " id="BanSo{{$item->ba_id}}" style="background: #bbefd4;  border:2px solid; margin:5px; height:100px;" >
                    <h4 class="text-center" style="width: 100%;text-align: center;color: #212f38;font-size: 17px; margin-top:5px">Bàn số {{$item->ba_id}}
                        @if ($item->ba_trangthai == 1)
                            <span class="badge badge-danger">Có người</span>
                        @else
                            <span class="badge badge-success">Bàn Trống</span>
                        @endif
                    </h4>
                    <p style="margin-top:20px;"><a href="" class="ClickBanNe" data-banid="{{$item->ba_id}}"><i class="fa fa-tasks" aria-hidden="true"></i>Thêm món ăn</a></p>
                </div>
            @endforeach
        </div>
    </div>
    {{-- <div class="col-md-5">
        <h3>Thêm món ăn vào bàn</h3>
        <form action="{{ route('them-mon-an-submit') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-md-9">
                    <div class="input-group mt-2">
                        <div class="input-group-prepend">
                        <label class="input-group-text" for="ChonBan" style="background: #bbefd4;width:110px;">Chọn bàn</label>
                        </div>
                        <select class="custom-select" id="ChonBan" name="BanAn">
                        <option selected disabled>-- Chọn bàn --</option>
                            @foreach ($banan as $item)
                            <option value=" {{$item->ba_id}} "> {{$item->ba_id}} </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="input-group mt-2">
                        <div class="input-group-prepend">
                        <label class="input-group-text" for="NhomMonAn" style="background: #bbefd4;width:110px;">Loại món ăn</label>
                        </div>
                        <select class="custom-select" id="NhomMonAn">
                        <option selected disabled>-- Nhóm món ăn --</option>
                        @foreach ($nhom as $item)
                        <option value=" {{$item->nma_id}} "> {{$item->nma_ten}} </option>
                        @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="input-group mt-2">
                        <div class="input-group-prepend">
                        <label class="input-group-text" for="MonAn" style="background: #bbefd4; width:110px;">Món ăn</label>
                        </div>
                        <select class="custom-select MonAn" id="MonAn" name="MonAn">
                            <option value="" id="delmonan" >--- Chọn món ---</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="input-group mt-2">
                        <div class="input-group-prepend">
                        <label class="input-group-text" for="ChonBan" style="background: #bbefd4;width:110px;">Số lượng</label>
                        </div>
                        <input class="form-control" type="number" id="ChonBan" name="SoLuong" min="1" max="100" value="1" style="text-align: center">
                    </div>
                </div>
                <div class="col-md-12 mt-2">
                    <button type="submit" class="btn btn-success btn-block ">Lưu món ăn</button>
                </div>
            </div>
        </form>
    </div> --}}
    @push('insert_html')
    <!-- Thêm món vào bàn ở đây nha -->
    <div class="modal fade bd-example-modal-lg" id="ChonMonAnNe" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Thêm món ăn vào bàn <input type="number" class="BanNum"  id="BanNum" value="0" style="width:50px;text-align: center;" disabled></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="row">
                @foreach ($nhom as $val)
                <div class="col-md-2" style="height:40px;background: #252121;margin: 5px 10px;">
                <a style="color: white;text-align: center;height: 40px;line-height: 40px; display: block;" class="ClickNhom" data-nhom="{{$val->nma_id}}"> {{$val->nma_ten}} </a></div>
                @endforeach
            </div>
            <hr>
            <div class="row mt-3" id="MonTheoNhom">
                
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
        </div>
        </div>
    </div>

    {{-- Thanh toán --}}
   
</div>
@endpush
</div>
<div class="row mt-2"id="detailFood">
    <div class="col-md-12 " >
        <h3 class="mt-2 " >Chi tiết bàn ăn số <input type="number" class="BanNum"  id="BanNum" value="0" style="width:50px;text-align: center;" disabled></h3>
    </div>
    <div class="col-md-12" id="scrollNe">
        <div class="additems">
            <h5>Đơn vị tính: VNĐ</h5>
            <table class="table table-hover table-bordered" id="table-detail" style="margin-bottom: 40px;margin-top: 20px;">
                <thead>
                  <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Tên món ăn</th>
                    <th scope="col">Số lượng</th>
                    <th scope="col">Giá tiền</th>
                    <th scope="col">Thành tiền</th>
                    <th scope="col">Thao tác</th>
                  </tr>
                </thead>
                <tbody id="Table_MonAn">
                    
                </tbody>
            </table>
        </div>
    </div>
    {{-- <div class="col-md-4">
        <form action="" method="post">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="input-group">
                        <div class="input-group-prepend">
                        <label class="input-group-text" for="NhomMonAn" style="background: #bbefd4;width:110px;">Loại món ăn</label>
                        </div>
                        <select class="custom-select" id="NhomMonAn">
                        <option selected disabled>-- Nhóm món ăn --</option>
                        @foreach ($nhom as $item)
                        <option value=" {{$item->nma_id}} "> {{$item->nma_ten}} </option>
                        @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="input-group mt-2">
                        <div class="input-group-prepend">
                        <label class="input-group-text" for="MonAn" style="background: #bbefd4; width:110px;">Món ăn</label>
                        </div>
                        <select class="custom-select MonAn" id="MonAn" name="MonAn">
                            <option value="" id="delmonan" >--- Chọn món ---</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="input-group mt-2">
                        <div class="input-group-prepend">
                        <label class="input-group-text" for="ChonBan" style="background: #bbefd4;width:110px;">Số lượng</label>
                        </div>
                        <input class="form-control" type="number" id="ChonBan" name="SoLuong" min="1" max="100" value="1" style="text-align: center">
                    </div>
                </div>
                <div class="col-md-12 mt-2 mb-2">
                    <button type="submit" class="btn btn-success btn-block " id="LuuMonAn">Lưu món ăn</button>
                </div>
            </div>
        </form>
    </div> --}}
</div>

  

@endsection

@push('script')
<script>
$( document ).ready(function() {
   
    $('#NhomMonAn').change(function (e) { 
        e.preventDefault();
        var nhom = $('#NhomMonAn').val();
        $.ajaxSetup({
        headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "post",
            url: " {{route('ban-an-Ajax')}} ",
            data: {nhom:nhom},
            dataType: "json",
            success: function (response) {
                console.log(response);
                $('#MonAn').empty();
                $('#MonAn').removeAttr("disabled");
                $('#delmonan').remove();
                if (reponse = []) {
                        $('.MonAn').append('<option class="form-control" disabled>Không có dữ liệu</option>');
                    }
                    for (let i = 0; i < response.length; i++) {
                        console.log(response[i].ma_ten);
                        $('.MonAn').append('<option class="form-control" value="' + response[i].ma_id + '" >' + response[i].ma_ten + '</option>');
                    }
            }
        });
       
    });

    var tam =0;
    //Lấy id của từng bàn ăn
    $('.ClickBanNe').click(function (e) {

        e.preventDefault();
        $('#MonTheoNhom').empty();
        if(tam != ban){
            $('#BanSo'+tam).removeClass("change_backgruond");
        }
        var ban = $(this).attr('data-banid');
        tam=ban;
        $('#BanSo'+ban).toggleClass("change_backgruond");
        $('.BanNum').val(ban);
        // alert(tam + ban);
        // $('ChonMonAnNe').show();
        $('#ChonMonAnNe').modal('toggle')

        var i=1;
        var totalmenu =0;
        //Lấy thông tin món ăn của bàn ra ngoài
        $.ajaxSetup({
        headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "POST",
            url: " {{route('lay-all-mon-an-theo-ban')}} ",
            data: {BanAn:ban},
            dataType: "json",
            success: function (response) {
                console.log(response);
                $("#Table_MonAn tr").remove();
               
                response.forEach(val => {
                    totalmenu = totalmenu + (val.ma_gia * val.ctpyc_soluongmonan);
                    var tring = '<tr class="tr_td">';
                    tring+='<td>'+i+'</td>';
                    tring+='<td>'+val.ma_ten+'</td>';
                    tring+='<td>'+val.ctpyc_soluongmonan+'</td>';
                    tring+='<td>'+val.ma_gia+'</td>';
                    tring+='<td>'+val.ma_gia * val.ctpyc_soluongmonan+'</td>';
                    tring+='<td><button type="button" class="btn btn-danger" >Xóa</button></td>';
                    tring+='</tr>';
                    $('#Table_MonAn').append(tring);
                    i++;
                });
                console.log(totalmenu);
                var str2 ='<tr class="tr_td">'
                    str2+='<td colspan="4">Tổng tiền</td>'
                    str2+='<td id="totalmenu">'+totalmenu+'</td>'
                    str2+='<td>  <button class="btn btn-success" id="GetThanhToan">Thanh toán</button> </td>'
                    str2+='</tr>'
                $('#Table_MonAn').append(str2);
            }
        });
    



    });

    //Lưu thông tin của món ăn trên bàn
    // $('#LuuMonAn').click(function (e) { 
    //     e.preventDefault();
    //     var ban = $('#BanNum').val();
    //     // var nmaid = $('#NhomMonAn').val();
    //     var ma_id = $('#MonAn').val();
    //     var sl = $('#ChonBan').val();
    //     var i=1;
       
    //     $.ajax({
    //         type: "POST",
    //         url: " {{route('them-mon-an-submit')}} ",
    //         data: {SoLuong:sl,BanAn:ban,MonAn:ma_id },
    //         dataType: "json",
    //         success: function (response) {
    //             console.log(response);
    //             $("#Table_MonAn tr").remove();
    //             response.forEach(val => {
    //                 var tring = '<tr>';
    //                 tring+='<td>'+i+'</td>';
    //                 tring+='<td>'+val.ma_ten+'</td>';
    //                 tring+='<td>'+val.ctpyc_soluongmonan+'</td>';
    //                 tring+='<td>'+val.ma_gia+'</td>';
    //                 tring+='<td>'+val.ma_gia * val.ctpyc_soluongmonan+'</td>';
    //                 tring+='<td>'+10+'</td>';
                
    //                 tring+='</tr>';
    //                 $('#Table_MonAn').append(tring);
    //                 i++;
    //             });
    //         }
    //     });
    // });

    $('.ClickNhom').click(function (e) { 
        e.preventDefault();
        var nhom = $(this).attr('data-nhom');
        // alert(nhom);
        var data='';
        $('#totalmenu').append('');
        $.ajaxSetup({
        headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "post",
            url: " {{route('ban-an-Ajax')}} ",
            data: {nhom:nhom},
            dataType: "json",
            success: function (response) {
                for (let i = 0; i < response.length; i++) {
                    console.log(response[i].ma_ten);
                    $('#MonTheoNhom').empty();
                    data +='<div class="col-md-3" >';   
                    data +='<img src=" {{asset("admin-assets/images/logo.png")}} " alt="" style="width: 70%;height:100px;margin-left: 15px;">';  
                    data +='<div class="col-md-12"><span>'+response[i].ma_ten+'</span> <input type="hidden" value="'+response[i].ma_id+'" id="GetNameFood'+response[i].ma_id+'"> </div>';  
                    data +='<div class="col-md-12">';  
                    data +='<div class="sl">';  
                    data +='<div class="input-group" id="sl" >';  
                    data +='<input type="number" class="form-control" value="1" min="1" id="GetQuatiFood'+response[i].ma_id+'"  aria-describedby="basic-addon2">';  
                    data +='<div class="input-group-append">';  
                    data +='<a href="#" class="input-group-text basic-click'+response[i].ma_id+' GetFood" id="basic-addon2" data-stt ="'+response[i].ma_id+'">Thêm</a>';  
                    data +=' </div>';  
                    data +='</div>';  
                    data +='</div>';  
                    data +=' </div>';  
                    data +='</div>';  
                    $('#MonTheoNhom').append(data);
                }
                
            }
        });
    });




    $(document).on("click", "a.GetFood" , function() {

        var stt = $(this).attr('data-stt');
        var ban = $('#BanNum').val();
        var ma_id = $('#GetNameFood'+stt).val();
        var sl = $('#GetQuatiFood'+stt).val();
        $('#GetQuatiFood'+stt).val(1);
       var i =1;
       var totalmenu=0;
        console.log("ban"+ban );
        console.log("mon an"+ ma_id);
        console.log("so luong"+sl);
        $.ajax({
            type: "POST",
            url: " {{route('them-mon-an-submit')}} ",
            data: {SoLuong:sl,BanAn:ban,MonAn:ma_id },
            dataType: "json",
            success: function (response) {
                console.log(response);
                $("#Table_MonAn tr").remove();
                    response.forEach(val => {
                        totalmenu = totalmenu + (val.ma_gia * val.ctpyc_soluongmonan);
                        var tring = '<tr>';
                        tring+='<td>'+i+'</td>';
                        tring+='<td>'+val.ma_ten+'</td>';
                        tring+='<td>'+val.ctpyc_soluongmonan+'</td>';
                        tring+='<td>'+val.ma_gia+'</td>';
                        tring+='<td>'+val.ma_gia * val.ctpyc_soluongmonan+'</td>';
                        tring+='<td><button type="button" class="btn btn-danger" >Xóa</button></td>';
                        tring+='</tr>';
                        $('#Table_MonAn').append(tring);
                        i++;
                    });
                    var str2 ='<tr class="tr_td">'
                    str2+='<td colspan="4">Tổng tiền</td>'
                    str2+='<td id="totalmenu">'+totalmenu+'</td>'
                    str2+='<td>  <button class="btn btn-success" id="GetThanhToan">Thanh toán</button> </td>'
                    str2+='</tr>'
                $('#Table_MonAn').append(str2);
            }
        });


    });

    //thanh toán

    $(document).on("click","button#GetThanhToan",function(){
       
    });

    console.log( "ready!" );
});  
</script>
@endpush

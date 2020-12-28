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
        <div class="col-md-12">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Nhóm món ăn</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Món ăn</a>
                </li>
              </ul>
        </div>
    </div>
    <div class="row" class="tab-content" id="pills-tabContent">
        <div class="col-md-12 bg-monan tab-pane fade show active"  id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
            <h3 style="margin: 30px">Loại món ăn</h3>
            <form action="{{ route('admin.loai-mon-an.submit') }}" method="post" id="idForm">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text"
                              class="form-control" style="width:50%" name="nma_ten" id="nma_tennn" placeholder="Nhập loại món...">
                          </div>
                    </div>
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-success" style="margin-left: -246px" >Lưu</button>
                    </div>
                </div>
                
                
            </form>
            <div class="row">
                <div class="col-md">
                    <table class="table table-striped " style="margin-bottom: 10px;" >
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
                                    <td > <strong>{{$item->nma_ten}} </strong></td>
                                    <td style="width:200px">
                                        <a class="btn btn-warning UpdateNMonAn" data-maID=" {{$item->nma_id}} "  href="#" data-toggle="modal" data-target="#CapNhatNhomMon">Cập nhật</a>
                                        <a onclick="return XoaNhomMA()" class="btn btn-danger"  href="{{ route('admin.loai-mon-an.xoa', ['id'=>$item->nma_id]) }}">Xóa</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-12 " style="text-align: center;margin-left: 41%;margin-top: 10px;"> {{$loai->links()}} </div>
        </div>
        <div class="col-md-12 bg-monan tab-pane fade " id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" style="margin-top:-400px ">
            <h3 style="margin: 30px">Món ăn</h3>
            <form action="{{ route('admin.mon-an.submit') }}" method="post" id="idForm2" enctype="multipart/form-data">
                @csrf
               <div class="row">
                   <div class="col-md-6">
                        <div class="form-group">
                            <select class="form-control" name="loai_id" id="loai_id" required>
                            <option value="" disabled selected>--chọn loại---</option>
                            @foreach ($loai1 as $item)
                                <option value=" {{$item->nma_id}} "> {{$item->nma_ten}} </option> 
                            @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="text"
                            class="form-control" name="ma_ten" id="ma_ten" placeholder="Nhập món..." required>
                        </div>
                        <div class="form-group">
                            <input type="number"
                            class="form-control" name="ma_gia" id="ma_gia" placeholder="Nhập giá..." required>
                        </div>
                        <div class="form-group">
                            <input type="text"
                            class="form-control" name="ma_ghichu" id="ma_ghichu" placeholder="Ghi chú..." required>
                            <button style="width:200px; margin:10px" type="submit" class="btn btn-success">Lưu</button>
                        </div>
                   </div>
                   <div class="col-md-6">
                    <div class="form-group" style="margin-top: -38px">
                        <label for="">Hình ảnh món ăn</label>
                        <input type="file"
                        class="form-control" name="ma_hinhanh" id="ma_hinhanh" onchange="readURL(this);" required>
                        <img id="blah" src="" style="width: 44%;margin: 10px 137px;"/>
                    </div>
                   </div>
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
                                    <td style="font-size: 18px; font-weight:bold"> {{$item->ma_ten}} </td>
                                    <td style="width:200px"> 
                                        <a class="btn btn-warning UpdateMonAn" data-maID=" {{$item->ma_id}} " href="#" data-toggle="modal" data-target="#CapNhatMonAn">Xem chi tiết</a>
                                        <a onclick="return XoaMonAn()" class="btn btn-danger" href="{{ route('admin.mon-an.xoa', ['id'=>$item->ma_id]) }}">Xóa</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                    </table>
                </div>
                <div class="col-md-12 " style="text-align: center;margin-left: 41%;margin-bottom: 10px;"> {{$monan->links()}} </div>
            </div>

        </div>
    </div>
</div>



@endsection
@push('script')
<script>

$('.UpdateNMonAn').click(function (e) { 
    e.preventDefault();
    nma_id = $(this).attr('data-maID');
    // alert(nma_id);
    $.ajaxSetup({
        headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    $.ajax({
        type: "post",
        url: " {{route('admin.get-nhom-ma')}} ",
        data: {nma_id:nma_id},
        dataType: "json",
        success: function (response) {
            // console.log(response);
            $('#nma_tenmonUpdate').val(response.nma_ten);
            $('#nma_idUpdate').val(response.nma_id);
        }
    });
    
});



$('.UpdateMonAn').click(function (e) { 
    e.preventDefault();
    ma_id = $(this).attr('data-maID');
    // alert(ma_id);
    $.ajaxSetup({
        headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    $.ajax({
        type: "post",
        url: " {{route('admin.get-mon-ma')}} ",
        data: {ma_id:ma_id},
        dataType: "json",
        success: function (response) {
            // console.log(response);
            var img='{{asset("upload/mon-an/")}}'+'/'+response.ma_hinhanh;
            // console.log(img);
            $('#ma_idUpdate').val(response.ma_id);
            $('#ma_tenUpdate').val(response.ma_ten);
            $('#ma_giaUpdate').val(response.ma_gia);
            $('#ma_motaUpdate').val(response.ma_chuthich);
            $('#HinhAnhMon').attr('src',img);
            
        }
    });
    
});




function XoaNhomMA(){
    if(confirm('Bạn có muốn xóa ?')){
        return true;
    }
        return false;
}


function XoaMonAn(){
    if(confirm('Bạn có muốn xóa món ăn ?')){
        return true;
    }
        return false;
}

function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah')
                    .attr('src', e.target.result)
                    
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
function readURL1(input) {
    // alert('ok');
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#HinhAnhMon')
                    .attr('src', e.target.result);
                    
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
$('#nma_tennn').keypress(function (e) {
    $('form#idForm').submit();
 
});

</script> 
@endpush


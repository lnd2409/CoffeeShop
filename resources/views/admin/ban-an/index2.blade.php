@extends('admin.template.master')
@section('title')
    Bàn ăn
@endsection

@section('content')
<div class="row">
    <div class="col-md-7">
        <h3>Danh sách bàn ăn</h3>
        <div class="row" style="width:100%;height:500px;overflow: auto; margin:auto;">
            @foreach ($banan as $item)
                <div class="col-md-3 m-2 BanAn" style="background: #bbefd4; height:100px; border:2px solid;" >
                    <h4 class="text-center" style="width: 100%;text-align: center;color: #212f38;font-size: 17px; margin-top:5px">Bàn số {{$item->ba_id}}
                        @if ($item->ba_trangthai == 1)
                            <span class="badge badge-danger">Có người</span>
                        @else
                            <span class="badge badge-success">Trống</span>
                        @endif
                    </h4>
                    <p ><a href="{{ route('chi-tiet-ban-an', ['id'=>$item->ba_id]) }}" style="font-size: 14px;margin-top: 24px;color: #d00101;font-weight: 600;"><i class="fa fa-tasks" aria-hidden="true"></i> Chi tiết bàn</a></p>
                </div>
            @endforeach
        </div>
    </div>
    <div class="col-md-5">
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
    </div>
</div>
@endsection

@push('script')
<script>
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
</script>
@endpush

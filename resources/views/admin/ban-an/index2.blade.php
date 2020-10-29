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
                    <p ><a href="{{ route('them-mon-an', ['id'=>$item->ba_id]) }}" style="font-size: 14px;margin-top: 24px;color: #d00101;font-weight: 600;"><i class="fa fa-tasks" aria-hidden="true"></i> Chi tiết bàn</a></p>
                </div>
            @endforeach
        </div>
    </div>
    <div class="col-md-5">
        <h3>Thêm món ăn vào bàn</h3>
        <div class="row">
            <div class="col-md-9">
                <div class="input-group mt-2">
                    <div class="input-group-prepend">
                      <label class="input-group-text" for="ChonBan" style="background: #bbefd4;width:110px;">Chọn bàn</label>
                    </div>
                    <select class="custom-select" id="ChonBan">
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
                    <select class="custom-select" id="MonAn">
                      <option selected disabled> --- Món ăn ---</option>
                      <option value="1">One</option>
                      <option value="2">Two</option>
                      <option value="3">Three</option>
                    </select>
                  </div>
            </div>
            <div class="col-md-12 mt-2">
                <button type="submit" class="btn btn-success btn-block ">Lưu món ăn</button>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
<script>
    $('#NhomMonAn').change(function (e) { 
        e.preventDefault();
        var nhom = $('#NhomMonAn').val();
       
    });
</script>
@endpush
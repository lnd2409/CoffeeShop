@extends('admin.template.master')
@section('title')
    Khuyến mãi
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="overview-wrap">
            <h2 class="title-1">Tạo khuyến mãi</h2>
        </div>
        <div class="overview-wrap">
            <a href="{{ route('khuyen-mai') }}" class="btn btn-sm btn-default">Quay lại</a>
        </div>
    </div>
</div>
<div class="row m-t-25">
    <div class="col-md-7">

        {{-- form chọn loại khuyến mãi --}}
        <div class="form-group">
            <label>Loại khuyến mãi</label>
            <select name="loaiKhuyenMai" class="form-control" id="loaiKhuyenMai">
                <option value="null">Chọn loại khuyến mãi</option>
                @foreach ($loaiKhuyenMai as $item)
                    <option value=" {{$item->lkm_id}} "> {{$item->lkm_ten}} </option>
                @endforeach
            </select>
        </div>


        {{-- form chọn nhóm món ăn cần khuyến mãi --}}
        <form action="{{ route('khuyen-mai.nhom-mon-an') }}" method="POST" id="loaiSanPham" style="display: none;">
            @csrf
            <div class="form-group">
                <label>Chọn nhóm món ăn cần khuyến mãi</label>
                <select name="nhomMonAn" class="form-control">
                    @foreach ($nhomMonAn as $item)
                        <option value="{{ $item->nma_id }}">{{ $item->nma_ten }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Phần trăm cần khuyến mãi</label>
                <input type="number" class="form-control" name="phanTram">
            </div>
            <div class="form-group">
                <label >Tên khuyến mãi</label>
                <input type="text" class="form-control" name="tenKhuyenMai">
            </div>
            <div class="form-group">
                <label for="">Nội dung</label>
                <textarea name="noiDung" id="" cols="30" rows="10" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label for="">Ngày bắt đầu</label>
                <input type="date" class="form-control" name="ngayBatDau">
            </div>
            <div class="form-group">
                <label for="">Ngày kết thúc</label>
                <input type="date" class="form-control" name="ngayKetThuc">
            </div>
            <div class="form-group">
                <label for="">Hình ảnh giới thiệu</label>
                <input type="file" class="form-control" name="hinhAnh">
            </div>
            <div class="form-group">
                <input type="submit" value="Lưu" class="btn btn-primary">
            </div>
        </form>

        <form action="{{ route('khuyen-mai.voucher') }}" id="voucher" style="display: none;" method="POST">
            @csrf
            <div class="form-group">
                <label >Tên khuyến mãi</label>
                <input type="text" class="form-control" name="tenKhuyenMai">
            </div>
            <div class="form-group">
                <label for="">Nội dung</label>
                <textarea name="noiDung" id="" cols="30" rows="10" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label for="">Ngày bắt đầu</label>
                <input type="date" name="ngayBatDau" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Ngày kết thúc</label>
                <input type="date" name="ngayKetThuc" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Mã voucher</label>
                <input type="text" name="code" class="form-control">
            </div>
            <div class="form-group">
                <label>Khuyến mãi theo</label>
                <select name="khuyenMaiTheo" class="form-control" id="khuyenMaiTheo">
                    <option value="null">Chọn</option>
                    <option value="phanTram">Phần trăm</option>
                    <option value="gia">Giá</option>
                </select>
            </div>
            <div class="form-group">
                <input type="number" id="phanTram" name="phanTram" class="form-control" placeholder="Nhập phần trăm giảm . . ." style="display: none;">
            </div>
            <div class="form-group">
                <input type="number" id="gia" name="gia" class="form-control" placeholder="Nhập giá giảm . . ." style="display: none;">
            </div>
            <div class="form-group">
                <input type="submit" value="Lưu" class="btn btn-primary">
            </div>
        </form>
    </div>
</div>
@push('khuyenmai')
    <script>
        $(document).ready(function() {
            $("#loaiKhuyenMai").change(function() {
                // var selectedVal = $("#myselect option:selected").text();
                var loaiKhuyenMai = $("#loaiKhuyenMai option:selected").val();
                console.log(loaiKhuyenMai);
                if (loaiKhuyenMai == 'nhomMonAn') {
                    $('#loaiSanPham').show();
                    $('#voucher').hide();
                }
                else if (loaiKhuyenMai == 'null') {
                    $('#loaiSanPham').hide();
                    $('#voucher').hide();
                }
                else
                {
                    $('#loaiSanPham').hide();
                    $('#voucher').show();
                }

                // if()
            });
            $("#khuyenMaiTheo").change(function() {
                // var selectedVal = $("#myselect option:selected").text();
                var khuyenMaiTheo = $("#khuyenMaiTheo option:selected").val();
                console.log(khuyenMaiTheo);
                if (khuyenMaiTheo == 'phanTram') {
                    $('#phanTram').show();
                    $('#gia').hide();
                }
                else if (khuyenMaiTheo == 'null') {
                    $('#phanTram').hide();
                    $('#gia').hide();
                }
                else
                {
                    $('#phanTram').hide();
                    $('#gia').show();
                }
            });
        });
    </script>
@endpush
@endsection

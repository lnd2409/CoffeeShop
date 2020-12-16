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
        <form action="">
            <div class="form-group">
                <label >Tên khuyến mãi</label>
                <input type="text" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Nội dung</label>
                <textarea name="" id="" cols="30" rows="10" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label for="">Ngày bắt đầu</label>
                <input type="date" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Ngày kết thúc</label>
                <input type="date" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Hình ảnh giới thiệu</label>
                <input type="file" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Loại khuyến mãi</label>
                <select name="" id="" class="form-control">
                    @foreach ($loaiKhuyenMai as $item)
                        <option value="{{ $item->lkm_id }}">{{ $item->lkm_ten }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="">Giảm theo phần trăm (%)</label>
                <input type="number" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Giảm theo giá</label>
                <input type="number" class="form-control">
            </div>

        </form>
    </div>
</div>
@endsection

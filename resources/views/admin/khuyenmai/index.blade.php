@extends('admin.template.master')
@section('title')
    Khuyến mãi
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="overview-wrap">
            <h2 class="title-1">Khuyến mãi</h2>
            <a href="{{ route('khuyen-mai.them-khuyen-mai') }}" class="btn btn-secondary mb-1">
                <i class="zmdi zmdi-plus"></i> Tạo khuyến mãi
            </a>
        </div>
    </div>
</div>
<div class="row m-t-25">
    <table class="table table-hover table-light">
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên khuyến mãi</th>
                <th>Ngày áp dụng</th>
                <th>Trạng thái</th>
                <th>Khuyến mãi giảm</th>
                <th>Loại khuyến mãi</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>

            <?php $stt = 1; ?>
            @foreach ($khuyenMai as $item)
                <tr>
                    <td>{{ $stt++ }}</td>
                    <td>{{ $item->km_ten }}</td>
                    <td>{{ $item->km_ngaybatdau }}</td>
                    <td>
                        @if ($item->km_trangthai == 1)
                            <a href="{{ route('khuyen-mai.cap-nhat-trang-thai', ['idKhuyenMai'=>$item->km_id]) }}" class="btn btn-success" title="Chuyển trạng thái">Đang diễn ra</a>
                        @else
                            <a href="{{ route('khuyen-mai.cap-nhat-trang-thai', ['idKhuyenMai'=>$item->km_id]) }}" class="btn btn-danger" title="Chuyển trạng thái">Đã kết thúc</a>
                        @endif
                    </td>
                    <td class="text-center">
                        @if ($item->km_giamphantram)
                            <p>{{ $item->km_giamphantram }}%</p>
                        @endif
                        @if ($item->km_giamgiatien)
                            <p>{{ number_format($item->km_giamgiatien) }} VND</p>
                        @endif
                    </td>
                    <td>
                        {{ $item->lkm_ten }}
                    </td>
                    <td>
                        <a href="#" class="btn btn-primary">Sửa</a>
                        <a href="#" class="btn btn-default">Chi tiết</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

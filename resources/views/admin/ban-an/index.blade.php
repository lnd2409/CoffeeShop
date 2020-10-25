@extends('admin.template.master')
@section('title')
    Bàn ăn
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="overview-wrap">
            <h2 class="title-1">Bàn ăn</h2>
            <button type="button" class="btn btn-secondary mb-1" data-toggle="modal" data-target="#BanAnModal">
                <i class="zmdi zmdi-plus"></i> Thêm bàn
            </button>
        </div>
    </div>
</div>
<div class="row m-t-25">
    @foreach ($banan as $item)
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">Bàn số {{ $item->ba_soban }}
                            @if ($item->ba_trangthai == 0)
                                <span class="badge badge-primary float-right mt-1">Trống</span>
                            @else
                                @if ($item->ba_trangthai == 1)
                                    <span class="badge badge-danger float-right mt-1">Có khách</span>
                                @else
                                    <span class="badge badge-warning float-right mt-1">Có người đặt</span>
                                @endif
                            @endif
                    </strong>
                </div>
                <div class="card-body">
                    <p class="card-text">
                        <a href="{{ route('them-mon-an', ['id'=>$item->ba_id]) }}" class="btn btn-success">Thêm món</a>
                        <a href="" class="btn btn-warning">Đặt bàn</a>
                        <a href="" class="btn btn-primary">Tính tiền</a>
                    </p>
                    <p class="card-text">
                        <hr>
                        <h4 class="text-center">Thông tin </h4>
                        <b>Số ghế:</b> {{ $item->ba_sochongoi }}
                        <br>
                        <b>Loại bàn:</b> {{ $item->lba_ten }}
                        <br>
                        <b>Số khách hiện tại:</b> 10
                        <br>
                        <b>Số món:</b> 10
                        <h5>Tổng tiền: 1.000.000 VNĐ</h5>
                        <a href="#">Chi tiết bàn ăn</a>
                    </p>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection

{{-- CÓ SỬ DỤNG MODAL THÌ NHÉT NÓ SAU ENDSECTION LUÔN -- LỖI LAYOUT --}}
<!-- MODAL BÀN ĂN -->
<div class="modal fade" id="BanAnModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Tạo bàn ăn</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-lg-12">
                    <form action="{{ route('them-ban-an') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                        @csrf
                        <div class="card">
                            <div class="card-body card-block">
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label">Số chỗ ngồi</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="number" id="text-input" required name="sochongoi" placeholder="Nhập số ghế . . ." class="form-control">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="selectSm" class=" form-control-label">Loại bàn ăn</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <select id="SelectLm" name="loaibanan" class="form-control-sm form-control">
                                            @foreach ($loaibanan as $item)
                                                <option value="{{ $item->lba_id }}">{{ $item->lba_ten }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div style="float: right">
                                    <button class="btn btn-md btn-warning" type="reset">Reset</button>
                                    <button class="btn btn-md btn-success" type="submit">Thêm</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END MODAL BÀN ĂN -->

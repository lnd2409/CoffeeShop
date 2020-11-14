@extends('admin.template.master')
@section('title')
    Khuyến mãi
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="overview-wrap">
            <h2 class="title-1">Khuyến mãi</h2>
            <button type="button" class="btn btn-secondary mb-1" data-toggle="modal" data-target="#BanAnModal">
                <i class="zmdi zmdi-plus"></i> Tạo khuyến mãi
            </button>
        </div>
    </div>
</div>
<div class="row m-t-25">

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

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

</div>
@endsection

@extends('client.template.master')
@section('title')
    Trang chủ
@endsection
@section('content')
<div class="page-title-img">
    <img class="img-full" alt="page title img" src="{{asset("client")}}/assets/images/headers/menu.png">
    <div class="page-title">
        <div class="container">
            <h1>Menu</h1>
            <p>Luôn làm hài lòng quý khách</p>
        </div><!-- .container -->
    </div>
</div><!-- .page-title-img -->
<section class="section-gray">
    <div class="container">
        <div class="text-center">
            Phân loại:
            <ul class="list-filter">
                <li><a href="{{ route('thuc-don') }}">Tất cả</a></li>
                @foreach ($nhomMonAn as $item)
                    {{-- <p>{{ 'thuc-don/nhom-mon-an'.'/'.$item->nma_id }}</p> --}}
                    <li><a class="@if (Request::segment(3) == $item->nma_id) active @endif" href="{{ route('thuc-don.theo-loai', ['idCategory'=>$item->nma_id]) }}">{{ $item->nma_ten }}</a></li>
                @endforeach
            </ul>
        </div>

            <div class="border-lines-container">
                <h5 class="border-lines">{{ $nhomMonAnSelected->nma_ten }}</h5>
            </div>
            <div class="row">
                {{-- {{ dd($monAn[$item->nma_id]) }} --}}
                    @foreach ($monAn as $item)
                        <div class="col-md-4">
                            <div class="product-preview">
                                <div class="product-photo">
                                    <div class="product-price">
                                        <sub>{{ number_format($item->ma_gia) }}</sup>
                                    </div>
                                    <img alt="product" src="{{asset("client")}}/assets/images/products/1.png">
                                </div>
                                <h3 class="product-title">
                                    {{ $item->ma_ten }}
                                </h3>
                                <p class="product-info">{{ $item->ma_chuthich }}</p>
                                <a href="#" class="cart-trigger button-clean button-text-small">Đặt ngay</a>
                            </div><!-- .product-preview -->
                        </div><!-- .col-md-4 -->
                    @endforeach
            </div><!-- .row -->
        {{-- <ul class="pagination">
            <li><a href="#"><i class="fa fa-angle-left"></i></a></li>
            <li><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
        </ul> --}}
    </div><!-- .container -->
</section>
@endsection

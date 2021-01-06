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
            <ul class="list-bullets-inline">
                <li><a href="{{ route('thuc-don') }}">Tất cả</a></li>
                @foreach ($nhomMonAn as $item)
                    {{-- <p>{{ 'thuc-don/nhom-mon-an'.'/'.$item->nma_id }}</p> --}}
                    <li><a class="scroll-to @if (Request::segment(3) == $item->nma_id) active @endif" href="{{ route('thuc-don.theo-loai', ['idCategory'=>$item->nma_id]) }}">{{ $item->nma_ten }}</a></li>
                @endforeach
            </ul>
        </div>
        {{-- @foreach ($nhomMonAn as $item)
        <div class="border-lines-container">
            <h5 class="border-lines" id="menu-vegeterian">{{ $item->nma_ten }} </h5>
        </div>
        <div class="row">
            @if ($monAn[$item->nma_id])
                @foreach ($monAn[$item->nma_id] as $item)
                    <div class="col-md-6 product-preview-container">
                        <div class="product-preview-big">
                            <a href="#" class="cart-trigger"><img alt="product photo" src="{{asset("client")}}/assets/images/menu/menu1.jpg"></a>
                            <div class="product-content">
                                <div class="product-content-inner">
                                    <h4 class="product-title"><a href="#" class="cart-trigger">{{ $item->ma_ten }}</a></h4>
                                    <p>{{ $item->ma_chuthich }}</p>
                                    <div class="product-price">
                                        {{ $item->ma_gia }}
                                    </div>
                                </div>
                            </div><!-- .product-content -->
                        </div><!-- .product-preview-big -->
                    </div><!-- .col-md-6 -->
                @endforeach
            @endif
        </div><!-- .row -->
        @endforeach --}}
        <div class="border-lines-container">
            <h5 class="border-lines">{{ $nhomMonAnSelected->nma_ten }}</h5>
        </div>
        <div class="row">
            {{-- {{ dd($monAn[$item->nma_id]) }} --}}
                @foreach ($monAn as $item)
                <div class="col-md-6 product-preview-container">
                    <div class="product-preview-big">
                        <a href="#" class="cart-trigger"><img alt="product photo" src="{{asset("client")}}/assets/images/menu/menu1.jpg"></a>
                        <div class="product-content">
                            <div class="product-content-inner">
                                <h4 class="product-title"><a href="#" class="cart-trigger">{{ $item->ma_ten }}</a></h4>
                                <p>{{ $item->ma_chuthich }}</p>
                                <div class="product-price">
                                    {{ $item->ma_gia }}
                                </div>
                            </div>
                        </div><!-- .product-content -->
                    </div><!-- .product-preview-big -->
                </div><!-- .col-md-6 -->
                @endforeach
        </div><!-- .row -->
    </div><!-- .container -->
</section>
@endsection

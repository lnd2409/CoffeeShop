@extends('client.template.master')
@section('title')
    Trang chủ
@endsection
@section('content')
<div class="page-title-img">
    <img class="img-full" alt="page title img" src="{{asset("client")}}/assets/images/headers/menu.png">
    <div class="page-title">
        <div class="container">
            <h1>
                RedFoods</h1>
            <p>Chất Lượng - An Toàn - Tin Cậy</p>
        </div><!-- .container -->
    </div>
</div><!-- .page-title-img -->

<section class="section-gray">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form method="post" action="{{ route('kh-tim-kiem') }}" id="SearchFood">
                    @csrf
                    <input  style="width:30%" class="form-control" id="NoiDung" type="text" name="NoiDung" placeholder="Nhập từ khóa tìm kiếm...">
                </form>
            </div>
        </div>
        <div class="text-center">
            <ul class="list-bullets-inline">

                <li><a href="{{ route('thuc-don') }}">Tất cả</a></li>
                @foreach ($nhomMonAn as $item)
                    {{-- <p>{{ 'thuc-don/nhom-mon-an'.'/'.$item->nma_id }}</p> --}}
                    <li><a class="scroll-to @if (Request::segment(3) == $item->nma_id) active @endif" href="{{ route('thuc-don.theo-loai', ['idCategory'=>$item->nma_id]) }}">{{ $item->nma_ten }}</a></li>
                @endforeach
            </ul>
        </div>
        @foreach ($nhomMonAn as $item)
        <div class="border-lines-container">
            <h5 class="border-lines" id="menu-vegeterian">{{ $item->nma_ten }} </h5>
        </div>
        <div class="row">
            @if ($monAn[$item->nma_id])
                @foreach ($monAn[$item->nma_id] as $item)
                    <div class="col-md-6 product-preview-container">
                        <div class="product-preview-big">
                            <a href="#" class="cart-trigger"><img style="width:60%" alt="product photo" src="{{asset("upload/mon-an/")}}/{{$item->ma_hinhanh}}"></a>
                            <div class="product-content">
                                <div class="product-content-inner">
                                    <h4 class="product-title"><a href="#" class="cart-trigger">{{ $item->ma_ten }}</a></h4>
                                    <p>{{ $item->ma_chuthich }}</p>
                                    <div class="product-price">
                                        {{ number_format($item->ma_gia)  }} đ
                                    </div>
                                </div>
                            </div><!-- .product-content -->
                        </div><!-- .product-preview-big -->
                    </div><!-- .col-md-6 -->
                @endforeach
            @endif
        </div><!-- .row -->
        @endforeach

        {{-- <div class="row">
            <div class="col-md-6 product-preview-container">
                <div class="product-preview-big">
                    <a href="#" class="cart-trigger"><img alt="product photo" src="assets/images/menu/menu3.jpg"></a>
                    <div class="product-content">
                        <div class="product-content-inner">
                            <h4 class="product-title"><a href="#" class="cart-trigger">Vegetarian Pizza</a></h4>
                            <p>Sugar, sale, dehydrated garlic, black pepper, oregano, dehydrated onion, whole basil, soybean oil.</p>
                            <div class="product-price">
                                Price: $9.00
                            </div>
                        </div>
                    </div><!-- .product-content -->
                </div><!-- .product-preview-big -->
            </div><!-- .col-md-6 -->
            <div class="col-md-6 product-preview-container">
                <div class="product-preview-big">
                    <a href="#" class="cart-trigger"><img alt="product photo" src="assets/images/menu/menu4.jpg"></a>
                    <div class="product-content">
                        <div class="product-content-inner">
                            <h4 class="product-title"><a href="#" class="cart-trigger">Vegetarian Pizza</a></h4>
                            <p>Sugar, sale, dehydrated garlic, black pepper, oregano, dehydrated onion, whole basil, soybean oil.</p>
                            <div class="product-price">
                                Price: $9.00
                            </div>
                        </div>
                    </div><!-- .product-content -->
                </div><!-- .product-preview-big -->
            </div><!-- .col-md-6 -->
        </div><!-- .row -->

        <div class="border-lines-container">
            <h5 class="border-lines">Meat Lovers</h5>
        </div>
        <div class="row">
            <div class="col-md-6 product-preview-container">
                <div class="product-preview-big">
                    <a href="#" class="cart-trigger"><img alt="product photo" src="assets/images/menu/menu5.jpg"></a>
                    <div class="product-content">
                        <div class="product-content-inner">
                            <h4 class="product-title"><a href="#" class="cart-trigger">Vegetarian Pizza</a></h4>
                            <p>Sugar, sale, dehydrated garlic, black pepper, oregano, dehydrated onion, whole basil, soybean oil.</p>
                            <div class="product-price">
                                Price: $9.00
                            </div>
                        </div>
                    </div><!-- .product-content -->
                </div><!-- .product-preview-big -->
            </div><!-- .col-md-6 -->
            <div class="col-md-6 product-preview-container">
                <div class="product-preview-big">
                    <a href="#" class="cart-trigger"><img alt="product photo" src="assets/images/menu/menu6.jpg"></a>
                    <div class="product-content">
                        <div class="product-content-inner">
                            <h4 class="product-title"><a href="#" class="cart-trigger">Vegetarian Pizza</a></h4>
                            <p>Sugar, sale, dehydrated garlic, black pepper, oregano, dehydrated onion, whole basil, soybean oil.</p>
                            <div class="product-price">
                                Price: $9.00
                            </div>
                        </div>
                    </div><!-- .product-content -->
                </div><!-- .product-preview-big -->
            </div><!-- .col-md-6 -->
        </div><!-- .row -->
        <div class="row">
            <div class="col-md-6 product-preview-container">
                <div class="product-preview-big">
                    <a href="#" class="cart-trigger"><img alt="product photo" src="assets/images/menu/menu7.jpg"></a>
                    <div class="product-content">
                        <div class="product-content-inner">
                            <h4 class="product-title"><a href="#" class="cart-trigger">Vegetarian Pizza</a></h4>
                            <p>Sugar, sale, dehydrated garlic, black pepper, oregano, dehydrated onion, whole basil, soybean oil.</p>
                            <div class="product-price">
                                Price: $9.00
                            </div>
                        </div>
                    </div><!-- .product-content -->
                </div><!-- .product-preview-big -->
            </div><!-- .col-md-6 -->
            <div class="col-md-6 product-preview-container">
                <div class="product-preview-big">
                    <a href="#" class="cart-trigger"><img alt="product photo" src="assets/images/menu/menu8.jpg"></a>
                    <div class="product-content">
                        <div class="product-content-inner">
                            <h4 class="product-title"><a href="#" class="cart-trigger">Vegetarian Pizza</a></h4>
                            <p>Sugar, sale, dehydrated garlic, black pepper, oregano, dehydrated onion, whole basil, soybean oil.</p>
                            <div class="product-price">
                                Price: $9.00
                            </div>
                        </div>
                    </div><!-- .product-content -->
                </div><!-- .product-preview-big -->
            </div><!-- .col-md-6 -->
        </div><!-- .row -->

        <div class="border-lines-container">
            <h5 class="border-lines">Cheese Pizza</h5>
        </div>
        <div class="row">
            <div class="col-md-6 product-preview-container">
                <div class="product-preview-big">
                    <a href="#" class="cart-trigger"><img alt="product photo" src="assets/images/menu/menu1.jpg"></a>
                    <div class="product-content">
                        <div class="product-content-inner">
                            <h4 class="product-title"><a href="#" class="cart-trigger">Vegetarian Pizza</a></h4>
                            <p>Sugar, sale, dehydrated garlic, black pepper, oregano, dehydrated onion, whole basil, soybean oil.</p>
                            <div class="product-price">
                                Price: $9.00
                            </div>
                        </div>
                    </div><!-- .product-content -->
                </div><!-- .product-preview-big -->
            </div><!-- .col-md-6 -->
            <div class="col-md-6 product-preview-container">
                <div class="product-preview-big">
                    <a href="#" class="cart-trigger"><img alt="product photo" src="assets/images/menu/menu2.jpg"></a>
                    <div class="product-content">
                        <div class="product-content-inner">
                            <h4 class="product-title"><a href="#" class="cart-trigger">Vegetarian Pizza</a></h4>
                            <p>Sugar, sale, dehydrated garlic, black pepper, oregano, dehydrated onion, whole basil, soybean oil.</p>
                            <div class="product-price">
                                Price: $9.00
                            </div>
                        </div>
                    </div><!-- .product-content -->
                </div><!-- .product-preview-big -->
            </div><!-- .col-md-6 -->
        </div><!-- .row -->
        <div class="row">
            <div class="col-md-6 product-preview-container">
                <div class="product-preview-big">
                    <a href="#" class="cart-trigger"><img alt="product photo" src="assets/images/menu/menu3.jpg"></a>
                    <div class="product-content">
                        <div class="product-content-inner">
                            <h4 class="product-title"><a href="#" class="cart-trigger">Vegetarian Pizza</a></h4>
                            <p>Sugar, sale, dehydrated garlic, black pepper, oregano, dehydrated onion, whole basil, soybean oil.</p>
                            <div class="product-price">
                                Price: $9.00
                            </div>
                        </div>
                    </div><!-- .product-content -->
                </div><!-- .product-preview-big -->
            </div><!-- .col-md-6 -->
            <div class="col-md-6 product-preview-container">
                <div class="product-preview-big">
                    <a href="#" class="cart-trigger"><img alt="product photo" src="assets/images/menu/menu4.jpg"></a>
                    <div class="product-content">
                        <div class="product-content-inner">
                            <h4 class="product-title"><a href="#" class="cart-trigger">Vegetarian Pizza</a></h4>
                            <p>Sugar, sale, dehydrated garlic, black pepper, oregano, dehydrated onion, whole basil, soybean oil.</p>
                            <div class="product-price">
                                Price: $9.00
                            </div>
                        </div>
                    </div><!-- .product-content -->
                </div><!-- .product-preview-big -->
            </div><!-- .col-md-6 -->
        </div><!-- .row -->
        <ul class="pagination">
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
@push('script')
<script>
$('#NoiDung').keypress(function (e) {
  if (e.which == 13) {
    $('form#SearchFood').submit();
    return false;    //<---- Add this line
  }
});
</script>
@endpush

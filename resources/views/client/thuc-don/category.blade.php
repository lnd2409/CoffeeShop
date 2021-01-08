@extends('client.template.master')
@section('title')
    Danh sách món
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
            <div class="row">
                <div class="col-md-3">
                    <form action="{{ route('kh-tim-kiem-gia') }}" method="post" id="ChonGia">
                        @csrf
                        <div class="form-group">
                            <input type="hidden" value="{{ $nhomMonAnSelected->nma_id }}  " name="nma_id">
                            <label for="my-select">Sắp xếp theo giá</label>
                            <select id="my-select-Gia" class="form-control" name="SapXep"  onchange="this.form.submit()">
                                <option disabled selected>--chọn--</option>
                                <option value="0">Gía giảm dần</option>
                                <option value="1">Gía tăng đần</option>
                            </select>
                        </div>
                    </form>
                </div>
            </div>
            {{-- {{ dd($monAn[$item->nma_id]) }} --}}
                @foreach ($monAn as $item)
                <div class="col-md-6 product-preview-container">
                    <div class="product-preview-big">
                        <a href="#" class="cart-trigger"><img alt="product photo" style="width:60%" src="{{asset("upload/mon-an/")}}/{{$item->ma_hinhanh}}"></a>
                        <div class="product-content">
                            <div class="product-content-inner">
                                <h4 class="product-title"><a href="#" class="cart-trigger">{{ $item->ma_ten }}</a></h4>
                                <p>{{ $item->ma_chuthich }}</p>
                                <div class="product-price">
                                    {{ number_format($item->ma_gia)  }} đồng
                                </div>
                            </div>
                        </div><!-- .product-content -->
                    </div><!-- .product-preview-big -->
                </div><!-- .col-md-6 -->
                @endforeach
        </div><!-- .row -->
        <div>  {{$monAn->links()}} </div>
    </div><!-- .container -->
</section>
@endsection
@push('script')
<script>

</script>
@endpush

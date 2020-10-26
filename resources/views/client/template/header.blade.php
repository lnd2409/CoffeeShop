<header class="page-header page-header-normal">
    <div class="page-top">
        <div class="container">
            <div class="row">
                <div class="col-xs-6">
                    <em>Liên hệ: 0 800 - <span class="text-uppercase">Giao hàng tận nơi</span></em>
                </div>
                <div class="col-xs-6 text-right">
                    {{-- Xin chào quý khách,  --}}
                    <a href="{{asset("client")}}/#" class="text-uppercase">Đăng nhập</a> | <a href="{{asset("client")}}/#" class="text-uppercase">Đăng ký</a>
                </div>
            </div>
        </div>
    </div><!-- .page-top -->
    <div id="main-navigation-container">
        <div id="main-navigation-inner">
            <div class="container">
                <div class="relative-container clearfix">
                    <div id="main-navigation-button"><i class="fa fa-reorder"></i></div>
                    <div class="pull-left">
                        <div class="centered-columns">
                            <div class="centered-column">
                                <img class="page-logo" alt="logo" src="{{asset("client")}}/assets/images/logo.png">
                            </div>
                            <div class="centered-column hidden-xs">
                                <h1 class="site-name">ResFoo</h1>
                                <h4 class="site-name-info">Chuỗi nhà hàng - khách sạn</h4>
                            </div>
                        </div>
                    </div>
                    <nav id="main-navigation">
                        <ul id="one-page-nav">
                            <li class="@if (Request::path() == '/')
                                active
                            @endif">
                                <a href="{{ route('trang-chu') }}">Trang chủ</a>
                            </li>
                            <li>
                                <a href="{{asset("client")}}/about.html">Đặt bàn</a>
                            </li>
                            {{-- {{ Request::url() }} --}}
                            <li class="@if (Request::segment(1) == 'thuc-don')
                                active
                            @endif">
                                <a href="{{ route('thuc-don') }}">Thực đơn</a>
                            </li>
                            <li>
                                <a href="{{asset("client")}}/gallery_1.html">Bộ sưu tập ảnh</a>
                            </li>
                            <li>
                                <a href="{{asset("client")}}/blog.html">Tin tức</a>
                            </li>
                            <li>
                                <a href="{{asset("client")}}/contact.html">Liên hệ</a>
                            </li>
                            <li>
                                <div class="menu-item has-small-label cart-trigger">Bàn đã đặt </div>
                            </li>
                        </ul>
                    </nav>
                </div><!-- .relative-container -->
            </div><!-- .container -->
        </div><!-- #main-navigation-inner -->
    </div><!-- #main-navigation-container -->
    <div id="main-navigation-placeholder"></div>
</header>

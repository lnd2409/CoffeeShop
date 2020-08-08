<section>
    <div class="container">
        <div id="product-slider" class="owl-pagination-dash owl-navigation-box">
            <div class="offer">
                <img alt="product" src="{{asset("client")}}/assets/images/slider/1.jpg">
                <div class="offer-price-small">
                    $<span class="offer-price-val1">7</span><span class="offer-price-val2">99</span>
                </div>
                <div class="offer-detail">
                    <div class="offer-detail-inner">
                        <div class="offer-detail-content">
                            <h6>ENVATO PIZZA:</h6>
                            <h3>CHEESE, CRUST, OLIVES</h3>
                            <div class="price-huge clearfix">
                                <div class="pull-left">
                                    <span class="price-currency">$</span><span class="price-val-1">7</span>
                                </div>
                                <div class="pull-left">
                                    <span class="price-val-2">99</span><br>
                                    <a href="{{asset("client")}}/#" class="button-red button-text-big cart-trigger">ORDER NOW</a>
                                </div>
                            </div>
                        </div>
                    </div><!-- .offer-detail-inner -->
                </div><!-- .offer-detail -->
            </div><!-- .offer -->
            <div class="offer">
                <img alt="product" src="{{asset("client")}}/assets/images/slider/2.jpg">
                <div class="offer-price-small">
                    $<span class="offer-price-val1">7</span><span class="offer-price-val2">99</span>
                </div>
                <div class="offer-detail">
                    <div class="offer-detail-inner">
                        <div class="offer-detail-content">
                            <h6>ENVATO PIZZA:</h6>
                            <h3>CHEESE, CRUST, OLIVES</h3>
                            <div class="price-huge clearfix">
                                <div class="pull-left">
                                    <span class="price-currency">$</span><span class="price-val-1">7</span>
                                </div>
                                <div class="pull-left">
                                    <span class="price-val-2">99</span><br>
                                    <a href="{{asset("client")}}/#" class="button-red button-text-big cart-trigger">ORDER NOW</a>
                                </div>
                            </div>
                        </div>
                    </div><!-- .offer-detail-inner -->
                </div><!-- .offer-detail -->
            </div><!-- .offer -->
            <div class="offer">
                <img alt="product" src="{{asset("client")}}/assets/images/slider/3.jpg">
                <div class="offer-price-small">
                    $<span class="offer-price-val1">7</span><span class="offer-price-val2">99</span>
                </div>
                <div class="offer-detail">
                    <div class="offer-detail-inner">
                        <div class="offer-detail-content">
                            <h6>ENVATO PIZZA:</h6>
                            <h3>CHEESE, CRUST, OLIVES</h3>
                            <div class="price-huge clearfix">
                                <div class="pull-left">
                                    <span class="price-currency">$</span><span class="price-val-1">7</span>
                                </div>
                                <div class="pull-left">
                                    <span class="price-val-2">99</span><br>
                                    <a href="{{asset("client")}}/#" class="button-red button-text-big cart-trigger">ORDER NOW</a>
                                </div>
                            </div>
                        </div>
                    </div><!-- .offer-detail-inner -->
                </div><!-- .offer-detail -->
            </div><!-- .offer -->
        </div><!-- #product-slider -->
        @if (Request::url() === 'http://127.0.0.1:8000')
            <div class="row">
                <div class="col-md-6">
                    <a href="{{asset("client")}}/#">
                        <article class="banner">
                            <img alt="banner" src="{{asset("client")}}/assets/images/banners/1.jpg">
                            <div class="banner-over">
                                <div class="centered-columns">
                                    <div class="centered-column">
                                        <div class="banner-1-detail text-center">
                                            Nhà hàng<br>
                                            <strong>Phục vụ các món ăn<br>Á - Âu</strong><br>
                                            <a href="#" class="button-yellow button-text-big">Đặt bàn</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </a>
                </div><!-- .col-md-6 -->
                <div class="col-md-6">
                    <a href="{{asset("client")}}/#">
                        <article class="banner">
                            <img alt="banner" src="{{asset("client")}}/assets/images/banners/2.jpg">
                            <div class="banner-over">
                                <div class="centered-columns">
                                    <div class="centered-column text-center">
                                        Nhà hàng<br>
                                            <strong>Phục vụ các món ăn<br>Á - Âu</strong><br>
                                        <a href="#s" class="button-yellow button-text-big">Đặt phòng</a>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </a>
                </div><!-- .col-md-6 -->
            </div><!-- .row -->
        @else
            {{-- Để trống --}}
        @endif

    </div><!-- .container -->
</section><!-- #section-intro -->

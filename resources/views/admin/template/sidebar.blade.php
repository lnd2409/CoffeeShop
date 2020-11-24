<!-- MENU SIDEBAR-->
<aside class="menu-sidebar d-none d-lg-block">
    <div class="logo">
        <a href="#">
            <img src="{{asset("admin-assets")}}/images/logo.png"/>
            <span>Tâm Food</span>
        </a>
    </div>
    <div class="menu-sidebar__content js-scrollbar1">
        <nav class="navbar-sidebar">
            <ul class="list-unstyled navbar__list">
                <li>
                    <a href="{{ route('trang-chu') }}">
                        <i class="fas fa-home"></i>Trang chủ</a>
                </li>
                {{-- class="active" --}}
                <li class="
                    @if (Route::current()->getName() == 'ban-an')
                        active
                    @else
                    @endif
                ">
                    <a href="{{ route('ban-an') }}" >
                        <i class="fas fa-table"></i>Bàn ăn
                    </a>
                </li>
                <li>
                    <a href="chart.html">
                        <i class="fa fa-sticky-note	"></i>Phiếu đặt bàn</a>
                </li>
                <li>
                    <a href="chart.html">
                        <i class="far fa-sticky-note"></i>
                        Hóa đơn</a>
                </li>
                <li>
                    <a href="chart.html">
                        <i class="fas fa-utensils"></i>Món ăn</a>
                </li>
                <li>
                    <a href="chart.html">
                        <i class="fa fa-newspaper-o"></i>Phiếu mua thực phẩm</a>
                </li>
                <li>
                    <a href="chart.html">
                        <i class="fas fa-user-circle"></i>Nhân viên</a>
                </li>
                <li>
                    <a href="chart.html">
                        <i class="far fa-user-circle"></i>Khách hàng</a>
                </li>
                <li>
                    <a href="{{ route('khuyen-mai') }}">
                        <i class="far fa-user-circle"></i>Khuyến mãi
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
<!-- END MENU SIDEBAR-->

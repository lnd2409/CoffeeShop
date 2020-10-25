<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>@yield('title')</title>

    <!-- Fontfaces CSS-->
    <link href="{{asset("admin-assets")}}/css/font-face.css" rel="stylesheet" media="all">
    <link href="{{asset("admin-assets")}}/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="{{asset("admin-assets")}}/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="{{asset("admin-assets")}}/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="{{asset("admin-assets")}}/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="{{asset("admin-assets")}}/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="{{asset("admin-assets")}}/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="{{asset("admin-assets")}}/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="{{asset("admin-assets")}}/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="{{asset("admin-assets")}}/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="{{asset("admin-assets")}}/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="{{asset("admin-assets")}}/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{asset("admin-assets")}}/css/theme.css" rel="stylesheet" media="all">
    @stack('css')

</head>

<body class="animsition">
    <div class="page-wrapper">
        @include('admin.template.header')

        @include('admin.template.sidebar')

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <form class="form-header" action="" method="POST"></form>
                            <div class="header-button">
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                            <img src="{{asset("admin-assets")}}/images/icon/avatar-01.jpg" alt="John Doe" />
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn" href="#">Ngọc Tâm</a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <a href="#">
                                                        <img src="{{asset("admin-assets")}}/images/icon/avatar-01.jpg" alt="John Doe" />
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#">Ngọc Tâm</a>
                                                    </h5>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__body">
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-account"></i>Tài khoản</a>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__footer">
                                                <a href="{{ route('dang-xuat') }}">
                                                    <i class="zmdi zmdi-power"></i>Đăng xuất</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->
            <!-- MODAL -->
            @include('admin.template.modal')
            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        @yield('content')
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="{{asset("admin-assets")}}/vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="{{asset("admin-assets")}}/vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="{{asset("admin-assets")}}/vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="{{asset("admin-assets")}}/vendor/slick/slick.min.js">
    </script>
    <script src="{{asset("admin-assets")}}/vendor/wow/wow.min.js"></script>
    <script src="{{asset("admin-assets")}}/vendor/animsition/animsition.min.js"></script>
    <script src="{{asset("admin-assets")}}/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="{{asset("admin-assets")}}/vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="{{asset("admin-assets")}}/vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="{{asset("admin-assets")}}/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="{{asset("admin-assets")}}/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="{{asset("admin-assets")}}/vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="{{asset("admin-assets")}}/vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="{{asset("admin-assets")}}/js/main.js"></script>
    @stack('script')
</body>

</html>
<!-- end document-->

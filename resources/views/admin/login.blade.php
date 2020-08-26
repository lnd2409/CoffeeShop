<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Login</title>

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

</head>

<body class="animsition">
    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="#">
                                <img src="{{asset("admin-assets")}}/images/logo.png"/>
                            </a>
                        </div>
                        <div class="login-form">
                            <div class="alert alert-danger" id="error" role="alert">
                                This is a danger alert—check it out!
                            </div>
                            <form action="{{ route('login') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label>Tên đăng nhập</label>
                                    <input class="au-input au-input--full" type="text" name="username" placeholder="nhập tên đăng nhập . . .">
                                </div>
                                <div class="form-group">
                                    <label>Mật khẩu</label>
                                    <input class="au-input au-input--full" type="password" name="password" placeholder="nhập mật khẩu . . .">
                                </div>
                                <div class="login-checkbox">
                                    <label>
                                        <input type="checkbox" name="remember">Nhớ đăng nhập
                                    </label>
                                    <label>
                                        <a href="{{asset("admin-assets")}}/#">Quên mật khẩu ?</a>
                                    </label>
                                </div>
                                <button class="au-btn au-btn--block au-btn--green m-b-20" id="login" type="submit">Đăng nhập</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
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


    <script>
        $(document).ready(function () {
                $('#error').hide();
                $('#login').click(function (e) {
                    e.preventDefault();
                    var username = $("input[name='username']").val();
                    var password = $("input[name='password']").val();
                    $.ajax({
                    type: "POST",
                    url: "{!! route('login') !!}",
                    headers: {
                        'X-CSRF-TOKEN': $('input[name="_token"]').val()
                    },
                    data: {
                        username : username,
                        password : password
                    },
                    success: function (response) {
                        window.location = "{{ route('admin') }}"
                    },
                    error: function(e) {
                        if(username == '' || password == '') {
                            $('#error').text("Tài khoản và mật khẩu không được để trống");
                            $('#error').show();
                        }else{
                            $('#error').text("Sai tên tài khoản hoặc mật khẩu");
                            $('#error').show();
                        }
                    }
                });
            });
        });
    </script>

</body>

</html>
<!-- end document-->

@extends('client.template.master')
@section('title')
    Trang chủ
@endsection
@section('content')
<div class="page-title-img">
    <img class="img-full" alt="page title img" src="{{asset("client")}}/assets/images/headers/contact.png">
    <div class="page-title">
        <div class="container">
            <h1>Đăng nhập</h1>
            <p>Xin chào quý khách hàng</p>
        </div><!-- .container -->
    </div>
</div>
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-uppercase">Xin chào quý khách</h3>
                <form class="form-big" action="{{ route('khach-hang.xu-ly-dang-nhap') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6">
                            <input type="text" name="username" placeholder="Tên đăng nhập . . .">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <input type="password" name="password" placeholder="* * * * * *">
                        </div>
                    </div>
                    <div class="">
                        <button class="button-yellow button-text-low button-long button-low" type="submit">Đăng nhập</button>
                    </div>
                </form>
                <div class="margin-20"></div>
            </div>
        </div>
    </div><!-- .container -->
  </section>
@endsection

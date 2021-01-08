
@extends('client.template.master')
@section('title')
    Liên hệ
@endsection
@section('content')
<div class="page-title-img">
    <img class="img-full" alt="page title img" src="{{asset("client")}}/assets/images/headers/contact.png">
    <div class="page-title">
        <div class="container">
            <h1>Liên hệ</h1>
        </div><!-- .container -->
    </div>
</div>
<section>
    <div class="container">
        <h3 class="text-center text-uppercase">Bản đồ</h3>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3928.841518408644!2d105.76842661474251!3d10.029933692830634!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31a0895a51d60719%3A0x9d76b0035f6d53d0!2zxJDhuqFpIGjhu41jIEPhuqduIFRoxqEgLSBDYW4gdGhvIFVuaXZlcnNpdHk!5e0!3m2!1svi!2s!4v1610094709519!5m2!1svi!2s" width="1150" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        <div class="row">
            <div class="col-md-8">
                <h3 class="text-uppercase">Liên hệ hỗ trợ</h3>
                <form id="form-contact" class="form-big" action="http://ignitionthemes.eu/theme/pizzeria/dark/assets/php/send_email.php" method="post" data-email-not-set-msg="Email is required" data-message-not-set-msg="Message is required" data-name-not-set-msg="Name is required" data-ajax-fail-msg="Request could not be sent, try later" data-success-msg="Email successfully sent.">
                    <div class="row">
                        <div class="col-sm-6">
                            <input type="text" name="name" placeholder="Họ tên">
                        </div>
                        <div class="col-sm-6">
                            <input type="text" name="email" placeholder="Địa chỉ email">
                        </div>
                       </div>
                    <textarea name="message" placeholder="Nội dung"></textarea>
                    <div class="return-msg"></div>
                    <div class="text-right">
                        <input class="button-yellow button-text-low button-long button-low" type="submit" value="Gửi">
                    </div>
                </form>
                <div class="margin-20"></div>
            </div>
            <div class="col-md-4">
                   <h3 class="text-uppercase">Thông tin liên hệ</h3>
                <address class="address-big">
                    <p>
                        NT Office<br>
                        Đại học Cần Thơ<br>
                        Xuân Khánh, Ninh Kiều, Cần Thơ
                    </p>
                    <p>
                        Make Reservations: 000000000<br>
                        Email: info@yourdomain.com
                    </p>
                </address>
            </div>
           </div>
    </div><!-- .container -->
  </section>
@endsection


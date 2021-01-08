@extends('client.template.master')
@section('title')
    Liên hệ
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

<section>
    <div class="container">
        <h3 class="text-center text-uppercase">Find our store near you</h3>
        <div class="map-container">
            <div id="map-canvas">
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <h3 class="text-uppercase">Say Hello!</h3>
                <form id="form-contact" class="form-big" action="http://ignitionthemes.eu/theme/pizzeria/dark/assets/php/send_email.php" method="post" data-email-not-set-msg="Email is required" data-message-not-set-msg="Message is required" data-name-not-set-msg="Name is required" data-ajax-fail-msg="Request could not be sent, try later" data-success-msg="Email successfully sent.">
                    <div class="row">
                        <div class="col-sm-6">
                            <input type="text" name="name" placeholder="Your Name">
                        </div>
                        <div class="col-sm-6">
                            <input type="text" name="email" placeholder="Your Email">
                        </div>
                       </div>
                    <input type="text" name="subject" placeholder="Subject">
                    <textarea name="message" placeholder="Message"></textarea>
                    <div class="return-msg"></div>
                    <div class="text-right">
                        <input class="button-yellow button-text-low button-long button-low" type="submit" value="Submit">
                    </div>
                </form>
                <div class="margin-20"></div>
            </div>
            <div class="col-md-4">
                   <h3 class="text-uppercase">Information</h3>
                <address class="address-big">
                    <p>
                        Pizzeria Head Office<br>
                        54866 2nd Road NY 48766<br>
                        Ney York, U.S.A
                    </p>
                    <p>
                        Make Reservations: 0 800 111 555 666<br>
                        Email: info@yourdomain.com
                    </p>
                </address>
            </div>
           </div>
    </div><!-- .container -->
  </section>
@endsection
@push('script')
<script>

</script>
@endpush

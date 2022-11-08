@extends('clients.barber_shop.layouts.default')
@section('content')
<section id="page-title" class="page-title bg-overlay bg-overlay-dark bg-parallax">
    <div class="bg-section">
        <img src="{{ url_assets('/barber_shop/images/page-titles/1.jpg') }}" alt="Background" />
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="title title-1 text-center">
                    <div class="title--heading">
                        <h1>Контакт</h1>
                    </div>
                    <div class="clearfix"></div>
                    <ol class="breadcrumb">
                        <li><a href="/">Почетна</a></li>
                        <li class="active">Контакт</li>
                    </ol>
                </div>
                <!-- .title end -->
            </div>
            <!-- .col-md-12 end -->
        </div>
        <!-- .row end -->
    </div>
    <!-- .container end -->
</section>
<!-- #page-title end -->

<!-- Contact #1
============================================= -->
<section id="contact1" class="forms">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-xs-12 col-sm-12 col-md-6  pb-50">
                <div class="contact-form">
                    <form class="mb-0" id="contact-form" action="/contact" data-contact-form method="post">
                        <div class="row">
                            <div class="col-md-12">
                                <label>Име <span class="required">*</span></label>
                                <input type="text" class="form-control" name="name" id="name"  required>
                                <label id="namereq" class="hide" style="color: red;font-size: 12px;">*Name is required</label>
                            </div>
                            {{-- <div class="col-md-6">
                                <input type="text" class="form-control" name="namel" id="name"  required>
                            </div> --}}
                            <div class="col-md-12">
                                <label>Е-пошта <span class="required">*</span></label>
                                <input type="email" class="form-control" name="email" id="email"  required>
                                <label id="emailreq" class="hide" style="color: red; font-size: 12px;">*E-mail is required</label>
                            </div>
                            <div class="col-md-12">
                                <label>Телефонски број <span class="required">*</span></label>
                                <input type="text" class="form-control" name="phone" id="phone"  required>
                                <label id="phonereq" class="hide" style="color: red; font-size: 12px;">*Phone is required</label>
                            </div>
                            <div class="col-md-12">
                                <label>Вашата порака</label>
                                <textarea class="form-control" name="message" id="message" rows="3"  required></textarea>
                                <h3 id="success-label" class="hide">Вашата порака е успешно пратена</h3>
                            </div>
                            <div class="col-md-12">
                                <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                                <button type="submit" value="submit" id="submit" data-contact-message-send class="btn btn--secondary btn--rounded btn--block" name="submit">Испрати</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-6 col-xs-12 offset-lg-1 col-md-12 order-1 order-lg-2">
                <div class="contact-page-side-content">
                    <h3 class="contact-page-title">Контактирајте нè</h3>
                    <p class="contact-page-message">За повеќе информации контактирајте нè на дадените телефонски броеви или е-пошта, или оставете податоци на формата
                            и нашиот тим ќе ве контактира наскоро.
                    </p>
                    <div class="single-contact-block">
                        <h4><i class="fa fa-fax"></i> Адреса</h4>
                        <p>123 Main Street, Anytown, CA 12345 – USA</p>
                    </div>
                    <div class="single-contact-block">
                        <h4><i class="fa fa-phone"></i> Телефонски број</h4>
                        <p>Mobile: (08) 123 456 789</p>
                        <p>Hotline: 1009 678 456</p>
                    </div>
                    <div class="single-contact-block last-child">
                        <h4><i class="fa fa-envelope"></i> Е-пошта</h4>
                        <p>yourmail@domain.com</p>
                        <p>support@hastech.company</p>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-md-12">
                <div id="google-map">
                        <div style="width: 100%"><iframe width="100%" height="400" src="https://maps.google.com/maps?width=100%&amp;height=400&amp;hl=en&amp;coord=42.0016663,-21.4140375&amp;q=Blagoj%20Davkov%201+(Genera%20Development)&amp;ie=UTF8&amp;t=&amp;z=14&amp;iwloc=B&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"><a href="https://www.maps.ie/map-my-route/">Create a route on google maps</a></iframe></div><br />
                </div>
        </div>
            <!-- .col-md-6 end -->
        </div>
    </div>
</section>

<script src="{{ url_assets('/accessories/js/vendor/jquery-1.12.4.min.js')}}"></script>
<script>
        $(document).ready(function(){
            $('#submit').click(function(){
                event.preventDefault();
                $.ajax({
                    url:'/contact',
                    type:'POST',
                    data:$('#contact-form').serialize(),
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success:function(data){
                        $('#success-label').removeClass('hide');
                        $('#success-label').addClass('show');

                        setTimeout(function(){
                            $('#success-label').removeClass('show');
                            $('#success-label').addClass('hide');
                        },5000)
                    },

                    error:function(data){
                        var name=$('#name').val();
                        var email=$('#email').val();
                        var phone=$('#phone').val();

                        if(name.length=='0'){
                            $('#namereq').removeClass('hide');
                            $('#namereq').addClass('show');
                            $('#name').addClass('invalid');
                        }

                        if(email.length=='0'){
                            $('#emailreq').removeClass('hide');
                            $('#emailreq').addClass('show');
                            $('#email').addClass('invalid');
                        }

                        if(phone.length=='0'){
                            $('#phonereq').removeClass('hide');
                            $('#phonereq').addClass('show');
                            $('#phone').addClass('invalid');
                        }
                       
                    }
                })
            });

            
                    $("#name").keypress(function(e){
                            $(this).removeClass('invalid')
                            $(this).addClass('valid')
                            $('#namereq').addClass('hide');
                            $('#namereq').removeClass('show');
                    });

                    $("#email").keypress(function(e){
                            $(this).removeClass('invalid')
                            $(this).addClass('valid')
                            $('#emailreq').addClass('hide');
                            $('#emailreq').removeClass('show');
                    });

                    $("#phone").keypress(function(e){
                            $(this).removeClass('invalid')
                            $(this).addClass('valid')
                            $('#phonereq').addClass('hide');
                            $('#phonereq').removeClass('show');
                    });
        })
</script>
@stop
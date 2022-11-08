@extends('clients.clothes.layouts.default')
@section('content')
<style>
    .pb-30{
        padding-bottom: 30px !important;
    }
</style>
<div class="contact-content">
        <div id="google-map" class=" pb-30">
                <div style="width: 100%"><iframe width="100%" height="400" src="https://maps.google.com/maps?width=100%&amp;height=400&amp;hl=en&amp;coord=42.0016663,-21.4140375&amp;q=Blagoj%20Davkov%201+(Genera%20Development)&amp;ie=UTF8&amp;t=&amp;z=14&amp;iwloc=B&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"><a href="https://www.maps.ie/map-my-route/">Create a route on google maps</a></iframe></div><br />
        </div>
            <div class="container">
                <h3>КОНТАКТИРАЈТЕ НÈ</h3>
                <p>За повеќе информации контактирајте нè на дадените телефонски броеви или е-пошта, или оставете податоци на формата
                        и нашиот тим ќе ве контактира наскоро.</p>
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <form  id="contact-form" action="/contact" data-contact-form method="post">
                            <label for="name">Име*</label>
                            <input class="input-form" type="text" name="name" id="name" />
                            <label id="namereq" class="hide" style="color: red;font-size: 12px;">*Name is required</label>

                            <label for="email">Е-пошта*</label>
                            <input class="input-form" type="email" name="email" id="email" />
                            <label id="emailreq" class="hide" style="color: red; font-size: 12px;">*E-mail is required</label>

                            <label for="phone">Телефонски број*</label>
                            <input class="input-form" type="text" name="phone" id="phone" />
                            <label id="phonereq" class="hide" style="color: red; font-size: 12px;">*Phone is required</label>

                            <label for="message">Порака</label>
                            <textarea class="textarea-form" name="message" id="message"></textarea>
                            <h3 id="success-label" class="hide">Вашата порака е успешно пратена</h3>
                            <input type="hidden" name="_token" value="{!! csrf_token() !!}">                                
                            <button class="submit-btn" type="submit"  value="submit" id="submit" data-contact-message-send name="submit">Send</button>
                        </form>
                        <div class="form-note"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.contact-content -->
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
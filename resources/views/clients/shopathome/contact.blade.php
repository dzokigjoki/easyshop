@extends('clients.shopathome.layouts.default')
@section('content')

<style>
.button-color{
    background-color: #62BDAB !important; 
    border-color: #62BDAB !important;
}



.icons-style{
    color: #62BDAB;
    font-size: 20px;
    padding-right: 10px;
}
.font-14{
    font-size:14px;
}
.font-16{
    font-size: 16px;
}

.ml-30{
    margin-left: 30px;
}

.ml-22{
    margin-left: 22px;
}

.breadcrumb-color{
   color: #62BDAB !important;
}
</style>
<div id="content">
    <div class="product-page container container-mobile">
<div class="breadcrumb">
        <div class="container">
            <ul class="breadcrumb ">
                <li><a href="{{route('home')}}" class="breadcrumb-color">Дома</a></li>
                <li class="active breadcrumb-color">Контакт</li>
            </ul>
            {{-- <span>{!! $category->description !!}</span> --}}
            <div style="text-align: center;" class="middle-single">
                <h1>контактирајте нè</h1>
                <div class="clear"></div>
            </div>
        </div>
</div>
    <div class="container">
            <h2 style="text-align: center;">За повеќе информации пополнете ја формата</h2>

        <div class="col-md-6">
            <label  id="success-label">{{session('success')}}</label>
                {{-- <h3 style="color:#62BDAB;" class="success-message" id="success-label">{{session('success')}}</h3> --}}
            <form action="/contact" data-contact-form method="post"  id="contact-form">
                <br>
                <div class="col-md-12">
                    <div class="form-group col-md-12">
                        <label for="name">Име*</label>
                        <input type="text" class="form-control" id="name" placeholder="Внесете име..." name="name">
                        <label id="namereq" class="hide" style="color: red;font-size: 12px;">*Name is required</label>
                    </div>
                    {{-- <div class="form-group col-md-12">
                        <label for="pwd">Презиме*</label>
                        <input type="password" class="form-control" id="pwd" placeholder="Внесете презиме..." name="pwd" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAACIUlEQVQ4EX2TOYhTURSG87IMihDsjGghBhFBmHFDHLWwSqcikk4RRKJgk0KL7C8bMpWpZtIqNkEUl1ZCgs0wOo0SxiLMDApWlgOPrH7/5b2QkYwX7jvn/uc//zl3edZ4PPbNGvF4fC4ajR5VrNvt/mo0Gr1ZPOtfgWw2e9Lv9+chX7cs64CS4Oxg3o9GI7tUKv0Q5o1dAiTfCgQCLwnOkfQOu+oSLyJ2A783HA7vIPLGxX0TgVwud4HKn0nc7Pf7N6vV6oZHkkX8FPG3uMfgXC0Wi2vCg/poUKGGcagQI3k7k8mcp5slcGswGDwpl8tfwGJg3xB6Dvey8vz6oH4C3iXcFYjbwiDeo1KafafkC3NjK7iL5ESFGQEUF7Sg+ifZdDp9GnMF/KGmfBdT2HCwZ7TwtrBPC7rQaav6Iv48rqZwg+F+p8hOMBj0IbxfMdMBrW5pAVGV/ztINByENkU0t5BIJEKRSOQ3Aj+Z57iFs1R5NK3EQS6HQqF1zmQdzpFWq3W42WwOTAf1er1PF2USFlC+qxMvFAr3HcexWX+QX6lUvsKpkTyPSEXJkw6MQ4S38Ljdbi8rmM/nY+CvgNcQqdH6U/xrYK9t244jZv6ByUOSiDdIfgBZ12U6dHEHu9TpdIr8F0OP692CtzaW/a6y3y0Wx5kbFHvGuXzkgf0xhKnPzA4UTyaTB8Ph8AvcHi3fnsrZ7Wore02YViqVOrRXXPhfqP8j6MYlawoAAAAASUVORK5CYII=&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%;">
                    </div> --}}
                </div>
                <div class="col-md-12">
                    <div class="form-group col-md-12">
                        <label for="email">Е-пошта*</label>
                        <input type="email" class="form-control" id="email" placeholder="Внесете Е-пошта..." name="email">
                        <label id="emailreq" class="hide" style="color: red; font-size: 12px;">*E-mail is required</label>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="phone">Телефонски број*</label>
                        <input type="phone" class="form-control" id="phone" placeholder="Внесете телефонски број..." name="phone" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAACIUlEQVQ4EX2TOYhTURSG87IMihDsjGghBhFBmHFDHLWwSqcikk4RRKJgk0KL7C8bMpWpZtIqNkEUl1ZCgs0wOo0SxiLMDApWlgOPrH7/5b2QkYwX7jvn/uc//zl3edZ4PPbNGvF4fC4ajR5VrNvt/mo0Gr1ZPOtfgWw2e9Lv9+chX7cs64CS4Oxg3o9GI7tUKv0Q5o1dAiTfCgQCLwnOkfQOu+oSLyJ2A783HA7vIPLGxX0TgVwud4HKn0nc7Pf7N6vV6oZHkkX8FPG3uMfgXC0Wi2vCg/poUKGGcagQI3k7k8mcp5slcGswGDwpl8tfwGJg3xB6Dvey8vz6oH4C3iXcFYjbwiDeo1KafafkC3NjK7iL5ESFGQEUF7Sg+ifZdDp9GnMF/KGmfBdT2HCwZ7TwtrBPC7rQaav6Iv48rqZwg+F+p8hOMBj0IbxfMdMBrW5pAVGV/ztINByENkU0t5BIJEKRSOQ3Aj+Z57iFs1R5NK3EQS6HQqF1zmQdzpFWq3W42WwOTAf1er1PF2USFlC+qxMvFAr3HcexWX+QX6lUvsKpkTyPSEXJkw6MQ4S38Ljdbi8rmM/nY+CvgNcQqdH6U/xrYK9t244jZv6ByUOSiDdIfgBZ12U6dHEHu9TpdIr8F0OP692CtzaW/a6y3y0Wx5kbFHvGuXzkgf0xhKnPzA4UTyaTB8Ph8AvcHi3fnsrZ7Wore02YViqVOrRXXPhfqP8j6MYlawoAAAAASUVORK5CYII=&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%;">
                        <label id="phonereq" class="hide" style="color: red; font-size: 12px;">*Phone is required</label>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group col-md-12">
                        <label for="txt">Порака*</label>
                        <textarea style="height:150px;" class="form-control" id="message" placeholder="Внесете порака..." name="message"></textarea>
                        <h3 id="success-label1" class="hide">Вашата порака е успешно пратена</h3>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group col-md-12">
                        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                        <button  id="submit" data-contact-message-send type="submit" class="btn btn-success button-color" value="Send">Испрати
                            порака
                        </button>
                    </div>
                </div>
                <br><br>
            </form>
        </div>
        <div class="col-md-6">
            <div class="text pt-43 center-ipad">
                    {{-- <h2>Контакт информации</h2> --}}
                    <ul>
                        <i class="fa fa-map-marker icons-style"></i><label class="font-16">Адреса</label>
                        <p class="font-14 ml-22" >Исаија Мажовски бр. 31/1 приземје - локал 1 Ѓорче Петров, Скопје</p><br>
                        <i class="fa fa-phone icons-style"></i><label class="font-16">Телефон</label>
                        <p class="font-14 ml-30"><a href="tel+38979279180" style=" color: #333;">+389 79 279 180</a></p>
                        <p class="font-14 ml-30"><a href="tel+38972320071" style=" color: #333;">+389 72 320 071</a></p><br> 
                        <i class="fa fa-envelope icons-style"></i><label class="font-16">Е-пошта</label>
                        <p class="font-14 ml-30"><a href="mailto: info@kinderlend.mk" style=" color: #333;"> info@kinderlend.mk</a></p><br> 
                        <p></p>                      
                    </ul>
                </div>
        </div>
        <div class="col-md-12" style="padding-bottom: 30px;">
            <div style="width: 100%"><iframe width="100%" height="600" src="https://maps.google.com/maps?width=100%&amp;height=600&amp;hl=en&amp;coord=42.0032079,-21.3710188&amp;q=Isaija%20Mazhovski%20br.%2031+(Shop%20%40%20Home)&amp;ie=UTF8&amp;t=&amp;z=14&amp;iwloc=B&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"><a href="https://www.maps.ie/map-my-route/">Map a route</a></iframe></div><br />
        </div>
    </div>
</div>
</div>
<script type="text/javascript" src="{{ url_assets('/shopathome/js/jquery.min.js') }}"></script>

<script>
        $(document).ready(function() {
            $("#submit").click(function(){
                event.preventDefault();
                $.ajax({
                    url: '/contact',
                    type: 'post',
                    data: $('#contact-form').serialize(),
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (data) {
                        $('#success-label1').removeClass('hide');
                        $('#success-label1').addClass('show');
                     
                        setTimeout(function() {
                            $("#success-label1").removeClass("show");
                            $("#success-label1").addClass('hide');
                            
                        }, 5000)
                       
                    },
                    error: function(data){
                        var name=$('#name').val();
                        var email=$('#email').val();
                        var phone=$('#phone').val();


                        if(name.length == '0'){
                            $('#namereq').removeClass('hide');
                            $('#namereq').addClass('show');
                            $('#name').addClass("invalid");
                        }

                        if(email.length=='0'){
                            $('#emailreq').removeClass('hide');
                            $("#emailreq").addClass('show');
                            $('#email').addClass("invalid");
                        }
                        
                      
                        if(phone.length=='0'){
                            $('#phonereq').removeClass('hide');
                            $('#phonereq').addClass('show');
                            $('#phone').addClass("invalid");
                        }

                        
                        // $("#error-label").show();
                        // setTimeout(function() {
                        //     $("#error-label").hide();
                        // }, 5000)
                    },
                });
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
        });
    </script>

@endsection
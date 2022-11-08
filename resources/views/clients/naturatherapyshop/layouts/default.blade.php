<!doctype html>
<html lang="en-US">

<head>
    @include('clients._partials.meta')
    <meta name="facebook-domain-verification" content="tzqtn8ibtxf0iaqwsfsp4f2hi7hrit" />
    @include('clients._partials.favicon')
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700%7COpen+Sans:400,400i,600,700'
        rel='stylesheet'>
    <link rel="stylesheet" href="{{ url_assets('/naturatherapyshop/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ url_assets('/naturatherapyshop/css/magnific-popup.css') }}" />
    <link rel="stylesheet" href="{{ url_assets('/naturatherapyshop/css/font-icons.css') }}" />
    <link rel="stylesheet" href="{{ url_assets('/naturatherapyshop/css/sliders.css') }}" />
    <link rel="stylesheet" href="{{ url_assets('/naturatherapyshop/plugins/slick/slick.css') }}" />
    <link rel="stylesheet" href="{{ url_assets('/naturatherapyshop/plugins/slick/slick-theme.css') }}" />
    <link rel="stylesheet" href="{{ url_assets('/naturatherapyshop/css/spinit.css') }}" />
    <link rel="stylesheet" href="{{ url_assets('/naturatherapyshop/css/style.css?v=30') }}" />

    @include('clients._partials.global-styles')
    <style>
        @media(max-width: 991px) {
            .text-center-xs {
                text-align: center !important;
            }
        }

        .custom-input {
            display: block !important;
            width: 100% !important;
            height: 34px !important;
            padding: 6px 12px !important;
            font-size: 14px !important;
            line-height: 1.42857143 !important;
            color: #555 !important;
            background-color: #fff !important;
            background-image: none !important;
            border: 1px solid #ccc !important;
            border-radius: 4px !important;
            margin: 10px 0 !important;
        }

        .slick-dots {
            position: unset;
        }

        .white-border {
            border-bottom: 1px solid #fff !important;
        }

        .red {
            color: #ff8080 !important;
        }

        .custom-arrow {
            display: flex;
            align-items: center;
            justify-content: center;
            position: absolute;
            right: 47%;
            font-size: 50px !important;
            top: 5%;
            z-index: 9999;
        }

        .spin-container .spinit {
            background-repeat: no-repeat;
            background-size: 599px;
            background-position: center;
            height: 500px;
            width: 600px;
            /* margin: 80px auto; */
        }

        @media(max-width: 600px) {
            .spin-container .spinit {
                background-size: contain;
                height: 239px !important;
            }

            .custom-arrow {
                top: 40px !important;
                margin: 0 -12px !important;
            }
        }

        .white {
            color: #fff !important;
        }

        .amount {
            font-size: 20px !important;
        }

    </style>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-153141307-1"></script>
<script>
 window.dataLayer = window.dataLayer || [];
 function gtag(){dataLayer.push(arguments);}
 gtag('js', new Date());
 gtag('config', 'UA-153141307-1');
</script>

<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-PT5968X');</script>
<!-- End Google Tag Manager -->

    @section('style')
    @show
    @include('clients._partials.pixel-init')
    @include('clients._partials.global-styles')
</head>
@include('clients._partials.pixel-events')
<body>
    <div id="alertCookiePolicy" class="alert-cookie-policy">
        <div class="alerto alert-secondary mb-0 d-flex align-items-center" role="alert">
            <div class="row">
                <div class="col-sm-12 cookieInfo">
                    <span class="mr-auto">Веб страната на Natura Therapy користи колачиња за да се осигура дека ќе го
                        добиете
                        најдоброто искуство на нашата веб страна. Прочитајте ја нашата политика на колачиња на следниот
                        <a href="/politika-na-kolacinja" class="alert-link cookieLink">линк</a>.</span>
                </div>
                <div class="col-sm-12 button-cookie">
                    <button id="btnAcceptCookiePolicy" data-dismiss="alert"
                        type="button" aria-label="Close">Се согласувам</button>
                    <button id="btnDeclineCookiePolicy" data-dismiss="alert"
                        type="button" aria-label="Close">Не се согласувам</button>
                </div>
            </div>
        </div>
    </div>
    <main class="main-wrapper">
        @include('clients.naturatherapyshop.partials.header')
        @yield('content')
        <div id="back-to-top">
            <a href="#top"><i class="fa fa-angle-up"></i></a>
        </div>
        <div id="loyFloatWrap">
            <div id="floatLoyBlock" class="cls_LoyWidget" active="false" data-vaucheri="">
                <div class="cls_loyWidget_header @if (auth()->check()) member  @else guest @endif">
                    @if (auth()->check())
                        <div class="cls_loyWidget_header_TXT">
                            <div class="cls_title_h4">Здраво</div>
                            <div id="loyalty_user_name" class="cls_title_h3">{{auth()->user()->first_name}} {{auth()->user()->last_name}}</div>
                        </div>
                        <div class="cls_loyWidget_header_POINTS">
                            <div class="cls_closeLoy">
                                <i class="fa fa-times" aria-hidden="true"></i>
                            </div>
                            <div>
                                <span id="loyalty_points" class="cls_loyWidget_header_pointsAmount">
                                    {{auth()->user()->points}}
                                </span>
                                <span class="cls_loyWidget_header_PointsLabel">
                                    Поени
                                </span>
                            </div>
                        </div>
                    @else
                    <div class="row">
                        <div class="col-xs-12">
                            <h4 class="widget_header_loggedout" style="color: white">Натура терапи лојалти</h4>
                        </div>
                    </div>
                    @endif
                </div>
                <div class="cls_loyWidget_body custom-scrollbar">
                    <div class="cls_loyWidget_body_content">
                        @if(auth()->check())
                        <div class="cls_loyWidget_body_block">
                            <div class="cls_title_h4">
                                <a href="/c/20/lojalti-produkti">Лојалти продукти</a>   
                            </div>
                        </div>
                        @endif
                        <div id="loy_info">
                            <div class="cls_loyWidget_body_block">
                                <div class="cls_title_h4">
                                   Како до подароци
                                </div>
                                <hr class="cls_hr">
                                <div class="cls_loyWidget_body_block_introTXT">
                                    Што повеќе купуваш, повеќе добиваш.
                                </div>
                                <div class="cls_accRowWrap">
                                    <div class="cls_accRow_Title accordTitle">
                                        Како да станеш дел од програмата ?
                                        <i class="fa fa-angle-down"></i>
                                    </div>
                                    <div class="cls_accRow_Content">
                                        Со купување на производ, во било кој продажен центар на Натура Терапи низ целата држава, 
                                        или преку центарот за грижа на корисници, 
                                        ќе добиете Ваша Картичка за лојалност со единствен број и ќе освоите поени за направената нарачка.<br><br>
                                        Доколку немате Картичка за лојалност, а направите он-лајн купување преку веб страната или социјалните мрежи, 
                                        самиот систем ќе Ви додели број на картичка со автоматски внесени освоени поени.
                                    </div>
                                </div>
                                <div class="cls_accRowWrap">
                                    <div class="cls_accRow_Title accordTitle ">
                                        Што добиваш ?
                                        <i class="fa fa-angle-down"></i>
                                    </div>
                                    <div class="cls_accRow_Content">
                                        Со собраните поени, како член на Програмата за лојалност на компанијата, 
                                        имате единствена можност да освоите подарок по желба, 
                                        од листата на подароци која може да ја погледнете овде <a href="/c/20/lojalti-produkti">Лојалти продукти</a>.<br><br> 
                                        Освојте подарок уште со првата нарачка или собирајте поени за вашиот омилен производ!
                                    </div>
                                </div>
                                <div class="cls_accRowWrap">
                                    <div class="cls_accRow_Title accordTitle ">
                                        Како до поени ?
                                        <i class="fa fa-angle-down"></i>
                                    </div>
                                    <div id="lvlLineOne" class="cls_accRow_Content" conn="lvl_2">
                                        Со секое наредно купување, за секој купен единечен производ или сет производи, преку продажните центри, 
                                        центарот за грижа или он-лајн медиумите Вие освојувате поени.<br><br>
                                        Најавете се на веб страната и во секое време следете ја состојбата со поените и нивната вредност во понудената листа на подароци.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="cls_loyWidget_footer">
                    @if (auth()->check())
                        <a class="cls_loyLnk_footer trans" href="/profile" title="Moj nalog">Профил</a>
                        <a class="cls_loyLnk_footer trans" href="/logout">Одјава</a>
                    @else
                        <a class="cls_loyLnk_footer trans" href="/login" title="Prijava">Prijava / Registracija</a>
                    @endif
                </div>
            </div>
            <div id="loyBTN" class="cls_loyBTN trans" @if (!auth()->check()) name="Animate" @else name="NoAnimate" @endif>
                <div class="cls_loyBTNtxt">
                    Loyalty <div style="display: inline-block; right: 0"><i
                        id="Loader"></i></div></div>
            </div>
        </div>
        @include('clients.naturatherapyshop.partials.footer')
    </main>
    <script src="https://use.fontawesome.com/62d595ebca.js"></script>
    <script type="text/javascript" src="{{ url_assets('/naturatherapyshop/js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ url_assets('/naturatherapyshop/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ url_assets('/naturatherapyshop/js/plugins.js') }}"></script>
    <script type="text/javascript" src="{{ url_assets('/naturatherapyshop/js/scripts.js?v=3') }}"></script>
    <script type="text/javascript" src="{{ url_assets('/naturatherapyshop/js/jquery.lazyload.min.js') }}"></script>
    <script type="text/javascript" src="{{ url_assets('/naturatherapyshop/plugins/slick/slick.min.js') }}"></script>
    <script type="text/javascript" src="{{ url_assets('/naturatherapyshop/js/wheel-of-fortune/spinit.js') }}">
    </script>
    <script type="text/javascript" src="{{ url_assets('/naturatherapyshop/js/wheel-of-fortune/transit.js') }}">
    </script>

    @yield('scripts')
    @include('clients._partials.es-object')
    @include('clients._partials.global-scripts')

    <script>
        function myFunction(element) {
            var range, selection, worked;

            if (document.body.createTextRange) {
                range = document.body.createTextRange();
                range.moveToElementText(element);
                range.select();
            } else if (window.getSelection) {
                selection = window.getSelection();
                range = document.createRange();
                range.selectNodeContents(element);
                selection.removeAllRanges();
                selection.addRange(range);
            }

            try {
                document.execCommand('copy');
                alert('Кодот успешно копиран!');
            } catch (err) {}
        }

        $(document).ready(function() {
            if ($(window).width() > 990) {
                $(".dropdown-title").attr("href", "/c/17/site-proizvodi");
            }

            $('.modal').modal('toggle');
            $('img.lazy').lazyload({
                effect: "fadeIn"
            });
            $(".widget_switch").click(function() {
                if ($(this).children(".fa").hasClass('fa-chevron-right')) {
                    $(this).children(".fa").removeClass('fa-chevron-right');
                    $(this).children(".fa").addClass('fa-chevron-down');
                    $(this).siblings("ul").fadeTo("slow", 1);
                } else {
                    $(this).children(".fa").removeClass('fa-chevron-down');
                    $(this).children(".fa").addClass('fa-chevron-right');
                    $(this).siblings("ul").fadeOut("fast", 0);
                }

            })
            $("#spinneratlas").spinit({
                startDegree: 0,
                clockwise: true,
                startDegree: 0,
                turn: 7,
                radius: 20, // To avoid the flapper too near on the line
                duration: 6000, // Define animation timing in mileseconds
                transition: 'cubic-bezier(.25,0,.17,1)', // Default transition	
            });


            $(".qodef-woo-product-inner").mouseover(function() {
                $(this).children(".product-img").children(".product-actions").css("opacity", "1");
            });
            $(".qodef-woo-product-inner").mouseout(function() {
                $(this).children(".product-img").children(".product-actions").css("opacity", "0");
            });


            var canSpin = false;
            $('#spinFail').hide();
            $("#afterSpinHeading").hide();
            $("#afterSpinContent").hide();
            $("#afterSpinButton").hide();

            $("#email").on('change', function() {
                if ($("#email").val() != "" && validateEmail($("#email").val())) {
                    canSpin = true;
                } else {
                    canSpin = false;
                }
            })

            $('#modal').on('hidden.bs.modal', function() {
                $.ajax({
                    type: 'get',
                    url: "{{ route('coupon.wheel-set-cookie') }}",
                });
            })

            $(document).on("click", "#spinWheel", function() {
                if (!!canSpin) {
                    $('#spinFail').hide();
                    $("#email").attr('disabled', true);
                    $("#spinWheel").attr('disabled', true);
                    var items = Array("20", "30", "10", "10", "40", "20", "5", "5", "5");
                    var item = items[Math.floor(Math.random() * items.length)];
                    var email = $("#email").val();
                    $.ajax({
                            type: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                            },
                            url: '/newsletter/subscribe',
                            data: {
                                email: email,
                            }
                        }).success(function(response) {
                            $("#spinneratlas").spinit("spin", item, function() {
                                $.ajax({
                                    method: "POST",
                                    url: "{{ route('coupon.wheel-of-fortune.generate') }}",
                                    data: {
                                        discountPercentage: item,
                                        ajax: "true"
                                    }
                                }).done(function(data) {
                                    $("#email").attr('disabled', false);
                                    $("#spinWheel").attr('disabled', false);
                                    $("#beforeSpinHeading").hide();
                                    $("#beforeSpinContent").hide();
                                    $("#discountValue").text(item + "% Попуст!");
                                    $("#promo_code").text(data.promo_code);
                                    $("#afterSpinHeading").show();
                                    $("#afterSpinContent").show();
                                    $("#afterSpinButton").show();
                                });
                            });
                        })
                        .fail(function(jqXHR, textStatus) {
                            var error = '';
                            try {
                                error = jqXHR.responseJSON.error;
                            } catch (e) {}
                            $('[data-newsletter-placeholder]').show();
                            $('[data-newsletter-placeholder]').html(error);
                        })
                } else {
                    $('#spinFail').show();
                }
            });
            $("#afterSpinButton").on('click', function() {
                $('#modal').modal('toggle');
            })
        });

        function validateEmail(email) {
            const re =
                /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return re.test(String(email).toLowerCase());
        }

    </script>
    <script>
        $(document).ready(function(){
            function cookiesPolicyPrompt() {
                if (!getCookie('cookies')) {
                    $("#alertCookiePolicy").show();
                }
                var daysForCookies = 365;
                $('#btnAcceptCookiePolicy').on('click', function() {
                    $("#alertCookiePolicy").hide("slow");
                    setCookie('cookies', '1', daysForCookies)
                });
                $('#btnDeclineCookiePolicy').on('click', function() {
                    $("#alertCookiePolicy").hide("slow");
                    setCookie('cookies', '1', daysForCookies)
                });
            }
    
            $(document).ready(function() {
                cookiesPolicyPrompt();
            });
    
            function setCookie(name,value,days) {
                if (days) {
                    var date = new Date();
                    date.setTime(date.getTime()+(days * 24 * 60 * 60 * 1000));
                    var expires = "; expires="+date.toGMTString();
                }
                else var expires = "";
                document.cookie = name+"="+value+expires+"; path=/";
            }

            function getCookie(name) {
                var nameEQ = name + "=";
                var ca = document.cookie.split(';');
                for(var i=0;i < ca.length;i++) {
                    var c = ca[i];
                    while (c.charAt(0)==' ') c = c.substring(1,c.length);
                    if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
                }
                return null;
            }

            function eraseCookie(name) {
                createCookie(name,"",-1);
            }
        });
    </script>
</body>

</html>

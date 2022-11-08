<!DOCTYPE html>
<html lang="en">

<head>
    @include('clients._partials.meta')
    <!-- set the encoding of your site -->
    <meta charset="utf-8">
    <!-- set the Compatible of your site -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- set the page title -->
    <title>E-makeup</title>
    <!-- include the site Google Fonts stylesheet -->
    <link
        href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700%7CRoboto:300,400,500,700,900&display=swap"
        rel="stylesheet">
    <!-- include the site bootstrap stylesheet -->
    <link rel="stylesheet" href="{{ url_assets('/e-commerce/css/bootstrap.css') }}" />
    <!-- include the site fontawesome stylesheet -->
    <link rel="stylesheet" href="{{ url_assets('/e-commerce/css/fontawesome.css') }}" />
    <link rel="stylesheet" href="{{ url_assets('/e-commerce/font/flaticon.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- include the site stylesheet -->
    <link rel="stylesheet" href="{{ url_assets('/e-commerce/css/style.css') }}" />
    <!-- include theme plugins setting stylesheet -->
    <link rel="stylesheet" href="{{ url_assets('/e-commerce/css/plugins.css') }}" />
    <!-- include theme color setting stylesheet -->
    <link rel="stylesheet" href="{{ url_assets('/e-commerce/css/color.css') }}" />
    <!-- include theme responsive setting stylesheet -->
    <link rel="stylesheet" href="{{ url_assets('/e-commerce/css/responsive.css') }}" />

</head>



<body class="relative">
    <main class="main-wrapper">

        @include('clients.e-commerce.partials.header')

        @yield('content')

        @include('clients.e-commerce.partials.footer')


    </main>
    <main class="main-wrapper">



        <div class="content-wrapper oh">







        </div> <!-- end content wrapper -->
    </main> <!-- end main wrapper -->

    <!-- jQuery Scripts -->
    <script type="text/javascript" src="{{ url_assets('/e-commerce/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ url_assets('/e-commerce/js/jquery-3.4.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ url_assets('/e-commerce/js/popper.min.js') }}"></script>
    <script type="text/javascript" src="{{ url_assets('/e-commerce/js/jqueryCustome.js') }}"></script>



    <script>
        $(document).ready(function() {
            if ($(window).width() > 991) {
                $(".featureCol").mouseover(function() {
                    $(this).find(".postHoverLinskList").css("bottom", "24%");
                });
                $(".featureCol").mouseout(function() {
                    $(this).find(".postHoverLinskList").css("bottom", "-23%");
                });
            } else {
                $(".featureCol").find(".postHoverLinskList").css("bottom", "20%");
            }
            $(".kupi").on("click", function() {
                if ($(".uspesenProizvod").css("display", "none")) {
                    $(".uspesenProizvod").fadeIn();
                } else {
                    $(".uspesenProizvod").fadeOut();
                }
            });
        
            let productCartId = sessionStorage.getItem("productIds");
            let productCartPrice = sessionStorage.getItem("productprice");
            let productCartTitle = sessionStorage.getItem("producttitle");
            let productCartImage = sessionStorage.getItem("productimage");
           
            
            
            // document.getElementById("demo3").innerHTML = productCartImage;
            // $(".redi").append('<li>' + productCartId + '</li>');
            // $(".redi").append('<p>' + productCartTitle + '</p>');
            if(productCartId === null || productCartId.length <= 0){
                $(".redi").append("<li>Немате продукти во кошничка</li>");
                let productIds = new Array();
                sessionStorage.setItem("productIds", JSON.stringify(productIds));
                console.log(sessionStorage.getItem("productIds"));
            }
            else{
                let productIds = sessionStorage.getItem("productIds").split(',');
                console.log(productIds);
                productIds.forEach(productCartId => {
                    $(".redi").append('<li class="listaProdukt">' + '<img class="slikaKosnica" src="/uploads/products/' +
                        productCartId + '/sm_' + productCartImage + '""">' + "<p class='naslovProdukt'>" +
                        productCartTitle + "</p>" + "<p class='fas fa-times  brisiProdukt'>"+"</p>" + '</li>' +
                        '<br>');
                });
            }
            // $(".cart").append("<div><img src='"+  +"' /></div>")


            // console.log(productCart);
        $(".izvestuvanje").on("click", function() {
            $(this).fadeOut(1000);
        });
        $(".navCart").on("click", function() {

            $(".poleKosnica").toggle();
        });
        $(".konKosnica").on("click",function(){
            $(this).css("border-color","#5ba515")
        });
        // $(".brisiProdukt").on("click", function() {
        //     console.log("here");
        // });
       

    });
        
    </script>

    @yield('scripts')


    @include('clients._partials.es-object')
    @include('clients._partials.global-scripts')






</body>

</html>

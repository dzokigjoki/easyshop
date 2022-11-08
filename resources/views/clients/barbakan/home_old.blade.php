@extends('clients.barbakan.layouts.default')
@section('content')





<!-- Section - Main -->
<section class="section section-main section-main-2 bg-dark dark">

    <!-- BG Video -->
    <div class="bg-video dark-overlay" data-src="{{ url_assets('/barbakan/img/video.mp4') }}" data-type="video/mp4"></div>

    <div class="section-content container v-center text-center">

    <img src="{{ url_assets('/barbakan/img/logo.png') }}" alt="" class="logo_banner">
        <h1 class="display-2 mb-2">Бистро Барбакан</h1>
        <h4 class="text-muted mb-5">Највкусната храна во градот</h4>
        <a href="menu-list-collapse.html" class="btn btn-outline-primary btn-lg"><span>Нарачај онлајн</span></a>
    </div>

</section>

<!-- Section - About -->
<section class="section section-bg-edge">

    <div class="image left col-md-6">
        <div class="bg-image"><img src="http://assets.suelo.pl/soup/img/photos/bg-chef.jpg" alt=""></div>
    </div>

    <div class="container">
        <div class="col-lg-5 col-lg-offset-7 col-md-9 offset-md-6">
            <div class="rate mb-5 rate-lg"><i class="fa fa-star active"></i><i class="fa fa-star active"></i><i class="fa fa-star active"></i><i class="fa fa-star active"></i><i class="fa fa-star"></i></div>
            <h1>Најдобрата храна во Скопје</h1>
            <p class="lead text-muted mb-5">Направете ја својата прва нарачка и уверете се во нашиот квалитет, брзина и вкус.</p>
            <div class="blockquotes">
                <!-- Blockquote -->
                <blockquote class="blockquote light animated" data-animation="fadeInLeft">
                    <div class="blockquote-content">
                        <div class="rate rate-sm mb-3"><i class="fa fa-star active"></i><i class="fa fa-star active"></i><i class="fa fa-star active"></i><i class="fa fa-star active"></i><i class="fa fa-star"></i></div>
                        <p>Брзо приготвување и супер услуга!</p>
                    </div>
                    <footer>
                        <img src="http://assets.suelo.pl/soup/img/avatars/avatar02.jpg" alt="">
                        <span class="name">Mark Johnson<span class="text-muted">, Скопје</span></span>
                    </footer>
                </blockquote>
                <!-- Blockquote -->
                <blockquote class="blockquote animated" data-animation="fadeInRight" data-animation-delay="300">
                    <div class="blockquote-content dark">
                        <div class="rate rate-sm mb-3"><i class="fa fa-star active"></i><i class="fa fa-star active"></i><i class="fa fa-star active"></i><i class="fa fa-star active"></i><i class="fa fa-star"></i></div>
                        <p>Одлична храна и атмосфера!</p>
                    </div>
                    <footer>
                        <img src="http://assets.suelo.pl/soup/img/avatars/avatar01.jpg" alt="">
                        <span class="name">Kate Hudson<span class="text-muted">, Берово</span></span>
                    </footer>
                </blockquote>
            </div>
        </div>
    </div>

</section>

<!-- Section - Menu -->
<section class="section cover protrude pull-up-20">

    <div class="menu-sample-carousel carousel inner-controls" data-slick='{
    "dots": true,
    "slidesToShow": 3,
    "slidesToScroll": 1,
    "infinite": true,
    "responsive": [
        {
            "breakpoint": 991,
            "settings": {
                "slidesToShow": 2,
                "slidesToScroll": 1
            }
        },
        {
            "breakpoint": 690,
            "settings": {
                "slidesToShow": 1,
                "slidesToScroll": 1
            }
        }
    ]
}'>
        <!-- Menu Sample -->
        <div class="menu-sample">
            <a href="menu-list-navigation.html#Burgers">
                <img src="http://assets.suelo.pl/soup/img/photos/menu-sample-burgers.jpg" alt="" class="image">
                <h3 class="title">Бургери</h3>
            </a>
        </div>
        <!-- Menu Sample -->
        <div class="menu-sample">
            <a href="menu-list-navigation.html#Pizza">
                <img src="http://assets.suelo.pl/soup/img/photos/menu-sample-pizza.jpg" alt="" class="image">
                <h3 class="title">Пица</h3>
            </a>
        </div>
        <!-- Menu Sample -->
        <div class="menu-sample">
            <a href="menu-list-navigation.html#Sushi">
                <img src="http://assets.suelo.pl/soup/img/photos/menu-sample-sushi.jpg" alt="" class="image">
                <h3 class="title">Салати</h3>
            </a>
        </div>
        <!-- Menu Sample -->
        <div class="menu-sample">
            <a href="menu-list-navigation.html#Pasta">
                <img src="http://assets.suelo.pl/soup/img/photos/menu-sample-pasta.jpg" alt="" class="image">
                <h3 class="title">Паста</h3>
            </a>
        </div>
        <!-- Menu Sample -->
        <div class="menu-sample">
            <a href="menu-list-navigation.html#Desserts">
                <img src="http://assets.suelo.pl/soup/img/photos/menu-sample-dessert.jpg" alt="" class="image">
                <h3 class="title">Десерти</h3>
            </a>
        </div>
        <!-- Menu Sample -->
        <div class="menu-sample">
            <a href="menu-list-navigation.html#Drinks">
                <img src="http://assets.suelo.pl/soup/img/photos/menu-sample-drinks.jpg" alt="" class="image">
                <h3 class="title">Пијалоци</h3>
            </a>
        </div>
    </div>

</section>

<!-- Section - Offers -->
<section class="section section-lg bg-light">

    <div class="container">
        <h1 class="text-center mb-6">Специјални понуди</h1>
        <div class="carousel" data-slick='{"dots": true, "autoplay": true}'>
            <!-- Special Offer -->
            <div class="special-offer">
                <img src="http://assets.suelo.pl/soup/img/photos/special-burger.jpg" alt="" class="special-offer-image">
                <div class="special-offer-content">
                    <h2 class="mb-2">Бесплатен бургер</h2>
                    <h5 class="text-muted mb-5">Направи нарачка поголема од 1500 денари и добиј бесплатен бургер</h5>
                    <ul class="list-check text-lg mb-0">
                        <li>Само во Вторник</li>
                        <li>Нарачка поголема од 1500 денари</li>
                        <li>Барем еден бургер нарачан</li>
                    </ul>
                </div>
            </div>
            <!-- Special Offer -->
            <div class="special-offer">
                <img src="http://assets.suelo.pl/soup/img/photos/special-pizza.jpg" alt="" class="special-offer-image">
                <div class="special-offer-content">
                    <h2 class="mb-2">Бесплатна мини пица</h2>
                    <h5 class="text-muted mb-5">Бесплатна пица за нарачки поголеми од 1500 денари</h5>
                    <ul class="list-check text-lg mb-0">
                        <li>Само за викенди</li>
                        <li class="false">Нарачки поголеми од 1500 денари</li>
                    </ul>
                </div>
            </div>
            <!-- Special Offer -->
            <div class="special-offer">
                <img src="http://assets.suelo.pl/soup/img/photos/special-dish.jpg" alt="" class="special-offer-image">
                <div class="special-offer-content">
                    <h2 class="mb-2">Евтин петок</h2>
                    <h5 class="text-muted mb-5">10% попуст на сите јадења</h5>
                    <ul class="list-check text-lg mb-0">
                        <li>Само во Петок</li>
                        <li>Сите производи</li>
                        <li>Онлајн нарачки</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

</section>

<!-- Section - Steps -->
<section class="section section-extended left bg-dark dark">

    <div class="container bg-dark">
        <div class="row">
            <div class="col-md-4">
                <!-- Step -->
                <div class="feature feature-1 mb-md-0 animated" data-animation="fadeIn">
                    <div class="feature-icon icon icon-primary"><i class="ti ti-shopping-cart"></i></div>
                    <div class="feature-content">
                        <h4 class="mb-2"><a href="menu-list-collapse.html">Одбери јадење</a></h4>
                        <p class="text-muted mb-0">Одбери го саканото јадење и додади дополнително опис за него</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <!-- Step -->
                <div class="feature feature-1 mb-md-0 animated" data-animation="fadeIn" data-animation-delay="300">
                    <div class="feature-icon icon icon-primary"><i class="ti ti-wallet"></i></div>
                    <div class="feature-content">
                        <h4 class="mb-2">Направи нарачка</h4>
                        <p class="text-muted mb-0">Внеси ги потребни податоци и плати преку својата картичка или во готово</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <!-- Step -->
                <div class="feature feature-1 mb-md-0 animated" data-animation="fadeIn" data-animation-delay="600">
                    <div class="feature-icon icon icon-primary"><i class="ti ti-package"></i></div>
                    <div class="feature-content">
                        <h4 class="mb-2">Достава на нарачката</h4>
                        <p class="text-muted mb-3">Нарачката ќе биде доставена на вашата адреса</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

<!-- Section - Posts -->
{{-- <section class="section section-lg bg-light">

    <div class="container">
        <h1 class="text-center mb-6">Нашите новости</h1>
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="carousel" data-slick='{"dots": true, "infinite": true}'>
                    @foreach($lastBlogs as $post)
                    <!-- Post / Item -->
                    <article class="post post-wide animated" data-animation="fadeIn">
                        <div class="post-image"><img src="/uploads/posts/{{$post->id}}/lg_{{$post->image}}" alt=""></div>
                        <div class="post-content">
                            <ul class="post-meta">
                                <li>{{ \Carbon\Carbon::parse($post->publish_at)->format('d, M, Y') }}</li>
                            </ul>
                            <h4><a href="blog-post.html">{{ $post->title }}</a></h4>
                            <p>{{ $post->short_description }}</p>
                            <a href="/b/{{$post->id}}/{{$post->url}}" class="btn btn-primary"><span>Види повеќе</span></a>
                        </div>
                    </article>
                    @endforeach

                </div>
            </div>
        </div>
    </div>

</section> --}}

<!-- Section -->
<section class="section section-lg dark bg-dark">

    <!-- BG Image -->
    <div class="bg-image bg-parallax"><img src="http://assets.suelo.pl/soup/img/photos/bg-croissant.jpg" alt=""></div>

    <div class="container text-center">
        <div class="col-lg-8 offset-lg-2">
            <h2 class="mb-3">Дали сакате да не посетите?</h2>
            <h5 class="text-muted">Направи резервација или нарачај го своето јадење онлајн!</h5>
            <a href="/c/1/meni" class="btn btn-primary"><span>Нарачај веднаш</span></a>
            <a href="#" class="btn btn-outline-primary"><span>Направи резервација</span></a>
        </div>
    </div>

</section>

@stop
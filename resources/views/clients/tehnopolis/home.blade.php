@extends('clients.tehnopolis.layouts.default')
@section('content')
    @include('clients.tehnopolis.partials.home.slider-banners')
    @include('clients.tehnopolis.partials.home.promotions')
    @include('clients.tehnopolis.partials.home.recommended')
    <div class="hidden-xs hidden-sm hidden-md row">
        <main class="col-md-12 col-sm-12">
            <h2 class="product-head">Производители</h2>
            <div class="carousel-controls">
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
            </div>
            <div id="swipe1" class="swiper-container">
                <div class="swiper-wrapper section_offset">

                    @foreach($manufacturers as $manufacturer)
                        <div style="padding:0; text-align: center;" class="swiper-slide col-md-2">
                            <div class="product-col">
                                <div style="font-size:18px; margin-top:-6px;" class="">
                                    <a style="text-decoration: none; color:#333333;" href="{{route('manufacturer', [$manufacturer->id])}}">
                                    {{$manufacturer->name}}
                                    </a>
                                </div>
                                <div class="caption">

                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </main>
    </div>
@endsection

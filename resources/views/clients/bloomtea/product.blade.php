@extends('clients.bloomtea.layouts.default')
@section('content')

    <section class="sec-product-detail bg0 p-t-105 p-b-70" id="mobile-product">
        <h2 class="js-name1 txt-l-104 cl3 p-b-16" style="font-size: 44px; margin: 0 auto; text-align: center; padding-bottom: 60px;">
            {{$product->title}}
        </h2>
        <div class="container">


            <div class="row">

                <div class="col-md-5 col-lg-5">
                    <div class="m-r--30 m-r-0-lg">
                        <!-- Slide 100 -->


                        <div>
                            <div class="wrap-main-pic-100 bo-all-1 bocl12 pos-relative">
                                <div class="main-frame">
                                    <div class="wrap-main-pic">
                                        <div class="main-pic">
                                            <img src="{{$product->image}}" style="width: 100%;">
                                        </div>
                                    </div>
                                </div>

                                {{--<div class="wrap-arrow-slide-100 s-full ab-t-l trans-04">--}}
                                    {{--<span class="my-arrow back prev-slide-100"><i class="fa fa-angle-left m-r-1" aria-hidden="true"></i></span>--}}
                                    {{--<span class="my-arrow next next-slide-100"><i class="fa fa-angle-right m-l-1" aria-hidden="true"></i></span>--}}
                                {{--</div>--}}
                            </div>

                            {{--<div class="wrap-thumb-100 flex-w flex-sb p-t-30">--}}
                                {{--<div class="thumb-100">--}}
                                    {{--<div class="sub-frame sub-1">--}}
                                        {{--<div class="wrap-main-pic">--}}
                                            {{--<div class="main-pic">--}}
                                                {{--<img src="/assets/bloomtea/images/pro-detail-thumb-02.jpg" alt="IMG-SLIDE">--}}
                                            {{--</div>--}}
                                        {{--</div>--}}

                                        {{--<div class="btn-sub-frame btn-1 bo-all-1 bocl12 hov8 trans-04"></div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}

                                {{--<div class="thumb-100">--}}
                                    {{--<div class="sub-frame sub-2">--}}
                                        {{--<div class="wrap-main-pic">--}}
                                            {{--<div class="main-pic">--}}
                                                {{--<img src="images/pro-detail-thumb-03.jpg" alt="IMG-SLIDE">--}}
                                            {{--</div>--}}
                                        {{--</div>--}}

                                        {{--<div class="btn-sub-frame btn-2 bo-all-1 bocl12 hov8 trans-04"></div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}

                                {{--<div class="thumb-100">--}}
                                    {{--<div class="sub-frame sub-3">--}}
                                        {{--<div class="wrap-main-pic">--}}
                                            {{--<div class="main-pic">--}}
                                                {{--<img src="images/pro-detail-thumb-04.jpg" alt="IMG-SLIDE">--}}
                                            {{--</div>--}}
                                        {{--</div>--}}

                                        {{--<div class="btn-sub-frame btn-3 bo-all-1 bocl12 hov8 trans-04"></div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        </div>
                    </div>
                </div>

                <div class="col-md-7 col-lg-7">
                        <div class="p-l-70 p-t-35 p-l-0-lg" style="text-align: justify">

                            <span class="txt-m-117 cl9">

                            </span>



                            @if($product->description)
                            <p class="txt-s-101 cl6" >
                            {!! $product->description !!}
                            </p>
                            @endif


                            <h2 style="padding-top: 10px;">Цена: <span style="color: #2CB77E;">{{$product->price}} МКД</span></h2>



                            <div class="flex-w flex-m p-t-55 p-b-30" id="buy">
                                <div class="wrap-num-product flex-w flex-m bg12 p-rl-10 m-r-30 m-b-30">
                                    <div class="btn-num-product-down flex-c-m fs-29"></div>

                                    <input class="txt-m-102 cl6 txt-center num-product" type="number"
                                           data-product-quantity=""
                                           name="quantity" value="1">

                                    <div class="btn-num-product-up flex-c-m fs-16"></div>
                                </div>

                                <button value="{{$product->id}}" data-add-to-cart="" class="flex-c-m txt-s-103 cl0 bg10 size-a-5 hov-btn2 trans-04 m-b-30 js-addcart1" id="add_cart">
                                    Додади во кошничка
                                </button>
                            </div>

                        </div>
                </div>
            </div>

            <!-- Tab01 -->
            <div class="tab02 p-t-80" style="padding-top: 0;">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#description" role="tab">Дополнително</a>
                    </li>

                    <li class="nav-item">
                        {{--<a class="nav-link" data-toggle="tab" href="#info" role="tab">Additional Information</a>--}}
                    </li>

                </ul>

                <!-- Tab panes -->
                <div class="tab-content" style="text-align: justify">
                    <!-- - -->
                    <div class="tab-pane fade show active" id="description" role="tabpanel">
                        <div class="p-t-30">
                            <p class="txt-s-112 cl9">
                                {!! $product->short_description !!}
                            </p>
                        </div>
                    </div>

                    <!-- - -->

                </div>
            </div>
        </div>
    </section>

@endsection
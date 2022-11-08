@extends('clients.expressbook_new.layouts.default')
@section('content')
    <!-- breadcrumb-section start -->
    <nav class="breadcrumb-section theme1 bg-lighten2 pt-35 pb-35">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title text-center">
                        <h2 class="title pb-4 text-dark">

                            Резултати од пребарувањето - {{ $search }}
                        </h2>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <!-- breadcrumb-section end -->
    <!-- product tab start -->
    <div class="product-tab bg-white pt-80 pb-80">
        <div class="container">
            <div class="grid-nav-wraper bg-lighten2 mb-30">
                <div class="row align-items-center">
                    <div class="col-12 col-md-6 mb-3 mb-md-0">
                        <nav class="shop-grid-nav">
                            <ul class="nav nav-pills align-items-center" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home"
                                        role="tab" aria-controls="pills-home" aria-selected="true">
                                        <i class="fa fa-th"></i>
                                    </a>
                                </li>
                                <li class="nav-item mr-0">
                                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile"
                                        role="tab" aria-controls="pills-profile" aria-selected="false"><i
                                            class="fa fa-list"></i></a>
                                </li>
                                <li>
                                    <span class="total-products">Има {{ count($products) }} продукти</span>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- product-tab-nav end -->
            <div class="tab-content" id="pills-tabContent">
                <!-- first tab-pane -->
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div class="grid-view theme1">
                        <div class="row" data-products-list="">
                            <div class="tab-content" id="pills-tabContent">
                                <!-- first tab-pane -->
                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                    aria-labelledby="pills-home-tab">
                                    <div class="grid-view theme1">


                                        <div class="row">
                                            @foreach ($products as $article)
                                                <div class="col-6 col-md-3 col-xl-4 mb-30">
                                                    @include('clients.expressbook_new.partials.product')
                                                </div>
                                            @endforeach
                                        </div>

                                    </div>
                                </div>
                                <!-- second tab-pane -->
                                <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                                    aria-labelledby="pills-profile-tab">
                                    <div class="row grid-view-list theme1">
                                        @foreach ($products as $article)
                                            <div class="col-12 mb-30">
                                                <div class="card product-card">
                                                    <div class="card-body">
                                                        <div class="media flex-column flex-md-row">
                                                            <div class="product-thumbnail position-relative">
                                                                @if (\EasyShop\Models\Product::hasDiscount($article->discount))
                                                                    <span class="badge badge-danger top-right">Попуст</span>
                                                                @endif
                                                                <a href="single-product.html">
                                                                    <img class="first-img"
                                                                        src="{{ \ImagesHelper::getProductImage($article) }}"
                                                                        alt="thumbnail" />
                                                                </a>
                                                                <!-- product links -->
                                                                <ul class="actions d-flex justify-content-center">
                                                                    <li>
                                                                        <a data-add-to-wish-list=""
                                                                            value="{{ $article->id }}" class="action">
                                                                            <span data-toggle="tooltip"
                                                                                data-placement="bottom"
                                                                                title="Додади во листа на желби"
                                                                                class="icon-heart">
                                                                            </span>
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a class="action" href="#" data-toggle="modal"
                                                                            data-target="#quick-view">
                                                                            <span data-toggle="tooltip"
                                                                                data-placement="bottom"
                                                                                title="Погледни брз поглед"
                                                                                class="icon-magnifier"></span>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                                <!-- product links end-->
                                                            </div>
                                                            <div class="media-body pl-md-4">
                                                                <div class="product-desc py-0 px-0">
                                                                    <h3 class="title">
                                                                        <a
                                                                            href="/p/{{ $article->id }}/{{ $article->url }}">{{ $article->title }}</a>
                                                                    </h3>
                                                                    @if (\EasyShop\Models\Product::hasDiscount($article->discount))
                                                                        <span class="product-price mr-20"><del
                                                                                class="del">{{ EasyShop\Models\Product::getPriceRetail1($article, true, 0) }}
                                                                                МКД</del>
                                                                            <span
                                                                                class="onsale">{{ number_format($article->price, 0, ',', '.') }}
                                                                                МКД</span></span>
                                                                    @else
                                                                        <span class="product-price mr-20"><span
                                                                                class="onsale">{{ number_format($article->price, 0, ',', '.') }}
                                                                                МКД</span></span>
                                                                    @endif
                                                                </div>
                                                                <div class="mt-35 mb-35">
                                                                    {{ $article->short_description }}</div>
                                                                <button data-add-to-cart="" value="{{ $article->id }}"
                                                                    class="btn btn-dark btn--xl">
                                                                    Додади во кошничка
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- product-list End -->
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- product tab end -->
@endsection

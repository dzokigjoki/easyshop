<div class="row">
    <div class="latest-items carousel-wrapper">
        <header class="content-title">
            <div class="title-bg">
                <h2 class="title">Најново</h2>
            </div><!-- End .title-bg -->
        </header>

        <div class="carousel-controls">
            <div id="latest-items-slider-prev" class="carousel-btn carousel-btn-prev">
            </div><!-- End .carousel-prev -->
            <div id="latest-items-slider-next" class="carousel-btn carousel-btn-next carousel-space">
            </div><!-- End .carousel-next -->
        </div><!-- End .carousel-controls -->

        <div class="latest-items-slider owl-carousel">
            @foreach($bestSellersByCategoryArticles as $title)
                @foreach($categoryArticles as $product)

            <div class="item item-hover">
                <div class="item-image-wrapper">
                    <figure class="item-image-container">
                        <a href="product.html">
                            <img src="/assets/topmarket/images_placeholders/products/item4.jpg" alt="item1"
                                 class="item-image">
                            <img src="/assets/topmarket/images_placeholders/products/item4-hover.jpg"
                                 alt="item1  Hover" class="item-image-hover">
                        </a>
                    </figure>
                    <div class="item-price-container">
                        <span class="item-price">{{number_format($product->$myPriceGroup, 0, ',', '.')}}<span class="sub-price">{{\EasyShop\Models\AdminSettings::getField('currency')}}</span></span>
                    </div><!-- End .item-price-container -->
                    <span class="new-rect">New</span>
                </div><!-- End .item-image-wrapper -->
                <div class="item-meta-container">
                    <h3 class="item-name"><a href="{{route('product', [$product->id, $product->url])}}">{{$product->title}}</a></h3>
                    <div class="item-action">
                        <a href="#" class="item-add-btn">
                            <span class="icon-cart-text">Додади во кошничка</span>
                        </a>
                        <!-- End .item-action-inner -->
                    </div><!-- End .item-action -->
                </div><!-- End .item-meta-container -->
            </div><!-- End .item -->
            @endforeach
    @endforeach
            <!-- End .item -->
        </div><!--latest-items-slider -->
    </div><!-- End .latest-items -->
</div>

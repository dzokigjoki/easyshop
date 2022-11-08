<section id="category-items">
    <div class="col-md-9 paginate">
        <div class="items">
            @foreach($articles as $articleRow)
                <div class="row" data-gutter="15">
                    @foreach($articleRow as $item)
                    <div class="col-md-4">
                        <div class="product ">
                            <ul class="product-labels"></ul>
                            <div class="product-img-wrap">
                                {{--<img class="product-img" src="{{\ImagesHelper::getProductImage($item)}}" alt="{{$item->title}}" />--}}
                                <img class="product-img" src="https://assets.smartsoft.mk/easyshop/ibutik/images/200x200.png" />
                            </div>
                            <a class="product-link" href="{{route('product', [$item->id, $item->url])}}"></a>
                            <div class="product-caption">

                                <h5 class="product-caption-title">{{$item->title}}</h5>
                                <div class="product-caption-price"><span class="product-caption-price-new">{{$item->price}} ден.</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-md-6">
                <p class="category-pagination-sign">{{$itemCount}} items found in {{$category->title}}. Showing {{$minAmount}} - {{$maxAmount}}</p>
            </div>
            <div class="col-md-6">
                <!--<nav>
                    <ul class="pagination category-pagination pull-right pagerEl">
                        <ul class="category-pagination pagination pageNumbers"></ul>
                        <li class="last lastPage"><a href="#"><i class="fa fa-long-arrow-right"></i></a>
                        </li>
                    </ul>
                </nav>-->
            </div>
        </div>
    </div>
</section>
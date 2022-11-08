<div class="slider-item">
    <div class="card product-card">
        <div class="card-body p-0">
            <div class="media flex-column">
                <div class="product-thumbnail position-relative">

                    <a href="/p/{{ $article->id }}/{{ $article->url }}">
                        <img class="first-img" src="{{ \ImagesHelper::getProductImage($article) }}" alt="thumbnail" />
                    </a>
                    <!-- product links -->
                    <ul class="actions d-flex justify-content-center">
                        <li>
                            <a data-add-to-wish-list="" value="{{$article->id}}" class="action">
                                <span data-toggle="tooltip" data-placement="bottom" title="Додади во листа на желби"
                                    class="icon-heart">
                                </span>
                            </a>
                        </li>

                        <li>
                            <a class="action" data-product="{{ json_encode($article) }}"
                                data-image="{{ \ImagesHelper::getProductImage($article) }}"
                                data-oldprice="{{ EasyShop\Models\Product::getPriceRetail1($article, true, 0) }}"
                                data-newprice="{{ $article->price }}" href="#" data-toggle="modal"
                                data-target="#quick-view">
                                <span data-toggle="tooltip" data-placement="bottom" title="Погледни брз поглед"
                                    class="icon-magnifier"></span>
                            </a>
                        </li>
                    </ul>
                    <!-- product links end-->
                </div>
                <div class="media-body">
                    <div class="product-desc">
                        <h3 class="title">
                            <a href="/p/{{ $article->id }}/{{ $article->url }}">{{ $article->title }}</a>
                        </h3>
                        <div class="d-flex align-items-center justify-content-between">
                            @if (\EasyShop\Models\Product::hasDiscount($article->discount))
                            <span class="product-price mr-10"><del
                                    class="del">{{ number_format($article->price, 0, ',', '.') }}
                                    МКД</del>
                                <span class="onsale">{{ EasyShop\Models\Product::getPriceRetail1($article, true, 0) }}
                                    МКД</span></span>
                            @else
                            <span class="product-price mr-10"><span
                                    class="onsale">{{ number_format($article->price, 0, ',', '.') }}
                                    МКД</span></span>
                            @endif
                            <button data-add-to-cart="" value="{{ $article->id }}" class="pro-btn">
                                <i class="icon-basket"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
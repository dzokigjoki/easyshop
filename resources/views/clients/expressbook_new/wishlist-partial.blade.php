<div class="head d-flex flex-wrap justify-content-between">
                <span class="title">Листа со желби</span>
                <button class="offcanvas-close">×</button>
            </div>






@if (isset($wishlistItems) && count($wishlistItems) > 0)

    <ul class="minicart-product-list">
        @foreach ($wishlistItems as $article)
            <li wish-list-row="{{ $article->id }}">
                <a href="/p/{{ $article->id }}/{{ $article->url }}" class="image"><img
                        src="{{ \ImagesHelper::getProductImage($article->image, $article->id, 'sm_') }}"
                        alt="Cart product Image" /></a>
                <div class="content">
                    <a href="single-product.html" class="title">{{ $article->title }}</a>
                    <span class="quantity-price"><span
                            class="amount">{{ EasyShop\Models\Product::getPriceRetail1($article, true, 0) }}
                            МКД</span></span>
                    <a data-remove-from-wish-list value="{{ $article->id }}" class="remove">×</a>
                </div>
            </li>
        @endforeach
    </ul>
@else
    <p>Листата на желби е празна.</p>
@endif

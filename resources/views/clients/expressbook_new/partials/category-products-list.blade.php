<div class="tab-content" id="pills-tabContent">
    <!-- first tab-pane -->
    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
        <div class="grid-view theme1">


            <div class="row">
                @foreach ($products as $article)
                    <div class="col-6 col-sm-4 col-md-3 col-xl-2 mb-30">
                        @include('clients.expressbook_new.partials.product')
                    </div>
                @endforeach
            </div>

            @if ($count > 0)
                <div class="row">
                    <div class="col-12">
                        <nav class="pagination-section mt-30">
                            <ul class="pagination justify-content-center">
                                <li class="page-item" @if ($productFilters->page == 1) style="visibility: hidden;" @endif>
                                    <a class="page-link" href="javascript://"
                                        data-page="{{ $productFilters->page - 1 }}"><i
                                            class="ion-chevron-left"></i></a>
                                </li>
                                @foreach (range(1, $totalPages) as $page)
                                    @if ($productFilters->page == $page)
                                        <li class="page-item active"><a class="page-link"
                                                href="javascript://">{{ $page }}</a></li>
                                    @elseif($page == 1)
                                        <li class="page-item"><a class="page-link" href="javascript://"
                                                data-page="1">1</a></li>
                                    @elseif($productFilters->page >= ($page-3) && $productFilters->page
                                        <= ($page+3)) <li class="page-item"><a class="page-link" href="javascript://"
                                                data-page="{{ $page }}">{{ $page }}</a>
                                            </li>
                                        @elseif($page == $totalPages)
                                            <li class="page-item"><a class="page-link" href="javascript://"
                                                    data-page="{{ $totalPages }}">...{{ $totalPages }}</a>
                                            </li>
                                    @endif
                                @endforeach
                                <li class="page-item" @if ($productFilters->page == $totalPages) style="visibility: hidden" @endif>
                                    <a class="page-link" href="javascript://"
                                        data-page="{{ $productFilters->page + 1 }}">
                                        <i class="ion-chevron-right"></i>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            @endif




        </div>
    </div>
    <!-- second tab-pane -->
    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
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
                                        <img class="first-img" src="{{ \ImagesHelper::getProductImage($article) }}"
                                            alt="thumbnail" />
                                    </a>
                                    <!-- product links -->
                                    <ul class="actions d-flex justify-content-center">
                                        <li>
                                            <a data-add-to-wish-list="" value="{{ $article->id }}" class="action">
                                                <span data-toggle="tooltip" data-placement="bottom"
                                                    title="Додади во листа на желби" class="icon-heart">
                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="action" href="#" data-toggle="modal" data-target="#quick-view">
                                                <span data-toggle="tooltip" data-placement="bottom"
                                                    title="Погледни брз поглед" class="icon-magnifier"></span>
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
                                    <div class="mt-35 mb-35">{{ $article->short_description }}</div>
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

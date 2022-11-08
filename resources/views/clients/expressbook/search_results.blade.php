@extends('clients.expressbook.layouts.default')
@section('content')
<div class="container">
    <div class="module inner-top-sm wow fadeInUp" id="books-by-subject">

        <div class="module-body">

            <div class="row books text-center">
                @if(count($products)>0)
                    <div class="module-heading home-page-module-heading">
                        <h2 class="module-title home-page-module-title">
                            <span>Резултати од пребарувањето - {{$search}}</span></h2>
                    </div><!-- /.module-heading -->
                <br>
                    <div class="row">
                        <form action="{{URL::to('/search')}}" class="form-inline">
                            <div class="col-md-8 col-lg-8 col-xl-8">
                                <div class="content offset-0">
                                    <div class="filters-row">
                                        <div class="pull-left">

                                            <div class="filters-row_select">
                                                <input class="form-control" type="hidden" name="search"
                                                       value="{{$search}}"/>
                                                {{--<button class="btn btn-sm" type="submit">Барај</button>--}}
                                                <label>Подреди по:</label>
                                                <span class="select">
                                            <select onchange="this.form.submit()" name="sort_by" class="form-control">
                                                  <option @if($order_by == "title_asc" || empty($order_by)) selected=""
                                                          @endif  value="title_asc">Име (A - Z) </option>
                                                  <option @if($order_by == "title_desc") selected=""
                                                          @endif  value="title_desc">Име (Z - A) </option>
                                                  <option @if($order_by == "price_asc") selected=""
                                                          @endif  value="price_asc">Цена - (Ниска) </option>
                                                  <option @if($order_by == "price_desc") selected=""
                                                          @endif  value="price_desc">Цена - (Висока) </option>
                                              </select>
                        </span>
                                            </div>
                                        </div>
                                        <div class="pull-left" style="padding-left:20px;">
                                            <div class="filters-row_select">
                                                <label>Прикажи:</label>
                                                <select onchange="this.form.submit()" name="results_limit"
                                                        class="form-control" id="result_limit">

                                                    <option @if($results_limit == 20) selected=""
                                                            @endif value="20"
                                                            selected="">20
                                                    </option>
                                                    <option @if($results_limit == 50) selected=""
                                                            @endif  value="50">50
                                                    </option>
                                                    <option @if($results_limit == 75) selected=""
                                                            @endif  value="75">75
                                                    </option>
                                                    <option @if($results_limit == 100) selected="selected"
                                                            @endif  value="100">100
                                                    </option>
                                                </select>
                                                <a href="#" class="icon icon-arrow-down active"></a><a href="#"
                                                                                                       class="icon icon-arrow-up"></a>
                                            </div>
                                            {{--<a class="link-view-mobile hidden-lg hidden-md" href="#"><span--}}
                                            {{--class="icon icon-view_stream"></span></a>--}}
                                            {{--<a class="link-mode link-grid-view active" href="#"><span--}}
                                            {{--class="icon icon-view_module"></span></a>--}}
                                            {{--<a class="link-mode link-row-view" href="#"><span--}}
                                            {{--class="icon icon-view_list"></span></a>--}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    @foreach($products as $article)

                        <div class="col-md-3 col-sm-4">
                            <div class="book">
                                <a href="{{route('product', [$article->id, $article->url])}}">
                                    <div class="book-cover">
                                        <img alt="" width="140" height="212"
                                             src="{{\ImagesHelper::getProductImage($article)}}"
                                             data-echo="{{\ImagesHelper::getProductImage($article)}}">
                                    </div>
                                </a>
                                <div class="book-details clearfix">
                                    <div class="book-description">
                                        <h3 class="book-title"><a
                                                    href="{{route('product', [$article->id, $article->url])}}">{{$article->title}}</a>
                                        </h3>
                                        <p class="book-subtitle"><a href="single-book.html">Author_placeholder</a>
                                        </p>
                                    </div>
                                    <div class="actions">
                                            <span class="book-price price">{{number_format($article->$myPriceGroup, 0, ',', '.')}}
                                                ден.</span>

                                        <div class="cart-action">
                                            <a style="cursor: pointer" class="add-to-cart" title=""
                                               value="{{$article->id}}" data-add-to-cart="">Додади во кошничка</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @endforeach

                    @if ($products && count($products))
                        <div class="row">
                            <div>
                                <ul class="pagination">
                                    <li>  {{$products->appends(['search' => $search, 'results_limit' => $results_limit, 'sort_by' => $order_by])->links()}}</li>
                                </ul>
                            </div>
                        </div>
                    @endif

                @else
                    <div class="module-heading home-page-module-heading">
                        <h2 class="module-title home-page-module-title">
                            <span>Не постојат резултати за пребарувањето - {{$search}}</span></h2>
                    </div><!-- /.module-heading -->
                <br><br><br>
                @endif
            </div>
        </div>
    </div>



</div>
@endsection
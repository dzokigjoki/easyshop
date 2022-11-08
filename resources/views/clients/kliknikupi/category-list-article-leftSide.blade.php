<form class="type_2">

    <div class="table_layout list_view">

        <div class="table_row">

            <div class="table_cell">

                <fieldset>

                    <legend>Цена</legend>

                    <div class="range">

                        <input type="text" data-price-slider=""/>

                    </div>

                </fieldset>

            </div><!--/ .table_cell -->

            <!-- - - - - - - - - - - - - - Manufacturer - - - - - - - - - - - - - - - - -->
            <br>

            @if (count($filters))
                <div class="table_cell">
                    @foreach($filters as $filter)
                        <fieldset>

                            <legend>{{$filter->name}}</legend>

                            <ul class="poll-list">

                                @foreach($filter->attributes as $attribute)
                                    <li>
                                        <input type="checkbox" data-attribute="" data-id="{{$attribute->id}}"
                                               id="filter_{{$attribute->id}}"
                                                {{ !is_null($productFilters->attributes) && in_array($attribute->id, $productFilters->attributes) ? 'checked="checked"': ''  }}>
                                        <label for="filter_{{$attribute->id}}">{{$attribute->value}}</label>

                                    </li>
                                @endforeach
                            </ul>
                        </fieldset>
                    @endforeach


                    {{--                    @foreach($category)--}}
                </div><!--/ .table_cell -->
            @endif


            <div class="table_cell">
                <ul class="poll-list">
                    @foreach($menuCategories as $mc)

                        <li><b><a href="{{route('category', [$mc['id'], $mc['url']])}}">{{$mc['title']}}</a></b>
                            <hr>
                            @if(isset($mc['children']))
                                <ul>
                                    @foreach($mc['children'] as $ch)
                                        <li style="list-style: none">
                                            <a href="{{route('category', [$ch['id'], $ch['url']])}}">
                                                {{$ch['title']}}  </a>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </li><br><br>
                    @endforeach
                </ul>

<Br>
                <h3>Најпопуларни</h3>

            {{--@foreach($bestSellersArticles as $product)--}}
                    {{--<div class="product" style="margin-bottom: 30px;">--}}
                        {{--<div class="product_inside">--}}
                            {{--<div class="image-box">--}}
                                {{--<a href="{{route('product', [$product->id, $product->url])}}">--}}
                                    {{--<img src="{{\ImagesHelper::getProductImage($product, NULL, 'lg_')}}" alt="">--}}
                                    {{--@if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )--}}
                                        {{--<div class="label-sale">Заштедувате <br>--}}
                                            {{--{{(int)$product->$myPriceGroup - (int)EasyShop\Models\Product::getPriceRetail1($product, false, 0)}}--}}
                                            {{--ден.--}}
                                        {{--</div>--}}
                                    {{--@endif--}}
                                {{--</a>--}}
                                {{--<a href="{{route('product', [$product->id, $product->url])}}"--}}
                                   {{--data-toggle="modal" data-target="" class="quick-view">--}}
											{{--<span>--}}
											{{--<span class="icon icon-visibility"></span>Прегледај--}}
											{{--</span>--}}
                                {{--</a>--}}
                                {{--@if($product->is_exclusive)--}}
                                    {{--<div class="countdown_box">--}}
                                        {{--<div class="countdown_inner">--}}
                                            {{--Treba da se zeme datum od baza--}}

                                            {{--@if((int)substr($product->discount['end_date'],0,4) >= 2099)--}}
                                                {{--<div class="countdown"--}}
                                                     {{--data-date="{{\Carbon\Carbon::now()->addWeek(1)}}"></div>--}}
                                            {{--@else--}}
                                                {{--<div class="countdown"--}}
                                                     {{--data-date="{{($product->discount)['end_date']}}"></div>--}}
                                            {{--@endif--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--@endif--}}

                            {{--</div>--}}


                            {{--<h2 class="title">--}}

                                {{--<a href="{{route('product', [$product->id, $product->url])}}">{{$product->title}}</a>--}}
                            {{--</h2>--}}
                            {{--<div class="price view">--}}
                                {{--@if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )--}}
                                    {{--namalena cena--}}
                                    {{--{{EasyShop\Models\Product::getPriceRetail1($product, true, 0)}}--}}
                                    {{--<span class="price_currency"> ден.</span>--}}
                                    {{--stara cena--}}
                                    {{--<span class="old-price">{{number_format($product->$myPriceGroup, 0, ',', '.')}}--}}
                                        {{--ден.</span>--}}

                                {{--@else--}}
                                    {{--{{number_format($product->$myPriceGroup, 0, ',', '.')}}--}}
                                    {{--<span--}}
                                            {{--class="price_currency"> ден.</span>--}}

                                {{--@endif--}}
                            {{--</div>--}}
                            {{--<div class="product_inside_hover">--}}
                                {{--<button class="btn btn-product_addtocart"--}}
                                        {{--data-add-to-cart="" value="{{$product->id}}" onClick="">--}}
                                    {{--<span class="icon icon-shopping_basket"></span>--}}
                                    {{--Додади во кошничка--}}
                                {{--</button>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div><br>--}}
                        {{--@endforeach--}}

            </div>
            {{--@endforeach--}}


        </div><!--/ .table_row -->

    </div><!--/ .table_layout -->

</form>
@extends('clients.barbakan.layouts.default')
@section('content')

    <!-- Section -->
    <section class="section bg-light">
        <div class="container">

            <!-- Product Single -->
            <div class="product-single">
                <div class="row g-0">
                    <div class="col" style="padding: 0">
                        <div class="product-image">
                            <img class="mb-4" src="{{$product->image}}" alt="Image">
                        </div>
                    </div>
                    <div class="col">
                        <div class="product-content">
                            <div class="product-header text-center">
                                <?php $productTitle = explode('#', $product->title);
                                if (!isset($productTitle[1])) {
                                    $productTitle[1] = '';
                                }
                                ?>
                                <h1 class="product-title">{{ $productTitle[0] }}</h1>
                            </div>
                            <p class="lead">{{ $product->short_description }}</p>
                            <hr class="hr-primary">
                            <div class="product-price text-center">
                                @if (\EasyShop\Models\Product::hasDiscount($product->discount))
                                    <span
                                        class="text-muted">{{ EasyShop\Models\Product::getPriceRetail1($product, true, 0) }}
                                        МКД</span>
                                @endif
                                <span class="mr-4"><span
                                        data-product-base-price>{{ number_format($product->$myPriceGroup, 0, ',', '.') }}
                                        МКД</span></span>
                            </div>
                            <!--<select class="custom-select" id="dimensions" name="attribute_color">
                                                                <option data-variation-id='' data-variation-old-price='' data-variation-new-price="" value='white'>Small</option>
                                                                <option data-variation-id='' data-variation-old-price='' data-variation-new-price="" value='white' selected>Medium</option>
                                                                <option data-variation-id='' data-variation-old-price='' data-variation-new-price="" value='white'>Large</option>
                                                            </select>-->
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group text-center">
                                        <input type="number" data-product-quantity
                                            class="form-control input-qty form-control-lg" value="1">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <button class="btn btn-outline-primary btn-lg btn-block" data-toggle="modal"
                                        data-target="#product-single-modal"
                                        data-product="{{ json_encode($product) }}"><span>Додади во
                                            кошничка</span></button>
                                </div>
                            </div>
                            <div class="text-center mt-4">
                                <a href="/c/1/meni" class="btn btn-link">Назад кон мени</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="modal fade product-modal" id="product-single-modal" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header modal-header-lg dark bg-dark">
                    <div class="bg-image"><img src="http://assets.suelo.pl/soup/img/photos/modal-add.jpg" alt="">
                    </div>
                    <h4 class="modal-title">Додади опис за јадењето</h4>
                    <button type="button" id="modal_close" class="close" data-dismiss="modal" aria-label="Close"><i
                            class="ti ti-close"></i></button>
                </div>
                <div class="modal-product-details">
                    <div class="row align-items-center">
                        <div class="col-9">
                            <h6 id="product-modal-name" class="mb-1 product-modal-name"></h6>
                            <span id="product-modal-ingredients" class="text-muted product-modal-ingredients"></span>
                        </div>
                        <div class="col-3 text-lg text-right"><span id="product-modal-price"
                                class="product-modal-price old-price"></span></div>
                    </div>
                </div>
                <div class="modal-body panel-details-container">
                    <div class="panel-details panel-details-form">
                        <div id="panel-details-other">
                            @if (isset($parentProducts) && !empty($parentProducts) && count($parentProducts) > 0)

                                <label for="description">Големина</label>
                                <select class="custom-select pb-10" name="" id="size">
                                    @if (\EasyShop\Models\Product::hasDiscount($product->discount))
                                        <option data-variation-id="{{ $product->id }}"
                                            data-variation-old-price="{{ number_format($product->price, 0, ',', '.') }}"
                                            data-variation-new-price="{{ EasyShop\Models\Product::getPriceRetail1($product, true, 0) }}"
                                            selected>{{ $productTitle[1] }}
                                        </option>
                                    @else
                                        <option data-variation-id="{{ $product->id }}" data-variation-old-price="0"
                                            data-variation-new-price="{{ number_format($product->price, 0, ',', '.') }}"
                                            selected>{{ $productTitle[1] }}
                                        </option>

                                    @endif

                                    @foreach ($parentProducts as $parentProduct)
                                        <?php $productTitle = explode('#', $parentProduct->title)[1]; ?>
                                        <?php
                                        if ($parentProduct->discount) {
                                            $oldPrice = number_format($parentProduct->price_retail_1, 0, ',', '.');
                                            $newPrice = EasyShop\Models\Product::getPriceRetail1($parentProduct, false, 0);
                                        } else {
                                            $oldPrice = 0;
                                            $newPrice = number_format($parentProduct->price_retail_1, 0, ',', '.');
                                        }
                                        ?>
                                        <option data-variation-id="{{ $parentProduct->id }}"
                                            data-variation-new-price="{{ $newPrice }}"
                                            data-variation-old-price="{{ $oldPrice }}">
                                            {{ $productTitle }}
                                        </option>
                                    @endforeach

                                </select>
                            @endif
                            <label for="description">Опис</label>
                            <textarea cols="30" rows="4" data-product-description="" id="user-description"
                                class="text-area-in-form-format"
                                placeholder="Напишете дополнителни спецификации за јадењето"></textarea>

                        </div>
                    </div>
                </div>
                <button type="button" id="modal-add-to-cart-button" data-add-to-cart=""
                    class="modal-btn btn btn-secondary btn-block btn-lg"><span>Додади во кошничка</span></button>
            </div>
        </div>
    </div>

    <!-- Section -->
    <section class="section section-lg dark bg-dark">

        <!-- BG Image -->
        <div class="bg-image bg-parallax"><img src="http://assets.suelo.pl/soup/img/photos/bg-croissant.jpg" alt=""></div>

        <div class="container text-center">
            <div class="col-lg-8 offset-lg-2">
                <h2 class="mb-3">Дали сакате да не посетите?</h2>
                <h5 class="text-muted">Направи резервација или нарачај го своето јадење онлајн!</h5>
                <a href="/c/1/meni" class="btn btn-primary"><span>Нарачај веднаш</span></a>
                <a href="#" class="btn btn-outline-primary"><span>Направи резервација</span></a>
            </div>
        </div>

    </section>

@stop
@section('')

@section('scripts')



    <script>
        $(document).ready(function() {
            if (window.location.pathname == '/') {
                $("#header").removeAttr("class").attr("class", "absolute transparent");
            }
            var product_id;
            var theModal;
            $('#product-single-modal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                var product = button.data('product');
                var modal = $(this);
                theModal = modal;
                modal.find('#product-modal-name').text(product.title.split("#")[0]);
                modal.find('#product-modal-ingredients').text(product.short_description);
                modal.find('#product-modal-price').text(product.price_retail_1 + " МКД");
                modal.find('#modal-add-to-cart-button').attr("value", product.id);
                $('#modal-add-to-cart-button').attr("data-dismiss", "modal");
                product_id = product.id;
                Test(modal);
            });

            function Test(temp) {
                temp.find("#user-description").val("");
            }

            $("#size").change(function() {
                var newPrice = $(this).find(':selected').data('variation-new-price');
                var id = $(this).find(':selected').data('variation-id');
                $("#product-modal-price").text(newPrice + ".00 МКД");
                $('#modal-add-to-cart-button').attr("value", id);
            });

        });
    </script>


@stop

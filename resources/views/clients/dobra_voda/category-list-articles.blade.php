@extends('clients.dobra_voda.layouts.default')
@section('content')

<div class="quicky-content_wrapper pt-30 pb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mb-50 text_align_center">
                <h3>{{ $category->title }} </h3>
            </div>
            <div class="col-lg-3">
                <div class="quicky-sidebar-catagories_area">
                    <div class="quicky-sidebar_categories">
                        <div class="quicky-categories_title first-child">
                            <h5>Цена:</h5>
                        </div>
                        <div class="price-filter">
                            <div data-price-slider="" id="slider-range"></div>
                        </div>
                    </div>
                    @include('clients.dobra_voda.category-list-article-leftSide')
                </div>
            </div>
            <div class="col-lg-9">
                <div class="shop-toolbar">
                    <div class="product-view-mode">
                        <a class="active grid-3" data-target="gridview-3" data-toggle="tooltip" data-placement="top" title="Grid View"><i class="zmdi zmdi-grid"></i></a>
                        <a class="list" data-target="listview" data-toggle="tooltip" data-placement="top" title="List View"><i class="zmdi zmdi-view-list-alt"></i></a>
                    </div>
                    <div class="product-item-selection_area">
                        <div class="product-short">
                            <form class="shop-ordering inline   ">
                                <div class="shop-ordering-select">
                                    <div class="form-flat-select">
                                        <select data-sort id="sort_by_select" class="nice-select width_150 mr-35 ps-select" title="Подреди по">
                                            <option value="order-ASC" {{$productFilters->selectedSort == 'ordere-ASC' ? 'selected="selected"': ''}}>
                                                Препорачани
                                            </option>
                                            <option value="price-ASC" {{$productFilters->selectedSort == 'price-ASC' ? 'selected="selected"': ''}}>
                                                Цена - растечка
                                            </option>
                                            <option value="price-DESC" {{$productFilters->selectedSort == 'price-DESC' ? 'selected="selected"': ''}}>
                                                Цена - опаѓачка
                                            </option>
                                            <option value="created_at" {{$productFilters->selectedSort == 'created_at' ? 'selected="selected"': ''}}>
                                                Најнови
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="shop-ordering-select">
                                    <div class="form-flat-select">
                                        <select data-per-page name="results_limit" id="result_limit" class="nice-select ps-select" title="Прикажи">
                                            <option value="12" {{$productFilters->limit == 12 ? 'selected="selected"': ''}}>
                                                12
                                            </option>
                                            <option value="36" {{$productFilters->limit == 36 ? 'selected="selected"': ''}}>
                                                36
                                            </option>
                                            <option value="99" {{$productFilters->limit == 99 ? 'selected="selected"': ''}}>
                                                99
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>


                <div class="shop-product-wrap grid gridview-3 row">
                    <div class="w-100" data-products-list="">
                        @include('clients.dobra_voda.partials.category-products-list')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@stop


@section('scripts')
<script>
    $(document).ready(function() {

        $('.irs-diapason').css("background", "#DDEEE9");
        $('.irs-slider').css("background", "#4d9983");

        $('#exampleModalCenter').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var product = button.data('product');
            var newprice = button.data('newprice');
            var oldprice = button.data('oldprice');
            var image_modal = button.data('image');
            var modal = $(this);
            modal.find('.modal-body #image_modal').attr('src', image_modal);
            modal.find('.modal-body #modal_button').attr('value', product['id']);
            modal.find('.modal-body #title_modal').text(product['title']);
            modal.find('.modal-body #description_modal').html(product['description']);
            if (!(typeof oldprice === "undefined")) {

                modal.find('.modal-body #old_price_modal').text(oldprice);
            } else {

                modal.find('.modal-body #old_price_modal').remove();
            }
            modal.find('.modal-body #new_price_modal').text(newprice);
        })
    });
</script>
@stop
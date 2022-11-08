@extends('clients.luxbox.layouts.default')
@section('content')

<style>
  .price-slider-header {
    padding-bottom: 15px !important;
  }

  .irs-diapason {
    background: black;
    height: 7px;
  }

  .irs-slider.from,
  .irs-slider.to {
    background: black;
  }

  .filter-checkbox {
    width: auto;
  }
</style>

<div class="page-content">
  <section class="breadcrumb-{{$category->url}} breadcrumb-section section-box">
    <div class="container">
      <div class="breadcrumb-inner">
        <h1>{{ $category->title }}</h1>
      </div>
    </div>
  </section>
  <section class="featured-hp-1 items-hp-6 shop-full-page shop-right-siderbar">
    <div class="container">
      <div class="featured-content woocommerce">
        <div class="row">
          <div class="col-9 offset-3">
            <div class="storefront-sorting">
              <div class="row row_display width_100">
                <div class="col-12">
                  <div class="row">
                    <div class="col-lg-3 offset-lg-7 col-md-6 offset-md-3 font-13">Подреди по
                      <select data-sort id="sort_by_select" class="custom-select form-control" title="Подреди по">
                        
                        <option value="price-ASC" {{$productFilters->selectedSort == 'price-ASC' ? 'selected="selected"': ''}}>
                          Цена - растечка
                        </option>
                        <option value="price-DESC" {{$productFilters->selectedSort == 'price-DESC' ? 'selected="selected"': ''}}>
                          Цена - опаѓачка
                        </option>
                        <option value="order-ASC" {{$productFilters->selectedSort == 'order-ASC' ? 'selected="selected"': ''}}>
                          Препорачани
                        </option>
                        <option value="created_at" {{$productFilters->selectedSort == 'created_at' ? 'selected="selected"': ''}}>
                          Најнови
                        </option>
                      </select>
                    </div>
                    <div class="col-lg-2 col-md-3 padding_right_0 font-13">Прикажи
                      <select data-per-page name="results_limit" id="result_limit" class="custom-select form-control" title="Прикажи">
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

                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-3 col-md-3 col-12 col_filters">
            <div class="widget widget_shop_categories">
              @if (count($filters))
              <h4 id="filters_switch" class="button_filters_toggle_mobilna">Филтри<span class="pull-right right">&rarr;</span></h4>

              <ul id="filters">
                @foreach($filters as $filter)
                <li class="filter_name">
                  <h5>{{$filter->name}} <span class="pull-right right">&rarr;</span></h5>
                  <hr>
                  <ul class="filter_attributes attributes_hide">
                    @foreach($filter->attributes as $attribute)
                    <li>
                      <input data-attribute="" id="{{$attribute->id}}" data-id="{{$attribute->id}}" data-filter-id="{{$filter->id}}" class="filter-checkbox" type="checkbox" />
                      <label for="{{ $attribute->id }}">{{$attribute->value}} </label>
                    </li>
                    @endforeach
                    <br>
                  </ul>
                  @endforeach
                </li>
              </ul>
              @endif
            </div>
            <br>
          </div>
          <div class="col-lg-9 col-md-9  col-12">
            <div class="content-area">

              <div class="row row_display" data-products-list="">
                @include('clients.luxbox.partials.category-products-list')
              </div>

            </div>

          </div>
        </div>
      </div>
    </div>
  </section>
</div>
@stop
@section('scripts')
<script>
  $(document).ready(function() {
    $("#filters_switch").click(function() {
      $(this).siblings('#filters').toggleClass('filters_show');
      if ($(this).children("span").hasClass("right")) {
        $(this).children("span").html("&uarr;");
        $(this).children("span").removeClass("right")
      } else {
        $(this).children("span").html("&rarr;");
        $(this).children("span").addClass("right")
      }
    })
    $(".filter_name").click(function() {
      $(this).children('.filter_attributes').toggleClass('attributes_hide');
      if ($(this).children('h5').children("span").hasClass("right")) {
        $(this).children('h5').children("span").html("&uarr;");
        $(this).children('h5').children("span").removeClass("right")
      } else {
        $(this).children('h5').children("span").html("&rarr;");
        $(this).children('h5').children("span").addClass("right")
      }

    })
    $("#filter_toggle").click(function() {
      $('#filters').toggleClass("filters_hide");
      $('#filters').toggleClass("filters_show");
    });
    $(window).resize(function() {
      if ($(window).width() > 575) {
        $('#filters').addClass("filters_show");
        $('#filters').removeClass("filters_hide");
      }
    });
    $(window).resize(function() {
      if ($(window).width() <= 575) {
        $('#filters').removeClass("filters_show");
        $('#filters').addClass("filters_hide");
      }
    });


  });
</script>
@stop
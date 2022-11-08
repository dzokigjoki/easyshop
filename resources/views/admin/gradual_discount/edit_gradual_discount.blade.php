@extends('layouts.admin')
@section('content')
<style>
    .flex-centered {
        display: flex !important;
        align-content: center !important;
    }
</style>
<div class="content">
    <div class="page-content-inner">
        <div class="row">
            <div class="col-md-12">
                <form class="form-horizontal form-row-seperated" role="form"
                    action="{{ route('admin.gradual-discounts.update') }}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <input type="hidden" name="gradualDiscountId" value="{{ $gradualDiscount->id }}">
                    <div class="portlet light portlet-fit ">
                        <div class="portlet-title">
                            <div class="caption">
                                <span class="caption-subject font-blue-soft bold uppercase"> Промена на степенаст попуст
                                    - {{ $gradualDiscount->name }} </span>
                            </div>

                            <div class="actions btn-set pull-right">
                                <a class="btn btn-secondary-outline"
                                    href="{{route('admin.gradual-discounts')}}">Назад</a>
                                <button class="btn btn-info blue-soft" name="zacuvaj" value="zacuvaj" type="submit"><i
                                        class="fa fa-check"></i> Зачувај</button>
                            </div>
                        </div>
                        <div class="portlet-body">

                            @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                            <div class="tabbable-line">
                                <div class="tab-pane active" id="tab_general">
                                    <div class="form-body">
                                        <div class="row form-group">
                                            <div class="flex-centered col-lg-4">
                                                <label class="col-md-4">Име: </label>
                                                <div class="col-md-8">
                                                    <input id="ime" name="name" class="form-control"
                                                        value="{{ $gradualDiscount->name }}" type="text" />
                                                </div>
                                            </div>
                                            <div class="flex-centered col-lg-8">
                                                <label class="col-md-4">Означи како попуст од:</label>
                                                <div class="col-md-8">
                                                    <div class="input-group date-picker input-daterange"
                                                        data-date-week-start="1" data-date="10.11.2012"
                                                        data-date-format="dd.mm.yyyy">
                                                        <input type="text" class="form-control" name="start"
                                                            style="text-align: left"
                                                            value="{{\Carbon\Carbon::parse($gradualDiscount->start)->format('d.m.Y')}}"
                                                            id="popust_start" />
                                                        <span class="input-group-addon"> до : </span>
                                                        <input type="text" class="form-control" name="end"
                                                            style="text-align: left"
                                                            value="{{\Carbon\Carbon::parse($gradualDiscount->end)->format('d.m.Y')}}"
                                                            id="popust_end" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row form-group">
                                            <div style="box-shadow: none" class="portlet light portlet-fit ">
                                                <div class="portlet-title">
                                                    <div class="caption">
                                                        <span class="caption-subject font-blue-soft bold uppercase">
                                                            Додади нов продукт
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="col-md-4 text-left">Избери продукт:</div>
                                                <br><br>
                                                <div class="col-md-4">
                                                    <div class="input-group input-daterange">
                                                        <select data-product-id=""
                                                            class="select2" type="text">
                                                            @foreach($productsList as $product)
                                                            <option value="{{ $product->id }}">
                                                                {{ $product->title }}
                                                            </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col-md-12 text-right">
                                                <div class="input-group date-picker input-daterange">
                                                    <button style="font-size:24px; padding: 0 15px;"
                                                        id="add_new_gradual_discount_product" type="button"
                                                        class="btn blue-soft">
                                                        +
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        @if(count($gradualDiscount->products) > 0)
                                        <div style="padding:15px;" class="row form-group">
                                            <div style="box-shadow: none" class="portlet light portlet-fit ">
                                                <div style="padding:0;" class="portlet-title">
                                                    <div class="caption">
                                                        <span class="caption-subject font-blue-soft bold uppercase">
                                                            Листа на продукти
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <table class="table table-striped" gradual-discount-products-table="">
                                                <thead>
                                                    <tr>
                                                        <td>
                                                            ID
                                                        </td>
                                                        <td>
                                                            Име
                                                        </td>
                                                        <td>
                                                            Залиха
                                                        </td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($gradualDiscount->products as $product)
                                                    <tr>
                                                        <td>{{ $product->id }}</td>
                                                        <td>{{ $product->title }}</td>
                                                        <td>{{ $product->total_stock }}</td>
                                                        <td>
                                                            <a data-gradual-discount-product-delete
                                                                data-gradual-discount-product-id="{{ $product->id }}"
                                                                data-gradual-discount-id="{{ $gradualDiscount->id }}">
                                                                <i class="fa fa-trash-o"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        @endif
                                        <div class="row form-group">
                                            <label id="errors" style="color:red;" class="text-left col-md-12"></label>
                                        </div>
                                        <div class="row form-group">
                                            <div style="box-shadow: none" class="portlet light portlet-fit ">
                                                <div class="portlet-title">
                                                    <div class="caption">
                                                        <span class="caption-subject font-blue-soft bold uppercase">
                                                            Додади нова ставка
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex-centered col-lg-6">
                                                <label class="col-md-6 text-left">Минимум број на
                                                    продукти:</label>
                                                <div class="col-md-6">
                                                    <div class="input-group input-daterange">
                                                        <input data-number-of-items name="number_of_items"
                                                            class="form-control" value="" type="text" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex-centered col-lg-6">
                                                <label class="col-md-4 text-left">Попупст (%):</label>
                                                <div class="col-md-8">
                                                    <div class="input-group input-daterange">
                                                        <input data-discount-percentage name="discount_percentage"
                                                            class="form-control" value="" type="text" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col-md-12 text-right">
                                                <div class="input-group date-picker input-daterange">
                                                    <button style="font-size:24px; padding: 0 15px;"
                                                        id="add_new_gradual_discount_item" type="button"
                                                        class="btn blue-soft">
                                                        +
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        @if(count($gradualDiscount->items) > 0)
                                        <div style="padding:15px;" class="row form-group">
                                            <div style="box-shadow: none" class="portlet light portlet-fit ">
                                                <div style="padding:0;" class="portlet-title">
                                                    <div class="caption">
                                                        <span class="caption-subject font-blue-soft bold uppercase">
                                                            Листа на ставки
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <table class="table table-striped" gradual-discount-items-table="">
                                                <thead>
                                                    <tr>
                                                        <td>
                                                            Број на продукти
                                                        </td>
                                                        <td>
                                                            Попупст
                                                        </td>
                                                        <td>
                                                            Акции
                                                        </td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($gradualDiscount->items as $item)
                                                    <tr>
                                                        <td>{{ $item->number_of_items }} Продукт/и </td>
                                                        <td>{{ $item->discount_percentage }}%</td>
                                                        <td>
                                                            <a data-gradual-discount-item-delete
                                                                data-item-id="{{ $item->id }}">
                                                                <i class="fa fa-trash-o"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div style="text-align:right;padding-top: 10px;" class="actions btn-set">
                                    <a class="btn btn-secondary-outline"
                                        href="{{route('admin.gradual-discounts')}}">Назад</a>
                                    <button class="btn btn-info blue-soft" name="zacuvaj" value="zacuvaj"
                                        type="submit"><i class="fa fa-check"></i> Зачувај</button>
                                </div>
                                <input type="hidden" id="gradual_discount_id" value="{{ $gradualDiscount->id }}">
                                <input type="hidden" id="number_of_gradual_discounts"
                                    value="{{ $gradualDiscount->number_of_gradual_discounts }}">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- END PAGE CONTENT INNER -->

@stop
@section('scripts')
<script src="/assets/admin/global/plugins/redactor/redactor.min.js" type="text/javascript"></script>
<script src="/assets/admin/global/plugins/redactor/alignment.js" type="text/javascript"></script>
<script src="/assets/admin/global/plugins/redactor/source.js" type="text/javascript"></script>
<script src="/assets/admin/global/plugins/redactor/table.js" type="text/javascript"></script>
<script src="/assets/admin/global/plugins/redactor/video.js" type="text/javascript"></script>
<script src="/assets/admin/global/plugins/redactor/fontcolor.js" type="text/javascript"></script>
<script src="/assets/admin/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
<script src="/assets/admin/js/pages/articles.js?v=1" type="text/javascript"></script>
<script src="/assets/admin/pages/scripts/ecommerce-products.js" type="text/javascript"></script>
<script src="/assets/admin/pages/scripts/ecommerce-products-edit.js" type="text/javascript"></script>
{{--@if($product_id)--}}
{{--<script src="/assets/admin/js/pages/editArticleDatatable.js" type="text/javascript"></script>--}}
{{--@endif--}}
<script>
    $('.select2').select2({ width: '100%'});
    $('#add_new_gradual_discount_item').on('click', function() {
        var $this = $(this);
        var discount_percentage = $('[data-discount-percentage]').val();
        var number_of_items = $('[data-number-of-items]').val();
        var gradual_discount_id = $('#gradual_discount_id').val();
        var number_of_gradual_discounts = $('#number_of_gradual_discounts').val();
        $.post( "{{ route('admin.gradual-discount-items.store') }}",{
            discount_percentage: discount_percentage,
      		number_of_items: number_of_items,
      		gradual_discount_id: gradual_discount_id,
            number_of_gradual_discounts: number_of_gradual_discounts
      	} ,function( data ) {		 
              if(data.message == 1) {
                $('[gradual-discount-items-table]').show();
                $('[gradual-discount-items-table] > tbody:last-child').append(`<tr>
                    <td>${number_of_items} Продукт/и</td>
                    <td>${discount_percentage}%</td>
                    <td>
                        <a data-gradual-discount-item-delete data-item-id="${data.gradualDiscountItemId}">
                            <i class="fa fa-trash-o"></i>
                        </a>
                    </td>
                </tr>`);
                $('[data-discount-percentage]').val('');
                $('[data-number-of-items]').val('');
              } else {
                $('#errors').text(data.message);
              }
		});
      });
      $('#add_new_gradual_discount_product').on('click', function() {
        var $this = $(this);
        var productId = $('[data-product-id]').val();
        var gradual_discount_id = $('#gradual_discount_id').val();
        $.post( "{{ route('admin.gradual-discount-products.store') }}",{
            productId: productId,
      		gradual_discount_id: gradual_discount_id,
      	} ,function( data ) {		 
              if(data.message == 1) {
                $('[gradual-discount-products-table] > tbody:last-child').append(`<tr>
                    <td>${productId}</td>
                    <td>${data.product.title}</td>
                    <td>${data.product.total_stock}</td>
                    <td>
                        <a data-gradual-discount-product-delete data-gradual-discount-product-id="${data.gradualDiscountProductId}" data-gradual-discount-id="${gradual_discount_id}">
                            <i class="fa fa-trash-o"></i>
                        </a>
                    </td>
                </tr>`);
                $('[data-discount-percentage]').val('');
                $('[data-number-of-items]').val('');
              } else {
                $('#errors').text(data.message);
              }
		});
      });
      $("[data-gradual-discount-item-delete]").on('click',function(){
        let gradualDiscountItemId = $(this).attr('data-item-id');
        let $this = $(this);
        $.ajax({
            type: "DELETE",
            url: '/admin/gradual-discount-items/delete/'+gradualDiscountItemId,
            success: function(res) 
            {
                $this.closest('tr').remove();
            }
        });
      });  
      $("[data-gradual-discount-product-delete]").on('click',function(){
        let gradualDiscountProductId = $(this).attr('data-gradual-discount-product-id');
        let gradualDiscountId = $(this).attr('data-gradual-discount-id');
        let $this = $(this);
        $.ajax({
            type: "DELETE",
            url: '/admin/gradual-discount-products/delete/'+gradualDiscountId+'/'+gradualDiscountProductId,
            success: function(res) 
            {
                $this.closest('tr').remove();
            }
        });
      });  
</script>
@stop
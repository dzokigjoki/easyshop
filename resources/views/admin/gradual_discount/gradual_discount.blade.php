@extends('layouts.admin')
@section('content')
<style>
    .align-middle {
        vertical-align: middle !important;
    }
</style>
<?php  
    $global_prices = \EasyShop\Models\AdminSettings::getField('prices');   
    $sifra = \EasyShop\Models\AdminSettings::getField('sifra');
?>
<div class="page-content-inner">
    <div class="row">
        <div class="col-md-12">
            <div class="modal fade" tabindex="-1" role="basic" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title bold">Додади степенаст попуст</h4>
                        </div>
                        <div class="modal-body col-md-12">
                            <div class="row form-group">
                                <div class="col-md-4">
                                    <label class="control-label">Име</label>
                                </div>
                                <div class="col-md-8">
                                    <input id="ime" name="value" class="form-control" value="" type="text" />
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="col-md-4 control-label">Означи како попуст од:</label>
                                <div class="col-md-8">
                                    <div class="input-group date-picker input-daterange" data-date-week-start="1"
                                        data-date="10.11.2012" data-date-format="dd.mm.yyyy">
                                        <input type="text" class="form-control" name="start" style="text-align: left"
                                            value="{{date('d.m.Y', strtotime(date('Y-m-d')))}}" id="popust_start" />
                                        <span class="input-group-addon"> до : </span>
                                        <input type="text" class="form-control" name="end" style="text-align: left"
                                            value="{{date('d.m.Y', strtotime('+1 week'))}}" id="popust_end" />
                                    </div>
                                </div>
                            </div>
                            <div id="gradual_discount_items">
                                <hr>
                                <div class="row form-group">
                                    <label id="errors" style="color:red;" class="col-md-12 control-label"></label>
                                </div>
                                <div class="row form-group">
                                    <label class="col-md-4 control-label">Минимум број на продукти:</label>
                                    <div class="col-md-8">
                                        <div class="input-group input-daterange">
                                            <input data-number-of-items name="number_of_items" class="form-control"
                                                value="" type="text" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label class="col-md-4 control-label">Попупст(%):</label>
                                    <div class="col-md-8">
                                        <div class="input-group input-daterange">
                                            <input data-discount-percentage name="discount_percentage"
                                                class="form-control" value="" type="text" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-md-12 text-right">
                                        <div class="input-group date-picker input-daterange">
                                            <button style="font-size:24px; padding: 0 15px;"
                                                id="add_new_gradual_discount_item" type="button" class="btn blue-soft">
                                                +
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div style="padding:15px;" class="row form-group">
                                    <table class="table table-striped" gradual-discount-items-table="">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    Број на продукти
                                                </td>
                                                <td>
                                                    Попупст(%)
                                                </td>
                                                <td>
                                                    Акции
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn dark btn-outline" data-dismiss="modal">
                                Откажи
                            </button>
                            <button id="gradual_discount_save" type="button" class="btn blue-soft">
                                Зачувај
                            </button>
                            <button id="gradual_discount_finish" type="button" class="btn blue-soft">
                                Зачувај
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="portlet light ">
                <div class="portlet-title">
                    <div class="caption">
                        <span class="caption-subject font-blue-soft bold uppercase">Степенаст Попуст</span>
                    </div>
                    <div class="btn-group pull-right">
                        <a class="btn btn-info blue-soft" id="dodadi_popust">
                            <i class="fa fa-plus"></i> Додади степенаст попуст
                        </a>
                    </div>
                </div>
                <div class="portlet-body">
                    <table articles-table class="table table-striped table-bordered table-hover order-column">
                        <thead>
                            <tr>
                                <th class="align-middle">Залиха</th>
                                <th class="align-middle">
                                    <select id="stock_select">
                                        <option value="all">Сите</option>
                                        <option value="no_stock">Нема</option>
                                        <option value="in_stock">Има</option>
                                    </select>
                                </th>
                                <th class="align-middle">Категорија</th>
                                <th class="align-middle" colspan="4">
                                    <select id="category_select" style="">
                                        <option value="0">Сите</option>
                                        {{!!$categires_html!!}}
                                    </select>
                                </th>
                            </tr>
                            <tr role="row" class="heading">
                                <th></th>
                                @if($sifra)
                                <th class="tooltips" data-container="body" data-placement="top"
                                    data-original-title="Шифра"> Шифра</th>
                                @endif
                                <th class="tooltips" data-container="body" data-placement="top"
                                    data-original-title="Име на артикл"> Артикл</th>
                                <th class="tooltips" data-container="body" data-placement="top"
                                    data-original-title="Малопродажна 1"> Цена</th>
                                <th class="tooltips" data-container="body" data-placement="top"
                                    data-original-title="Вкупна залиха во сите магацини"> Залиха</th>
                                <th> Активен</th>
                                <th data-orderable="false"> Акции</th>
                            </tr>

                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <input type="hidden" class="productIds" id="productIds" name="productIds[]" value="">
        <input type="hidden" id="gradual_discount_id" value="">
        <input type="hidden" id="number_of_gradual_discounts" value="">
    </div>
</div>
@stop
@section('scripts')
<script type="text/javascript">
    var Articles = (function(){

        var SELECTORS = {
            ARTICLES_TABLE: '[articles-table]'
        };

        var Articles = {
            init: function() {
                $(document).ready(this.handleDocumentReady.bind(this));
            },

            handleDocumentReady: function() {
                this.initArticlesTable();
            },

            initArticlesTable: function() {
                window.ddt = $(SELECTORS.ARTICLES_TABLE).dataTable({
                    "processing": true,
                    "serverSide": true,
                    "ajax": {
                        "url": "{{ route('admin.gradual-discount.datatable.list') }}",
                        "type": "POST",
                       "data": function ( d ) {
                             return $.extend( {}, d, {                               
                               "inStock": $("#stock_select").val(),
                               "category": $("#category_select").val(),                          
                             } );
                          }
                    },
                    "language": {
                        url: EsConfig.routes.datatableLanguage
                    },
                    scrollY:        300,
			        //scrollX:        false,
			        deferRender:    true,
			        scroller:       true,
			        'columnDefs': [{
			        'targets': 0,
                    'checkboxes': {
                        'selectRow': true,
                        'stateSave': true,
                    },
			        'searchable':false,
			        'orderable':false,
			        'className': 'dt-body-center',
			      	}],
                    "stateSave": true,
                    "stateSaveParams": function (settings, data) {
                        if (settings.checkboxes.s.data) {
                            var productIds = settings.checkboxes.s.data.map(function(checkbox) {
                                return Object.keys(checkbox);
                            });
                            $('#productIds').val(productIds);
                        }
                    },
                    "stateLoadParams": function (settings, data) {
                        var productIds = data.checkboxes.map(function(checkbox) {
                            return Object.keys(checkbox);
                        });
                        $('#productIds').val(productIds);
                    },
                    'select': 'multi',
			        'order': [1, 'asc'],
                    // setup buttons extension: http://datatables.net/extensions/buttons/
                    buttons: [],
                    lengthMenu:  [ 10, 25, 50, 75, 100 ],
                    "pageLength": 50,
                    "dom": "<'row' <'col-md-12'B>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-8 col-sm-12'p>>" // horizobtal scrollable datatable

                });
            }
        };
        
        return Articles;
    })();

    Articles.init();

    $('#stock_select,#category_select').on('change',function(){
        $('[articles-table]').DataTable().ajax.reload(); //Exact value, column, reg
    });

    $(document).ready(function() {
      $('#gradual_discount_finish').hide();
      $('#stock_select,#category_select').select2({ width: '100%' });

      $('#dodadi_popust').on('click',function(){
        var productIds = $('#productIds').val().split(',');
        if(productIds.length > 1) {
            $('.modal').modal('toggle');
        } else {
            sweetAlert("", "Ве молиме изберете барем два артикли!", "warning");
        }
      });

      $('#gradual_discount_items').hide();
      $('[gradual-discount-items-table]').hide();

      $("#gradual_discount_save").on('click',function(){
        var productIds = $('#productIds').val().split(',');
      	$.post( "{{ route('admin.gradual-discounts.store') }}",{
      		name:$('#ime').val(),
      		start:$('#popust_start').val(),
      		end:$('#popust_end').val(),
      		'products':productIds,
      	} ,function( data ) {		 
              if(data.message == 1) {
                $('#gradual_discount_items').show();
                $('#gradual_discount_save').hide();
                $('#gradual_discount_finish').show();
                $('#gradual_discount_id').val(data.gradualDiscountId);
                $('#number_of_gradual_discounts').val(data.numberOfGradualDiscounts);
              } else {
                $('#errors').text(data.message);
              }
		});
      });
      $('#gradual_discount_finish').on('click', function() {
            window.location.replace("{{URL::to('admin/gradual-discounts')}}");
      })
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
            number_of_gradual_discounts: number_of_gradual_discounts,
      	} ,function( data ) {		 
              if(data.message == 1) {
                $('[gradual-discount-items-table]').show();
                $('[gradual-discount-items-table] > tbody:last-child').append(`<tr>
                    <td>${number_of_items}</td>
                    <td>${discount_percentage}</td>
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
      $("[gradual-discount-items-table]").on('click', '[data-gradual-discount-item-delete]', function(){
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
    });
</script>
<script src="/assets/admin/pages/scripts/ecommerce-products.js" type="text/javascript"></script>
@stop
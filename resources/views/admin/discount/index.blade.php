
@extends('layouts.admin')
@section('head')
    <link href="/assets/admin/global/plugins/bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet" type="text/css" />
    <link href="/assets/admin/global/plugins/jquery-multi-select/css/multi-select.css" rel="stylesheet" type="text/css" />
    <link href="/assets/admin/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="/assets/admin/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />

    <link href="/assets/admin/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
    <link href="/assets/admin/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />
@stop
@section('content')
<?php  $global_prices = \EasyShop\Models\AdminSettings::getField('prices');
       $column_values = $global_prices;
       unset($column_values['diners24']);
       unset($column_values['nlb24']);
       
       $array_count_values =  count(array_filter($column_values));
 ?>
    <div class="page-content-inner">       
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN SAMPLE TABLE PORTLET-->
                <div class="portlet light ">
                    <div class="portlet-title">
                        <div class="caption">
                            <span class="caption-subject font-green bold uppercase">Листа попусти</span>
                        </div>                        
                    </div>
                    <div class="portlet-body">

                        <table class="table table-hover table-light" style="border-top-width: 0px;">
                            <tr>
                                <td style="width:9%;">Тип попуст</td>
                                <td style="width:20%;">
                                    <select  id="filter_tip" class="select2">
                                        <option value="">Сите</option>
                                        <option value="percent">Процент</option>
                                        <option value="fixed">Износ</option>
                                    </select>
                                </td>
                                <td style="width:10%;">Име попуст</td>
                                <td style="width:30%;">
                                    <select id="popust_name" class="select2">
                                            <option value="">Сите</option>
                                           @foreach($disc_name as $dn)
                                            <option value="{{$dn}}">{{$dn}}</option>
                                           @endforeach
                                        </select>
                                </td>
                                <td colspan="<?php echo $array_count_values + 4; ?>"></td>

                            </tr>
                        </table>
                        <table articles-table class="table table-striped table-bordered table-hover order-column">
                            <thead>        
                                <tr>
                                    <th colspan="<?php echo 8+$array_count_values; ?>">
                                        <button id="delete_discount" class="btn btn-circle btn-default ">Избриши</button>
                                    </th>                                    
                                </tr>                        
                                <tr role="row" class="heading">
                                    <th></th>
                                    <th>Шифра</th>
                                    <th class="tooltips" data-container="body" data-placement="top" data-original-title="Име на артикл"> Артикл</th>                                 
                                    <th class="tooltips" data-container="body" data-placement="top" data-original-title="Име">Име</th>
                                    <th class="tooltips" data-container="body" data-placement="top" data-original-title="Тип">Тип</th>
                                    <th class="tooltips" data-container="body" data-placement="top" data-original-title="Вредност">Вредност</th>
                                    <th class="tooltips" data-container="body" data-placement="top" data-original-title="Од датум">Од</th>
                                    <th class="tooltips" data-container="body" data-placement="top" data-original-title="До датум">До</th>
                                    @if($global_prices['retail1'])
                                    <th class="tooltips" data-container="body" data-placement="top" data-original-title="Малопродажна 1"> МП 1</th>
                                    @endif
                                    @if($global_prices['retail2'])
                                    <th class="tooltips" data-container="body" data-placement="top" data-original-title="Малопродажна 2"> МП 2</th>
                                    @endif
                                    @if($global_prices['wholesale1'])
                                    <th class="tooltips" data-container="body" data-placement="top" data-original-title="Големопродажна 1"> ГП 1</th>
                                    @endif
                                    @if($global_prices['wholesale2'])
                                    <th class="tooltips" data-container="body" data-placement="top" data-original-title="Големопродажна 2"> ГП 2</th>
                                    @endif
                                    @if($global_prices['wholesale3'])
                                    <th class="tooltips" data-container="body" data-placement="top" data-original-title="Големопродажна 3"> ГП 3</th>
                                    @endif
                                    <th>Акција</th>
                                </tr>

                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
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
                        "url": "{{ route('admin.listdiscount') }}",
                        "type": "GET",
                       "data": function ( d ) {
                             return $.extend( {}, d, {                               
                               "type": $("#filter_tip").val(),
                               "name": $("#popust_name").val(),                          
                             } );
                          }
                    },
                    "language": {
                        url: EsConfig.routes.datatableLanguage
                    },
                    'columnDefs': [{
                                  'targets': 0,
                                  'searchable':false,
                                  'orderable':false,
                                  'className': 'dt-body-center',
                                  'render': function (data, type, full, meta){
                                       return '<input type="checkbox" class="discount_id" name="discount_id[]" value="' 
                                          + $('<div/>').text(data).html() + '">';
                                  }
                                  }],
                    
                    // setup buttons extension: http://datatables.net/extensions/buttons/
                    buttons: [

                    ],
                    lengthMenu:  [ 10, 25, 50, 75, 100 ],

                    // set the initial value
                    "pageLength": 50,
                    "dom": "<'row' <'col-md-12'B>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>" // horizobtal scrollable datatable

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
      
      $("#delete_discount").on('click',function(){
            var coupons_id = [];
            $.each($(".discount_id:checked"), function( index, value ) {
                coupons_id.push($(value).val());
            }); 
            $.post( "{{ route('admin.deleteDiscounts') }}",{
                'discounts':coupons_id                
            } ,function( data ) {          
               $('[articles-table]').DataTable().ajax.reload(); 
            });
      });


      $('#stock_select,#category_select,#kupon_tip,#popust_tip,#filter_tip,#popust_name').select2({ width: '100%' });



      $('#filter_tip,#popust_name').on('change',function(){
        $('[articles-table]').DataTable().ajax.reload(); //Exact value, column, reg
      });

      $("#popust_save").on('click',function(){
        
        var products_id = [];
        $.each($(".products_id:checked"), function( index, value ) {
          products_id.push($(value).val());
        }); 

        $.post( "{{ route('admin.storediscount') }}",{
            'products':products_id,
            discount_type:$("#kupon_tip").val(),
            type:$('#popust_tip').val(),
            value:$('#popust_value').val(),
            start:$('#popust_start').val(),
            end:$('#popust_end').val(),
            group_retail_1:$(".grap_retail_1:checked").length,
            group_retail_2:$(".grap_retail_2:checked").length,
            group_wholesale_1:$(".grap_wholesale_1:checked").length,
            group_wholesale_2:$(".grap_wholesale_2:checked").length,
            group_wholesale_3:$(".grap_wholesale_3:checked").length,
            name:$('#ime').val()

        } ,function( data ) {
          
            $('#popust_tip').val('');
            $('#popust_value').val('');
            $('#popust_start').val('');
            $('#popust_end').val('');
            $(".grap_retail_1:checked").val('');
            $(".grap_retail_2:checked").val('');
            $(".grap_wholesale_1:checked").val('');
            $(".grap_wholesale_2:checked").val('');
            $(".grap_wholesale_3:checked").val('');
            $(".modal").modal('toggle');
        });

      });

    });
    </script>
@stop
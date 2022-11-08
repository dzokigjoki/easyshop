
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
<?php  $global_prices = \EasyShop\Models\AdminSettings::getField('prices');   ?>
    <div class="page-content-inner">       
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN SAMPLE TABLE PORTLET-->
                <div class="portlet light ">
                    <div class="portlet-title">
                        <div class="caption">
                            <span class="caption-subject font-green bold uppercase">Листа купони</span>
                        </div>                        
                    </div>
                    <div class="portlet-body">
                        
                        <table articles-table class="table table-striped table-bordered table-hover order-column">
                            <thead> 
                                <tr>
                                    <th>
                                        <button id="delete_coupon" class="btn btn-circle btn-default ">Delete</button>
                                    </th>
                                </tr>                               
                                <tr role="row" class="heading">
                                    <th></th>
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
                        "url": "{{ route('admin.listcoupon') }}",
                        "type": "GET",
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
                    'columnDefs': [{
                                  'targets': 0,
                                  'searchable':false,
                                  'orderable':false,
                                  'className': 'dt-body-center',
                                  'render': function (data, type, full, meta){
                                       return '<input type="checkbox" class="coupons_id" name="coupons_id[]" value="' 
                                          + $('<div/>').text(data).html() + '">';
                                  }
                                  }],
                    
                    // setup buttons extension: http://datatables.net/extensions/buttons/
                    buttons: [
                        /* { extend: 'print', className: 'btn dark btn-outline' },
                        { extend: 'copy', className: 'btn red btn-outline' },
                        { extend: 'pdf', className: 'btn green btn-outline' },
                        { extend: 'excel', className: 'btn yellow btn-outline ' },
                        { extend: 'csv', className: 'btn purple btn-outline ' },
                        { extend: 'colvis', className: 'btn dark btn-outline', text: 'Columns'} */
                    ],
                    lengthMenu:  [ 10, 25, 50, 75, 100 ],
                    
//                    "order": [
//                        [0, 'asc']
//                    ],
//                    "columns": [
//
//                        { "data": "product_id" },
//                        { "data": "last_name" },
//                        { "data": "position" },
//                        { "data": "office" },
//                        { "data": "start_date" },
//                        { "data": "salary" }
//                    ],
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
      
      $('#stock_select,#category_select,#kupon_tip,#popust_tip').select2({ width: '100%' });
      $("#delete_coupon").on('click',function(){
            var coupons_id = [];
            $.each($(".coupons_id:checked"), function( index, value ) {
                coupons_id.push($(value).val());
            }); 
            $.post( "{{ route('admin.deleteCoupon') }}",{
                'coupons':coupons_id                
            } ,function( data ) {          
               $('[articles-table]').DataTable().ajax.reload(); 
            });
      });

    });
    </script>
@stop
@extends('layouts.admin')
@section('head')
<link href="/assets/admin/global/plugins/bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet"
    type="text/css" />
<link href="/assets/admin/global/plugins/jquery-multi-select/css/multi-select.css" rel="stylesheet" type="text/css" />
<link href="/assets/admin/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
<link href="/assets/admin/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />

<link href="/assets/admin/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
<link href="/assets/admin/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet"
    type="text/css" />
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
                    <table gradual-discounts-table class="table table-striped table-bordered table-hover order-column">
                        <thead>
                            <tr role="row" class="heading">
                                <th class="tooltips" data-container="body" data-placement="top"
                                    data-original-title="Име">Име</th>
                                <th class="tooltips" data-container="body" data-placement="top"
                                    data-original-title="Од датум">Од</th>
                                <th class="tooltips" data-container="body" data-placement="top"
                                    data-original-title="До датум">До</th>
                                <th class="tooltips" data-container="body" data-placement="top"
                                    data-original-title="Број на Продукти">Продукти</th>
                                <th data-orderable="false"> Акции</th>
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
            ARTICLES_TABLE: '[gradual-discounts-table]'
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
                        "url": "{{ route('admin.gradual-discounts.list') }}",
                        "type": "GET",
                       "data": function ( d ) {
                             return $.extend( {}, d, {                               
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
                                  'className': 'dt-body-center'
                                  }],                    
                    buttons: [],
                    lengthMenu:  [ 10, 25, 50, 75, 100 ],
                    "pageLength": 50,
                    "dom": "<'row' <'col-md-12'B>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>"
                });
            }
        };
        return Articles;
    })();

    Articles.init();
    $('#stock_select,#category_select').on('change',function(){
        $('[gradual-discounts-table]').DataTable().ajax.reload(); //Exact value, column, reg
    });

    $(document).ready(function() {
    $("[gradual-discounts-table]").on('click', '[data-gradual-discount-delete]', function(){
        let gradualDiscountId = $(this).attr('data-id');
        let $this = $(this);
        $.ajax({
            type: "DELETE",
            url: '/admin/gradual-discounts/' + gradualDiscountId,
            data: {
                id: gradualDiscountId,
            },
            success: function(res) 
            {
                $this.closest('tr').remove();
            }
        });
      });
      $('#stock_select,#category_select,#kupon_tip,#popust_tip,#popust_name').select2({ width: '100%' });
      $('#popust_name').on('change',function(){
        $('[gradual-discounts-table]').DataTable().ajax.reload(); //Exact value, column, reg
      });
    });
</script>
@stop
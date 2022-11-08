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
                        <span class="caption-subject font-green bold uppercase">Листа на стикери</span>
                    </div>
                    <div class="btn-group pull-right">
                        <a class="btn btn-info blue-soft" href="{{ route('admin.stickers.new') }}">
                            <i class="fa fa-plus"></i> Додади нов стикер
                        </a>
                    </div>
                </div>
                <div class="portlet-body">
                    <table stickers-table class="table table-striped table-bordered table-hover order-column">
                        <thead>
                            <tr role="row" class="heading">
                                <th class="tooltips" data-container="body" data-placement="top"
                                data-original-title="Име">Име</th>
                                <th class="tooltips" data-container="body" data-placement="top"
                                    data-original-title="Форма">Форма</th>
                                <th class="tooltips" data-container="body" data-placement="top"
                                    data-original-title="Боја">Боја</th>
                                <th class="tooltips" data-container="body" data-placement="top"
                                    data-original-title="Позиција">Позиција</th>
                                <th class="tooltips" data-container="body" data-placement="top"
                                    data-original-title="Содржина">Содржина</th>
                                <th class="tooltips" data-container="body" data-placement="top"
                                    data-original-title="Слика">Слика</th>
                                <th data-container="body" data-placement="top" data-original-title="Акции"
                                    data-orderable="false"> Акции</th>
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
            ARTICLES_TABLE: '[stickers-table]'
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
                        "url": "{{ route('admin.stickers.list') }}",
                        "type": "GET",
                       "data": function ( d ) {
                             return $.extend( {}, d, {} );
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

    $(document).ready(function() {
      $("[stickers-table]").on('click', '[data-sticker-delete]', function(){
        let stickerId = $(this).attr('data-id');
        let $this = $(this);
        $.ajax({
            type: "DELETE",
            url: '/admin/stickers/' + stickerId,
            success: function(res) 
            {
                $this.closest('tr').remove();
            }
        });
      });
    });
</script>
@stop
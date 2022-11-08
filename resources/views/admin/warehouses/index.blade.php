@extends('layouts.admin')
@section('content')
<div class="content">
    <div class="page-content-inner">        
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN SAMPLE TABLE PORTLET-->
                <div class="portlet light ">
                    <div class="portlet-title">
                        <div class="caption">
                            <span class="caption-subject font-green bold uppercase">Магацини</span>
                        </div>
                        <div class="actions">
                            <a class="btn btn-success" href="{{ route('admin.warehouses.new') }}"><i class="fa fa-plus"></i>Нов магацин</a>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <table articles-table class="table table-striped table-bordered table-hover order-column">
                            <thead>
                                
                                <tr role="row" class="heading">
                                    <th class="tooltips" data-container="body" data-placement="top" data-original-title="Име"> Име</th>
                                    <th> Град</th>
                                    <th> Држава</th>
                                    <th> Приоритет</th>                                              
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
                    window.ddt = $(SELECTORS.ARTICLES_TABLE).DataTable({
                        "processing": true,
                        "serverSide": true,
                        "ajax": {
                            "url": "{{ route('admin.warehouses.datatable') }}",
                            "type": "POST"
                        },
                        "language": {
                            url: EsConfig.routes.datatableLanguage
                        },
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
                        stateSave: true,
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
                    });
                }
        };
        
        return Articles;
    })();

    Articles.init();
    $(document).ready(function() {
      
    });
    </script>
@stop
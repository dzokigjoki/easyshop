@extends('layouts.admin')
@section('content')
    <div class="page-content-inner">
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN SAMPLE TABLE PORTLET-->
                <div class="portlet light ">
                    <div class="portlet-title">
                        <div class="caption">
                            <span class="caption-subject font-green bold uppercase">Плаќање</span>
                        </div>
                        <div class="actions">
                           <a class="btn btn-success" href="{{ route('admin.sales.createPayment') }}"><i class="fa fa-plus"></i>Ново плаќање</a> 
                        </div>
                    </div>
                    <div class="portlet-body">
                        <table articles-table class="table table-striped table-bordered table-hover order-column">
                            <thead>
                            <tr role="row" class="heading">
                                <th data-original-title="Број документ"> Број на документ</th>
                                <th class="tooltips" data-container="body" data-placement="top" data-original-title="Презиме"> Тип на документ</th>
                                <th class="tooltips" data-container="body" data-placement="top" data-original-title="Тип на плаќање"> Тип на плаќање</th>
                                <th class="tooltips" data-container="body" data-placement="top" data-original-title="Цена"> Цена</th>
                                <th data-orderable="false"> Датум</th>
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
                    window.ddt = $(SELECTORS.ARTICLES_TABLE).DataTable({
                        "processing": true,
                        "serverSide": true,
                        "ajax": {
                            "url": "{{ route('admin.payments.getPayments') }}",
                            "type": "GET"
                        },
                        "language": {
                            url: EsConfig.routes.datatableLanguage
                        },
                        // setup buttons extension: http://datatables.net/extensions/buttons/
                        buttons: [

                        ],
                        lengthMenu:  [ 10, 25, 50, 75, 100 ],
                        stateSave: true,

                        "pageLength": 50,                        
                    });
                }
            };

            return Articles;
        })();
        Articles.init();
    </script>
@stop
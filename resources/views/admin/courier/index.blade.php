@extends('layouts.admin')

@section('content')
    <div class="page-content-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="portlet light ">
                    <div class="portlet-title">
                        <div class="caption">
                            <span class="caption-subject font-green bold uppercase">Курир служби</span>
                        </div>
                        <div class="actions">
                           <a class="btn btn-success" href="{{ route('admin.couriers.new') }}"><i class="fa fa-plus"></i>Нов Курир</a> 
                        </div>
                    </div>
                    <div class="portlet-body">
                        <table couriers-table class="table table-striped table-bordered table-hover order-column">
                            <thead>
                            <tr role="row" class="heading">
                                <th class="notranslate" data-original-title="Име"> Име</th>
                                <th class="tooltips" data-container="body" data-placement="top" data-original-title="Токен"> Токен</th>
                                <th class="tooltips" data-container="body" data-placement="top" data-original-title="Емаил"> Емаил</th>
                                <th class="tooltips text-center" data-container="body" data-placement="top" data-original-title="Телефон"> Телефон</th>
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
        var Couriers = (function(){

            var SELECTORS = {
                COURIERS_TABLE: '[couriers-table]'
            };

            var Couriers = {
                init: function() {
                    $(document).ready(this.handleDocumentReady.bind(this));
                },

                handleDocumentReady: function() {
                    this.initCouriersTable();
                },

                initCouriersTable: function() {
                    window.ddt = $(SELECTORS.COURIERS_TABLE).DataTable({
                        "processing": true,
                        "serverSide": true,
                        "ajax": {
                            "url": "{{ route('admin.couriers.getDataTable') }}",
                            "type": "GET"
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

            return Couriers;
        })();

        Couriers.init();

        /*$('.select2-button-multiselect-value').select2({
         placeholder: "Избери...",
         allowClear: true
         });*/

    </script>
@stop
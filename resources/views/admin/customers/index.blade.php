@extends('layouts.admin')

@section('content')
    <div class="page-content-inner">
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN SAMPLE TABLE PORTLET-->
                <div class="portlet light ">
                    <div class="portlet-title">
                        <div class="caption">
                            <span class="caption-subject font-blue-soft bold uppercase">Клиенти</span>
                        </div>
                        <div class="actions">
                            <a class="btn btn-info blue-soft" href="{{ route('admin.customers.create') }}"><i
                                    class="fa fa-plus"></i>Нов Клиент</a>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <table articles-table class="table table-striped table-bordered table-hover order-column">
                            <thead>
                                <tr role="row" class="heading">
                                    <th data-original-title="ID"> ID</th>
                                    <th data-original-title="Име"> Име</th>
                                    <th class="tooltips" data-container="body" data-placement="top"
                                        data-original-title="Презиме"> Презиме</th>
                                    <th class="tooltips" data-container="body" data-placement="top"
                                        data-original-title="Емаил"> Емаил</th>
                                    <th class="tooltips" data-container="body" data-placement="top"
                                        data-original-title="Компанија"> Компанија</th>
                                    <th class="tooltips" data-container="body" data-placement="top"
                                        data-original-title="Тип"> Тип</th>
                                    <th class="tooltips" data-container="body" data-placement="top"
                                        data-original-title="Телефон"> Телефон</th>
                                    @if(in_array(config('app.client'), \EasyShop\Models\Settings::CLIENT_NATURATHERAPY_SHOPS))
                                    <th class="tooltips" data-container="body" data-placement="top"
                                        data-original-title="Телефон 2"> Телефон 2</th>
                                    @endif
                                    <th class="tooltips" data-container="body" data-placement="top"
                                        data-original-title="Ценовна"> Ценовна група</th>
                                    <th class="tooltips" data-container="body" data-placement="top"
                                        data-original-title="Град"> Град</th>
                                    <th data-original-title="Активен"> Активен</th>
                                    @if (config('app.client') == \EasyShop\Models\Settings::CLIENT_NATURATHERAPYSHOP)
                                        <th class="tooltips" data-container="body" data-placement="top"
                                            data-original-title="Поени"> Поени</th>
                                        <th class="tooltips" data-container="body" data-placement="top"
                                            data-original-title="Лојалти Шифра"> Лојалти Шифра</th>
                                    @endif
                                    <th data-orderable="false"> Акции</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th></th>
                                    <th>Име</th>
                                    <th>Презиме</th>
                                    <th>Емаил</th>
                                    <th></th>
                                    <th></th>
                                    <th>Телефон</th>
                                    @if(in_array(config('app.client'), \EasyShop\Models\Settings::CLIENT_NATURATHERAPY_SHOPS))
                                    <th>Телефон 2</th>
                                    @endif
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    @if(config('app.client') == \EasyShop\Models\Settings::CLIENT_NATURATHERAPYSHOP)
                                    <th></th>
                                    <th></th>
                                    @endif
                                    <th></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('scripts')
    <script type="text/javascript">
        var Articles = (function() {

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

                      // Setup - add a text input to each footer cell
                    $(SELECTORS.ARTICLES_TABLE + ' tfoot th').each( function () {
                        var title = $(this).text();
                        if (!!title) {
                            $(this).html( '<input type="text" placeholder="Барај '+title+'" />' );
                        }
                    } );

                    window.ddt = $(SELECTORS.ARTICLES_TABLE).DataTable({
                        "processing": true,
                        "serverSide": true,
                        initComplete: function() {
                             // Apply the search
                            this.api().columns().every( function () {
                                var that = this;
                
                                $( 'input', this.footer() ).on( 'keyup change clear', function () {
                                    if ( that.search() !== this.value ) {
                                        that
                                            .search( this.value )
                                            .draw();
                                    }
                                } );
                            } );
                        },
                        // "ajax": {
                        //     "url": "{{ route('admin.customers.getCustomers') }}",
                        //     "type": "GET"
                        // },
                        // "language": {
                        //     url: EsConfig.routes.datatableLanguage
                        // },
                        ajax: {
                            type: "GET",
                            url: "{{ route('admin.customers.getCustomers') }}",
                        },
                        // setup buttons extension: http://datatables.net/extensions/buttons/
                        lengthMenu: [10, 25, 50, 75, 100],
                        stateSave: false,
                        buttons: [
                        ],
                        "pageLength": 50,
                        "dom": "<'row' <'col-md-12'B>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>" // horizobtal scrollable datatable

                    });
                }
            };

            return Articles;
        })();

        Articles.init();

    </script>
@stop
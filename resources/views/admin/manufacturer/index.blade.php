@extends('layouts.admin')

@section('content')
    <div class="page-content-inner">
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN SAMPLE TABLE PORTLET-->
                <div class="portlet light ">
                    <div class="portlet-title">
                        <div class="caption">
                            <span class="caption-subject font-blue-soft bold uppercase">Листа на производители</span>
                        </div>
                        <div class="actions">
                            <a class="btn btn-info blue-soft" href="{{ route('admin.manufacturers.new') }}"><i class="fa fa-plus"></i>Нов Производител</a>
                            {{--<a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">--}}
                                {{--<i class="icon-cloud-upload"></i>--}}
                            {{--</a>--}}
                            {{--<a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">--}}
                                {{--<i class="icon-wrench"></i>--}}
                            {{--</a>--}}
                            {{--<a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">--}}
                                {{--<i class="icon-trash"></i>--}}
                            {{--</a>--}}
                        </div>
                    </div>
                    <div class="portlet-body">
                        <table articles-table class="table table-striped table-bordered table-hover order-column">
                            <thead>
                                <tr role="row" class="heading">
                                    <th> ID</th>
                                    <th class="tooltips" data-container="body" data-placement="top" data-original-title="Име на производител"> Име</th>
                                    <th class="tooltips" data-container="body" data-placement="top" data-original-title="Опис на производител">Опис</th>
                                    <th class="text-center">Акции</th>
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
                        "url": "{{ route('admin.manufacturers.datatables') }}",
                        "type": "POST"
                    },
                    "language": {
                        url: EsConfig.routes.datatableLanguage
                    },
                    // setup buttons extension: http://datatables.net/extensions/buttons/
                    buttons: [],
                    lengthMenu:  [ 10, 25, 50, 75, 100 ],
                    stateSave: true,

                    // set the initial value
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
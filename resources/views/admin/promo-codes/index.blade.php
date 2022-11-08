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
<?php $global_prices = \EasyShop\Models\AdminSettings::getField('prices');   ?>
<div class="page-content-inner">

    <div class="modal fade" id="new_discount" tabindex="-1" role="basic" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Додади купон</h4>
                </div>
                <div class="modal-body col-md-12">

                    <div class="row form-group">
                        <div class="col-md-4">
                            <label class="control-label">Име</label>
                        </div>
                        <div class="col-md-7">
                            <input id="ime" name="value" class="form-control" value="" type="text">
                            <a href="#" id="generate_name"> Generate </a>
                        </div>

                    </div>

                    <div class="row form-group">
                        <label class="col-md-4 control-label">Важи врз</label>
                        <div class="col-md-8">
                            <select class="table-group-action-input form-control input-medium" name="type" id="kupon_tip">
                                {{-- <option value="products">Одредени продукти</option> --}}
                                <option value="cart">Цела кошничка</option>
                            </select>

                            {{-- <select class="table-group-action-input form-control input-medium" name="type"
                                id="vazi_vrz" style="display:none;">
                                   
                               </select> --}}
                        </div>
                    </div>

                    <div class="row form-group">
                        <label class="col-md-4 control-label">Tип</label>
                        <div class="col-md-8">
                            <select class="table-group-action-input form-control input-medium" name="type" id="popust_tip">
                                <option value="percent">Процент</option>
                                <option value="fixed">Фиксно</option>
                            </select>
                        </div>
                    </div>




                    <div class="row form-group">
                        <div class="col-md-4">
                            <label class="control-label">Вредност</label>
                        </div>
                        <div class="col-md-7">
                            <input id="popust_value" name="value" class="form-control" value="" type="text">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-4">
                            <label class="control-label">Колку пати може да се искористи</label>
                        </div>
                        <div class="col-md-7">
                            <input id="popust_pati" name="value" class="form-control" value="" type="text">
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-md-4 control-label">Означи како попуст од:</label>
                        <div class="col-md-8">
                            <div class="input-group input-large date-picker input-daterange" data-date="10.11.2012" data-date-format="dd.mm.yyyy" data-date-week-start="1">
                                <input type="text" class="form-control" name="start" style="text-align:left;" value="{{date('d.m.Y', strtotime(date('Y-m-d')))}}" id="popust_start">
                                <span class="input-group-addon"> до : </span>
                                <input type="text" class="form-control" name="end" style="text-align:left;" value="{{date('d.m.Y', strtotime('+1 week'))}}" id="popust_end">
                            </div>
                        </div>
                    </div>
                    {{-- <div class="form-group row">
                            <div class="checkbox-list col-md-12">
                                @if(config( 'clients.'.config( 'app.client').'.prices.retail1'))
                                    <label>

                                        <input class='grap_retail_1 icheck' type="checkbox"
                                               value="grap_retail_1">Малопродажна
                                        1</label>
                                @endif

                                @if(config(' clients.'.config( 'app.client').'.prices.retail2'))
                                    <label>
                                        <input class='grap_retail_2 icheck' type="checkbox"
                                               value="grap_retail_2">Малопродажна
                                        2</label>
                                @endif
                                @if(config( 'clients.'.config( 'app.client').'.prices.wholesale1'))
                                    <label>
                                        <input class='grap_wholesale_1 icheck' type="checkbox"
                                               value="grap_wholesale_1">Големопродажна 1</label>
                                @endif
                                @if(config( 'clients.'.config( 'app.client').'.prices.wholesale2'))
                                    <label>
                                        <input class='grap_wholesale_2 icheck' type="checkbox"
                                               value="grap_wholesale_2">Големопродажна 2</label>
                                @endif
                                @if(config( 'clients.'.config( 'app.client').'.prices.wholesale3'))
                                    <label>
                                        <input class='grap_wholesale_3 icheck' type="checkbox"
                                               value="grap_wholesale_3">Големопродажна 3</label>
                                @endif

                            </div>
                        </div> --}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn dark btn-outline" data-dismiss="modal">Откажи</button>
                    <button id="popust_save" type="button" class="btn green">Зачувај</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>



    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN SAMPLE TABLE PORTLET-->
            <div class="portlet light ">
                <div class="portlet-title">
                    <div class="caption">
                        <span class="caption-subject font-green bold uppercase">Листа купони</span>
                        <br>
                        <a class="btn btn-circle btn-default " href="{{ route("admin.promo-codes.new") }}" data-toggle="modal">
                            <i class="fa fa-plus"></i> Додади купон
                        </a>
                    </div>
                </div>
                <div class="portlet-body">

                    <table articles-table class="table table-striped table-bordered table-hover order-column">
                        <thead>
                            {{-- <tr>
                                    <th>
                                        <button id="delete_coupon" class="btn btn-circle btn-default ">Delete</button>
                                    </th>
                                </tr>                                --}}
                            <tr role="row" class="heading">
                                <th></th>
                                <th class="tooltips" data-container="body" data-placement="top" data-original-title="Код">Код</th>
                                <th class="tooltips" data-container="body" data-placement="top" data-original-title="Тип">Тип</th>
                                <th class="tooltips" data-container="body" data-placement="top" data-original-title="Тип попуст">Тип попуст</th>
                                <th class="tooltips" data-container="body" data-placement="top" data-original-title="Вредност">Вредност</th>
                                <th class="tooltips" data-container="body" data-placement="top" data-original-title="Од датум">Од</th>
                                <th class="tooltips" data-container="body" data-placement="top" data-original-title="До датум">До</th>
                                <th class="tooltips" data-container="body" data-placement="top" data-original-title="До датум">Важност</th>
                                <th class="tooltips" data-container="body" data-placement="top" data-original-title="До датум">Акции</th>
                                {{-- @if($global_prices['retail1'])
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
                                     --}}
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


                window.ddt = $(SELECTORS.ARTICLES_TABLE).dataTable({
                    "processing": true,
                    "serverSide": true,
                    "ajax": {
                        "url": "{{ route('admin.promo-codes.get') }}",
                        "type": "GET",
                        "data": function(d) {
                            return $.extend({}, d, {
                                "inStock": $("#stock_select").val(),
                                "category": $("#category_select").val(),
                            });
                        }
                    },
                    "language": {
                        url: EsConfig.routes.datatableLanguage
                    },
                    'columnDefs': [{
                        'targets': 0,
                        'searchable': false,
                        'orderable': false,
                        'className': 'dt-body-center',
                        'render': function(data, type, full, meta) {
                            return '<input type="checkbox" class="coupons_id" name="coupons_id[]" value="' +
                                $('<div/>').text(data).html() + '">';
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
                    lengthMenu: [10, 25, 50, 75, 100],

                    //                    "order": [
                    //                        [0, 'asc']
                    //                    ],
                    //    "columns": [

                    //        { "data": "code" },
                    //        { "data": "type" },
                    //        { "data": "discount_type" },
                    //        { "data": "value" },
                    //        { "data": "start" },
                    //        { "data": "end" },
                    //        { "data": "reuse_number" }
                    //    ],
                    // set the initial value
                    "pageLength": 50,
                    "dom": "<'row' <'col-md-12'B>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>" // horizobtal scrollable datatable

                });
            }
        };

        return Articles;
    })();

    Articles.init();

    $('#stock_select,#category_select').on('change', function() {
        $('[articles-table]').DataTable().ajax.reload(); //Exact value, column, reg
    });

    $(document).ready(function() {

        $("#generate_name").on('click', function() {
            $.get("{{ route('admin.copunname') }}", {}, function(data) {
                $("#ime").val(data);
            });

        });

        $('#stock_select,#category_select,#kupon_tip,#popust_tip').select2({
            width: '100%'
        });
        $("#delete_coupon").on('click', function() {
            var coupons_id = [];
            $.each($(".coupons_id:checked"), function(index, value) {
                coupons_id.push($(value).val());
            });
            $.post("{{ route('admin.deleteCoupon') }}", {
                'coupons': coupons_id
            }, function(data) {
                $('[articles-table]').DataTable().ajax.reload();
            });
        });

        $("#popust_save").on('click', function() {

            var products_id = [];
            // $.each($(".products_id:checked"), function (index, value) {
            //     products_id.push($(value).val());
            // });

            $.post("{{ route('admin.promo-codes.store') }}", {
                // 'products': products_id,
                code: $('#ime').val(),
                type: $('#kupon_tip').val(),
                discount_type: $("#popust_tip").val(),
                value: $('#popust_value').val(),
                reuse_number: $('#popust_pati').val(),
                start: $('#popust_start').val(),
                end: $('#popust_end').val(),

                // group_retail_1: $(".grap_retail_1:checked").length,
                // group_retail_2: $(".grap_retail_2:checked").length,
                // group_wholesale_1: $(".grap_wholesale_1:checked").length,
                // group_wholesale_2: $(".grap_wholesale_2:checked").length,
                // group_wholesale_3: $(".grap_wholesale_3:checked").length,

            }, function(data) {

                $("#ime").val('');

                $('#popust_pati').val('');
                $('#kupon_tip').val('');
                $('#popust_tip').val('');
                $('#popust_pati').val('');
                $('#popust_start').val('');
                $('#popust_end').val('');
                // $(".grap_retail_2:checked").val('');
                // $(".grap_wholesale_1:checked").val('');
                // $(".grap_wholesale_2:checked").val('');
                // $(".grap_wholesale_3:checked").val('');
                $(".modal").modal('toggle');
                window.location.replace("{{URL::to('admin/promo-codes')}}");
            });

        });

    });
</script>
@stop
@extends('layouts.admin')

@section('content')
    <div class="page-content-inner">
        <div class="row">
            <div class="col-md-12">
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
                                    <label class="col-md-4 control-label">Tип</label>
                                    <div class="col-md-8">
                                        <select class="table-group-action-input form-control input-medium" name="type"
                                                id="popust_tip">
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
                                        <div class="input-group input-large date-picker input-daterange"
                                             data-date="10.11.2012" data-date-format="dd.mm.yyyy"
                                             data-date-week-start="1">
                                            <input type="text"
                                                   class="form-control"
                                                   name="start"
                                                   style="text-align:left;"
                                                   value="{{date('d.m.Y', strtotime(date('Y-m-d')))}}"
                                                   id="popust_start">
                                            <span class="input-group-addon"> до : </span>
                                            <input type="text"
                                                   class="form-control"
                                                   name="end"
                                                   style="text-align:left;"
                                                   value="{{date('d.m.Y', strtotime('+1 week'))}}" id="popust_end">
                                        </div>
                                    </div>
                                </div>retail1
                                <div class="form-group row">
                                    <div class="checkbox-list col-md-12">
                                        @if(\EasyShop\Models\AdminSettings::isSetTrue('retail1', 'prices'))
                                            <label>

                                                <input class='grap_retail_1 icheck' type="checkbox"
                                                       value="grap_retail_1">Малопродажна
                                                1</label>
                                        @endif

                                        @if(\EasyShop\Models\AdminSettings::isSetTrue('retail2', 'prices'))
                                            <label>
                                                <input class='grap_retail_2 icheck' type="checkbox"
                                                       value="grap_retail_2">Малопродажна
                                                2</label>
                                        @endif
                                        @if(\EasyShop\Models\AdminSettings::isSetTrue('wholesale1', 'prices'))
                                            <label>
                                                <input class='grap_wholesale_1 icheck' type="checkbox"
                                                       value="grap_wholesale_1">Големопродажна 1</label>
                                        @endif
                                        @if(\EasyShop\Models\AdminSettings::isSetTrue('wholesale2', 'prices'))
                                            <label>
                                                <input class='grap_wholesale_2 icheck' type="checkbox"
                                                       value="grap_wholesale_2">Големопродажна 2</label>
                                        @endif
                                        @if(\EasyShop\Models\AdminSettings::isSetTrue('wholesale3', 'prices'))
                                            <label>
                                                <input class='grap_wholesale_3 icheck' type="checkbox"
                                                       value="grap_wholesale_3">Големопродажна 3</label>
                                        @endif

                                    </div>
                                </div>
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


                <!-- BEGIN SAMPLE TABLE PORTLET-->
                <div class="portlet light ">
                    <div class="portlet-title">
                        <div class="caption">
                            <span class="caption-subject font-green bold uppercase">Додади купон</span>
                        </div>


                    </div>
                    <div class="portlet-body">
                        <div class="btn-group">
                            <a class="btn btn-circle btn-default " href="#new_discount" data-toggle="modal">
                                <i class="fa fa-plus"></i> Додади купон
                            </a>

                            <table>
                                <td style="padding-left: 15px; padding-right: 15px;"><label>Залиха</label></td>
                                <td style="width: 150px;" colspan="4"><select id="stock_select">
                                        <option value="all">Сите</option>
                                        <option value="no_stock">Нема</option>
                                        <option value="in_stock">Има</option>
                                    </select></td>
                                <td style="padding-left: 15px; padding-right: 15px;"><label>Категорија</label></td>
                                <td style="width: 150px;" colspan="4">
                                    <select id="category_select">
                                        <option value="0">Сите</option>
                                        {!!$categires_html!!}
                                    </select>

                                </td>
                            </table>
                            {{--<th colspan="2">Категорија</th>--}}
                            {{--<th colspan="3">--}}
                            {{--<select id="category_select">--}}
                            {{--<option value="0">Сите</option>--}}
                            {{--{!!$categires_html!!}--}}
                            {{--</select>--}}
                            {{--</th>--}}
                            {{--</tr></table>--}}


                        </div>
                        <table articles-table class="table table-striped table-bordered table-hover order-column">


                            <thead>


                            <tr role="row" class="heading">
                                <th></th>

                                <th class="tooltips" data-container="body" data-placement="top"
                                    data-original-title="Име на артикл"> Артикл
                                </th>

                                {{--<th> Категорија</th>--}}
                                @if(\EasyShop\Models\AdminSettings::isSetTrue('retail1', 'prices'))
                                    <th class="tooltips" data-container="body" data-placement="top"
                                        data-original-title="Малопродажна 1"> МП 1
                                    </th>
                                @endif
                                @if(\EasyShop\Models\AdminSettings::isSetTrue('retail2', 'prices'))
                                    <th class="tooltips" data-container="body" data-placement="top"
                                        data-original-title="Малопродажна 2"> МП 2
                                    </th>
                                @endif

                                @if(\EasyShop\Models\AdminSettings::isSetTrue('wholesale1', 'prices'))
                                    <th class="tooltips" data-container="body" data-placement="top"
                                        data-original-title="Големопродажна 1"> ГП 1
                                    </th>
                                @endif
                                @if(\EasyShop\Models\AdminSettings::isSetTrue('wholesale2', 'prices'))
                                    <th class="tooltips" data-container="body" data-placement="top"
                                        data-original-title="Големопродажна 2"> ГП 2
                                    </th>
                                @endif
                                @if(\EasyShop\Models\AdminSettings::isSetTrue('wholesale3', 'prices'))
                                    <th class="tooltips" data-container="body" data-placement="top"
                                        data-original-title="Големопродажна 3"> ГП 3
                                    </th>
                                @endif
                                <th class="tooltips" data-container="body" data-placement="top"
                                    data-original-title="Вкупна залиха во сите магацини"> Залиха
                                </th>
                                <th> Активен</th>
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
        var Articles = (function () {

            var SELECTORS = {
                ARTICLES_TABLE: '[articles-table]'
            };

            var Articles = {
                init: function () {
                    $(document).ready(this.handleDocumentReady.bind(this));
                },

                handleDocumentReady: function () {
                    this.initArticlesTable();
                },

                initArticlesTable: function () {

                    window.ddt = $(SELECTORS.ARTICLES_TABLE).dataTable({
                        "processing": true,
                        "serverSide": true,
                        "ajax": {
                            "url": "{{ route('admin.listcouponDatatable') }}",
                            "type": "POST",
                            "data": function (d) {
                                return $.extend({}, d, {
                                    "inStock": $("#stock_select").val(),
                                    "category": $("#category_select").val(),
                                });
                            }
                        },
                        "language": {
                            url: EsConfig.routes.datatableLanguage
                        },
                        scrollY: 300,
                        //scrollX:        false,
                        deferRender: true,
                        scroller: true,
                        'columnDefs': [{
                            'targets': 0,
                            'searchable': false,
                            'orderable': false,
                            'className': 'dt-body-center',
                            'render': function (data, type, full, meta) {
                                return '<input type="checkbox" class="products_id" name="products_id[]" value="'
                                    + $('<div/>').text(data).html() + '">';
                            }
                        }],
                        'order': [1, 'asc'],
                        // setup buttons extension: http://datatables.net/extensions/buttons/
                        buttons: [],
                        lengthMenu: [10, 25, 50, 75, 100],
                        "pageLength": 50,
                        "dom": "<'row' <'col-md-12'B>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>" // horizobtal scrollable datatable

                    });
                }
            };

            return Articles;
        })();

        Articles.init();

        $('#stock_select,#category_select').on('change', function () {
            $('[articles-table]').DataTable().ajax.reload(); //Exact value, column, reg
        });

        $(document).ready(function () {

            //$('input[type=checkbox]').iCheck('check');

            $('#stock_select,#category_select,#kupon_tip,#popust_tip').select2({width: '100%'});

            $("#generate_name").on('click', function () {
                $.get("{{ route('admin.copunname') }}", {}, function (data) {
                    $("#ime").val(data);
                });

            });

            $("#popust_save").on('click', function () {

                var products_id = [];
                $.each($(".products_id:checked"), function (index, value) {
                    products_id.push($(value).val());
                });

                $.post("{{ route('admin.storecoupon') }}", {
                    'products': products_id,
                    discount_type: $("#kupon_tip").val(),
                    type: $('#popust_tip').val(),
                    value: $('#popust_value').val(),
                    start: $('#popust_start').val(),
                    end: $('#popust_end').val(),
                    group_retail_1: $(".grap_retail_1:checked").length,
                    group_retail_2: $(".grap_retail_2:checked").length,
                    group_wholesale_1: $(".grap_wholesale_1:checked").length,
                    group_wholesale_2: $(".grap_wholesale_2:checked").length,
                    group_wholesale_3: $(".grap_wholesale_3:checked").length,
                    name: $('#ime').val(),
                    reuse_number: $('#popust_pati').val()

                }, function (data) {

                    $('#popust_pati').val('');
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
                    window.location.replace("{{URL::to('admin/coupon')}}");
                });

            });

        });
    </script>
    <script src="/assets/admin/pages/scripts/ecommerce-products.js" type="text/javascript"></script>
@stop
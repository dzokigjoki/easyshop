@extends('layouts.admin')

@section('content')
<?php
$global_prices = \EasyShop\Models\AdminSettings::getField('prices');
$sifra = \EasyShop\Models\AdminSettings::getField('sifra');
?>
<style>

</style>
<div class="page-content-inner">
    <div class="row">
        <div class="col-md-12">
            <div class="modal fade" id="new_discount" tabindex="-1" role="basic" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title bold">Додади попуст/купон</h4>
                        </div>
                        <div class="modal-body col-md-12">

                            <div class="row form-group">
                                <div class="col-md-4">
                                    <label class="control-label">Име</label>
                                </div>
                                <div class="col-md-7">
                                    <input id="ime" name="value" class="form-control" value="" type="text">
                                </div>
                            </div>

                            <div class="row form-group">
                                <label class="col-md-4 control-label">Tип</label>
                                <div class="col-md-7">
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
                                <label class="col-md-4 control-label">Означи како попуст од:</label>
                                <div class="col-md-8">
                                    <div class="input-group input-large date-picker input-daterange" data-date-week-start="1" data-date="10.11.2012" data-date-format="dd.mm.yyyy">
                                        <input type="text" class="form-control" name="start" style="text-align:left;" value="{{date('d.m.Y', strtotime(date('Y-m-d')))}}" id="popust_start">
                                        <span class="input-group-addon"> до : </span>
                                        <input type="text" class="form-control" name="end" style="text-align:left;" value="{{date('d.m.Y', strtotime('+1 week'))}}" id="popust_end">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="checkbox-list col-md-12">
                                    <label class="margin-bottom-10">Цени:</label>
                                    <label><input class='grap_retail_1' type="checkbox" value="grap_retail_1">Малопродажна 1</label>
                                    <label><input class='grap_retail_2' type="checkbox" value="grap_retail_2">Малопродажна 2</label>
                                    <label><input class='grap_wholesale_1' type="checkbox" value="grap_wholesale_1">Големопродажна 1</label>
                                    <label><input class='grap_wholesale_2' type="checkbox" value="grap_wholesale_2">Големопродажна 2</label>
                                    <label><input class='grap_wholesale_3' type="checkbox" value="grap_wholesale_3">Големопродажна 3</label>

                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn dark btn-outline" data-dismiss="modal">Откажи</button>
                            <button id="popust_save" type="button" class="btn blue-soft">Зачувај</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- BEGIN SAMPLE TABLE PORTLET-->
            <div class="portlet light">
                <div class="portlet-title">
                    <div class="caption">
                        <span class="caption-subject font-blue-soft bold uppercase">Попуст</span>
                    </div>
                    <div class="btn-group pull-right">
                        <a class="btn btn-info blue-soft" id="dodadi_popust">
                            <i class="fa fa-plus"></i> Додади попуст
                        </a>
                    </div>
                    <div class="select_wrapper pull-right">
                        <label for="id_select"> Додади попуст на ниво на: </label>
                        <select id="selectForDiscount" class="btn-group pull-right" name="" id="">
                            <option value="products">Продукти</option>
                            <option value="categories">Категории</option>
                        </select>
                    </div>


                </div>
                <div class="portlet-body articles_datatable_wrapper">

                    <table articles-table class="table table-striped table-bordered table-hover order-column">
                        <thead>
                            <?php
                            // Colspan for filter row
                            $colspan = 2;
                            if ($global_prices['retail1'])  $colspan = $colspan + 1;
                            if ($global_prices['retail2'])  $colspan = $colspan + 1;
                            if ($global_prices['wholesale1'])  $colspan = $colspan + 1;
                            if ($global_prices['wholesale2'])  $colspan = $colspan + 1;
                            if ($global_prices['wholesale3'])  $colspan = $colspan + 1;
                            ?>
                            <tr>
                                <th>Залиха</th>
                                <th>
                                    <select id="stock_select">
                                        <option value="all">Сите</option>
                                        <option value="no_stock">Нема</option>
                                        <option value="in_stock">Има</option>
                                    </select>
                                </th>
                                <th>Категорија</th>
                                <th colspan="{{$colspan}}">
                                    <select id="category_select" style="">
                                        <option value="0">Сите</option>
                                        {{!!$categires_html!!}}
                                    </select>
                                </th>
                            </tr>
                            <tr role="row" class="heading">
                                <th></th>
                                @if($sifra)
                                <th class="tooltips" data-container="body" data-placement="top" data-original-title="Шифра"> Шифра</th>
                                @endif
                                <th class="tooltips" data-container="body" data-placement="top" data-original-title="Име на артикл"> Артикл</th>
                                {{--<th> Категорија</th>--}}
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
                                <th class="tooltips" data-container="body" data-placement="top" data-original-title="Вкупна залиха во сите магацини"> Залиха</th>
                                <th> Активен</th>
                                <th data-orderable="false"> Акции</th>
                            </tr>

                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
                <div class="portlet-body articles_categories_wrapper">
                    <div class="row">
                        <div class="col-sm-12">
                            <h5>Одберете категорија/и на кои што сакате да додадете попуст</h5>
                            <select id="selectCategoriesDiscount" multiple="multiple" style="">
                                <option value="0">Сите</option>
                                {{!!$categires_html!!}}
                            </select>
                            <p class="info_red">Доколку имате производи на попуст во некоја од категориите, истите ќе бидат пребришани!</p>
                        </div>
                    </div>
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
                        "url": "{{ route('admin.listdiscountDatatable') }}",
                        "type": "POST",
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
                    scrollY: 300,
                    //scrollX:        false,
                    deferRender: true,
                    scroller: true,
                    'columnDefs': [{
                        'targets': 0,
                        'searchable': false,
                        'orderable': false,
                        'className': 'dt-body-center',
                        'render': function(data, type, full, meta) {
                            return '<input type="checkbox" class="products_id" name="products_id[]" value="' +
                                $('<div/>').text(data).html() + '">';
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

    $('#stock_select,#category_select').on('change', function() {
        $('[articles-table]').DataTable().ajax.reload(); //Exact value, column, reg
    });

    $(document).ready(function() {

        $('#selectForDiscount').on('select2:select', function(e) {

            if ($("#selectForDiscount").val() == "products") {
                $(".articles_datatable_wrapper").show();
                $(".articles_categories_wrapper").hide();

            } else {
                $(".articles_datatable_wrapper").hide();
                $(".articles_categories_wrapper").show();

            }

        });


        $('#stock_select,#category_select,#kupon_tip,#popust_tip,#selectCategoriesDiscount,#selectForDiscount').select2({
            width: '100%'
        });

        $('#dodadi_popust').on('click', function() {
            if ($("#selectForDiscount").val() == "products") {
                if ($(".products_id:checked").length > 0) {
                    $('.modal').modal('toggle');
                } else {
                    sweetAlert("", "Ве молиме изберете барем еден продукт!", "warning");
                }
            } else {
                if ($('#selectCategoriesDiscount').find('option:selected').length > 0) {
                    $('.modal').modal('toggle');
                } else {
                    sweetAlert("", "Ве молиме изберете барем една категорија!", "warning");
                }
            }

        });

        $("#popust_save").on('click', function() {

            var products_id = [];
            var categories_id = [];

            if ($("#selectForDiscount").val() == "products") {
                $.each($(".products_id:checked"), function(index, value) {
                    products_id.push($(value).val());
                });
            } else {
                categories_id = $("#selectCategoriesDiscount").val()
            }


            $.post("{{ route('admin.storediscount') }}", {
                'products': products_id,
                'categories': categories_id,
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
                name: $('#ime').val()

            }, function(data) {

                $(".modal").modal('toggle');
                window.location.replace("{{URL::to('admin/discount')}}");
            });

        });

    });
</script>
<script src="/assets/admin/pages/scripts/ecommerce-products.js" type="text/javascript"></script>
@stop
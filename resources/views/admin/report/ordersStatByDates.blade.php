@extends('layouts.admin')
@section('content')


<style>
    .dataTables_scrollHeadInner,
    div.dataTables_scrollBody table {
        width: 100% !important;
    }

    .dataTables_scrollHeadInner {
        margin: auto;
    }
</style>
<div class="page-content-inner">

    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN SAMPLE TABLE PORTLET-->
            <div class="portlet light ">
                <div class="portlet-title">
                    <div class="caption">
                        <span class="caption-subject font-blue-soft bold uppercase"> Извештај нарачка</span>
                    </div>

                    <div class="form-group pull-right" style="margin-top: 5px;">
                        {{--  <button class="btn btn-sm btn-info blue-soft" id="generate_excel">
                            <i class="fa fa-upload" aria-hidden="true"></i>
                            Преземи Excel</button>  --}}
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="row" style="margin-bottom: 40px;padding-bottom: 20px;">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Датум</label>
                                <div class="input-group input-medium date-picker input-daterange" data-date="10.11.2012"
                                    data-date-format="dd.mm.yyyy" data-date-week-start="1">
                                    <input type="text" class="form-control" id="new_from" name="new_from"
                                        value="{{ date('d.m.Y', strtotime('-31day', time())) }}"
                                        style="text-align:left;">
                                    <span class="input-group-addon"> до </span>
                                    <input type="text" class="form-control" id="new_to" name="new_to"
                                        value="{{ date('d.m.Y') }}" style="text-align:left;">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Статус</label>
                                <div>
                                    <select class="select2" name="type" id="documentStatus" style="width:100%">
                                        <option value="">Сите</option>
                                        <option value="generirana">Генерирани</option>
                                        <option value="podgotovka">Подготовка</option>
                                        <option value="stornirana">Сторнирани</option>
                                        <option value="dostavena">Доставени</option>
                                        <option value="ispratena">Испратени</option>
                                        <option value="reklamacija">Рекламирани</option>
                                        <option value="vratena">Вратени</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        {{-- Warehouses --}}
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Плаќање Статус</label>
                                <div>
                                    <select class="select2" name="type" id="paiddocumentStatus" style="width:100%">
                                        <option value="">Сите</option>
                                        <option value="neplatena">Неплатена</option>
                                        <option value="platena">Платена</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div style="display: none" class="form-group paid_status_typeshow">
                                <label>Тип плаќање</label>
                                <div>
                                    <select class="select2" name="type" id="paid_status_type" style="width:100%">
                                        <option value="">Сите</option>
                                        <option value="ziro">Жиро</option>
                                        <option value="karticka">Картичка</option>
                                        <option value="gotovo">Готово</option>
                                        <option value="rati">Рати</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Магацин</label>
                                <div>
                                    <select id="warehouse_id" name="warehouse_id" class="select2" style="width:100%">
                                        @if (\Auth::user()->canDo('admin_izbor_magacin'))
                                        <option value="0">Сите</option>
                                        @foreach ($warehouses as $warehouse)
                                        <option value="{{ $warehouse->id }}">{{ $warehouse->title }}
                                        </option>
                                        @endforeach
                                        @else
                                        @foreach ($warehouses as $warehouse)
                                        @if (\Auth::user()->warehouse_id == $warehouse->id)
                                        <option value="{{ $warehouse->id }}">{{ $warehouse->title }}
                                        </option>
                                        @endif
                                        @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>


                    <table documents-table class="table table-striped table-bordered table-hover order-column">
                        <thead>
                            <tr role="row" class="heading">
                                <th style="min-width: 50px;"> Датум</th>
                                <th> Вкупно промет </th>
                                <th> Број на нарачки </th>
                                <th> Вкупно сума за исплата</th>
                                <th> Процент на <span id='statusForDocument'>Сите</span> од сите нарачки </th>
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
    var DocumentsModule = (function() {
            var SELECTORS = {
                ARTICLES_TABLE: '[documents-table]',
                WAREHOUSE_SELECTOR: '#documentWarehouse',
                ARTICLE_SELECTOR: '#documentProducts'
            };
            var DocumentsModule = {
                init: function() {
                    $(document).ready(this.handleDocumentReady.bind(this));
                    $(document).ready($(".select2").select2());

                },
                handleDocumentReady: function() {
                    this.initArticlesTable();

                    var ids = [];
                    $('#documentStatus, #paiddocumentStatus,#warehouse_id,#paid_status_type,#documentProducts,#new_from,#new_to')
                        .on('change',
                            function() {
                                $(SELECTORS.ARTICLES_TABLE).DataTable().ajax
                                    .reload(); //Exact value, column, reg

                            });
                
                    // $('#generate_excel').on('click', function() {
                    //     var url = "{{URL::to('/admin') }}/report/ordersStatByDates/datatable";
                    //     $.post(url, {
                    //         'generate_excel': true
                    //     }, function(data) {});
                    // });

                    $("#documentStatus").on('change', function() {
                        $("#statusForDocument").text($("#documentStatus :selected").text());
                    });

                    $("#paiddocumentStatus").on('change', function() {
                        if ($("#paiddocumentStatus :selected").val() == 'platena') {
                            $(".paid_status_typeshow").show();
                        } else if ($("#paiddocumentStatus :selected").val() == '') {
                            $("#paid_status_type").val("").change();
                            $(".paid_status_typeshow").hide();
                        } else {
                            $(".paid_status_typeshow").hide();
                        }
                    });

                    $("#import").on("click", function() {
                        $("#import_modal").modal('toggle');
                    });

                    $("#action").on("click", function() {
                        ids = [];
                        var checkbox_status = $("#documentStatus_checkbox").val();
                        var checked = $(".select_doc_checkbox:checked").map(function() {
                            return this.value;
                        }).get();
                        var status = '';
                        var flag = 0;
                        var pomosen_status = '';

                        if (checked.length == 0) {
                            sweetAlert("", "Немате избрано нарачки од табелата!", "warning");
                            return false;
                        }

                        $.each(checked, function(index, value) {
                            pomosen_status = value.split('_');
                            if (status == '') {
                                status = pomosen_status[0];
                                ids.push(pomosen_status[1]);
                            } else {
                                if (status != pomosen_status[0]) {
                                    flag = 1;
                                } else {
                                    ids.push(pomosen_status[1]);
                                }
                            }

                        });

                        if (flag != 1) {
                            $("#document_actions").modal('toggle');
                        } else
                            alert('Селектираните документи треба да се со исти статус!');
                    });


                },

                initArticlesTable: function() {
                    //                $.fn.editable.defaults.mode = 'inline';
                    window.ddt = $(SELECTORS.ARTICLES_TABLE).dataTable({
                        "bInfo": false,
                        "processing": true,
                        "serverSide": true,
                        "order": [
                            [0, 'desc']
                        ],
                        "scrollCollapse": true,
                        "scrollX": true,
                        "paging": false,
                        "deferLoading": 10,
                        "scrollY": "500px",
                        "ajax": {
                            "url": '{{ URL::to('/admin') }}/report/ordersStatByDates/datatable',
                            "type": "GET",
                            "data": function(d) {
                                return $.extend({}, d, {
                                    "products": $("#documentProducts").val(),
                                    "status": $("#documentStatus").val(),
                                    "paidstatus": $("#paiddocumentStatus").val(),
                                    "paidstatusselected": $("#paid_status_type").val(),
                                    "warehouse": $("#warehouse_id").val(),
                                    "new_from": $("#new_from").val(),
                                    "new_to": $("#new_to").val()
                                });
                            }
                        },
                        "fnRowCallback": function(nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                            $(nRow).find('.xeditable').editable({
                                url: "{{ URL::to('admin/document/change_document_field') }}",
                                type: 'text',
                                validate: function(value) {
                                    if ($.trim(value) == '')
                                        return 'Полето е задолжително';
                                },
                                name: 'tracking_code',
                                title: 'Внесете tracking code'
                            });
                        },
                        "initComplete": function(settings, json) {

                        },
                        "language": {
                            url: EsConfig.routes.datatableLanguage
                        },
                        buttons: [],
                        lengthMenu: [10, 25, 50, 75, 100],
                        "pageLength": 50
                    });
                }
            };
            return DocumentsModule;
        })();

        DocumentsModule.init();
</script>
<script src="/assets/admin/pages/scripts/ecommerce-products-edit.js" type="text/javascript"></script>@stop
<style type="text/css">
    td {
        text-align: right;
    }
</style>
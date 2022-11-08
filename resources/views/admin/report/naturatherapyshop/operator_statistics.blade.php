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
            <div class="portlet light ">
                <div class="portlet-title">
                    <div class="caption">
                        <span class="caption-subject font-blue-soft bold uppercase"> Статистика за оператори</span>
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
                                    <input type="text" class="form-control" id="from" name="from"
                                        value="{{ date('d.m.Y', strtotime('-31day', time())) }}"
                                        style="text-align:left;">
                                    <span class="input-group-addon"> до </span>
                                    <input type="text" class="form-control" id="to" name="to"
                                        value="{{ date('d.m.Y') }}" style="text-align:left;">
                                </div>
                            </div>
                        </div>
                        {{-- <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Оператор</label>
                                <div>
                                    <select id="createdBy" class="select2" style="width: 100%;">
                                        <option value="all">Сите</option>
                                        @foreach($documentCreatedBy_select as $ds)
                                        <option value="{{$ds->id}}">{{$ds->first_name}} {{$ds->last_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div> --}}
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Тип на оператор</label>
                                <div>
                                    <select class="select2" name="type" id="operatorType" style="width:100%">
                                        <option value="all">Сите</option>
                                        <option value="honorar">На Хонорар</option>
                                        <option value="prijaven">Пријавен</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        {{--  <div class="col-md-3">
                            @if ( config( 'clients.' . config( 'app.client') . '.type_of_order' . '.active'))
                            <div class="form-group">
                                <label>Тип на нарачка:</label>
                                <select name="type_of_order" id="type_of_order" style="width:100%;"
                                    class="select2 form-control">
                                    @if (!isset($document_data->type_of_order))
                                    <option value="" disabled selected>Избери</option>
                                    @endif
                                    @foreach ($all_type_of_order_fields as $i)
                                    <option @if (isset($document_data->type_of_order) && $document_data->type_of_order
                                        == $i) selected @endif value="{{ $i }}">
                        {{ $i }}</option>
                        @endforeach
                        </select>
                    </div>
                    @endif
                </div> --}}
            </div>
            <table operators-table class="table table-striped table-bordered table-hover order-column">
                <thead>
                    <tr role="row" class="heading">
                        <th> Оператор </th>
                        <th> Тип на оператор </th>
                        <th> Број на платени InBan нарачки </th>
                        <th> Број на платени OutBan нарачки </th>
                        <th> Број на платени SocialNetwork нарачки </th>
                        <th> Број на платени нарачки </th>
                        <th> Сума од InBan нарачки</th>
                        <th> Сума од OutBan нарачки</th>
                        <th> Сума од Social Network нарачки</th>
                        <th> Вкупна сума од платени нарачки</th>
                        <th> Вкупно бонус за исплата во мкд.</th>
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
    var operatorStatisticsModule = (function() {
            var SELECTORS = {
                OPERATORS_TABLE: '[operators-table]',
            };
            var operatorStatisticsModule = {
                init: function() {
                    $(document).ready(this.handleDocumentReady.bind(this));
                    $(document).ready($(".select2").select2());
                },
                handleDocumentReady: function() {
                    this.initOperatorStatisticsTable();
                    $('#documentStatus,#from,#to,#type_of_order,#createdBy,#operatorType').on('change', function() {
                        $(SELECTORS.OPERATORS_TABLE).DataTable().ajax.reload(); 
                    });
                },
                initOperatorStatisticsTable: function() {
                    window.ddt = $(SELECTORS.OPERATORS_TABLE).dataTable({
                        "bInfo": false,
                        "processing": true,
                        "serverSide": true,
                        // "order": [
                        //     [0, 'desc']
                        // ],
                        "columnDefs": [
                            {
                                "render": function ( data, type, row ) {
                                    return row[0];
                                },
                                "targets": 0
                            }
                        ],
                        "scrollCollapse": true,
                        // "scrollX": true,
                        "paging": true,
                        // "deferLoading": 10,
                        // "scrollY": "500px",
                        "ajax": {
                            "url": '{{ URL::to('/admin') }}/report/operatorStatistics/datatable',
                            "type": "GET",
                            "data": function(d) {
                                return $.extend({}, d, {
                                    // "type_of_order": $("#type_of_order").val(),
                                    "createdBy": $("#createdBy").val(),
                                    "operatorType": $("#operatorType").val(),
                                    "from": $("#from").val(),
                                    "to": $("#to").val()
                                });
                            }
                        },
                        "language": {
                            url: EsConfig.routes.datatableLanguage
                        },
                        buttons: [],
                        lengthMenu: [10, 25, 50, 75, 100],
                        "pageLength": 50,
                    });
                }
            };
            return operatorStatisticsModule;
        })();
        operatorStatisticsModule.init();
</script>
<script src="/assets/admin/pages/scripts/ecommerce-products-edit.js" type="text/javascript"></script>@stop
<style type="text/css">
    td {
        text-align: right;
    }
</style>
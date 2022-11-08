@extends('layouts.admin')

@section('content')
    <div class="page-content-inner">

        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN SAMPLE TABLE PORTLET-->
                <div class="portlet light ">
                    <div class="portlet-title">
                        <div class="caption">
                            <span class="caption-subject font-blue-soft bold uppercase">Извештај продажба по артикли </span>
                        </div>
                        <div class="actions">
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

                    <div class="row">

                        {{--<div class="col-md-3">--}}
                            {{--<div class="form-group">--}}
                                {{--<label for="">Категорија</label>--}}
                                {{--<select id="category_select">--}}
                                    {{--<option value="0">Сите</option>--}}
                                    {{--{{!!$categires_html!!}}--}}
                                {{--</select>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Датум</label>
                                <div class="input-group input-medium date-picker input-daterange" data-date="10.11.2012" data-date-format="dd.mm.yyyy" data-date-week-start = "1">
                                    <input type="text"
                                           class="form-control"
                                           id="from_date"
                                           name="from_date"
                                           value="{{ date('d.m.Y') }}" style="text-align:left;">
                                    <span class="input-group-addon"> до </span>
                                    <input type="text"
                                           class="form-control"
                                           id="to_date"
                                           name="to_date"
                                           value="{{ date('d.m.Y') }}" style="text-align:left;">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Магацин</label>
                                <div>
                                    <select id="warehouse_id" name="warehouse_id" class="select2" style="width:100%">                                        
                                        @if(\Auth::user()->canDo('admin_izbor_magacin'))
                                            <option value="0">Сите</option>
                                            @foreach($warehouses as $warehouse)
                                                <option  value="{{$warehouse->id}}">{{$warehouse->title}}</option>
                                            @endforeach
                                        @else
                                            @foreach($warehouses as $warehouse)
                                                @if(\Auth::user()->warehouse_id == $warehouse->id)
                                                    <option  value="{{$warehouse->id}}">{{$warehouse->title}}</option>
                                                @endif 
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>


                    </div>

                    <div class="portlet-body">
                        <table prodazba-po-artikli-table="" class="table table-striped table-bordered table-hover order-column">
                            <thead>
                                <tr role="row" class="heading">
                                    <th> Шифра</th>
                                    <th style="min-width: 250px;"> Артикл</th>
                                    <th> Вкупно Бр. <br/>продадени производи</th>
                                    <th> Средна <br/> продажна цена</th>
                                    <th> Набавна цена</th>
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
        var ProdazbaPoArtikli = (function(){

            var SELECTORS = {
                PRODAZBA_PO_ARTIKLI_TABLE: '[prodazba-po-artikli-table]',
                WAREHOUSE_ID: '#warehouse_id'
            };

            var ProdazbaPoArtikli = {
                init: function() {
                    $(document).ready(this.handleDocumentReady.bind(this));
                },

                handleDocumentReady: function() {
                    this.initProdazbaPoArtikliTable();

                    $('#from_date, #to_date, #warehouse_id').on('change',function(){ //#stock_select,#category_select,
                        $(SELECTORS.PRODAZBA_PO_ARTIKLI_TABLE).DataTable().ajax.reload(); //Exact value, column, reg
                    });

                    $(SELECTORS.WAREHOUSE_ID).select2({ width: '100%' }); //#stock_select,#category_select,

                    $('.date-picker').datepicker({
                        autoclose: true
                    });
                },

                initProdazbaPoArtikliTable: function() {


                    window.ddt = $(SELECTORS.PRODAZBA_PO_ARTIKLI_TABLE).dataTable({
                        "processing": true,
                        "serverSide": true,
                        "ajax": {
                            "url": "{{ route('admin.report.prodazba.artikliDatatable') }}",
                            "type": "POST",
                            "data": function ( d ) {
                                return $.extend( {}, d, {
//                                    "inStock": $("#stock_select").val(),
//                                    "category": $("#category_select").val(),
                                    "warehouse_id": $("#warehouse_id").val(),
                                    "from_date": $("#from_date").val(),
                                    "to_date" : $("#to_date").val()
                                } );
                            }
                        },
                        "language": {
                            url: EsConfig.routes.datatableLanguage
                        },

                        // setup buttons extension: http://datatables.net/extensions/buttons/
                        buttons: [
                            { extend: 'print', className: 'btn dark btn-outline', exportOptions: { columns: ':visible' } },
                            { extend: 'copy', className: 'btn red btn-outline', exportOptions: { columns: ':visible' } },
                            { extend: 'pdf', className: 'btn green btn-outline', exportOptions: { columns: ':visible' } },
                            { extend: 'excel', className: 'btn yellow btn-outline ', exportOptions: { columns: ':visible' } },
//                             { extend: 'csv', className: 'btn purple btn-outline ' },
                            { extend: 'colvis', className: 'btn dark btn-outline', text: 'Колони'}
                        ],
                        lengthMenu:  [[ 25, 50, 75, 100, 250, 500, -1 ], [ 25, 50, 75, 100, 250, 500, "Сите" ]],

//                        "order": [
//                            [2, 'desc']
//                        ],
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
                        "pageLength": 100,
                        "dom": "<'row' <'col-md-12'B>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>" // horizobtal scrollable datatable

                    });
                }
            };

            return ProdazbaPoArtikli;
        })();

        ProdazbaPoArtikli.init();

    </script>
@stop
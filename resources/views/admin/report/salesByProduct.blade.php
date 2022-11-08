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
                    <?php  $global_prices = \EasyShop\Models\AdminSettings::getField('prices');
                    ?>


                    <div class="row">

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Категорија</label>
                                <select id="category_select">
                                    <option value="0">Сите</option>
                                    {{!!$categires_html!!}}
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                        <div class="form-group">
                                    <label>Датум</label>
                                    <div class="input-group input-medium date-picker input-daterange" data-date="10.11.2012" data-date-format="dd.mm.yyyy" data-date-week-start = "1">
                                        <input type="text"
                                               class="form-control"
                                               id="new_from"
                                               name="new_from"
                                               value="{{ date('d.m.Y',strtotime('-31day',time()))  }}" style="text-align:left;">
                                        <span class="input-group-addon"> до </span>
                                        <input type="text"
                                               class="form-control"
                                               id="new_to"
                                               name="new_to"
                                               value="{{date('d.m.Y')}}" style="text-align:left;">
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
                                                    <option   value="{{$warehouse->id}}">{{$warehouse->title}}</option>
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
                        <table articles-table class="table table-striped table-bordered table-hover order-column">
                            <thead>
                                <tr role="row" class="heading">
                                    
                                    <th> Шифра</th>
                                    <th style="min-width: 250px;"> Артикл</th>
                                    <th> Вкупно Бр. <br/> производи</th>
                                    <th> Вкупно Бр. <br/> нарачки</th>
                                    <th class="tooltips" data-container="body" data-placement="top" data-original-title="Средна продажна цена"> Вкупно Средна <br/> продажна цена</th>                                    
                                    <th> Вкупно <br/> продадено (сума)</th>
                                    <th> Вкупно Средна <br/> набавна цена</th>
                                    <th> Вкупно <br/>набавена (количина)</th>
                                    <th> Вкупно потрошено <br/> за достава</th>                         
                                    
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

    
                window.ddt = $(SELECTORS.ARTICLES_TABLE).dataTable({
                    "processing": true,
                    "serverSide": true,
                    "ajax": {
                        "url": "{{ route('admin.report.salesbyproduct') }}",
                        "type": "POST",
                       "data": function ( d ) {
                             return $.extend( {}, d, {
                                "inStock": $("#stock_select").val(),
                                "category": $("#category_select").val(),
                                "warehouse_id": $("#warehouse_id").val(),
                                "new_from": $("#new_from").val(),
                                "new_to" : $("#new_to").val()
                             } );
                          }
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
                    
                    "order": [
                        [2, 'desc']
                    ],
                    "columns": [
//
                        { "data": "unit_code" },
                        { "data": "nona" },
                        { "data": "broj_proizvodi" },
                        { "data": "broj_naracki" },
                        { "data": "price_retail_1",
                            "render": function ( data, type, row, meta ) {
                                return number_format_js(data,0,'.',',');
                            }
                        },
                        { "data": "active",
                            "render": function ( data, type, row, meta ) {
                                return number_format_js(data,0,'.',',');
                            }
                        },
                        { "data": "nabaveni",
                            "render": function ( data, type, row, meta ) {
                                return number_format_js(data,0,'.',',');
                            } },
                        { "data": "nabaveni_sum",
                            "render": function ( data, type, row, meta ) {
                                return number_format_js(data,0,'.',',');
                            } },
                        { "data": "dostava_sum" ,
                            "render": function ( data, type, row, meta ) {
                                return number_format_js(data,0,'.',',');
                            }}
                    ],
                    // set the initial value
                    "pageLength": 50,
                   // "dom": "<'row' <'col-md-12'B>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>" // horizobtal scrollable datatable

                });
            }
        };
        
        return Articles;
    })();

    Articles.init();

    $('#stock_select,#category_select,#new_from,#new_to,#warehouse_id').on('change',function(){
        $('[articles-table]').DataTable().ajax.reload(); //Exact value, column, reg
    });
    $(document).ready(function() {
      $('#stock_select,#category_select,#warehouse_id').select2({ width: '100%' });
    });
    </script>
    <script src="/assets/admin/pages/scripts/ecommerce-products-edit.js" type="text/javascript"></script>
@stop
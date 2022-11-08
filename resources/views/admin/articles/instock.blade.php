@extends('layouts.admin')

@section('content')
    <?php
    $my_user_global = Auth::user();
    ?>
    <div class="page-content-inner">
{{--warehouses--}}
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN SAMPLE TABLE PORTLET-->
                <div class="portlet light ">
                    <div class="portlet-title">
                        <div class="caption">
                            <span class="caption-subject font-blue-soft bold uppercase">Лагер листа</span>
                        </div>
                        
                    </div>

                    <div class="portlet-body">

                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Категорија</label>
                                <select id="category_select" class="select2">
                                    <option value="0">Сите</option>
                                    {{!!$categires_html!!}}
                                </select>
                            </div> 
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Производител</label>
                                <select id="manufacturer_select" class="select2">
                                    <option value="0">Сите</option>
                                    @foreach($manufacturers as $manufacturer)
                                        <option value="{{$manufacturer->id}}">{{$manufacturer->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="form-group">
                                <label for="">Залиха</label>
                                <select id="stock_select" class="select2">
                                    <option value="">Сите</option>
                                    <option value="no_stock">Нема</option>
                                    <option value="in_stock">Има</option>
                                    <option value="custom_stock">Опсег</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="row custom_stock_wrapper" style="display: none;">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Од</label>
                                        <input type="number" id="stock_from" value="1" class="form-control"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">До</label>
                                        <input type="number" id="stock_to" value="1000" class="form-control"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                        
                        <table in-stock-table class="table table-striped table-bordered table-hover order-column">
                            <thead>
                            <tr role="row" class="heading">
                                <th>ID</th>
                                <th>Шифра</th>
                                <th>Артикал</th>
                                <th>Малопродажна</th>
                                @if($my_user_global->canDo('katalog_lager_lista_nabavni'))
                                    <th>Набавна</th>
                                @endif
                                @if(config( 'app.client') == 'kopkompani')
                                    <th>Локација</th>
                                @endif
                                @foreach($warehouses as $warehouse)
                                <?php $temp_whname = explode(' ',$warehouse->title); ?>
                                    <th>
                                        @foreach($temp_whname as $tw)
                                            {{ucfirst($tw)}}<br/>
                                        @endforeach
                                    </th>
                                @endforeach
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


    <div class="page-content-inner">
            <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN SAMPLE TABLE PORTLET-->
                    <div class="portlet light ">
                        <div class="portlet-title">
                            <div class="caption">
                                <span class="caption-subject font-blue-soft bold uppercase">Печатење на цени</span>
                            </div>
                        </div>
                        <div class="portlet-body">
                        <div class="actions" style="width: 80%;">
                                <form method="GET" action="{{route('admin.article.instock.print')}}" target="_blank">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <select name="warehouse_id" class="select2warehouse">
                                                <option value="">Избери магацин</option>                                            
                                                @if(\Auth::user()->canDo('admin_izbor_magacin'))
                                                    @foreach($warehouses as $warehouse)
                                                        <option value="{{$warehouse->id}}">{{$warehouse->title}}</option>
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
                                        <div class="col-md-4">
                                            <select name="products_ids[]" class="select2products" multiple="">
                                                @foreach($products as $product)
                                                    <option value="{{$product->id}}">{{$product->unit_code}} - {{$product->title}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <select name="dimenzija" class="select2">
                                                <option value="dimenzija_1">Димензија 1</option>
                                                <option value="dimenzija_2">Димензија 2</option>
                                                <option value="dimenzija_3">Димензија 3</option>
                                                <option value="dimenzija_4">Димензија 4</option>
                                            </select>
                                        </div>
                                        <div class="col-md-1">
                                            <input type="number" class="form-control" name="quantity" value="1"/>
                                        </div>
                                        <div class="col-md-2">
                                            <button class="btn btn-default" type="submit">Печати цени</button>
                                        </div>
                                    </div>





                                </form>
                                
                            </div>
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
                IN_STOCK_TABLE: '[in-stock-table]'
            };

            var Articles = {
                init: function() {
                    $(document).ready(this.handleDocumentReady.bind(this));
                },

                handleDocumentReady: function() {
                    this.initArticlesTable();
                },

                initArticlesTable: function() {


                    window.ddt = $(SELECTORS.IN_STOCK_TABLE).dataTable({
                        "stateSave": true,
                        "stateDuration": 32000000,
                        "processing": true,
                        "serverSide": true,
                        "ajax": {
                            "url": "{{ route('admin.article.instock.datatables') }}",
                            "type": "POST",
                            "data": function ( d ) {
                                return $.extend( {}, d, {
                                    "inStock": $("#stock_select").val(),
                                    "category": $("#category_select").val(),
                                    "manufacturer": $("#manufacturer_select").val(),
                                    "stock_from": $("#stock_from").val(),
                                    "stock_to": $("#stock_to").val()
                                } );
                            }
                        },
                        "initComplete": function(settings, json) {
                            $(".dataTables_filter input")
                                .unbind()
                                .bind("keypress", function(e) {
                                    if(e.keyCode == "13")
                                    {
                                        window.ddt.fnFilter(this.value);
                                        window.ddt.fnDraw();
                                    }
                                });
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
                        "columnDefs": [
                            {
                                "render": function ( data, type, row ) {
                                    if(row['id'] != undefined)
                                        return row['id'];
                                    else
                                        return row[0];
                                },
                                "targets": 0
                            },
                            {
                                "render": function ( data, type, row ) {
                                    if(row['unit_code'] != undefined)
                                        return row['unit_code'];
                                    else
                                        return row[1];
                                },
                                "targets": 1
                            },
                            {
                                "render": function ( data, type, row ) {
                                    if(row['title'] != undefined)
                                        return row['title'];
                                    else
                                        return row[3];
                                },
                                "targets": 2
                            },
                            {
                                "render": function ( data, type, row ) {
                                    if(row['price_retail_1'] != undefined)
                                        return row['price_retail_1'];
                                    else
                                        return row[4];
                                },
                                "targets": 3
                            },
                            @if($my_user_global->canDo('katalog_lager_lista_nabavni'))
                            {
                                "render": function ( data, type, row ) {
                                    if(row['price_nabavna'] != undefined)
                                        return row['price_nabavna'];
                                    else
                                        return row[5];
                                },
                                "targets": 4
                            },
                            @endif

                            @if(config( 'app.client') == 'kopkompani')
                            {
                                "render": function ( data, type, row ) {
                                    if(row['location'] != undefined)
                                        return row['location'];
                                    else
                                        return row[6];
                                },
                                "targets": {{ 5 }}
                            },
                            @endif
                            
                            {
                                "render": function ( data, type, row ) {
                                    if(row['total_stock'] != undefined)
                                        return row['total_stock'];
                                    else
                                        return row[2];
                                },
                                @if(config( 'app.client') == 'kopkompani')
                                    "targets": {{ 6 }}
                                @else
                                    "targets": {{ 5 }}
                                @endif
                            },




                        ],
                        "pageLength": 100,
                        "dom": "<'row' <'col-md-12'B>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>" // horizobtal scrollable datatable

                    });
                }
            };

            return Articles;
        })();

        Articles.init();

        $('#category_select,#manufacturer_select').on('change',function(){
            $('[in-stock-table]').DataTable().ajax.reload(); //Exact value, column, reg
        });

        $('#stock_from,#stock_to').on('change blur',function(){
            $('[in-stock-table]').DataTable().ajax.reload(); //Exact value, column, reg
        });

        $('#stock_select').on('change',function(){
            if($('#stock_select').val() === 'custom_stock') {
                $('.custom_stock_wrapper').show();
            } else {
                $('.custom_stock_wrapper').hide();
                $('[in-stock-table]').DataTable().ajax.reload(); //Exact value, column, reg
            }
        });
        $(document).ready(function() {
//            $('[name=products_select]').select2({ width: '100%', placeholder: 'Избери артикли' });
            $('.select2').select2({ width: '100%'});
            $('.select2products').select2({ width: '100%', placeholder: 'Избери артикли'});
            $('.select2warehouse').select2({ width: '100%', placeholder: 'Избери магацин', allowClear: true});

        });
    </script>
@stop
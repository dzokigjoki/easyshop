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
                            <span class="caption-subject font-blue-soft bold uppercase">Карта на артикал</span>
                        </div>
                        <div class="actions" style="width: 80%;">
                        </div>
                    </div>

                    <div class="portlet-body">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Артикл</label>
                                <select id="product_select" class="select2">
                                    <option value="0">Избери</option>
                                   @foreach($products as $prod)
                                    <option value="{{$prod->id}}">{{$prod->unit_code}} - {{$prod->title}}</option>
                                   @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Магацин</label>
                                <select id="warehouse_select" class="select2">
                                @if(\Auth::user()->canDo('admin_izbor_magacin'))                                    
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
                        
                        <table in-stock-table class="table table-striped table-bordered table-hover order-column">
                            <thead>
                            <tr role="row" class="heading">
                                <th>Дата</th>
                                <th>Тип на документ</th>
                                <th>Број на документ</th>
                                <th>Коминтент</th>
                                <th>Влез</th>
                                <th>Вл.цена без ДДВ</th>
                                <th>Излез</th>
                                <th>Из.цена без ДДВ </th>
                                <th>Состојба</th>
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
                        "processing": true,
                        "serverSide": true,
                        "ajax": {
                            "url": "{{ route('admin.article.karta.datatables') }}",
                            "type": "get",
                            "data": function ( d ) {
                                return $.extend( {}, d, {
                                    "product": $("#product_select").val(),
                                    "warehouse": $("#warehouse_select").val(),
                                    
                                } );
                            }
                        },
                        "columnDefs": [
                            {
                                "render": function ( data, type, row ) {
                                    return row[0];
                                },
                                "targets": 0
                            }
                        ],
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
                             
                        ],
                        lengthMenu:  [[ 25, 50, 75, 100, 250, 500, -1 ], [ 25, 50, 75, 100, 250, 500, "Сите" ]],

                        "pageLength": 100,
                        "dom": "<'row' <'col-md-12'B>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>" // horizobtal scrollable datatable

                    });
                }
            };

            return Articles;
        })();

        Articles.init();

        $('#product_select,#warehouse_select').on('change',function(){
            $('[in-stock-table]').DataTable().ajax.reload(); //Exact value, column, reg
        });

        $(document).ready(function() {
//            $('[name=products_select]').select2({ width: '100%', placeholder: 'Избери артикли' });
            $('.select2').select2({ width: '100%'});
            
        });
    </script>
@stop
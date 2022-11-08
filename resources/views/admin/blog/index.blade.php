@extends('layouts.admin')

@section('content')
<div class="page-content-inner">

    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN SAMPLE TABLE PORTLET-->
            <div class="portlet light ">
                <div class="portlet-title">
                    <div class="caption">
                        <span class="caption-subject font-green bold uppercase">Текстови</span>
                    </div>
                    <div class="actions">
                        <a class="btn btn-success" href="{{ route('admin.newblog') }}"><i class="fa fa-plus"></i>Нов
                            Текст</a>
                    </div>
                </div>
                <div class="portlet-body">
                    <table articles-table class="table table-striped table-bordered table-hover order-column">
                        <thead>
                            <tr>
                                <th colspan="1">Категорија</th>
                                <th colspan="2">
                                    <select id="category_select">
                                        <option value="all">Сите</option>
                                        {{!!$categires_html!!}}
                                    </select>
                                </th>
                                <th colspan="1">Датум</th>
                                <th colspan="1"></th>
                                <th colspan="1"></th>
                                <th colspan="1"></th>
                                {{-- <th colspan="2">
                                        <div class="input-group input-large date-picker input-daterange" data-date="10.11.2012" data-date-format="dd.mm.yyyy" data-date-week-start = "1">
                                                <input type="text"
                                                       class="form-control"
                                                       id="new_from"
                                                       name="new_from"
                                                       style="text-align:left;"
                                                       value="{{date('m.d.Y',strtotime('2016-01-01'))}}">
                </div>
                </th> --}}
                </tr>
                <tr role="row" class="heading">

                    <th class="tooltips" data-container="body" data-placement="top" data-original-title="Наслов">Наслов
                    </th>
                    <th>Категорија</th>
                    <th>Автор</th>
                    <th class="tooltips" data-container="body" data-placement="top" data-original-title="Линк">Линк</th>
                    <th class="tooltips" data-container="body" data-placement="top" data-original-title="Од датум">Датум
                        објава</th>

                    <th class="tooltips" data-container="body" data-placement="top" data-original-title="Активен">
                        Активен</th>
                    <th class="tooltips" data-container="body" data-placement="top" data-original-title="Акција 1">
                        Акции</th>
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
                        "url": "{{ route('admin.listblog') }}",
                        "type": "GET",
                       "data": function ( d ) {
                             return $.extend( {}, d, {                               
                               "new_from": $("#new_from").val(),
                               "new_to": $("#new_to").val(),
                               "category": $("#category_select").val(),                          
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
                    "pageLength": 50,
                    "dom": "<'row' <'col-md-12'B>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>" // horizobtal scrollable datatable

                });
            }
        };
        
        $(function() {
            $(SELECTORS.ARTICLES_TABLE).on('click', '[data-blog-delete]', function() {
                let $this = $(this);
                let blog_id = $this.attr('data-id');
                swal({
                        title: "Дали сте сигурни?",
                        text: "Бришење на блог",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Да",
                        cancelButtonText: "Не",
                        closeOnConfirm: true,
                        closeOnCancel: true,
                        // reverseButtons: true
                    },
                    function(isConfirm) {
                        if (isConfirm) {

                            $.ajax({
                                url: 'blog/delete/' + blog_id,
                                type: 'get',
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                success: function(data) {
                                    window.location.href = "/admin/blog";
                                }
                            });
                        }
                    })
            });
        });

        return Articles;
    })();

    Articles.init();

    $('#category_select').on('change',function(){
        $('[articles-table]').DataTable().ajax.reload(); //Exact value, column, reg
    });
    
    $(document).ready(function() {
      $('#stock_select,#category_select').select2({ width: '100%' });
      $('#new_from,#new_to').blur(function(){
        //$('[articles-table]').DataTable().ajax.reload(); //Exact value, column, reg
      });
    });
</script>
@stop
@extends('layouts.admin')

@section('content')
<?php $my_user_global = Auth::user(); ?>
<div class="page-content-inner">

    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN SAMPLE TABLE PORTLET-->
            <div class="portlet light ">
                <div class="portlet-title">
                    <div class="caption">
                        <span class="caption-subject font-blue-soft bold uppercase">Листа на Артикли</span>
                    </div>
                    <div class="actions">
                        @if($my_user_global->canDo('katalog_manage_articles'))
                        <a class="btn btn-info blue-soft" href="{{ route('admin.article.new') }}"><i class="fa fa-plus"></i>Нов Артикал</a>
                        @endif
                        @if(config( 'app.client') == 'pekabesko')
                        <a class="btn btn-info green-soft" target="_blank" href="{{ route('admin.article.getFromApi') }}"><i class="fa fa-plus"></i>Преземи ариткли</a>
                        @endif
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
                <?php $global_prices = \EasyShop\Models\AdminSettings::getField('prices');
                $sifra = \EasyShop\Models\AdminSettings::getField('sifra');
                $kupon        = \EasyShop\Models\AdminSettings::isSetTrue('coupons', 'modules');
                $promocija    = \EasyShop\Models\AdminSettings::getField('promotion');
                ?>


                <div class="row">

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Залиха</label>
                            <select id="stock_select" class="form-control">
                                <option value="all">Сите</option>
                                <option value="no_stock">Нема</option>
                                <option value="near_end">При крај</option>
                                <option value="in_stock">Има</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Категорија</label>
                            <select id="category_select">
                                <option value="0">Сите</option>
                                {{!!$categires_html!!}}
                            </select>
                        </div>
                    </div>
                </div>

                <div class="portlet-body">
                    <table articles-table class="table table-striped table-bordered table-hover order-column">
                        <thead>
                            <tr role="row" class="heading">
                                <th> ID</th>
                                @if(!empty($sifra))
                                <th style="min-width:50px;"> Шифра</th>
                                @endif
                                <th style="min-width: 250px;"> Артикл</th>
                                @if(config( 'app.client') == 'kopkompani')
                                <th> Локација</th>
                                @endif
                                <th> Категорија</th>
                                @if($global_prices['retail1'])
                                <th class="tooltips" data-container="body" data-placement="top" data-original-title="Малопродажна 1"> Цена</th>
                                @endif

                                <th class="tooltips" data-container="body" data-placement="top" data-original-title="Вкупна залиха во сите магацини"> Залиха</th>

                                <th> Активен</th>
                                @if(\EasyShop\Models\AdminSettings::isSetTrue('promotionsMenu', 'modules') && !empty($kupon))
                                <th> Купон</th>
                                @endif
                                @if(\EasyShop\Models\AdminSettings::isSetTrue('promotionsMenu', 'modules') && !empty($promocija))
                                <th> Промоција</th>
                                @endif
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
                    "stateSave": true,
                    "ajax": {
                        "url": "{{ route('admin.article.datatables') }}",
                        "type": "POST",
                        "data": function(d) {
                            return $.extend({}, d, {
                                "inStock": $("#stock_select").val(),
                                "category": $("#category_select").val()
                            });
                        }
                    },
                    "initComplete": function(settings, json) {
                        $(".dataTables_filter input")
                            .unbind()
                            .bind("keypress", function(e) {
                                if (e.keyCode == "13") {
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
            $(SELECTORS.ARTICLES_TABLE).on('click', '[data-article-delete]', function() {
                let $this = $(this);
                let article_id = $this.attr('data-id');
                swal({
                        title: "Дали сте сигурни?",
                        text: "Бришење на артикл",
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
                                url: 'articles/delete/' + article_id,
                                type: 'get',
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                success: function(data) {
                                    window.location.href = "/admin/articles";
                                }
                            });
                        }
                    })
            });
        });

        return Articles;
    })();

    Articles.init();


    $('#stock_select,#category_select').on('change', function() {
        $('[articles-table]').DataTable().ajax.reload(); //Exact value, column, reg
    });
    $(document).ready(function() {
        $('#stock_select,#category_select').select2({
            width: '100%'
        });
    });
</script>
@stop
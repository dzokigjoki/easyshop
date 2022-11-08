@extends('layouts.admin')

@section('content')



<div class="page-content-inner">
    <form class="form-horizontal form-row-seperated" role="form" action="{{ route('admin.promo-codes.store') }}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="portlet light portlet-fit ">
            <div class="portlet-title">
                <div class="caption">
                    <span class="caption-subject font-blue-soft bold uppercase"> @if($coupon->id) Промена на
                        Купон 
                        <input name="id" value={{$coupon->id}} type="hidden">
                        @else Внеси нов Купон @endif </span>
                </div>



            </div>
            <div class="portlet-body">

                @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="tabbable-line">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row form-group">
                                <div class="col-md-4">
                                    <label>Име</label>
                                </div>
                                <div class="col-md-7">
                                    <input id="ime" name="code" required class="form-control" value="{{ old('code', $coupon->code) }}" type="text">
                                    <a href="#" id="generate_name"> Generate </a>
                                </div>

                            </div>

                            <div class="row form-group">
                                <label class="col-md-4">Важи врз</label>
                                <div class="col-md-7">
                                    <select class="table-group-action-input form-control input-medium" name="type" id="kupon_tip">
                                        {{-- <option value="coupons">Одредени продукти</option> --}}
                                        <option value="cart">Цела кошничка</option>
                                    </select>

                                    {{-- <select class="table-group-action-input form-control input-medium" name="type"
                                id="vazi_vrz" style="display:none;">
                                   
                               </select> --}}
                                </div>
                            </div>

                            <div class="row form-group">
                                <label class="col-md-4">Tип</label>
                                <div class="col-md-7">
                                    <select class="table-group-action-input form-control input-medium" name="discount_type" id="popust_tip">
                                        <option @if(old('type', $coupon->discount_type) == 'percent') selected @endif value="percent">Процент</option>
                                        <option @if(old('type', $coupon->discount_type) == 'fixed') selected @endif value="fixed">Фиксно</option>
                                    </select>
                                </div>
                            </div>




                            <div class="row form-group">
                                <div class="col-md-4">
                                    <label class="control-label">Вредност</label>
                                </div>
                                <div class="col-md-7">
                                    <input id="popust_value" required name="value" class="form-control" value="{{ old('value', $coupon->value) }}" type="number">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-4">
                                    <label class="control-label">Колку пати може да се искористи</label>
                                </div>
                                <div class="col-md-7">
                                    <input id="popust_pati" required name="reuse_number" class="form-control" value="{{ old('reuse_number', $coupon->reuse_number) }}" type="number">
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="col-md-4 control-label">Означи како попуст од:</label>
                                <div class="col-md-8">
                                    <div class="input-group input-large date-picker input-daterange" data-date="10.11.2012" data-date-format="dd.mm.yyyy" data-date-week-start="1">
                                        <input type="text" class="form-control" name="start" style="text-align:left;" value="{{ old('start', $coupon->start) }}" id="popust_start">
                                        <span class="input-group-addon"> до : </span>
                                        <input type="text" class="form-control" name="end" style="text-align:left;" value="{{ old('end', $coupon->end) }}" id="popust_end">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="text-align:right;padding-top: 10px;" class="actions btn-set">
                        <a class="btn btn-secondary-outline" href="{{route('admin.articles')}}">Назад</a>

                        <button class="btn btn-info blue-soft" name="zacuvaj" value="zacuvaj" type="submit"><i class="fa fa-check"></i> Зачувај</button>

                        <button class="btn btn-info blue-soft" name="zacuvaj_editiraj" value="zacuvaj_editiraj" type="submit"><i class="fa fa-check-circle"></i>
                            Зачувај и продолжи со едитирање</button>
                    </div>
                </div>
            </div>
        </div>
        <input type="hidden" id="coupon_id" value="{{$coupon}}" name="coupon_id">
    </form>

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
                        "url": "{{ route('admin.listcouponDatatable') }}",
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
                            return '<input type="checkbox" class="coupons_id" name="coupons_id[]" value="' +
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

        //$('input[type=checkbox]').iCheck('check');

        $('#stock_select,#category_select,#kupon_tip,#popust_tip').select2({
            width: '100%'
        });

        $("#generate_name").on('click', function() {
            $.get("{{ route('admin.copunname') }}", {}, function(data) {
                $("#ime").val(data);
            });

        });

    });
</script>
@stop
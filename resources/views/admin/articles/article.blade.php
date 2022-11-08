@extends('layouts.admin')

@section('content')

    <!-- END PAGE BREADCRUMBS -->
    <!-- BEGIN PAGE CONTENT INNER -->
    <div class="content">
        <div class="page-content-inner">
            <div class="row">
                <div class="col-md-12">
                    <form class="form-horizontal form-row-seperated" role="form" action="{{ route('admin.article.save') }}"
                        method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="portlet light portlet-fit ">
                            <div class="portlet-title">
                                <div class="caption">
                                    <span class="caption-subject font-blue-soft bold uppercase">
                                        @if ($product_id) Промена на
                                        Артикал @else Внеси нов Артикал @endif
                                    </span>
                                </div>

                                <div class="actions btn-set pull-right">
                                    <a class="btn btn-secondary-outline" href="{{ route('admin.articles') }}">Назад</a>
                                    <button class="btn btn-info blue-soft" name="zacuvaj" value="zacuvaj" type="submit">
                                        <i class="fa fa-check"></i> Зачувај
                                    </button>
                                    <button class="btn btn-info blue-soft" name="zacuvaj_editiraj" value="zacuvaj_editiraj"
                                        type="submit">
                                        <i class="fa fa-check-circle"></i> Зачувај и продолжи со едитирање
                                    </button>
                                </div>

                                @if ($product_id)
                                    <input type="text" class="form-control" readonly
                                        value="/p/{{ $product->id }}/{{ $product->url }}" />
                                @endif
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
                                <div @if(count($languages) > 1) class="tabbable-line" @endif>
                                    @if(count($languages) > 1)
                                    <ul class="nav nav-tabs">
                                        <?php $loop = 1; ?>
                                        
                                        @foreach($languages as $i)
                                        <li @if($loop == 1) class="active" @endif>
                                            <a href="#tab{{ $loop }}" data-toggle="tab"> {{ $i['name'] }} </a>
                                        </li>
                                        <?php $loop += 1; ?>
                                        @endforeach
                                    </ul>
                                    @endif


                                    <div class="tab-content">
                                        <div class="tab-pane fade active in tabbable-line" id="tab1">
                                            <ul class="nav nav-tabs">
                                                <li class="active">
                                                    <a href="#tab_general" data-toggle="tab"> Општи информации </a>
                                                </li>
                                                <li>
                                                    <a href="#tab_meta" data-toggle="tab"> Meta информации </a>
                                                </li>
                                                <li>
                                                    <a href="#tab_attributes" data-toggle="tab"> Атрибути </a>
                                                </li>
                                                <li>
                                                    <a href="#tab_prices" data-toggle="tab"> Цени </a>
                                                </li>
                                                <li>
                                                    <a href="#tab_images" data-toggle="tab"> Галерија </a>
                                                </li>
                                                @if ($product_id)
                                                    <li class="quantity">
                                                        <a href="#tab_warehouses" data-toggle="tab"> Количина </a>
                                                    </li>
                                                @endif



                                            </ul>

                                            <div class="tab-content">

                                                @include('admin.articles.partials.general-tab')
                                                @include('admin.articles.partials.meta-tab')
                                                @include('admin.articles.partials.attributes-tab')
                                                @include('admin.articles.partials.prices-tab')
                                                @include('admin.articles.partials.images-tab')
                                                @include('admin.articles.partials.warehouses-tab')
                                            </div>

                                        </div>
                                        <div class="tab-pane fade" id="tab2">
                                            @include('admin.articles.partials.english')
                                        </div>

                                        <div style="text-align:right;padding-top: 10px;" class="actions btn-set">
                                            <a class="btn btn-secondary-outline"
                                                href="{{ route('admin.articles') }}">Назад</a>

                                            <button class="btn btn-info blue-soft" name="zacuvaj" value="zacuvaj"
                                                type="submit"><i class="fa fa-check"></i> Зачувај</button>

                                            <button class="btn btn-info blue-soft" name="zacuvaj_editiraj"
                                                value="zacuvaj_editiraj" type="submit"><i class="fa fa-check-circle"></i>
                                                Зачувај и продолжи со едитирање</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" id="product_id" value="{{ $product_id }}" name="product_id">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- END PAGE CONTENT INNER -->

@stop
@section('scripts')
    <script src="/assets/admin/global/plugins/redactor/redactor.min.js" type="text/javascript"></script>
    <script src="/assets/admin/global/plugins/redactor/alignment.js" type="text/javascript"></script>
    <script src="/assets/admin/global/plugins/redactor/source.js" type="text/javascript"></script>
    <script src="/assets/admin/global/plugins/redactor/table.js" type="text/javascript"></script>
    <script src="/assets/admin/global/plugins/redactor/video.js" type="text/javascript"></script>
    <script src="/assets/admin/global/plugins/redactor/fontcolor.js" type="text/javascript"></script>
    <script src="/assets/admin/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
    <script src="/assets/admin/js/pages/articles.js" type="text/javascript"></script>
    <script src="/assets/admin/pages/scripts/ecommerce-products.js" type="text/javascript"></script>
    <script src="/assets/admin/pages/scripts/ecommerce-products-edit.js" type="text/javascript"></script>
    @if ($product_id)
        <script src="/assets/admin/js/pages/editArticleDatatable.js" type="text/javascript"></script>
    @endif
    <script>
        $('form').submit(function(e) {
            App.blockUI({
                animate: true,
                overlayColor: '#000'
            });
        });


        $(document).ready(function() {

            $(".bundle-products-selector").select2();

            if ($("#bundle_products_number").val() > 0) {
                $(".manufacturer").hide();
                $(".warranty").hide();
                $(".unit_code").hide();
                $(".barcode").hide();
                $(".quantity").hide();
                $(".minimum-supply").hide();
                $(".quantity-input").hide();
                $(".type-data").hide();
                $(".bundle-count").show();
                $("#bundle-section").show();

            }


            $("#type").on('change', function() {
                if ($("#type :selected").val() == 'service') {
                    $("#zemja_poteklo").val(1);
                    $("#zemja_poteklo").trigger('change');
                    $("#zemja_poteklo").attr('disabled', true);
                } else {
                    $("#zemja_poteklo").attr('disabled', false);
                }
            })


            $("#bundle-check").on('switchChange.bootstrapSwitch', function(e, data) {
                if (data == true) {
                    $(".manufacturer").hide();
                    $(".warranty").hide();
                    $(".unit_code").hide();
                    $(".barcode").hide();
                    $(".quantity").hide();
                    $(".minimum-supply").hide();
                    $(".quantity-input").hide();
                    $(".type-data").hide();

                    $(".bundle-count").show();
                    $("#bundle-section").show();
                } else {
                    $(".manufacturer").show();
                    $(".warranty").show();
                    $(".unit_code").show();
                    $(".barcode").show();
                    $(".quantity").show();
                    $(".minimum-supply").show();
                    $(".quantity-input").show();
                    $(".type-data").show();

                    $(".bundle-count").hide();
                    $("#bundle-section").hide();
                }

            });


            $("[data-save]").on('click', function() {
                $.ajax({
                    type: "POST",
                    url: '/admin/bundle-add-product',

                    data: {
                        bundle: $("#product_id").val(),
                        product_id: $("#bundle_product_select").val()

                    },
                    success: function(res) {
                        $("#bundle-table").append("<tr><td>" + res.title + "</td>" +
                            " <td><button data-product-id='" + res.id +
                            "' type='button' class='btn btn-info red-soft' data-save><i class='fa fa-trash'></i></button></td></tr>"
                        );
                    }

                })
            });

            $("#delete_pdf").on('click', function() {
                
                $.ajax({
                    type: "get",
                    url: '/admin/delete_pdf/' + $("#delete_pdf").data('id'),
                    success: function() {
                        $(".hide_the_document").hide();
                        $("#hidden_document_id").removeClass("hide");
                    }

                })
            });


            

            $("[data-remove]").on('click', function() {
                let product_id = $(this).attr('data-product-id');
                let $this = $(this);
                $.ajax({
                    type: "DELETE",
                    url: '/admin/bundle-remove-product',

                    data: {
                        product_id: product_id,
                        bundle: $("#product_id").val()

                    },
                    success: function(res) {
                        $this.closest('tr').remove();
                    }

                })
            });


        });
    </script>
@stop

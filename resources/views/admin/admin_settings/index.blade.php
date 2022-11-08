@extends('layouts.admin')
@section('content')
    <div class="content">
        <div class="page-content-inner row">
            <form method="post" enctype="multipart/form-data" role="form"
                action="{{ route('admin.adminSettings.store') }}">
                {{ csrf_field() }}
                <div class="portlet light portlet-fit col-md-12">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-cog"></i>
                            Подесувања
                        </div>
                        <div class="actions btn-set">
                            <button class="btn btn-success" name="zacuvaj" value="zacuvaj" type="submit"><i
                                    class="fa fa-check"></i> Зачувај
                            </button>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="tabbable-line">
                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a href="#basic-info-tab" data-toggle="tab"> Општи информации </a>
                                </li>
                                <li>
                                    <a href="#basic-settings-tab" data-toggle="tab"> Општи подесувања </a>
                                </li>
                                <li>
                                    <a href="#payment-info-tab" data-toggle="tab"> Плаќање и Цени</a>
                                </li>
                                <li>
                                    <a href="#digital-marketing-tab" data-toggle="tab"> SEO</a>
                                </li>
                                <li>
                                    <a href="#product-settings-tab" data-toggle="tab"> Производи</a>
                                </li>
                                <li>
                                    <a href="#document-settings-tab" data-toggle="tab"> Документи</a>
                                </li>
                                <li>
                                    <a href="#modules-settings-tab" data-toggle="tab"> Модули</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                @include('admin.admin_settings.partials.basic-info-tab')
                                @include('admin.admin_settings.partials.basic-settings-tab')
                                @include('admin.admin_settings.partials.payment-info-tab')
                                @include('admin.admin_settings.partials.digital-marketing-tab')
                                @include('admin.admin_settings.partials.product-settings-tab')
                                @include('admin.admin_settings.partials.document-settings-tab')
                                @include('admin.admin_settings.partials.modules-settings-tab')
                            </div>
                            <div class="col-md-12"
                                style="border-top: 1px solid #eee;border-radius: 2px 2px 0 0; margin-bottom: 10px;padding-top:12px;text-align:right">
                                <div class="actions btn-set">
                                    <button class="btn btn-success" name="zacuvaj" value="zacuvaj" type="submit"><i
                                            class="fa fa-check"></i> Зачувај
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

@stop

@section('scripts')
    <script src="/assets/admin/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>

    <script>
        $(document).ready(function() {

            $(document).ready(function() {
                if (location.hash) {
                    $("a[href='" + location.hash + "']").tab("show");
                }
                $(document.body).on("click", "a[data-toggle='tab']", function(event) {
                    location.hash = this.getAttribute("href");
                    document.body.scrollTop = 0; // For Safari
                    document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
                });
            });
            $(window).on("popstate", function() {
                var anchor = location.hash || $("a[data-toggle='tab']").first().attr("href");
                $("a[href='" + anchor + "']").tab("show");
            });

            $('.select2').select2({
                width: '100%'
            });
            if ($('#payments_select_dropdown').val() == 'casys') {
                $(".halk").addClass("hidden");
                $(".casys").removeClass("hidden");
            } else if ($('#payments_select_dropdown').val() == 'halk') {
                $(".halk").removeClass("hidden");
                $(".casys").addClass("hidden");
            } else {
                $(".halk").addClass("hidden");
                $(".casys").addClass("hidden");
            }

            $('#payments_select_dropdown').on('change', function() {
                if ($('#payments_select_dropdown').val() == 'casys') {
                    $(".halk").addClass("hidden");
                    $(".casys").removeClass("hidden");
                } else if ($('#payments_select_dropdown').val() == 'halk') {
                    $(".halk").removeClass("hidden");
                    $(".casys").addClass("hidden");
                } else {
                    $(".halk").addClass("hidden");
                    $(".casys").addClass("hidden");
                }
            });
            $("#addNewCurrencies").on('click', function() {
                currency_name = $('[name="currency_name"]').val();
                currency_divider = $('[name="currency_divider"]').val();

                $.post('{{ URL::to('admin/adminSettings/addNewCurrencies') }}', {
                    currency_name: currency_name,
                    currency_divider: currency_divider
                }).success(function(data) {
                    $('#currencies tr:last').after('<tr><td>' + data.name + '</td><td>' + data
                        .divider + '</td><td><i data-name="' + data.name +
                        '" data-field="currencies" class="fa fa-remove deleteField"></i></td></tr>'
                    );
                    $('.currencies').css('display', 'block');
                }).error(function(data) {});
            });


            $("#addNewPayments").on('click', function() {
                payment_name = $('[name="payment_name"]').val();
                payment_display = $('[name="payment_display"]').val();

                $.post('{{ URL::to('admin/adminSettings/addNewPayments') }}', {
                    payment_name: payment_name,
                    payment_display: payment_display
                }).done(function(data) {
                    $('#paymentMethods tr:last').after('<tr><td>' + data.name + '</td><td>' + data
                        .display_name + '</td><td><i data-name="' + data.name +
                        '" data-field="paymentMethods" class="fa fa-remove deleteField"></i></td></tr>'
                    );
                    $('.paymentMethods').css('display', 'block');
                });
            });
            $("#addNewPosti").on('click', function() {
                posta_name = $('[name="posta_name"]').val();
                posta_display = $('[name="posta_display"]').val();

                $.post('{{ URL::to('admin/adminSettings/addNewPosti') }}', {
                    posta_name: posta_name,
                    posta_display: posta_display
                }).done(function(data) {
                    $('#posti tr:last').after('<tr><td>' + data.name + '</td><td>' + data
                        .display_name + '</td><td><i data-name="' + data.name +
                        '" data-field="posti" class="fa fa-remove deleteField"></i></td></tr>');
                    $('.posti').css('display', 'block');
                });
            });

            $("#addNewDelivery").on('click', function() {
                delivery_type_name = $('[name="delivery_type_name"]').val();
                delivery_type_display = $('[name="delivery_type_display"]').val();
                delivery_type_price = $('[name="delivery_type_price"]').val();

                $.post('{{ URL::to('admin/adminSettings/addNewDelivery') }}', {
                    name: delivery_type_name,
                    display_name: delivery_type_display,
                    price: delivery_type_price
                }).done(function(data) {
                    $('#deliveryTypes tr:last').after('<tr><td>' + data.name + '</td><td>' + data
                        .display_name + '</td><td>' + data.price + '</td><td><i data-name="' +
                        data.name +
                        '" data-field="deliveryTypes" class="fa fa-remove deleteField"></i></td></tr>'
                    );
                    $('.deliveryTypes').css('display', 'block');
                });
            });


            $(document).on('click', ".deleteField", function() {
                name = $(this).data('name');
                field = $(this).data('field');

                $.post('{{ URL::to('admin/adminSettings/deleteField') }}', {
                    name: name,
                    field: field
                }).done(function(data) {

                    $('[data-name="' + name + '"]').closest('tr').remove();
                    var field = '.' + data.field
                    if (data.count == 0) {
                        $(field).hide();
                    }
                });
            });
        });
    </script>
@stop

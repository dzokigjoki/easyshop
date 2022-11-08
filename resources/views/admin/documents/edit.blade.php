@extends('layouts.admin')
@section('content')
<style>
    #product_id+.select2-container .select2-selection--single {
        height: 70px !important;
        display: flex;
        align-items: center;
    }




    #package_id+.select2-container .select2-selection--single {
        height: 70px !important;
        display: flex;
        align-items: center;
    }

    .select2-results__option {
        font-size: 12.5px;
    }
</style>

<div class="page-container">
    <div class="portlet light portlet-fit row">
        @include('admin.documents.partials.edit_head')

        @if ($document_data->payment == 'karticka' && \EasyShop\Models\AdminSettings::getField('clientId'))
        <form action="{{ route('halk.status') }}" method="POST" style="padding-bottom: 20px;">
            <input type="hidden" name="oid" value="{{ $document_data->checksum }}">
            <button type="submit" class="btn btn-primary">Провери статус</button>
        </form>
        @endif
        <div class="portlet-body">
            @include('admin.documents.partials.edit_sidebar')
            <div @if ($document_data->status == 'podgotovka') class="col-md-12"
                @else
                class="col-md-10" @endif>

                {{-- DOC INFO --}}
                @include('admin.documents.partials.edit_doc_info')

                @include('admin.documents.partials.edit_add_article')
                @include('admin.documents.partials.edit_articles_in')
                <div class="col-md-12">
                    <p style="color:darkred">Доколку менувате количина или цена на некои од ставките во документов,
                        соодветно ќе биде променета истата ставка во соодветните поврзани документи</p>
                </div>
                @include('admin.documents.partials.edit_remark')
            </div>
        </div>
    </div>
</div>
@stop
@section('scripts')
<script src="//cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.4/numeral.min.js"></script>
<script type="text/javascript">
    function uuidv4() {
        return 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function(c) {
            var r = Math.random() * 16 | 0,
                v = c == 'x' ? r : (r & 0x3 | 0x8);
            return v.toString(16);
        });
    }

    var Articles = (function() {

        var SELECTORS = {
            ARTICLES_TABLE: '[articles-table]'
        };

        var Articles = {
            total_noddv: 0,
            total_ddv: 0,
            total_ddv_0: 0,
            total_ddv_5: 0,
            total_ddv_18: 0,
            total_ddv_20: 0,
            total_no_ddv_0: 0,
            total_no_ddv_5: 0,
            total_no_ddv_18: 0,
            total_no_ddv_20: 0,
            isInitialized: false,
            prices: {
                ddv_5: 0,
                ddv_18: 0,
                ddv_20: 0,
                no_ddv_5: 0,
                no_ddv_18: 0,
                no_ddv_20: 0,
                ddv_sum: 0,
                no_ddv_sum: 0,
            },
            init: function() {
                $(document).ready(this.handleDocumentReady.bind(this));
            },

            handleDocumentReady: function() {
                this.initArticlesTable();
            },

            calculateDDV: function(productVAT, price){
                productVAT = parseInt(productVAT, 10);
                price = parseFloat(price);
                switch(productVAT){
                    case 0:
                        this.total_ddv_0 += price;
                        break;
                    case 5:
                        this.total_ddv_5 += (price * 4.76) / 100;
                        this.total_no_ddv_5 += price - ((price * 4.76) / 100);
                        break;
                    case 18:
                        this.total_ddv_18 += (price * 15.254) / 100;
                        this.total_no_ddv_18 += price - ((price * 15.254) / 100);
                        break;
                    case 20:
                        this.total_ddv_20 += (price * 16.667) / 100;
                        this.total_no_ddv_20 += price - ((price * 16.667) / 100);
                        break;
                    default:
                        this.total_ddv_18 += (price * 15.254) / 100;
                        this.total_no_ddv_18 += price - ((price * 15.254) / 100);
                }
                @if(config('app.client') == \EasyShop\Models\Settings::CLIENT_NATURATHERAPYSHOP_ALB)
                var no_ddv_sum = this.total_no_ddv_5 + this.total_no_ddv_20;
                var ddv_sum = this.total_ddv_5 + this.total_ddv_20;
                @else
                var no_ddv_sum = this.total_no_ddv_5 + this.total_no_ddv_18;
                var ddv_sum = this.total_ddv_5 + this.total_ddv_18;
                @endif

                this.prices = {
                    ddv_5: this.total_ddv_5,
                    ddv_18: this.total_ddv_18,
                    ddv_20: this.total_ddv_20,
                    no_ddv_5: this.total_no_ddv_5,
                    no_ddv_18: this.total_no_ddv_18,
                    no_ddv_20: this.total_no_ddv_20,
                    ddv_sum: ddv_sum,
                    no_ddv_sum: no_ddv_sum
                };
            },

            initArticlesTable: function() {
                var _this = this;

                console.log('init articles table');


                window.ddt = $(SELECTORS.ARTICLES_TABLE).dataTable({
                    "ordering": false,
                    "paginating": false,
                    "bInfo": false,
                    "processing": true,
                    "serverSide": true,
                    "ajax": {
                        "url": '{{ URL::to("admin/document/$document_id_ajax/products") }}',
                        "type": "GET",
                        "data": {
                            "document": "{{ $document_type }}"
                        }
                    },
                    "bAutoWidth": false, // Disable the auto width calculation 
                    "aoColumns": [{
                            "sWidth": "1%"
                        }, // 3rd column width and so on 
                        {
                            "sWidth": "87%"
                        }, // 1st column width 
                        {
                            "sWidth": "2%"
                        }, // 2nd column width 
                        {
                            "sWidth": "2%"
                        }, // 3rd column width and so on 
                        {
                            "sWidth": "2%"
                        }, // 1st column width                       
                        {
                            "sWidth": "2%"
                        }, // 3rd column width and so on 
                        {
                            "sWidth": "2%"
                        }, // 3rd column width and so on  
                        {
                            "sWidth": "2%"
                        }, // 3rd column width and so on  
                        {
                            "sWidth": "2%"
                        }, // 3rd column width and so on 
                        @if ($document_data->status == 'podgotovka' && $document_type != 'vlez')
                            { "sWidth": "1%" }, // 3rd column width and so on
                        @endif

                    ],
                    "language": {
                        url: EsConfig.routes.datatableLanguage
                    },
                    buttons: [],
                    lengthMenu: [500],
                    "pageLength": 500,
                    "initComplete": function(settings, json) {
                        $('.product_name').editable({
                            url: "{{ URL::to('admin/document/changeProductName') }}",
                            type: 'text',
                            validate: function(value) {
                                if ($.trim(value) == '')
                                    return 'This field is required';
                            },
                            name: 'product_name',
                            title: 'Enter product name'
                        });
                        @if ($document_data->status == 'podgotovka')
                            $('.kolicina_class').editable({
                                url: "{{ URL::to('admin/document/change_document_field') }}",
                                type: 'number',
                                validate: function(value) {
                                    if ($.trim(value) == '') return 'Полето е задолжително';
                                },
                                success: function(response, newValue) {
                                if(response.success == 1) {
                                    $("#sum_"+response.id).html(response.sum_vat);
                                }
                            },
                        
                            name: 'kolicina',
                            title: 'Внесете количина'
                            });
                        
                            $('.pricenovat_class').editable({
                            url: "{{ URL::to('admin/document/change_document_field') }}",
                            type: 'text',
                            validate: function(value) {
                            if ($.trim(value) == '') return 'Полето е задолжително';
                            },
                            success: function(response, newValue) {
                            if(response.success == 1)
                            {
                            $("#sum_"+response.id).html(response.sum_vat);
                            $("#price_"+response.id).html(response.price);
                            }
                            },
                            name: 'price_no_vat',
                            title: 'Внесете Eдинеч. цена без ДДВ'
                            });
                        
                            $('.price_class').editable({
                            url: "{{ URL::to('admin/document/change_document_field') }}",
                            type: 'text',
                            validate: function(value) {
                            if ($.trim(value) == '') return 'Полето е задолжително';
                            },
                            success: function(response, newValue) {
                            if(response.success == 1)
                            {
                            $("#sum_"+response.id).html(response.sum_vat);
                            $("#pricenovat_"+response.id).html(response.price_no_vat);
                            }
                            },
                            name: 'price',
                            title: 'Внесете Eдинеч. цена со ДДВ'
                            });
                        @endif
                    },
                    "footerCallback": function(row, data, start, end, display) {
                        _this.total_ddv = 0;
                        _this.total_noddv = 0;
                        var api = this.api(),
                            data;
                        // Remove the formatting to get integer data for summation
                        var intVal = function(i) {
                            return typeof i === 'string' ? i.replace(/[\$,]/g, '') * 1 :
                                typeof i === 'number' ? i : 0;
                        };

                        var total_ddv_values = api.column(6, {
                            page: 'current'
                        }).data();

                        var kol = api.column(2, {
                            page: 'current'
                        }).data();
                        var noddv = api.column(3, {
                            page: 'current'
                        }).data();
                        var danok = api.column(4, {
                            page: 'current'
                        }).data();

                        $.each(kol, function(key, value) {

                            kol[key] = $(value).html();
                            noddv[key] = $(noddv[key]).html();
                            total_ddv_values[key] = $(total_ddv_values[key]).html();

                            if (typeof noddv[key] === 'string' || typeof noddv[
                                    key] === 'number') {
                                if ((typeof danok[key] === 'string' || typeof danok[
                                        key] === 'number') && danok[key] != '0%') {
                                    total_noddv = intVal(_this.total_noddv) + (intVal(
                                        noddv[key]) * intVal(kol[key]));
                                }
                            }
                        });
                        $.each(total_ddv_values, function(key, value) {
                            _this.total_ddv = parseFloat(_this.total_ddv) + parseFloat(value
                                .replace(/,/g, ''));
                        });
                        if (!_this.isInitialized) {
                            $.each(total_ddv_values, function(key, value) {
                                _this.calculateDDV(danok[key], parseFloat(value.replace(/,/g, '')));
                            });
                            _this.isInitialized = true;
                        }
                    
                        _this.total_noddv = parseFloat(_this.total_noddv);
                        _this.total_ddv = parseFloat(_this.total_ddv);
                        @if (config('app.client') == \EasyShop\Models\Settings::CLIENT_NATURATHERAPYSHOP_AL)
                            var delivery_sum = $(".delivery_sum").text();
                        @else
                            var delivery_sum = $(".delivery_sum_value").text();
                        @endif
                        //console.log(delivery_sum);
                        if (!delivery_sum)
                            delivery_sum = 0;
                        else
                            delivery_sum = intVal(delivery_sum);

                        //total_ddv = total_ddv + delivery_sum;
                        //console.log(delivery_sum);
                        //total_ddv = total_ddv + delivery_sum * 0.18;
                        // Update footer
                        <?php
                        $firma_bez_danok = config( 'clients.'.config( 'app.client').
                            '.firma_bez_danok'); ?>


                        $("#total_price").html(numeral(_this.total_ddv).format('0,0'));
                        var vkupna_suma = _this.total_ddv + delivery_sum;

                        $("#no_ddv_5").html(numeral(_this.prices.no_ddv_5).format('0,0.00'));
                        $("#no_ddv_18").html(numeral(_this.prices.no_ddv_18).format('0,0.00'));
                        $("#no_ddv_20").html(numeral(_this.prices.no_ddv_20).format('0,0.00'));
                        $("#no_ddv_sum").html(numeral(_this.prices.no_ddv_sum).format('0,0.00'));
                        $("#ddv_5").html(numeral(_this.prices.ddv_5).format('0,0.00'));
                        $("#ddv_18").html(numeral(_this.prices.ddv_18).format('0,0.00'));
                        $("#ddv_20").html(numeral(_this.prices.ddv_20).format('0,0.00'));
                        $("#ddv_sum").html(numeral(_this.prices.ddv_sum).format('0,0.00'));
                        $("#netov").html(numeral(_this.prices.no_ddv_sum).format('0,0.00'));
                        $("#vrednost").html(numeral(_this.total_ddv).format('0,0.00'));
                        $("#vkupna_suma ").html(numeral(vkupna_suma).format('0,0.00'));

                        just_ddv = _this.total_ddv - _this.total_noddv;
                        var with_ddv = parseFloat(_this.total_ddv);
                        //var with_ddv = total_ddv - delivery_sum;
                        //with_ddv     = parseFloat(with_ddv);
                        @if ($firma_bez_danok)
                            just_ddv = 0;
                            $("#no_ddv").html(numeral(_this.total_ddv).format('0,0.00'));
                            $("#just_ddv").html(parseFloat(just_ddv.toFixed(2)));
                        @else
                            $("#no_ddv").html(numeral(_this.total_noddv).format('0,0.00'));
                            $("#just_ddv").html(parseFloat(just_ddv.toFixed(2)));
                        @endif
                        $(".with_ddv_sum").html(numeral(with_ddv).format('0,0.00'));
                        $(".dataTables_length").parent().remove();
                        $(".dataTables_filter").parent().remove();
                    }
                });
            },

        };

        return Articles;
    })();

     

    $(document).ready(function() {
        /* Select2 - set user value after client change */
        var SelectedUserName = sessionStorage.getItem('SelectedUserName');
        sessionStorage.removeItem('SelectedUserName');
        var SelectedUserId = parseInt(sessionStorage.getItem('SelectedUserId'));
        sessionStorage.removeItem('SelectedUserId');
        var option = '<option selected id="Нов Корисник" value="-1">Нов Корисник</option>';
        if(SelectedUserName != null && !isNaN(SelectedUserId)){
            var option = '<option selected id="'+ parseInt(SelectedUserId) +'" value="'+ parseInt(SelectedUserId) +'">'+ SelectedUserName +'</option>';
        }
        $("#show_cost").html(option);
        /* Select2 - end */

        $('.date-picker').datepicker({
            rtl: App.isRTL(),
            autoclose: true
        });

        $('.docdate_class').editable({
            url: "{{ URL::to('admin/document/change_document_field') }}",
            type: 'datetime',
            format: "dd.mm.yyyy hh:ii:ss",
            validate: function(value) {
                if ($.trim(value) == '') return 'Полето е задолжително';
            },
            name: 'document_date',
            title: 'Внесете датум на документ'
        });


        function editProductNameInit() {

            $('.product_name').editable({
                url: "{{ URL::to('admin/document/changeProductName') }}",
                type: 'text',
                pk: 1,
                name: 'product_name',
                title: 'Внесете име на продуктот'
            });
        }

        var variation_ajax = 0;
        var vat = 18;
        var document_type = '{{ $document_type }}';
        $("#variation_id_div").hide();
        $('.selectpicker').selectpicker({
            style: 'btn-info',
            size: 4
        });

        $(".select2").select2({
            templateResult: formatState,
            templateSelection: formatState
        });

        $("#promeni").on('click', function() {
            $("#new_display").show();
        });


        if ($("#type_of_order :selected").val() == "Социјални мрежи") {
            $("#more_client_information").show();
        }

        $('#type_of_order').on('change', function() {
            if ($(this).val() == "Социјални мрежи") {
                $("#more_client_information").show();
            } else {
                $("#more_client_information").hide();
            }
        });

        $('#more_client_information').on('click', function(e) {

            var selectedVal = "";
            var selected = $("input[type='radio'][name='more_client_information']:checked");

            selected.parent("span").addClass("checked");
            if (selected.length > 0) {
                selectedVal = selected.val();
            }
            $.get('{{ URL::to('admin/document/note/addNote') }}', {
                note: selectedVal,
                document_id: {{ $document_id }},
                document_type: "{{ $document_type }}"
            }).done(function(data) {});
        });


        $("#vkupna_cena").on('change keyup', function() {
            var temp_cena_vat;
            switch(parseInt(vat)) {
                case 20:
                    temp_cena_vat = 1.20;
                    break;
                case 18:
                    temp_cena_vat = 1.18;
                    break;
                case 5:
                    temp_cena_vat = 1.05;
                    break;
                case 0:
                    temp_cena_vat = 1.00;
                    break;
                default:
                    temp_cena_vat = 1.18;
            } 
            $("#cena").val(($("#vkupna_cena").val() / temp_cena_vat).toFixed(2));
        });

        $("#cena").on('change keyup', function() {
            var temp_cena_vat = 1.18;
            if (vat == 20)
                temp_cena_vat = 1.20;
            if (vat == 5)
                temp_cena_vat = 1.05;
            if (vat == 0)
                temp_cena_vat = 1.00;
            $("#vkupna_cena").val(($("#cena").val() * temp_cena_vat).toFixed(2));
        });

        $("#add_product").on('click', function() {
            var product_id = $("#product_id :selected").val();
            var product_kolicina = $("#kol_hidden").val();

            var currency_conversion = $('#currency_conversion').val()
            var customs = $('#customs').val();
            var transport = $('#transport').val();
            var freight_forwarder = $('#freight_forwarder').val();

            currency_conversion = !isNaN(currency_conversion) && currency_conversion >= 1 ?
                currency_conversion : 1;
            customs = !isNaN(customs) && customs >= 0 ? customs : 0;
            transport = !isNaN(transport) && transport >= 0 ? transport : 0;
            freight_forwarder = !isNaN(freight_forwarder) && freight_forwarder >= 0 ?
                freight_forwarder : 0;


            var variations = [];
            $("[name='variations[]']").each(function() {
                variations.push($(this).val());
            });

            if ($("#cena").val() >= 0 && $("#vkupna_cena").val() >= 0 && $("#kolicina").val() > 0 &&
                product_id > 0) {

                $.post('{{ URL::to("admin/document/{$document_id}/products/add") }}', {
                        product_id: $("#product_id").val(),
                        quantity: $("#kolicina").val(),
                        total_price: $("#vkupna_cena").val(),
                        price: $("#cena").val(),
                        discount_price: $('#cena_popust').val(),
                        variation_id: variations,
                        document_type: "{{ $document_type }}",

                        currency_conversion: currency_conversion,
                        customs: customs,
                        transport: transport,
                        freight_forwarder: freight_forwarder,
                    })
                    .done(function(data) {
                        if (data.error == 1){
                            alert('Продуктот е веќе додаден во документот');
                        }
                        else if(data.error == 2){
                            alert('Корисникот нема доволно поени!');
                        }
                        else {
                            var delivery_sum = data.price_delivery_updated;
                            Articles.calculateDDV(data.product_vat, data.product_price);
                            var vkupna_suma = Articles.total_ddv + delivery_sum;
                            
                            @if (config('app.client') == \EasyShop\Models\Settings::CLIENT_NATURATHERAPYSHOP_AL)
                                $(".delivery_sum").html(numeral(delivery_sum).format('0,0.00'));
                            @else
                                $(".delivery_sum_value").html(numeral(delivery_sum).format('0,0.00'));
                            @endif
                            $("#no_ddv_5").html(numeral(Articles.prices.no_ddv_5).format('0,0.00'));
                            $("#no_ddv_18").html(numeral(Articles.prices.no_ddv_18).format('0,0.00'));
                            $("#no_ddv_20").html(numeral(Articles.prices.no_ddv_20).format('0,0.00'));
                            $("#no_ddv_sum").html(numeral(Articles.prices.o_ddv_sum).format('0,0.00'));
                            $("#ddv_5").html(numeral(Articles.prices.ddv_5).format('0,0.00'));
                            $("#ddv_18").html(numeral(Articles.prices.ddv_18).format('0,0.00'));
                            $("#ddv_20").html(numeral(Articles.prices.ddv_20).format('0,0.00'));
                            $("#ddv_sum").html(numeral(Articles.prices.ddv_sum).format('0,0.00'));
                            $("#netov").html(numeral(Articles.prices.no_ddv_sum).format('0,0.00'));
                            $("#vrednost").html(numeral(Articles.total_ddv).format('0,0.00'));
                            $("#vkupna_suma ").html(numeral(vkupna_suma).format('0,0.00'));

                            $('[articles-table]').DataTable().ajax.reload(editProductNameInit);
                            $("#product_id").select2('val', '');
                            $("#kolicina").val('');
                            $("#cena").val('');
                            $("#vkupna_cena").val('');
                            $("#kolicina_span").html('');
                            $("#popustcena_span").html('');
                            variation_ajax = 0;
                            $("#variation_id_div").hide();
                            $("#variation_id").empty().trigger('change');
                        }
                        location.reload();
                    });
            } else {

                @if ($document_type == 'izlez')
                
                    $.post('{{ URL::to("admin/document/{$document_id}/products/add") }}', { product_id: $("#product_id").val(),
                    quantity:$("#kolicina").val(), total_price:0,price: 0,variation_id:$("#variation_id :selected").val()})
                    .done(function( data ) {
                    if(data.error == 1){
                    alert('Продуктот е веќе додаден во документот');
                    }
                    else if(data.error == 2){
                        alert('Корисникот нема доволно поени!');
                    }
                    else{
                    $('[articles-table]').DataTable().ajax.reload();
                    $("#product_id").select2('val','');
                    $("#kolicina").val('');
                    $("#cena").val('');
                    $("#vkupna_cena").val('');
                    $("#kolicina_span").html('');
                    $("#popustcena_span").html('');
                    variation_ajax = 0;
                    $("#variation_id_div").hide();
                    $("#variation_id").empty().trigger('change');
                    }
                    });
                @endif
            }
        });

        $("#add_package").on('click', function() {
            var product_id = $("#package_id :selected").val();
            var product_kolicina = $("#kol_hidden1").val();

            var currency_conversion = $('#currency_conversion1').val()
            var customs = $('#customs1').val();
            var transport = $('#transport1').val();
            var freight_forwarder = $('#freight_forwarder1').val();

            currency_conversion = !isNaN(currency_conversion) && currency_conversion >= 1 ?
                currency_conversion : 1;
            customs = !isNaN(customs) && customs >= 0 ? customs : 0;
            transport = !isNaN(transport) && transport >= 0 ? transport : 0;
            freight_forwarder = !isNaN(freight_forwarder) && freight_forwarder >= 0 ?
                freight_forwarder : 0;


            var variations = [];
            $("[name='variations[]']").each(function() {
                variations.push($(this).val());
            });

            if ($("#cena1").val() >= 0 && $("#vkupna_cena1").val() >= 0 && $("#kolicina1").val() > 0 &&
                product_id > 0) {

                $.post('{{ URL::to("admin/document/{$document_id}/products/add") }}', {
                        product_id: $("#package_id").val(),
                        quantity: $("#kolicina1").val(),
                        total_price: $("#vkupna_cena1").val(),
                        price: $("#cena1").val(),
                        variation_id: variations,
                        discount_price: $('#cena_popust1').val(),
                        document_type: "{{ $document_type }}",
                        currency_conversion: currency_conversion,
                        customs: customs,
                        transport: transport,
                        freight_forwarder: freight_forwarder,
                    })
                    .done(function(data) {
                        if (data.error == 1){
                            alert('Продуктот е веќе додаден во документот');
                        }
                        else if(data.error == 2){
                            alert('Корисникот нема доволно поени!');
                        }
                        else {
                            Articles.calculateDDV(data.product_vat, data.product_price);
                            var delivery_sum = data.price_delivery_updated;
                            var vkupna_suma = Articles.total_ddv + delivery_sum;

                            @if (config('app.client') == \EasyShop\Models\Settings::CLIENT_NATURATHERAPYSHOP_AL)
                                $(".delivery_sum").html(numeral(delivery_sum).format('0,0.00'));
                            @else
                                $(".delivery_sum_value").html(numeral(delivery_sum).format('0,0.00'));
                            @endif
                            $("#no_ddv_5").html(numeral(Articles.prices.no_ddv_5).format('0,0.00'));
                            $("#no_ddv_18").html(numeral(Articles.prices.no_ddv_18).format('0,0.00'));
                            $("#no_ddv_20").html(numeral(Articles.prices.no_ddv_20).format('0,0.00'));
                            $("#no_ddv_sum").html(numeral(Articles.prices.no_ddv_sum).format('0,0.00'));
                            $("#ddv_5").html(numeral(Articles.prices.ddv_5).format('0,0.00'));
                            $("#ddv_18").html(numeral(Articles.prices.ddv_18).format('0,0.00'));
                            $("#ddv_20").html(numeral(Articles.prices.ddv_20).format('0,0.00'));
                            $("#ddv_sum").html(numeral(Articles.prices.ddv_sum).format('0,0.00'));
                            $("#netov").html(numeral(Articles.prices.no_ddv_sum).format('0,0.00'));
                            $("#vrednost").html(numeral(Articles.total_ddv).format('0,0.00'));
                            $("#vkupna_suma ").html(numeral(vkupna_suma).format('0,0.00'));

                            $('[articles-table]').DataTable().ajax.reload(editProductNameInit);
                            $("#package_id").select2('val', '');
                            $("#kolicina1").val('');
                            $("#cena1").val('');
                            $("#vkupna_cena1").val('');
                            $("#kolicina_span1").html('');
                            $("#popustcena_span").html('');
                            variation_ajax = 0;
                            $("#variation_id_div").hide();
                            $("#variation_id").empty().trigger('change');
                        }
                        location.reload();
                    });
            } else {

                @if ($document_type == 'izlez')
                
                    $.post('{{ URL::to("admin/document/{$document_id}/products/add") }}', { 
                        product_id: $("#package_id").val(),
                        quantity :$("#kolicina1").val(), 
                        total_price :0,
                        price: 0,
                        variation_id: $("#variation_id :selected").val()}
                    ).done(function( data ) {
                        if(data.error == 1) {
                         alert('Продуктот е веќе додаден во документот');
                        }
                        else if(data.error == 2) {
                            alert('Корисникот нема доволно поени!');
                        } else {
                            $('[articles-table]').DataTable().ajax.reload();
                            $("#package_id").select2('val','');
                            $("#kolicina1").val('');
                            $("#cena1").val('');
                            $("#vkupna_cena1").val('');
                            $("#kolicina_span1").html('');
                            $("#popustcena_span").html('');
                            variation_ajax = 0;
                            $("#variation_id_div").hide();
                            $("#variation_id").empty().trigger('change');
                        }
                    });
                @endif
            }
        });

        function formatState(opt) {
            if (!opt.id) {
                return opt.text.toUpperCase();
            }

            var optimage = $(opt.element).attr('data-image');
            console.log(optimage)
            if (!optimage) {
                return opt.text.toUpperCase();
            } else {
                var $opt = $(
                    '<span><img src="' + optimage + '" width="60px" /> ' + opt.text.toUpperCase() +
                    '</span>'
                );
                return $opt;
            }
        };



        $("#type_of_order").on('change', function() {
            $.post('{{ URL::to('admin/document/changeTypeOfOrder') }}', {
                type_of_order: $("#type_of_order :selected").val(),
                document_id: {{ $document_id }},
                document_type: "{{ $document_type }}"
            }).done(function(data) {});
        });

        $("#courier_select").on('change', function() {
            $.post('{{ URL::to('admin/document/changeCourier') }}', {
                courier_select: $("#courier_select :selected").val(),
                document_id: {{ $document_id }},
                document_type: "{{ $document_type }}"
            }).done(function(data) {
                location.reload();
            });
        });

        

        $("#document_delivered_date").on('change', function() {
            $.post('{{ URL::to('admin/document/changeDocumentDeliveredDate') }}', {
                document_delivered_date: $("#document_delivered_date").val(),
                document_id: {{ $document_id }},
                document_type: "{{ $document_type }}"
            }).done(function(data) {});
        });
        
        $("#document_create_date").on('change', function() {
            $.post('{{ URL::to('admin/document/changeDocumentDate') }}', {
                document_create_date: $("#document_create_date").val(),
                document_id: {{ $document_id }},
                document_type: "{{ $document_type }}"
            }).done(function(data) {});
        });

        $("#warehouse_id_orders").on('change', function() {
            $.post('{{ URL::to('admin/document/changeWarehouse') }}', {
                warehouse_id: $("#warehouse_id_orders :selected").val(),
                document_id: {{ $document_id }},
                document_type: "{{ $document_type }}"
            }).done(function(data) {});
        });

        $("#type_delivery").on('change', function() {

            $.post('{{ URL::to('admin/document/changeTypeDelivery') }}', {
                type_delivery: $("#type_delivery :selected").val(),
                'document_id': {{ $document_id }}
            }).done(function(data) {


            });

        });


        $("#warehouse_id_orders").on('change', function() {
            $.post('{{ URL::to('admin/document/changeWarehouse') }}', {
                warehouse_id: $("#warehouse_id_orders :selected").val(),
                document_id: {{ $document_id }},
                document_type: "{{ $document_type }}"
            }).done(function(data) {});
        });

        $("#warehouse_to_id_orders").on('change', function() {
            $.post('{{ URL::to('admin/document/changeToWarehouse') }}', {
                warehouse_to_id: $("#warehouse_to_id_orders :selected").val(),
                'document_id': {{ $document_id }}
            }).done(function(data) {});
        });

        $("#currency").on('change', function() {

            $.post('{{ URL::to('admin/document/changeCurrency') }}', {
                currency: $("#currency :selected").val(),
                'document_id': {{ $document_id }}
            }).done(function(data) {

                $(".document_curr").text(data.currency);

            });

        });

        $("#product_id,#warehouse_id_orders").on('change', function() {

            if ($("#product_id :selected").val() > 0) {

                var send_userid = 0;
                if (document_type == 'priemnica') {
                    send_userid = "{{ $document_data->supplier_id }}";
                } else if (document_type != 'priemnica') {
                    send_userid = "{{ $document_data->user_id }}";
                }

                $.get('{{ URL::to('admin/product/warehouseCount') }}', {
                    product_id: $("#product_id :selected").val(),
                    user_id: send_userid,
                    doc_type: document_type,
                    warehouse_id: $("#warehouse_id_orders :selected").val()
                }).done(function(data) {
                    $("#kolicina_span").html('Во магацинот има ' + data.zaliha + ' на залиха');
                    $("#zaliha_izlez").html();
                    if (data.discount_type == 'percent')
                        $("#popustcena_span").html('Производот има ' + data.discount_value +
                            '% попуст');
                    if (data.discount_type == 'fixed')
                        $("#popustcena_span").html(data.discount_value + ' денари попуст');

                    $("#kolicina").val('');
                    $("#vkupna_cena").val(data.price);
                    vat = data.vat;
                    var temp_cena_vat;
                    switch(parseInt(vat)) {
                        case 20:
                            temp_cena_vat = 1.20;
                            break;
                        case 18:
                            temp_cena_vat = 1.18;
                            break;
                        case 5:
                            temp_cena_vat = 1.05;
                            break;
                        case 0:
                            temp_cena_vat = 1.00;
                            break;
                        default:
                            temp_cena_vat = 1.18;
                    } 
                    $("#cena").val(($("#vkupna_cena").val() / temp_cena_vat).toFixed(2));

                    if (data.has_variations > 0) {
                        variation_ajax = 0;
                        $("#variation_id_div").hide();
                        $("#variation_id").empty().trigger('change');

                        variation_ajax = 1;
                        $("#variation_id_div").html('').show();
                        console.log(data.variations);
                        $.each(data.variations, function(index, value) {
                            var id = uuidv4();
                            $("#variation_id_div").append(index +
                                ' <select class="select2 form-control" id="' + id +
                                '" name="variations[]"></select>');
                            $.each(value, function(k, v) {
                                var option = new Option(v.value, v.id, true,
                                    true);
                                $('#' + id).append(option).trigger('change');
                            })
                        });
                        $('#variation_id').val($('#variation_id option:first-child').val())
                            .trigger('change');
                    } else {
                        variation_ajax = 0;
                        $("#variation_id_div").hide();
                        $("#variation_id").empty().trigger('change');
                    }

                    if (document_type == 'izlez') {
                        var otvoreni_dokumenti = '';
                        $.each(data.otvoreni_produkti, function(index_iz, value_iz) {
                            otvoreni_dokumenti = otvoreni_dokumenti + '<p><a href="./' +
                                value_iz.document_id + '">Излез</a> од датум    ' +
                                value_iz.document_date + '     за  ' + value_iz.title +
                                '         количина ' + value_iz.quantity +
                                '          цена ' + value_iz.price + '</p>';
                        });
                        $("#zaliha_izlez").html(otvoreni_dokumenti);
                        if (data.zaliha != data.zaliha_so_otvoreni) {
                            otvoreni_dokumenti = $("#kolicina_span").html();
                            otvoreni_dokumenti = otvoreni_dokumenti +
                                '<span style="color:red"> (' + data.zaliha_so_otvoreni +
                                ')</span>'
                            $("#kolicina_span").html(otvoreni_dokumenti);
                        }
                    }

                });
            }
        });

        $("#package_id,#warehouse_id_orders").on('change', function() {

            if ($("#package_id :selected").val() > 0) {

                var send_userid = 0;
                if (document_type == 'priemnica') {
                    send_userid = "{{ $document_data->supplier_id }}";
                } else if (document_type != 'priemnica') {
                    send_userid = "{{ $document_data->user_id }}";
                }

                $.get('{{ URL::to('admin/product/warehouseCount') }}', {
                    product_id: $("#package_id :selected").val(),
                    user_id: send_userid,
                    doc_type: document_type,
                    warehouse_id: $("#warehouse_id_orders :selected").val()
                }).done(function(data) {
                    $("#kolicina_span1").html('Во магацинот има ' + data.zaliha + ' на залиха');
                    $("#zaliha_izlez1").html();
                    if (data.discount_type == 'percent')
                        $("#popustcena_span1").html('Производот има ' + data.discount_value +
                            '% попуст');
                    if (data.discount_type == 'fixed')
                        $("#popustcena_span1").html(data.discount_value + ' денари попуст');

                    $("#kolicina1").val('');
                    $("#vkupna_cena1").val(data.price);
                    vat = data.vat;
                    var temp_cena_vat;
                    switch(parseInt(vat)) {
                        case 20:
                            temp_cena_vat = 1.20;
                            break;
                        case 18:
                            temp_cena_vat = 1.18;
                            break;
                        case 5:
                            temp_cena_vat = 1.05;
                            break;
                        case 0:
                            temp_cena_vat = 1.00;
                            break;
                        default:
                            temp_cena_vat = 1.18;
                    } 
                    $("#cena1").val(($("#vkupna_cena1").val() / temp_cena_vat).toFixed(2));

                    if (data.has_variations > 0) {
                        variation_ajax = 0;
                        $("#variation_id_div").hide();
                        $("#variation_id").empty().trigger('change');

                        variation_ajax = 1;
                        $("#variation_id_div").html('').show();
                        console.log(data.variations);
                        $.each(data.variations, function(index, value) {
                            var id = uuidv4();
                            $("#variation_id_div").append(index +
                                ' <select class="select2 form-control" id="' + id +
                                '" name="variations[]"></select>');
                            $.each(value, function(k, v) {
                                var option = new Option(v.value, v.id, true,
                                    true);
                                $('#' + id).append(option).trigger('change');
                            })
                        });
                        $('#variation_id').val($('#variation_id option:first-child').val())
                            .trigger('change');
                    } else {
                        variation_ajax = 0;
                        $("#variation_id_div").hide();
                        $("#variation_id").empty().trigger('change');
                    }

                    if (document_type == 'izlez') {
                        var otvoreni_dokumenti = '';
                        $.each(data.otvoreni_produkti, function(index_iz, value_iz) {
                            otvoreni_dokumenti = otvoreni_dokumenti + '<p><a href="./' +
                                value_iz.document_id + '">Излез</a> од датум    ' +
                                value_iz.document_date + '     за  ' + value_iz.title +
                                '         количина ' + value_iz.quantity +
                                '          цена ' + value_iz.price + '</p>';
                        });
                        $("#zaliha_izlez").html(otvoreni_dokumenti);
                        if (data.zaliha != data.zaliha_so_otvoreni) {
                            otvoreni_dokumenti = $("#kolicina_span").html();
                            otvoreni_dokumenti = otvoreni_dokumenti +
                                '<span style="color:red"> (' + data.zaliha_so_otvoreni +
                                ')</span>'
                            $("#kolicina_span").html(otvoreni_dokumenti);
                        }
                    }

                });
            }
        });

        $("#variation_id").on('change', function() {

            if (variation_ajax) {

                $.get('{{ URL::to('admin/product/variationSum') }}', {
                    product_id: $("#product_id :selected").val(),
                    variation_id: $("#variation_id :selected").val(),
                    warehouse_id: $("#warehouse_id_orders :selected").val()
                }).done(function(data) {
                    $("#kolicina_span").html('Во магацинот има ' + data.zaliha + ' на залиха');
                    if (document_type == 'izlez') {
                        var otvoreni_dokumenti = '';
                        $.each(data.otvoreni_produkti, function(index_iz, value_iz) {
                            otvoreni_dokumenti = otvoreni_dokumenti + '<p><a href="./' +
                                value_iz.document_id + '">Излез</a> од датум    ' +
                                value_iz.document_date + '     за  ' + value_iz.title +
                                '         количина ' + value_iz.quantity +
                                '          цена ' + value_iz.price + '</p>';
                        });
                        $("#zaliha_izlez").html(otvoreni_dokumenti);
                        if (data.zaliha != data.zaliha_so_otvoreni) {
                            otvoreni_dokumenti = $("#kolicina_span").html();
                            otvoreni_dokumenti = otvoreni_dokumenti +
                                '<span style="color:red"> (' + data.zaliha_so_otvoreni +
                                ')</span>'
                            $("#kolicina_span").html(otvoreni_dokumenti);
                        }
                    }
                });
            }
        });

        $('#show_cost').select2({
            placeholder: {
                id: '-1',
                text: 'Нов Корисник'
            },
            minimumInputLength: 3,
            ajax: {
                type: "GET",
                url: "{{ route('admin.customers.searchCustomers') }}",
                data: function(params){
                    return{
                        search: params.term
                    }
                },
                processResults: function (response) {
                    var defaultOption = {
                        id: -1,
                        text: 'Нов корисник'
                    };
                    var options = [];
                    options.push(defaultOption);
                    var flag = true;
                    @if(!auth()->user()->canDo('admin')){
                        flag = false;
                    }@endif
                    if(flag == false){
                        for (var i = 0; i < response.length; i++) {
                            if(response[i].created_by == {{auth()->user()->id}} || response[i].created_by == null){
                                var lineObj = {
                                id: response[i].id,
                                text: response[i].first_name + ' ' + response[i].last_name
                                }
                                options.push(lineObj);
                            }
                        }
                    }
                    else{
                        for (var i = 0; i < response.length; i++) {
                            var lineObj = {
                            id: response[i].id,
                            text: response[i].first_name + ' ' + response[i].last_name
                            }
                            options.push(lineObj);
                        }
                    }
                    
                    return {
                        results: options
                    };
                },
                cache: true
            }
        });
    });


    Articles.init();
    $(document).ready(function() {
        var documentStatusChangeIsClicked = false;

        $(".document_statuschange").on('click', function() {
            var confirm = window.confirm('Дали сте сигурни дека сакате да го промените статусот?');
            if (!confirm) {
                return false;
            } else {
                if (documentStatusChangeIsClicked) {
                    return false;
                }

                documentStatusChangeIsClicked = true;
                @if(in_array(config('app.client'), \EasyShop\Models\Settings::CLIENT_NATURATHERAPY_SHOPS))
                    @if($document_data->status == 'podgotovka')
                        if($("#type_of_order").val() != null && $("#type_of_order").val() != ''){
                            var value = $(this).attr('id');
                            value = value.split('_');
                            value = value[1];
                            var documentId = "{{ $document_id }}";
                            $.ajax({
                                method: "GET",
                                url: "{{ URL::to('admin/document/doc_type/changeDocumentStatus') }}",
                                data: {
                                    document_status: value,
                                    document_id: documentId,
                                    warehouse_id: $("#warehouse_id_orders :selected").val(),
                                    generiraj_ispratnica: $("#generiraj_ispratnica").val(),
                                    document_type: "{{ $document_type }}"
                                }
                            }).done(function(msg) {
                                location.reload();
                            });
                        }
                        else{
                            alert('Изберете тип на нарачка');
                            documentStatusChangeIsClicked = false;
                        }
                    @else
                        var value = $(this).attr('id');
                        value = value.split('_');
                        value = value[1];
                        var documentId = "{{ $document_id }}";
                        $.ajax({
                            method: "GET",
                            url: "{{ URL::to('admin/document/doc_type/changeDocumentStatus') }}",
                            data: {
                                document_status: value,
                                document_id: documentId,
                                warehouse_id: $("#warehouse_id_orders :selected").val(),
                                generiraj_ispratnica: $("#generiraj_ispratnica").val(),
                                document_type: "{{ $document_type }}"
                            }
                        }).done(function(msg) {
                            location.reload();
                        });
                    @endif
                @else
                    var value = $(this).attr('id');
                    value = value.split('_');
                    value = value[1];
                    var documentId = "{{ $document_id }}";
                    $.ajax({
                        method: "GET",
                        url: "{{ URL::to('admin/document/doc_type/changeDocumentStatus') }}",
                        data: {
                            document_status: value,
                            document_id: documentId,
                            warehouse_id: $("#warehouse_id_orders :selected").val(),
                            generiraj_ispratnica: $("#generiraj_ispratnica").val(),
                            document_type: "{{ $document_type }}"
                        }
                    }).done(function(msg) {
                        location.reload();
                    });
                @endif
            }
        });


        $(".document_paidstatuschange").on('click', function() {
            var confirm = window.confirm('Дали сте сигурни дека сакате да го промените статусот?');
            if (!confirm) {
                return false;
            } else {
                if (documentStatusChangeIsClicked) {
                    return false;
                }

                documentStatusChangeIsClicked = true;

                var value = $(this).attr('id');
                value = value.split('_');
                value = value[1];
                var documentId = ["{{ $document_id }}"];
                $.ajax({
                    method: "GET",
                    url: "{{ URL::to('admin/document/multiple/changeDocumentPayment') }}",
                    data: {
                        paid_status: value,
                        document_id: documentId,
                        paid_status_type: "ziro"
                    }
                }).done(function(msg) {
                    location.reload();
                });
            }
        });
        

        $("#note").on('change', function() {

            var documentId = "{{ $document_id }}";
            $.ajax({
                method: "GET",
                url: "{{ URL::to('admin/document/note/addNote') }}",
                data: {
                    note: $("#note").val(),
                    document_id: documentId
                }
            }).done(function(msg) {
                alert('Забелешката е успешно зачувана!');
            });

        });

        $("#show_cost").on('change', function() {
            var answ2 = confirm('Дали сте сигурни дека сакате да променете?');
            if (answ2) {
                var documentId2 = "{{ $document_id }}";
                if (this.value == -1) {
                    $('#client_information_form').find("input[type=text], input[type=email], textarea")
                        .val("");
                    $('.info_reset_inputs').find('.value').text('');

                } else {
                    $.ajax({
                        method: "GET",
                        url: "{{ URL::to('admin/document/doc_type/changeDocumentPartner') }}",
                        data: {
                            document_partner: $("#show_cost :selected").val(),
                            document_id: documentId2
                        }
                    }).done(function(msg) {
                        /* Select2 - save selected user value before reload */
                        sessionStorage.setItem('SelectedUserId', parseInt($("#show_cost :selected").val()));
                        sessionStorage.setItem('SelectedUserName', $("#show_cost :selected").text());
                        location.reload();
                    });
                }

            }
        });

        $("#doc_status_button").mouseover(function() {
            var temp_hover = $("#doc_status_button").attr('aria-expanded');
            if (temp_hover == 'false' || temp_hover == undefined)
                $("#doc_status_button").click();
        })

        $("#doc_paidstatus_button").mouseover(function() {
            var temp_hover = $("#doc_paidstatus_button").attr('aria-expanded');
            if (temp_hover == 'false' || temp_hover == undefined)
                $("#doc_paidstatus_button").click();
        })

        $("#city_id").on('change', function() {
            var selected_city = $("#city_id :selected").val();

            if (selected_city == '35') {
                $(".city_other").show();
                $(".postenski").show();
            } else {
                $(".city_other").hide();
                $(".postenski").hide();
            }
        });

        $("#city_id_shipping").on('change', function() {
            var selected_city = $("#city_id_shipping :selected").val();

            if (selected_city == '35') {
                $(".city_other_shipping").show();
                $(".postenski_shipping").show();
            } else {
                $(".city_other_shipping").hide();
                $(".postenski_shipping").hide();
            }
        });

        $("#country_id").on('change', function() {
            var selected_country = $("#country_id :selected").val();
            if (selected_country == '62') {
                $("#mkd_gradovi").hide();
                $(".country_other").show();
                $(".city_other").show();
                $(".postenski").show();
            } else if (selected_country == '1') {
                $("#mkd_gradovi").show();
                $(".country_other").hide();
                $(".city_other").hide();
                $(".postenski").hide();
            } else {
                $("#mkd_gradovi").hide();
                $(".country_other").hide();
                $(".city_other").show();
                $(".postenski").show();
            }
        });

        $("#country_id_shipping").on('change', function() {
            var selected_country = $("#country_id_shipping :selected").val();
            if (selected_country == '62') {
                $("#mkd_gradovi_shipping").hide();
                $(".country_other_shipping").show();
                $(".city_other_shipping").show();
                $(".postenski_shipping").show();
            } else if (selected_country == '1') {
                $("#mkd_gradovi_shipping").show();
                $(".country_other_shipping").hide();
                $(".city_other_shipping").hide();
                $(".postenski_shipping").hide();
            } else {
                $("#mkd_gradovi_shipping").hide();
                $(".country_other_shipping").hide();
                $(".city_other_shipping").show();
                $(".postenski_shipping").show();
            }
        });


    });

</script>

<script type="text/javascript">
    (function() {
            var DocumentsModule = {
                init: function() {
                    $(document).ready(this.handleDocumentReady.bind(this));
                }
            };
        })();

</script>

@stop
<style type="text/css">
    .dataTables_length {
        visibility: hidden;
    }

    .dataTables_filter {
        visibility: hidden;
    }
</style>
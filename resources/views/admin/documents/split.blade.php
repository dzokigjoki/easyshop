@extends('layouts.admin')
@section('content')
    <div class="page-container">
        <div class="portlet light portlet-fit row">
            @include('admin.documents.split_partials.edit_head')
            <div class="portlet-body">
                <div class="col-md-12">
                    {{-- DOC INFO --}}
                    @include('admin.documents.split_partials.edit_doc_info')
                    @include('admin.documents.split_partials.edit_articles_in')
                </div>
            </div>
        </div>
    </div>
@stop
@section('scripts')
<script type="text/javascript">
    $(document).ready(function(){
        
        function editProductNameInit(){

            $('.product_name').editable({
                url: '/post',
                type: 'text',
                pk: 1,
                name: 'product_name',
                title: 'Внесете име на продуктот'
            });
        }

        var variation_ajax = 0;
        var vat = 18;
        var document_type = '{{$document_type}}';
        $("#variation_id_div").hide();
        $('.selectpicker').selectpicker({
          style: 'btn-info',
          size: 4
        });

        $(".select2").select2();

        $("#promeni").on('click',function(){
            $("#new_display").show();
        });

        $("#vkupna_cena").on('change keyup', function() {
            var temp_cena_vat;
            switch(vat) {
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
            $("#cena").val(  ($("#vkupna_cena").val() / temp_cena_vat).toFixed(2) );
        });

        $("#cena").on('change keyup', function() {
            var temp_cena_vat;
            switch(vat) {
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
            $("#vkupna_cena").val( ( $("#cena").val() * temp_cena_vat).toFixed(2)  );
        });

        $("#add_product").on('click',function(){
            var product_id = $("#product_id :selected").val();
            var product_kolicina = $("#kol_hidden").val();

            if( $("#cena").val() > 0  &&  $("#vkupna_cena").val() > 0 && $("#kolicina").val() > 0 && product_id > 0 ){

                $.post('{{URL::to("admin/document/{$document_id}/products/add")}}', { product_id: $("#product_id").val(), quantity:$("#kolicina").val(), total_price:$("#vkupna_cena").val(),price: $("#cena").val(),variation_id:$("#variation_id :selected").val()})
                  .done(function( data ) {
                    $('[articles-table]').DataTable().ajax.reload(editProductNameInit);
                    $("#product_id").select2('val','');
                    $("#kolicina").val('');
                    $("#cena").val('');
                    $("#vkupna_cena").val('');
                    $("#kolicina_span").html('');
                    $("#popustcena_span").html('');
                });
            } 
        });
              
    });
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
                    "ordering":false,
                    "paginating":false,
                    "bInfo" : false,
                    "processing": true,
                    "serverSide": true,
                    "ajax": {
                        "url": '{{ URL::to("admin/document/$document_id_ajax/productsSplit") }}',
                        "type": "GET",                       
                    },
                    "bAutoWidth": false, // Disable the auto width calculation 
                    "aoColumns": [
                      { "sWidth": "1%" }, // 3rd column width and so on 
                      { "sWidth": "87%" }, // 1st column width 
                      { "sWidth": "2%" }, // 2nd column width 
                      { "sWidth": "2%" }, // 3rd column width and so on 
                      { "sWidth": "2%" }, // 1st column width                       
                      { "sWidth": "2%" }, // 3rd column width and so on 
                      { "sWidth": "2%" }, // 3rd column width and so on 
                      @if($document_data->status == 'podgotovka' && $document_type != 'vlez')
                            { "sWidth": "1%" }, // 3rd column width and so on 
                      @endif

                    ],
                    "language": {
                        url: EsConfig.routes.datatableLanguage
                    },
                    buttons: [],
                    lengthMenu:  [ 500 ],
                    "pageLength": 500 ,
                    "initComplete": function(settings, json) {
                       $('.product_name').editable({
                            url: "{{URL::to('admin/document/changeProductName')}}",
                            type: 'text',
                            validate: function(value) {
                                if ($.trim(value) == '') return 'This field is required';
                            },
                            name: 'product_name',
                            title: 'Enter product name'
                        });                       
                    },
                    "footerCallback": function ( row, data, start, end, display ) {
                        var total_noddv = 0;
                        var api = this.api(), data;  
                        // Remove the formatting to get integer data for summation
                        var intVal = function ( i ) {
                            return typeof i === 'string' ? i.replace(/[\$,]/g, '')*1 : typeof i === 'number' ?  i : 0;
                        };

                        total_ddv = api.column( 6, { page: 'current'} ).data().reduce( function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );
                        

                        var kol = api.column( 2, { page: 'current'} ).data();
                        var noddv = api.column( 3, { page: 'current'} ).data();

                        $.each( kol, function( key, value ) {                            
                            total_noddv =  total_noddv + (noddv[key] * $(value).children('option').length);
                        });
                        total_noddv  = parseFloat(total_noddv);
                        total_ddv    = parseFloat(total_ddv);
                        // Update footer
                        $("#no_ddv").html(total_noddv.toFixed(2));
                        $("#total_price").html(total_ddv.toFixed(2));
                        just_ddv = total_ddv - total_noddv;
                        $("#just_ddv").html(parseFloat(just_ddv.toFixed(2)));
                        $(".dataTables_length").parent().remove();
                        $(".dataTables_filter").parent().remove();

                    }
                });
            }
        };
        
        return Articles;
    })();

    Articles.init();
    $(document).ready(function(){
        $(".document_statuschange").on('click',function(){

            var value = $(this).attr('id');
            value = value.split('_');
            value = value[1];
            console.log('v',value);
            var documentId = "{{$document_id}}";
            $.ajax({
              method: "GET",
              url: "{{URL::to('admin/document/doc_type/changeDocumentStatus')}}",
              data: { document_status: value, document_id:documentId, warehouse_id:$("#warehouse_id_orders :selected").val()   }
            }).done(function( msg ) {
                location.reload();
            });
        });

        $("#note").on('change',function(){

                var documentId = "{{$document_id}}";
                $.ajax({
                  method: "GET",
                  url: "{{URL::to('admin/document/note/addNote')}}",
                  data: { note: $("#note").val(), document_id:documentId   }
                }).done(function( msg ) {
                   alert('Забелешката е успешно зачувана!');
                });
            
        });

        $("#show_cost").on('change',function(){
            var answ2 = confirm('Дали сте сигурни дека сакате да променете?');
            if(answ2){                
                var documentId2 = "{{$document_id}}";
                $.ajax({
                  method: "GET",
                  url: "{{URL::to('admin/document/doc_type/changeDocumentPartner')}}",
                  data: { document_partner: $("#show_cost :selected").val() , document_id:documentId2   }
                }).done(function( msg ) {
                    location.reload();
                });
            }
        });

        $("#doc_status_button").mouseover(function() {
                var temp_hover = $("#doc_status_button").attr('aria-expanded');
                if(temp_hover == 'false' || temp_hover == undefined)
                    $("#doc_status_button").click();
        })
        
        $("#city_id").on('change',function(){
            var selected_city = $("#city_id :selected").val();
            
            if(selected_city == '35')
            {
                $(".city_other").show();
                $(".postenski").show();
            }else{
                $(".city_other").hide();
                $(".postenski").hide();
            }
        });

        $("#city_id_shipping").on('change',function(){
            var selected_city = $("#city_id_shipping :selected").val();
            
            if(selected_city == '35')
            {
                $(".city_other_shipping").show();
                $(".postenski_shipping").show();
            }else{
                $(".city_other_shipping").hide();
                $(".postenski_shipping").hide();
            }
        });

        $("#country_id").on('change',function(){
            var selected_country = $("#country_id :selected").val();
            if(selected_country == '62')
            {   
                $("#mkd_gradovi").hide();
                $(".country_other").show();
                $(".city_other").show();
                $(".postenski").show();
            }else if(selected_country == '1'){
                $("#mkd_gradovi").show();
                $(".country_other").hide();
                $(".city_other").hide();
                $(".postenski").hide();
            }else{
                $("#mkd_gradovi").hide();
                $(".country_other").hide();
                $(".city_other").show();
                $(".postenski").show();
            }
        });

        $("#country_id_shipping").on('change',function(){
            var selected_country = $("#country_id_shipping :selected").val();
            if(selected_country == '62')
            {   
                $("#mkd_gradovi_shipping").hide();
                $(".country_other_shipping").show();
                $(".city_other_shipping").show();
                $(".postenski_shipping").show();
            }else if(selected_country == '1'){
                $("#mkd_gradovi_shipping").show();
                $(".country_other_shipping").hide();
                $(".city_other_shipping").hide();
                $(".postenski_shipping").hide();
            }else{
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
    .dataTables_length{
        visibility: hidden;
    }
    .dataTables_filter{
        visibility: hidden;
    }
</style>
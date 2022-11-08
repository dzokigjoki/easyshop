@extends('layouts.admin')
@section('content')
    <div class="page-content-inner">

        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN SAMPLE TABLE PORTLET-->
                <div class="portlet light ">
                    <div class="portlet-title">
                        <div class="caption">
                            <span class="caption-subject font-blue-soft bold uppercase"> Фискални Сметки</span>
                        </div>

                        <div class="actions">
                            
                        </div>
                    </div>
                    
                    <div class="portlet-body">
                        <div class="row" style="margin-bottom: 40px;padding-bottom: 20px;">
                            
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Датум</label>
                                    <div class="input-group input-medium date-picker input-daterange" data-date-format="dd.mm.yyyy" data-date-week-start = "1">
                                        <input type="text"
                                               class="form-control"
                                               id="from_date"
                                               name="from_date"
                                               value="{{date('d.m.Y')}}" style="text-align:left;">
                                        <span class="input-group-addon"> до </span>
                                        <input type="text"
                                               class="form-control"
                                               id="to_date"
                                               name="to_date"
                                               value="{{date('d.m.Y')}}" style="text-align:left;">
                                    </div>
                                </div>
                            </div>

                            {{--Fiskalni--}}
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Магацини</label>
                                    <div>
                                        <select id="warehouse_id" name="warehouse_id" class="select2" style="width:100%">
                                            @foreach($warehouses as $warehouse)
                                                <option value="{{$warehouse->id}}">{{$warehouse->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="portlet-title">
                        
                            <div  class="col-md-12" style="margin-top:10px;">
                                <button id="0_days" class="date_buttons btn btn-sm btn-info blue-soft">денес</button>
                                <button id="1_days" class="date_buttons btn btn-sm btn-info blue-soft">вчера</button>
                                <button id="3_days" class="date_buttons btn btn-sm btn-info blue-soft">3 дена</button>
                                <button id="7_days"  class="date_buttons btn btn-sm btn-info blue-soft">7 дена</button>
                            </div>
                        </div>
                        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN SAMPLE TABLE PORTLET-->
                <div class="portlet light ">
                    
                    <div class="portlet-body">
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 margin-bottom-10">
                                <div class="dashboard-stat blue">
                                    <div class="visual">
                                        <i class="fa fa-briefcase fa-icon-medium"></i>
                                    </div>
                                    <div class="details">                                        
                                        
                                        <div class="number" id="promet_div">  </div>
                                        <div class="desc" > Промет</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <div class="dashboard-stat red-haze">
                                    <div class="visual">
                                        <i class="fa fa-shopping-cart"></i>
                                    </div>
                                    <div class="details">
                                        <div class="number" id="fiskalni_div"> </div>
                                        <div class="desc"> Фискални сметки <br>                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <div class="dashboard-stat red">
                                    <div class="visual">
                                        <i class="fa fa-group"></i>
                                    </div>
                                    <div class="details">
                                        <div class="number" id="prodadeni_div"> </div>
                                        <div class="desc"> Продадени производи <br>                                           
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <div class="dashboard-stat green">
                                    <div class="visual">
                                        <i class="fa fa-briefcase"></i>
                                    </div>
                                    <div class="details">
                                        <div class="number" id="storno_div">  </div>
                                        <div class="desc"> Сторно <br>                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

                        <table kdfi-table="" class="table table-striped table-bordered table-hover order-column">
                            <thead>
                            <tr role="row" class="heading">
                                <th> Вработен </th>
                                <th> Датум </th>
                                <th> Каса ID </th>
                                <th> Број на сметка </th>
                                <th> Статус </th>
                                <th> Уплата </th>
                                <th> Кеш </th>
                                <th> Картичка </th>
                                <th> Тип </th>
                                <th> Рати </th>
                                <th> Банка </th>
                                <th> Артикли </th>
                                <th> Забелешка </th>
                                <th> Поврзани документи </th>
                                <th> Aкција </th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>

                    </div>
                    <div class="portlet-body">
                    <div class="page-content-inner">

        <style>
            .dashboard-stat .visual {
                height: auto !important;
            }
        </style>


    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
@section('scripts')
    <script type="text/javascript">
        

        var KdfiModule = (function(){
            var SELECTORS = {
                KDFI_TABLE: '[kdfi-table]',
                WAREHOUSE_ID: '#warehouse_id',
                FROM_DATE: '#from_date',
                TO_DATE: '#to_date',
                PRINT: '#print_kdfi'
            };
            var KdfiModule = {
                init: function() {
                    $(document).ready(this.handleDocumentReady.bind(this));
                },
                handleDocumentReady: function() {
                    this.initKdfiTable();

                    $(SELECTORS.WAREHOUSE_ID).select2({
                        placeholder: "Избери фискална"
                    });

                    $('#warehouse_id,#from_date,#to_date').on('change',function(){
                       
                        $(SELECTORS.KDFI_TABLE).DataTable().ajax.reload(); //Exact value, column, reg
                        
                        $.ajax({
                            method: "GET",
                            url: "../fiskalni/dnevenPromet",
                            data: { 
                                from_date:$("#from_date").val(),
                                to_date:$("#to_date").val(),
                                warehouse_id: $(SELECTORS.WAREHOUSE_ID).val(),
                                ajax:"true" 
                            }
                        }).done(function( data ) {
                            
                            $("#promet_div").html(data.iznos_count);
                            $("#fiskalni_div").html(data.br_smetki);
                            $("#prodadeni_div").html(data.br_items);
                            $("#storno_div").html(data.iznos_count_storno);

                        });

// 
                        
                    });

                    $(SELECTORS.PRINT).on('click', function(e) {
                        $(e).preventDefault();
                        window.open('')
                    })

                    
                },

                initKdfiTable: function() {
                    window.ddt = $(SELECTORS.KDFI_TABLE).dataTable({
                        "processing": true,
                        "serverSide": true,
                        "ajax": {
                            "url": '{{route('admin.fiskalni.all.datatable')}}',
                            "type": "GET",
                            "data": function ( d ) {
                                return $.extend( {}, d, {
                                    "warehouse_id": $(SELECTORS.WAREHOUSE_ID).val(),
                                    "from_date": $(SELECTORS.FROM_DATE).val(),
                                    "to_date" : $(SELECTORS.TO_DATE).val()
                                } );
                            }
                        },
                        
                        "columns": [
                            { "data": "first_name" },
                            { "data": "document_date",
                                "render": function ( data, type, row, meta ) {
                                    if(data)
                                        data = new Date(data.replace(/-/g, '/'));
                                    else
                                        data = new Date(data);
                                    
                                    var temp_year = data.getFullYear();
                                    var temp_month = data.getMonth() + 1;
                                    var temp_day = data.getDate();
                                    var temp_hour = data.getHours();
                                    var temp_minutes = data.getMinutes();
                                    
                                    if(temp_year == 1970)
                                        return '';

                                    if(temp_month < 10)
                                        temp_month = '0'+temp_month;
                                    if(temp_day < 10)
                                        temp_day = '0'+temp_day;
                                    if(temp_hour < 10)
                                        temp_hour = '0'+temp_hour;
                                    if(temp_minutes < 10)
                                        temp_minutes = '0'+temp_minutes;
                                    
                                    return '<span  data-pk="'+row['id']+'" class="xeditable document_date">'+temp_day+'.'+temp_month+'.'+temp_year+' '+temp_hour+':'+temp_minutes+'</span>';
                            } },
                            { "data": "fiskalna_id" },
                            { "data": "document_number",
                                "render": function ( data, type, row, meta ) {
                                    return '<span class="xeditable document_number" data-pk="'+row['id']+'">'+row['document_number']+'</span>';
                                }
                            },
                            { "data": "status",
                            "render": function ( data, type, row, meta ) {
                                
                                var statusLabel = '';
                                switch(row['status']) {
                                    case 'подготовка':
                                        statusLabel = 'bg-yellow-soft';
                                        break;
                                    case 'генерирана':
                                        statusLabel = 'bg-red-soft';
                                        break;
                                    case 'сторнирана':
                                        statusLabel = 'bg-default font-dark';
                                        break;
                                }

                                return '<span class="label label-sm label-success '+statusLabel+'">'+data+'</span>';

                            } },
                            { "data": "payment",
                            "render": function ( data, type, row, meta ) {
                                
                                var statusLabel = '';
                                switch(data) {
                                    case 'картичка':
                                        statusLabel = 'bg-blue-soft';
                                        break;                                    
                                    case 'готово':
                                        statusLabel = 'bg-yellow-soft font-dark';
                                        break;
                                }

                                return '<span class="label label-sm label-success '+statusLabel+'">'+data+'</span>';
                                
                            } },
                            { "data": "payment_cash",
                            "render": function ( data, type, row, meta ) {
                                return number_format_js(data,2,'.',',');
                            } },
                            { "data": "payment_card",
                            "render": function ( data, type, row, meta ) {
                                return number_format_js(data,2,'.',',');
                            } },
                            { "data": "payment_card_type" },
                            { "data": "payment_card_installment" },
                            { "data": "bank_name" },
                            { "data": "articles" },
                            { "data": "note",
                                "render": function ( data, type, row, meta ) {
                                    if(data){
                                        return '<span class="" title="'+data+'">'+data.substring(0, 25);+'</span>';
                                    }else{
                                        return '';
                                    }
                                } },
                            { "data": "related_documents" },
                            { "data": "action" },
                        ],
                        "initComplete": function(settings, json) {

                        },"fnRowCallback": function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                           

                            $(nRow).find('.document_number').editable({
                                url: "{{URL::to('admin/fiskalni/change_document_field')}}",
                                type: 'text',
                                validate: function(value) {
                                    if ($.trim(value) == '') return 'Полето е задолжително';
                                },
                                name: 'document_number',
                                title: 'Внесете број на сметка'
                            });

                            $(nRow).find('.document_date').editable({
                                url: "{{URL::to('admin/fiskalni/change_document_field')}}",
                                type: 'datetime',
                                format:"dd.mm.yyyy hh:ii",
                                validate: function(value) {
                                    if ($.trim(value) == '') return 'Полето е задолжително';
                                },
                                name: 'document_date',
                                title: 'Внесете датум на документ'
                            });
                           
                        },
                        "language": {
                            url: EsConfig.routes.datatableLanguage
                        },
                        //"order": [[ 1, "asc" ]],
                        buttons: [],
                        lengthMenu:  [ 10, 25, 50, 75, 100 ],
                        "pageLength": 50
                    });
                }
            };
            return KdfiModule;
        })();

        KdfiModule.init();

    $( document ).ready(function() {

        $(".date_buttons").on('click',function(){
            var id  =   $(this).attr('id').split('_');
            id      =   id[0];
            var dateFrom = moment().subtract(id,'d').format('DD.MM.YYYY');
            if(id > 1)
            {
                $("#from_date").val(dateFrom);
                $("#to_date").val(moment().format('DD.MM.YYYY'));
                $("#from_date").change();
            }  else {
                $("#from_date").val(dateFrom); 
                $("#to_date").val(dateFrom);                           
                $("#from_date").change();
            }
        });

    });

    function getFiskalniPromet()
    {
        $.ajax({
            method: "GET",
            url: "../dnevenPromet",
            data: { 
                when: 7,
                warehouse_id: $("#warehouse_id_promet :selected").val(),
                ajax:"true" 
            }
        }).done(function( msg ) {
            
        });
    }
    function YNconfirm(url) { 
                        if (window.confirm('Дали сте сигурни? Податоците ќе бидат трајно избришани без можност да се вратат назад'))
                        {
                            
                            $.ajax({
                            method: "GET",
                            url: url
                            }).done(function( data ) {
                                
                                $('[kdfi-table]').DataTable().ajax.reload(); 

                            });
                        }
                    }
    </script>
    <script src="/assets/admin/pages/scripts/ecommerce-products-edit.js" type="text/javascript"></script>@stop
<style type="text/css">
    /*td{*/
    /*text-align: right;*/
    /*}*/
</style>
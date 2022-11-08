@extends('layouts.admin')
@section('content')
<?php
$posti = config( 'clients.' . config( 'app.client') . '.posti');
$doc_columns = config( 'clients.' . config( 'app.client') . '.' . $document_type . '_columns');
if (!$doc_columns)
    $doc_columns = [];
?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.0/themes/smoothness/jquery-ui.css">
<div class="page-content-inner">

    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN SAMPLE TABLE PORTLET-->
            <div class="portlet light ">
                <div class="portlet-title">
                    <div class="caption">
                        <span class="caption-subject font-blue-soft bold uppercase">{{$document_type_show}}</span>
                    </div>
                    {{--JUST FOR ORDER--}}

                    @if ($document_type === \EasyShop\Models\Document::TYPE_NARACHKA)
                    <?php
                    $import_excel_columns = [];
                    $import_excel_config  = config( 'clients.' . config( 'app.client') . '.order.import_excel');
                    if ($import_excel_config)
                        $import_excel_columns = config( 'clients.' . config( 'app.client') . '.order.import_columns');
                    ?>
                    <div class="form-group pull-right" style="margin-top: 5px;">
                        @if($import_excel_config)
                        <button class="btn btn-sm btn-info blue-soft" id="import">
                            <i class="fa fa-upload" aria-hidden="true"></i>
                            Импорт</button>
                        @endif
                    </div>


                    @endif
                    {{--// JUST FOR ORDER--}}
                </div>
                <div class="portlet-body">
                    <div class="row" style="margin-bottom: 20px;padding-bottom: 10px;">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Датум</label>
                                <div class="input-group input-medium date-picker input-daterange" data-date="10.11.2012"
                                    data-date-format="dd.mm.yyyy" data-date-week-start="1">
                                    <input type="text" class="form-control" id="new_from" name="new_from"
                                        value="{{ date('d.m.Y',strtotime('-0day',time()))  }}" style="text-align:left;">
                                    <span class="input-group-addon"> до </span>
                                    <input type="text" class="form-control" id="new_to" name="new_to"
                                        value="{{date('d.m.Y')}}" style="text-align:left;">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-5">
                            <div class="form-group">
                                <label class="control-label">Артикли</label>
                                @if (count($documentProducts_select))
                                <div>
                                    <select id="documentProducts" multiple="" style="width: 100%;">
                                        @foreach($documentProducts_select as $ds)
                                        <option value="{{$ds->id}}">{{$ds->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @else
                                <div class="note note-info" style="padding: 7px;">Немате додадено артикли

                                    <a href="{{route('admin.article.new')}}" class="btn green-meadow" type="button"
                                        style="border-radius: 3px;
                                                border-radius: 3px;
                                                padding: 0px 5px;
                                                float: right;
                                           "> + </a>
                                </div>
                                @endif
                            </div>
                        </div>
                        {{--Warehouses--}}
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="control-label">Магацин</label>
                                <div>
                                    <select id="documentWarehouse" multiple="" style="width: 100%;">
                                        @foreach($documentWarehouse_select as $ds)
                                        <option @if($my_warehouse==$ds->id) selected @endif
                                            value="{{$ds->id}}">{{$ds->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        {{--Status--}}
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="control-label">Статус</label>
                                <div>
                                    <select id="documentStatus" multiple="" style="width: 100%;">
                                        @if ($document_type === \EasyShop\Models\Document::TYPE_NARACHKA)
                                        <?php $documentStatus_select = config( 'clients.' . config( 'app.client') . '.document_status.narachka'); ?>
                                        @foreach($documentStatus_select as $ks => $ds)
                                        <option value="{{$ks}}">{{$ds}}</option>
                                        @endforeach
                                        @else
                                        @foreach($documentStatus_select as $ks => $ds)
                                        <option value="{{$ks}}">{{$ds}}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>
                        @if(in_array(config('app.client'), \EasyShop\Models\Settings::CLIENT_NATURATHERAPY_SHOPS))
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="control-label">Тип на нарачка</label>
                                <div>
                                    <select class="notranslate" id="documentOrderType" multiple="" style="width: 100%;">
                                        @foreach($documentOrderType_select as $ks => $ds)
                                        <option class="notranslate" value="{{$ks}}">{{$ds}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        @endif
                        {{--Status--}}
                        @if ($document_type === \EasyShop\Models\Document::TYPE_NARACHKA)
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Пошта</label>
                                <div>
                                    <select id="documentPоsta" multiple="" style="width: 100%;">
                                        @foreach($posta_select as $ks => $ds)
                                        <option value="{{$ds}}">{{$ds}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="control-label">Плаќање</label>
                                <div>
                                    <select id="documentPaymentStatus" multiple="" style="width: 100%;">

                                        <option value="platena">Платена</option>
                                        <option value="delumno-platena">Делумно платена</option>
                                        <option value="neplatena">Неплатена</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Испратена на</label>
                                <div class="input-group date date-picker" data-date-format="dd.mm.yyyy"
                                    data-date-week-start="1">
                                    <input type="text" class="form-control" id="ispratena_na">
                                    <span class="input-group-btn">
                                        <button class="btn default" type="button">
                                            <i class="fa fa-calendar"></i>
                                        </button>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="control-label">Платена на</label>
                                <div class="input-group date date-picker" data-date-format="dd.mm.yyyy"
                                    data-date-week-start="1">
                                    <input type="text" class="form-control" id="platena_na">
                                    <span class="input-group-btn">
                                        <button class="btn default" type="button">
                                            <i class="fa fa-calendar"></i>
                                        </button>
                                    </span>
                                </div>
                            </div>
                        </div>
                        @endif
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="control-label">Клиент</label>
                                <div>
                                    <select id="client_select" class="select2" style="width: 100%;">
                                        <option value="">Сите</option>
                                        {{-- @foreach($documentClient_select as $ds)
                                        @if(in_array($document_type,['priemnica','povratnica_dobavuvac']))
                                        <option value="{{$ds->id}}">{{$ds->company_name}}</option>
                                        @else
                                        <option value="{{$ds->id}}">{{$ds->first_name}} {{$ds->last_name}}</option>
                                        @endif
                                        @endforeach --}}
                                    </select>
                                </div>
                            </div>
                        </div>
                        @if(auth()->user()->canDo('admin') && in_array(config('app.client'), \EasyShop\Models\Settings::CLIENT_NATURATHERAPY_SHOPS))
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Оператор</label>
                                <div>
                                    <select id="created_by_select" class="select2" style="width: 100%;">
                                        <option value="">Сите</option>
                                        @foreach($documentCreatedBy_select as $ds)
                                        @if(in_array($document_type,['priemnica','povratnica_dobavuvac']))
                                        <option value="{{$ds->id}}">{{$ds->company_name}}</option>
                                        @else
                                        <option value="{{$ds->id}}">{{$ds->first_name}} {{$ds->last_name}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        @endif
                        <div class="col-md-12">
                            <button id="0_days" class="date_buttons btn btn-sm btn-info blue-soft">денес</button>
                            <button id="1_days" class="date_buttons btn btn-sm btn-info blue-soft">вчера</button>
                            <button id="3_days" class="date_buttons btn btn-sm btn-info blue-soft">3 дена</button>
                            <button id="7_days" class="date_buttons btn btn-sm btn-info blue-soft">7 дена</button>

                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <button class="btn btn-sm btn-info blue-soft" id="clearTableState">
                                    <i class="fa fa-cogs" aria-hidden="true"></i>
                                    Избриши селектирани</button>
                            </div>
                        </div>
                    </div>


                    <table documents-table style="width: 100% !important; margin-right: 100%;" class="notranslate table table-striped table-bordered table-hover order-column">
                        <thead>
                            <tr role="row">
                                @if ($document_type === \EasyShop\Models\Document::TYPE_NARACHKA)
                                <th style="width: 20px;">
                                    <input type="checkbox" id="check_all" value="1">
                                </th>
                                @endif
                                <th style="width: 60px;"> Број</th>
                                @if(in_array(config('app.client'), \EasyShop\Models\Settings::CLIENT_NATURATHERAPY_SHOPS))
                                <th style="width: 150px;"> Оператор</th>@endif
                                @if (($document_type === \EasyShop\ Models\ Document::TYPE_NARACHKA) && in_array("note",
                                $doc_columns))

                                <th style="width: 100px;"> Коментар</th>
                                @endif

                                <th style="width: 100px;"> Датум</th>
                                @if ($document_type !== \EasyShop\Models\Document::TYPE_NARACHKA && $document_type !=
                                'izlez')
                                <th> Тип</th>
                                @endif
                                <th style="width: 60px;"> Статус</th>
                                @if($document_type == 'izlez')
                                <th style="width: 200px;"> Од </th>
                                @endif
                                @if($document_type == 'izlez')
                                <th style="width: 200px;"> До </th>
                                @endif
                                @if($document_type == 'priemnica')
                                <th> Добавувач </th>
                                @endif
                                @if($document_type != 'priemnica' && $document_type != 'izlez')
                                <th> Клиент</th>
                                @if($document_type == 'narachka' && in_array("phone",$doc_columns))
                                <th> Телефон</th>
                                @endif
                                @if($document_type == 'narachka' && in_array("phone2",$doc_columns))
                                <th> Телефон 2</th>
                                @endif
                                @if($document_type == 'narachka' && in_array("address",$doc_columns))
                                <th> Адреса </th>
                                @endif
                                @if($document_type == 'narachka' && in_array("city",$doc_columns))
                                <th> Град</th>
                                @endif
                                @if($document_type == 'narachka' && in_array("municipality",$doc_columns))
                                <th> Населба</th>
                                @endif
                                @endif
                                @if ($document_type === \EasyShop\Models\Document::TYPE_NARACHKA)
                                @if ( in_array("paid",$doc_columns) )
                                <th style="width: 60px;"> Плаќање </th>
                                @endif
                                @if ( in_array("nacin_na_plakanje",$doc_columns) )
                                <th style="width: 60px;"> Начин </th>
                                @endif
                                @if ( in_array("tracking_code",$doc_columns) )
                                <th style="width: 80px;"> Tracking </th>
                                @endif
                                <th style="width: 80px;"> Курир </th>
                                <th style="width: 80px;"> Курир Статус </th>
                                @if(in_array(config( 'app.client'),['tehnopolis','mojoutlet']))
                                <th style="width: 80px;"> Влезен документ </th>
                                @endif
                                @if(in_array("type_of_order", $doc_columns) && config( 'clients.' . config( 'app.client')
                                . '.type_of_order'.'.active'))
                                <th style="width: 120px;"> Тип на нарачка </th>
                                @endif
                                @endif
                                @if ($document_type === \EasyShop\Models\Document::TYPE_NARACHKA &&
                                in_array("doc_articles",$doc_columns))
                                <th style="width: 300px;"> Артикли </th>
                                @endif
                                @if ($document_type === \EasyShop\Models\Document::TYPE_NARACHKA &&
                                in_array("total",$doc_columns))
                                <th style="width: 100px;"> Износ </th>
                                @endif
                                @if ($document_type === \EasyShop\Models\Document::TYPE_NARACHKA &&
                                in_array("naracka_ispratena_na",$doc_columns))
                                <th style="width: 100px;"> Испратена на </th>
                                @endif
                                @if ($document_type === \EasyShop\Models\Document::TYPE_NARACHKA &&
                                in_array("naracka_platena_na",$doc_columns))
                                <th style="width: 100px;"> Платена на </th>
                                @endif
                                @if ($document_type === \EasyShop\Models\Document::TYPE_NARACHKA && !empty($posti) &&
                                in_array("posta",$doc_columns) )
                                <th style="width: 100px;"> Пoшта </th>
                                @endif
                                @if ($document_type === \EasyShop\Models\Document::TYPE_NARACHKA)
                                <th style="width: 100px;"> Купон </th>
                                @endif

                                <th style="width: 35px;" data-orderable="false"> Акции</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                    {{-- JUST FOR ORDER --}}
                    @if ($document_type === \EasyShop\Models\Document::TYPE_NARACHKA)
                    <div class="row">
                        <div style="display: flex;" class="col-md-12">
                            <div style="padding-right: 20px;" class="form-group">
                                <button class="btn btn-sm btn-info blue-soft" id="action">
                                    <i class="fa fa-cogs" aria-hidden="true"></i>
                                    Акции со нарачки</button>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-sm btn-info blue-soft" id="generate_excel_documents">
                                    <i class="fa fa-book" aria-hidden="true"></i>
                                    Генерирај ексел</button>
                            </div>
                        </div>
                        
                    </div>
                    @endif
                    {{-- // JUST FOR ORDER --}}

                </div>
            </div>
        </div>
    </div>
</div>
<input type="hidden" class="documentIds" id="documentIds" name="documentIds[]" value="">
<div class="modal fade" id="document_actions" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title bold">Акции со нарачки</h4>
            </div>
            <div class="modal-body col-md-12">

                <div class="row form-group">
                    <label class="col-md-4 control-label">Статус</label>
                    <div class="col-md-8">
                        <?php
                        $options_for_select = config( 'clients.' . config( 'app.client') . '.document_status');
                        $options_for_select = $options_for_select[$document_type];
                        ?>
                        <select class="table-group-action-input form-control input-medium" name="type" id="status_tip">
                            <option value=""></option>
                            @foreach($options_for_select as $key => $os)
                            <option value="{{$key}}">{{$os}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-4 control-label">Плаќање Статус</label>
                    <div class="col-md-8">
                        <select class="table-group-action-input form-control input-medium" name="type" id="paid_status">
                            <option value=""></option>
                            <option value="neplatena">Неплатена</option>
                            <option value="platena">Платена</option>
                        </select>

                    </div>
                </div>
                <div class="form-group row" id="paid_status_type_div" style="display: none;">
                    <label class="col-md-4 control-label">Тип плаќање</label>
                    <div class="col-md-8">
                        <select class="table-group-action-input form-control input-medium" name="type"
                            id="paid_status_type">
                            <option value="ziro">Жиро</option>
                            <option value="karticka">Картичка</option>
                            <option value="gotovo">Готово</option>
                            <option value="rati">Рати</option>
                        </select>
                    </div>
                </div>

                @if(!empty($posti))
                <div class="form-group row" id="posta_div" style="">
                    <label class="col-md-4 control-label">Пошта</label>
                    <div class="col-md-8">
                        <select class="table-group-action-input form-control input-medium" name="posta" id="posta">
                            <option value=""></option>
                            @foreach($posti as $posta)
                            <option value="{{$posta}}">{{$posta}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                @endif
                <div class="form-group row margin-top-20" style="border-top: 1px solid #EFEFEF;padding-top: 20px;">
                    <div class="checkbox-list col-md-7">
                        <label class="margin-bottom-10">
                            Генерирај дополнителни документи
                        </label>
                        <label>
                            <input id='profaktura' class="dc" type="checkbox" value="profaktura">Профактура
                        </label>
                        <label>
                            <input id='faktura' class="dc" type="checkbox" value="faktura">Фактура
                        </label>
                        {{--<label>--}}
                        {{--<input id='fiskalna' class="dc" type="checkbox" value="fiskalna">Фискална--}}
                        {{--</label>--}}
                        <label>
                            <input id='ostanato' class="dc" type="checkbox" value="ostanato">Останато
                        </label>
                        <label>
                            <input id='ispratnica' class="dc" type="checkbox" value="ispratnica">Испратница
                        </label>
                        <label>
                            <input id='povratnica' class="dc" type="checkbox" value="povratnica">Повратница
                        </label>
                        @if (config( 'app.client') === 'tehnopolis')
                        <label>
                            <input id='faktura_online' class="dc" type="checkbox" value="faktura_online"> Фактура Online
                        </label>
                        @endif
                        <label>
                            <select id="fakturaOnline_warehouse" style="display:none"
                                class="table-group-action-input form-control input-medium">
                                @foreach($documentWarehouse_select as $ds)
                                <option value="{{$ds->id}}">{{$ds->title}}</option>
                                @endforeach
                            </select>
                        </label>
                    </div>

                    <div class="checkbox-list col-md-5">
                        <label class="margin-bottom-10">
                            Превземи
                        </label>
                        <label>
                            <input id='excel_checkbox' class="dc" type="checkbox" value="excel">Ексел документ
                        </label>
                        @if(in_array(config( 'app.client'),['tehnopolis','mojoutlet']))
                        <label>
                            <input id='excel2_checkbox' class="dc" type="checkbox" value="excel_knigovodstvo">Ексел за
                            книговодство
                        </label>
                        @endif
                    </div>
                </div>

                {{--<div class="form-group row">--}}
                {{----}}
                {{--</div>--}}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Откажи</button>
                <button id="zacuvaj" type="button" class="btn blue-soft">Зачувај</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


@if ($document_type === \EasyShop\Models\Document::TYPE_NARACHKA)
<div class="modal fade" id="import_modal" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog">
        {!! Form::open(array('url'=>'admin/document/import/excel','method'=>'POST', 'files'=>true)) !!}
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Импорт</h4>
            </div>
            <div class="modal-body col-md-12">

                <div class="row form-group">
                    <label class="col-md-4 control-label">Магацин</label>
                    <div class="col-md-8">
                        <select class="table-group-action-input form-control input-medium" name="import_name">
                            <option value=""></option>
                            @foreach($import_excel_columns as $key => $os)
                            <option value="{{$key}}">{{$key}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-4 control-label">Документ</label>
                    <div class="col-md-8">
                        {!! Form::file('excel_file') !!}
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Откажи</button>
                {!! Form::submit('Импортирај', array('class'=>'btn green')) !!}
            </div>
        </div>
        <!-- /.modal-content -->
        {!! Form::close() !!}
    </div>
    <!-- /.modal-dialog -->
</div>
@endif
<style type="text/css">
    .editable {
        cursor: default;
    }
</style>
@stop
@section('scripts')
<script type="text/javascript">
    $(document).ready(function() {
        if (sessionStorage.getItem("document_statuses") != null) {
            var statuses = sessionStorage.getItem("document_statuses").split(',');
            $("#documentStatus").val(statuses);
        }
        if (sessionStorage.getItem("document_order_tip") != null) {
                var statuses = sessionStorage.getItem("document_order_tip").split(',');
                $("#documentOrderType").val(statuses);
        }
        if (sessionStorage.getItem("document_posti") != null) {
                var statuses = sessionStorage.getItem("document_posti").split(',');
                $("#documentPоsta").val(statuses);
        }
        if (sessionStorage.getItem("document_products") != null) {
                var statuses = sessionStorage.getItem("document_products").split(',');
                $("#documentProducts").val(statuses);
        }
        if (sessionStorage.getItem("document_plakanje") != null) {
                var statuses = sessionStorage.getItem("document_plakanje").split(',');
                $("#documentPaymentStatus").val(statuses);
        }
        if (sessionStorage.getItem("document_ispratena_na") != null) {
                $("#ispratena_na").val(sessionStorage.getItem("document_ispratena_na"));
        }
        if (sessionStorage.getItem("document_client_select") != null) {
            $("#client_select").val(sessionStorage.getItem("document_client_select")).trigger("change")
        }
        if (sessionStorage.getItem("document_new_from") != null) {
            $("#new_from").val(sessionStorage.getItem("document_new_from")).trigger("change")
        }
        if (sessionStorage.getItem("document_new_to") != null) {
            $("#new_to").val(sessionStorage.getItem("document_new_to")).trigger("change")
        }
        $('#client_select').select2({
            placeholder: {
                id: '0',
                text: 'Сите'
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
                        id: 0,
                        text: 'Сите'
                    };
                    var options = [];
                    options.push(defaultOption);
                    for (var i = 0; i < response.length; i++) {
                        var lineObj = {
                        id: response[i].id,
                        text: response[i].first_name + ' ' + response[i].last_name
                        }
                        options.push(lineObj);
                    }
                    return {
                        results: options
                    };
                },
                cache: true
            }
        });
    });
    var DocumentsModule = (function() {
        var SELECTORS = {
            ARTICLES_TABLE: '[documents-table]',
            WAREHOUSE_SELECTOR: '#documentWarehouse',
            STATUS_SELECTOR: '#documentStatus',
            ORDER_TYPE_SELECTOR: '#documentOrderType',
            ARTICLE_SELECTOR: '#documentProducts',
            PAIDSTATUS_SELECTOR: '#documentPaymentStatus',
            POSTA_SELECTOR: "#documentPоsta",
        };
        var DocumentsModule = {
            init: function() {
                $(document).ready(this.handleDocumentReady.bind(this));
                $(document).ready($(".select2").select2());

            },
            handleDocumentReady: function() {
                this.initArticlesTable();

                $("#faktura_online").on('click', function() {
                    if ($("#faktura_online").prop('checked')) {
                        if ($("#faktura").prop('checked')) {
                            $("#faktura").click();
                        }
                        $("#faktura").attr("disabled", true);
                        $("#fakturaOnline_warehouse").show();
                    } else {
                        $("#faktura").removeAttr("disabled");
                        $("#fakturaOnline_warehouse").hide();
                    }
                });


                $(".date_buttons").on('click', function() {
                    var id = $(this).attr('id').split('_');
                    id = id[0];
                    var dateFrom = moment().subtract(id, 'd').format('DD.MM.YYYY');
                    if (id > 1) {
                        $("#new_from").val(dateFrom);
                        $("#new_to").val(moment().format('DD.MM.YYYY'));
                        $("#new_from").change();
                    } else {
                        $("#new_from").val(dateFrom);
                        $("#new_to").val(dateFrom);
                        $("#new_from").change();
                    }
                });

                $(SELECTORS.WAREHOUSE_SELECTOR).select2({
                    placeholder: "Избери магацин"
                });
                $(SELECTORS.STATUS_SELECTOR).select2({
                    placeholder: "Избери статус"
                });
                $(SELECTORS.ORDER_TYPE_SELECTOR).select2({
                    placeholder: "Избери статус"
                });
                $(SELECTORS.ARTICLE_SELECTOR).select2({
                    placeholder: "Избери артикл"
                });
                $(SELECTORS.PAIDSTATUS_SELECTOR).select2({
                    placeholder: "Избери плаќање"
                });
                $(SELECTORS.POSTA_SELECTOR).select2({
                    placeholder: "Избери пошта"
                });

                var ids = [];
                $('#documentStatus,#documentOrderType,#documentWarehouse,#documentProducts,#new_from,#new_to,#documentPaymentStatus,#ispratena_na,#platena_na,#documentPоsta,#created_by_select,#client_select').on('change', function() {
                    $(SELECTORS.ARTICLES_TABLE).DataTable().ajax.reload(); //Exact value, column, reg
                    $("#documentIds").val('');
                });



                @if($document_type === \EasyShop\ Models\ Document::TYPE_NARACHKA)
                $("#clearTableState").on('click', function () {
                    $("#documentIds").val('');
                    $(SELECTORS.ARTICLES_TABLE).DataTable().clear();
                    window.location.reload();
                    localStorage.removeItem('DataTables_DataTables_Table_0_'+window.location.pathname);
                })
                
                $("#zacuvaj").on("click", function() {


                    var document_types = [];
                    var excel_clicekd = 0;
                    var excel2_clicked = 0;

                    $.each($(".dc:checked"), function(index, value) {
                        if ($(value).attr('id') != 'excel_checkbox' && $(value).attr('id') != 'excel2_checkbox') {
                            document_types.push($(value).attr('id'));
                        } else {
                            if ($(value).attr('id') == 'excel_checkbox')
                                excel_clicekd = 1;
                            else
                                excel2_clicked = 1;
                        }
                    });
                    if (document_types.length > 0) {
                        $.post("{{ route('admin.generate.fromExistingDocs') }}", {
                            'document_ids': ids,
                            'document_types': document_types,
                            'warehouse': $("#fakturaOnline_warehouse :selected").val()
                        }, function(data) {
                            $(".dc:checked").click();
                            $("#status_tip").val('');
                        });
                    }

                    if ($("#status_tip :selected").val() != '') {
                        $.get("{{ URL::to('admin/document/doc_type/changeDocumentStatus') }}", {
                            'document_id': ids,
                            'document_status': $("#status_tip :selected").val()
                        }, function(data) {
                            $("#status_tip").val('');
                            $("#documentIds").val('');
                            $(SELECTORS.ARTICLES_TABLE).DataTable().clear();
                            // $(SELECTORS.ARTICLES_TABLE).DataTable().ajax.reload();
                            window.location.reload();
                            localStorage.removeItem('DataTables_DataTables_Table_0_'+window.location.pathname);
                        });
                    }
                    if ($("#paid_status :selected").val() != '') {
                        $.get("{{ route('admin.document.changeDocumentsPayment') }}", {
                            'document_id': ids,
                            'paid_status': $("#paid_status :selected").val(),
                            'paid_status_type': $("#paid_status_type :selected").val()
                        }, function(data) {
                            $("#paid_status").val('');
                            $("#paid_status_type").val('');
                            $("#documentIds").val('');
                            $(SELECTORS.ARTICLES_TABLE).DataTable().ajax.reload();
                        });
                    }

                    if ($("#posta :selected").val() != '') {
                        $.post("{{ route('admin.document.changePostaOnDocuments') }}", {
                            'document_ids': ids,
                            'posta': $("#posta").val()
                        }, function(data) {
                            $(".dc:checked").click();
                            $("#posta").val('');
                        });
                    }

                    if (excel_clicekd == 1) {
                        var ex_ids = [];
                        var checked = $('#documentIds').val().split(',');

                        var warehouses = $('#documentWarehouse').val();

                        if (Array.isArray(warehouses)) {
                            warehouses = warehouses.map(function(wId) {
                                return wId;
                            }).join('&');
                        } else {
                            warehouses = null;
                        }

                        $.each(checked, function(index, value) {
                            pomosen_status = value.split('_');
                            ex_ids.push(pomosen_status[1]);
                        });
                        var url = "{{URL::to('admin/document/generate/excel')}}";

                        $.post(url, {
                            'excel_ids': ex_ids,
                            'warehouses': warehouses
                        }, function(data) {
                            window.location.href = data;
                        });
                    }

                    if (excel2_clicked == 1) {
                        var ex_ids = [];
                        var checked = $('#documentIds').val().split(',');
                        $.each(checked, function(index, value) {
                            pomosen_status = value.split('_');
                            ex_ids.push(pomosen_status[1]);
                        });
                        var url = "{{URL::to('admin/document/generate/excelKnigovodstvo')}}";
                        var win = window.open(url + '?document_ids=' + ex_ids, '_blank');
                    }
                    $("#document_actions").modal('toggle');
                });


                $("#generate_excel_documents").on("click", function() {



                    var ex_ids = [];
                        var checked = $('#documentIds').val().split(',');

                        var warehouses = $('#documentWarehouse').val();

                        if (Array.isArray(warehouses)) {
                            warehouses = warehouses.map(function(wId) {
                                return wId;
                            }).join('&');
                        } else {
                            warehouses = null;
                        }

                        $.each(checked, function(index, value) {
                            pomosen_status = value.split('_');
                            ex_ids.push(pomosen_status[1]);
                        });
                        var url = "{{URL::to('admin/document/generate/excel')}}";

                        $.post(url, {
                            'excel_ids': ex_ids,
                            'warehouses': warehouses
                        }, function(data) {
                            window.location.href = data;
                        });
                        
                    
                });

                $("#paid_status").on('change', function() {
                    if ($("#paid_status :selected").val() == 'platena') {
                        $("#paid_status_type_div").show();
                    } else {
                        $("#paid_status_type_div").hide();
                    }
                });

                $("#documentStatus").on('change', function() {
                    sessionStorage.setItem('document_statuses', $("#documentStatus").val());
                });

                $("#documentProducts").on('change', function() {
                    sessionStorage.setItem('document_products', $("#documentProducts").val());
                });
                
                $("#documentOrderType").on('change', function() {
                    sessionStorage.setItem('document_order_tip', $("#documentOrderType").val());
                });
                $("#documentPоsta").on('change', function() {
                    sessionStorage.setItem('document_posti', $("#documentPоsta").val());
                });
                $("#documentPaymentStatus").on('change', function() {
                    sessionStorage.setItem('document_plakanje', $("#documentPaymentStatus").val());
                });
                $("#ispratena_na").on('change', function() {
                    sessionStorage.setItem('document_ispratena_na', $("#ispratena_na").val());
                });
                $("#client_select").on('change', function() {
                    sessionStorage.setItem('document_client_select', $("#client_select").val());
                });
                $("#new_from").on('change', function() {
                    sessionStorage.setItem('document_new_from', $("#new_from").val());
                });
                $("#new_to").on('change', function() {
                    sessionStorage.setItem('document_new_to', $("#new_to").val());
                });
                
                
                

                

                $("#import").on("click", function() {
                    $("#import_modal").modal('toggle');
                });

                $("#action").on("click", function() {
                    ids = [];
                    var checked = $('#documentIds').val().split(',');
                    var status = '';
                    var flag = 0;
                    var pomosen_status = '';

                    if (checked.length == 0) {
                        sweetAlert("", "Немате избрано нарачки од табелата!", "warning");
                        return false;
                    }

                    $.each(checked, function(index, value) {
                        pomosen_status = value.split('_');
                        if (status == '') {
                            status = pomosen_status[0];
                            ids.push(pomosen_status[1]);
                        } else {
                            if (status != pomosen_status[0]) {
                                flag = 1;
                            } else {
                                ids.push(pomosen_status[1]);
                            }
                        }
                    });
                    
                    if (flag != 1) {
                        $("#document_actions").modal('toggle');
                    } else
                        alert('Селектираните документи треба да се со исти статус!');
                });

                $("#check_all").on('click', function() {
                    if ($("#check_all").is(":checked")) {
                        $(".select_doc_checkbox").prop('checked', true);
                    } else {
                        $(".select_doc_checkbox").prop('checked', false);
                    }
                });

                @endif

            },

            initArticlesTable: function() {
                //                $.fn.editable.defaults.mode = 'inline';
                window.ddt = $(SELECTORS.ARTICLES_TABLE).dataTable({
                    "processing": true,
                    "serverSide": true,
                    "deferLoading": 10,
                    scrollY: 1000,
                    scrollX: true,
			        deferRender: true,
			        // scroller: true,
                    "ajax": {
                        "url": '{{$document_type}}' + '/datatable',
                        "type": "GET",
                        "data": function(d) {
                            return $.extend({}, d, {
                                "products": $("#documentProducts").val(),
                                "status": $("#documentStatus").val(),
                                "orderType": $("#documentOrderType").val(),
                                "warehouse": $("#documentWarehouse").val(),
                                "new_from": $("#new_from").val(),
                                "new_to": $("#new_to").val(),
                                "paid": $("#documentPaymentStatus").val(),
                                'platena_na': $("#platena_na").val(),
                                'ispratena_na': $("#ispratena_na").val(),
                                'posta': $("#documentPоsta").val(),
                                'created_by_select': $("#created_by_select").val(),
                                'client_id': $("#client_select").val(),
                            });
                        }
                    },
                    "fnRowCallback": function(nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                        $(nRow).find('.tracking_class').editable({
                            url: "{{URL::to('admin/document/change_document_field')}}",
                            type: 'text',
                            validate: function(value) {
                                if ($.trim(value) == '') return 'Полето е задолжително';
                            },
                            name: 'tracking_code',
                            title: 'Внесете tracking code'
                        });

                        $(nRow).find('.vlezen_doc_class').editable({
                            url: "{{URL::to('admin/document/change_document_field')}}",
                            type: 'text',
                            validate: function(value) {
                                if ($.trim(value) == '') return 'Полето е задолжително';
                            },
                            name: 'vlezen_document',
                            title: 'Внесете влезен документ'
                        });

                        $(nRow).find('.docdate_class').editable({
                            url: "{{URL::to('admin/document/change_document_field')}}",
                            type: 'datetime',
                            format: "dd.mm.yyyy hh:ii",
                            validate: function(value) {
                                if ($.trim(value) == '') return 'Полето е задолжително';
                            },
                            name: 'document_date',
                            title: 'Внесете датум на документ'
                        });
                    },
                    "initComplete": function(settings, json) {
                        $(".dataTables_filter input")
                            .unbind()
                            .bind("keypress", function(e) {
                                if (e.keyCode == "13") {
                                    window.ddt.fnFilter(this.value.trim());
                                    window.ddt.fnDraw();
                                }
                            });
                    },
                    "language": {
                        url: EsConfig.routes.datatableLanguage
                    },
                    buttons: [],
                    lengthMenu: [10, 25, 50, 75, 100, 1000],
                    "pageLength": 25,
                    "order": [
                        [0, "desc"]
                    ],
                    "columnDefs": [{
                        "orderable": false,
                        "targets": 0,
                        'checkboxes': {
                            'selectRow': true,
                            'stateSave': true,
                        },
                    }],
                    "stateSave": true,
                    "stateSaveParams": function (settings, data) {
                        if (!!settings.checkboxes && !!settings.checkboxes.s.data) {
                            var documentIds = settings.checkboxes.s.data.map(function(checkbox) {
                                return Object.keys(checkbox);
                            });
                            $('#documentIds').val(documentIds);
                        }
                    },
                    "stateLoadParams": function (settings, data) {
                        if(!!data.checkboxes) {
                            var documentIds = data.checkboxes.map(function(checkbox) {
                                return Object.keys(checkbox);
                            });
                            $('#documentIds').val(documentIds);
                        }
                    },
                    "columns": [
                        @if($document_type === \EasyShop\ Models\ Document::TYPE_NARACHKA) {
                            "data": "checkbox"
                        },
                        @endif {
                            "data": "document_number",
                            searchable: true
                        },
                        @if(in_array(config('app.client'), \EasyShop\Models\Settings::CLIENT_NATURATHERAPY_SHOPS)){
                            "data": "created_by"
                        },
                        @endif
                        @if(($document_type === \EasyShop\ Models\ Document::TYPE_NARACHKA) && in_array("note", $doc_columns)) {
                            "data": "note",
                            "defaultContent": ""
                        },
                        @endif {
                            "data": "document_date",
                            "render": function(data, type, row, meta) {
                                if (data)
                                    data = new Date(data.replace(/-/g, '/'));
                                else
                                    data = new Date(data);

                                var temp_year = data.getFullYear();
                                var temp_month = data.getMonth() + 1;
                                var temp_day = data.getDate();
                                var temp_hour = data.getHours();
                                var temp_minutes = data.getMinutes();

                                if (temp_year == 1970)
                                    return '';

                                if (temp_month < 10)
                                    temp_month = '0' + temp_month;
                                if (temp_day < 10)
                                    temp_day = '0' + temp_day;
                                if (temp_hour < 10)
                                    temp_hour = '0' + temp_hour;
                                if (temp_minutes < 10)
                                    temp_minutes = '0' + temp_minutes;

                                return '<span  data-pk="' + row['id'] + '" class="docdate_class" style="word-break: keep-all; font-size: 12px; text-align:center;">' + temp_day + '.' + temp_month + '.' + temp_year + ' ' + temp_hour + ':' + temp_minutes + '</span>';
                            }

                        },
                        @if($document_type !== \EasyShop\ Models\ Document::TYPE_NARACHKA && $document_type != 'izlez') {
                            "data": "type",
                            searchable: true
                        },
                        @endif {
                            "data": "status",
                            searchable: true
                        },
                        @if($document_type == 'izlez') {
                            "data": "od_magacin"
                        },
                        @endif
                        @if($document_type == 'izlez') {
                            "data": "warehouse_to_id"
                        },
                        @endif
                        @if($document_type == 'priemnica') {
                            "data": "company_name"
                        },
                        @endif
                        @if($document_type != 'priemnica' && $document_type != 'izlez') {
                            "data": "client",
                            searchable: true
                        },
                        @endif
                        @if($document_type === \EasyShop\ Models\ Document::TYPE_NARACHKA)
                        @if(in_array("phone", $doc_columns)) {
                            "data": "phone",
                            searchable: true
                        },
                        @endif
                        @if(in_array("phone2", $doc_columns)) {
                            "data": "phone2",
                            searchable: true
                        },
                        @endif
                        @if(in_array("address", $doc_columns)) {
                            "data": "address",
                            searchable: true
                        },
                        @endif
                        @if(in_array("city", $doc_columns)) {
                            "data": "city",
                            searchable: true
                        },
                        @endif
                        @if(in_array("municipality", $doc_columns)) {
                            "data": "municipality",
                            searchable: true
                        },
                        @endif
                        @if(in_array("paid", $doc_columns)) {
                            "data": "paid",
                            searchable: true
                        },
                        @endif
                        @if(in_array("nacin_na_plakanje", $doc_columns)) {
                            "data": "nacin_na_plakanje",
                            searchable: true
                        },
                        @endif
                        @if(in_array("tracking_code", $doc_columns)) {
                            "data": "tracking_code"
                        },
                        @endif
                        {
                            "data": "courier_id"
                        },
                        {
                            "data": "courier_status"
                        },
                        @if(in_array("type_of_order", $doc_columns)) {
                            "data": "type_of_order"
                        },
                        @endif
                        @if(in_array(config( 'app.client'), ['tehnopolis', 'mojoutlet'])) {
                            "data": "vlezen_document"
                        },
                        @endif
                        @if(in_array("doc_articles", $doc_columns)) {
                            "data": "doc_articles"
                        },
                        @endif
                        @if(in_array("total", $doc_columns)) {
                            "data": "total",
                            "render": function(data, type, row, meta) {
                                return '<div class="colspan-md-12" style="text-align:right;">' + number_format_js(data, 0, '.', ',') + ' ' + row['currency'] + '</div>';
                            }
                        },
                        @endif
                        @if(in_array("naracka_ispratena_na", $doc_columns)) {
                            "data": "naracka_ispratena_na",
                            "render": function(data, type, row, meta) {
                                if (data)
                                    data = new Date(data.replace(/-/g, '/'));
                                else
                                    data = new Date(data);

                                var temp_year = data.getFullYear();
                                var temp_month = data.getMonth() + 1;
                                var temp_day = data.getDate();
                                var temp_hour = data.getHours();
                                var temp_minutes = data.getMinutes();

                                if (temp_year == 1970)
                                    return '';

                                if (temp_month < 10)
                                    temp_month = '0' + temp_month;
                                if (temp_day < 10)
                                    temp_day = '0' + temp_day;
                                if (temp_hour < 10)
                                    temp_hour = '0' + temp_hour;
                                if (temp_minutes < 10)
                                    temp_minutes = '0' + temp_minutes;

                                return '<div class="colspan-md-12" style="text-align:right;">' + temp_day + '.' + temp_month + '.' + temp_year + '</div>';
                            }
                        },
                        @endif
                        @if(in_array("naracka_platena_na", $doc_columns)) {
                            "data": "naracka_platena_na",
                            "render": function(data, type, row, meta) {
                                if (data)
                                    data = new Date(data.replace(/-/g, '/'));
                                else
                                    data = new Date(data);

                                var temp_year = data.getFullYear();
                                var temp_month = data.getMonth() + 1;
                                var temp_day = data.getDate();
                                var temp_hour = data.getHours();
                                var temp_minutes = data.getMinutes();

                                if (temp_year == 1970)
                                    return '';

                                if (temp_month < 10)
                                    temp_month = '0' + temp_month;
                                if (temp_day < 10)
                                    temp_day = '0' + temp_day;
                                if (temp_hour < 10)
                                    temp_hour = '0' + temp_hour;
                                if (temp_minutes < 10)
                                    temp_minutes = '0' + temp_minutes;

                                return '<div class="colspan-md-12" style="text-align:right;">' + temp_day + '.' + temp_month + '.' + temp_year + '</div>';
                            }
                        },
                        @endif
                        @endif
                        @if($document_type === \EasyShop\ Models\ Document::TYPE_NARACHKA && !empty($posti))
                        @if(in_array("posta", $doc_columns)) {
                            "data": "posta"
                        },
                        @endif


                        @endif
                        @if($document_type === \EasyShop\ Models\ Document::TYPE_NARACHKA) {
                            "data": "promo_code_id"
                        },
                        @endif {
                            "data": "action"
                        },
                    ]
                });
            }
        };
        return DocumentsModule;
    })();



                    
    DocumentsModule.init();
</script>
<script src="/assets/admin/pages/scripts/ecommerce-products-edit.js" type="text/javascript"></script>@stop
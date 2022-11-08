@extends('layouts.admin')
@section('content')
<?php $servis_statusi = config( 'clients.' . config( 'app.client') .'.service_status');  //dd($servis_statusi); ?>

    <div class="page-content-inner">

        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN SAMPLE TABLE PORTLET-->
                <div class="portlet light ">
                    <div class="portlet-title">
                        <div class="caption">
                            <span class="caption-subject font-blue-soft bold uppercase">Листа на сервиси</span>
                        </div>
                        <div class="actions">
                            <a class="btn btn-info blue-soft" href="{{ route('admin.services.new') }}"><i class="fa fa-plus"></i>Нов Сервис</a>
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
                    <table>
                    </table>
                    <div class="col-md-3">
                        <div class="form-group">
                                <label for="">Сервисер</label>
                                <select id="servicer_select" class="form-control">
                                <option value="0">Сите</option>
                                @foreach($servicers as $servicer)
                                    <option value="{{$servicer->id}}">{{$servicer->first_name}} {{$servicer->last_name}}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Производител</label>
                                <select class="form-control select2"  id="manufacturer">
                                <option value="0">Сите</option>
                                @foreach($manufacturers as $manufacturer)
                                    <option  value="{{$manufacturer->id}}">{{$manufacturer->name}}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Статус</label>
                                <select class="form-control select2" style="font-weight:bold;" id="status" name="status">
                                        <option  value="">Сите</option>
                                        @foreach($servis_statusi as $ss)
                                            <option @if($ss['name'] === 'ПРИМЕН') selected @endif value="{{ $ss['name'] }}">{{ $ss['name'] }}</option>
                                        @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Магацин</label>
                                <select class="form-control select2" style="" id="wh">
                                @if(\Auth::user()->canDo('admin_izbor_magacin'))
                                    <option value="0">Сите</option>
                                    @foreach($warehouses as $warehouse)
                                        <option   value="{{$warehouse->id}}">{{$warehouse->title}}</option>
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
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Датум на прием</label>
                            <div class="input-group input-medium date-picker input-daterange" data-date="10.11.2012" data-date-format="dd.mm.yyyy" data-date-week-start = "1">
                                <input
                                        type="text"
                                        class="form-control"
                                        id="new_from"
                                        name="new_from"
                                        value="{{ date('d.m.Y',strtotime('-50day',time()))  }}" style="text-align:left;">
                                <span class="input-group-addon"> до </span>
                                <input type="text"
                                       class="form-control"
                                       id="new_to"
                                       name="new_to"
                                       value="{{date('d.m.Y')}}" style="text-align:left;">
                            </div>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <table articles-table class="table table-striped table-bordered table-hover order-column">
                            <thead>
                                <tr role="row" class="heading">
                                    <th> Бр сервис</th>
                                    <th> Модел</th>
                                    <th> Контакт</th>
                                    <th> Паскод</th>
                                    <th> Цена</th>
                                    <th> Дефект</th>
                                    <th> Коментар</th>
                                    <th> Статус</th>
                                    <th> Сервисер</th>
                                    <th> Јавено</th>
                                    <th> Датум прием</th>
                                    <th> Датум завршен</th>
                                    <th> Датум подигнат</th>
                                    <th> Клиент</th>
                                    <th> Сериски број</th>
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
                        "url": "{{ route('admin.services.datatable') }}",
                        "type": "get",
                        "data": function ( d ) {
                             return $.extend( {}, d, {
                               "servicer": $("#servicer_select").val(),
                               "manufacturer": $("#manufacturer").val(),
                               "status": $("#status").val(),
                               "wh": $("#wh").val(),
                               "new_from": $("#new_from").val(),
                               "new_to" : $("#new_to").val()
                             });
                        }
                    },
                    "language": {
                        url: EsConfig.routes.datatableLanguage
                    },

                    // setup buttons extension: http://datatables.net/extensions/buttons/
                    buttons: [],
                    lengthMenu:  [ 10, 25, 50, 75, 100 ],

                    // set the initial value
                    "pageLength": 50,

                    "columns": [
//
                        { "data": "document_number",
                            "render": function ( data, type, row, meta ) {
                                return "<a href='/admin/service/show/"+row['id']+"'>"+data+"</a>";
                            } },
                        { "data": "model" },
                        { "data": "contact"},
                        { "data": "pass_code" },
                        { "data": "expected_price" },
                        { "data": "defekt" },
                        { "data": "comment" },
                        { "data": "servis_status"},
                        { "data": "servicer"},
                        { "data": "contacted" },
                        { "data": "date_priem",
                            "render": function ( data, type, row, meta ) {
                                if(data)
                                    data = new Date(data.replace(/-/g, '/'));
                                else
                                    data = new Date(data);

                                if(data.getFullYear() == 1970)
                                    return '';
                                return data.getDate()+'.'+(data.getMonth() + 1 )+'.'+data.getFullYear();
                            } },
                        { "data": "date_zavrsen",
                            "render": function ( data, type, row, meta ) {
                                if(data)
                                    data = new Date(data.replace(/-/g, '/'));
                                else
                                    data = new Date(data);
                                if(data.getFullYear() == 1970)
                                    return '';
                                return data.getDate()+'.'+(data.getMonth() + 1 )+'.'+data.getFullYear();
                            }  },

                        { "data": "date_podignat",
                            "render": function ( data, type, row, meta ) {
                                if(data)
                                    data = new Date(data.replace(/-/g, '/'));
                                else
                                    data = new Date(data);
                                if(data.getFullYear() == 1970)
                                    return '';
                                return data.getDate()+'.'+(data.getMonth() + 1 )+'.'+data.getFullYear();
                            }  },

                        { "data": "first_name" },
                        { "data": "serial_number" },
                        { "data": "Action"},
                    ],
                    "order": [
                        [ 10, "desc" ]
                    ]
                });
            }
        };
        return Articles;
    })();

    Articles.init();

    $('#servicer_select,#manufacturer,#status,#wh,#new_from,#new_to').on('change',function(){
        $('[articles-table]').DataTable().ajax.reload(); //Exact value, column, reg
    });
    $(document).ready(function() {
      $('#servicer_select,#manufacturer,#status,#wh').select2({ width: '100%' });
    });
    </script>
    <script src="/assets/admin/pages/scripts/customer-service.js" type="text/javascript"></script>
@stop

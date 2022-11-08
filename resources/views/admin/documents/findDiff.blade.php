@extends('layouts.admin')
@section('content')
<div class="content">
<div class="page-content-inner">
    <div class="row">
        <div class="col-md-12">
            <div class="portlet light "> 
                <div class="col-md-8"></div>
                               
                    {{csrf_field()}}
                    <p>Поврзани документи во кои се пронајдени разлики : </p>
                    <table style="margin-top:50px;" class="table table-striped table-bordered table-hover">
                        <thead>           
                            <th>Документ</th>
                            <th>Нарачка</th>
                            <th>Испратница</th>
                            <th ></th>
                        </thead>
                        <tbody>
                        @foreach($razlika_fiskalna as $rf)
                        <tr id="fiskalna_{{$rf['fiskalna']['id']}}">
                            <td> 
                                <a target="_blank" href="{{URL::to('admin/document/fiskalna/print')}}/{{$rf['fiskalna']['id']}}">Фискална {{$rf['fiskalna']['doc_number']}} </a>
                                <table style="width:100%;">
                                <tr>
                                <th style="width:40%;">производ</th><th>кол</th><th>цена <br/>без ддв</th><th>данок</th><th>Eдинеч.<br/>со ДДВ</th><th>Вкупно <br/>со ДДВ</th>
                                </tr>
                                <tr>
                                <td colspan="9">&nbsp;</td>
                                </tr>
                                @foreach($rf['fiskalna']['doc_items'] as $n)
                                <tr>
                                    <td>{{$n['item_name']}}</td><td>{{$n['quantity']}}</td><td>{{$n['price_no_vat']}}</td><td>{{$n['vat']}}</td><td>{{$n['price']}}</td><td>{{$n['sum_vat']}}</td>
                                </tr>
                                @endforeach
                                </table>
                            </td>
                            <td>
                                @if(isset($rf['naracka']))
                                <a  target="_blank" href="{{URL::to('admin/document/narachka/edit')}}/{{$rf['naracka']['id']}}" >Нарачка {{$rf['naracka']['doc_number']}} </a>
                               
                                <table style="width:100%;">
                                <tr>
                                <th style="width:40%;">производ</th><th>кол</th><th>цена <br/>без ддв</th><th>данок</th><th>Eдинеч.<br/>со ДДВ</th><th>Вкупно <br/>со ДДВ</th>
                                </tr>
                                <tr>
                                <td colspan="9">&nbsp;</td>
                                </tr>
                                @foreach($rf['naracka']['doc_items'] as $n)
                                <tr>
                                    <td>{{$n['item_name']}}</td><td>{{$n['quantity']}}</td><td>{{$n['price_no_vat']}}</td><td>{{$n['vat']}}</td><td>{{$n['price']}}</td><td>{{$n['sum_vat']}}</td>
                                </tr>
                                @endforeach
                                </table>
                                @else
                                Не е креирана нарачка
                                @endif
                            </td>
                            <td>
                            @if(isset($rf['ispratnica']))
                                <a  target="_blank" href="{{URL::to('admin/document/ispratnica/edit')}}/{{$rf['ispratnica']['id']}}" >Испратница {{$rf['ispratnica']['doc_number']}} </a>
                                <table style="width:100%;">
                                <tr>
                                <th style="width:40%;">производ</th><th>кол</th><th>цена <br/>без ддв</th><th>данок</th><th>Eдинеч.<br/>со ДДВ</th><th>Вкупно <br/>со ДДВ</th>
                                </tr>
                                <tr>
                                <td colspan="9">&nbsp;</td>
                                </tr>
                                @foreach($rf['ispratnica']['doc_items'] as $n)
                                <tr>
                                    <td>{{$n['item_name']}}</td><td>{{$n['quantity']}}</td><td>{{$n['price_no_vat']}}</td><td>{{$n['vat']}}</td><td>{{$n['price']}}</td><td>{{$n['sum_vat']}}</td>
                                </tr>
                                @endforeach
                                </table>
                            @else
                                Не е креирана испратница
                            @endif
                            </td>
                            <td style="text-align:center;">
                            
                                <a class="btn-sm btn-success fix" id="fiskalna_{{$rf['fiskalna']['id']}}" >Ажурирај</a>
                            
                            </td>
                        </tr>
                        @endforeach
                        @foreach($razlika_faktura as $rf)
                        <tr id="faktura_{{$rf['faktura']['id']}}">
                            <td> 
                            @if(isset($rf['faktura']))
                            <a target="_blank" href="{{URL::to('admin/document/faktura/edit')}}/{{$rf['faktura']['id']}}">Фактура {{$rf['faktura']['doc_number']}} </a>
                            
                                <table style="width:100%;">
                                <tr>
                                <th style="width:40%;">производ</th><th>кол</th><th>цена <br/>без ддв</th><th>данок</th><th>Eдинеч.<br/>со ДДВ</th><th>Вкупно <br/>со ДДВ</th>
                                </tr>
                                <tr>
                                <td colspan="9">&nbsp;</td>
                                </tr>
                                @foreach($rf['faktura']['doc_items'] as $n)
                                <tr>
                                    <td>{{$n['item_name']}}</td><td>{{$n['quantity']}}</td><td>{{$n['price_no_vat']}}</td><td>{{$n['vat']}}</td><td>{{$n['price']}}</td><td>{{$n['sum_vat']}}</td>
                                </tr>
                                @endforeach
                                </table>
                            @endif
                            </td>
                            <td>
                            @if(isset($rf['naracka']))
                            <a  target="_blank" href="{{URL::to('admin/document/narachka/edit')}}/{{$rf['naracka']['id']}}" >Нарачка {{$rf['naracka']['doc_number']}} </a>
                           
                            <table style="width:100%;">
                                <tr>
                                <th style="width:40%;">производ</th><th>кол</th><th>цена <br/>без ддв</th><th>данок</th><th>Eдинеч.<br/>со ДДВ</th><th>Вкупно <br/>со ДДВ</th>
                                </tr>
                                <tr>
                                <td colspan="9">&nbsp;</td>
                                </tr>
                                @foreach($rf['naracka']['doc_items'] as $n)
                                <tr>
                                    <td>{{$n['item_name']}}</td><td>{{$n['quantity']}}</td><td>{{$n['price_no_vat']}}</td><td>{{$n['vat']}}</td><td>{{$n['price']}}</td><td>{{$n['sum_vat']}}</td>
                                </tr>
                                @endforeach
                                </table>
                            @else
                                Не е креирана нарачка
                            @endif
                            </td>
                            <td>
                            @if(isset($rf['ispratnica']))
                            <a  target="_blank" href="{{URL::to('admin/document/ispratnica/edit')}}/{{$rf['ispratnica']['id']}}" >Испратница {{$rf['ispratnica']['doc_number']}} </a>
                            
                            <table style="width:100%;">
                                <tr>
                                <th style="width:40%;">производ</th><th>кол</th><th>цена <br/>без ддв</th><th>данок</th><th>Eдинеч.<br/>со ДДВ</th><th>Вкупно <br/>со ДДВ</th>
                                </tr>
                                <tr>
                                <td colspan="9">&nbsp;</td>
                                </tr>
                                @foreach($rf['ispratnica']['doc_items'] as $n)
                                <tr>
                                    <td>{{$n['item_name']}}</td><td>{{$n['quantity']}}</td><td>{{$n['price_no_vat']}}</td><td>{{$n['vat']}}</td><td>{{$n['price']}}</td><td>{{$n['sum_vat']}}</td>
                                </tr>
                                @endforeach
                                </table>
                            @else
                                Не е креирана испратница
                            @endif
                            </td>
                            <td style="text-align:center;"><a class="btn-sm btn-success fix" id="faktura_{{$rf['faktura']['id']}}" >Ажурирај</a></td>
                        </tr>
                        @endforeach
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
$(document).ready(function(){
    $(".fix").on('click',function(){
        var temp_id = $(this).attr('id');
        temp_id = temp_id.split("_");
        var doc_type = temp_id[0];
        var doc_id   = temp_id[1];
        console.log('fix');
         $.ajax({
            method: "GET",
            url: "{{route('admin.document.fixDiff')}}",
            data: { doc_type: doc_type, doc_id:  doc_id  }
        })
        .done(function( msg ) {
            $("#"+msg.doc_type+'_'+msg.doc_id).remove();
        });

    });
    $(".container").css('margin-left','0px');
    $(".container").css('width','100%');
});
</script>
@stop

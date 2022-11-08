@extends('layouts.admin')
@section('content')
<div class="content">
<div class="page-content-inner">
    <div class="row">
        <div class="col-md-12">
            <div class="portlet light ">
                <div class="col-md-8"></div>
                <form action="{{URL::to('admin/document/nabavniceniFix')}}" method="post">
                <div class="col-md-4">
                    <div class="input-group input-large date-picker input-daterange" data-date="10.11.2012" data-date-format="dd.mm.yyyy" data-date-week-start = "1">
                        <input type="text"
                            class="form-control"
                            name="from_date"
                            value="{{date('d.m.Y')}}" style="text-align:center;">
                        <span class="input-group-addon"> до </span>
                        <input type="text"
                            class="form-control"
                            name="to_date"
                            value="{{date('d.m.Y')}}" style="text-align:center;"> </div>
                </div>
                
                {{csrf_field()}}
                    <table style="margin-top:50px;" class="table table-striped table-bordered table-hover">
                        <thead>
                            <th></th>
                            <th style="text-align: center;">Реден<br/>број</th>
                            <th style="text-align: center;">Шифра</th>
                            <th style="text-align: center;">Артикал</th>
                            <th style="text-align: center;">Цена од <br/>приемница</th>
                            <th style="text-align: center;">Стара <br/>набавна</th>
                            <th style="text-align: center;">Нова <br/>набавна</th>
                            <th style="text-align: center;">Нова набавна во ПЛТ <br/> за избраниот период</th>
                        </thead>

                        <style>
                            .crvena {
                                background-color: #ffc0c3;
                            }
                        </style>

                        <tbody>
                        <?php $i = 1; ?>
                            @foreach($documentItems as $di)
                            <tr id="row_{{$di->id}}">
                                <td><span style="cursor: pointer;" class="remove_row" id="removerow_{{$di->id}}"><i class="fa fa-trash-o"></i></span></td>
                                <td>{{$i++}}</td>
                                <td>{{$di->unit_code}}</td>
                                <td>{{$di->item_name}}</td>
                                <td style="text-align: right;" <?php echo $di->price!=$di->price_nabavna?'class="crvena"':''; ?>>{{$di->price}}</td>
                                <td style="text-align: right;" <?php echo $di->price!=$di->price_nabavna?'class="crvena"':''; ?>>{{$di->price_nabavna}}</td>
                                <td style="text-align: right;">
                                    <input min=0 type="text" name="nabavna_{{$di->product_id}}" value="{{$di->price}}" style="text-align: right;" />
                                </td>
                                <td style="text-align: right;">
                                    <input min=0 type="text" name="plt_{{$di->product_id}}" value="{{$di->price}}" style="text-align: right;" />
                                    <input type="hidden" name="items[]" value="{{$di->product_id}}"/>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="actions btn-set" style="text-align:right;">
                        <button class="btn btn-success" name="zacuvaj" value="zacuvaj" type="submit"><i class="fa fa-check"></i> Зачувај</button>
                    </div>
                </form>
            </div>
        </div>
    </div>    
</div>
</div>
@stop
@section('scripts')
<script type="text/javascript">
$(document).ready(function(){
    $(".remove_row").on('click',function(){
        var temp_id = $(this).attr('id');
        temp_id = temp_id.split("_");
        temp_id = temp_id[1];
        $("#row_"+temp_id).remove();
    });
});
</script>
<script src="/assets/admin/pages/scripts/ecommerce-products.js" type="text/javascript"></script>
@stop

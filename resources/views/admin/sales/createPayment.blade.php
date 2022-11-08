@extends('layouts.admin')
@section('content')
<div class="content">
<div class="page-content-inner">
<form method="post" action="{{URL::to('admin/sales/storePayment')}}">
    <div class="portlet light col-md-12">
        <div class="portlet-title">        
        <div class="caption">
        @if($payment_id > 0 )
             <i class="fa fa-user"></i>Измени податоци за плаќање </div>
        @else
            <i class="fa fa-user"></i>Ново плаќање </div>
        @endif
            <div class="actions btn-set">
                <a class="btn btn-secondary-outline" href="{{route('admin.sales.payments')}}">Назад</a>
                <button class="btn btn-success" name="zacuvaj" value="zacuvaj" type="submit"><i class="fa fa-check"></i> Зачувај</button>
            </div>
        </div>
        <div class="portlet-body">
        {{csrf_field()}}
        <div class="col-md-8 ">
            <div class="form-group col-md-12">
                <label class="col-md-4 control-label">Документ:</label>
                <div class="col-md-8 @if($errors->has('document_id')) has-error  @endif">
                    
                    <select class="form-control select2"  name="document_id" id="document_id">
                    <option></option>
                    @foreach($documents as $doc)
                    	<option value="{{$doc->id}}">
                         {{EasyShop\Models\Document::transliterate('',$doc->type)}} - 
                         {{$doc->document_number}}  
                         @if(!empty($doc->first_name)) -  @endif
                         {{$doc->first_name}} {{$doc->last_name}}
                         @if(!empty($doc->company)) -  @endif
                         {{$doc->company}}
                         </option>
                    @endforeach
                    </select>
                </div>
            </div>            
            <div class="form-group col-md-12">
                <label class="col-md-4 control-label">Тип:</label>
                <div class="col-md-8 @if($errors->has('type')) has-error  @endif">
                    <select class="form-control select2"  name="type">
                    	<option value="ziro">Жиро</option>
                    	<option value="karticka">Картичка</option>
                    	<option value="fiskalna">Фискална</option>
                    	<option value="ostanato">Останато</option>
                    </select>
                </div>
            </div>  
            <div class="form-group col-md-12">
                <label class="col-md-4 control-label">Износ:</label>
                <div class="col-md-8 @if($errors->has('price')) has-error  @endif">
                    <input type="text" class="form-control" placeholder="Износ" name="price" value="" id="price">
                </div>                
            </div>
            <div id="show_delumnoprice" class="form-group col-md-12">
                <label class="col-md-4 control-label"></label>
                <div class="col-md-8">
                    Вкупната цена е <span id="vkupno_cena" style=""></span> денари<br/>
                    Платени се <span id="delumno_platena" style=""></span> денари
                </div>                
            </div>
        
        </div>
    </div>
</div>
<input name="payment_id" type="hidden" value="{{$payment_id}}">
</form>
</div>
</div>
@stop
@section('scripts')
<script type="text/javascript">
    $(document).ready(function(){
       $(".select2").select2({
            placeholder: "Избери",
            allowClear: true
       });
       $("#show_delumnoprice").hide();
       $("#document_id").on('change',function(){

            var doc_id = $("#document_id :selected").val();

            $.get('{{URL::to("admin/sales/payments/details/getPaymentsForDocument")}}',{ document_id:doc_id }).done(function( data ) {
                console.log(data);
                $("#vkupno_cena").text(data.full_price);
                if ( data.paid > 0 ) {
                    $("#delumno_platena").text(data.paid);
                    $("#show_delumnoprice").show();
                } else {
                    $("#show_delumnoprice").hide();
                    $("#delumno_platena").text(0);
                }

                $("#price").val(data.show_price);

            });
       });
    });
</script>
@stop

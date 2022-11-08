@extends('layouts.admin')
@section('content')


<div class="content">
<div class="page-content-inner">
<form method="post" action="{{URL::to('admin/document/store')}}">
    <div class="portlet light col-md-12">
        <div class="portlet-title">
        <div class="caption">Креирај {{$document_type_show}} - Прв чекор</div>
            <div class="actions btn-set">
                <a class="btn btn-secondary-outline" href="{{route('admin.customers')}}">Назад</a>
                <button class="btn btn-info blue-soft" name="potvrdi" value="potvrdi" type="submit"><i class="fa fa-check"></i> Зачувај</button>
            </div>
        </div>
        <div class="portlet-body">
        {{csrf_field()}}

        <div class="row">

            <div class="col-md-12 ">
            @if($document_type=='vlez')
                <div class="row">
                <div class="form-group col-md-12">
                    <label class="col-md-2 control-label">Магацин:<span class="required"> * </span></label>
                    <div class="col-md-8">
                        <select class="form-control" class="select2" id="warehouse_id"  name="warehouse_id">
                            @foreach($warehouses as $wh)
                                <option value="{{$wh->id}}">{{$wh->title}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                </div>
            @endif
            </div>
            <div class="col-md-12 ">
                @if($document_type=='vlez')
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label class="col-md-2 control-label">Излез број:<span class="required"> * </span></label>
                            <div class="col-md-8">
                                <select class="form-control" class="select2" id="document_id"  name="doc_id">
                                    @foreach($documents as $dc)
                                        <option value="{{$dc->id}}">{{$dc->document_number}} ({{date('d-m-Y',strtotime($dc->created_at))}})</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>

    </div>
</div>
<input type="hidden" name="type" value="{{$document_type}}"/>
<input type="hidden" name="document_id" value="{{$document_id}}"/>
</form>
</div>
</div>

@stop
@section('scripts')
<script>
$(document).ready(function(){
    $(".select2").select2(); 
    $("#create_doc_newdate").datepicker({
        weekStart: 1
    });
    $("#create_doc_newdate").datepicker('update', new Date());

    $("#warehouse_id").on('change',function(){
        $.post('{{URL::to("admin/document/getDocumentsForWarehouse")}}', {warehouse_id:$("#warehouse_id :selected").val()}).done(function(data){
            $('#document_id').html(data.html);
        });
    });
});
</script>
<script src="/assets/admin/pages/scripts/ecommerce-products-edit.js" type="text/javascript"></script>
@stop
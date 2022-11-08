@extends('layouts.admin')

@section('content')

<div class="content">
<div class="page-content-inner">
<form method="post" action="{{URL::to('admin/warehouses/store')}}">
        {{csrf_field()}}
    <div class="portlet light col-md-12">
        <div class="portlet-title">
        <div class="caption"><i class="fa fa-user"></i>Магацин</div>
            <div class="actions btn-set">
                <a class="btn btn-secondary-outline" href="{{route('admin.warehouses.all')}}">Назад</a>
                <button class="btn btn-success" name="potvrdi" value="potvrdi" type="submit"><i class="fa fa-check"></i> Зачувај</button>
            </div>
        </div>
        <div class="portlet-body">
        	<div class="col-md-12 ">
            	<div class="form-group col-md-12">
	            	<label class="col-md-2 control-label">Име:</label>
	            	<div class="col-md-8">
	            	<input type="text" class="form-control" name="title" value="{{$data->title}}">
	                </div>
                </div>
                <div class="form-group col-md-12">
                    <label class="col-md-2 control-label">Држава:</label>
                    <div class="col-md-8">
                        <select id="country_id" class="select2 form-control" name="country_id">
                            @foreach($country as $co)
                                <option @if($co->id == $data->country_id) selected  @endif  value="{{$co->id}}">{{$co->country_name}}</option>
                            @endforeach   
                        </select>
                    </div>
                </div>

                <div class="country_other form-group col-md-12" style="@if($data->country_id != 65) display:none @endif">
                    <label class="col-md-2 control-label">Останати држави:</label>
                    <div class="col-md-8 @if($errors->has('country_other')) has-error  @endif">
                        <input type="text" id="country_other" class="form-control" name="country_other" value="">
                    </div>
                </div>            

                <div id="mkd_gradovi" class="form-group col-md-12" style="@if($data->country_id != 1) display:none @endif">
                	<label class="col-md-2 control-label">Град:</label>
                	<div class="col-md-8">
                  		<select id="city_id"  class="select2 form-control" style="width:100%;" name="city_id">
							@foreach($city as $cy)
                                <option @if($cy->id == $data->city_id) selected  @endif value="{{$cy->id}}">{{$cy->city_name}}</option>
                            @endforeach 
						</select>
                	</div>
            	</div>   
                <div class="form-group col-md-12 city_other" 
                    style="@if($data->country_id == 1) display:none @endif">
                    <label class="col-md-2 control-label">Град:</label>
                    <div class="col-md-8 @if($errors->has('city_other')) has-error  @endif">
                        <input id="city_other" type="text" class="form-control"  name="city_other" value="{{$data->city_other}}">
                    </div>
                </div>   

            	<div class="form-group col-md-12">
	            	<label class="col-md-2 control-label">Приоритет:</label>
                    <div class="col-md-8 @if($errors->has('priority')) has-error  @endif">
                        <input type="text" class="form-control" name="priority" value="{{$data->priority}}">
	                </div>
                </div>
            </div>
            <div class="col-md-12" style="border-top: 1px solid #eee;border-radius: 2px 2px 0 0; margin-bottom: 10px;padding-top:12px;text-align:right">    
            <div class="actions btn-set">
                <a class="btn btn-secondary-outline" href="{{route('admin.warehouses.all')}}">Назад</a>
                <button class="btn btn-success" name="potvrdi" value="potvrdi" type="submit"><i class="fa fa-check"></i> Зачувај</button>
            </div>
        </div>
     	</div>
     </div>
<input type="hidden" value="{{$warehouse_id}}" name="warehouse_id">
</form>
</div>
</div>
@stop
@section('scripts')
<script type="text/javascript">
    $(document).ready(function(){
        $(".select2").select2();
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
                $("#country_other").val('');
                $("#city_other").val('');
            }else{
                $("#mkd_gradovi").hide();
                $(".country_other").hide();
                $(".city_other").show();
                $(".postenski").show();
                $("#country_other").val('');
                $("#city_other").val('');
            }
        });
    })
</script>
@stop
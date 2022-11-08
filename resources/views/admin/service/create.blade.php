@extends('layouts.admin')
@section('content')
<?php $servis_statusi = config( 'clients.' . config( 'app.client') .'.service_status');  //dd($servis_statusi); ?>
                        
<div class="content">
<div class="page-content-inner">
<form method="post" action="{{URL::to('admin/service/store')}}">
    <div class="portlet light col-md-12">
        <div class="portlet-title">        
        <div class="caption">
        @if($service_id > 0 )
             <i class="fa fa-wrench"></i>Измени податоци за сервис - {{$service->document_number}} </div>
        @else
            <i class="fa fa-wrench"></i>Сервис - <input disabled style="background:transparent; border:none !important;" id="changeServiceNumber" value="{{$service_document_number}}"></div>
        @endif
            <div class="actions btn-set">
                <a class="btn btn-secondary-outline" href="{{route('admin.customers.create')}}">Креирај нов клиент</a>
                <a class="btn btn-secondary-outline" href="{{route('admin.services')}}">Назад</a>
                <button class="btn btn-success" name="zacuvaj" value="zacuvaj" type="submit"><i class="fa fa-check"></i> Зачувај</button>
            </div>
        </div>
        <div class="portlet-body">
        {{csrf_field()}}
        <div class="col-md-6">
            <div class="form-group col-md-12">
                <label class="col-md-4 control-label">Клиент:</label>
                <div class="col-md-8">
                   <select class="form-control select2" id="clientChange" name="client">
                   <option></option>
                @foreach($users as $user)
                    <option @if($service->client_id == $user->id) selected @endif value="{{$user->id}}">{{$user->first_name}} {{$user->last_name}}</option>
                @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group col-md-12">
                <label class="col-md-4 control-label">Контакт телефон: </label>
                <div class="col-md-8">
                    <input type="text" class="form-control" id="changeContactPhone" placeholder="Контакт телефон" name="contact_phone" value="{{$service->contact_phone}}">
                </div>
            </div>
            <div class="form-group col-md-12">
                <label class="col-md-4 control-label">Примил на сервис:</label>
                <div class="col-md-8">
                   {{$current_employee}}
                </div>
            </div>
            <div class="form-group col-md-12">
                <label class="col-md-4 control-label">Датум прием:</label>
                <div  class="col-md-8 input-group date date-picker" data-date-format="dd.mm.yyyy" data-date-week-start = "1">
                    <input style="margin-left:14px;"  type="text" class="form-control" name="date_priem"
                            @if(!empty($service->date_priem)) value="{{date('d.m.Y', strtotime($service->date_priem))}}"
                            @else value="{{date('d.m.Y')}}"
                            @endif>
                    <span class="input-group-btn">
                        <button class="btn default" type="button">
                            <i class="fa fa-calendar"></i>
                        </button>
                    </span>
                    </input>
                </div>
            </div>
            <div class="form-group col-md-12">
                <label class="col-md-4 control-label" >Сервис:</label>
                <div class="col-md-8">
                    <select class="form-control select2" id="serviceOnChange" name="warehouse_id">
                    @if(\Auth::user()->canDo('admin_izbor_magacin'))
                        @foreach($warehouses as $warehouse)
                            <option  @if($service->warehouse_id == $warehouse->id) selected @endif  value="{{$warehouse->id}}">{{$warehouse->title}}</option>
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
            <div class="form-group col-md-12">
                <label class="col-md-4 control-label" >Сервисер:</label>
                <div class="col-md-8">
                    <select class="form-control select2"  name="servicer">
                    <option></option>
                    @foreach($servicers as $servicer)
                        <option  @if($service->servicer == $servicer->id) selected @endif  value="{{$servicer->id}}">{{$servicer->first_name}} {{$servicer->last_name}}</option>
                    @endforeach    
                    </select>
                </div>
            </div>
                <div class="form-group col-md-12">
            <label class="col-md-4 control-label">Производител:</label>
           <div class="col-md-8">
                <select class="form-control select2"  name="manufacturer">
                <option></option>
                @foreach($manufacturers as $manufacturer)
                    <option  @if($service->manufacturer == $manufacturer->id) selected @endif  value="{{$manufacturer->id}}">{{$manufacturer->name}}</option>
                @endforeach 
                </select>
            </div>
        </div>
        <div class="form-group col-md-12">
                <label class="col-md-4 control-label">Модел:</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" placeholder="Модел" name="model" value="{{$service->model}}">
                </div>
        </div>

        <div class="form-group col-md-12">
            <label class="col-md-4 control-label">Сериски број:</label>
            <div class="col-md-8">
                    <input type="text" class="form-control" placeholder="Сериски број" name="serial_num" value="{{$service->serial_number}}">
            </div>
        </div>
        <div class="form-group col-md-12">
                <label class="col-md-4 control-label">Passcode:</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" placeholder="Passcode" name="pass_code" value="{{$service->pass_code}}">
                </div>
            </div> 
            <div class="form-group col-md-12">
                <label class="col-md-4 control-label">Оштетувања</label>
                <div class="col-md-8">
                   <textarea name="known_issues" rows="6" style="width:100%;resize:none; overflow:auto">{{$service->known_problems}}</textarea>
                </div>
            </div>
            <div class="form-group col-md-12 city_other" >
                 <label class="col-md-4 control-label">Дефекти:</label>
                <div class="col-md-8">
                   <textarea name="issues" rows="6" style="width:100%;resize:none; overflow:auto">{{$service->problems}}</textarea>
                </div>
            </div>
        </div>
        <div class="col-md-6">
     
        
           <div class="form-group col-md-12 city_other" >
                 <label class="col-md-4 control-label">Рекламација:</label>
                <div class="col-md-8">
                   <textarea name="complaint" rows="6" style="width:100%;resize:none; overflow:auto">{{$service->reclamation}}</textarea>
                </div>
            </div>


            
            <div class="form-group col-md-12 city_other" >
                 <label class="col-md-4 control-label">Испратница број:</label>
                 <div class="col-md-8 " > 
                    <input type="text" id="search_ispratnica" />
                    <a class="btn" style="margin-top:2px;" href="#" id="getProduct">Земи продукти</a>
                 </div>
            </div>

            <div class="form-group col-md-12 city_other" >
                 <label class="col-md-4 control-label">Искористени делови:</label>
                <div class="col-md-8">
                   <textarea id="used_parts" name="used_parts" rows="6" style="width:100%;resize:none; overflow:auto">{{$service->used_parts}}</textarea>
                </div>
            </div>
            <div class="form-group col-md-12 city_other" >
                 <label class="col-md-4 control-label">Забелешка:</label>
                <div class="col-md-8">
                   <textarea name="comment" rows="6" style="width:100%;resize:none; overflow:auto">{{$service->comment}}</textarea>
                </div>
            </div>
            <div class="form-group col-md-12">
            <label class="col-md-4 control-label">Предлог цена:</label>
            <div class="col-md-8">
                    <input type="text" class="form-control" placeholder="Предлог цена" name="expected_price" value="{{$service->expected_price}}">
            </div>
        </div>
    <!--     <div class="form-group col-md-12">
            <label class="col-md-4 control-label">Код на тежина:</label>
           <div class="col-md-8">
                <select class="form-control select2"  name="weight_code">
                        <option  @if($service->code == 1) selected @endif   value="1">1</option>
                        <option  @if($service->code == 2) selected @endif   value="2">2</option>
                        <option  @if($service->code == 3) selected @endif   value="3">3</option>
                        <option  @if($service->code == 4) selected @endif   value="4">4</option>
                        <option  @if($service->code == 5) selected @endif   value="5">5</option>
                </select>
            </div>
        </div> -->
         <div class="form-group col-md-12">
            <label class="col-md-4 control-label" style="font-weight:bold">Статус:</label>
           <div class="col-md-8">
                <select class="form-control select2" style="font-weight:bold;" id="status" name="status">
                        @foreach($servis_statusi as $ss)
                        <option @if($service->servis_status == $ss['name']) selected @endif value="{{$ss['name']}}">{{$ss['name']}}</option>
                        @endforeach
                </select>
            </div>
        </div>
        <div class="form-group col-md-12">
            <label class="col-md-4 control-label">Контактиран:</label>
           <div class="col-md-8">
                <select class="form-control select2"  name="contacted">
                        <option  @if($service->contacted == 0) selected @endif   value="0">Не</option>
                        <option  @if($service->contacted == 1) selected @endif   value="1">Да</option>
                </select>
            </div>
        </div>
        <div class="form-group col-md-12">
                <label class="col-md-4 control-label">Датум завршен сервис:</label>
                <div  class="col-md-8 input-group date date-picker" data-date-format="dd.mm.yyyy" data-date-week-start = "1">
                    <input style="margin-left:14px;" type="text" class="form-control" name="date_zavrsen"  @if(!empty($service->date_zavrsen)) value="{{date('d.m.Y', strtotime($service->date_zavrsen))}}" @endif>
                    <span class="input-group-btn">
                        <button class="btn default" type="button">
                            <i class="fa fa-calendar"></i>
                        </button>
                    </span>
                    </input>
                </div>
            </div>
            <div class="form-group col-md-12">
                <label class="col-md-4 control-label">Датум подигнат:</label>
                <div  class="col-md-8 input-group date date-picker" data-date-format="dd.mm.yyyy" data-date-week-start = "1">
                    <input style="margin-left:14px;" type="text" class="form-control" name="date_podignat" @if(!empty($service->date_podignat)) value="{{date('d.m.Y', strtotime($service->date_podignat))}}" @endif>
                    <span class="input-group-btn">
                        <button class="btn default" type="button">
                            <i class="fa fa-calendar"></i>
                        </button>
                    </span>
                </div>
            </div>
            <div class="form-group col-md-12">
                <label class="col-md-4 control-label">Датум на рекламација:</label>
                <div  class="col-md-8 input-group date date-picker" data-date-format="dd.mm.yyyy" data-date-week-start = "1">
                    <input style="margin-left:14px;" type="text" class="form-control" name="date_reklamacija" @if(!empty($service->date_reklamacija)) value="{{date('d.m.Y', strtotime($service->date_reklamacija))}}" @endif>
                    <span class="input-group-btn">
                        <button class="btn default" type="button">
                            <i class="fa fa-calendar"></i>
                        </button>
                    </span>
                </div>
            </div>    
        <div class="form-group col-md-12" style="margin-top:10px;">
           <div class="col-md-12" style="text-align:center;">
                
                @if($service->id > 0 && empty($service->order_id))
                <a href="{{URL::to('admin/document/narachka/new/service')}}/{{$service->id}}" style="display:none" id="create_naracka">Креирај нарачка</a>
                @elseif($service->id > 0 && !empty($service->order_id))
                <table class="table table-bordered table-striped table-condensed flip-content">
                    <thead class="flip-content">
                        <tr>
                            <th class="text-center">Производ</th>
                            <th class="text-center">Вк. цена</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $pr)
                        <tr>
                            <td class="text-left">{{$pr->item_name}}</td>
                            <td>{{$pr->price  * $pr->quantity }}</td>
                        </tr>
                        @endforeach
                        <tr>
                            <td class="text-right" style="font-weight:bold;">Вкупно</td>
                            <td>{{$total}}</td>
                        </tr>
                    </tbody>
                </table> 
                <a href="{{URL::to('admin/document/narachka/edit')}}/{{$service->order_id}}" style="@if(!$service->order_id)display:none @endif" id="edit_naracka">Едитирај нарачка</a>
                @endif   

           </div>
        </div>
        </div>
        <div class="col-md-12" style="border-top: 1px solid #eee;border-radius: 2px 2px 0 0; margin-bottom: 10px;padding-top:12px;text-align:right">    
            <div class="actions btn-set">
            <a class="btn btn-secondary-outline" href="{{route('admin.customers.create')}}">Креирај нов клиент</a>
                
                <a class="btn btn-secondary-outline" href="{{route('admin.employee')}}">Назад</a>
                <button class="btn btn-success" name="zacuvaj" value="zacuvaj" type="submit"><i class="fa fa-check"></i> Зачувај</button>
            </div>
        </div>
    </div>
</div>
<input type="hidden" name="service_id" value="{{$service_id}}">
</form>
</div>
</div>
@stop
@section('scripts')
<script type="text/javascript">
    $(document).ready(function(){
        
        $(".select2").select2();
        $("#status").on('change',function(){
            var value = $("#status :selected").val();
            if(value == 'zavrsen'){
                $("#create_naracka").show();
                $("#edit_naracka").show();
            } else {
                $("#create_naracka").hide();
                $("#edit_naracka").hide();
            }

        });
        $("#clientChange").on('change',function(){
            $.ajax({
                method: "GET",
                url: "/admin/service/updatePhoneNumber",
                data: { sid: $("#clientChange").val() }
            }).done(function( data ) {
                document.getElementById('changeContactPhone').value = data.servicerPhone;
            });
        });
        $("#serviceOnChange").on('change',function(){
            $.ajax({
                method: "GET",
                url: "/admin/service/updateServiceNumber",
                data: { number: $("#serviceOnChange").val() }
            }).done(function( data ) {
                document.getElementById('changeServiceNumber').value = data.updatedServiceNumber;
            });
        });
        $("#getProduct").on('click',function(){
            
            $.ajax({
                method: "GET",
                url: "/admin/service/products/ispratnica",
                data: { 'number': $("#search_ispratnica").val() }
            }).done(function( data ) {
                var string = "";
                if(data.products.length > 0)
                {
                    string = $("#used_parts").val();
                    $.each( data.products, function( key, value ) {
                        string = string + value.unit_code+' - '+value.item_name+' Количина: '+value.quantity+' // Цена: '+value.sum_vat+'ден. \n';
                    });
                    $("#used_parts").val(string);
                    string = "";
                } else {
                    alert("Испратница со овој број не е пронајден");
                }
            });
        });

    });
</script>
<script src="/assets/admin/pages/scripts/ecommerce-products.js" type="text/javascript"></script>
@stop

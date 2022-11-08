@extends('layouts.admin')
@section('content')
<div class="content">
    <div class="page-content-inner">
        <form method="post" action="{{URL::to('admin/employee/store')}}">
            <div class="portlet light col-md-12">
                <div class="portlet-title">
                    <div class="caption">
                        @if($user_id > 0 )
                        <i class="fa fa-user"></i>Измени податоци за вработен </div>
                    @else
                    <i class="fa fa-user"></i>Нов Вработен
                </div>
                @endif
                <div class="actions btn-set">
                    <a class="btn btn-secondary-outline" href="{{route('admin.employee')}}">Назад</a>
                    <button class="btn btn-success" name="zacuvaj" value="zacuvaj" type="submit"><i
                            class="fa fa-check"></i> Зачувај</button>
                </div>
            </div>
            <div class="portlet-body">
                {{csrf_field()}}
                <div class="col-md-8 ">
                    <div class="form-group col-md-12">
                        <label class="col-md-4 control-label">Име:</label>
                        <div class="col-md-8 @if($errors->has('first_name')) has-error  @endif">
                            <input type="text" class="form-control" placeholder="Име" name="first_name"
                                value="{{ old('first_name', $client->first_name) }}">
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <label class="col-md-4 control-label">Презиме:</label>
                        <div class="col-md-8 @if($errors->has('last_name')) has-error  @endif">
                            <input type="text" class="form-control" placeholder="Презиме" name="last_name"
                                value="{{ old('last_name', $client->last_name) }}">
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <label class="col-md-4 control-label">Пол:</label>
                        <div class="col-md-8">
                            <select name="gender" class="form-control select2" name="">
                                <option @if(isset($client->gender) && $client->gender == 'male') selected @endif
                                    value="male">Машко</option>
                                <option @if(isset($client->gender) && $client->gender == 'female') selected @endif
                                    value="female">Женско</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <label class="col-md-4 control-label">Емаил:</label>
                        <div class="col-md-8  @if($errors->has('email')) has-error  @endif">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-envelope"></i>
                                </span>
                                <input name="email" type="email" class="form-control" placeholder="Емаил"
                                    value="{{ old('email', $client->email) }}"> </div>
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <label class="col-md-4 control-label">Телефон:</label>
                        <div class="col-md-8 @if($errors->has('phone')) has-error  @endif">
                            <input type="text" class="form-control" placeholder="Телефон" name="phone"
                                value="{{ old('phone', $client->phone) }}">
                        </div>
                    </div>

                    <div class="form-group col-md-12">
                        <label class="col-md-4 control-label">Држава:</label>
                        <div class="col-md-8">
                            <select id="country_id" class="form-control select2" name="country_id">

                                @foreach($country as $co)
                                <option @if(isset($client->country_id) && $client->country_id == $co->id) selected
                                    @endif value="{{$co->id}}">{{$co->country_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="country_other form-group col-md-12" style="display:none">
                        <label class="col-md-4 control-label">Останати држави:</label>
                        <div class="col-md-8 @if($errors->has('country_other')) has-error  @endif">
                            <input type="text" class="form-control" placeholder="Останати држави" name="country_other"
                                value="{{ old('country_other', $client->country_other) }}">
                        </div>
                    </div>
                    <div id="mkd_gradovi" style="@if($client->country_id != 1) display:none @endif"
                        class="form-group col-md-12">
                        <label class="col-md-4 control-label">Град:</label>
                        <div class="col-md-8">
                            <select id="city_id" class="form-control select2" name="city_id">
                                @foreach($city as $cy)
                                <option @if(isset($client->city_id) && $client->city_id == $cy->id) selected @endif
                                    value="{{$cy->id}}">{{$cy->city_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group col-md-12 city_other"
                        style="@if($client->country_id == 1) display:none @endif">
                        <label class="col-md-4 control-label">Град:</label>
                        <div class="col-md-8 @if($errors->has('city_other')) has-error  @endif">
                            <input id="city_other" type="text" class="form-control" placeholder="Останати градови"
                                name="city_other" value="{{ old('city_other', $client->city_other) }}">
                        </div>
                    </div>

                    <div style="@if($client->country_id == 1) display:none @endif"
                        class="postenski form-group col-md-12">
                        <label class="col-md-4 control-label">Поштенски код:</label>
                        <div class="col-md-8 @if($errors->has('zip_other')) has-error  @endif">
                            <input type="text" class="form-control" placeholder="Поштенски код" name="zip_other"
                                value="{{ old('zip_other', $client->zip_other) }}">
                        </div>
                    </div>

                    <div class="form-group col-md-12">
                        <label class="col-md-4 control-label">Магацин:</label>
                        <div class="col-md-8 @if($errors->has('phone')) has-error  @endif">
                            <select name="warehouse_id" class="form-control select2">
                                @foreach($warehouses as $wh)
                                <option @if($client->warehouse_id == $wh->id) selected @endif
                                    value="{{$wh->id}}">{{$wh->title}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <label class="col-md-4 control-label">Активен:</label>
                        <div class="col-md-3">
                            <input name="aktiven" type="checkbox" class="make-switch" data-on-text="Да"
                                data-off-text="Не" value="1" @if(isset($client->aktiven) && $client->aktiven == 1)
                            checked @endif
                            >
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <label class="col-md-4 control-label">Лозинка:</label>
                        <div class="col-md-8">
                            <input name="password" type="password" class="form-control">
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <label class="col-md-4 control-label">Role:</label>
                        <div class="col-md-8">
                            <select name="assignedRoles[]" class="select2 form-control" multiple="">
                                @foreach($roles as $role)
                                <option @if(in_array($role->id,$assigned_roles)) selected @endif
                                    value="{{$role->id}}">{{$role->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    @if((config( 'app.client') == 'naturatherapyshop_al' || config( 'app.client') == 'naturatherapyshop') && isset($client) && in_array(2, $assigned_roles))
                    <div class="form-group col-md-12">
                        <label class="col-md-4 control-label">Тип на оператор:</label>
                        <div class="col-md-8">
                            <select name="operator_type" class="select2 form-control">
                                <option @if(isset($client) && $client->operator_type == 'honorar') selected @endif
                                    value="honorar">Хонорар</option>
                                <option @if(isset($client) && $client->operator_type == 'prijaven') selected @endif
                                    value="prijaven">Пријавен</option>
                            </select>
                        </div>
                    </div>
                    @endif
                </div>
                <div class="col-md-12"
                    style="border-top: 1px solid #eee;border-radius: 2px 2px 0 0; margin-bottom: 10px;padding-top:12px;text-align:right">
                    <div class="actions btn-set">
                        <a class="btn btn-secondary-outline" href="{{route('admin.employee')}}">Назад</a>
                        <button class="btn btn-success" name="zacuvaj" value="zacuvaj" type="submit"><i
                                class="fa fa-check"></i> Зачувај</button>
                    </div>
                </div>
            </div>
    </div>
    <input type="hidden" value="{{$user_id}}" name="user_id">
    </form>
</div>
</div>
@stop
@section('scripts')
<script type="text/javascript">
    $(document).ready(function(){
        $(".select2").select2();
        @if($client->type=='правно')
            $(".company").show();
        @endif

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
            }else{
                $("#mkd_gradovi").hide();
                $(".country_other").hide();
                $(".city_other").show();
                $(".postenski").show();
            }
        });

        $("#user_type").on('change',function(){
            var selected_city = $("#user_type :selected").val();
            if(selected_city == 'правно')
                $(".company").show();
            else
                $(".company").hide();
        });
    });
</script>
@stop
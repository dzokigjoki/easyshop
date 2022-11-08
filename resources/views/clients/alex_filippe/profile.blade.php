@extends('clients.alex_filippe.layouts.default')

@section('content')

<main id="authentication" class="inner-bottom-md">
    <div class="container">
        


        <div class="content">
<div class="page-content-inner">
<form method="post" action="{{URL::to('profile/store')}}">
    <div class="portlet light col-md-12">
        <div class="portlet-title">

            <div class="actions btn-set">
                <a class="btn btn-secondary-outline" href="{{route('admin.customers')}}">Назад</a>
                <button class="btn btn-success" name="zacuvaj" value="zacuvaj" type="submit"><i class="fa fa-check"></i> Зачувај</button>
            </div>
        </div>
        <div class="portlet-body">
        {{csrf_field()}}
        <div class="col-md-8 ">
            <div class="form-group col-md-12">
                <label class="col-md-4 control-label">Име:</label>
                <div class="col-md-8 @if($errors->has('first_name')) has-error  @endif">
                    <input type="text" class="form-control" placeholder="Име" name="first_name" value="{{ old('first_name', $client->first_name) }}">
                </div>
            </div>
            <div class="form-group col-md-12">
                <label class="col-md-4 control-label">Презиме:</label>
                <div class="col-md-8 @if($errors->has('last_name')) has-error  @endif">
                    <input type="text" class="form-control" placeholder="Презиме" name="last_name" value="{{ old('last_name', $client->last_name) }}">
                </div>
            </div>  
            <div class="form-group col-md-12">
            <label class="col-md-4 control-label" >Пол:</label>
            <div class="col-md-8">
                <select name="gender" class="form-control select2" name="">
                    <option  @if(isset($client->gender) && $client->gender == 'male') selected @endif value="male">Машко</option>
                    <option  @if(isset($client->gender) && $client->gender == 'female') selected @endif value="female">Женско</option>
                </select>
            </div>
        </div>
        <div class="form-group col-md-12">
            <label class="col-md-4 control-label">Е-пошта:</label>
            <div class="col-md-8  @if($errors->has('email')) has-error  @endif">
                <div class="input-group">
                    <span class="input-group-addon">
                    <i class="fa fa-envelope"></i>
                    </span>
                    <input disabled="" name="email" type="email" class="form-control" placeholder="Е-пошта" value="{{ old('email', $client->email) }}"> </div>
                </div>
            </div>
        <div class="form-group col-md-12">
                <label class="col-md-4 control-label">Телефон:</label>
                <div class="col-md-8 @if($errors->has('phone')) has-error  @endif">
                    <input type="text" class="form-control" placeholder="Телефон" name="phone" value="{{ old('phone', $client->phone) }}">
                </div>
        </div>
        <div class="form-group col-md-12 company" style="@if( (isset($client->type) && $client->type != 'company' ) || !isset($client->type) ) display: none @endif">
                <label class="col-md-4 control-label">Име на компанија:</label>
                <div class="col-md-8  @if($errors->has('company')) has-error  @endif">
                    <input type="text" class="form-control" placeholder="Име на компанијата" name="company" value="{{ old('company', $client->company) }}">
                </div>
        </div>
        <div class="form-group col-md-12 company" style="@if( (isset($client->type) && $client->type != 'company' ) || !isset($client->type) ) display: none @endif">
                <label class="col-md-4 control-label">Даночен број:</label>
                <div class="col-md-8   @if($errors->has('danocen_broj')) has-error  @endif">
                    <input type="text" class="form-control" placeholder="Даночен број" name="danocen_broj" value="{{ old('danocen_broj', $client->danocen_broj) }}">
                </div>
        </div>

        <div class="form-group col-md-12">
            <label class="col-md-4 control-label"> Префериран начин на плаќање:</label>
            <div class="col-md-8">
                <select class="form-control select2" name="nacin_plakanje">
                    <option @if(isset($client->nacin_plakanje) && $client->nacin_plakanje == 'karticka') selected @endif value="karticka">Картичка</option>
                    <option @if(isset($client->nacin_plakanje) && $client->nacin_plakanje == 'faktura') selected @endif value="faktura">Фактура</option> 
                    <option @if(isset($client->nacin_plakanje) && $client->nacin_plakanje == 'gotovo') selected @endif  value="gotovo">Готовина</option>
                </select>
            </div>
        </div>
        <div class="form-group col-md-12">
                <label class="col-md-4 control-label">Веб сајт:</label>
                <div class="col-md-8  @if($errors->has('website')) has-error  @endif">
                    <input type="text" class="form-control" placeholder="Веб сајт" name="website"  value="{{ old('website', $client->website) }}">
                </div>
        </div>
         <div class="form-group col-md-12">
                <p class="col-md-4"></p>
                <p style="text-align: center;font-weight: bold;font-style: italic;" class="col-md-8">Адреса за плаќање:</p>
        </div>

        <div class="form-group col-md-12">
                <label class="col-md-4 control-label">Адреса:</label>
                <div class="col-md-8   @if($errors->has('address')) has-error  @endif">
                    <input type="text" class="form-control" placeholder="Адреса за плаќање" name="address" value="{{ old('address', $client->address) }}">
                </div>
        </div>
        

        <div class="form-group col-md-12">
            <label class="col-md-4 control-label">Држава:</label>
            <div class="col-md-8">
                <select id="country_id" class="form-control select2" name="country_id">
                             
                    @foreach($country as $co)
                        <option  @if(isset($client->country_id) && $client->country_id == $co->id) selected @endif    value="{{$co->id}}">{{$co->country_name}}</option>
                    @endforeach                          
                </select>
            </div>
            </div>
            <div class="country_other form-group col-md-12" style="display:none">
                <label class="col-md-4 control-label">Останати држави:</label>
                <div class="col-md-8 @if($errors->has('country_other')) has-error  @endif">
                    <input type="text" class="form-control" placeholder="Останати држави" name="country_other" value="{{ old('country_other', $client->country_other) }}">
                </div>
            </div>            
            <div id="mkd_gradovi" style="@if($client->country_id != 1) display:none @endif" class="form-group col-md-12">
                <label class="col-md-4 control-label">Град:</label>
                <div class="col-md-8">
                    <select style="width: 100%" id="city_id" class="form-control select2" name="city_id">
                        @foreach($city as $cy)
                            <option @if(isset($client->city_id) && $client->city_id == $cy->id) selected @endif   value="{{$cy->id}}">{{$cy->city_name}}</option>
                        @endforeach 
                    </select>
                </div>
            </div>
            <div class="form-group col-md-12 city_other" style="@if($client->country_id == 1) display:none @endif">
                <label class="col-md-4 control-label">Град:</label>
                <div class="col-md-8 @if($errors->has('city_other')) has-error  @endif">
                    <input id="city_other" type="text" class="form-control" placeholder="Останати градови" name="city_other" value="{{ old('city_other', $client->city_other) }}">
                </div>
            </div>
            
            <div style="@if($client->country_id == 1) display:none @endif" class="postenski form-group col-md-12">
                <label class="col-md-4 control-label">Поштенски код:</label>
                <div class="col-md-8 @if($errors->has('zip_other')) has-error  @endif">
                    <input type="text" class="form-control" placeholder="Поштенски код" name="zip_other" value="{{ old('zip_other', $client->zip_other) }}">
                </div>
            </div>
        <div class="form-group col-md-12">
                <p class="col-md-4"></p>
                <p style="text-align: center;font-weight: bold;font-style: italic;" class="col-md-8">Адреса за испорака:</p>
        </div>
        <div class="form-group col-md-12">
                <label class="col-md-4 control-label">Адреса:</label>
                <div class="col-md-8  @if($errors->has('address_shiping')) has-error  @endif">
                    <input type="text" class="form-control" placeholder="Адреса за испорака" name="address_shiping" value="{{ old('address_shiping', $client->address_shiping) }}">
                </div>
        </div>

         <div class="form-group col-md-12">            
            <label class="col-md-4 control-label">Држава:</label>
            <div class="col-md-8">
                <select id="country_id_shipping" class="form-control select2" name="country_id_shipping">
                             
                    @foreach($country as $co)
                        <option  @if(isset($client->country_id_shipping) && $client->country_id_shipping == $co->id) selected @endif    value="{{$co->id}}">{{$co->country_name}}</option>
                    @endforeach                          
                </select>
            </div>
            </div>
            <div class="country_other_shipping form-group col-md-12" style="display:none">
                <label class="col-md-4 control-label">Останати држави:</label>
                <div class="col-md-8 @if($errors->has('country_other_shipping')) has-error  @endif">
                    <input type="text" class="form-control" placeholder="Останати држави" name="country_other_shipping" value="{{ old('country_other_shipping', $client->country_other_shipping) }}">
                </div>
            </div>            

            <div id="mkd_gradovi_shipping" style="@if($client->country_id_shipping != 1) display:none @endif" class="form-group col-md-12">
                <label class="col-md-4 control-label">Град:</label>
                <div class="col-md-8">
                    <select id="city_id_shipping" class="form-control select2" style="width:100%;" name="city_id_shipping">
                        @foreach($city as $cy)
                            <option @if(isset($client->city_id_shipping) && $client->city_id_shipping == $cy->id) selected @endif   value="{{$cy->id}}">{{$cy->city_name}}</option>
                        @endforeach 
                    </select>
                </div>
            </div>
            <div class="form-group col-md-12 city_other_shipping" style="@if($client->country_id_shipping == 1) display:none @endif">
                <label class="col-md-4 control-label">Град:</label>
                <div class="col-md-8 @if($errors->has('city_other_shipping')) has-error  @endif">
                    <input id="city_other_shipping" type="text" class="form-control" placeholder="Останати градови" name="city_other_shipping" value="{{ old('city_other_shipping', $client->city_other_shipping) }}">
                </div>
            </div>
            
            <div style="@if($client->country_id_shipping == 1) display:none @endif" class="postenski_shipping form-group col-md-12">
                <label class="col-md-4 control-label">Поштенски код:</label>
                <div class="col-md-8 @if($errors->has('zip_other_shipping')) has-error  @endif">
                    <input type="text" class="form-control" placeholder="Поштенски код" name="zip_other_shipping" value="{{ old('zip_other_shipping', $client->zip_other_shipping) }}">
                </div>
            </div>

        </div>
        <div class="col-md-12" style="border-top: 1px solid #eee;border-radius: 2px 2px 0 0; margin-bottom: 10px;padding-top:12px;text-align:right">    
            <div class="actions btn-set">
                <a class="btn btn-secondary-outline" href="{{route('admin.customers')}}">Назад</a>
                <button class="btn btn-success" name="zacuvaj" value="zacuvaj" type="submit"><i class="fa fa-check"></i> Зачувај</button>
            </div>
        </div>
    </div>
</div>

</form>
</div>
</div>

    </div><!-- /.container -->
</main><!-- /.authentication -->

@stop
@section('scripts')
<script src="/assets/admin/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
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

        $("#city_id_shipping").on('change',function(){
            var selected_city = $("#city_id_shipping :selected").val();
            
            if(selected_city == '35')
            {
                $(".city_other_shipping").show();
                $(".postenski_shipping").show();
            }else{
                $(".city_other_shipping").hide();
                $(".postenski_shipping").hide();
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

        $("#country_id_shipping").on('change',function(){
            var selected_country = $("#country_id_shipping :selected").val();
            if(selected_country == '62')
            {   
                $("#mkd_gradovi_shipping").hide();
                $(".country_other_shipping").show();
                $(".city_other_shipping").show();
                $(".postenski_shipping").show();
            }else if(selected_country == '1'){
                $("#mkd_gradovi_shipping").show();
                $(".country_other_shipping").hide();
                $(".city_other_shipping").hide();
                $(".postenski_shipping").hide();
            }else{
                $("#mkd_gradovi_shipping").hide();
                $(".country_other_shipping").hide();
                $(".city_other_shipping").show();
                $(".postenski_shipping").show();
            }
        });

        $("#user_type").on('change',function(){
            var user_type = $("#user_type :selected").val();
            if(user_type == 'company')
                $(".company").show();
            else
                $(".company").hide();
        });
    });
</script>
@stop
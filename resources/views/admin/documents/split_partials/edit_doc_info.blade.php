@if (!isset($hide_docinfo))
    <div class="col-md-6 col-sm-12">
        <div class="portlet blue-hoki box">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-file-text-o"></i>
                    Податоци за клиентот <?php $json = json_decode($document_data->document_json); ?>
                </div>
                <div class="actions">
                    <a href="javascript:;" id="promeni" class="btn btn-default btn-sm">
                        <i class="fa fa-pencil"></i>
                        Промени
                    </a>
                </div>
            </div>
            <div class="portlet-body">
                <div id="new_display" style="display:none" class="row static-info">
                <form action="{{URL::to('admin/document/store/userdata')}}" method="post" class="form-horizontal">
                    {{csrf_field()}}
                    <input type="hidden" name="document_type_userdata" value="{{$document_type}}">
                    <input type="hidden" name="document_id_userdata" value="{{$document_id}}">

        {{--Promeni klient--}}
        <div class="form-group col-md-12">
            <label class="col-md-4 control-label name">Промени клиент: </label>
            <div class="col-md-8 value">
                <select name="show_cost" id="show_cost" style="width:100%;" class="select2 form-control">
                    @foreach($companies as $co)
                        <option @if($co->id == $company->id) selected @endif
                        value="{{$co->id}}">{{$co->company_name}}{{$co->first_name}}
                            {{$co->last_name}} </option>
                    @endforeach
                </select>
            </div>
        </div>
@if($document_data->type != "priemnica")
        {{-- ime klient --}}
        <div class="form-group col-md-12">
            <div class="col-md-4"></div>
            <div class="col-md-8 text-right"><strong> Име клиент:</strong></div>
        </div>

        {{-- ime --}}
        <div class="form-group col-md-12">
            <label class="col-md-4 control-label">Име:</label>
            <div class="col-md-8   @if($errors->has('address')) has-error  @endif">
                <input type="text" class="form-control" placeholder="Име" name="first_name" value="{{ old('first_name', $json->userBilling->first_name) }}" />
            </div>
        </div>

        {{-- prezime --}}
        <div class="form-group col-md-12">
            <label class="col-md-4 control-label">Презиме:</label>
            <div class="col-md-8   @if($errors->has('address')) has-error  @endif">
                <input type="text" class="form-control" placeholder="Презиме" name="last_name" value="{{ old('last_name', $json->userBilling->last_name) }}" />
            </div>
        </div>
@endif


        {{-- Adresa za plakjanje --}}
        <div class="form-group col-md-12">
            <div class="col-md-4"></div>
            <div class="col-md-8 text-right"><strong>Адреса за плаќање:</strong></div>
        </div>

        {{-- Adresa --}}
        <div class="form-group col-md-12">
            <label class="col-md-4 control-label">Адреса:</label>
            <div class="col-md-8   @if($errors->has('address')) has-error  @endif">
                <input type="text" class="form-control" placeholder="Адреса за плаќање" name="address" value="{{ old('address', $json->userBilling->address) }}" />
            </div>
        </div>
        
        {{-- Drzava --}}
        <div class="form-group col-md-12">
            <label class="col-md-4 control-label">Држава:</label>
            <div class="col-md-8">
                <select id="country_id" class="form-control select2"  style="width:100%;" name="country_id">
                    @foreach($country as $co)
                        <option  @if(isset($json->userBilling->country_id) && $json->userBilling->country_id == $co->id) selected @endif    value="{{$co->id}}">
                            @if(config( 'app.client') == 'naturatherapyshop_al')    
                            {{ $co->country_name_en }}
                            @else
                            {{$co->country_name}}
                            @endif
                        </option>
                    @endforeach                          
                </select>
            </div>
            </div>
            <div class="country_other form-group col-md-12" style="display:none">
                <label class="col-md-4 control-label">Останати држави:</label>
                <div class="col-md-8 @if($errors->has('country_other')) has-error  @endif">
                    <input type="text" class="form-control" placeholder="Останати држави" name="country_other" value="{{ old('country_other', $json->userBilling->country_other) }}">
                </div>
            </div>            
            <div id="mkd_gradovi" style="@if($json->userBilling->country_id != 1) display:none @endif" class="form-group col-md-12">
                <label class="col-md-4 control-label">Град:</label>
                <div class="col-md-8">
                    <select id="city_id" class="form-control select2" style="width:100%;" name="city_id">
                        @foreach($city as $cy)
                            <option @if(isset($json->userBilling->city_id) && $json->userBilling->city_id == $cy->id) selected @endif   value="{{$cy->id}}">{{$cy->city_name}}</option>
                        @endforeach 
                    </select>
                </div>
            </div>
            <div class="form-group col-md-12 city_other" style="@if($json->userBilling->country_id == 1) display:none @endif">
                <label class="col-md-4 control-label">Град:</label>
                <div class="col-md-8 @if($errors->has('city_other')) has-error  @endif">
                    <input id="city_other" type="text" class="form-control" placeholder="Останати градови" name="city_other" value="{{ old('city_other', $json->userBilling->city_other) }}">
                </div>
            </div>
            
            <div style="@if($json->userBilling->country_id == 1) display:none @endif" class="postenski form-group col-md-12">
                <label class="col-md-4 control-label">Поштенски код:</label>
                <div class="col-md-8 @if($errors->has('zip_other')) has-error  @endif">
                    <input type="text" class="form-control" placeholder="Поштенски код" name="zip_other" value="{{ old('zip_other', $json->userBilling->zip_other) }}">
                </div>
            </div>

            {{-- Adresa za isporaka --}}
            <div class="form-group col-md-12">
                    <div class="col-md-4"></div>
                    <div class="col-md-8 text-right"><strong>Адреса за испорака:</strong></div>
            </div>

            {{-- Adresa --}}
            <div class="form-group col-md-12">
                    <label class="col-md-4 control-label">Адреса:</label>
                    <div class="col-md-8  @if($errors->has('address_shiping')) has-error  @endif">
                        <input type="text" class="form-control" placeholder="Адреса за испорака" name="address_shiping" value="{{ old('address_shiping', $json->userShipping->address_shiping) }}">
                    </div>
            </div>

         <div class="form-group col-md-12">            
            <label class="col-md-4 control-label">Држава:</label>
            <div class="col-md-8">
                <select id="country_id_shipping" style="width:100%;" class="form-control select2" name="country_id_shipping">
                             
                    @foreach($country as $co)
                        <option  @if(isset($json->userShipping->country_id_shipping) && $json->userShipping->country_id_shipping == $co->id) selected @endif    value="{{$co->id}}">
                        @if(config( 'app.client') == 'naturatherapyshop_al')    
                        {{ $co->country_name_en }}
                        @else
                        {{$co->country_name}}
                        @endif
                        </option>
                    @endforeach                          
                </select>
            </div>
            </div>
            <div class="country_other_shipping form-group col-md-12" style="display:none">
                <label class="col-md-4 control-label">Останати држави:</label>
                <div class="col-md-8 @if($errors->has('country_other_shipping')) has-error  @endif">
                    <input type="text" class="form-control" placeholder="Останати држави" name="country_other_shipping" value="{{ old('country_other_shipping', $json->userShipping->country_other_shipping) }}">
                </div>
            </div>            
            <div id="mkd_gradovi_shipping" style="@if(isset( $json->userShipping->country_shipping_id) && $json->userShipping->country_shipping_id != 1) display:none @endif" class="form-group col-md-12">
                <label class="col-md-4 control-label">Град:</label>
                <div class="col-md-8">
                    <select id="city_id_shipping" class="form-control select2" style="width:100%;" name="city_id_shipping">
                        @foreach($city as $cy)
                            <option @if(isset($json->userShipping->city_id_shipping) && $json->userShipping->city_id_shipping == $cy->id) selected @endif   value="{{$cy->id}}">{{$cy->city_name}}</option>
                        @endforeach 
                    </select>
                </div>
            </div>
            <div class="form-group col-md-12 city_other_shipping" style="@if(!isset( $json->userShipping->country_shipping_id) || $json->userShipping->country_shipping_id == 1) display:none @endif">
                <label class="col-md-4 control-label">Град:</label>
                <div class="col-md-8 @if($errors->has('city_other_shipping')) has-error  @endif">
                    <input id="city_other_shipping" type="text" class="form-control" placeholder="Останати градови" name="city_other_shipping" value="{{ old('city_other_shipping', $json->userShipping->city_other_shipping) }}">
                </div>
            </div>
        



            <?php
            if(!isset($json->userShipping->municipality_shipping)){
                $json->userShipping->municipality_shipping = '';
            }
             ?>
            <div style="@if((config( 'app.client') != ('dobra_voda' || 'naturatherapy'))) display:none @endif" class="postenski_shipping form-group col-md-12">
                <label class="col-md-4 control-label">Населба:</label>
                <div class="col-md-8 @if($errors->has('municipality_shipping')) has-error  @endif">
                    <input type="text" class="form-control" placeholder="Населба" name="municipality_shipping" value="{{ old('municipality_shipping', $json->userShipping->municipality_shipping) }}">
                </div>
            </div>

            
            
            <div style="@if(!isset($json->userShipping->country_id_shipping) || $json->userShipping->country_id_shipping == 1) display:none @endif" class="postenski_shipping form-group col-md-12">
                <label class="col-md-4 control-label">Поштенски код:</label>
                <div class="col-md-8 @if($errors->has('zip_other_shipping')) has-error  @endif">
                    <input type="text" class="form-control" placeholder="Поштенски код" name="zip_other_shipping" value="{{ old('zip_other_shipping', $json->userShipping->zip_other_shipping) }}">
                </div>
            </div>
            <div class="form-group col-md-12">
                <label class="col-md-4 control-label">Телефон:</label>
                <div class="col-md-8   @if($errors->has('phone')) has-error  @endif">
                    <input type="text" class="form-control" placeholder="Телефон" name="phone" value="{{ old('phone', $json->userBilling->phone) }}">
                </div>
        </div>
        <div class="form-group col-md-12" style="margin-bottom:10px;">
            <div class="col-md-4"></div>
            <div class="col-md-8">
                <input type="submit" class="btn green-meadow" name="update" value="Промени">
            </div>
        </div>
        </form>
        </div>

                <div class="row static-info">
                    <div class="col-md-5 name"> Име: </div>
                    <div class="col-md-7 value">
                        @if(isset($json->userBilling->company_name))
                            {{$json->userBilling->company_name}}
                        @endif
                        @if(isset($json->userBilling->first_name))
                            {{$json->userBilling->first_name}}
                        @endif
                        @if(isset($json->userBilling->last_name))
                            {{$json->userBilling->last_name }}
                        @endif
                    </div>
                </div>
                <div class="row static-info">
                    <div class="col-md-5 name"> Е-Пошта: </div>
                    <div class="col-md-7 value"> 
                    @if(isset($json->userBilling->email))
                        {{$json->userBilling->email}} 
                    @endif
                    </div>
                </div>
                <div class="row static-info">
                    <div class="col-md-5 name"> Адреса: </div>
                    <div class="col-md-7 value">
                     @if(isset($json->userBilling->address))
                        {{$json->userBilling->address}} 
                    @endif                    
                    </div>
                </div>
                <div class="row static-info">
                    <div class="col-md-5 name"> Телефонски број: </div>
                    <div class="col-md-7 value"> {{$json->userBilling->phone}} </div>
                </div>
                @if(isset($company->cenovna_grupa))
                    <?php
                    $cenovna_grupa = ['price_retail_1' => 'Малопродажна 1','price_retail_2' => 'Малопродажна 2','price_wholesale_1' => 'Големопродажна 1','price_wholesale_2' => 'Големопродажна 2','price_wholesale_3' => 'Големопродажна 3'];
                    ?>
                    @if(isset($cenovna_grupa[$company->cenovna_grupa]))
                    <div class="row static-info">
                        <div class="col-md-5 name"> Ценовна група: </div>
                        <div class="col-md-7 value">
                            {{$cenovna_grupa[$company->cenovna_grupa]}}
                        </div>
                    </div>
                    @endif
                @endif
    <div class="row static-info">
        </div>

            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="well">
            <div class="row static-info align-reverse">
                <div class="col-md-8 name"> Вкупно без ДДВ </div>
                <div class="col-md-4 value"> <span id="no_ddv"></span> <span class="document_curr">{{$document_data->currency}}</span></div>
            </div>
            <div class="row static-info align-reverse">
                <div class="col-md-8 name"> ДДВ: </div>
                <div class="col-md-4 value"> <span id="just_ddv"></span> <span class="document_curr">{{$document_data->currency}}</span></div>
            </div>
            
            @if($document_data->type_delivery)
             <div class="row static-info align-reverse">
                <div class="col-md-8 name"> Вкупно со ДДВ </div>
                <div class="col-md-4 value"> <span id="with_ddv"></span> <span class="with_ddv_sum">{{$document_data->currency}}</span></div>
            </div>
             <div class="row static-info align-reverse">
                <div class="col-md-8 name"> Достава: </div>
                <div class="col-md-4 value"> <span id="delivery_sum"></span> <span class="delivery_sum_value">{{$document_data->price_delivery}}</span></div>
            </div>
            <hr>
            @else
            <hr>
            @endif            
            <div class="row static-info align-reverse">
                <div class="col-md-8 name"> Вкупно: </div>
                <div class="col-md-4 value"> <span id="total_price"></span> <span class="document_curr">{{$document_data->currency}}</span></div>
            </div>
        </div>
    </div>
@endif
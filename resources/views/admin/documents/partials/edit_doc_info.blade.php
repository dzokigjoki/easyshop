@if (!isset($hide_docinfo))
    <div class="col-md-6 col-sm-12">
        <div class="portlet blue-hoki box">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-file-text-o"></i>
                    Податоци за клиентот <?php $json = json_decode($document_data->document_json);?>
                </div>
                @if ($document_data->status == 'podgotovka')
                    <div class="actions">
                        <a href="javascript:;" id="promeni" class="btn btn-default btn-sm">
                            <i class="fa fa-pencil"></i>
                            Промени
                        </a>
                    </div>
                @endif
            </div>
            <div class="portlet-body">
                <div id="new_display" style="display:none" class="row static-info">
                    <form id="client_information_form" action="{{ URL::to('admin/document/store/userdata') }}"
                        method="post" class="form-horizontal">
                        {{ csrf_field() }}
                        <input class="notranslate" type="hidden" name="document_type_userdata" value="{{ $document_type }}">
                        <input class="notranslate" type="hidden" name="document_id_userdata" value="{{ $document_id }}">

                        {{-- Promeni klient --}}
                        <div class="form-group col-md-12">
                            <label class="col-md-4 control-label name">Промени клиент: </label>
                            <div class="col-md-8 value notranslate">
                                <select name="show_cost" id="show_cost" style="width:100%;"
                                    class="select2 form-control">
                                    @if(config('app.client') == EasyShop\Models\Settings::CLIENT_NATURATHERAPYSHOP)
                                        {{-- {{$userId = auth()->user()->id}}
                                        @foreach ($companies as $co)
                                        @if(auth()->user()->canDo('admin'))
                                            <option @if ($co->id == $company->id) selected @endif value="{{ $co->id }}">
                                                {{ $co->company_name }}{{ $co->first_name }}
                                                {{ $co->last_name }} </option>
                                        @elseif($co->created_by == $userId || $co->created_by == null)
                                            <option @if ($co->id == $company->id) selected @endif value="{{ $co->id }}">
                                                {{ $co->company_name }}{{ $co->first_name }}
                                                {{ $co->last_name }} </option>
                                        @endif
                                        @endforeach --}}
                                    @else
                                        @foreach ($companies as $co)
                                            <option @if ($co->id == $company->id) selected @endif value="{{ $co->id }}">
                                                {{ $co->company_name }}{{ $co->first_name }}
                                                {{ $co->last_name }} </option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        
                        @if(config('app.client') == EasyShop\Models\Settings::CLIENT_NATURATHERAPYSHOP)
                        <?php $loyalty_code = EasyShop\Services\LoyaltyService::getUserLoyaltyCodeByPhone($json->userBilling->phone)
                        ?>
                        <div class="form-group col-md-12">
                            <label class="col-md-4 control-label">Лојалти шифра:</label>
                            <div class="col-md-8 notranslate @if ($errors->has('loyalty_code')) has-error @endif">
                                <input id="loyalty_code" type="text" class="form-control" placeholder="Лојалти шифра"
                                    name="loyalty_code"
                                    value="{{old('loyalty_code', $loyalty_code)}}">
                            </div>
                        </div>
                        @endif
                        @if ($document_data->type != 'priemnica')
                            {{-- ime klient --}}
                            <div class="form-group col-md-12">
                                <div class="col-md-4"></div>
                                <div class="col-md-8 text-right"><strong> Основни информации:</strong></div>
                            </div>

                            {{-- ime --}}
                            <div class="form-group col-md-12">
                                <label class="col-md-4 control-label">Име:</label>
                                <div class="col-md-8 notranslate @if ($errors->has('address')) has-error @endif">
                                    <input type="text" class="form-control" required placeholder="Име"
                                        name="first_name"
                                        value="{{ old('first_name', $json->userBilling->first_name) }}" />
                                </div>
                            </div>

                            {{-- prezime --}}
                            <div class="form-group col-md-12">
                                <label class="col-md-4 control-label">Презиме:</label>
                                <div class="col-md-8 notranslate @if ($errors->has('address')) has-error @endif">
                                    <input type="text" class="form-control" required placeholder="Презиме"
                                        name="last_name"
                                        value="{{ old('last_name', $json->userBilling->last_name) }}" />
                                </div>
                            </div>
                            {{-- emejl --}}
                            <div class="form-group col-md-12">
                                <label class="col-md-4 control-label">Е-пошта:</label>
                                <div class="col-md-8 notranslate @if ($errors->has('address')) has-error @endif">
                                    <input type="email" class="form-control" @if (in_array(config('app.client'), \EasyShop\Models\Settings::CLIENT_NATURATHERAPY_SHOPS)) @else required @endif
                                        placeholder="Е-пошта" name="email"
                                        value="{{ old('email', $json->userBilling->email) }}" />
                                </div>
                            </div>

                            <div class="form-group col-md-12">
                                <label class="col-md-4 control-label">Датум на раѓање:</label>
                                <div class="col-md-8 notranslate @if ($errors->has('address')) has-error @endif">
                                    <div class="input-group input-medium date-picker input-daterange"
                                        data-date="10.11.2012" data-date-format="dd.mm.yyyy" data-date-week-start="1">
                                        <input type="text" class="form-control" id="birthdate" name="birthdate"
                                            @if (isset($json->userBilling->birthdate)) value="{{ $json->userBilling->birthdate }}" @else value="{{ date('d.m.Y') }}" @endif style="text-align:left;">
                                    </div>
                                </div>
                            </div>

                            <?php $veroispovest = ['Исламска', 'Православна', 'Еврејска', 'Католичка', 'Протестантска']; ?>
                            <div class="form-group col-md-12">
                                <label class="col-md-4 control-label">Вероисповест:</label>
                                <div class="col-md-8   @if ($errors->has('veroispovest')) has-error @endif">

                                    <select name="veroispovest" id="veroispovest" style="width:100%;"
                                        class="select2 form-control notranslate">

                                        @if (!isset($json->userBilling->veroispovest))
                                            <option value="" disabled selected>Избери</option>
                                        @endif
                                        @foreach ($veroispovest as $v)
                                            <option @if (isset($json->userBilling->veroispovest) && $json->userBilling->veroispovest == $v) selected @endif value="{{ $v }}">
                                                {{ $v }}</option>
                                        @endforeach
                                    </select>
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
                            <div class="col-md-8   @if ($errors->has('address')) has-error @endif">
                                <input type="text" class="form-control notranslate" placeholder="Адреса за плаќање" name="address"
                                    value="{{ old('address', $json->userBilling->address) }}" />
                            </div>
                        </div>
                        {{-- Drzava --}}
                        <div class="form-group col-md-12">
                            <label class="col-md-4 control-label">Држава:</label>
                            <div class="col-md-8 notranslate">
                                <select id="country_id" class="form-control select2" style="width:100%;"
                                    name="country_id">
                                    <?php $selectedCountry = null; ?>
                                    @foreach ($country as $co)
                                        <option @if (isset($json->userBilling->country_id) && $json->userBilling->country_id == $co->id) selected {{$selectedCountry = $co->id}} 
                                            @elseif (config( 'app.client') == EasyShop\Models\Settings::CLIENT_NATURATHERAPYSHOP_ALB && $co->id == 2) selected {{$selectedCountry = $co->id}}
                                            @elseif(config( 'app.client') == EasyShop\Models\Settings::CLIENT_NATURATHERAPYSHOP_AL && $co->id == 26) selected {{$selectedCountry = $co->id}} @endif 
                                            value="{{ $co->id }}">
                                            @if (config( 'app.client') == 'naturatherapyshop_al')
                                                {{ $co->country_name_en }}
                                            @else
                                                {{ $co->country_name }}
                                            @endif
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="country_other form-group col-md-12" style="display:none">
                            <label class="col-md-4 control-label">Останати држави:</label>
                            <div class="col-md-8 notranslate @if ($errors->has('country_other')) has-error @endif">
                                <input type="text" class="form-control" placeholder="Останати држави"
                                    name="country_other"
                                    value="{{ old('country_other', $json->userBilling->country_other) }}">
                            </div>
                        </div>
                        <div id="mkd_gradovi" style="@if ($selectedCountry != 1) display:none @endif" class="form-group col-md-12">
                            <label class="col-md-4 control-label">Град:</label>
                            <div class="col-md-8">
                                <select id="city_id" class="form-control select2 notranslate" style="width:100%;" name="city_id">
                                    @foreach ($city as $cy)
                                        <option @if (isset($json->userBilling->city_id) && $json->userBilling->city_id == $cy->id) selected @endif value="{{ $cy->id }}">
                                            {{ $cy->city_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-md-12 city_other" style="@if ($selectedCountry == 1) display:none @endif">
                            <label class="col-md-4 control-label">Град:</label>
                            <div class="col-md-8 notranslate @if ($errors->has('city_other')) has-error @endif">
                                <input id="city_other" type="text" class="form-control" placeholder="@if(config('app.client') == EasyShop\Models\Settings::CLIENT_NATURATHERAPYSHOP_AL || config('app.client') == EasyShop\Models\Settings::CLIENT_NATURATHERAPYSHOP_ALB) Qytetet e tjera @else Останати градови @endif"
                                    name="city_other"
                                    value="{{ old('city_other', $json->userBilling->city_other) }}">
                            </div>
                        </div>

                        <div style="@if ($json->userBilling->country_id == 1) display:none @endif" class="postenski form-group col-md-12">
                            <label class="col-md-4 control-label">Поштенски код:</label>
                            <div class="col-md-8 notranslate @if ($errors->has('zip_other')) has-error @endif">
                                <input type="text" class="form-control" placeholder="@if(config('app.client') == EasyShop\Models\Settings::CLIENT_NATURATHERAPYSHOP_AL || config('app.client') == EasyShop\Models\Settings::CLIENT_NATURATHERAPYSHOP_ALB) Kodi Postar @else Поштенски код @endif" name="zip_other"
                                    value="{{ old('zip_other', $json->userBilling->zip_other) }}">
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
                            <div class="col-md-8 notranslate @if ($errors->has('address_shiping')) has-error @endif">
                                <input type="text" class="form-control" required placeholder="Адреса за испорака"
                                    name="address_shiping"
                                    value="{{ old('address_shiping', $json->userShipping->address_shiping) }}">
                            </div>
                        </div>
                        <?php $selectedCountry2 = $selectedCountry; ?>
                        <div class="form-group col-md-12">
                            <label class="col-md-4 control-label">Држава:</label>
                            <div class="col-md-8">
                                <select id="country_id_shipping" style="width:100%;" class="form-control select2 notranslate"
                                    name="country_id_shipping">
                                    @foreach ($country as $co)
                                        <option @if (isset($json->userShipping->country_id_shipping) && $json->userShipping->country_id_shipping == $co->id) selected {{$selectedCountry2 = $co->id}}
                                            @elseif (config( 'app.client') == EasyShop\Models\Settings::CLIENT_NATURATHERAPYSHOP_ALB && $co->id == 2) selected {{$selectedCountry2 = $co->id}}
                                            @elseif(config( 'app.client') == EasyShop\Models\Settings::CLIENT_NATURATHERAPYSHOP_AL && $co->id == 26) selected {{$selectedCountry2 = $co->id}}
                                            @endif value="{{ $co->id }}">
                                            @if (config( 'app.client') == 'naturatherapyshop_al')
                                                {{ $co->country_name_en }}
                                            @else
                                                {{ $co->country_name }}
                                            @endif
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="country_other_shipping form-group col-md-12" style="display:none">
                            <label class="col-md-4 control-label">Останати држави:</label>
                            <div class="col-md-8 notranslate @if ($errors->has('country_other_shipping')) has-error @endif">
                                <input type="text" class="form-control" placeholder="Останати држави"
                                    name="country_other_shipping"
                                    value="{{ old('country_other_shipping', $json->userShipping->country_other_shipping) }}">
                            </div>
                        </div>

                        <div id="mkd_gradovi_shipping" style="@if ($selectedCountry2 != 1) display:none @endif" class="form-group col-md-12">
                            <label class="col-md-4 control-label">Град:</label>
                            <div class="col-md-8">
                                <select id="city_id_shipping" class="form-control select2 notranslate" style="width:100%;"
                                    name="city_id_shipping">
                                    @foreach ($city as $cy)
                                        <option @if (isset($json->userShipping->city_id_shipping) && $json->userShipping->city_id_shipping == $cy->id) selected @endif value="{{ $cy->id }}">
                                            {{ $cy->city_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-md-12 city_other_shipping" @if($selectedCountry2 == 1)style="display:none"@endif>
                            <label class="col-md-4 control-label">Град:</label>
                            <div class="col-md-8 notranslate @if ($errors->has('city_other_shipping')) has-error @endif">
                                <input id="city_other_shipping" type="text" class="form-control"
                                    placeholder="@if(config('app.client') == EasyShop\Models\Settings::CLIENT_NATURATHERAPYSHOP_AL || config('app.client') == EasyShop\Models\Settings::CLIENT_NATURATHERAPYSHOP_ALB) Qytetet e tjera @else Останати градови @endif" name="city_other_shipping"
                                    value="{{ old('city_other_shipping', $json->userShipping->city_other_shipping) }}">
                            </div>
                        </div>
                        <div @if($selectedCountry2 == 1)style="display:none"@endif class="postenski_shipping form-group col-md-12">
                            <label class="col-md-4 control-label">Поштенски код:</label>
                            <div class="col-md-8 notranslate @if ($errors->has('zip_other_shipping')) has-error @endif">
                                <input type="text" class="form-control" placeholder="@if(config('app.client') == EasyShop\Models\Settings::CLIENT_NATURATHERAPYSHOP_AL || config('app.client') == EasyShop\Models\Settings::CLIENT_NATURATHERAPYSHOP_ALB) Kodi Postar @else Поштенски код @endif"
                                    name="zip_other_shipping"
                                    value="{{ old('zip_other_shipping', $json->userShipping->zip_other_shipping) }}">
                            </div>
                        </div>
                        <?php if (!isset($json->userShipping->municipality_shipping)) {
                            $json->userShipping->municipality_shipping = '';
                        } ?>
                        <div style="@if (config( 'app.client') != ('dobra_voda' || 'naturatherapy')) display:none @endif" class="postenski_shipping form-group col-md-12">
                            <label class="col-md-4 control-label">Населба:</label>
                            <div class="col-md-8 notranslate @if ($errors->has('municipality_shipping')) has-error @endif">
                                <input type="text" class="form-control" placeholder="@if(config('app.client') == EasyShop\Models\Settings::CLIENT_NATURATHERAPYSHOP_AL || config('app.client') == EasyShop\Models\Settings::CLIENT_NATURATHERAPYSHOP_ALB) Vendbanimi @else Населба @endif"
                                    name="municipality_shipping"
                                    value="{{ old('municipality_shipping', $json->userShipping->municipality_shipping) }}">
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <label class="col-md-4 control-label">Телефон:</label>
                            <div class="col-md-8 notranslate @if ($errors->has('phone')) has-error @endif">
                                <input type="text" class="form-control" placeholder="@if(config('app.client') == EasyShop\Models\Settings::CLIENT_NATURATHERAPYSHOP_AL || config('app.client') == EasyShop\Models\Settings::CLIENT_NATURATHERAPYSHOP_ALB) Telefoni @else Телефон @endif" required name="phone"
                                    value="{{ old('phone', $json->userBilling->phone) }}">
                            </div>
                        </div>


                        @if (config( 'app.client') == 'naturatherapyshop')

                            <div class="form-group col-md-12">
                                <label class="col-md-4 control-label">Телефон 2:</label>
                                <div class="col-md-8 notranslate @if ($errors->has('phone2')) has-error @endif">
                                    <input type="text" class="form-control" placeholder="Телефон 2"
                                        name="phone2" @if(isset($json->userBilling->phone2)) value="{{ old('phone2', $json->userBilling->phone2) }}"@endif>
                                </div>
                            </div>
                        @endif

                        <div class="form-group col-md-12">
                            <div class="col-md-4"></div>
                            <div class="col-md-8 text-right"><strong>Останато:</strong></div>
                        </div>


                        <div class="form-group col-md-12" style="margin-bottom:10px;">
                            <div class="col-md-4"></div>
                            <div class="col-md-8">
                                <input id="SubmitBtn" type="submit" class="btn green-meadow notranslate" name="update" value="Зачувај">
                            </div>
                        </div>
                    </form>
                </div>

                <div class="row info_reset_inputs static-info">
                    <div class="col-md-5 name"> Име: </div>
                    <div class="col-md-7 value notranslate">
                        {{-- @if (isset($json->userBilling->company_name) && !empty($json->userBilling->company_name))
                            {{$json->userBilling->company_name}}
                        @else --}}
                        @if (isset($json->userBilling->first_name))
                            {{ $json->userBilling->first_name }}
                        @endif
                        @if (isset($json->userBilling->last_name))
                            {{ $json->userBilling->last_name }}
                        @endif
                        {{-- @endif --}}
                    </div>
                </div>
                <div class="row info_reset_inputs static-info">
                    <div class="col-md-5 name"> Е-Пошта: </div>
                    <div class="col-md-7 value notranslate">

                        @if (isset($json->userBilling->email))
                            {{ $json->userBilling->email }}
                        @endif
                    </div>
                </div>
                @if(config('app.client') == EasyShop\Models\Settings::CLIENT_NATURATHERAPYSHOP)
                <div class="row info_reset_inputs static-info">
                    <?php $loyalty_code = EasyShop\Services\LoyaltyService::getUserLoyaltyCodeByPhone($json->userBilling->phone)
                    ?>
                    <div class="col-md-5 name"> Лојалти шифра: </div>
                    <div class="col-md-7 value notranslate" id="LoyaltyCode">
                        {{$loyalty_code}}
                    </div>
                </div>
                @endif
                <div class="row info_reset_inputs static-info">
                    <div class="col-md-5 name"> Адреса: </div>
                    <div class="col-md-7 value notranslate">
                        @if (isset($json->userBilling->address))
                            {{ $json->userBilling->address }}
                        @endif
                    </div>
                </div>
                <div class="row info_reset_inputs static-info">
                    <div class="col-md-5 name"> Град: </div>
                    <div class="col-md-7 value notranslate">
                        @if (isset($json->userBilling->city_id) && $json->userBilling->country_id == 1)
                            {{ $city_mk[$json->userBilling->city_id] }}
                        @else
                            {{ $json->userBilling->city_other }}
                        @endif
                    </div>
                </div>
                <div class="row info_reset_inputs static-info">
                    <div class="col-md-5 name"> Поштенски број: </div>
                    <div class="col-md-7 value notranslate">
                        @if (isset($json->userBilling->country_id) && $json->userBilling->country_id == 1)
                            {{ $city_mk_zip[$json->userBilling->city_id] }}
                        @else
                            {{ $json->userBilling->zip_other }}
                        @endif
                    </div>
                </div>
                <div class="row info_reset_inputs static-info">
                    <div class="col-md-5 name"> Телефонски број: </div>
                    <div class="col-md-7 value notranslate"> {{ $json->userBilling->phone }} </div>
                </div>
                @if (isset($json->userBilling->phone2))
                    <div class="row info_reset_inputs static-info">
                        <div class="col-md-5 name"> Телефонски број 2: </div>
                        <div class="col-md-7 value notranslate"> {{ $json->userBilling->phone2 }} </div>
                    </div>
                @endif
                @if (isset($company->cenovna_grupa))
                    <?php $cenovna_grupa = [
                        'price_retail_1' => 'Малопродажна 1',
                        'price_retail_2' => 'Малопродажна 2',
                        'price_wholesale_1' => 'Големопродажна 1',
                        'price_wholesale_2' => 'Големопродажна
                                                            2',
                        'price_wholesale_3' => 'Големопродажна 3',
                    ]; ?>
                    @if (isset($cenovna_grupa[$company->cenovna_grupa]))
                        <div class="row static-info">
                            <div class="col-md-5 name"> Ценовна група: </div>
                            <div class="col-md-7 value notranslate">
                                {{ $cenovna_grupa[$company->cenovna_grupa] }}
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
            @if ((in_array(config('app.client'), \EasyShop\Models\Settings::CLIENT_NATURATHERAPY_KSMK)) && $document_type === \EasyShop\Models\Document::TYPE_NARACHKA)
                <div class="row static-info align-reverse">
                    <div class="col-md-8 name"> Основица со ДДВ ( 18% ) </div>
                    <div class="col-md-4 value"> <span id="no_ddv_18"></span> <span
                            class="document_curr">{{ $document_data->currency }}</span></div>
                </div>
                <div class="row static-info align-reverse">
                    <div class="col-md-8 name"> Основица со ДДВ ( 5% ) </div>
                    <div class="col-md-4 value"> <span id="no_ddv_5"></span> <span
                            class="document_curr">{{ $document_data->currency }}</span></div>
                </div>
                <div class="row static-info align-reverse">
                    <div class="col-md-8 name"> Основица со ДДВ </div>
                    <div class="col-md-4 value"> <span id="no_ddv_sum"></span> <span
                            class="document_curr">{{ $document_data->currency }}</span></div>
                </div>
                <div class="row static-info align-reverse">
                    <div class="col-md-8 name"> ДДВ (5%) </div>
                    <div class="col-md-4 value"> <span id="ddv_5"></span> <span
                            class="document_curr">{{ $document_data->currency }}</span></div>
                </div>
                <div class="row static-info align-reverse">
                    <div class="col-md-8 name"> ДДВ (18%) </div>
                    <div class="col-md-4 value"> <span id="ddv_18"></span> <span
                            class="document_curr">{{ $document_data->currency }}</span></div>
                </div>
                <div class="row static-info align-reverse">
                    <div class="col-md-8 name"> ДДВ вредност на нарачката </div>
                    <div class="col-md-4 value"> <span id="ddv_sum"></span> <span
                            class="document_curr">{{ $document_data->currency }}</span></div>
                </div>
                <div class="row static-info align-reverse">
                    <div class="col-md-8 name"> Основица/нето вредност </div>
                    <div class="col-md-4 value"> <span id="netov"></span> <span
                            class="document_curr">{{ $document_data->currency }}</span></div>
                </div>
                <div class="row static-info align-reverse">
                    <div class="col-md-8 name"> Цена на испорака </div>
                    <div class="col-md-4 value"> <span id="delivery_sum">{{ $document_data->price_delivery }}</span> <span
                            class="delivery_sum_value">{{ $document_data->currency }}</span></div>
                </div>
                <div class="row static-info align-reverse">
                    <div class="col-md-8 name"> Вредност на нарачката </div>
                    <div class="col-md-4 value"> <span id="vrednost"></span> <span
                            class="document_curr">{{ $document_data->currency }}</span></div>
                </div>
                <div class="row static-info align-reverse">
                    <div class="col-md-8 name"> <strong>Сума на плаќање</strong> </div>
                    <div class="col-md-4 value"> <span id="vkupna_suma"></span> <span
                            class="document_curr">{{ $document_data->currency }}</span></div>
                </div>

            @elseif (((config('app.client') === \EasyShop\Models\Settings::CLIENT_NATURATHERAPYSHOP_ALB)) && $document_type === \EasyShop\Models\Document::TYPE_NARACHKA)
                <div class="row static-info align-reverse">
                    <div class="col-md-8 name"> Основица со ДДВ ( 20% ) </div>
                    <div class="col-md-4 value"> <span id="no_ddv_20"></span> <span
                            class="document_curr">{{ $document_data->currency }}</span></div>
                </div>
                <div class="row static-info align-reverse">
                    <div class="col-md-8 name"> Основица со ДДВ ( 5% ) </div>
                    <div class="col-md-4 value"> <span id="no_ddv_5"></span> <span
                            class="document_curr">{{ $document_data->currency }}</span></div>
                </div>
                <div class="row static-info align-reverse">
                    <div class="col-md-8 name"> Основица со ДДВ </div>
                    <div class="col-md-4 value"> <span id="no_ddv_sum"></span> <span
                            class="document_curr">{{ $document_data->currency }}</span></div>
                </div>
                <div class="row static-info align-reverse">
                    <div class="col-md-8 name"> ДДВ (5%) </div>
                    <div class="col-md-4 value"> <span id="ddv_5"></span> <span
                            class="document_curr">{{ $document_data->currency }}</span></div>
                </div>
                <div class="row static-info align-reverse">
                    <div class="col-md-8 name"> ДДВ (20%) </div>
                    <div class="col-md-4 value"> <span id="ddv_20"></span> <span
                            class="document_curr">{{ $document_data->currency }}</span></div>
                </div>
                <div class="row static-info align-reverse">
                    <div class="col-md-8 name"> ДДВ вредност на нарачката </div>
                    <div class="col-md-4 value"> <span id="ddv_sum"></span> <span
                            class="document_curr">{{ $document_data->currency }}</span></div>
                </div>
                <div class="row static-info align-reverse">
                    <div class="col-md-8 name"> Основица/нето вредност </div>
                    <div class="col-md-4 value"> <span id="netov"></span> <span
                            class="document_curr">{{ $document_data->currency }}</span></div>
                </div>
                <div class="row static-info align-reverse">
                    <div class="col-md-8 name"> Цена на испорака </div>
                    <div class="col-md-4 value"> <span id="delivery_sum"></span> <span
                            class="delivery_sum_value">{{ $document_data->price_delivery }}</span></div>
                </div>
                <div class="row static-info align-reverse">
                    <div class="col-md-8 name"> Вредност на нарачката </div>
                    <div class="col-md-4 value"> <span id="vrednost"></span> <span
                            class="document_curr">{{ $document_data->currency }}</span></div>
                </div>
                <div class="row static-info align-reverse">
                    <div class="col-md-8 name"> <strong>Сума на плаќање</strong> </div>
                    <div class="col-md-4 value"> <span id="vkupna_suma"></span> <span
                            class="document_curr">{{ $document_data->currency }}</span></div>
                </div>


            @else
                <div class="row static-info align-reverse">
                    <div class="col-md-8 name"> Вкупно без ДДВ </div>
                    <div class="col-md-4 value"> <span id="no_ddv"></span> <span
                            class="document_curr">{{ $document_data->currency }}</span></div>
                </div>
                <div class="row static-info align-reverse">
                    <div class="col-md-8 name"> ДДВ: </div>
                    <div class="col-md-4 value"> <span id="just_ddv"></span> <span
                            class="document_curr">{{ $document_data->currency }}</span></div>
                </div>

                @if ($document_data->type_delivery)
                    <div class="row static-info align-reverse">
                        <div class="col-md-8 name"> Вкупно со ДДВ </div>
                        <div class="col-md-4 value"> <span id="with_ddv"></span> <span
                                class="with_ddv_sum">{{ $document_data->currency }}</span></div>
                    </div>
                    <div class="row static-info align-reverse">
                        <div class="col-md-8 name"> Достава: </div>
                        <div class="col-md-4 value"> <span id="delivery_sum"></span> <span
                                class="delivery_sum_value">{{ $document_data->price_delivery }}</span></div>
                    </div>
                @else
                @endif

                <div class="row static-info align-reverse">

                    <div class="col-md-8 name">
                        @if (!is_null($document_data->promo_code_id)) <i
                                class="fa fa-check font_green">@endif</i> Купон:
                    </div>
                    <div class="col-md-4 value"> <span id="just_ddv"></span> <span class="document_curr">
                            @if (!is_null($document_data->promo_code_id))
                            {{ $promo_code }}<br>({{ $promo_code_percent }}%)@else/@endif
                        </span></div>
                </div>

                <hr>
                <div class="row static-info align-reverse">
                    <div class="col-md-8 name"> Вкупно: </div>
                    <div class="col-md-4 value"> <span id="total_price"></span> <span
                            class="document_curr">{{ $document_data->currency }}</span></div>
                </div>
            @endif
        </div>
    </div>
@endif

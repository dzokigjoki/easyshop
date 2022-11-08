<?php
$types = \EasyShop\Models\AdminSettings::getField('deliveryTypes');
?>
@if (in_array(config('app.client'), \EasyShop\Models\Settings::CLIENT_NATURATHERAPY_SHOPS) || config( 'app.client') == 'herline')
    <div class="row">
        <div class="col-lg-12">
            <div class="form-group col-md-4">
                <label><br />Курир служба:</label>
                <select name="courier_select" id="courier_select" style="width:100%;" class="select2 form-control">
                    @if (!isset($document_data->tracking_id))
                        <option value="" disabled selected>Избери</option>
                    @endif
                    @foreach ($couriers as $courier)
                        <option class="notranslate" @if (isset($document_data->courier_id) && $document_data->courier_id == $courier->id) selected @endif value="{{ $courier->id }}">
                            {{ $courier->name }}</option>
                    @endforeach
                </select>
            </div>
            @if (isset($document_data->courier_status))
                <div class="form-group col-md-4">
                    <label><br />Статус на курирот :</label>
                    <br>
                    <label class="form-control" for="">{{ $document_data->courier_status }}</label>
                </div>
                <div class="form-group col-md-4">
                    <label><br />Tracking ID за курирот:</label>
                    <br>
                    <label class="form-control" for="">{{ $document_data->courier_tracking_id }}</label>
                </div>
            @endif
        </div>
    </div>
@endif
@if ($document_data->status == 'podgotovka')
    @if (!empty($types) && $document_type === \EasyShop\Models\Document::TYPE_NARACHKA)
        <div style="padding-bottom: 15px;" class="row">
            <div class="col-md-12">
                <div class="form-group col-md-4">
                    <label><br />Начин испорака</label>
                    <select id="type_delivery" name="type_delivery" class="select2" style="width:100%">
                        @foreach ($types as $deliv)
                            <option @if ($document_data->type_delivery == $deliv['name']) selected @endif value="{{ $deliv['name'] }}">{{ $deliv['display_name'] }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-md-4">
                    <label><br />Магацин</label>
                    <select id="warehouse_id_orders" name="warehouse_id" class="select2" style="width:100%">
                        @if (\Auth::user()->canDo('admin_izbor_magacin'))
                            @foreach ($warehouses as $warehouse)
                                <option @if ($warehouse->id == $document_data->warehouse_id) selected @endif value="{{ $warehouse->id }}">
                                    {{ $warehouse->title }}</option>
                            @endforeach
                        @else
                            @foreach ($warehouses as $warehouse)
                                @if (\Auth::user()->warehouse_id == $warehouse->id)
                                    <option value="{{ $warehouse->id }}">{{ $warehouse->title }}</option>
                                @endif
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>
            <div class="col-md-12">
                @if (config( 'clients.' . config( 'app.client') . '.type_of_order' . '.active'))
                    <div class="form-group col-md-4">
                        <label><br />Тип на нарачка:</label>
                        <select name="type_of_order" id="type_of_order" style="width:100%;"
                            class="select2 notranslate form-control">
                            @if (!isset($document_data->type_of_order))
                                <option class="notranslate" value="" disabled selected>Избери</option>
                            @endif
                            @foreach ($all_type_of_order_fields as $i)
                                <option class="notranslate" @if (isset($document_data->type_of_order) && $document_data->type_of_order == $i) selected @endif value="{{ $i }}">
                                    {{ $i }}</option>

                            @endforeach
                        </select>
                    </div>
                @endif
                <div class="form-group col-md-4">
                    <label><br />Датум на креирање:</label>
                    <div>
                        <div class="input-group date-picker input-daterange" data-date="10.11.2012"
                            data-date-format="dd.mm.yyyy" data-date-week-start="1">
                            <input type="text" class="form-control" id="document_create_date"
                                name="document_create_date"
                                value="{{ old('document_create_date', \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $document_data->document_date)->format('d.m.Y')) }}"
                                style="text-align:left;">
                        </div>
                    </div>
                </div>
                <div class="form-group col-md-4">
                    <label><br />Датум на испорака:</label>
                    <div>
                        <div class="input-group date-picker input-daterange" data-date="10.11.2012"
                            data-date-format="dd.mm.yyyy" data-date-week-start="1">
                            <input type="text" class="form-control" id="document_delivered_date"
                                name="document_delivered_date"
                                @if(isset($document_data->naracka_ispratena_na))
                                value="{{ old('document_delivered_date', \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $document_data->naracka_ispratena_na)->format('d.m.Y')) }}"
                                @endif
                                style="text-align:left;">
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-md-12">

                <div style="display: none;" id="more_client_information" class="form-group col-md-7">
                    <p>Дополнителни информации:</p>
                    <input @if ($document_data->note == 'Клиентот е заинтересиран') checked @endif type="radio" name="more_client_information"
                        value="Клиентот е заинтересиран">
                    <label for="male">Клиентот е заинтересиран</label><br>
                    <input @if ($document_data->note == 'Непостоечки број') checked @endif type="radio" name="more_client_information" value="Непостоечки број">
                    <label for="female">Непостоечки број</label><br>
                    <input @if ($document_data->note == 'Недостапен број') checked @endif type="radio" name="more_client_information" value="Недостапен број">
                    <label for="other">Недостапен број</label><br>
                    <input @if ($document_data->note == 'Не е заинтересиран') checked @endif type="radio" name="more_client_information"
                        value="Не е заинтересиран">
                    <label for="male">Не е заинтересиран</label><br>
                    <input @if ($document_data->note == 'Да се јавиме повторно') checked @endif type="radio" name="more_client_information"
                        value="Да се јавиме повторно">
                    <label for="male">Да се јавиме повторно</label><br>
                </div>

            </div>

        </div>
    @endif
    @if ($document_type != \EasyShop\Models\Document::TYPE_NARACHKA)
        <div class="col-md-12">
            <div class="row">
                <div class="form-group col-md-4">
                    <label><br />
                        @if ($document_type === \EasyShop\Models\Document::TYPE_IZLEZ)
                        Од Магацин @else Магацин @endif
                    </label>
                    <select id="warehouse_id_orders" name="warehouse_id" class="select2" style="width:100%">
                        @if (\Auth::user()->canDo('admin_izbor_magacin'))
                            @foreach ($warehouses as $warehouse)
                                <option @if ($warehouse->id == $document_data->warehouse_id) selected @endif value="{{ $warehouse->id }}">
                                    {{ $warehouse->title }}</option>
                            @endforeach
                        @else
                            @foreach ($warehouses as $warehouse)
                                @if (\Auth::user()->warehouse_id == $warehouse->id)
                                    <option selected value="{{ $warehouse->id }}">{{ $warehouse->title }}</option>
                                @endif
                            @endforeach
                        @endif
                    </select>
                </div>
                @if ($document_type === \EasyShop\Models\Document::TYPE_IZLEZ)
                    <div class="form-group col-md-4">
                        <label><br /> До Магацин</label>
                        <select id="warehouse_to_id_orders" name="warehouse_to_id" class="select2" style="width:100%">
                            <option value="">-- Избери магацин --</option>
                            @foreach ($warehouses as $warehouse)
                                <option @if ($warehouse->id == $document_data->warehouse_to_id) selected @endif value="{{ $warehouse->id }}">
                                    {{ $warehouse->title }}</option>
                            @endforeach
                        </select>
                    </div>
                @endif
            </div>
            @if (!empty($currency_select) && count($currency_select) > 1)
                <div class="form-group col-md-3">
                    <label><br />Валута</label>
                    <select id="currency" name="warehouse_id" class="select2" style="width:50%">
                        @foreach ($currency_select as $cs)
                            <option @if ($cs == $document_data->currency) selected @endif value="{{ $cs }}">{{ $cs }}</option>
                        @endforeach
                    </select>
                </div>
            @endif
            @if ($document_type == 'faktura')
                <div class="form-group col-md-3">
                    <label><br />Генерирај</label><br />
                    <input @if (isset($document_related->ispratnica_id) && $document_related->ispratnica_id > 0) disabled checked @endif type="checkbox" id="generiraj_ispratnica"
                        value="1">испратница</input>
                </div>
            @endif
        </div>

    @endif
    @if ($document_type != 'vlez')
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Додади артикл</div>
                <div class="panel-body">
                    @if ($document_type === EasyShop\Models\Document::TYPE_PRIEMNICA && config( 'clients.' . config( 'app.client') . '.modules.priemnica_currency_multiplier'))
                        <div class="row">
                            <div class="col-md-12 value">
                                <div class="form-group col-md-3">
                                    <label>Конверзија на валута (множител)</label>
                                    <div class="input-group input-group-sm">
                                        <input id="currency_conversion" type="number" min="1"
                                            class="form-control input-sm" value="1">
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="row static-info">
                        <div class="col-md-12 value">
                            <div class="form-group col-md-4">
                                <label><br />Артикл *</label>
                                <?php $sifra = \EasyShop\Models\AdminSettings::getField('sifra'); ?>

                                <select id="product_id" style="width:100%; height: 70px;" class="select2 form-contorl">
                                    <option value="">Избери продукт</option>
                                    @foreach ($products as $prod)

                                        <option
                                            data-image="{{ \ImagesHelper::getProductImage($prod->image, $prod->id, 'sm_') }}"
                                            value="{{ $prod->id }}">

                                            {{ $prod->title }} ( {{ $prod->price_retail_1 }}
                                            {{ $document_data->currency }} )
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-1">
                                <label><br />&nbsp;</label>
                                <div id="variation_id_div" class="input-group input-group-sm">
                                </div>
                            </div>
                            <div class="form-group col-md-1">
                                <div>

                                    <label><br />Кол *</label>
                                    <input id="kolicina" style="width:71px;" type="number" min="0" class="form-control input-sm"
                                        placeholder="">
                                    @if ($document_type != 'vlez' && $document_type != 'priemnica')
                                        <span id="kolicina_span"></span>
                                    @endif
                                    <input type="hidden" id="kol_hidden" value="0">
                                </div>

                                {{-- Transport, Spedicija i Carina --}}
                                @if ($document_type === EasyShop\Models\Document::TYPE_PRIEMNICA && config( 'clients.' . config( 'app.client') . '.modules.priemnica_expences'))
                                    <div>
                                        <label>Царина *</label>

                                        <div class="input-group input-group-sm">
                                            <input min="0" class="form-control" type="number" id="customs" />
                                        </div>
                                    </div>
                                @endif
                            </div>


                            @if ($document_type != 'vlez' && $document_type != 'izlez')

                                <div class="form-group col-md-2">

                                    <div>
                                        <label><br>Цена без ДДВ *</label>

                                        <div class="input-group input-group-sm">
                                            <input min="0" style="@if ($document_type=='vlez' ) display:none @endif @if ($document_type == 'izlez') display:none @endif"
                                            id="cena" class="form-control" type="number" placeholder="">
                                            <span class="input-group-btn">
                                            </span>
                                        </div>
                                        @if ($document_type != 'vlez' && $document_type != 'izlez' && $document_type != 'priemnica')
                                            <span id="popustcena_span"></span>
                                        @endif
                                    </div>
                                    {{-- Transport, Spedicija i Carina --}}
                                    @if ($document_type === EasyShop\Models\Document::TYPE_PRIEMNICA && config( 'clients.' . config( 'app.client') . '.modules.priemnica_expences'))
                                        <div>
                                            <label>Транспорт *</label>
                                            <div class="input-group input-group-sm">
                                                <input min="0" class="form-control" type="number" id="transport" />
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group col-md-2">
                                    <label><br>Цена со Попуст *</label>
                                    <div class="input-group input-group-sm">
                                        <input min="0" style="@if ($document_type=='vlez' ) display:none @endif @if ($document_type == 'izlez') display:none @endif"
                                        id="cena_popust" class="form-control" type="number" placeholder="">
                                    </div>
                                </div>
                            @endif

                            <div class="form-group col-md-2" @if ($document_type == 'vlez' || $document_type == 'izlez') style="margin-bottom: 0px; padding-left: 0px; padding-right: 0px; margin-top: 19px;" @endif>
                                @if ($document_type == 'vlez' || $document_type == 'izlez')<label> &nbsp;
                                    </label>
                                @else
                                    <label><br>Цена со ДДВ *</label>
                                @endif
                                <div class="input-group input-group-sm">
                                    <input min="0" style="@if ($document_type=='vlez' ) display:none @endif @if ($document_type == 'izlez') display:none @endif"
                                    id="vkupna_cena" class="form-control" type="number" placeholder="">
                                    <span class="input-group-btn" style="position: relative; right: -15px;">
                                        <button id="add_product" class="btn green-meadow" type="button"
                                            style="border-radius: 3px;"> + </button>
                                    </span>
                                </div>
                                {{-- Transport, Spedicija i Carina --}}
                                @if ($document_type === EasyShop\Models\Document::TYPE_PRIEMNICA && config( 'clients.' . config( 'app.client') . '.modules.priemnica_expences'))
                                    <div>
                                        <label>Шпедиција *</label>
                                        <div class="input-group input-group-sm">
                                            <input min="0" class="form-control" type="number" id="freight_forwarder">
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <div id="zaliha_izlez" class="form-group col-md-12" style="margin-top:10px;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        @if (in_array(config('app.client'), \EasyShop\Models\Settings::CLIENT_NATURATHERAPY_SHOPS))

            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Додади Пакет</div>
                    <div class="panel-body">
                        @if ($document_type === EasyShop\Models\Document::TYPE_PRIEMNICA && config( 'clients.' . config( 'app.client') . '.modules.priemnica_currency_multiplier'))
                            <div class="row">
                                <div class="col-md-12 value">
                                    <div class="form-group col-md-3">
                                        <label>Конверзија на валута (множител)</label>
                                        <div class="input-group input-group-sm">
                                            <input id="currency_conversion1" type="number" min="1"
                                                class="form-control input-sm" value="1">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <div class="row static-info">
                            <div class="col-md-12 value">
                                <div class="form-group col-md-4">
                                    <label><br />Пакет *</label>
                                    <?php $sifra = \EasyShop\Models\AdminSettings::getField('sifra');
                                    ?>

                                    <select id="package_id" style="width:100%; height: 70px;"
                                        class="select2 form-contorl">
                                        <option value="">Избери пакет</option>

                                        @foreach ($packages as $package)

                                            <option
                                                data-image="{{ \ImagesHelper::getProductImage($package->image, $package->id, 'sm_') }}"
                                                value="{{ $package->id }}">
                                                {{ $package->title }} ( {{ $package->price_retail_1 }}
                                                {{ $document_data->currency }} )
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-1">
                                    <label><br />&nbsp;</label>
                                    <div id="variation_id_div1" class="input-group input-group-sm">
                                    </div>
                                </div>
                                <div class="form-group col-md-1">
                                    <div>

                                        <label><br />Кол *</label>
                                        <input id="kolicina1" style="width:71px;" type="number" min="0" class="form-control input-sm"
                                            placeholder="">
                                        @if ($document_type != 'vlez' && $document_type != 'priemnica')
                                            <span id="kolicina_span1"></span>
                                        @endif
                                        <input type="hidden" id="kol_hidden1" value="0">
                                    </div>

                                    {{-- Transport, Spedicija i Carina --}}
                                    @if ($document_type === EasyShop\Models\Document::TYPE_PRIEMNICA && config( 'clients.' . config( 'app.client') . '.modules.priemnica_expences'))
                                        <div>
                                            <label>Царина *</label>

                                            <div class="input-group input-group-sm">
                                                <input min="0" class="form-control" type="number" id="customs1" />
                                            </div>
                                        </div>
                                    @endif
                                </div>


                                @if ($document_type != 'vlez' && $document_type != 'izlez')

                                    <div class="form-group col-md-2">

                                        <div>
                                            <label><br>Цена без ДДВ *</label>

                                            <div class="input-group input-group-sm">
                                                <input min="0" style="@if ($document_type=='vlez'
                                                    ) display:none @endif @if ($document_type == 'izlez') display:none
                                                @endif" id="cena1" class="form-control" type="number" placeholder="">
                                                <span class="input-group-btn">
                                                </span>
                                            </div>
                                            @if ($document_type != 'vlez' && $document_type != 'izlez' && $document_type != 'priemnica')
                                                <span id="popustcena_span1"></span>
                                            @endif
                                        </div>

                                        {{-- Transport, Spedicija i Carina --}}
                                        @if ($document_type === EasyShop\Models\Document::TYPE_PRIEMNICA && config( 'clients.' . config( 'app.client') . '.modules.priemnica_expences'))
                                            <div>
                                                <label>Транспорт *</label>
                                                <div class="input-group input-group-sm">
                                                    <input min="0" class="form-control" type="number" id="transport1" />
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label><br>Цена со Попуст *</label>
                                        <div class="input-group input-group-sm">
                                            <input min="0" style="@if ($document_type=='vlez' ) display:none @endif @if ($document_type == 'izlez') display:none @endif"
                                            id="cena_popust1" class="form-control" type="number" placeholder="">
                                        </div>
                                    </div>
                                @endif

                                <div class="form-group col-md-2" @if ($document_type == 'vlez' || $document_type == 'izlez') style="margin-bottom: 0px; padding-left: 0px; padding-right: 0px; margin-top: 19px;" @endif>
                                    @if ($document_type == 'vlez' || $document_type == 'izlez')<label> &nbsp;
                                        </label>
                                    @else
                                        <label><br>Цена со ДДВ *</label>
                                    @endif
                                    <div class="input-group input-group-sm">
                                        <input min="0" style="@if ($document_type=='vlez' ) display:none @endif @if ($document_type == 'izlez') display:none @endif"
                                        id="vkupna_cena1" class="form-control" type="number" placeholder="">
                                        <span class="input-group-btn" style="position: relative; right: -15px;">
                                            <button id="add_package" class="btn green-meadow" type="button"
                                                style="border-radius: 3px;"> + </button>
                                        </span>
                                    </div>

                                    {{-- Transport, Spedicija i Carina --}}
                                    @if ($document_type === EasyShop\Models\Document::TYPE_PRIEMNICA && config( 'clients.' . config( 'app.client') . '.modules.priemnica_expences'))
                                        <div>
                                            <label>Шпедиција *</label>
                                            <div class="input-group input-group-sm">
                                                <input min="0" class="form-control" type="number"
                                                    id="freight_forwarder1">
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <div id="zaliha_izlez1" class="form-group col-md-12" style="margin-top:10px;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endif
@endif

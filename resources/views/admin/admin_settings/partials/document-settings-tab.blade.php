<div class="tab-pane" id="document-settings-tab">
    <div class="col-md-10">




        <div class="form-group col-md-12">
            <label class="col-md-3 control-label">Скриени извештаи:</label>

            <div class="col-md-9">

                <select class="form-control select2 select2-multiple select2-button-multiselect-value"
                    name="array_hideIzvestai[]" multiple>

                    <option @if (isset($hideIzvestai) && isset($hideIzvestai['prodazba'])) ) selected @endif value="prodazba">Продажба</option>
                    <option @if (isset($hideIzvestai) && isset($hideIzvestai['maloprodazba'])) ) selected @endif value="maloprodazba">Малопродажба</option>
                    <option @if (isset($hideIzvestai) && isset($hideIzvestai['golemoprodazba'])) ) selected @endif value="golemoprodazba">Големопродажба</option>
                    <option @if (isset($hideIzvestai) && isset($hideIzvestai['internetprodazba'])) ) selected @endif value="internetprodazba">Интернетпродажба</option>
                    <option @if (isset($hideIzvestai) && isset($hideIzvestai['ostanato'])) ) selected @endif value="ostanato">Останато</option>
                </select>
            </div>
        </div>
        <div class="form-group col-md-6">
            <label class="col-md-6 control-label">Фактура / Испратница</label>

            <div class="col-md-6">
                <input name="boolean_fakturaIspratnica" type="hidden" data-on-text="Да" data-off-text="Не" value="0">
                <input name="boolean_fakturaIspratnica" @if (isset($fakturaIspratnica) && $fakturaIspratnica) ) checked @endif
                    type="checkbox" class="make-switch" data-on-text="Да" data-off-text="Не" value="1">
            </div>
        </div>
        <div class="form-group col-md-6">
            <input name="boolean_nalepnica" type="hidden" data-on-text="Да" data-off-text="Не" value="0">
            <label class="col-md-6 control-label">Налепница</label>

            <div class="col-md-6">
                <input name="boolean_nalepnica" type="hidden" data-on-text="Да" data-off-text="Не" value="0">
                <input name="boolean_nalepnica" type="checkbox" @if (isset($nalepnica) && $nalepnica) ) checked @endif
                    class="make-switch" data-on-text="Да" data-off-text="Не" value="1">
            </div>
        </div>
        <div class="form-group col-md-6">
            <label class="col-md-6 control-label">Онлајн фактура</label>

            <div class="col-md-6">
                <input name="boolean_fakturaOnline" type="hidden" data-on-text="Да" data-off-text="Не" value="0">
                <input name="boolean_fakturaOnline" type="checkbox" @if (isset($nalepnica) && $nalepnica) ) checked @endif class="make-switch" data-on-text="Да"
                    data-off-text="Не" value="1">
            </div>
        </div>
        <div class="form-group col-md-6">
            <label class="col-md-6 control-label">Онлајн резервации</label>

            <div class="col-md-6">
                <input name="boolean_rezervacijaOnline" type="hidden" data-on-text="Да" data-off-text="Не" value="0">
                <input name="boolean_rezervacijaOnline" type="checkbox" @if (isset($rezervacijaOnline) && $rezervacijaOnline) ) checked @endif class="make-switch" data-on-text="Да"
                    data-off-text="Не" value="1">
            </div>
        </div>
        <div class="form-group col-md-6">
            <label class="col-md-6 control-label">Залиха во минус</label>

            <div class="col-md-6">
                <input name="boolean_allowMinusQuantity" type="hidden" data-on-text="Да" data-off-text="Не" value="0">
                <input name="boolean_allowMinusQuantity" @if (isset($allowMinusQuantity) && $allowMinusQuantity) ) checked @endif type="checkbox" class="make-switch" data-on-text="Да"
                    data-off-text="Не" value="1">
            </div>
        </div>
        <div class="form-group col-md-6">
            <label class="col-md-6 control-label">Fix набавни цени:</label>

            <div class="col-md-6">
                <input name="boolean_fixCeni" type="hidden" data-on-text="Да" data-off-text="Не" value="0">
                <input name="boolean_fixCeni" type="checkbox" @if (isset($fixCeni) && $fixCeni) ) checked @endif class="make-switch" data-on-text="Да" data-off-text="Не"
                    value="1">
            </div>
            
        </div>
        <div class="form-group col-md-6">
            <label class="col-md-6 control-label">Најди разлики мени:</label>

            <div class="col-md-6">
                <input name="boolean_findDifferencesMenu" type="hidden" data-on-text="Да" data-off-text="Не" value="0">
                <input name="boolean_findDifferencesMenu" type="checkbox" @if (isset($findDifferencesMenu) && $findDifferencesMenu) ) checked @endif class="make-switch" data-on-text="Да" data-off-text="Не"
                    value="1">
            </div>
            
        </div>
        <div class="form-group col-md-6">
            <label class="col-md-6 control-label">Шифра:</label>

            <div class="col-md-6">
                <input name="boolean_sifra" type="hidden" data-on-text="Да" data-off-text="Не" value="0">
                <input name="boolean_sifra" type="checkbox" @if (isset($sifra) && $sifra) ) checked @endif class="make-switch" data-on-text="Да" data-off-text="Не"
                    value="1">
            </div>
            
        </div>
    
        <div class="form-group col-md-12">
            <label class="col-md-3 control-label">Default магацин:</label>

            <div class="col-md-3">

                <select class="form-control select2 select2-multiple select2-button-multiselect-value"
                    name="integer_warehouseId">
                    <option value="">Избери</option>
                    @foreach ($warehouses as $warehouse)
                        <option @if ($warehouse->id == $warehouseId) selected @endif value="{{ $warehouse->id }}">{{ $warehouse->title }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group col-md-12">
            <label class="col-md-3 control-label">Ограничување по продукт</label>

            <div class="col-md-3">
                <input type="number" name="integer_limitProducts"
                    value="{{ old('integer_limitProducts', $limitProducts) }}" class="form-control">
            </div>
        </div>

        {{-- <div class="form-group col-md-12">
            <label class="col-md-3 control-label">Додади начин на испорачување:</label>

            <div class="col-md-3">
                <input type="text" class="form-control" placeholder="Име" name="delivery_type_name" value="">
            </div>
            <div class="col-md-3">
                <input type="text" class="form-control" placeholder="Име за приказ" name="delivery_type_display"
                    value="">
            </div>
            <div class="col-md-2">
                <input type="text" class="form-control" placeholder="Цена" name="delivery_type_price" value="">
            </div>
            <i id="addNewDelivery" class="fa fa-plus"></i>
        </div>
        <div @if (!$deliveryTypes) style="display: none" @endif
            class="form-group deliveryTypes col-md-12">
            <label class="col-md-3 control-label">Начини на испорака:</label>
            <div class="col-md-9">
                <table id="deliveryTypes" class="table">
                    <thead>
                        <tr>
                            <th scope="col">Име</th>
                            <th scope="col">Име за приказ</th>
                            <th scope="col">Цена</th>
                            <th scope="col">Акции</th>
                        </tr>
                    </thead>

                    <tbody>
                        @if ($deliveryTypes)
                            @foreach ($deliveryTypes as $i)
                                <tr>
                                    <td>{{ $i['name'] }}</td>
                                    <td>{{ $i['display_name'] }}</td>
                                    <td>{{ $i['price'] }}</td>
                                    <td><i data-name="{{ $i['name'] }}" data-field="deliveryTypes"
                                            class="fa fa-remove deleteField"></i>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr></tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div> --}}

        <div class="form-group col-md-12">
            <label class="col-md-3 control-label">Колони на нарачки:</label>

            <div class="col-md-4">
                <input name="array_orderColumns_phone" type="hidden" data-on-text="Да" data-off-text="Не" value="0">
                <input type="checkbox" name="array_orderColumns_phone" value="1" @if (isset($orderColumns['phone']) && $orderColumns['phone']) ) checked @endif>
                <label> Телефон</label><br>
                <input name="array_orderColumns_address" type="hidden" data-on-text="Да" data-off-text="Не" value="0">
                <input type="checkbox" name="array_orderColumns_address" value="1" @if (isset($orderColumns['address']) && $orderColumns['address']) ) checked @endif>
                <label> Адреса</label><br>
                <input name="array_orderColumns_city" type="hidden" data-on-text="Да" data-off-text="Не" value="0">
                <input type="checkbox" name="array_orderColumns_city" value="1" @if (isset($orderColumns['city']) && $orderColumns['city']) ) checked @endif>
                <label> Град</label><br>
                <input name="array_orderColumns_paid" type="hidden" data-on-text="Да" data-off-text="Не" value="0">
                <input type="checkbox" name="array_orderColumns_paid" value="1" @if (isset($orderColumns['paid']) && $orderColumns['paid']) ) checked @endif>
                <label> Платено</label><br>
                <input name="array_orderColumns_municipality" type="hidden" data-on-text="Да" data-off-text="Не"
                    value="0">
                <input type="checkbox" name="array_orderColumns_municipality" value="1" @if (isset($orderColumns['municipality']) && $orderColumns['municipality']) ) checked @endif>
                <label> Населба</label><br>
                <input name="array_orderColumns_courier" type="hidden" data-on-text="Да" data-off-text="Не" value="0">
                <input type="checkbox" name="array_orderColumns_courier" value="1" @if (isset($orderColumns['courier']) && $orderColumns['courier']) ) checked @endif>
                <label> Курир</label><br>
                <input name="array_orderColumns_courierStatus" type="hidden" data-on-text="Да" data-off-text="Не"
                    value="0">
                <input type="checkbox" name="array_orderColumns_courierStatus" value="1" @if (isset($orderColumns['courierStatus']) && $orderColumns['courierStatus']) ) checked @endif>
                <label> Курир статус</label><br>
                <input type="checkbox" name="array_orderColumns_note" value="1" @if (isset($orderColumns['note']) && $orderColumns['note']) ) checked @endif>
                <label> Опис на нарачка</label><br>
            </div>
            <div class="col-md-4">
                <input name="array_orderColumns_trackingCode" type="hidden" data-on-text="Да" data-off-text="Не"
                    value="0">
                <input type="checkbox" name="array_orderColumns_trackingCode" value="1" @if (isset($orderColumns['trackingCode']) && $orderColumns['trackingCode']) ) checked @endif>
                <label> Код за следење</label><br>
                <input name="array_orderColumns_total" type="hidden" data-on-text="Да" data-off-text="Не" value="0">
                <input type="checkbox" name="array_orderColumns_total" value="1" @if (isset($orderColumns['total']) && $orderColumns['total']) ) checked @endif>
                <label> Вкупно</label><br>
                <input name="array_orderColumns_deliveredAt" type="hidden" data-on-text="Да" data-off-text="Не"
                    value="0">
                <input type="checkbox" name="array_orderColumns_deliveredAt" value="1" @if (isset($orderColumns['deliveredAt']) && $orderColumns['deliveredAt']) ) checked @endif>
                <label> Испратена на</label><br>
                <input name="array_orderColumns_paidAt" type="hidden" data-on-text="Да" data-off-text="Не" value="0">
                <input type="checkbox" name="array_orderColumns_paidAt" value="1" @if (isset($orderColumns['paidAt']) && $orderColumns['paidAt']) ) checked @endif>
                <label> Платена на</label><br>
                <input name="array_orderColumns_posta" type="hidden" data-on-text="Да" data-off-text="Не" value="0">
                <input type="checkbox" name="array_orderColumns_posta" value="1" @if (isset($orderColumns['posta']) && $orderColumns['posta']) ) checked @endif>
                <label> Пошта</label><br>
                <input name="array_orderColumns_payment" type="hidden" data-on-text="Да" data-off-text="Не" value="0">
                <input type="checkbox" name="array_orderColumns_payment" value="1" @if (isset($orderColumns['payment']) && $orderColumns['payment']) ) checked @endif>
                <label> Начин на плаќање</label><br>
                <input name="array_orderColumns_articles" type="hidden" data-on-text="Да" data-off-text="Не" value="0">
                <input type="checkbox" name="array_orderColumns_articles" value="1" @if (isset($orderColumns['articles']) && $orderColumns['articles']) ) checked @endif>
                <label> Артикли</label><br>
            </div>

        </div>
    </div>
</div>

<div class="tab-pane activ" id="payment-info-tab">
    <div class="col-md-10">


        <div class="form-group col-md-12">
            <label class="col-md-3 control-label">Додади начин на плаќање:</label>

            <div class="col-md-3">
                <input type="text" class="form-control" placeholder="Име" name="payment_name" value="">
            </div>
            <div class="col-md-3">
                <input type="text" class="form-control" placeholder="Име за приказ" name="payment_display" value="">
            </div>
            <i id="addNewPayments" class="fa fa-plus"></i>
        </div>
        <div @if (!$paymentMethods) style="display: none" @endif
            class="form-group paymentMethods col-md-12">
            <label class="col-md-3 control-label">Валути:</label>
            <div class="col-md-9">
                <table id="paymentMethods" class="table">
                    <thead>
                        <tr>
                            <th scope="col">Име</th>
                            <th scope="col">Име за приказ</th>
                            <th scope="col">Акции</th>
                        </tr>
                    </thead>

                    <tbody>
                        @if ($paymentMethods)
                            @foreach ($paymentMethods as $i)
                                <tr>
                                    <td>{{ $i['name'] }}</td>
                                    <td>{{ $i['display_name'] }}</td>
                                    <td><i data-name="{{ $i['name'] }}" data-field="paymentMethods"
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

        </div>
        <div class="form-group col-md-12">
            <label class="col-md-3 control-label">Плаќање:</label>

            <div class="col-md-9">
                <select class="form-control select2 select2-multiple select2-button-multiselect-value"
                    id="payments_select_dropdown" name="string_typeOfPayment">
                    <option @if (empty($typeOfPayment)) selected @endif
                        value="">Избери</option>
                    <option @if ($typeOfPayment == 'casys') selected @endif value="casys">Casys</option>
                    <option @if ($typeOfPayment == 'halk') selected @endif
                        value="halk">Halk</option>
                </select>
            </div>
        </div>
        <div class="form-group col-md-12 casys hidden">
            <label class="col-md-3 control-label">ID на трговец:</label>

            <div class="col-md-9">
                <input type="text" class="form-control" placeholder="ID" name="string_merchantId"
                    value="{{ old('string_merchantId', $merchantId) }}">
            </div>
        </div>
        <div class="form-group col-md-12 casys hidden">
            <label class="col-md-3 control-label">Име на трговец:</label>

            <div class="col-md-9">
                <input type="text" class="form-control" placeholder="Име" name="string_merchantName"
                    value="{{ old('string_merchantName', $merchantName) }}">
            </div>
        </div>
        <div class="form-group col-md-12 casys hidden">
            <label class="col-md-3 control-label">Лозинка:</label>

            <div class="col-md-9">
                <input type="password" class="form-control" placeholder="Лозинка" name="string_merchantPassword"
                    value="{{ old('string_merchantPassword', $merchantPassword) }}">
            </div>
        </div>

        <div class="form-group col-md-12 hidden halk">
            <label class="col-md-3 control-label">ID на трговец:</label>

            <div class="col-md-9">
                <input type="text" class="form-control" placeholder="ID" name="string_clientId"
                    value="{{ old('string_clientId', $clientId) }}">
            </div>
        </div>
        <div class="form-group col-md-12 hidden halk">
            <label class="col-md-3 control-label">Клуч на трговец:</label>

            <div class="col-md-9">
                <input type="text" class="form-control" placeholder="Клуч" name="string_storeKey"
                    value="{{ old('string_storeKey', $storeKey) }}">
            </div>
        </div>
        <div class="form-group col-md-12 hidden halk">
            <label class="col-md-3 control-label">Код за валута:</label>

            <div class="col-md-9">
                <input type="text" class="form-control" placeholder="Код" name="string_currencyCode"
                    value="{{ old('string_currencyCode', $currencyCode) }}">
            </div>
        </div>
        <div class="form-group col-md-12 hidden halk">
            <label class="col-md-3 control-label">Api клиент:</label>

            <div class="col-md-9">
                <input type="text" class="form-control" placeholder="Api клиент" name="string_apiUser"
                    value="{{ old('string_apiUser', $apiUser) }}">
            </div>
        </div>
        <div class="form-group col-md-12 hidden halk">
            <label class="col-md-3 control-label">Api лозинка:</label>

            <div class="col-md-9">
                <input type="text" class="form-control" placeholder="Api лозинка" name="string_apiPassword"
                    value="{{ old('string_apiPassword', $apiPassword) }}">
            </div>
        </div>
        <div class="form-group col-md-12">
            <label class="col-md-3 control-label">Малопродажна 1:</label>
            <div class="col-md-9">
                <input name="array_prices_retail1" type="hidden" data-on-text="Да" data-off-text="Не" value="0">
                <input name="array_prices_retail1" @if (isset($prices['retail1']) && $prices['retail1']) ) checked @endif
                    type="checkbox" class="make-switch" data-on-text="Да" data-off-text="Не" value="1">
            </div>

        </div>
        <div class="form-group col-md-12">
            <label class="col-md-3 control-label">Малопродажна 2:</label>
            <div class="col-md-9">
                <input name="array_prices_retail2" type="hidden" data-on-text="Да" data-off-text="Не" value="0">
                <input name="array_prices_retail2" @if (isset($prices['retail2']) && $prices['retail2']) ) checked @endif
                    type="checkbox" class="make-switch" data-on-text="Да" data-off-text="Не" value="1">
            </div>

        </div>
        <div class="form-group col-md-12">
            <label class="col-md-3 control-label">Големопродажна 1:</label>
            <div class="col-md-9">
                <input name="array_prices_wholesale1" type="hidden" data-on-text="Да" data-off-text="Не" value="0">
                <input name="array_prices_wholesale1" @if (isset($prices['wholesale1']) && $prices['wholesale1']) ) checked @endif type="checkbox" class="make-switch" data-on-text="Да" data-off-text="Не" value="1">
            </div>

        </div>
        <div class="form-group col-md-12">
            <label class="col-md-3 control-label">Големопродажна 2:</label>
            <div class="col-md-9">
                <input name="array_prices_wholesale2" type="hidden" data-on-text="Да" data-off-text="Не" value="0">
                <input name="array_prices_wholesale2" @if (isset($prices['wholesale2']) && $prices['wholesale2']) ) checked @endif type="checkbox" class="make-switch" data-on-text="Да" data-off-text="Не" value="1">
            </div>

        </div>
        <div class="form-group col-md-12">
            <label class="col-md-3 control-label">Големопродажна 3:</label>
            <div class="col-md-9">
                <input name="array_prices_wholesale3" type="hidden" data-on-text="Да" data-off-text="Не" value="0">
                <input name="array_prices_wholesale3" @if (isset($prices['wholesale3']) && $prices['wholesale3']) ) checked @endif type="checkbox" class="make-switch" data-on-text="Да" data-off-text="Не" value="1">
            </div>

        </div>
        <div class="form-group col-md-12">
            <label class="col-md-3 control-label">Dinners:</label>
            <div class="col-md-9">
                <input name="array_prices_diners24" type="hidden" data-on-text="Да"
                    data-off-text="Не" value="0">
                <input name="array_prices_diners24" @if(isset($prices['diners24']) && $prices['diners24']) ) checked @endif  type="checkbox" class="make-switch" data-on-text="Да"
                    data-off-text="Не" value="1">
            </div>

        </div>
        <div class="form-group col-md-12">
            <label class="col-md-3 control-label">NLB:</label>
            <div class="col-md-9">
                <input name="array_prices_nlb24" type="hidden" data-on-text="Да"
                    data-off-text="Не" value="0">
                <input name="array_prices_nlb24" @if(isset($prices['nlb24']) && $prices['nlb24']) ) checked @endif  type="checkbox" class="make-switch" data-on-text="Да"
                    data-off-text="Не" value="1">
            </div>

        </div>
    </div>

</div>

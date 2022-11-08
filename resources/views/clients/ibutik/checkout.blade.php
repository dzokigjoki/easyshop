@extends('clients.ibutik.layouts.default')

@section('content')

    <div class="container">
        <header class="page-header">
            <h1 class="page-title">Плаќање за нарачка</h1>
        </header>
        <div class="row row-col-gap" data-gutter="60">
            <div class="col-md-6">
                <h3 class="widget-title">Информации околу нарачката</h3>
                <div class="box">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Продукт</th>
                            <th>Количина</th>
                            <th>Цена</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $item)
                        <tr>
                            <td>{{$item->title}}</td>
                            <td>{{$item->quantity}}</td>
                            <td>{{$item->cena}} {{\EasyShop\Models\AdminSettings::getField('currency')}}</td>
                        </tr>
                        @endforeach
                        <tr>
                            <td>Вкупно</td>
                            <td></td>
                            <td>{{$totalPrice}} {{\EasyShop\Models\AdminSettings::getField('currency')}}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-6">
                <h3 class="widget-title">Детали за наплата</h3>
                <div class="form-group">
                    <label>Име</label>
                    <input class="form-control" type="text" name="FirstName" value="{{isset($user) ? $user->first_name : ''}}">
                </div>
                <div class="form-group">
                    <label>Презиме</label>
                    <input class="form-control" type="text" name="LastName" value="{{isset($user) ? $user->last_name : ''}}">
                </div>
                <div class="form-group">
                    <label>E-mail</label>
                    <input class="form-control" type="text" name="Email" value="{{isset($user) ? $user->email : ''}}">
                </div>
                <div class="form-group">
                    <label>Телефонски број</label>
                    <input class="form-control" type="text" name="Telephone" value="{{isset($user) ? $user->phone : ''}}">
                </div>
                <div class="form-group">
                    <label>Држава</label>
                    <input class="form-control" type="text" name="Country" value="{{isset($country) ? $country : ''}}">
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label>Град</label>
                            <input class="form-control" type="text" name="City" value="{{isset($city) ? $city : ''}}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Поштенски код</label>
                            <input class="form-control" type="text" name="Zip">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Адреса</label>
                    <input class="form-control" name="Address" type="text" value="{{isset($user) ? $user->address : ''}}">
                </div>

                <form id="checkoutForm" method="POST" action="https://www.cpay.com.mk/client/Page/default.aspx?xml_id=/mk-MK/.loginToPay/.simple/">
                    <input type="hidden" name="AmountToPay" value="{{$totalPrice * 100}}" />
                    <input type="hidden" name="PayToMerchant" value="{{\EasyShop\Models\AdminSettings::getField('merchantId')}}" />
                    <input type="hidden" name="MerchantName" value="{{\EasyShop\Models\AdminSettings::getField('merchantName')}}" />
                    <input type="hidden" name="AmountCurrency" value="MKD" />
                    <input type="hidden" name="Details1" value="{{env("CLIENT")}}-Naracka" />
                    <input type="hidden" name="PaymentOKURL" value="{{route("checkout.success")}}"/>
                    <input type="hidden" name="PaymentFailURL" value="{{route("checkout.fail")}}"/>
                    <input type="hidden" name="OriginalAmount" value="{{$totalPrice}}" />
                    <input type="hidden" name="OriginalCurrency" value="MKD" />
                    <input type="hidden" name="Details2" value="" />
                    <input type="hidden" name="CheckSumHeader" value="" />
                    <input type="hidden" name="CheckSum" value="" />
                    <input type="hidden" name="Address" value="" />
                </form>

            <div class="form-group">
                <label>Метод на испорака</label>
                @foreach($deliveryTypes as $key => $value)
                    <div class="checkbox">
                        <label>
                            <input type="radio" name="deliveryType" value="{{$value}}" @if($key == 0)checked="checked"@endif>&nbsp{{$value}}<br>
                        </label>
                    </div>
                @endforeach
            </div>

            <div class="form-group">
                <label>Начин на плаќање</label>
                <div class="checkbox">
                    <label>
                        <input type="radio" name="paymentType" value="1">&nbspКеш<br>
                    </label>
                    <label>
                        <input type="radio" name="paymentType" value="2" checked="checked">&nbspКартичка<br>
                    </label>
                    <label>
                        <input type="radio" name="paymentType" value="3">&nbspПрофактура<br>
                    </label>
                </div>
            </div>

            <button data-pay-button type="submit" class="btn btn-primary">Плати</button>
            <div class="gap gap-small"></div>
            </div>
        </div>
    </div>


@endsection

@section('scripts')
    {{--TODO: move to global script--}}
    <script>
        $(document).ready(function() {
            var $form = $('#checkoutForm');
            var $button = $('[data-pay-button]');

            $button.on('click', function(event)
            {
                $.ajax({
                    url: 'checkout/generate',
                    method: 'POST',
                    data: {
                        'FirstName' : $("input[name='FirstName']").val(),
                        'LastName' : $("input[name='LastName']").val(),
                        'Email' : $("input[name='Email']").val(),
                        'Telephone' : $("input[name='Telephone']").val(),
                        'Country' : $("input[name='Country']").val(),
                        'City' : $("input[name='City']").val(),
                        'Zip' : $("input[name='Zip']").val(),
                        'Address' : $("input[name='Address']").val(),
                        'AmountToPay' : $("input[name='AmountToPay']").val(),
                        'AmountCurrency' : $("input[name='AmountCurrency']").val(),
                        'Details1' : $("input[name='Details1']").val(),
                        'PayToMerchant' : $("input[name='PayToMerchant']").val(),
                        'MerchantName' : $("input[name='MerchantName']").val(),
                        'OriginalAmount' : $("input[name='OriginalAmount']").val(),
                        'OriginalCurrency' : $("input[name='OriginalCurrency']").val(),
                        'PaymentOKURL' : $("input[name='PaymentOKURL']").val(),
                        'PaymentFailURL' : $("input[name='PaymentFailURL']").val(),
                        'deliveryType' : $("input[name='deliveryType']:checked").val(),
                        'paymentType' : $("input[name='paymentType']:checked").val()
                    },
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    success:function(data) {
                        if(data.type === 2) {
                            var $successUrl = $form.find('[name=PaymentOKURL]');
                            $successUrl.attr('value', $successUrl.attr('value') + '/' + data.doc_id);
                            $("input[name='Details2']").val(data.doc_id);
                            $("input[name='CheckSumHeader']").val(data.header);
                            $("input[name='CheckSum']").val(data.checksum);
                            $form.submit();
                        }
                        else if(data.type === 1) {
                            toastr.success("Вашата нарачка е успешна!");
                        }
                        else if(data.type === 3) {
                            toastr.error("Ве молиме да не контактирате.");
                        }
                        else {
                            toastr.error("Нема доволно залиха од продуктите: " + data.productNames);
                        }
                    },
                    error: function() {
                        toastr.error("Внесете ги сите полиња!");
                    }
                });
            });

        });

    </script>
@stop
<?php
$global_prices = \EasyShop\Models\AdminSettings::getField('prices');

?>
<div class="tab-pane" id="tab_prices">
    <div class="form-body">
        <div class="form-group">
            @if(!empty($global_prices['retail1']))

            <label class="col-md-2 control-label">Малопродажна 1:</label>

            <div class="col-md-3">
                <input type="number" step=".01" class="form-control maxlength-handler" name="price_retail_1" required="required" value="{{ old('price_retail_1', is_numeric($product->price_retail_1) ? $product->price_retail_1 : 0 ) }}">
            </div>
            @endif
            @if(config('app.client') == 'naturatherapyshop')
            <label class="col-md-2 control-label">Вредност во поени</label>
            <div class="col-md-3">
                <input type="number" class="form-control maxlength-handler" name="points" value="{{ old('points', is_numeric($product->points) ? $product->points : 0 ) }}">
            </div>
            @endif
            @if(!empty($global_prices['wholesale1']))
            <label class="col-md-2 control-label">Големопродажна 1:</label>

            <div class="col-md-3">
                <input type="number" step=".01" class="form-control maxlength-handler" name="price_wholesale_1" value="{{ old('price_wholesale_1', is_numeric($product->price_wholesale_1) ? $product->price_wholesale_1 : 0 ) }}">
            </div>
            @endif
        </div>
        <div class="form-group">
            @if(!empty($global_prices['retail2']))

            <label class="col-md-2 control-label">Малопродажна 2:</label>

            <div class="col-md-3">
                <input type="number" step=".01" class="form-control maxlength-handler" name="price_retail_2" value="{{ old('price_retail_2', is_numeric($product->price_retail_2) ? $product->price_retail_2 : 0 ) }}">
            </div>
            @endif
            @if(!empty($global_prices['wholesale2']))

            <label class="col-md-2 control-label">Големопродажна 2:</label>

            <div class="col-md-3">
                <input type="number" step=".01" class="form-control maxlength-handler" name="price_wholesale_2" value="{{ old('price_wholesale_2', is_numeric($product->price_wholesale_2) ? $product->price_wholesale_2 : 0 ) }}">
            </div>
            @endif
        </div>
        <div class="form-group">

            @if(!empty($global_prices['diners24']))
            <label class="col-md-2 control-label">Diners 24 рати:</label>

            <div class="col-md-3">
                <input type="number" step=".01" class="form-control maxlength-handler" name="price_diners_24" required="required" value="{{ old('price_diners_24', is_numeric($product->price_diners_24) ? $product->price_diners_24 : 0 ) }}" />
            </div>
            @endif
            @if(!empty($global_prices['wholesale3']))
            <label class="col-md-2 control-label">Големопродажна 3:</label>

            <div class="col-md-3">
                <input type="number" step=".01" class="form-control maxlength-handler" name="price_wholesale_3" value="{{ old('price_wholesale_3', is_numeric($product->price_wholesale_3) ? $product->price_wholesale_3 : 0 )  }}">
            </div>
            @endif
        </div>

        @if(!empty($global_prices['nlb24']))
        <div class="form-group">
            <label class="col-md-2 control-label">NLB 24 рати:</label>
            <div class="col-md-3">
                <input type="number" step=".01" class="form-control maxlength-handler" name="price_nlb_24" required="required" value="{{ old('price_nlb_24', is_numeric($product->price_nlb_24) ? $product->price_nlb_24 : 0 ) }}">
            </div>
            <label class="col-md-2 control-label"></label>

            <div class="col-md-3">

            </div>
        </div>
        @endif
        
        <div class="form-group">
            <label class="col-md-2 control-label">Цена со попуст : <br />(Малопродажна 1) </label>
            <div class="col-md-3">
                @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
                <input type="number" step=".01" class="form-control maxlength-handler" name="discount" value="{{ old('discount', EasyShop\Models\Product::getPriceRetail1($product, false, 0)) }}">
                @else
                <input type="number" step=".01" class="form-control maxlength-handler" name="discount" value="{{ old('discount') }}">
                @endif
            </div>
            <label class="col-md-2 control-label"></label>

            <div class="col-md-3">

            </div>
        </div>
        




        @if(isset($prices_history))

        <hr>
        <div class="form-group">
            <div class="col-md-2 control-label">
                <h5 style="padding-bottom: 15px;" class="bold">Историја на цени</h5>
            </div>
            <div class="col-md-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Цена</th>
                            <th scope="col">Датум</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach( $prices_history as $key => $price )
                        <tr>
                            <th scope="row">{{ ++$key }}</th>
                            <td>{{ $price->price }}</td>
                            <td>{{  \Carbon\Carbon::parse($price->created_at)->format('d.m.Y') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @endif



    </div>
</div>
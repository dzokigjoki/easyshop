<?php
$google_product_category = \EasyShop\Models\AdminSettings::getField('showGoogleProductCategoryField');
?>

<style>
    .pt-50 {
        padding-top: 50px !important;
    }
</style>

<div class="tab-pane active" id="tab_general">
    <div class="form-body">
        <div class="form-group ">

            @if (\EasyShop\Models\AdminSettings::isSetTrue('bundle', 'modules'))
            <div class="row">
                <label class="col-md-2 control-label">Bundle:</label>
                <div class="col-md-3">
                    <input id="bundle-check" name="bundle" type="checkbox" class="make-switch" data-on-text="Да" data-off-text="Не" value="1" @if(old('bundle', $product->bundle)) checked @endif />
                </div>
            </div>
            <br>
            <div class="row bundle-count" style="display: none;">
                <label class="bundle-count col-md-2 control-label">Број на продукти:</label>
                <div class="col-md-4">
                    <input name="bundle_products_number" id="bundle_products_number" class="form-control" type="number" onkeypress="return isNumberKey(event)" min="0" value="{{ $product->bundle_products_number }}" />
                </div>
            </div>
            <br>
            <div class="row bundle-count" style="display: none;">
                <label class="bundle-count col-md-2 control-label">Тип на цена:</label>
                <div class="col-md-4">
                    <select style="width:100%" class="table-group-action-input form-control" name="bundle_price_type" id="bundle_price_type">
                        <option @if( isset($product->bundle_price_type) && $product->bundle_price_type == 'fixed')
                            selected @endif value="fixed">Фиксна</option>
                            <option @if( isset($product->bundle_price_type) && $product->bundle_price_type == 'percent')
                            selected @endif value="percent">Процентуална
                        </option>
                    </select>
                </div>
            </div>
            <br>
            @endif

            <div class="@if($errors->has('title')) has-error  @endif">
                <label class="col-md-2 control-label">Име на артикл:<span class="required"> * </span></label>
            </div>
            <div class="col-md-5 @if($errors->has('title')) has-error  @endif">
                <input type="text" id="title" class="form-control" name="title" value="{{ old('title', $product->title) }}">
            </div>
            <div class="unit_code @if($errors->has('unit')) has-error  @endif">
                <label class="col-md-2 control-label">Шифра:</label>
            </div>
            <div class="col-md-3 unit_code @if($errors->has('unit')) has-error  @endif">
                <input type="text" class="form-control" name="unit_code" placeholder="Остави празно за автоматска шифра" value="{{ old('unit_code', $product->unit_code) }}">
            </div>
        </div>
        <div class="form-group">
            <div class="@if($errors->has('url')) has-error  @endif">
                <label class="col-md-2 control-label">URL:<span class="required"> * </span></label>
            </div>
            <div class="col-md-5 @if($errors->has('url')) has-error  @endif">
                <input id="url" type="text" class="form-control" value="{{ old('url', $product->url) }}" name="url">
            </div>
            <div class="barcode @if($errors->has('sku')) has-error  @endif">
                <label class="col-md-2 control-label">Баркод:</label>
            </div>
            <div class="barcode col-md-3 @if($errors->has('sku')) has-error  @endif">
                <input type="text" class="form-control" name="sku" value="{{ old('sku', $product->sku) }}">
            </div>
        </div>
        <div class="form-group">
            <div class="@if($errors->has('categories')) has-error  @endif">
                <label class="col-md-2 control-label">Категорија:<span class="required"> * </span></label>
            </div>
            <div class="col-md-5 @if($errors->has('categories')) has-error  @endif">
                <select id="article_cat" name="categories[]" class="form-control select2-multiple select2-button-multiselect-value" multiple>
                    {{!!$categires_html!!}}
                </select>
            </div>

            <label class="col-md-2 control-label type-data">Тип:<span class="required"> * </span></label>
            <div class="col-md-3 type-data">
                <select class="table-group-action-input form-control input-medium" name="type" id="type">
                    <option value="product">Производ</option>
                    <option @if(old('type', $product->type) == 'service') selected @endif value="service">Услуга
                    </option>
                </select>
            </div>
            </span>
        </div>
        <div class="form-group">
            <div class="@if($errors->has('short_description')) has-error  @endif">
                @if(config( 'app.client') == 'kopkompani')
                <label class="col-md-2 control-label">Локација:</label>
                @else
                <label class="col-md-2 control-label">Краток опис:</label>
                @endif
            </div>
            <div class="col-md-5 @if($errors->has('short_description')) has-error  @endif">
                <textarea id="short_description notranslate" class="form-control" name="short_description">{!! old('short_description', $product->short_description) !!}</textarea>
            </div>
            <label class="col-md-2 control-label type-data">Данок:<span class="required"> * </span></label>
            <div class="col-md-3 type-data">
                <select class="table-group-action-input form-control input-medium" name="vat" id="vat">
                    <option value="">-- Изберете даночна стапка --</option>
                    <option @if( isset($product->vat) && $product->vat == 20) selected @endif value="20">20%</option>
                    <option @if( isset($product->vat) && $product->vat == 18) selected @endif value="18">18%</option>
                    <option @if( isset($product->vat) && $product->vat == 5) selected @endif value="5">5%</option>
                    <option @if( isset($product->vat) && $product->vat == 0) selected @endif value="0">0%</option>
                </select>
            </div>
            <br /><br />
            <div class="warranty @if($errors->has('warranty_months')) has-error  @endif">
                <label class="col-md-2 control-label">Гаранција (месеци):</label>
            </div>
            <div class="warranty col-md-3 @if($errors->has('warranty_months')) has-error  @endif">
                <input type="number" onkeypress="return isNumberKey(event)" min="0" class="form-control" name="warranty_months" value="{{old('warranty_months', $product->warranty_months)}}">
            </div>
        </div>

        @if($shopImporter || (config( 'app.client') == 'dobra_voda'))
        <div class="form-group">
            @if($shopImporter)
            <label class="col-md-2 control-label">Увозник:</label>
            <div class="col-md-5 @if($errors->has('importer')) has-error  @endif">
                <select class="form-control select2-multiple select2-button-multiselect-value" name="importer" id="importer">
                    <option value="">Избери</option>
                    @foreach($importers as $im)
                    <option @if($product->importer_id == $im->id) selected @endif value="{{$im->id}}">{{$im->name}}
                    </option>
                    @endforeach
                </select>
            </div>
            @else
            <div class="col-md-7"></div>
            @endif
            @if(config( 'app.client') == 'dobra_voda')
            <label class="col-md-2 control-label">Пакување:</label>

            <div class="col-md-3">
                <input type="text" class="form-control" name="package" value="{{ old('package', $product->package) }}">
            </div>
            @endif
        </div>
        @endif

        @if($showZemjaNaPoteklo || \EasyShop\Models\AdminSettings::getField('defaultRecommeded'))


        <div class="form-group">
            @if($showZemjaNaPoteklo)
            <label class="col-md-2 control-label">Земја на потекло:</label>
            <div class="col-md-5 @if($errors->has('zemja_na_poteklo')) has-error  @endif">
                <select class="form-control select2-multiple select2-button-multiselect-value" name="zemja_poteklo" id="zemja_poteklo">
                    <option value="">Избери</option>
                    @foreach($countries as $country)
                    <option @if($product->zemja_poteklo == $country->id) selected @endif
                        value="{{$country->id}}">{{$country->country_name}}</option>
                    @endforeach
                </select>
            </div>
            @else
            <div class="col-md-7"></div>
            @endif
            @if(\EasyShop\Models\AdminSettings::getField('defaultRecommeded'))
            <label class="col-md-2 control-label">Реден број за сортирање:</label>

            <div class="col-md-3">
                <input type="number" class="form-control" name="orderNumber" value="{{ !is_null($orderNumber) ? $orderNumber : $product->order }}">
            </div>
            @endif
        </div>
        @endif

        <div class="form-group">
            @if($showManufacturer)
            <label class="col-md-2 control-label manufacturer">Производител:</label>
            <div class="col-md-5 manufacturer @if($errors->has('manufacturer')) has-error  @endif">
                <select class="form-control select2-multiple select2-button-multiselect-value" name="manufacturer" id="manufacturer">
                    <option value="">Избери</option>
                    @foreach($manufacturers as $mf)
                    <option @if($product->manufacturer_id == $mf->id) selected @endif value="{{$mf->id}}">{{$mf->name}}
                    </option>
                    @endforeach
                </select>
            </div>
            @else
            <div class="col-md-2"></div>
            <div class="col-md-5"></div>
            @endif
            <label class="col-md-2 control-label">Посети:</label>
            <div class="col-md-3">
                <input name="visits" class="form-control" type="number" onkeypress="return isNumberKey(event)" min="0" value="{{ $product->visits }}" />
            </div>
            
        </div>
        @if($showVariation)
        @foreach($variations as $key => $value)
        <div class="form-group">
            <label class="col-md-2 control-label">{{ $key }} :</label>

            <div class="col-md-5">
                <select name="variation[]" class="form-control select2-multiple select2-button-multiselect-value" id="variation" multiple="">
                    <option></option>
                    @foreach($value as $variation)
                    <option @if(in_array($variation->id,$selected_variations)) selected @endif
                        value="{{$variation->id}}">{{$variation->value}}</option>
                    @endforeach
                </select>
            </div>
            <label class="col-md-2 control-label"></label>
            <div class="col-md-3">
            </div>
        </div>
        @endforeach
        @endif
        <div class="form-group">
            <label class="col-md-2 control-label">Означи како Нов од:<span class="required"> * </span></label>
            <div class="col-md-5">
                <div class="input-group input-large date-picker input-daterange" data-date="10.11.2012" data-date-format="dd.mm.yyyy" data-date-week-start="1">
                    <input type="text" class="form-control" name="new_from" value="{{date('d.m.Y', strtotime(old('new_from', $product->new_from)))}}" style="text-align:left;">
                    <span class="input-group-addon"> до </span>
                    <input type="text" class="form-control" name="new_to" value="{{date('d.m.Y', strtotime(old('new_to', $product->new_to)))}}" style="text-align:left;">
                </div>
            </div>
            <label class="col-md-2 control-label">Активен:</label>
            <div class="col-md-3">
                <input name="active" type="checkbox" class="make-switch" data-on-text="Да" data-off-text="Не" value="1" @if(old('active', $product->active)) checked @endif />
            </div>
            <br>
            <label class="col-md-2 control-label">Достапно само во продавница:</label>
            <div class="col-md-3">
                <input name="physical_buy_only" type="checkbox" class="make-switch" data-on-text="Да" data-off-text="Не" value="1" @if (old('physical_buy_only', $product->physical_buy_only)) checked @endif>
            </div>
            <br /><br />


        </div>
        <div class="form-group">
            <label class="col-md-9 control-label">Прикажи на веб:</label>
            <div class="col-md-3">
                <input name="show_on_web" type="checkbox" class="make-switch" data-on-text="Да" data-off-text="Не" value="1" @if(old('is_exclusive', $product->show_on_web)) checked @endif>
            </div>
            <br /><br />
            <label class="col-md-9 control-label">Продажба на веб:</label>
            <div class="col-md-3">
                <input name="sell_on_web" type="checkbox" class="make-switch" data-on-text="Да" data-off-text="Не" value="1" @if(old('is_exclusive', $product->sell_on_web)) checked @endif>
            </div>
            <br /><br />





            @if(config( 'app.client') == 'torti')
            <label class="col-md-9 control-label">Можност за декорација:</label>
            <div class="col-md-3">
                <input name="custom" type="checkbox" class="make-switch" data-on-text="Да" data-off-text="Не" value="1" @if(old('custom', $product->custom)) checked @endif>
            </div><br><br>
            @endif
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label">Главна слика 
            </label>
            <div class="col-md-5">
                <div class="fileinput fileinput-new" data-provides="fileinput">
                    <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                        @if(!empty($product->image))
                        <img src="/uploads/products/{{$product->id}}/md_{{$product->image}}" />
                        @else
                        <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" />
                        @endif
                    </div>
                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                    <div>
                        <span class="btn default btn-file">
                            <span class="fileinput-new"> Избери слика </span>
                            <span class="fileinput-exists"> Промени </span>
                            <input type="file" name="image"> </span>
                        <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Избриши </a>
                    </div>
                </div>
            </div>
            <label class="col-md-2 control-label">Ексклузивно:</label>
            <div class="col-md-3">
                <input name="is_exclusive" type="checkbox" class="make-switch" data-on-text="Да" data-off-text="Не" value="1" @if(old('is_exclusive', $product->is_exclusive)) checked @endif>
            </div>
            <br /><br />
            <label class="col-md-2 control-label">Препорачано:</label>
            <div class="col-md-3">
                <input name="is_recommended" type="checkbox" class="make-switch" data-on-text="Да" data-off-text="Не" value="1" @if(old('is_recommended', $product->is_recommended)) checked @endif>
            </div>
            <br /><br />
            <label class="col-md-2 control-label">Best Seller:</label>
            <div class="col-md-3">
                <input name="is_best_seller" type="checkbox" class="make-switch" data-on-text="Да" data-off-text="Не" value="1" @if (old('is_best_seller', $product->is_best_seller)) checked @endif>
            </div>
            <br /><br />
            <label class="col-md-2 control-label">Sold Out:</label>
            <div class="col-md-3">
                <input name="sold_out" type="checkbox" class="make-switch" data-on-text="Да" data-off-text="Не" value="1" @if (old('sold_out', $product->sold_out)) checked @endif>
            </div>
            <br /><br />




            {{-- <label class="col-md-2 control-label">Достапно само во продавница:</label>
            <div class="col-md-3">
                <input name="physical_buy_only" type="checkbox" class="make-switch" data-on-text="Да" data-off-text="Не"
                    value="1" @if (old('physical_buy_only', $product->physical_buy_only)) checked @endif>
            </div> --}}
            <br><br>
            <label class="col-md-2 control-label">Дневна промоција:</label>
            <div class="col-md-3 clearfix">
                <div style="width: calc(100% - 50px);float: left;" class="input-group date date-picker" data-date-format="dd.mm.yyyy" data-date-week-start="1">
                    <input type="text" class="form-control" readonly="" name="daily_promotion" @if(old('daily_promotion')) value="{{date('d.m.Y', old('daily_promotion'))}}" @elseif(!is_null($product->daily_promotion))
                    value="{{date('d.m.Y', strtotime($product->daily_promotion))}}"
                    @endif

                    >
                    <span class="input-group-btn">
                        <button class="btn default" type="button">
                            <i class="fa fa-calendar"></i>
                        </button>
                    </span>
                </div>
                <button style="width: 50px;float:left;text-align: center" onclick="document.querySelector('[name=daily_promotion]').value = ''" class="btn primary" type="button">
                    <i class="fa fa-times"></i>
                </button>
            </div>
            <br /><br />
        </div>

                    @if (in_array(config('app.client'), \EasyShop\Models\Settings::CLIENT_NATURATHERAPY_SHOPS))

                    <div class="form-group">
                        <div class="@if($errors->has('title')) has-error  @endif">
                            <label class="col-md-2 control-label">PDF документ:<span class="required"> * </span></label>
                        </div>
                        
                        <div id="hidden_document_id" class="col-md-5 @if($errors->has('pdf_document')) has-error  @endif
                            @if(file_exists(public_path() . '/uploads/products/' . $product->id."/pdf.pdf"))
                            hide
                            @endif
                            ">
                            <input type="file" id="pdf_document" class="form-control" name="pdf_document">
                        </div>
                        @if(file_exists(public_path() . '/uploads/products/' . $product->id."/pdf.pdf"))
                        
                        <embed class="hide_the_document" src="{{asset('uploads/products')}}/{{$product->id}}/pdf.pdf" width="500" height="375" 
                        type="application/pdf">
                        <button style="width: 50px;position: absolute;text-align: center" id="delete_pdf" data-id={{ $product->id }} class="btn btn-danger hide_the_document" type="button">
                            <i class="fa fa-times"></i>
                        </button>
                        @endif
                    </div>
                    @endif
        {{-- <div class="form-group">
            <div class="minimum-supply @if($errors->has('minimum_stock')) has-error  @endif">
                <label class="col-md-9 control-label">Минимум залиха:</label>
            </div>
            <div class="minimum-supply col-md-3 @if($errors->has('minimum_stock')) has-error  @endif">
                <input type="number" class="form-control maxlength-handler" name="minimum_stock"
                    onkeypress="return isNumberKey(event)" min="0" maxlength="10"
                    value="{{old('minimum_stock', $product->minimum_stock)}}">
    </div>
</div> --}}
<div class="form-group">
    <div class="minimum-supply @if($errors->has('minimum_stock_alert')) has-error  @endif">
        <label class="col-md-9 control-label">Известување за недостаток на залиха:</label>
    </div>
    <div class="minimum-supply col-md-3">
        <input name="minimum_stock_alert" class="form-control maxlength-handler" type="number" onkeypress="return isNumberKey(event)" min="0" maxlength="10" value="{{ isset($product->minimum_stock_alert) ? $product->minimum_stock_alert : 7 }}" />
    </div>
</div>
<div class="form-group">
    <label class="quantity-input col-md-9 control-label">Залиха:</label>
    <div class="col-md-3 quantity-input">
        <input type="text" disabled class="form-control maxlength-handler" name="total_stock" maxlength="20" placeholder="" value="{{ !is_null($product->total_stock) ? $product->total_stock : 0 }}">
    </div>
</div>
@if(config( 'app.client') == 'matica' || config( 'app.client') == 'hotspot')
<div class="form-group">
    <label class="control-label col-md-9">Стикер</label>
    <div class="col-md-3">
        <select id="sticker" name="sticker" class="form-control select2">
            <option value="" selected>Избери</option>
            @foreach($stickers as $sticker)
            <option value="{{$sticker->id}}" @if($sticker->id == $product->sticker_id)
                selected @endif>
                {{$sticker->name}}</option>
            @endforeach
        </select>
        <div class="help-block">Остави празно ако нема стикер</div>
    </div>
</div>
@endif
@if($google_product_category)
<div class="form-group">
    <div class="@if($errors->has('google_product_category')) has-error  @endif">
        <label style="margin-top: -10px;" class="col-md-2 control-label">Google product category: </label>
    </div>
    <div class="col-md-5 @if($errors->has('google_product_category')) has-error @endif">
        <input id="google_product_category" type="text" name="google_product_category" class="form-control" value="{{ old('google_product_category', $product->google_product_category) }}">
    </div>
    <div class="form-group">
        <div class="@if($errors->has('google_product_category')) has-error  @endif">
            <label style="visibility: hidden;" class="col-md-2 control-label"></label>
        </div>
        <div style="margin-top: -15px; font-size: 12px;" class="col-md-5 @if($errors->has('google_product_category')) has-error @endif">
            <a href="https://www.google.com/basepages/producttype/taxonomy-with-ids.en-US.txt" target="_blank">Google's
                product taxonomy</a>
        </div>
    </div>
    @endif
    @if(\EasyShop\Models\AdminSettings::getField('children'))
    <div class="form-group">
        <label class="col-md-2 control-label">Поврзан производ:</label>
        <div class="col-md-5 @if($errors->has('parent_product')) has-error  @endif">
            <select class="form-control select2-multiple select2-button-multiselect-value" name="parent_product" id="parent_product">
                <option value="">Избери</option>
                @foreach($products as $parentProduct)
                <option @if($parentProduct->id == $product->parent_product) selected @endif
                    value="{{ $parentProduct->id }}">
                    {{ $parentProduct->title }}
                </option>
                @endforeach
            </select>
        </div>
        <div class="col-md-5"></div>
    </div>
    @endif
    <br /><br />

    @if (\EasyShop\Models\AdminSettings::isSetTrue('bundle', 'modules') && isset($bundleProducts))
    <div class="form-group" id="bundle-section" style="display: none;">
        <label class="col-md-2 control-label"></label>
        <div class="col-md-5">
            <h5>
                Производи во bundle

            </h5>
            <table class="table">
                <thead>
                    <th>Наслов</th>
                    <th>Кол</th>
                    <th></th>
                </thead>
                <tbody id="bundle-table">

                    <tr>
                        <td>
                            <select class="form-control bundle-products-selector" style="width:100%;" name="bundle_product" id="bundle_product_select">
                                <option selected>Одбери производ</option>s
                                @foreach($bundleProducts as $bundleProduct)
                                <option value="{{$bundleProduct->id}}">{{$bundleProduct->title}}</option>
                                @endforeach
                            </select>
                        </td>
                        <td style="width: 71px;">
                            <input style="width:71px; height: 33.5px;" type="number" min="0" id="bundle_product_quantity"    class="form-control input-sm" placeholder="">
                        </td>
                        <td>
                            <button type="button" class="btn btn-info blue-soft" data-save>
                                <i class="fa fa-plus"></i>
                            </button>
                        </td>
                    </tr>
                    @if(isset($bundleProductsSaved) && count($bundleProductsSaved) > 0)
                    
                    @foreach($bundleProductsSaved as $bundleProduct)
                    <tr>
                        <td> {{$bundleProduct->title}} </td>
                        <td> {{$bundleProduct->quantity}} </td>
                        <td><button data-product-id="{{$bundleProduct->id}}" type='button' class='btn btn-info red-soft' data-remove><i class='fa fa-trash'></i></button>
                        </td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
    @endif




    <div class="form-group">
        <label class="col-md-2 control-label">Опис:</label>
        <div class="col-md-10 notranslate">
            <textarea class="summernote notranslate" name="description">{!! old('description', $product->description) !!}</textarea>

        </div>
    </div>
</div>
</div>

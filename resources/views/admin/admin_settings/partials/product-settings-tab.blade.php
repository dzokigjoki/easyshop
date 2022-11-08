<div class="tab-pane" id="product-settings-tab">
    <div class="col-md-10">
        <div class="form-group col-md-12">
            <label class="col-md-3 control-label">Прикажи варијации:</label>

            <div class="col-md-9">
                <input name="boolean_showVariations" type="hidden" data-on-text="Да" data-off-text="Не" value="0">
                <input name="boolean_showVariations" @if (isset($showVariations) && $showVariations) ) checked @endif
                    type="checkbox" class="make-switch" data-on-text="Да" data-off-text="Не" value="1">
            </div>
        </div>

        <div class="form-group col-md-12">
            <label class="col-md-3 control-label">Прикажи произведувач:</label>

            <div class="col-md-9">
                <input name="boolean_showManufacturer" type="hidden" data-on-text="Да" data-off-text="Не" value="0">
                <input name="boolean_showManufacturer" @if (isset($showManufacturer) && $showManufacturer) ) checked @endif
                    type="checkbox" class="make-switch" data-on-text="Да" data-off-text="Не" value="1">
            </div>
        </div>
        <div class="form-group col-md-12">
            <label class="col-md-3 control-label">ShopImporter:</label>

            <div class="col-md-9">
                <input name="boolean_shopImporter" type="hidden" data-on-text="Да" data-off-text="Не" value="0">
                <input name="boolean_shopImporter" @if (isset($shopImporter) && $shopImporter) ) checked @endif type="checkbox" class="make-switch" data-on-text="Да"
                    data-off-text="Не" value="1">
            </div>
        </div>
        <div class="form-group col-md-12">
            <label class="col-md-3 control-label">Прикажи земја потекло:</label>

            <div class="col-md-9">
                <input name="boolean_showZemjaNaPoteklo" type="hidden" data-on-text="Да" data-off-text="Не" value="0">
                <input name="boolean_showZemjaNaPoteklo" @if (isset($showZemjaNaPoteklo) && $showZemjaNaPoteklo) ) checked @endif type="checkbox" class="make-switch" data-on-text="Да" data-off-text="Не" value="1">
            </div>
        </div>
        <div class="form-group col-md-12">
            <label class="col-md-3 control-label">Default Recommended products:</label>

            <div class="col-md-9">
                <input name="boolean_defaultRecommeded" type="hidden" data-on-text="Да" data-off-text="Не" value="0">
                <input name="boolean_defaultRecommeded" @if (isset($defaultRecommeded) && $defaultRecommeded) ) checked @endif
                    type="checkbox" class="make-switch" data-on-text="Да" data-off-text="Не" value="1">
            </div>

        </div>
        <div class="form-group col-md-12">
            <label class="col-md-3 control-label">Деца варијации:</label>

            <div class="col-md-9">
                <input name="boolean_children" type="hidden" data-on-text="Да" data-off-text="Не" value="0">
                <input name="boolean_children" @if (isset($children) && $children) ) checked @endif type="checkbox" class="make-switch" data-on-text="Да"
                    data-off-text="Не" value="1">
            </div>

        </div>
        <div class="form-group col-md-12">
            <label class="col-md-3 control-label">Прикажи деца продукти:</label>

            <div class="col-md-9">
                <input name="boolean_showChildren" type="hidden" data-on-text="Да" data-off-text="Не" value="0">
                <input name="boolean_showChildren" @if (isset($showChildren) && $showChildren) ) checked @endif type="checkbox" class="make-switch" data-on-text="Да"
                    data-off-text="Не" value="1">
            </div>

        </div>
        <div class="form-group col-md-12">
            <label class="col-md-3 control-label">Watermark:</label>

            <div class="col-md-3">
                <input name="boolean_watermark" type="hidden" data-on-text="Да" data-off-text="Не" value="0">
                <input name="boolean_watermark" @if (isset($watermark) && $watermark) ) checked @endif type="checkbox" class="make-switch" data-on-text="Да"
                    data-off-text="Не" value="1">
            </div>

        </div>
        <div class="form-group col-md-12">
            <label class="col-md-3 control-label">Промоција:</label>

            <div class="col-md-3">
                <input name="boolean_promotion" type="hidden" data-on-text="Да" data-off-text="Не" value="0">
                <input name="boolean_promotion" @if (isset($promotion) && $promotion) ) checked @endif type="checkbox" class="make-switch" data-on-text="Да"
                    data-off-text="Не" value="1">
            </div>

        </div>
        <div class="form-group col-md-12">
            <label class="col-md-3 control-label">Google product field:</label>

            <div class="col-md-9">
                <input name="boolean_showGoogleProductCategoryField" type="hidden" data-on-text="Да" data-off-text="Не"
                    value="0">
                <input name="boolean_showGoogleProductCategoryField" @if (isset($showGoogleProductCategoryField) && $showGoogleProductCategoryField) ) checked @endif type="checkbox" class="make-switch" data-on-text="Да"
                    data-off-text="Не" value="1">
            </div>

        </div>
        <div class="form-group col-md-12">
            <label class="col-md-3 control-label">First order discount:</label>

            <div class="col-md-9">
                <input name="boolean_firstOrderDiscount" type="hidden" data-on-text="Да" data-off-text="Не" value="0">
                <input name="boolean_firstOrderDiscount" @if (isset($firstOrderDiscount) && $firstOrderDiscount) ) checked @endif type="checkbox" class="make-switch" data-on-text="Да" data-off-text="Не" value="1">
            </div>

        </div>
        <div class="form-group col-md-12">
            <label class="col-md-3 control-label">Type of first order discount:</label>

            <div class="col-md-9">
                <select class="form-control select2 select2-multiple select2-button-multiselect-value"  name="string_firstOrderDiscountTip">
                    <option @if (empty($firstOrderDiscountTip)) selected @endif
                        value="">Избери</option>
                    <option @if ($firstOrderDiscountTip == 'percent') selected @endif value="percent">Процент</option>
                    <option @if ($firstOrderDiscountTip == 'fixed') selected @endif
                        value="fixed">Фиксно</option>
                </select>
            </div>

        </div>
        <div class="form-group col-md-12">
            <label class="col-md-3 control-label">Value of first order discount:</label>

            <div class="col-md-9">
                <input type="text" class="form-control" placeholder="Вредност"
                    name="string_firstOrderDiscountValue"
                    value="{{ old('string_firstOrderDiscountValue', $firstOrderDiscountValue) }}">
            </div>

        </div>
    </div>
</div>

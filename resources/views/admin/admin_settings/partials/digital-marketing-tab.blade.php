<div class="tab-pane" id="digital-marketing-tab">
    <div class="col-md-10">
        <div class="form-group col-md-12">
            <label class="col-md-3 control-label">Pixel:</label>

            <div class="col-md-9">
                <input type="text" class="form-control" placeholder="Кодови за Pixel" name="string_pixelCode" value="{{ old('string_pixelCode', $pixelCode) }}">
            </div>
        </div>
        <div class="form-group col-md-12">
            <label class="col-md-3 control-label">Валута:</label>

            <div class="col-md-9">
                <input type="text" class="form-control" placeholder="Валута за Pixel" name="string_pixelDefaultCurrency"
                    value="{{ old('string_pixelDefaultCurrency', $pixelDefaultCurrency) }}">
            </div>
        </div>

        <div class="form-group col-md-12">
            <label class="col-md-3 control-label">Google Verification:</label>

            <div class="col-md-9">
                <input type="text" class="form-control" placeholder="Код за вклучување Google Verification"
                    name="string_googleVerification" value="{{ old('string_googleVerification', $googleVerification) }}">
            </div>
        </div>

        <div class="form-group col-md-12">
            <label class="col-md-3 control-label">Google Analytics:</label>

            <div class="col-md-9">
                <input type="text" class="form-control" placeholder="Код за вклучување Google Analytics"
                    name="string_googleAnalytics" value="{{ old('string_googleAnalytics', $googleAnalytics) }}">
            </div>
        </div>
        
    </div>
</div>

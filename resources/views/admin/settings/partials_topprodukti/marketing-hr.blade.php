<div id="hr" class="tab-pane col-md-12">
    <div class="form-group col-md-12">
        <label class="col-md-2 control-label">Facebook Pixel Код HR:</label>

        <div id="control-labelhr" class="col-md-3">
            {{--@if($errors->has('company_name')) has-error  @endif">--}}
            <input style="margin-bottom:10px;" type="text"
                   class="form-control" placeholder="Facebook Pixel Код"
                   name="facebook_pixel_hr[]"
                   @if(isset($settings))
                   value="{{$settings->facebook_pixel_hr}}"
                    @endif
            >
            {{--value="{{ old('company_name', $settings->company_name) }}"--}}
        </div>
        <a id="addPixelhr" class="col-md-1 btn btn-success">Нов код</a>
        <label class="col-md-offset-2 col-md-1 control-label">Валута: </label>
        <div class="col-md-3">
            <select class="table-group-action-input form-control input-medium" name="facebook_pixel_currency_hr" id="curr">
                <option @if(isset($settings)
                            && $settings->facebook_pixel_currency_hr === 'MKD')
                        selected @endif
                        value="MKD">MKD</option>
                <option @if(isset($settings)
                            && $settings->facebook_pixel_currency_hr === 'EUR')
                        selected @endif value="EUR">EUR</option>
                <option @if(isset($settings)
                            && $settings->facebook_pixel_currency_hr === 'BGN')
                        selected @endif value="BGN">BGN</option>
                <option @if(isset($settings)
                            && $settings->facebook_pixel_currency_hr === 'CZK')
                        selected @endif value="CZK">CZK</option>
                <option @if(isset($settings)
                            && $settings->facebook_pixel_currency_hr === 'HRK')
                        selected @endif value="HRK">HRK</option>
                <option @if(isset($settings)
                            && $settings->facebook_pixel_currency_hr === 'HUF')
                        selected @endif value="HUF">HUF</option>
                <option @if(isset($settings)
                            && $settings->facebook_pixel_currency_hr === 'PLN')
                        selected @endif value="PLN">PLN</option>
                <option @if(isset($settings)
                            && $settings->facebook_pixel_currency_hr === 'ROL')
                        selected @endif value="ROL">ROL</option>
                <option @if(isset($settings)
                            && $settings->facebook_pixel_currency_hr === 'RSD')
                        selected @endif value="RSD">RSD</option>
                <option @if(isset($settings)
                            && $settings->facebook_pixel_currency_hr === 'SIT')
                        selected @endif value="SIT">SIT</option>
                <option @if(isset($settings)
                            && $settings->facebook_pixel_currency_hr === 'SKK')
                        selected @endif value="SKK">SKK</option>
                <option @if(isset($settings)
                            && $settings->facebook_pixel_currency_hr === 'USD')
                        selected @endif value="USD">USD</option>
            </select>
        </div>
    </div>
</div>
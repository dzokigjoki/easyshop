<div id="cz" class="tab-pane col-md-12">
    <div class="form-group col-md-12">
        <label class="col-md-2 control-label">Facebook Pixel Код CZ:</label>

        <div id="control-labelcz" class="col-md-3">
            {{--@if($errors->has('company_name')) has-error  @endif">--}}
            <input style="margin-bottom:10px;" type="text"
                   class="form-control" placeholder="Facebook Pixel Код"
                   name="facebook_pixel_cz[]"
                    @if(isset($settings))
                        value="{{$settings->facebook_pixel_cz}}"
                        @endif
            >
            {{--value="{{ old('company_name', $settings->company_name) }}"--}}
        </div>
        <a id="addPixelcz" class="col-md-1 btn btn-success">Нов код</a>
        <label class="col-md-offset-2 col-md-1 control-label">Валута: </label>
        <div class="col-md-3">
            <select class="table-group-action-input form-control input-medium" name="facebook_pixel_currency_cz" id="curr">
                <option @if(isset($settings)
                            && $settings->facebook_pixel_currency_cz === 'MKD')
                            selected @endif
                        value="MKD">MKD</option>
                <option @if(isset($settings)
                            && $settings->facebook_pixel_currency_cz === 'EUR')
                        selected @endif value="EUR">EUR</option>
                <option @if(isset($settings)
                            && $settings->facebook_pixel_currency_cz === 'BGN')
                        selected @endif value="BGN">BGL</option>
                <option @if(isset($settings)
                            && $settings->facebook_pixel_currency_cz === 'CZK')
                        selected @endif value="CZK">CZK</option>
                <option @if(isset($settings)
                            && $settings->facebook_pixel_currency_cz === 'HRK')
                        selected @endif value="HRK">HRK</option>
                <option @if(isset($settings)
                            && $settings->facebook_pixel_currency_cz === 'HUF')
                        selected @endif value="HUF">HUF</option>
                <option @if(isset($settings)
                            && $settings->facebook_pixel_currency_cz === 'PLN')
                        selected @endif value="PLN">PLN</option>
                <option @if(isset($settings)
                            && $settings->facebook_pixel_currency_cz === 'ROL')
                        selected @endif value="ROL">ROL</option>
                <option @if(isset($settings)
                            && $settings->facebook_pixel_currency_cz === 'RSD')
                        selected @endif value="RSD">RSD</option>
                <option @if(isset($settings)
                            && $settings->facebook_pixel_currency_cz === 'SIT')
                        selected @endif value="SIT">SIT</option>
                <option @if(isset($settings)
                            && $settings->facebook_pixel_currency_cz === 'SKK')
                        selected @endif value="SKK">SKK</option>
                <option @if(isset($settings)
                            && $settings->facebook_pixel_currency_cz === 'USD')
                        selected @endif value="USD">USD</option>
            </select>
        </div>
    </div>
</div>
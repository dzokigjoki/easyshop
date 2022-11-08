<div class="tab-pane" id="basic-settings-tab">
    <div class="col-md-10">
        <div class="form-group col-md-12">
            <label class="col-md-3 control-label">Димензии за продукти:</label>

            <div class="col-md-3">
                <input type="text" class="form-control" placeholder="1000x1000" name="array_productssize_lg" @if (isset($productssize['lg'])) ) value="{{ old('array_productssize_lg', $productssize['lg']) }}" @endif>
                <div class="text-center">LG</div>
            </div>
            <div class="col-md-3">
                <input type="text" class="form-control" placeholder="500x500" name="array_productssize_md" @if (isset($productssize['md'])) ) value="{{ old('array_productssize_md', $productssize['md']) }}" @endif>
                <div class="text-center">MD</div>
            </div>
            <div class="col-md-3">
                <input type="text" class="form-control" placeholder="100x100" name="array_productssize_sm" @if (isset($productssize['sm'])) ) value="{{ old('array_productssize_sm', $productssize['sm']) }}" @endif>
                <div class="text-center">SM</div>
            </div>
        </div>
        <div class="form-group col-md-12">
            <label class="col-md-3 control-label">Димензии за блогови:</label>

            <div class="col-md-3">
                <input type="text" class="form-control" placeholder="1000x1000" name="array_blogssize_lg" @if (isset($blogssize['lg'])) value="{{ old('array_blogssize_lg', $blogssize['lg']) }}" @endif>
                <div class="text-center">LG</div>
            </div>
            <div class="col-md-3">
                <input type="text" class="form-control" placeholder="500x500" name="array_blogssize_md" @if (isset($blogssize['md'])) value="{{ old('array_blogssize_md', $blogssize['md']) }}" @endif>
                <div class="text-center">MD</div>
            </div>
            <div class="col-md-3">
                <input type="text" class="form-control" placeholder="100x100" name="array_blogssize_sm" @if (isset($blogssize['sm'])) value="{{ old('array_blogssize_sm', $blogssize['sm']) }}" @endif>
                <div class="text-center">SM</div>
            </div>
        </div>
        <div class="form-group col-md-12">
            <label class="col-md-3 control-label">Основна валута:</label>

            <div class="col-md-3">
                <input type="text" class="form-control" placeholder="Валута за продавницата" name="string_currency"
                    value="{{ old('string_currency', $currency) }}">
            </div>

        </div>
        <div class="form-group col-md-12">
            <label class="col-md-3 control-label">Додади валути:</label>

            <div class="col-md-3">
                <input type="text" class="form-control" placeholder="Име на валута" name="currency_name" value="">
            </div>
            <div class="col-md-3">
                <input type="text" class="form-control" placeholder="Делител" name="currency_divider" value="">
            </div>
            <i id="addNewCurrencies" class="fa fa-plus"></i>
        </div>

        

            <div @if (!$currencies) style="display: none" @endif class="form-group currencies col-md-12">
                <label class="col-md-3 control-label">Валути:</label>
                <div class="col-md-9">
                    <table id="currencies" class="table">
                        <thead>
                            <tr>
                                <th scope="col">Име</th>
                                <th scope="col">Делител</th>
                                <th scope="col">Акции</th>
                            </tr>
                        </thead>

                        <tbody>
                            @if ($currencies)
                            @foreach ($currencies as $i)
                                <tr>
                                    <td>{{ $i['name'] }}</td>
                                    <td>{{ $i['divider'] }}</td>
                                    <td><i data-name="{{ $i['name'] }}" data-field="currencies" class="fa fa-remove deleteField"></i>
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
            <label class="col-md-3 control-label">Recaptcha sitekey:</label>

            <div class="col-md-9">
                <input type="text" class="form-control" placeholder="Recaptcha клуч" name="string_recaptchaSitekey"
                    value="{{ old('string_recaptchaSitekey', $recaptchaSitekey) }}">
            </div>
        </div>
        <div class="form-group col-md-12">
            <label class="col-md-3 control-label">Recaptcha secret:</label>

            <div class="col-md-9">
                <input type="text" class="form-control" placeholder="Recaptcha кодот" name="string_recaptchaSecret"
                    value="{{ old('string_recaptchaSecret', $recaptchaSecret) }}">
            </div>
        </div>
    </div>
    
</div>

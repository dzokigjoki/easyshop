<div class="tab-pane active" id="company">
<div class="col-md-6">
    <div class="form-group col-md-12">
        <label class="col-md-4 control-label">Компанија:</label>

        <div class="col-md-8 @if($errors->has('company_name')) has-error  @endif">
            <input type="text" class="form-control" placeholder="Име" name="company_name"
                   value="{{ old('company_name', $settings->company_name) }}">
        </div>
    </div>
    <div class="form-group col-md-12">
        <label class="col-md-4 control-label">Адреса:</label>

        <div class="col-md-8 @if($errors->has('company_address')) has-error  @endif">
            <input type="text" class="form-control" placeholder="Адреса" name="company_address"
                   value="{{ old('company_address', $settings->company_address) }}">
        </div>
    </div>
    <div class="form-group col-md-12">
        <label class="col-md-4 control-label">Држава:</label>

        <div class="col-md-8 @if($errors->has('company_country')) has-error  @endif">
            <input type="text" class="form-control" placeholder="Држава" name="company_country"
                   value="{{ old('company_country', $settings->company_country) }}">
        </div>
    </div>
    <div class="form-group col-md-12">
        <label class="col-md-4 control-label">Град:</label>

        <div class="col-md-8 @if($errors->has('company_city')) has-error  @endif">
            <input type="text" class="form-control" placeholder="Град" name="company_city"
                   value="{{ old('company_city', $settings->company_city) }}">
        </div>
    </div>
    <div class="form-group col-md-12">
        <label class="col-md-4 control-label">Мета Home page:</label>

        <div class="col-md-8 @if($errors->has('meta_string_homepage')) has-error  @endif">
            <input type="text" class="form-control" placeholder="Мета стринг Home page" name="meta_string_homepage"
                   value="{{ old('meta_string_homepage', $settings->meta_string_homepage) }}">
        </div>
    </div>
    <div class="form-group col-md-12">
        <label class="col-md-4 control-label">Даночен број:</label>

        <div class="col-md-8 @if($errors->has('company_vat_number')) has-error  @endif">
            <input type="text" class="form-control" placeholder="Даночен број" name="company_vat_number"
                   value="{{ old('company_vat_number', $settings->company_vat_number) }}">
        </div>
    </div>


    <div class="form-group col-md-12">
        <label class="col-md-4 control-label">Банка:</label>

        <div class="col-md-8 @if($errors->has('company_bank_name')) has-error  @endif">
            <input type="text" class="form-control" placeholder="Банка" name="company_bank_name"
                   value="{{ old('company_bank_name', $settings->company_bank_name) }}">
        </div>
    </div>
    <div class="form-group col-md-12">
        <label class="col-md-4 control-label">Сметка:</label>

        <div class="col-md-8 @if($errors->has('company_bank_account')) has-error  @endif">
            <input type="text" class="form-control" placeholder="Сметка" name="company_bank_account"
                   value="{{ old('company_bank_account', $settings->company_bank_account) }}">
        </div>
    </div>
    <div class="form-group col-md-12">
        <label class="col-md-4 control-label">Банка (2):</label>

        <div class="col-md-8 @if($errors->has('company_bank_name_2')) has-error  @endif">
            <input type="text" class="form-control" placeholder="Банка" name="company_bank_name_2"
                   value="{{ old('company_bank_name_2', $settings->company_bank_name_2) }}">
        </div>
    </div>
    <div class="form-group col-md-12">
        <label class="col-md-4 control-label">Сметка (2):</label>

        <div class="col-md-8 @if($errors->has('company_bank_account_2')) has-error  @endif">
            <input type="text" class="form-control" placeholder="Сметка" name="company_bank_account_2"
                   value="{{ old('company_bank_account_2', $settings->company_bank_account_2) }}">
        </div>
    </div>
    <div class="form-group col-md-12">
        <label class="col-md-4 control-label">Банка (3):</label>

        <div class="col-md-8 @if($errors->has('company_bank_name_3')) has-error  @endif">
            <input type="text" class="form-control" placeholder="Банка" name="company_bank_name_3"
                   value="{{ old('company_bank_name_3', $settings->company_bank_name_3) }}">
        </div>
    </div>
    <div class="form-group col-md-12">
        <label class="col-md-4 control-label">Сметка (3):</label>

        <div class="col-md-8 @if($errors->has('company_bank_account_3')) has-error  @endif">
            <input type="text" class="form-control" placeholder="Сметка" name="company_bank_account_3"
                   value="{{ old('company_bank_account_3', $settings->company_bank_account_3) }}">
        </div>
    </div>
    <div class="form-group col-md-12">
        <label class="col-md-4 control-label">Банка (4):</label>

        <div class="col-md-8 @if($errors->has('company_bank_name_4')) has-error  @endif">
            <input type="text" class="form-control" placeholder="Банка" name="company_bank_name_4"
                   value="{{ old('company_bank_name_4', $settings->company_bank_name_4) }}">
        </div>
    </div>
    <div class="form-group col-md-12">
        <label class="col-md-4 control-label">Сметка (4):</label>

        <div class="col-md-8 @if($errors->has('company_bank_account_4')) has-error  @endif">
            <input type="text" class="form-control" placeholder="Сметка" name="company_bank_account_4"
                   value="{{ old('company_bank_account_4', $settings->company_bank_account_4) }}">
        </div>
    </div>
</div>
</div>
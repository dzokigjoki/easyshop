<div class="tab-pane active" id="basic-info-tab">
    <div class="col-md-10">
        <div class="form-group col-md-12">
            <label class="col-md-3 control-label">Наслов:</label>

            <div class="col-md-9">
                <input type="text" class="form-control" placeholder="Наслов на продавницата" name="string_titlepage"
                    value="{{ old('string_titlepage', $titlepage) }}">
            </div>
        </div>
        <div class="form-group col-md-12">
            <label class="col-md-3 control-label">Лого:</label>

            <div class="col-md-5">
                <div class="fileinput fileinput-new" data-provides="fileinput">
                    <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                        @if (!is_null($logo))
                            <img src="{{ $logo }}" />
                        @else
                            <img src="https://via.placeholder.com/200x150" />
                        @endif
                    </div>
                    <div class="fileinput-preview fileinput-exists thumbnail"
                        style="max-width: 200px; max-height: 150px;"> </div>
                    <div>
                        <span class="btn default btn-file">
                            <span class="fileinput-new"> Избери слика </span>
                            <span class="fileinput-exists"> Промени </span>
                            <input type="file" name="image_logo"> </span>
                        <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Избриши </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group col-md-12">
            <label class="col-md-3 control-label">Locale:</label>

            <div class="col-md-9">
                <input type="text" class="form-control" name="string_locale"
                    value="{{ old('string_locale', $locale) }}">
            </div>
        </div>
        <div class="form-group col-md-12">
            <label class="col-md-3 control-label">Домеин за е-пошта:</label>

            <div class="col-md-9">
                <input type="text" class="form-control" placeholder="exp: shop.com" name="string_emaildomain"
                    value="{{ old('string_emaildomain', $emaildomain) }}">
            </div>
        </div>
        <div class="form-group col-md-12">
            <label class="col-md-3 control-label">Е-пошта за контакт:</label>

            <div class="col-md-9">
                <input type="email" class="form-control" placeholder="exp: info@shop.com" name="string_contactemail"
                    value="{{ old('string_contactemail', $contactemail) }}">
            </div>
        </div>
        <div class="form-group col-md-12">
            <label class="col-md-3 control-label">Телефон:</label>

            <div class="col-md-9">
                <input type="text" class="form-control" placeholder="Телефон" name="string_telephone"
                    value="{{ old('string_telephone', $telephone) }}">
            </div>

        </div>
    </div>
</div>

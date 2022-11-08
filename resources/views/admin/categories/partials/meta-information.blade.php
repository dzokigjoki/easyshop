{{-- Meta Informations --}}
<h3 class="form-section" style="border-bottom: 1px solid #E7ECF1;">Мета информации</h3>

<div class="row">
    <div class="col-md-12">

        {{-- Meta title --}}
        <div class="form-group">
            <label class="col-md-3 control-label">Мета наслов</label>

            <div class="col-md-9">
                <input value="{{old('meta_title', $category->meta_title)}}" id="meta_title" type="text"
                       class="form-control"  name="meta_title">
            </div>
        </div>
        {{-- // Meta title --}}

        {{-- Meta description --}}
        <div class="form-group">
            <label class="col-md-3 control-label">Мета опис</label>

            <div class="col-md-9">
                <textarea class="form-control" rows="3" id="meta_description"
                          name="meta_description">{{ old('meta_description', $category->meta_description)  }}</textarea>
            </div>
        </div>
        {{-- // Meta description --}}

        {{-- Meta keywords --}}
        <div class="form-group">
            <label class="col-md-3 control-label">Мета клучни зборови</label>

            <div class="col-md-9">
                <input type="text" value="{{old('meta_keywords', $category->meta_keywords)}}" class="form-control" name="meta_keywords">
            </div>
        </div>
        {{-- // Meta keywords --}}
    </div>
</div>
{{-- // Meta Informations --}}
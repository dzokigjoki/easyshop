





<div class="row">
    <div class="col-md-12">
        

        {{-- Title --}}
        <div class="form-group">
            <label class="control-label col-md-3 @if($errors->has('title')) has-error  @endif">Наслов <span class="required">*</span></label>
            <div class="col-md-9 @if($errors->has('title')) has-error  @endif">
                <input id="title_lang2" type="text" reference="{{$category->title_lang2}}" class="form-control" name="title_lang2" value="{{ old('title', $category->title_lang2)  }}" autofocus="autofocus">
            </div>
        </div>
        {{-- // Title --}}

        {{-- Slug --}}
        <div class="form-group">
            <label class="control-label @if($errors->has('url')) has-error  @endif col-md-3">Линк <span class="required">*</span></label>
            <div class="col-md-9 @if($errors->has('url')) has-error  @endif">
                <input id="url_lang2" reference="{{$category->url}}" type="text" class="form-control" placeholder="" name="url_lang2" value="{{ old('url', $category->url_lang2) }}">
            </div>
        </div>
        {{-- // Slug --}}













        <div class="form-group">
            <label class="col-md-3 control-label">Meta Наслов:</label>
            <div class="col-md-9">
                <input id="meta_title" type="text" class="form-control maxlength-handler" name="meta_title_lang2"
                    maxlength="100" placeholder="" value="{{ $category->meta_title_lang2 }}">
                <span class="help-block"> max 100 chars </span>
            </div>
        </div>
        {{-- Meta description --}}
        <div class="form-group">
            <label class="col-md-3 control-label">Мета опис</label>

            <div class="col-md-9">
                <textarea class="form-control" rows="3" id="meta_description"
                          name="meta_description_lang2">{{ old('meta_description_lang2', $category->meta_description_lang2)  }}</textarea>
            </div>
        </div>
        {{-- // Meta description --}}

        {{-- Description  --}}

        <div class="form-group">
            <label class="col-md-3 control-label">Опис:</label>
            <div class="col-md-9">
                <textarea class="summernote notranslate" name="description_lang2"> {!! old('description_lang2', $category->description_lang2) !!}</textarea>
            </div>
        </div>
        {{-- // Description  --}}

    </div>

    {{-- // Image --}}
</div>
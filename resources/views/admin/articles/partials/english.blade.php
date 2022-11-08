<style>
    .pt-50 {
        padding-top: 50px !important;
    }

</style>
<div class="tab-pane active" id="tab_general">
    <div class="form-body">
        <div class="form-group ">

            <div class="@if ($errors->has('title')) has-error  @endif">
                <label class="col-md-2 control-label">Име на артикл:<span class="required"> * </span></label>
            </div>
            <div class="col-md-5 @if ($errors->has('title')) has-error  @endif">
                <input type="text" id="title_lang2" class="form-control" name="title_lang2"
                    value="{{ old('title', $product->title_lang2) }}">
            </div>
        </div>
        <div class="form-group">
            <div class="@if ($errors->has('url')) has-error  @endif">
                <label class="col-md-2 control-label">URL:<span class="required"> * </span></label>
            </div>
            <div class="col-md-5 @if ($errors->has('url_lang2')) has-error  @endif">
                <input id="url_lang2" type="text" class="form-control"
                    value="{{ old('url_lang2', $product->url_lang2) }}" name="url_lang2">
            </div>
        </div>
        <div class="form-group">
            <div class="@if ($errors->has('short_description')) has-error  @endif">
                <label class="col-md-2 control-label">Краток опис:</label>
            </div>
            <div class="col-md-5 @if ($errors->has('short_description')) has-error  @endif">
                <textarea id="short_description_lang2" class="form-control notranslate"
                    name="short_description_lang2">{!! old('short_description', $product->short_description_lang2) !!}</textarea>
            </div>
        </div>



        <div class="form-group">
            <label class="col-md-2 control-label">Опис:</label>
            <div class="col-md-10 notranslate">
                <textarea class="summernote notranslate" name="description_lang2">{!! old('description_lang2', $product->description_lang2) !!}</textarea>

            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label">Meta Опис:</label>
            <div class="col-md-10">
                <textarea id="meta_description_lang2" class="form-control maxlength-handler" rows="8"
                    name="meta_description_lang2" maxlength="255">{{ $product->meta_description_lang2 }}</textarea>
                <span class="help-block"> max 255 chars </span>
            </div>
        </div>

    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Meta Наслов:</label>
        <div class="col-md-10">
            <input id="meta_title" type="text" class="form-control maxlength-handler" name="meta_title_lang2"
                maxlength="100" placeholder="" value="{{ $product->meta_title_lang2 }}">
            <span class="help-block"> max 100 chars </span>
        </div>
    </div>
</div>

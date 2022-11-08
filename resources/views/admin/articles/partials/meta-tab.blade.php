<div class="tab-pane" id="tab_meta">
    <div class="form-body">
        <div class="form-group">
            <label class="col-md-2 control-label">Meta Наслов:</label>
            <div class="col-md-10">
                <input id="meta_title" type="text" class="form-control maxlength-handler" name="meta_title" maxlength="100" placeholder="" value="{{$product->meta_title}}">
                <span class="help-block"> max 100 chars </span>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label">Meta Опис:</label>
            <div class="col-md-10">
                <textarea id="meta_description" class="form-control maxlength-handler" rows="8" name="meta_description" maxlength="255">{{$product->meta_description}}</textarea>
                <span class="help-block"> max 255 chars </span>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label">Meta Клучни Зборови:</label>
            <div class="col-md-10">
                <textarea class="form-control maxlength-handler" rows="8" name="meta_keywords" maxlength="1000">{{$product->meta_keywords}}</textarea>
                <span class="help-block"> max 1000 chars </span>
            </div>
        </div>
    </div>
</div>

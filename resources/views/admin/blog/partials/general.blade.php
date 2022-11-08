<div class="tab-pane active" id="tab_general">
    <div class="form-body">
        <div class="form-group ">
            <div class="@if($errors->has('title')) has-error  @endif">
              <label class="col-md-2 control-label">Наслов:<span class="required"> * </span></label>
            </div>
            <div class="col-md-5 @if($errors->has('title')) has-error  @endif">
                <input type="text"
                       id="title"
                       class="form-control"
                       name="title"
                       value="{{ old('title', $post->title) }}">
            </div>  
            <label class="col-md-2 control-label">Активен:</label>
            <div class="col-md-3">
                <input name="active"
                       type="checkbox"
                       class="make-switch"
                       data-on-text="Да"
                       data-off-text="Не"
                       value="1"
                       @if(old('active', $post->active)) checked @endif>
            </div>          
        </div>
        <div class="form-group">
            <div class="@if($errors->has('url')) has-error  @endif">
              <label class="col-md-2 control-label">URL:<span class="required"> * </span></label>
            </div>
            <div class="col-md-5 @if($errors->has('url')) has-error  @endif">
                <input id="url"
                       type="text"
                       class="form-control"
                       value="{{ old('url', $post->url) }}"
                       name="url">
            </div>            
            <label class="col-md-2 control-label">Слајдер:</label>
            <div class="col-md-3">
                <input name="slider"
                       type="checkbox"
                       class="make-switch"
                       data-on-text="Да"
                       data-off-text="Не"
                       value="1"
                       @if(old('slider', $post->slider)) checked @endif>
            </div>  
        </div>      
        <div class="form-group">
            <div class="@if($errors->has('categories')) has-error  @endif">
              <label class="col-md-2 control-label">Категорија:<span class="required"> * </span></label>
            </div>
            <div class="col-md-5 @if($errors->has('categories')) has-error  @endif">
                <select name="categories[]" class="form-control select2-multiple select2-button-multiselect-value" multiple>
                        {{!!$categires_html!!}}
                </select>
            </div>
            <label class="col-md-2 control-label">Препорачано:</label>
            <div class="col-md-3">
                <input name="is_recommended"
                       type="checkbox"
                       class="make-switch"
                       data-on-text="Да"
                       data-off-text="Не"
                       value="1"
                       @if(old('is_recommended', $post->is_recommended)) checked @endif>
            </div>  
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label">Објавен на:<span class="required"> * </span></label>
            <div class="col-md-5">
                <div class="input-group input-large date-picker input-daterange" data-date="10.11.2012" data-date-format="dd.mm.yyyy" data-date-week-start = "1">
                    <input type="text"
                           class="form-control"
                           name="new_from"
                           value="{{date('d.m.Y', strtotime(old('new_from', $post->publish_at)))}}">
                   </div>
            </div>
            <label class="col-md-2 control-label">Посети:</label>
            <div class="col-md-3">
                <input name="visits"
                       class="form-control"
                       type="number"                       
                       value="{{ $post->visits }}"/>                       
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label">Главна слика
            </label>
            <div class="col-md-5">
                <div class="fileinput fileinput-new" data-provides="fileinput">
                    <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                        @if(!empty($post->image))
                            <img src="{{\ImagesHelper::getBlogImage($post)}}" />
                        @else
                            <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" />
                        @endif
                    </div>
                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                    <div>
                        <span class="btn default btn-file">
                        <span class="fileinput-new"> Избери слика </span>
                        <span class="fileinput-exists"> Промени </span>
                        <input type="file" name="image"> </span>
                        <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Избриши </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label">Краток опис:</label>
            <div class="col-md-10 @if($errors->has('short_description')) has-error  @endif">
                <textarea id="short_description" class="form-control" name="short_description">{{$post->short_description}}</textarea>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label">Опис:</label>
            <div class="col-md-10 notranslate">
                <textarea class="summernote" name="description">{!! old('description', $post->description) !!}</textarea>

            </div>
        </div>
    </div>
</div>

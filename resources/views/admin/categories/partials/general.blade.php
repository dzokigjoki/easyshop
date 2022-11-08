





<div class="row">
    <div class="col-md-12">

        {{-- Type category --}}
        <div class="form-group">
            <label class="control-label col-md-3">Тип категорија</label>
            <div class="col-md-9">
                <select parent-category name="type" class="form-control select2">
                    <option value="list_product" @if($category->type=="list_product") selected @endif>Листа продукти
                    </option>
                    <option value="list_category" @if($category->type=="list_category") selected @endif>Листа категории
                    </option>
                    <option value="list_posts" @if($category->type=="list_posts") selected @endif>Листа вести</option>
                    <option value="content" @if($category->type=="content") selected @endif>Содржина</option>
                </select>
            </div>
        </div>
        {{-- // Type category --}}


        {{-- Parent category --}}
        <div class="form-group">
            <label class="control-label col-md-3">Подкатегорија на</label>

            <div class="col-md-9">
                <select parent-category name="parent" @if($category->type=="list_category" && $active_childrens > 0)
                    disabled @endif
                    class="form-control select2-multiple select2">
                    <option value="">None</option>
                    @foreach($parent_categories as $cat)
                    <option value="{{$cat['id']}}" @if($cat['id']==$category->parent)
                        selected @endif @if($cat['id'] == $category_id) disabled
                        @endif >
                        {{$cat['title']}}</option>
                    @endforeach
                </select>
                <div class="help-block">Остави празно за главна категорија</div>
            </div>
        </div>
        {{-- // Parent category --}}

        {{-- Title --}}
        <div class="form-group">
            <label class="control-label col-md-3 @if($errors->has('title')) has-error  @endif">Наслов <span
                    class="required">*</span></label>
            <div class="col-md-9 @if($errors->has('title')) has-error  @endif">
                <input id="title" type="text" value="{{$category->title}}" class="form-control" name="title"
                    value="{{ old('title', $category->title)  }}" required="required" autofocus="autofocus">
            </div>
        </div>
        {{-- // Title --}}

        {{-- Order --}}
        {{--<div class="form-group">--}}
        {{--<label class="control-label  col-md-3">Редослед</label>--}}
        {{--<div class="col-md-9">--}}
        {{--<input type="number" value="{{$category->order}}" class="form-control" name="order">--}}
        {{--</div>--}}
        {{--</div>--}}
        {{-- // Order --}}

        {{-- Slug --}}
        <div class="form-group">
            <label class="control-label @if($errors->has('url')) has-error  @endif col-md-3">Линк <span
                    class="required">*</span></label>
            <div class="col-md-9 @if($errors->has('url')) has-error  @endif">
                <input id="url" value="{{$category->url}}" type="text" class="form-control" placeholder="" name="url"
                    value="{{ old('url', $category->url) }}" required="required">
            </div>
        </div>
        {{-- // Slug --}}

        {{-- Description  --}}
        <div class="form-group">
            <label class="col-md-3 control-label">Опис:</label>
            <div class="col-md-9">
                <textarea class="summernote notranslate" name="description"> {!! old('description', $category->description) !!}</textarea>
            </div>
        </div>
        {{-- // Description  --}}
        @if(config( 'app.client') == 'matica' || config( 'app.client') == 'hotspot')
        <div class="form-group">
            <label class="control-label col-md-3">Стикер</label>

            <div class="col-md-9">
                <select name="sticker" class="form-control select2">
                    <option value="" selected>Избери</option>
                    @foreach($stickers as $sticker)
                    <option value="{{$sticker->id}}" @if($sticker->id == $category->sticker_id)
                        selected @endif>
                        {{$sticker->name}}</option>
                    @endforeach
                </select>
                <div class="help-block">Остави празно ако нема стикер</div>
            </div>
        </div>
        @endif
        {{-- Image --}}
        <div class="form-group">
            <label class="col-md-3 control-label">Слика</label>

            <div class="col-md-9">

                <div class="fileinput fileinput-new" data-provides="fileinput">
                    <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                        @if(!empty($category->image))
                        <img src="{{asset('uploads/category/' . $category->image)}}" />
                        @else
                        <img src="//www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" />
                        @endif
                    </div>
                    <div class="fileinput-preview fileinput-exists thumbnail"
                        style="max-width: 200px; max-height: 150px;">
                    </div>
                    <span class="btn blue btn-file">
                        <span class="fileinput-new"> Избери слика </span>
                        <span class="fileinput-exists"> Измени </span>
                        <input type="file" name="image" />
                    </span>
                    <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Избриши </a>
                </div>
            </div>
        </div>
    </div>

    {{-- // Image --}}
</div>
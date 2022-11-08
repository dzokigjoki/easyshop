<div class="tab-pane active" id="tab_general">
    <div class="form-body">
        <div class="row">
            <div class="col-md-7">
                <div class="form-group">
                    <label class="col-md-4 control-label">Тип:<span class="required"> * </span></label>
                    <div class="col-md-8">
                        <select @if(isset($banner)) disabled @endif class="chosen-select" style="width: 100%;" id="types" name="type" tabindex="4">
                            <option @if(isset($banner) && $banner->type == 'web') selected @endif value="web">Web
                            </option>
                            <option @if(isset($banner) && $banner->type == 'mobile') selected @endif
                                value="mobile">Mobile</option>
                        </select>
                    </div>
                </div>
                <div class="form-group ">
                    <div class="@if($errors->has('title')) has-error  @endif">
                        <label class="col-md-4 control-label">Име на банер:<span class="required"> * </span></label>
                    </div>
                    <div class="col-md-8 @if($errors->has('title')) has-error  @endif">

                        <input type="text" id="title" class="form-control" name="title" @if(isset($banner)) value="{{ old('title', $banner->title) }}" @endif>
                    </div>
                </div>
                <div class="form-group">
                    <div class="@if($errors->has('url')) has-error  @endif">
                        <label class="col-md-4 control-label">URL:</label>
                    </div>
                    <div class="col-md-8 @if($errors->has('url')) has-error  @endif">
                        <input type="text" class="form-control" @if(isset($banner)) value="{{ old('url', $banner->url) }}" @endif name="url">
                    </div>
                </div>
                <div class="form-group">
                    <div class="@if($errors->has('categories')) has-error  @endif">
                        <label class="col-md-4 control-label">Категорија:<span class="required"> * </span></label>
                    </div>
                    <div class="col-md-8 @if($errors->has('categories')) has-error  @endif">
                        <select required class="chosen-select" style="width: 100%;" id="categories" name="category" tabindex="4">
                            @if(!isset($banner))
                            <option value="" disabled selected hidden>Одберете категорија</option>
                            @endif
                            @foreach($categories as $i)
                            <option @if(isset($banner) && ($banner->banner_category_id==$i->id)) selected @endif
                                id="{{ $i->id }}" value="{{$i->id}}">{{$i->title}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="@if($errors->has('short_description')) has-error  @endif">
                        <label class="col-md-4 control-label">Краток опис:</label>
                    </div>
                    <div class="col-md-8 @if($errors->has('short_description')) has-error  @endif">
                        <textarea id="short_description" class="form-control" name="short_description">@if(isset($banner)){{$banner->short_description}}@endif</textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Активен:</label>
                    <div class="col-md-3">
                        <input name="active" type="checkbox" class="make-switch" data-on-text="Да" data-off-text="Не" value="1" @if(isset($banner)) checked @endif />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label">Главна слика
                    </label>
                    <div class="col-md-8">
                        <div class="fileinput fileinput-new" data-provides="fileinput">
                            <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                @if(!empty($banner->image))
                                @if($banner->type == 'web')
                                <img class="image_holder blah" src="/uploads/banners/{{$banner->id}}/lg_{{$banner->image}}" />
                                @else
                                <img class="image_holder blah" src="/uploads/banners/{{$banner->id}}/mob_{{$banner->image}}" />
                                @endif
                                @else
                                <img class="blah" src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" />
                                @endif
                            </div>
                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                            <div id="mainImageSize" class="text-muted"></div>
                            <div>
                                <span class="btn default btn-file">
                                    @if(!empty($banner->image))
                                    <span class="fileinput-new"> Промени </span>
                                    @else
                                    <span class="fileinput-new"> Избери слика </span>
                                    @endif


                                    <input id="imgInp" type="file" name="image">
                                </span>
                                @if(!empty($banner->image))
                                <a href="javascript:;" class="btn red fileinput-new delete_img" data-dismiss="fileinput">
                                    Избриши </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group" id="web_mobile_image">
                    <label class="col-md-4 control-label">Мобилна слика
                    </label>
                    <div class="col-md-8">
                        <div class="fileinput fileinput-new" data-provides="fileinput">
                            <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                @if(!empty($banner->mobile_image))
                                <img class="image_holder1 blah1" src="/uploads/banners/{{$banner->id}}/md_{{$banner->mobile_image}}" />
                                @else
                                <img class="blah1" src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" />
                                @endif
                            </div>
                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                            <div id="mobileImageSize" class="text-muted"></div>
                            <div>
                                <span class="btn default btn-file">
                                    @if(!empty($banner->image))
                                    <span class="fileinput-new"> Промени </span>
                                    @else
                                    <span class="fileinput-new"> Избери слика </span>
                                    @endif
                                    <input id="imgInp1" type="file" name="mobile_image"> </span>
                                @if(!empty($banner->image))
                                <a href="javascript:;" class="btn red fileinput-new delete_img1" data-dismiss="fileinput">
                                    Избриши </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="form-group ">
                    <div class="@if($errors->has('position')) has-error  @endif">
                        <label class="col-md-4 control-label">Позиција:<span class="required"> * </span></label>
                    </div>
                    <div class="col-md-8 @if($errors->has('title')) has-error  @endif">
                        <input type="number" id="position" class="form-control" name="position" @if(isset($banner)) value="{{$banner->position}}" @else disabled @endif>
                    </div>
                </div>
            </div>

            <input type="hidden" name="company" value="{{ \EasyShop\Models\AdminSettings::getField('titlepage')}}" />
            @if(isset($banner))
            <input type="hidden" name="banner_id" id="banner_id" value="{{ $banner->id }}">
            <input type="hidden" id="auth_id" value="{{ auth()->id()}}">
            @endif
        </div>
    </div>
</div>
@section('scripts')
<script>
    $(document).ready(function() {
        var type = $("#types").val();
        switch (type) {
            case 'mobile':
                $("#web_mobile_image").hide();
                break;
            case 'web':
                $("#web_mobile_image").show();
                break;
        }

        $("#types").on('change', function() {
            var type = $("#types").val();
            $('#mobileImageSize').empty();
            $('#mainImageSize').empty();
            switch (type) {
                case 'mobile':
                    $("#web_mobile_image").hide();
                    break;
                case 'web':
                    $("#web_mobile_image").show();
                    break;
            }
            var categoryId = $("#categories").val();
            if (categoryId != null) {
                var bannerId = $('#banner_id').val();
                if (typeof bannerId == 'undefined') {
                    bannerId = -1;
                }

                $.ajax({
                    url: '/admin/banners/position/' + categoryId + "/" + bannerId + "/" + type,
                    type: 'get',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    },
                    success: function(data) {
                        $('#position').val(data.bannerPosition);
                        $('#position').attr('disabled', false);
                    },

                });
            }
        });

        $('#categories').on('change', function(e) {
            var type = $("#types").val();
            var categoryId = $(this).val();
            var bannerId = $('#banner_id').val();
            // If bannerId does not exist
            if (typeof bannerId == 'undefined') {
                bannerId = -1;
            }

            $.ajax({
                url: '/admin/category/title/' + categoryId,
                type: 'get',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                },
                success: function(data) {
                    if (type == 'web') {
                        if (data.webMainImage) {
                            $('#mainImageSize').empty();
                            $('#mainImageSize').append('<span>' + data.webMainImage + '</span><br>');
                        }
                        if (data.webMobileImage) {
                            $('#mobileImageSize').empty();
                            $('#mobileImageSize').append('<span>' + data.webMobileImage + '</span><br>');
                        }
                    } else {
                        if (data.mobileImage) {
                            $('#mainImageSize').empty();
                            $('#mainImageSize').append('<span>' + data.mobileImage + '</span><br>');
                        }
                    }
                },
            });

            $.ajax({
                url: '/admin/banners/position/' + categoryId + "/" + bannerId + "/" + type,
                type: 'get',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                },
                success: function(data) {
                    $('#position').val(data.bannerPosition);
                    $('#position').attr('disabled', false);
                },
            });
        });
    });

    function readURL(input) {
        if (input.files && input.files[0]) {
            
            var reader = new FileReader();

            reader.onload = function(e) {
                $('.blah').attr('src', e.target.result);
            }


            reader.readAsDataURL(input.files[0]);
        }
    }


    function readURLMobile(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('.blah1').attr('src', e.target.result);
            }


            reader.readAsDataURL(input.files[0]);
        }
    }
    $(".delete_img").click(function() {
        $(".image_holder").attr("src","http://www.placehold.it/200x150/EFEFEF/AAAAAA&text=no+image");
    })
    $(".delete_img1").click(function() {
        $(".image_holder1").attr("src","http://www.placehold.it/200x150/EFEFEF/AAAAAA&text=no+image");
    })
    $("#imgInp").change(function() {
        readURL(this);
    });


    $("#imgInp1").change(function() {
        readURLMobile(this);
    });
</script>
@stop
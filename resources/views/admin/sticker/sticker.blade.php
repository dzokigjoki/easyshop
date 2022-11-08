@extends('layouts.admin')
@section('content')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/spectrum/1.8.1/spectrum.min.css">
<style>
    .flex-centered {
        display: flex !important;
        align-content: center !important;
    }
</style>
<div class="content">
    <div class="page-content-inner">
        <div class="row">
            <div class="col-md-12">
                <form class="form-horizontal form-row-seperated" role="form"
                    action="{{ route('admin.stickers.store') }}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="portlet light portlet-fit ">
                        <div class="portlet-title">
                            <div class="caption">
                                <span class="caption-subject font-blue-soft bold uppercase"> Нов Стикер </span>
                            </div>

                            <div class="actions btn-set pull-right">
                                <a class="btn btn-secondary-outline" href="{{route('admin.stickers')}}">Назад</a>
                                <button class="btn btn-info blue-soft" name="zacuvaj" value="zacuvaj" type="submit"><i
                                        class="fa fa-check"></i> Зачувај</button>
                            </div>
                        </div>
                        <div class="portlet-body">

                            @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                            <div class="tabbable-line">
                                <div class="tab-pane active" id="tab_general">
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="form-group">
                                                <label class="col-md-2 control-label">Име:</label>
                                                <div class="col-md-5 @if($errors->has('name')) has-error  @endif">
                                                    <input id="name" type="text" class="form-control" name="name"
                                                        value="" required="required" autofocus="autofocus">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-2 control-label">Форма:</label>
                                                <div class="col-md-5 @if($errors->has('form')) has-error  @endif">
                                                    <select class="form-control" name="form" id="form">
                                                        <option value="" disabled>Избери</option>
                                                        <option value="square">
                                                            Квадрат
                                                        </option>
                                                        <option value="circle">
                                                            Круг
                                                        </option>
                                                        <option value="rectangle">
                                                            Правоаголник
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-2 control-label">Боја:</label>
                                                <div class="col-md-5 @if($errors->has('color')) has-error  @endif">
                                                    <input class="form-control" name="color" id='colorpicker' />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-2 control-label">Позиција:</label>
                                                <div class="col-md-5 @if($errors->has('position')) has-error  @endif">
                                                    <select class="form-control" name="position" id="position">
                                                        <option value="" disabled>Избери</option>
                                                        <option value="top-left">
                                                            Горе лево
                                                        </option>
                                                        <option value="top-right">
                                                            Горе десно
                                                        </option>
                                                        <option value="bottom-left">
                                                            Долу лево
                                                        </option>
                                                        <option value="bottom-right">
                                                            Долу десно
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-2 control-label">Тип:</label>
                                                <div class="col-md-5 @if($errors->has('content')) has-error  @endif">
                                                    <select class="form-control" name="content" id="content">
                                                        <option value="" disabled>Избери</option>
                                                        <option value="new">
                                                            Ново
                                                        </option>
                                                        <option value="recommended">
                                                            Препорачано
                                                        </option>
                                                        <option value="sale">
                                                            Распродажба
                                                        </option>
                                                        <option value="discount">
                                                            Попуст
                                                        </option>
                                                        <option value="near_end_stock">
                                                            При крај на залиха
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-2 control-label">Главна слика
                                                </label>
                                                <div class="col-md-8">
                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                        <div class="fileinput-new thumbnail"
                                                            style="width: 200px; height: 150px;">
                                                            @if(!empty($sticker->image))
                                                            <img class="image_holder blah"
                                                                src="/uploads/stickers/{{$sticker->id}}/{{$sticker->image}}" />
                                                            @else
                                                            <img class="blah"
                                                                src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" />
                                                            @endif
                                                        </div>
                                                        <div class="fileinput-preview fileinput-exists thumbnail"
                                                            style="max-width: 200px; max-height: 150px;"> </div>
                                                        <div id="mainImageSize" class="text-muted"></div>
                                                        <div>
                                                            <span class="btn default btn-file">
                                                                @if(!empty($sticker->image))
                                                                <span class="fileinput-new"> Промени </span>
                                                                @else
                                                                <span class="fileinput-new"> Избери слика </span>
                                                                @endif
                                                                <input id="imgInp" type="file" name="image">
                                                            </span>
                                                            @if(!empty($sticker->image))
                                                            <a href="javascript:;"
                                                                class="btn red fileinput-new delete_img"
                                                                data-dismiss="fileinput">
                                                                Избриши </a>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <label id="errors" style="color:red;" class="text-left col-md-12"></label>
                                        </div>
                                    </div>
                                </div>
                                <div style="text-align:right;padding-top: 10px;" class="actions btn-set">
                                    <a class="btn btn-secondary-outline" href="{{route('admin.stickers')}}">Назад</a>
                                    <button class="btn btn-info blue-soft" name="zacuvaj" value="zacuvaj"
                                        type="submit"><i class="fa fa-check"></i> Зачувај</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- END PAGE CONTENT INNER -->

@stop
@section('scripts')
<script src="/assets/admin/global/plugins/redactor/redactor.min.js" type="text/javascript"></script>
<script src="/assets/admin/global/plugins/redactor/alignment.js" type="text/javascript"></script>
<script src="/assets/admin/global/plugins/redactor/source.js" type="text/javascript"></script>
<script src="/assets/admin/global/plugins/redactor/table.js" type="text/javascript"></script>
<script src="/assets/admin/global/plugins/redactor/video.js" type="text/javascript"></script>
<script src="/assets/admin/global/plugins/redactor/fontcolor.js" type="text/javascript"></script>
<script src="/assets/admin/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
<script src="/assets/admin/js/pages/articles.js?v=1" type="text/javascript"></script>
<script src="/assets/admin/pages/scripts/ecommerce-products.js" type="text/javascript"></script>
<script src="/assets/admin/pages/scripts/ecommerce-products-edit.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/spectrum/1.8.1/spectrum.min.js"></script>
{{--@if($product_id)--}}
{{--<script src="/assets/admin/js/pages/editArticleDatatable.js" type="text/javascript"></script>--}}
{{--@endif--}}
<script>
    $("#colorpicker").spectrum({
        color: "#000",
        preferredFormat: "hex",
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
    $(".delete_img").click(function() {
        $(".image_holder").attr("src","http://www.placehold.it/200x150/EFEFEF/AAAAAA&text=no+image");
    })
    $("#imgInp").change(function() {
        readURL(this);
    });
</script>
@stop
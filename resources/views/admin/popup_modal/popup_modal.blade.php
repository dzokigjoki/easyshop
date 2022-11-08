@extends('layouts.admin')

@section('content')
<style>
    .flex-between {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
</style>
<!-- END PAGE BREADCRUMBS -->
<!-- BEGIN PAGE CONTENT INNER -->
<div class="content">
    <div class="page-content-inner">
        <div class="row">
            <div class="col-md-12">
                <form class="form-horizontal form-row-seperated" role="form"
                    action="{{ route('admin.popup_modal.store') }}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="portlet light portlet-fit ">
                        <div class="portlet-title">
                            <div class="caption">
                                <span class="caption-subject font-blue-soft bold uppercase"> @if($record) Промена на
                                    Модал @else Внеси нов Модал @endif </span>
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
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-7">
                                                    <div class="flex-between col-lg-12">
                                                        <div
                                                            class="@if($errors->has('title')) has-error  @endif col-md-4">
                                                            <label>
                                                                Име:
                                                            </label>
                                                        </div>
                                                        <div
                                                            class="col-md-8 @if($errors->has('title')) has-error  @endif">
                                                            <input type="text" id="title" class="form-control"
                                                                name="title" @if(isset($record->title))
                                                            value="{{ $record->title }}"
                                                            @else
                                                            value="{{ old('title') }}"
                                                            @endif
                                                            >
                                                        </div>
                                                    </div>
                                                    <br><br>
                                                    <div class="flex-between col-lg-12">
                                                        <div
                                                            class="@if($errors->has('url')) has-error  @endif col-md-4">
                                                            <label>
                                                                Линк:
                                                            </label>
                                                        </div>
                                                        <div
                                                            class="col-md-8 @if($errors->has('url')) has-error  @endif">
                                                            <input type="text" id="url" class="form-control" name="url"
                                                                @if(isset($record->url))
                                                            value="{{ $record->url }}"
                                                            @else
                                                            value="{{ old('url') }}"
                                                            @endif
                                                            >
                                                        </div>
                                                    </div>
                                                    <br><br>
                                                    <div class="flex-between col-lg-12">
                                                        <div
                                                            class="@if($errors->has('short_description')) has-error  @endif col-lg-4">
                                                            <label>
                                                                Краток опис:
                                                            </label>
                                                        </div>
                                                        <div
                                                            class="col-md-8 @if($errors->has('short_description')) has-error  @endif">
                                                            <input type="text" id="short_description"
                                                                class="form-control" name="short_description"
                                                                @if(isset($record->short_description))
                                                            value="{{ $record->short_description }}"
                                                            @else
                                                            value="{{ old('short_description') }}"
                                                            @endif
                                                            >
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-5">
                                                    <div class="flex-between col-lg-12">
                                                        <div
                                                            class="@if($errors->has('active')) has-error  @endif col-md-4">
                                                            <label>
                                                                Активен:
                                                            </label>
                                                        </div>
                                                        <div
                                                            class="col-md-8 @if($errors->has('active')) has-error  @endif">
                                                            <input id="active" type="checkbox" class="make-switch"
                                                                data-on-text="Да" value="1" data-off-text="Не"
                                                                name="active" @if($record->active) checked @endif
                                                            >
                                                        </div>
                                                    </div>
                                                    <br><br>
                                                    <div class="flex-between col-lg-12">
                                                        <div
                                                            class="@if($errors->has('image')) has-error  @endif col-md-4">
                                                            <label>
                                                                Слика:
                                                            </label>
                                                        </div>
                                                        <div
                                                            class="col-md-8 @if($errors->has('image')) has-error  @endif">
                                                            <div class="fileinput fileinput-new"
                                                                data-provides="fileinput">
                                                                <div class="fileinput-new thumbnail"
                                                                    style="width: 200px; height: 150px;">
                                                                    @if(!empty($record->image))
                                                                    <img class="image_holder blah"
                                                                        src="/uploads/popup_modal/{{$record->id}}/{{$record->image}}" />
                                                                    @else
                                                                    <img class="image_holder blah"
                                                                        src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" />
                                                                    @endif
                                                                </div>
                                                                <div class="fileinput-preview fileinput-exists thumbnail"
                                                                    style="max-width: 200px; max-height: 150px;"> </div>
                                                                <div>
                                                                    <span class="btn default btn-file">
                                                                        <span class="fileinput-new"> Избери слика
                                                                        </span>
                                                                        <span class="fileinput-exists"> Промени </span>
                                                                        <input type="file" id="imgInp" name="image">
                                                                    </span>
                                                                    <a href="javascript:;"
                                                                        class="btn red fileinput-exists"
                                                                        data-dismiss="fileinput"> Избриши </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br><br>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="col-lg-12">
                                                        <label class="col-md-2">Опис:</label>
                                                        <br><br>
                                                        <div class="col-md-12">
                                                            <textarea id="description"
                                                                class="form-control popup_modal_redactor"
                                                                name="description">
                                                            @if(isset($record->description))
                                                            {!! $record->description !!}
                                                            @else
                                                            {!! old('description') !!}
                                                            @endif
                                                        </textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @if(isset($record->id))
                                <input type="hidden" name="popup_modal_id" value="{{ $record->id }}">
                                @endif
                                <div style="text-align:right;padding-top: 10px;" class="actions btn-set">
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
@stop
@section('scripts')
<script src="/assets/admin/global/plugins/redactor/redactor.min.js" type="text/javascript"></script>
<script>
    $('.popup_modal_redactor').redactor({
        imageUpload: ES.baseUrl + '/admin/popup_modal/uploadRedactor',
        fileUpload: ES.baseUrl + '/admin/popup_modal/uploadRedactor',
        plugins: ['table', 'alignment', 'source', 'video', 'fontcolor']
    });
    $("#imgInp").change(function() {
        readURL(this);
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
</script>
@stop
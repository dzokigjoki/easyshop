@extends('layouts.admin')

@section('content')

<!-- END PAGE BREADCRUMBS -->
<!-- BEGIN PAGE CONTENT INNER -->
<div class="content">
    <div class="page-content-inner">
        <div class="row">
            <div class="col-md-12">
                <form class="form-horizontal form-row-seperated" role="form" action="{{ route('admin.manufacturers.store') }}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="portlet light portlet-fit ">
                        <div class="portlet-title">
                            <div class="caption">
                                <span class="caption-subject font-blue-soft bold uppercase">Внеси нов производител</span>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="col-md-2 control-label"><span class="required">*</span> Име:</label>
                                    <div class="col-md-10 @if($errors->has('name')) has-error  @endif">
                                        <input id="name" required="" type="text" class="form-control maxlength-handler" name="name" placeholder="" value="{{$manufacturer->name}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Опис:</label>
                                    <div class="col-md-10 @if($errors->has('description')) has-error  @endif">
                                        <textarea id="description" class="form-control" rows="8" name="description">{{$manufacturer->description}}</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label control-label">Главна слика
                                    </label>
                                    <div class="col-md-10">
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                @if(!empty($manufacturer->image))
                                                <img src="{{asset('uploads/manufacturers')}}/{{$manufacturer->id}}/md_{{$manufacturer->image}}" />
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
                                    <div class="col-md-offset-2 col-md-10">
                                        <button type="submit" class="btn blue-soft">Потврди</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" id="manufacturer_id" value="{{$manufacturer_id}}" name="manufacturer_id">
                </form>
            </div>
        </div>
    </div>
</div>
<!-- END PAGE CONTENT INNER -->

@stop
@section('scripts')
<script src="/assets/admin/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
<script src="/assets/admin/global/plugins/redactor/redactor.min.js" type="text/javascript"></script>
<script src="/assets/admin/global/plugins/redactor/alignment.js" type="text/javascript"></script>
<script src="/assets/admin/global/plugins/redactor/source.js" type="text/javascript"></script>
<script src="/assets/admin/global/plugins/redactor/table.js" type="text/javascript"></script>
<script src="/assets/admin/global/plugins/redactor/video.js" type="text/javascript"></script>

@stop
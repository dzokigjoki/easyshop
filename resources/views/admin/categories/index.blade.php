@extends('layouts.admin')

@section('content')
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="portlet light col-md-5">
        <div class="portlet-title">
            <div class="caption">
                <span class="caption-subject font-blue-soft bold uppercase">Категории</span>
            </div>
        </div>

        {{-- Nested List --}}
        <div class="portlet-body">
            <div category-nested-list class="dd dd-nodrag">
                @if (!empty($category_id))
                    <a href="{{ route('admin.categories') }}" style="margin-bottom:10px;" class="btn default">
                        Нова категорија</a>
                @endif
                <ol class="dd-list dd-nodrag">
                    {!! $nestedList !!}
                </ol>
            </div>
        </div>
        {{-- // Nested List --}}

    </div>
    <div class="tab-pane col-md-7" id="tab_2">
        <div class="portlet box" style="background:#444d58 none repeat scroll 0 0">
            <div class="portlet-title">
                <div class="caption">
                    @if (empty($category_id))
                        Додади нова категорија
                    @else
                        {{ $category->title }} (Едитирај)
                    @endif

                </div>
            </div>
            <div class="portlet-body form">
                <!-- BEGIN FORM-->
                <form class="form-horizontal" action="{{ route('admin.categories.save') }}" method="post"
                    enctype="multipart/form-data" role="form">
                    {{ csrf_field() }}
                    <input type="hidden" name="category_id" value="{{ $category_id }}">
                    <div class="form-body">
                        <h3 class="form-section" style="border-bottom: 1px solid #E7ECF1; margin-bottom: 9px;">Информации
                            <div class="pull-right" style="margin-top: -10px;">
                                <button type="submit" class="btn btn-info blue-soft">Потврди</button>
                                @if ($category_id)
                                    <a href="{{ route('admin.categories') }}" class="btn default">Откажи</a>
                                @endif
                            </div>
                        </h3>
                        <div @if(count($languages) > 1) class="tabbable-line" @endif>
                                    @if(count($languages) > 1)
                                    <ul class="nav nav-tabs">
                                        <?php $loop = 1; ?>
                                        @foreach($languages as $i)
                                        <li @if($loop == 1) class="active" @endif>
                                            <a href="#tab{{ $loop }}" data-toggle="tab"> {{ $i['name'] }} </a>
                                        </li>
                                        <?php $loop += 1; ?>
                                        @endforeach
                                    </ul>
                                    @endif

                            <div class="tab-content">
                                <div class="tab-pane fade active in" id="tab1">
                                    @include('admin.categories.partials.general')
                                    @include('admin.categories.partials.meta-information')
                                    @include('admin.categories.partials.other')
                                </div>

                                <div class="tab-pane fade" id="tab2">

                                    @include('admin.categories.partials.english')
                                </div>
                            </div>

                        </div>
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-12 text-right">
                                    <button type="submit" class="btn btn-info blue-soft">Потврди</button>
                                    @if ($category_id)
                                        <a href="{{ route('admin.categories') }}" class="btn default">Откажи</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                </form>
                <!-- END FORM-->
            </div>
        </div>
    </div>
@stop
@section('scripts')
    <script src="/assets/admin/global/plugins/redactor/redactor.min.js" type="text/javascript"></script>
    <script src="/assets/admin/global/plugins/redactor/alignment.js" type="text/javascript"></script>
    <script src="/assets/admin/global/plugins/redactor/source.js" type="text/javascript"></script>
    <script src="/assets/admin/global/plugins/redactor/table.js" type="text/javascript"></script>
    <script src="/assets/admin/global/plugins/redactor/video.js" type="text/javascript"></script>
    <script src="/assets/admin/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
    <script src="/assets/admin/js/pages/categories.js" type="text/javascript"></script>
@stop

@extends('layouts.admin')

@section('content')

    <!-- END PAGE BREADCRUMBS -->
    <!-- BEGIN PAGE CONTENT INNER -->
    <div class="content">
        <div class="page-content-inner">
            <div class="row">
                <div class="col-md-12">
                    <form class="form-horizontal form-row-seperated" role="form" action="{{ route('admin.storeblog') }}"
                        method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="portlet light portlet-fit ">
                            <div class="portlet-title">
                                <div class="caption">
                                    <span class="caption-subject font-blue-soft bold uppercase">Текст</span>
                                </div>
                                <div class="actions btn-set">
                                    <a class="btn btn-secondary-outline" href="{{ route('admin.blog') }}">Назад</a>

                                    <button class="btn btn-info blue-soft" type="submit"><i class="fa fa-check"></i>
                                        Зачувај</button>
                                </div>
                            </div>
                            <div class="portlet-body">
                                <div class="tabbable-line">

                                    <div @if (count($languages) > 1) class="tabbable-line" @endif>
                                        @if (count($languages) > 1)
                                            <ul class="nav nav-tabs">
                                                <?php $loop = 1; ?>

                                                @foreach ($languages as $i)
                                                    <li @if ($loop == 1) class="active" @endif>
                                                        <a href="#tab{{ $loop }}" data-toggle="tab">
                                                            {{ $i['name'] }} </a>
                                                    </li>
                                                    <?php $loop += 1; ?>
                                                @endforeach
                                            </ul>
                                        @endif


                                        <div class="tab-content">
                                            <div class="tab-pane fade active in tabbable-line" id="tab1">

                                                <ul class="nav nav-tabs">
                                                    <li class="active">
                                                        <a href="#tab_general" data-toggle="tab"> Општи информации </a>
                                                    </li>
                                                    <li>
                                                        <a href="#tab_meta" data-toggle="tab"> Meta информации </a>
                                                    </li>
                                                </ul>
                                                <div class="tab-content">
                                                    @include('admin.blog.partials.general')
                                                    @include('admin.blog.partials.meta')
                                                </div>
                                            </div>

                                            <div class="tab-pane fade" id="tab2">
                                                @include('admin.blog.partials.english')
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                <input type="hidden" id="post_id" value="{{ $post_id }}" name="post_id">
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
    <script src="/assets/admin/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
    <script src="/assets/admin/js/pages/blog.js" type="text/javascript"></script>
    <script>
        //init datepickers
        $('.date-picker').datepicker({
            rtl: App.isRTL(),
            autoclose: true
        });

        //init datetimepickers
        $(".datetime-picker").datetimepicker({
            isRTL: App.isRTL(),
            autoclose: true,
            todayBtn: true,
            pickerPosition: (App.isRTL() ? "bottom-right" : "bottom-left"),
            minuteStep: 10
        });
    </script>
@stop

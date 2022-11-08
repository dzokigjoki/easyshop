@extends('layouts.admin')

@section('content')

<!-- END PAGE BREADCRUMBS -->
<!-- BEGIN PAGE CONTENT INNER -->
<div class="content">
    <div class="page-content-inner">
        <div class="row">
            <div class="col-md-12">
                <form class="form-horizontal form-row-seperated" role="form" action="{{ route('admin.banners.store') }}"
                    method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="portlet light portlet-fit ">
                        <div class="portlet-title">
                            <div class="caption">
                                <span class="caption-subject font-blue-soft bold uppercase"> Банер </span>
                            </div>

                            <div class="actions btn-set pull-right">
                                <a class="btn btn-secondary-outline" href="{{route('admin.banners')}}">Назад</a>
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
                                @include('admin.banners.partials.general-tab')

                                <div style="text-align:right;padding-top: 10px;" class="actions btn-set">
                                    <a class="btn btn-secondary-outline" href="{{route('admin.banners')}}">Назад</a>
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
{{--@if($product_id)--}}
{{--<script src="/assets/admin/js/pages/editArticleDatatable.js" type="text/javascript"></script>--}}
{{--@endif--}}
<script>
    $('form').submit(function(e) {
            App.blockUI({
                animate: true,
                overlayColor: '#000'
            });
        })
</script>
@stop
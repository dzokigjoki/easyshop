@extends('layouts.admin')
@section('content')
    <div class="content">
        <div class="page-content-inner row">
            <form method="post"
                  enctype="multipart/form-data"
                  role="form"
                  action="{{ route('admin.settings.store') }}">
                {{csrf_field()}}
                <div class="portlet light portlet-fit col-md-12">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-cog"></i>
                            Подесувања
                        </div>
                        <div class="actions btn-set">
                            <button class="btn btn-success" name="zacuvaj" value="zacuvaj" type="submit"><i
                                        class="fa fa-check"></i> Зачувај
                            </button>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="tabbable-line">
                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a href="#company" data-toggle="tab"> Компанија </a>
                                </li>
                                <li>
                                    <a href="#marketing" data-toggle="tab"> Маркетинг </a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                @include('admin.settings.partials.company-tab')
                                @include('admin.settings.partials.marketing-tab')
                            </div>
                            <div class="col-md-12"
                            style="border-top: 1px solid #eee;border-radius: 2px 2px 0 0; margin-bottom: 10px;padding-top:12px;text-align:right">
                            <div class="actions btn-set">
                            <button class="btn btn-success" name="zacuvaj" value="zacuvaj" type="submit"><i
                            class="fa fa-check"></i> Зачувај
                            </button>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

@stop
@section('scripts')
    <script type="text/javascript">
        var SettingsModule = (function () {
            var SettingsModule = {
                init: function () {
                    $(document).ready(this.handleDocumentReady.bind(this));
                },
                handleDocumentReady: function () {}
            };

            return SettingsModule;
        })();

        SettingsModule.init();
    </script>
    <script>
        $(document).ready(function () {
            $("#addPixel").click(function () {
                var lastField = $("#control-label div:last");
                var intId = (lastField && lastField.length && lastField.data("idx") + 1) || 1;
                var fieldWrapper = $("<div class=\"input-group\" id=\"field" + intId + "\"/>");
                fieldWrapper.data("idx", intId);
                var fName = $("<input style='margin-bottom:10px;' type=\"text\" " +
                    "class=\"form-control\" placeholder=\"Facebook Pixel Код\" " +
                    "name=\"facebook_pixel[]\"/>");
                var removeButton = $("<span class=\"input-group-btn\">" +
                    "<a style='margin-top: -9.5px;' class=\"btn btn-danger\"><i class='fa fa-times'></i></a>" +
                    "</span>");
                removeButton.click(function() {
                    $(this).parent().remove();
                });
                fieldWrapper.append(fName);
                fieldWrapper.append(removeButton);
                $("#control-label").append(fieldWrapper);
            });
            $("#addPixelbg").click(function () {
                var lastField = $("#control-labelbg div:last");
                var intId = (lastField && lastField.length && lastField.data("idx") + 1) || 1;
                var fieldWrapper = $("<div class=\"input-group\" id=\"field" + intId + "\"/>");
                fieldWrapper.data("idx", intId);
                var fName = $("<input style='margin-bottom:10px;' type=\"text\" " +
                    "class=\"form-control\" placeholder=\"Facebook Pixel Код\" " +
                    "name=\"facebook_pixelbg[]\"/>");
                var removeButton = $("<span class=\"input-group-btn\">" +
                    "<a style='margin-top: -9.5px;' class=\"btn btn-danger\"><i class='fa fa-times'></i></a>" +
                    "</span>");
                removeButton.click(function() {
                    $(this).parent().remove();
                });
                fieldWrapper.append(fName);
                fieldWrapper.append(removeButton);
                $("#control-labelbg").append(fieldWrapper);
            });
            $("#addPixelcz").click(function () {
                var lastField = $("#control-labelcz div:last");
                var intId = (lastField && lastField.length && lastField.data("idx") + 1) || 1;
                var fieldWrapper = $("<div class=\"input-group\" id=\"field" + intId + "\"/>");
                fieldWrapper.data("idx", intId);
                var fName = $("<input style='margin-bottom:10px;' type=\"text\" " +
                    "class=\"form-control\" placeholder=\"Facebook Pixel Код\" " +
                    "name=\"facebook_pixelcz[]\"/>");
                var removeButton = $("<span class=\"input-group-btn\">" +
                    "<a style='margin-top: -9.5px;' class=\"btn btn-danger\"><i class='fa fa-times'></i></a>" +
                    "</span>");
                removeButton.click(function() {
                    $(this).parent().remove();
                });
                fieldWrapper.append(fName);
                fieldWrapper.append(removeButton);
                $("#control-labelcz").append(fieldWrapper);
            });
            $("#addPixelhr").click(function () {
                var lastField = $("#control-labelhr div:last");
                var intId = (lastField && lastField.length && lastField.data("idx") + 1) || 1;
                var fieldWrapper = $("<div class=\"input-group\" id=\"field" + intId + "\"/>");
                fieldWrapper.data("idx", intId);
                var fName = $("<input style='margin-bottom:10px;' type=\"text\" " +
                    "class=\"form-control\" placeholder=\"Facebook Pixel Код\" " +
                    "name=\"facebook_pixelhr[]\"/>");
                var removeButton = $("<span class=\"input-group-btn\">" +
                    "<a style='margin-top: -9.5px;' class=\"btn btn-danger\"><i class='fa fa-times'></i></a>" +
                    "</span>");
                removeButton.click(function() {
                    $(this).parent().remove();
                });
                fieldWrapper.append(fName);
                fieldWrapper.append(removeButton);
                $("#control-labelhr").append(fieldWrapper);
            });
            $("#addPixelhu").click(function () {
                var lastField = $("#control-labelhu div:last");
                var intId = (lastField && lastField.length && lastField.data("idx") + 1) || 1;
                var fieldWrapper = $("<div class=\"input-group\" id=\"field" + intId + "\"/>");
                fieldWrapper.data("idx", intId);
                var fName = $("<input style='margin-bottom:10px;' type=\"text\" " +
                    "class=\"form-control\" placeholder=\"Facebook Pixel Код\" " +
                    "name=\"facebook_pixelhu[]\"/>");
                var removeButton = $("<span class=\"input-group-btn\">" +
                    "<a style='margin-top: -9.5px;' class=\"btn btn-danger\"><i class='fa fa-times'></i></a>" +
                    "</span>");
                removeButton.click(function() {
                    $(this).parent().remove();
                });
                fieldWrapper.append(fName);
                fieldWrapper.append(removeButton);
                $("#control-labelhu").append(fieldWrapper);
            });
            $("#addPixelpl").click(function () {
                var lastField = $("#control-labelpl div:last");
                var intId = (lastField && lastField.length && lastField.data("idx") + 1) || 1;
                var fieldWrapper = $("<div class=\"input-group\" id=\"field" + intId + "\"/>");
                fieldWrapper.data("idx", intId);
                var fName = $("<input style='margin-bottom:10px;' type=\"text\" " +
                    "class=\"form-control\" placeholder=\"Facebook Pixel Код\" " +
                    "name=\"facebook_pixelpl[]\"/>");
                var removeButton = $("<span class=\"input-group-btn\">" +
                    "<a style='margin-top: -9.5px;' class=\"btn btn-danger\"><i class='fa fa-times'></i></a>" +
                    "</span>");
                removeButton.click(function() {
                    $(this).parent().remove();
                });
                fieldWrapper.append(fName);
                fieldWrapper.append(removeButton);
                $("#control-labelpl").append(fieldWrapper);
            });
            $("#addPixelro").click(function () {
                var lastField = $("#control-labelro div:last");
                var intId = (lastField && lastField.length && lastField.data("idx") + 1) || 1;
                var fieldWrapper = $("<div class=\"input-group\" id=\"field" + intId + "\"/>");
                fieldWrapper.data("idx", intId);
                var fName = $("<input style='margin-bottom:10px;' type=\"text\" " +
                    "class=\"form-control\" placeholder=\"Facebook Pixel Код\" " +
                    "name=\"facebook_pixelro[]\"/>");
                var removeButton = $("<span class=\"input-group-btn\">" +
                    "<a style='margin-top: -9.5px;' class=\"btn btn-danger\"><i class='fa fa-times'></i></a>" +
                    "</span>");
                removeButton.click(function() {
                    $(this).parent().remove();
                });
                fieldWrapper.append(fName);
                fieldWrapper.append(removeButton);
                $("#control-labelro").append(fieldWrapper);
            });
            $("#addPixelrs").click(function () {
                var lastField = $("#control-labelrs div:last");
                var intId = (lastField && lastField.length && lastField.data("idx") + 1) || 1;
                var fieldWrapper = $("<div class=\"input-group\" id=\"field" + intId + "\"/>");
                fieldWrapper.data("idx", intId);
                var fName = $("<input style='margin-bottom:10px;' type=\"text\" " +
                    "class=\"form-control\" placeholder=\"Facebook Pixel Код\" " +
                    "name=\"facebook_pixelrs[]\"/>");
                var removeButton = $("<span class=\"input-group-btn\">" +
                    "<a style='margin-top: -9.5px;' class=\"btn btn-danger\"><i class='fa fa-times'></i></a>" +
                    "</span>");
                removeButton.click(function() {
                    $(this).parent().remove();
                });
                fieldWrapper.append(fName);
                fieldWrapper.append(removeButton);
                $("#control-labelrs").append(fieldWrapper);
            });
            $("#addPixelsi").click(function () {
                var lastField = $("#control-labelsi div:last");
                var intId = (lastField && lastField.length && lastField.data("idx") + 1) || 1;
                var fieldWrapper = $("<div class=\"input-group\" id=\"field" + intId + "\"/>");
                fieldWrapper.data("idx", intId);
                var fName = $("<input style='margin-bottom:10px;' type=\"text\" " +
                    "class=\"form-control\" placeholder=\"Facebook Pixel Код\" " +
                    "name=\"facebook_pixelsi[]\"/>");
                var removeButton = $("<span class=\"input-group-btn\">" +
                    "<a style='margin-top: -9.5px;' class=\"btn btn-danger\"><i class='fa fa-times'></i></a>" +
                    "</span>");
                removeButton.click(function() {
                    $(this).parent().remove();
                });
                fieldWrapper.append(fName);
                fieldWrapper.append(removeButton);
                $("#control-labelsi").append(fieldWrapper);
            });
            $("#addPixelsk").click(function () {
                var lastField = $("#control-labelsk div:last");
                var intId = (lastField && lastField.length && lastField.data("idx") + 1) || 1;
                var fieldWrapper = $("<div class=\"input-group\" id=\"field" + intId + "\"/>");
                fieldWrapper.data("idx", intId);
                var fName = $("<input style='margin-bottom:10px;' type=\"text\" " +
                    "class=\"form-control\" placeholder=\"Facebook Pixel Код\" " +
                    "name=\"facebook_pixelsk[]\"/>");
                var removeButton = $("<span class=\"input-group-btn\">" +
                    "<a style='margin-top: -9.5px;' class=\"btn btn-danger\"><i class='fa fa-times'></i></a>" +
                    "</span>");
                removeButton.click(function() {
                    $(this).parent().remove();
                });
                fieldWrapper.append(fName);
                fieldWrapper.append(removeButton);
                $("#control-labelsk").append(fieldWrapper);
            });
        });
    </script>
@stop
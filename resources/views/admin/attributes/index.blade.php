@extends('layouts.admin')

@section('head')
    <link href="/assets/admin/global/plugins/bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet"
        type="text/css" />
    <link href="/assets/admin/global/plugins/jquery-multi-select/css/multi-select.css" rel="stylesheet" type="text/css" />
    <link href="/assets/admin/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="/assets/admin/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />

    <link href="/assets/admin/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
    <link href="/assets/admin/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet"
        type="text/css" />

    <style>
        .ms-container {
            width: 100%;
        }

        .ms-container .ms-list {
            height: 100%;
        }

        .page-attributes .dd-handle {
            cursor: pointer;
        }

        div.DTS div.dataTables_scrollBody {
            background: #EFF3F8;
        }

    </style>
@stop

@section('content')

    <div class="page-content-inner page-attributes">


        <div class="row">
            <div class="col-md-5">
                <!-- BEGIN Portlet CATEGORIES-->
                <div class="portlet light">
                    <div class="portlet-title">
                        <div class="caption font-green-sharp">
                            <i class="fa fa-list font-green-sharp"></i>
                            <span class="caption-subject"> Категории</span>
                        </div>
                    </div>

                    <div class="portlet-body">
                        <input type="hidden" id="selected_category" value="{{ $selected_category }}" />
                        <div class="scroller" style="height:339px" data-rail-visible="1" data-rail-color="#ddd"
                            data-handle-color="red">
                            <ol class="dd-list">
                                {!! $nestedCategories !!}
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- END Portlet CATEGORIES-->
            </div>
            <div class="col-md-7">
                <!-- BEGIN Portlet FILTER GROUP-->
                <div class="portlet light">
                    <div class="portlet-title">
                        <div class="caption font-green-sharp">
                            <i class="fa fa-filter font-green-sharp"></i>
                            <span class="caption-subject"> Група на филтри </span>
                            <span class="caption-helper"></span>
                        </div>
                    </div>
                    <div class="portlet-body ">
                        <div style="margin-top:10px;margin-bottom:10px;" class="show_filters_category_message"> Избери
                            категорија со артикли за приказ на филтри </div>
                        <div style="margin-top:10px;margin-bottom:10px;" class="show_filters_listproduct_message"> Избери
                            категорија со артикли за приказ на филтри </div>

                        <div class="scroller filters_category" style="height:300px" data-always-visible="1"
                            data-rail-visible="1" data-rail-color="#ddd" data-handle-color="red">
                            <select multiple="multiple" class="multi-select" id="multi_select1" name="my_multi_select1[]">
                                @foreach ($filters as $filter)
                                    <option value="{{ $filter->id }}">{{ $filter->filter }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <!-- END Portlet FILTER GROUP-->
            </div>
        </div>

        <div class="row">

            <div class="col-md-8">
                <!-- BEGIN Portlet PORTLET-->
                <div class="portlet light">
                    <div class="portlet-title">
                        <div class="caption font-green-sharp">
                            <i class="fa fa-filter font-green-sharp"></i>
                            <span class="caption-subject"> Филтри</span>
                        </div>
                        <div class="actions">
                            <div class="btn-group">
                                <a class="btn btn-circle btn-default " href="#filter" data-toggle="modal">
                                    <i class="fa fa-plus"></i> Нов филтер
                                </a>
                            </div>

                            {{-- Filter Modal --}}
                            <div id="filter" class="modal fade" tabindex="-1" role="basic" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-hidden="true"></button>
                                            <h4 class="modal-title">Нов филтер</h4>
                                        </div>

                                        <div class="modal-body col-md-12">
                                            <div class="row form-group">
                                                <div class="col-md-4">
                                                    <label class="control-label">Филтер</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <input id="filter_name" class="form-control" value="" type="text" />
                                                </div>
                                            </div>

                                            <ul class="nav nav-tabs">

                                                @if (!config( 'clients.' . config( 'app.client') . '.languages'))
                                                    <div class="row form-group">
                                                        <div class="col-md-4">
                                                            <label class="control-label">Име за приказ</label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <input id="filter_text_1" class="form-control" value=""
                                                                type="text">
                                                        </div>
                                                    </div>
                                                @else
                                                    <?php $loop = 1; ?>
                                                    @foreach (config( 'clients.' . config( 'app.client') . '.languages') as $i)

                                                        <div class="row form-group">
                                                            <div class="col-md-4">
                                                                <label class="control-label">Име за приказ на
                                                                    {{ $i['name'] }}</label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input id="filter_text_{{ $loop }}"
                                                                    class="form-control" value="" type="text">
                                                            </div>
                                                        </div>

                                                        <?php $loop += 1; ?>
                                                    @endforeach
                                                    <?php $loop = 1; ?>
                                                @endif
                                            </ul>



                                            <div class="row form-group">
                                                <div class="col-md-4">
                                                    <label class="control-label">Прикажи</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <input id="filter_show" name="active" type="checkbox"
                                                        class="make-switch" data-on-text="Да" data-off-text="Не"
                                                        value="1" />
                                                </div>
                                            </div>


                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn dark btn-outline"
                                                data-dismiss="modal">ОТКАЖИ</button>
                                            <button id="filter_save" type="button" class="btn green">ЗАЧУВАЈ</button>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <table class="table table-striped table-bordered table-hover order-column" id="filter_table">
                            <thead>
                                <tr>
                                    <th class="text-center tooltips" data-container="body" data-placement="top"
                                        data-original-title="Уникатно име">Филтер</th>
                                    <th class="text-center tooltips" data-container="body" data-placement="top"
                                        data-original-title="Име кое се прикажува на web страната">Име за приказ</th>
                                    <th class="text-center tooltips" data-container="body" data-placement="top"
                                        data-original-title="Прикажи на web страна">Прикажи</th>
                                    <th class="text-center" data-orderable="false">&nbsp;</th>
                                </tr>
                            </thead>
                        </table>
                        <div class="modal fade" id="filter-edit" tabindex="-1" role="basic" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-hidden="true"></button>
                                        <h4 class="modal-title">Едитирај филтер</h4>
                                    </div>
                                    <div class="modal-body col-md-12">
                                        <div class="row form-group">
                                            <div class="col-md-4">
                                                <label class="control-label">Филтер</label>
                                            </div>
                                            <div class="col-md-8">
                                                <input id="filter_name_edit" class="form-control" value="" type="text">
                                            </div>
                                        </div>
                                        @if (!config( 'clients.' . config( 'app.client') . '.languages'))
                                            <div class="row form-group">
                                                <div class="col-md-4">
                                                    <label class="control-label">Име за приказ</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <input id="filter_text_edit_1" class="form-control" value=""
                                                        type="text">
                                                </div>
                                            </div>
                                        @else
                                            <?php $loop = 1; ?>
                                            @foreach (config( 'clients.' . config( 'app.client') . '.languages') as $i)

                                                <div class="row form-group">
                                                    <div class="col-md-4">
                                                        <label class="control-label">Име за приказ на
                                                            {{ $i['name'] }}</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <input id="filter_text_edit_{{ $loop }}"
                                                            class="form-control" value="" type="text">
                                                    </div>
                                                </div>

                                                <?php $loop += 1; ?>
                                            @endforeach
                                            <?php $loop = 1; ?>
                                        @endif
                                        <div class="row form-group">
                                            <div class="col-md-4">
                                                <label class="control-label">Прикажи</label>
                                            </div>
                                            <div class="col-md-8">
                                                <input id="filter_show_edit" name="active" type="checkbox"
                                                    class="make-switch" data-on-text="Да" data-off-text="Не" value="1">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn dark btn-outline"
                                            data-dismiss="modal">ОТКАЖИ</button>
                                        <button id="filter_save_edit" type="button" class="btn green">ЗАЧУВАЈ</button>
                                    </div>
                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                        <div class="modal fade" id="filter-delete" tabindex="-1" role="atribute" aria-hidden="true">
                            <input type="hidden" value="0" id="filter_delete">
                            <div class="modal-dialog">
                                <div class="modal-content row">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Дали сте сигурни ?</h4>
                                    </div>
                                    <div class="modal-body row ">
                                        <button id="filter_delete_button" type="button"
                                            class="btn green btn-outline col-md-3 col-md-offset-2"
                                            data-dismiss="modal">Да</button>
                                        <button id="" type="button" class="btn dark col-md-3 col-md-offset-2"
                                            data-dismiss="modal">Не</button>
                                    </div>
                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>

                        <input type="hidden" id="filter_id" value="0">
                        <input type="hidden" id="att_id" value="0">
                    </div>
                </div>
                <!-- END Portlet PORTLET-->
            </div>

            <div class="col-md-4">
                <!-- BEGIN Portlet PORTLET-->
                <div class="portlet light">
                    <div class="portlet-title">
                        <div class="caption font-green-sharp">
                            <i class="fa fa-tags font-green-sharp"></i>
                            <span class="caption-subject"> Атрибути </span>
                        </div>
                        <div class="actions">
                            <div class="btn-group">
                                <a id="new_att" class="btn btn-circle btn-default " href="#atribute">
                                    <i class="fa fa-plus"></i> Нов атрибут
                                </a>
                            </div>
                            <div class="modal fade" id="atribute" tabindex="-1" role="atribute" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-hidden="true"></button>
                                            <h4 class="modal-title">Нов атрибут</h4>
                                        </div>

                                        @if (!config( 'clients.' . config( 'app.client') . '.languages'))
                                            <div class="modal-body">
                                                <div class="form-group row">
                                                    <label class="control-label col-md-4">Вредност</label>
                                                    <div class="col-md-8">
                                                        <input name="number" id="att_value_1" type="text"
                                                            class="form-control" />
                                                    </div>
                                                </div>
                                            </div>
                                        @else

                                            <?php $loop = 1; ?>
                                            @foreach (config( 'clients.' . config( 'app.client') . '.languages') as $i)

                                                <div class="modal-body">
                                                    <div class="form-group row">
                                                        <label class="control-label col-md-4">Вредност на
                                                            {{ $i['name'] }}
                                                        </label>
                                                        <div class="col-md-8">
                                                            <input name="number" id="att_value_{{ $loop }}"
                                                                type="text" class="form-control" />
                                                        </div>
                                                    </div>
                                                </div>

                                                <?php $loop += 1; ?>
                                            @endforeach
                                            <?php $loop = 1; ?>
                                        @endif
                                        <div class="modal-footer">
                                            <button type="button" class="btn dark btn-outline"
                                                data-dismiss="modal">ОТКАЖИ</button>
                                            <button id="save_att" type="button" class="btn green">ЗАЧУВАЈ</button>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <p>Филтер : <span id="filter_span"></span></p>
                        <table class="table table-striped table-bordered table-hover order-column" id="attribute_table">
                            <thead>
                                <tr>
                                    <th class="text-center">Вредност</th>
                                    <th class="text-center" data-orderable="false">&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                        <div class="modal fade" id="atribute-edit" tabindex="-1" role="atribute" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-hidden="true"></button>
                                        <h4 class="modal-title">Едитирај атрибут</h4>
                                    </div>
                                    <div class="modal-body">
                                        @if (!config( 'clients.' . config( 'app.client') . '.languages'))
                                            <div class="modal-body">
                                                <div class="form-group row">
                                                    <label class="control-label col-md-4">Вредност</label>
                                                        <div class="col-md-8">
                                                            <input name="number" id="att_value_edit_1" type="text"
                                                                class="form-control" />
                                                        </div>
                                                </div>
                                            </div>
                                        @else

                                            <?php $loop = 1; ?>
                                            @foreach (config( 'clients.' . config( 'app.client') . '.languages') as $i)

                                                <div class="modal-body">
                                                    <div class="form-group row">
                                                        <label class="control-label col-md-4">Вредност на
                                                            {{ $i['name'] }}
                                                        </label>
                                                        <div class="col-md-8">
                                                            <input name="number" id="att_value_edit_{{ $loop }}"
                                                                type="text" class="form-control" />
                                                        </div>
                                                    </div>
                                                </div>

                                                <?php $loop += 1; ?>
                                            @endforeach
                                        @endif
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn dark btn-outline"
                                            data-dismiss="modal">ОТКАЖИ</button>
                                        <button id="save_att_edit" type="button" class="btn green">ЗАЧУВАЈ</button>
                                    </div>
                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                        <div class="modal fade" id="atribute-delete" tabindex="-1" role="atribute" aria-hidden="true">
                            <input type="hidden" value="0" id="attr_delete">

                            <div class="modal-dialog">
                                <div class="modal-content row">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Дали сте сигурни?</h4>
                                    </div>
                                    <div class="modal-body row ">
                                        <button id="attr_delete_button" type="button"
                                            class="btn dark btn-outline col-md-3 col-md-offset-2"
                                            data-dismiss="modal">Да</button>
                                        <button id="" type="button" class="btn green col-md-3 col-md-offset-2"
                                            data-dismiss="modal">Не</button>
                                    </div>
                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                    </div>
                </div>
                <!-- END Portlet PORTLET-->
            </div>

        </div>
    </div>

@stop


@section('scripts')
    <script src="/assets/admin/global/plugins/bootstrap-select/js/bootstrap-select.min.js" type="text/javascript"></script>
    <script src="/assets/admin/global/plugins/jquery-multi-select/js/jquery.multi-select.js" type="text/javascript">
    </script>
    <script src="/assets/admin/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
    <script src="/assets/admin/pages/scripts/components-multi-select.min.js" type="text/javascript"></script>

    <script>
        $(document).ready(function() {

            $(document).keypress(function(e) {
                if (e.which == 13) {
                    var att_modal = $('#atribute').is(':visible');
                    var filter_modal = $('#filter').is(':visible');
                    var att_modal_edit = $('#atribute-edit').is(':visible');
                    var filter_modal_edit = $('#filter-edit').is(':visible');

                    if (att_modal) {
                        if (!$('#save_att').is(':focus'))
                            $("#save_att").click();
                    }
                    if (filter_modal) {
                        if (!$('#filter_save').is(':focus'))
                            $("#filter_save").click();
                    }
                    if (att_modal_edit) {
                        if (!$('#save_att_edit').is(':focus'))
                            $("#save_att_edit").click();
                    }
                    if (filter_modal_edit) {
                        if (!$('#filter_save_edit').is(':focus'))
                            $("#filter_save_edit").click();
                    }
                }
            });

            $("#new_att").attr("disabled", "disabled");
            $("#new_att").attr("data-toggle", "");

            $('#atribute').on('shown.bs.modal', function() {
                $('#att_value').focus();
            });
            $('#atribute-edit').on('shown.bs.modal', function() {
                $('#att_value_edit').focus();
            });

            $('#filter').on('shown.bs.modal', function() {
                $('#filter_name').focus();
            });
            $('#filter-edit').on('shown.bs.modal', function() {
                $('#filter_name_edit').focus();
            });



            $('#multi_select1').multiSelect({
                afterSelect: function(values) {

                    var category_id = $("#selected_category").val();
                    $.post("{{ URL::to('/admin/filter/storeToCategory') }}", {
                        category_id: category_id,
                        filter_id: values
                    }).done(function(data) {});
                },
                afterDeselect: function(values) {

                    var category_id = $("#selected_category").val();
                    $.post("{{ URL::to('/admin/filter/deleteFromCategory') }}", {
                        category_id: category_id,
                        filter_id: values
                    }).done(function(data) {});
                }
            });

            $(".show_filters_listproduct_message").hide();
            $(".dd-handle").on('click', function() {
                var category_id = $(this).attr('data-id');
                var is_enabled = $(this).hasClass("disabled");
                var is_listproduct = $(this).hasClass("list_product");

                if (!is_enabled && is_listproduct) {
                    $("#selected_category").val(category_id);
                    getCategoryFilters(category_id);
                    $(".show_filters_category_message").hide();
                    $(".show_filters_listproduct_message").hide();
                    $(".filters_category").show();
                } else {
                    $(".filters_category").hide();
                    if (!is_listproduct) {
                        $(".show_filters_category_message").hide();
                        $(".show_filters_listproduct_message").show();
                    } else {
                        $(".show_filters_listproduct_message").hide();
                        $(".show_filters_category_message").show();
                    }
                }
            });


            function getCategoryFilters(category_id) {
                $.get("{{ URL::to('/admin/filters/category') }}/" + category_id).done(function(data) {
                    if (data.success == 1) {
                        if (data.selected.length > 0) {
                            console.log('in if', data.selected);
                            $('#multi_select1').multiSelect('deselect_all');
                            $('#multi_select1').multiSelect('select', data.selected);
                        } else {
                            console.log('in else', data.selected.length);
                            $('#multi_select1').multiSelect('deselect_all');
                        }

                        $(".caption-helper").html("<b> ( Во " + data.category.title + " ) </b>");
                    }
                });
            }



            $("#filter_save").on('click', function() {
                var $filterName = $('#filter_name');
                var $filterText = $('#filter_text_1');
                var $filterText2 = $('#filter_text_2');
                var $filterShow = $('#filter_show');
                var valid = true;

                var filterName = $.trim($filterName.val());
                var filterText = $.trim($filterText.val());
                var filterText2 = $.trim($filterText2.val());
                var filterShow = $filterShow.bootstrapSwitch('state') ? 1 : 0;

                // reset
                $filterName.closest('.form-group').removeClass('has-error');
                $filterText.closest('.form-group').removeClass('has-error');
                $filterText2.closest('.form-group').removeClass('has-error');

                if (!filterName.length) {
                    valid = false;
                    $filterName.closest('.form-group').addClass('has-error');
                }

                if (!filterText.length) {
                    valid = false;
                    $filterText.closest('.form-group').addClass('has-error');
                }

                if (!!valid) {
                    $.post("{{ URL::to('/admin/filter') }}", {
                        filter: filterName,
                        name: filterText,
                        name2: filterText2,
                        show: filterShow
                    }).done(function(data) {
                        if (data.success == 1) {
                            var filter_name = $("#filter_name").val('');
                            var filter_text = $("#filter_text_1").val('');
                            $('#filter').modal('toggle');
                            $('#filter_table').DataTable().ajax.reload();
                            //               location.reload();
                            if (filterShow == 1)
                                $("#multi_select1").multiSelect('addOption', {
                                    value: data.filter_id,
                                    text: filterText,
                                    index: 0,
                                    nested: 'optgroup_label'
                                });
                        }
                    });
                }
            });


            $("#filter_save_edit").on('click', function() {
                var $filterName = $('#filter_name_edit');
                var $filterText = $('#filter_text_edit_1');
                var $filterText2 = $('#filter_text_edit_2');
                var $filterShow = $('#filter_show_edit');
                var valid = true;

                var filterName = $.trim($filterName.val());
                var filterText = $.trim($filterText.val());
                var filterText2 = $.trim($filterText2.val());
                var filterShow = $filterShow.bootstrapSwitch('state') ? 1 : 0;

                // reset
                $filterName.closest('.form-group').removeClass('has-error');
                $filterText.closest('.form-group').removeClass('has-error');
                $filterText2.closest('.form-group').removeClass('has-error');

                if (!filterName.length) {
                    valid = false;
                    $filterName.closest('.form-group').addClass('has-error');
                }

                if (!filterText.length) {
                    valid = false;
                    $filterText.closest('.form-group').addClass('has-error');
                }

                if (!!valid) {

                    $.post("{{ URL::to('/admin/filter') }}", {
                        filter_id: $("#filter_id").val(),
                        filter: filterName,
                        name: filterText,
                        name2: filterText2,
                        show: filterShow
                    }).done(function(data) {
                        if (data.success == 1) {
                            $("#filter_name_edit").val('');
                            $("#filter_text_edit_1").val('');
                            $('#filter-edit').modal('toggle');
                            $('#filter_table').DataTable().ajax.reload();
                            //               location.reload();
                        }
                    });
                }
            });


            var table = $('#filter_table').DataTable({
                ajax: '/admin/filters',
                "language": {
                    url: '/assets/admin/DataTable-Macedonian.json'
                },

                // setup buttons extension: http://datatables.net/extensions/buttons/
                buttons: [
                    /*{ extend: 'print', className: 'btn dark btn-outline' },
                    { extend: 'pdf', className: 'btn green btn-outline' },
                    { extend: 'csv', className: 'btn purple btn-outline ' }*/
                ],

                // scroller extension: http://datatables.net/extensions/scroller/
                scrollY: 300,
                //scrollX:        false,
                deferRender: true,
                scroller: true,

                stateSave: true,

                "order": [
                    [0, 'asc']
                ],

                "lengthMenu": [
                    [10, 15, 20, -1],
                    [10, 15, 20, "All"] // change per page values here
                ],
                // set the initial value
                "pageLength": 10,

                "dom": "<'row' <'col-md-12'B>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>", // horizobtal scrollable datatable

                // Uncomment below line("dom" parameter) to fix the dropdown overflow issue in the datatable cells. The default datatable layout
                // setup uses scrollable div(table-scrollable) with overflow:auto to enable vertical scroll(see: assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js). 
                // So when dropdowns used the scrollable div should be removed. 
                //"dom": "<'row' <'col-md-12'T>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r>t<'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>",
            });


            $('#filter_table tbody').on('click', 'tr', function() {

                if ($(this).hasClass('selected')) {
                    $(this).removeClass('selected');
                } else {
                    table.$('tr.selected').removeClass('selected');
                    $(this).addClass('selected');
                }
            });



            $('#attribute_table').DataTable({

                "ajax": {
                    "url": '/admin/attributes/filter',
                    "data": function(d) {
                        return $.extend({}, d, {
                            "filter": $("#filter_id").val()
                        });
                    }
                },
                "language": {
                    url: '/assets/admin/DataTable-Macedonian.json'
                },

                // setup buttons extension: http://datatables.net/extensions/buttons/
                buttons: [
                    /*{ extend: 'print', className: 'btn dark btn-outline' },
                    { extend: 'pdf', className: 'btn green btn-outline' },
                    { extend: 'csv', className: 'btn purple btn-outline ' }*/
                ],

                // scroller extension: http://datatables.net/extensions/scroller/
                scrollY: 300,
                //scrollX:        false,
                deferRender: true,
                scroller: true,

                stateSave: true,

                "order": [
                    [0, 'asc']
                ],

                "lengthMenu": [
                    [10, 15, 20, -1],
                    [10, 15, 20, "All"] // change per page values here
                ],
                // set the initial value
                "pageLength": 10,

                "dom": "<'row' <'col-md-12'B>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>", // horizobtal scrollable datatable

                // Uncomment below line("dom" parameter) to fix the dropdown overflow issue in the datatable cells. The default datatable layout
                // setup uses scrollable div(table-scrollable) with overflow:auto to enable vertical scroll(see: assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js). 
                // So when dropdowns used the scrollable div should be removed. 
                //"dom": "<'row' <'col-md-12'T>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r>t<'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>",
            });

            $("#attribute_table tbody").on("click", ".edit_att", function() {
                var filter_id = $(this).attr('id');
                filter_id = filter_id.split('_')
                $.get("{{ URL::to('/admin/attribute') }}" + '/' + filter_id[1], {}).done(function(data) {

                    if (data.success == 1) {
                        data = data.data;
                        $("#att_value_edit_1").val(data.value);
                        $("#att_value_edit_2").val(data.value_lang2);
                        $('#att_value_edit').focus();
                    }
                });
                $("#att_id").val(filter_id[1]);
            });


            $("#attribute_table tbody").on("click", ".delete_att", function() {
                var attrId = $(this).data('id');
                $('#attr_delete').val(attrId);
            });


            $("#filter_table tbody").on("click", ".show_att", function() {
                var filter_id = $(this).data('id');
                filter_id = filter_id.split('_')
                $("#filter_id").val(filter_id[1]);
                $('#attribute_table').DataTable().ajax.reload(); //Exact value, column, reg
                $("#new_att").attr("data-toggle", "modal");
                $("#new_att").removeAttr("disabled");
                $("#filter_span").text(filter_id[2]);
            });

            $("#filter_table tbody").on("click", ".delete_filter", function() {
                var filter_id = $(this).attr('id');
                filter_id = filter_id.split('_')
                $("#filter_delete").val(filter_id[1]);

            });

            $("#filter_table tbody").on("click", ".edit_filter", function(e) {
                var filter_id = $(this).attr('id');
                filter_id = filter_id.split('_');
                $.get("{{ URL::to('/admin/filter') }}" + '/' + filter_id[1], {}).done(function(data) {
                    if (data.success == 1) {
                        data = data.data;
                        $("#filter_name_edit").val(data.filter);
                        $("#filter_text_edit_2").val(data.name_lang2);
                        $("#filter_text_edit_1").val(data.name);
                        $("#filter_show_edit").val(data.show);
                    }
                });
                $("#filter_id").val(filter_id[1]);

            });

            $("#filter_delete_button").on('click', function() {

                var filter = $("#filter_delete").val();

                $.post("{{ URL::to('/admin/filter/delete') }}", {
                    filter: filter
                }).done(function(data) {
                    if (data.success == 1) {
                        $('#filter_table').DataTable().ajax.reload();
                        //               location.reload();
                    }
                });
            });


            $("#attr_delete_button").on('click', function() {

                var attrId = $("#attr_delete").val();

                $.post("{{ URL::to('/admin/attributes/delete') }}", {
                    id: attrId
                }).done(function(data) {
                    if (data.success == 1) {
                        $('#attribute_table').DataTable().ajax.reload();
                        //               location.reload();
                    }
                });
            });

            $("#save_att").on('click', function() {
                var $attValue = $("#att_value_1");
                var $attValue2 = $("#att_value_2");

                var filter = $("#filter_id").val();
                var valid = true;

                var attValue = $.trim($attValue.val());
                var attValue2 = $.trim($attValue2.val());

                // reset
                $attValue.closest('.form-group').removeClass('has-error');





                $attValue2.closest('.form-group').removeClass('has-error');

                if (!attValue.length) {
                    valid = false;
                    $attValue.closest('.form-group').addClass('has-error');
                }

                if (!!valid) {
                    $.post("{{ URL::to('/admin/attributes') }}", {
                        value: attValue,
                        value2: attValue2,
                        filter: filter
                    }).done(function(data) {
                        if (data.success == 1) {
                            $attValue.val('');
                            $('#atribute').modal('toggle');
                            $('#attribute_table').DataTable().ajax.reload();
                        }
                    });
                }
            });

            $("#save_att_edit").on('click', function() {

                var $attValue = $("#att_value_edit_1");
                var $attValue2 = $("#att_value_edit_2");
                var filter = $("#filter_id").val();
                var att = $("#att_id").val();
                var valid = true;

                var attValue = $.trim($attValue.val());
                var attValue2 = $.trim($attValue2.val());

                // reset
                $attValue.closest('.form-group').removeClass('has-error');
                $attValue2.closest('.form-group').removeClass('has-error');

                if (!attValue.length) {
                    valid = false;
                    $attValue.closest('.form-group').addClass('has-error');
                }

                if (!!valid) {
                    $.post("{{ URL::to('/admin/attributes') }}", {
                        value: attValue,
                        value2: attValue2,
                        att_id: att
                    }).done(function(data) {
                        if (data.success == 1) {
                            $attValue.val('');
                            $('#atribute-edit').modal('toggle');
                            $('#attribute_table').DataTable().ajax.reload();
                        }
                    });
                }
            });


            //getCategoryFilters($('#selected_category').val());
            $(".filters_category").hide();

        });
    </script>

@stop

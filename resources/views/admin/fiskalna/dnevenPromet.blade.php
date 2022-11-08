@extends('layouts.admin')
@section('content')
    <div class="page-content-inner">

        <style>
            .dashboard-stat .visual {
                height: auto !important;
            }
        </style>

        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN SAMPLE TABLE PORTLET-->
                <div class="portlet light ">
                    <div class="portlet-title">
                        <div class="caption">
                            <span class="caption-subject font-blue-soft bold uppercase"> Дневен промет</span>
                        </div>
                    </div>
                    <div class="portlet-body">

                        <div class="row">
                            <form id="dashboard-form" action="{{URL::to('/admin/fiskalni/dnevenPromet')}}" method="get">
                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 margin-bottom-10">
                                    <input type="hidden" id="when" name="when" value="{{$when}}"/>
                                    <button type="submit" class="btn btn-sm btn-info blue-soft" data-time="0">Денес</button>
                                    <button type="submit" class="btn btn-sm btn-info blue-soft" data-time="1"/>Вчера</button>
                                    <button type="submit" class="btn btn-sm btn-info blue-soft" data-time="3"/>3 дена</button>
                                    <button type="submit" class="btn btn-sm btn-info blue-soft" data-time="7"/>7 дена</button>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 margin-bottom-10">
                                    {{--Warehouses--}}
                                    <div class="form-group">
                                        <select id="warehouse_id" name="warehouse_id" class="select2" style="width:100%">
                                            @foreach($warehouses as $warehouse)
                                                <option @if($selected_wh == $warehouse->id) selected @endif value="{{$warehouse->id}}">{{$warehouse->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </form>
                        </div>


                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 margin-bottom-10">
                                <div class="dashboard-stat blue">
                                    <div class="visual">
                                        <i class="fa fa-briefcase fa-icon-medium"></i>
                                    </div>
                                    <div class="details">
                                        <div class="number"> {{number_format($iznos_count, 2, ',', '.')}}  </div>
                                        <div class="desc"> Промет <br>
                                            @if($when == 0)
                                                (денес)
                                            @elseif($when == 1)
                                                (вчера)
                                            @elseif($when == 3)
                                                (последни 3 дена)
                                            @elseif($when == 7)
                                                (последни 7 дена)
                                            @else
                                                (денес)
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <div class="dashboard-stat red-haze">
                                    <div class="visual">
                                        <i class="fa fa-shopping-cart"></i>
                                    </div>
                                    <div class="details">
                                        <div class="number"> {{$br_smetki}} </div>
                                        <div class="desc"> Фискални сметки <br>
                                            @if($when == 0)
                                                (денес)
                                            @elseif($when == 1)
                                                (вчера)
                                            @elseif($when == 3)
                                                (последни 3 дена)
                                            @elseif($when == 7)
                                                (последни 7 дена)
                                            @else
                                                (денес)
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <div class="dashboard-stat red">
                                    <div class="visual">
                                        <i class="fa fa-group"></i>
                                    </div>
                                    <div class="details">
                                        <div class="number"> {{$br_items}} </div>
                                        <div class="desc"> Продадени производи <br>
                                            @if($when == 0)
                                                (денес)
                                            @elseif($when == 1)
                                                (вчера)
                                            @elseif($when == 3)
                                                (последни 3 дена)
                                            @elseif($when == 7)
                                                (последни 7 дена)
                                            @else
                                                (денес)
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <div class="dashboard-stat green">
                                    <div class="visual">
                                        <i class="fa fa-briefcase"></i>
                                    </div>
                                    <div class="details">
                                        <div class="number"> {{number_format($iznos_count_storno, 2, ',', '.')}} </div>
                                        <div class="desc"> Сторно <br>
                                            @if($when == 0)
                                                (денес)
                                            @elseif($when == 1)
                                                (вчера)
                                            @elseif($when == 3)
                                                (последни 3 дена)
                                            @elseif($when == 7)
                                                (последни 7 дена)
                                            @else
                                                (денес)
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        {{--<div class="row" style="margin-bottom: 40px;padding-bottom: 20px;">--}}
                            {{--<div class="col-md-3">--}}
                                {{--<div class="form-group">--}}
                                    {{--<label>Датум</label>--}}
                                    {{--<div class="input-group input-medium date-picker input-daterange" data-date-format="dd.mm.yyyy" data-date-week-start = "1">--}}
                                        {{--<input type="text"--}}
                                               {{--class="form-control"--}}
                                               {{--id="from_date"--}}
                                               {{--name="from_date"--}}
                                               {{--value="{{ date('d.m.Y',strtotime('-31day',time()))  }}" style="text-align:left;">--}}
                                        {{--<span class="input-group-addon"> до </span>--}}
                                        {{--<input type="text"--}}
                                               {{--class="form-control"--}}
                                               {{--id="to_date"--}}
                                               {{--name="to_date"--}}
                                               {{--value="{{date('d.m.Y')}}" style="text-align:left;">--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}

                            {{--Fiskalni--}}
                            {{--<div class="col-md-3">--}}
                                {{--<div class="form-group">--}}
                                    {{--<label>Магацини</label>--}}
                                    {{--<div>--}}
                                        {{--<select id="warehouse_id" name="warehouse_id" class="select2" style="width:100%">--}}
                                            {{--@foreach($warehouses as $warehouse)--}}
                                                {{--<option value="{{$warehouse->id}}">{{$warehouse->title}}</option>--}}
                                            {{--@endforeach--}}
                                        {{--</select>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        <?php //echo $iznos_count; ?>


                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
@section('scripts')

    <script type="text/javascript">
        $(".select2").select2();
        $('#warehouse_id').on('change', function() {
            $('#dashboard-form').submit();
        });

        $('[data-time]').on('click', function () {
            var value = $(this).data('time');
            $('#when').val(value);
            $('#dashboard-form').submit();
        });

$("#magacin_label").text($('#warehouse_id :selected').text());
    </script>
    <script src="/assets/admin/global/plugins/flot/jquery.flot.min.js" type="text/javascript"></script>
    <script src="/assets/admin/global/plugins/flot/jquery.flot.resize.min.js" type="text/javascript"></script>
    <script src="/assets/admin/global/plugins/flot/jquery.flot.categories.min.js" type="text/javascript"></script>
    <script src="/assets/admin/pages/scripts/ecommerce-dashboard.js" type="text/javascript"></script>

    <script src="/assets/admin/pages/scripts/ecommerce-products-edit.js" type="text/javascript"></script>@stop
<style type="text/css">
    /*td{*/
    /*text-align: right;*/
    /*}*/
</style>
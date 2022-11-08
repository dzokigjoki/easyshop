@extends('layouts.admin')

@section('content')

    <!-- BEGIN PAGE BREADCRUMBS -->
    <ul class="page-breadcrumb breadcrumb">
        <li>
            <a href="/">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Контролна табла</span>
        </li>
    </ul>
    <!-- END PAGE BREADCRUMBS -->
    <!-- BEGIN PAGE CONTENT INNER -->
    @if (\EasyShop\Models\AdminSettings::isSetTrue('sales', 'modules'))
        <div class="page-content-inner">
            <div class="row">
                <div class="col-md-12">


                    <form id="dashboard-form" action="{{ URL::to('/admin/dashboard') }}" method="get">
                        <div class="row">


                            <div style="padding:0;" class="col-lg-6 col-sm-12 col-xs-12">
                                <div class="col-lg-12 margin-bottom-10 caption-subject font-blue bold uppercase">
                                    Се прикажува за опсег од <i style="padding-left: 5px; padding-right: 5px;"
                                        class="fa fa-calendar"></i> {{ $starts_at_range }} до <i
                                        style="padding-left: 5px; padding-right: 5px;" class="fa fa-calendar"></i>
                                    {{ $ends_at_range }}
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 margin-bottom-10">
                                    <input type="hidden" id="when" name="when" value="{{ $when }}" />
                                    <button type="submit" class="btn btn-sm btn-info blue-soft" data-time="0">Денес</button>
                                    <button type="submit" class="btn btn-sm btn-info blue-soft"
                                        data-time="1" />Вчера</button>
                                    <button type="submit" class="btn btn-sm btn-info blue-soft" data-time="3" />3
                                    дена</button>
                                    <button type="submit" class="btn btn-sm btn-info blue-soft" data-time="7" />7
                                    дена</button>
                                    <button type="submit" class="btn btn-sm btn-info blue-soft" data-time="30" />30
                                    дена</button>
                                </div>
                                <div style="display:table; border-collapse: separate" id="date-range-picker"
                                    class="col-lg-10 col-md-10 col-sm-10 col-xs-12 date-picker margin-bottom-10"
                                    data-date="10.11.2012" data-date-format="dd.mm.yyyy" data-date-week-start="1">
                                    <input type="text" class="form-control" name="start" style="text-align:left;"
                                        value="{{ $starts_at_range }}" id="starts_at_range">
                                    <span class="input-group-addon"> до : </span>
                                    <input type="text" class="form-control" name="end" style="text-align:left;"
                                        value="{{ $ends_at_range }}" id="ends_at_range">
                                </div>
                            </div>
                            <div style="padding:0;" class="col-lg-6 col-sm-12 col-xs-12">
                                <div class="col-lg-12 margin-bottom-10 caption-subject font-blue bold uppercase">
                                    Избери Магацин
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 margin-bottom-10">
                                    {{-- Warehouses --}}
                                    <div class="form-group">
                                        <select id="warehouse_id" name="warehouse_id" class="select2" style="width:100%">
                                            @if (\Auth::user()->canDo('admin_izbor_magacin'))
                                                @foreach ($warehouses as $warehouse)
                                                    <option @if ($selected_wh == $warehouse->id) selected @endif
                                                        value="{{ $warehouse->id }}">
                                                        {{ $warehouse->title }}</option>
                                                @endforeach
                                            @else
                                                @foreach ($warehouses as $warehouse)
                                                    @if ($selected_wh == $warehouse->id)
                                                        <option selected value="{{ $warehouse->id }}">
                                                            {{ $warehouse->title }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php $hide_calculate_eur = $hide_calculate_eur   = in_array('EUR', collect(\EasyShop\Models\AdminSettings::getField('currencies'))->pluck("name")->toArray()); ?>
                    @if ($hide_calculate_eur == true)

                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 margin-bottom-10">
                            <div class="form-group">
                                <button type="submit" class="btn btn-sm btn-info blue-soft" data-currency="0" />Пресметај
                                @if (empty($eur)) &euro; @else денари @endif</button>
                                <input type="hidden" id="eur" name="eur" value="{{ $eur }}" />
                            </div>
                        @endif
                    </form>

                </div>
            </div>
            <div class="row">

                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 margin-bottom-10">
                    <div class="dashboard-stat blue">
                        <div class="visual">
                            <i class="fa fa-briefcase fa-icon-medium"></i>
                        </div>
                        <div class="details">
                            @if (empty($eur))
                                <div class="number"> {{ number_format($sum, 2, ',', '.') }} </div>
                            @else
                                <div class="number"> {{ number_format($sum / 61.5, 2, ',', '.') }} &euro; </div>
                            @endif
                            <div class="desc"> Приход
                                @if ($when == 'custom')
                                    во дадениот опсег
                                @elseif ($when == 0)
                                    денес
                                @elseif($when == 1)
                                    вчера
                                @elseif($when == 3)
                                    последни 3 дена
                                @elseif($when == 7)
                                    последни 7 дена
                                @elseif($when == 30)
                                    последни 30 дена
                                @else
                                    денес
                                @endif
                            </div>
                        </div>
                        <a class="more" href="{{ route('admin.report.salesbyproductView') }}"> Види повеќе @if (!empty($hide_calculate_eur))<span
                                    style="padding-left:30%"><b>{{ number_format($sum_all / 61.5, 2, ',', '.') }}
                                        &euro;</b></span>@endif
                            <i class="m-icon-swapright m-icon-white"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="dashboard-stat red-haze">
                        <div class="visual">
                            <i class="fa fa-shopping-cart"></i>
                        </div>
                        <div class="details">
                            <div class="number"> {{ $naracki_count }} </div>
                            <div class="desc"> Нарачки
                                @if ($when == 'custom')
                                    во дадениот опсег
                                @elseif ($when == 0)
                                    денес
                                @elseif($when == 1)
                                    вчера
                                @elseif($when == 3)
                                    последни 3 дена
                                @elseif($when == 7)
                                    последни 7 дена
                                @elseif($when == 30)
                                    последни 30 дена
                                @else
                                    денес
                                @endif
                            </div>
                        </div>
                        <a class="more" href="{{ route('admin.document.index', ['narachka']) }}"> Види повеќе
                            @if (!empty($hide_calculate_eur))<span
                                    style="padding-left:40%"><b />({{ $naracki_count_all }})</b></span>@endif
                            <i class="m-icon-swapright m-icon-white"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="dashboard-stat red">
                        <div class="visual">
                            <i class="fa fa-group"></i>
                        </div>
                        <div class="details">
                            <div class="number"> {{ $vk }} </div>
                            <div class="desc">Продадени производи
                                @if ($when == 'custom')
                                    во дадениот опсег
                                @elseif ($when == 0)
                                    денес
                                @elseif($when == 1)
                                    вчера
                                @elseif($when == 3)
                                    последни 3 дена
                                @elseif($when == 7)
                                    последни 7 дена
                                @elseif($when == 30)
                                    последни 30 дена
                                @else
                                    денес
                                @endif
                            </div>
                        </div>
                        <a class="more" href=""> Види повеќе @if (!empty($hide_calculate_eur)) <span
                                    style="padding-left:40%"><b />({{ $vk }})</b></span>@endif
                            <i class="m-icon-swapright m-icon-white"></i>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" style="display:none">
                    <div class="dashboard-stat green">
                        <div class="visual">
                            <i class="fa fa-shopping-basket"></i>
                        </div>
                        <div class="details">
                            <div class="number"> 4.560 мкд </div>
                            <div class="desc"> Цена на просечна нарачка </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                @if ($selected_warehouse->prodavnica)
                    <div class="col-md-12">
                        <!-- BEGIN SAMPLE TABLE PORTLET-->
                        <div class="portlet light ">
                            <div class="portlet-title">
                                <div class="caption">
                                    <span class="caption-subject font-blue-soft bold uppercase"> Фискални Сметки</span>
                                </div>

                                <div class="actions">

                                </div>
                            </div>
                            <div class="portlet-body">
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 margin-bottom-10">
                                        <div class="dashboard-stat blue">
                                            <div class="visual">
                                                <i class="fa fa-briefcase fa-icon-medium"></i>
                                            </div>
                                            <div class="details">

                                                <div class="number" id="promet_div"> </div>
                                                <div class="desc"> Промет</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                        <div class="dashboard-stat red-haze">
                                            <div class="visual">
                                                <i class="fa fa-shopping-cart"></i>
                                            </div>
                                            <div class="details">
                                                <div class="number" id="fiskalni_div"> </div>
                                                <div class="desc"> Фискални сметки <br>
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
                                                <div class="number" id="prodadeni_div"> </div>
                                                <div class="desc"> Продадени производи <br>
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
                                                <div class="number" id="storno_div"> </div>
                                                <div class="desc"> Сторно <br>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
    @endif
    </div>
    <div class="row">
        <div class="col-md-6">

            <div class="portlet light ">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-share font-blue"></i>
                        <span class="caption-subject font-blue bold uppercase">Најпродавани артикли
                            @if ($when == 'custom')
                                во дадениот опсег
                            @elseif ($when == 0)
                                денес
                            @elseif($when == 1)
                                вчера
                            @elseif($when == 3)
                                последни 3 дена
                            @elseif($when == 7)
                                последни 7 дена
                            @elseif($when == 30)
                                последни 30 дена
                            @else
                                денес
                            @endif
                        </span>
                    </div>

                </div>
                <div class="portlet-body">
                    <div class="">
                        <div class="tab-content">
                            <div class="tab-pane active">
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover table-bordered">
                                        <thead>
                                            <tr>
                                                <th> Артикл </th>
                                                <th> Цена </th>
                                                <th> Количина </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($najprodavani as $np)
                                                <tr>
                                                    <td>
                                                        <a
                                                            href="{{ URL::to('admin/articles/show') }}/{{ $np->product_id }}">
                                                            {{ $np->item_name }} </a>
                                                    </td>
                                                    @if (empty($eur))
                                                        <td> {{ number_format($np->sum_vat, 2, ',', '.') }} </td>
                                                    @else
                                                        <td> {{ number_format($np->sum_vat / 61.5, 2, ',', '.') }} &euro;
                                                        </td>
                                                    @endif
                                                    <td> {{ $np->sum }} </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-md-6">
            @if (in_array(config('app.client'), \EasyShop\Models\Settings::CLIENT_NATURATHERAPY_SHOPS))
                <div class="portlet light ">
                    <div class="portlet-title tabbable-line">

                        <div class="caption">
                            <i class="icon-globe font-red"></i>
                            <span class="caption-subject font-red bold uppercase">Најпродавани артикли по тип и оператор
                                @if ($when == 'custom')
                                    во дадениот опсег
                                @elseif ($when == 0)
                                    денес
                                @elseif($when == 1)
                                    вчера
                                @elseif($when == 3)
                                    последни 3 дена
                                @elseif($when == 7)
                                    последни 7 дена
                                @elseif($when == 30)
                                    последни 30 дена
                                @else
                                    денес
                                @endif
                            </span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Тип на нарачка</label>
                                <div>
                                    <select class="notranslate" id="order_type_dashboard" class="select2" style="width: 100%;">
                                        @foreach ($documentOrderType_select as $ks => $ds)

                                            <option class="notranslate" @if ($ds == $order_type_dashboard) selected @endif value="{{ $ks }}">
                                                {{ $ds }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Оператор</label>
                                <div>
                                    <select id="created_by_dashboard" class="select2" style="width: 100%;">
                                        <option value="-1">Сите оператори</option>
                                        @foreach ($employees as $e)
                                            <option @if ($e->id == $created_by_dashboard) selected @endif value="{{ $e->id }}">
                                                {{ $e->first_name }} {{ $e->last_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="portlet-body">
                        <div class="">
                            <div class="tab-content">
                                <div class="tab-pane active">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-hover table-bordered">
                                            <thead>
                                                <tr>
                                                    <th> Артикл </th>
                                                    <th> Цена </th>
                                                    <th> Количина </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($bestSellers as $np)
                                                    <tr>
                                                        <td>
                                                            <a
                                                                href="{{ URL::to('admin/articles/show') }}/{{ $np->product_id }}">
                                                                {{ $np->item_name }} </a>
                                                        </td>
                                                        @if (empty($eur))
                                                            <td> {{ number_format($np->sum_vat, 2, ',', '.') }} </td>
                                                        @else
                                                            <td> {{ number_format($np->sum_vat / 61.5, 2, ',', '.') }}
                                                                &euro;
                                                            </td>
                                                        @endif
                                                        <td> {{ $np->sum }} </td>
                                                    </tr>
                                                @endforeach
                                                <tr>
                                                    <td>Вкупно</td>
                                                    <td>
                                                        {{ number_format($bestSellersSum, 2, ',', '.') }}
                                                    </td>
                                                    <td>
                                                        {{ $bestSellersQua }}
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="caption">
                    <i class="icon-globe font-red"></i>
                    <span class="caption-subject font-red bold uppercase"> Неделен графикон за нарачки во магацин - <span
                            id="magacin_label"></span></span>
                </div>
            @endif
            <!--                   <ul class="nav nav-tabs">
                                            <li class="active">
                                                <a href="#portlet_ecommerce_tab_1" data-toggle="tab"> Приход </a>
                                            </li>
                                            <li>
                                                <a href="#portlet_ecommerce_tab_2" id="statistics_orders_tab" data-toggle="tab"> Нарачки </a>
                                            </li>
                                        </ul> -->
        </div>
        <div class="portlet-body">
            <div class="tab-content">
                <div class="tab-pane active" id="portlet_ecommerce_tab_1">
                    <div id="statistics_1" class="chart"> </div>
                </div>
                <!--                        <div class="tab-pane" id="portlet_ecommerce_tab_2">
                                                <div id="statistics_2" class="chart"> </div>
                                            </div> -- >
                                        </div>
                    <!--                    <div class="well margin-top-20">
                                            <div class="row">
                                                <div class="col-md-3 col-sm-3 col-xs-6 text-stat">
                                                    <span class="label label-success"> Приход: </span>
                                                    <h3>$1,234,112.20</h3>
                                                </div>
                                                <div class="col-md-3 col-sm-3 col-xs-6 text-stat">
                                                    <span class="label label-info"> Данок: </span>
                                                    <h3>$134,90.10</h3>
                                                </div>
                                                <div class="col-md-3 col-sm-3 col-xs-6 text-stat">
                                                    <span class="label label-danger"> Испорачано: </span>
                                                    <h3>$1,134,90.10</h3>
                                                </div>
                                                <div class="col-md-3 col-sm-3 col-xs-6 text-stat">
                                                    <span class="label label-warning"> Нарачано: </span>
                                                    <h3>235090</h3>
                                                </div>
                                            </div>
                                        </div> -->
            </div>
        </div>

    </div>
    </div>
    <!--
                        <div class="row">
                            <div class="col-md-6 col-sm-6">

                                <div class="portlet light ">
                                    <div class="portlet-title tabbable-line">
                                        <div class="caption">
                                            <i class="icon-globe font-green-sharp"></i>
                                            <span class="caption-subject font-green-sharp bold uppercase">Нарачки</span>
                                        </div>
                                        <ul class="nav nav-tabs">
                                            <li class="active">
                                                <a href="#tab_1_1" class="active" data-toggle="tab"> Во процедура </a>
                                            </li>
                                            <li>
                                                <a href="#tab_1_2" data-toggle="tab"> На чекање </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="portlet-body">

                                        <div class="tab-content">
                                            <div class="tab-pane active" id="tab_1_1">
                                                <div class="scroller" style="height: 339px;" data-always-visible="1" data-rail-visible="0">
                                                    <ul class="feeds">
                                                        <li>
                                                            <div class="col1">
                                                                <div class="cont">
                                                                    <div class="cont-col1">
                                                                        <div class="label label-sm label-success">
                                                                            <i class="fa fa-bell-o"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="cont-col2">
                                                                        <div class="desc"> You have 4 pending tasks.
                                                                            <span class="label label-sm label-info"> Take action
                                                                                <i class="fa fa-share"></i>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col2">
                                                                <div class="date"> Just now </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:;">
                                                                <div class="col1">
                                                                    <div class="cont">
                                                                        <div class="cont-col1">
                                                                            <div class="label label-sm label-success">
                                                                                <i class="fa fa-bell-o"></i>
                                                                            </div>
                                                                        </div>
                                                                        <div class="cont-col2">
                                                                            <div class="desc"> New version v1.4 just lunched! </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col2">
                                                                    <div class="date"> 20 mins </div>
                                                                </div>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <div class="col1">
                                                                <div class="cont">
                                                                    <div class="cont-col1">
                                                                        <div class="label label-sm label-danger">
                                                                            <i class="fa fa-bolt"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="cont-col2">
                                                                        <div class="desc"> Database server #12 overloaded. Please fix the issue. </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col2">
                                                                <div class="date"> 24 mins </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="col1">
                                                                <div class="cont">
                                                                    <div class="cont-col1">
                                                                        <div class="label label-sm label-info">
                                                                            <i class="fa fa-bullhorn"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="cont-col2">
                                                                        <div class="desc"> New order received. Please take care of it. </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col2">
                                                                <div class="date"> 30 mins </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="col1">
                                                                <div class="cont">
                                                                    <div class="cont-col1">
                                                                        <div class="label label-sm label-success">
                                                                            <i class="fa fa-bullhorn"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="cont-col2">
                                                                        <div class="desc"> New order received. Please take care of it. </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col2">
                                                                <div class="date"> 40 mins </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="col1">
                                                                <div class="cont">
                                                                    <div class="cont-col1">
                                                                        <div class="label label-sm label-warning">
                                                                            <i class="fa fa-plus"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="cont-col2">
                                                                        <div class="desc"> New user registered. </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col2">
                                                                <div class="date"> 1.5 hours </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="col1">
                                                                <div class="cont">
                                                                    <div class="cont-col1">
                                                                        <div class="label label-sm label-success">
                                                                            <i class="fa fa-bell-o"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="cont-col2">
                                                                        <div class="desc"> Web server hardware needs to be upgraded.
                                                                            <span class="label label-sm label-default "> Overdue </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col2">
                                                                <div class="date"> 2 hours </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="col1">
                                                                <div class="cont">
                                                                    <div class="cont-col1">
                                                                        <div class="label label-sm label-default">
                                                                            <i class="fa fa-bullhorn"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="cont-col2">
                                                                        <div class="desc"> New order received. Please take care of it. </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col2">
                                                                <div class="date"> 3 hours </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="col1">
                                                                <div class="cont">
                                                                    <div class="cont-col1">
                                                                        <div class="label label-sm label-warning">
                                                                            <i class="fa fa-bullhorn"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="cont-col2">
                                                                        <div class="desc"> New order received. Please take care of it. </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col2">
                                                                <div class="date"> 5 hours </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="col1">
                                                                <div class="cont">
                                                                    <div class="cont-col1">
                                                                        <div class="label label-sm label-info">
                                                                            <i class="fa fa-bullhorn"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="cont-col2">
                                                                        <div class="desc"> New order received. Please take care of it. </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col2">
                                                                <div class="date"> 18 hours </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="col1">
                                                                <div class="cont">
                                                                    <div class="cont-col1">
                                                                        <div class="label label-sm label-default">
                                                                            <i class="fa fa-bullhorn"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="cont-col2">
                                                                        <div class="desc"> New order received. Please take care of it. </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col2">
                                                                <div class="date"> 21 hours </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="col1">
                                                                <div class="cont">
                                                                    <div class="cont-col1">
                                                                        <div class="label label-sm label-info">
                                                                            <i class="fa fa-bullhorn"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="cont-col2">
                                                                        <div class="desc"> New order received. Please take care of it. </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col2">
                                                                <div class="date"> 22 hours </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="col1">
                                                                <div class="cont">
                                                                    <div class="cont-col1">
                                                                        <div class="label label-sm label-default">
                                                                            <i class="fa fa-bullhorn"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="cont-col2">
                                                                        <div class="desc"> New order received. Please take care of it. </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col2">
                                                                <div class="date"> 21 hours </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="col1">
                                                                <div class="cont">
                                                                    <div class="cont-col1">
                                                                        <div class="label label-sm label-info">
                                                                            <i class="fa fa-bullhorn"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="cont-col2">
                                                                        <div class="desc"> New order received. Please take care of it. </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col2">
                                                                <div class="date"> 22 hours </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="col1">
                                                                <div class="cont">
                                                                    <div class="cont-col1">
                                                                        <div class="label label-sm label-default">
                                                                            <i class="fa fa-bullhorn"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="cont-col2">
                                                                        <div class="desc"> New order received. Please take care of it. </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col2">
                                                                <div class="date"> 21 hours </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="col1">
                                                                <div class="cont">
                                                                    <div class="cont-col1">
                                                                        <div class="label label-sm label-info">
                                                                            <i class="fa fa-bullhorn"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="cont-col2">
                                                                        <div class="desc"> New order received. Please take care of it. </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col2">
                                                                <div class="date"> 22 hours </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="col1">
                                                                <div class="cont">
                                                                    <div class="cont-col1">
                                                                        <div class="label label-sm label-default">
                                                                            <i class="fa fa-bullhorn"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="cont-col2">
                                                                        <div class="desc"> New order received. Please take care of it. </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col2">
                                                                <div class="date"> 21 hours </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="col1">
                                                                <div class="cont">
                                                                    <div class="cont-col1">
                                                                        <div class="label label-sm label-info">
                                                                            <i class="fa fa-bullhorn"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="cont-col2">
                                                                        <div class="desc"> New order received. Please take care of it. </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col2">
                                                                <div class="date"> 22 hours </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="tab_1_2">
                                                <div class="scroller" style="height: 290px;" data-always-visible="1" data-rail-visible1="1">
                                                    <ul class="feeds">
                                                        <li>
                                                            <a href="javascript:;">
                                                                <div class="col1">
                                                                    <div class="cont">
                                                                        <div class="cont-col1">
                                                                            <div class="label label-sm label-success">
                                                                                <i class="fa fa-bell-o"></i>
                                                                            </div>
                                                                        </div>
                                                                        <div class="cont-col2">
                                                                            <div class="desc"> New user registered </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col2">
                                                                    <div class="date"> Just now </div>
                                                                </div>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:;">
                                                                <div class="col1">
                                                                    <div class="cont">
                                                                        <div class="cont-col1">
                                                                            <div class="label label-sm label-success">
                                                                                <i class="fa fa-bell-o"></i>
                                                                            </div>
                                                                        </div>
                                                                        <div class="cont-col2">
                                                                            <div class="desc"> New order received </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col2">
                                                                    <div class="date"> 10 mins </div>
                                                                </div>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <div class="col1">
                                                                <div class="cont">
                                                                    <div class="cont-col1">
                                                                        <div class="label label-sm label-danger">
                                                                            <i class="fa fa-bolt"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="cont-col2">
                                                                        <div class="desc"> Order #24DOP4 has been rejected.
                                                                            <span class="label label-sm label-danger "> Take action
                                                                                <i class="fa fa-share"></i>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col2">
                                                                <div class="date"> 24 mins </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:;">
                                                                <div class="col1">
                                                                    <div class="cont">
                                                                        <div class="cont-col1">
                                                                            <div class="label label-sm label-success">
                                                                                <i class="fa fa-bell-o"></i>
                                                                            </div>
                                                                        </div>
                                                                        <div class="cont-col2">
                                                                            <div class="desc"> New user registered </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col2">
                                                                    <div class="date"> Just now </div>
                                                                </div>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:;">
                                                                <div class="col1">
                                                                    <div class="cont">
                                                                        <div class="cont-col1">
                                                                            <div class="label label-sm label-success">
                                                                                <i class="fa fa-bell-o"></i>
                                                                            </div>
                                                                        </div>
                                                                        <div class="cont-col2">
                                                                            <div class="desc"> New user registered </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col2">
                                                                    <div class="date"> Just now </div>
                                                                </div>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:;">
                                                                <div class="col1">
                                                                    <div class="cont">
                                                                        <div class="cont-col1">
                                                                            <div class="label label-sm label-success">
                                                                                <i class="fa fa-bell-o"></i>
                                                                            </div>
                                                                        </div>
                                                                        <div class="cont-col2">
                                                                            <div class="desc"> New user registered </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col2">
                                                                    <div class="date"> Just now </div>
                                                                </div>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:;">
                                                                <div class="col1">
                                                                    <div class="cont">
                                                                        <div class="cont-col1">
                                                                            <div class="label label-sm label-success">
                                                                                <i class="fa fa-bell-o"></i>
                                                                            </div>
                                                                        </div>
                                                                        <div class="cont-col2">
                                                                            <div class="desc"> New user registered </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col2">
                                                                    <div class="date"> Just now </div>
                                                                </div>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:;">
                                                                <div class="col1">
                                                                    <div class="cont">
                                                                        <div class="cont-col1">
                                                                            <div class="label label-sm label-success">
                                                                                <i class="fa fa-bell-o"></i>
                                                                            </div>
                                                                        </div>
                                                                        <div class="cont-col2">
                                                                            <div class="desc"> New user registered </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col2">
                                                                    <div class="date"> Just now </div>
                                                                </div>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:;">
                                                                <div class="col1">
                                                                    <div class="cont">
                                                                        <div class="cont-col1">
                                                                            <div class="label label-sm label-success">
                                                                                <i class="fa fa-bell-o"></i>
                                                                            </div>
                                                                        </div>
                                                                        <div class="cont-col2">
                                                                            <div class="desc"> New user registered </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col2">
                                                                    <div class="date"> Just now </div>
                                                                </div>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:;">
                                                                <div class="col1">
                                                                    <div class="cont">
                                                                        <div class="cont-col1">
                                                                            <div class="label label-sm label-success">
                                                                                <i class="fa fa-bell-o"></i>
                                                                            </div>
                                                                        </div>
                                                                        <div class="cont-col2">
                                                                            <div class="desc"> New user registered </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col2">
                                                                    <div class="date"> Just now </div>
                                                                </div>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="portlet light ">
                                    <div class="portlet-title">
                                        <div class="caption caption-md">
                                            <i class="icon-bar-chart font-green"></i>
                                            <span class="caption-subject font-green bold uppercase">Пристигнати тикети</span>
                                            <span class="caption-helper">45 неодговорени</span>
                                        </div>
                                        <div class="inputs">
                                            <div class="portlet-input input-inline input-small ">
                                                <div class="input-icon right">
                                                    <i class="icon-magnifier"></i>
                                                    <input type="text" class="form-control form-control-solid input-circle" placeholder="search..."> </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        <div class="scroller" style="height: 338px;" data-always-visible="1" data-rail-visible1="0" data-handle-color="#D7DCE2">
                                            <div class="general-item-list">
                                                <div class="item">
                                                    <div class="item-head">
                                                        <div class="item-details">
                                                            <img class="item-pic rounded" src="/assets/admin/pages/media/users/avatar4.jpg">
                                                            <a href="" class="item-name primary-link">Nick Larson</a>
                                                            <span class="item-label">3 hrs ago</span>
                                                        </div>
                                                        <span class="item-status">
                                                            <span class="badge badge-empty badge-success"></span> Open</span>
                                                    </div>
                                                    <div class="item-body"> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </div>
                                                </div>
                                                <div class="item">
                                                    <div class="item-head">
                                                        <div class="item-details">
                                                            <img class="item-pic rounded" src="/assets/admin/pages/media/users/avatar3.jpg">
                                                            <a href="" class="item-name primary-link">Mark</a>
                                                            <span class="item-label">5 hrs ago</span>
                                                        </div>
                                                        <span class="item-status">
                                                            <span class="badge badge-empty badge-warning"></span> Pending</span>
                                                    </div>
                                                    <div class="item-body"> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat tincidunt ut laoreet. </div>
                                                </div>
                                                <div class="item">
                                                    <div class="item-head">
                                                        <div class="item-details">
                                                            <img class="item-pic rounded" src="/assets/admin/pages/media/users/avatar6.jpg">
                                                            <a href="" class="item-name primary-link">Nick Larson</a>
                                                            <span class="item-label">8 hrs ago</span>
                                                        </div>
                                                        <span class="item-status">
                                                            <span class="badge badge-empty badge-primary"></span> Closed</span>
                                                    </div>
                                                    <div class="item-body"> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh. </div>
                                                </div>
                                                <div class="item">
                                                    <div class="item-head">
                                                        <div class="item-details">
                                                            <img class="item-pic rounded" src="/assets/admin/pages/media/users/avatar7.jpg">
                                                            <a href="" class="item-name primary-link">Nick Larson</a>
                                                            <span class="item-label">12 hrs ago</span>
                                                        </div>
                                                        <span class="item-status">
                                                            <span class="badge badge-empty badge-danger"></span> Pending</span>
                                                    </div>
                                                    <div class="item-body"> Consectetuer adipiscing elit Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </div>
                                                </div>
                                                <div class="item">
                                                    <div class="item-head">
                                                        <div class="item-details">
                                                            <img class="item-pic rounded" src="/assets/admin/pages/media/users/avatar9.jpg">
                                                            <a href="" class="item-name primary-link">Richard Stone</a>
                                                            <span class="item-label">2 days ago</span>
                                                        </div>
                                                        <span class="item-status">
                                                            <span class="badge badge-empty badge-danger"></span> Open</span>
                                                    </div>
                                                    <div class="item-body"> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, ut laoreet dolore magna aliquam erat volutpat. </div>
                                                </div>
                                                <div class="item">
                                                    <div class="item-head">
                                                        <div class="item-details">
                                                            <img class="item-pic rounded" src="/assets/admin/pages/media/users/avatar8.jpg">
                                                            <a href="" class="item-name primary-link">Dan</a>
                                                            <span class="item-label">3 days ago</span>
                                                        </div>
                                                        <span class="item-status">
                                                            <span class="badge badge-empty badge-warning"></span> Pending</span>
                                                    </div>
                                                    <div class="item-body"> Lorem ipsum dolor sit amet, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </div>
                                                </div>
                                                <div class="item">
                                                    <div class="item-head">
                                                        <div class="item-details">
                                                            <img class="item-pic rounded" src="/assets/admin/pages/media/users/avatar2.jpg">
                                                            <a href="" class="item-name primary-link">Larry</a>
                                                            <span class="item-label">4 hrs ago</span>
                                                        </div>
                                                        <span class="item-status">
                                                            <span class="badge badge-empty badge-success"></span> Open</span>
                                                    </div>
                                                    <div class="item-body"> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
    </div>
    @endif


@stop


@section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#date-range-picker').daterangepicker({
                opens: 'left',
                "locale": {
                    "format": "YYYY-MM-DD",
                    "separator": "-",
                    "applyLabel": "Зачувај",
                    "cancelLabel": "Откажи",
                    "fromLabel": "Од",
                    "toLabel": "До",
                    "customRangeLabel": "Опсег",
                    "daysOfWeek": [
                        "Нед",
                        "Пон",
                        "Вто",
                        "Сре",
                        "Чет",
                        "Пет",
                        "Саб"
                    ],
                    "monthNames": [
                        "Јануари",
                        "Фебруари",
                        "Март",
                        "Април",
                        "Мај",
                        "Јуни",
                        "Јули",
                        "Август",
                        "Септември",
                        "Октомври",
                        "Ноември",
                        "Декември"
                    ],
                    "firstDay": 1
                }
            }, function(start, end, label) {
                $('#starts_at_range').val(start.format('YYYY-MM-DD'));
                $('#ends_at_range').val(end.format('YYYY-MM-DD'));
                $('#when').val("custom");
                $('#dashboard-form').submit();
            });
            // $.ajax({
            //     method: "GET",
            //     url: "../admin/fiskalni/dnevenPromet",
            //     data: {
            //         when: {{ $when }},
            //         warehouse_id: $('#warehouse_id').val(),
            //         ajax: "true"
            //     }
            // }).done(function(data) {

            //     $("#promet_div").html(data.iznos_count);
            //     $("#fiskalni_div").html(data.br_smetki);
            //     $("#prodadeni_div").html(data.br_items);
            //     $("#storno_div").html(data.iznos_count_storno);
            //     if (!data.br_items)
            //         $("#prodadeni_div").html(0);

            // });
            $(".select2").select2();
            $('#order_type_dashboard, #created_by_dashboard').on('change', function() {
                $.ajax({
                    method: "GET",
                    url: "{{ URL::to('admin/dashboard/filterbestsellerproducts') }}",
                    data: {
                        field1: $("#order_type_dashboard").val(),
                        field2: $("#created_by_dashboard").val()
                    }
                }).done(function(msg) {
                    window.location.reload();
                });
            });
            $('#warehouse_id').on('change', function() {
                $('#dashboard-form').submit();
            });

            $('[data-time]').on('click', function() {
                var value = $(this).data('time');
                $('#when').val(value);
                $('#starts_at_range').val('');
                $('#ends_at_range').val('');
                $('#dashboard-form').submit();
            });

            $('[data-currency]').on('click', function() {
                var value = $('#eur').val();
                if (value == 1)
                    value = 0;
                else
                    value = 1;

                $('#eur').val(value);
                $('#dashboard-form').submit();
            });

            var dashboardNarackiChart = {!! $naracki_datum !!};

            {{-- @foreach ($naracki_datum as $value) --}}
            {{-- dashboardNarackiChart.push(["{{$value[0]}}",{{$value[1]}}]); --}}
            {{-- @endforeach --}}

            $("#magacin_label").text($('#warehouse_id :selected').text());
        });
    </script>
    <script src="/assets/admin/global/plugins/flot/jquery.flot.min.js" type="text/javascript"></script>
    <script src="/assets/admin/global/plugins/flot/jquery.flot.resize.min.js" type="text/javascript"></script>
    <script src="/assets/admin/global/plugins/flot/jquery.flot.categories.min.js" type="text/javascript"></script>
    <script src="/assets/admin/pages/scripts/ecommerce-dashboard.js" type="text/javascript"></script>

@endsection

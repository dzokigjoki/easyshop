<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->

<head>
    <meta charset="utf-8" />
    <title>{{ \EasyShop\Models\AdminSettings::getField('titlepage') }} :: EasyShop</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="{{ csrf_token() }}" name="csrf-token" />
    {{-- <link rel="manifest" href="/manifest.json"> --}}
    <script>

    </script>

    @include('clients._partials.favicon')

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="//fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet"
        type="text/css" />
    <link href="/assets/admin/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="/assets/admin/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet"
        type="text/css" />
    <link href="/assets/admin/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="/assets/admin/global/plugins/uniform/css/uniform.default.css?v=1" rel="stylesheet" type="text/css" />
    <link href="/assets/admin/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet"
        type="text/css" />
    <link href="/assets/admin/global/plugins/bootstrap-sweetalert/sweetalert.css" rel="stylesheet" type="text/css">
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="/assets/admin/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet"
        type="text/css" />
    <link href="/assets/admin/global/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css" />
    <link href="/assets/admin/global/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css" />
    <link href="/assets/admin/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
    <link href="/assets/admin/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet"
        type="text/css" />
    <link href="/assets/admin/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet"
        type="text/css" />
    <link href="/assets/admin/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css"
        rel="stylesheet" type="text/css" />
    <link href="/assets/admin/global/plugins/fancybox/source/jquery.fancybox.css" rel="stylesheet" type="text/css" />
    <link href="/assets/admin/global/plugins/jquery-nestable/jquery.nestable.css" rel="stylesheet" type="text/css" />
    <link href="/assets/admin/global/plugins/redactor/redactor.css" rel="stylesheet" type="text/css" />
    <link href="/assets/admin/global/plugins/redactor/alignment.css" rel="stylesheet" type="text/css" />
    <link href="/assets/admin/global/plugins/bootstrap-editable/bootstrap-editable/css/bootstrap-editable.css"
        rel="stylesheet" type="text/css" />
    <link href="/assets/admin/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css" rel="stylesheet"
        type="text/css" />
    <link href="/assets/admin/global/plugins/bootstrap-editable/inputs-ext/address/address.css" rel="stylesheet"
        type="text/css" />
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="/assets/admin/global/css/components-md.min.css?v=1" rel="stylesheet" id="style_components"
        type="text/css" />
    <link href="/assets/admin/global/css/plugins-md.min.css" rel="stylesheet" type="text/css" />
    <link href="/assets/admin/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="/assets/admin/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="/assets/admin/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet"
        type="text/css" />
    <!-- END THEME GLOBAL STYLES -->
    <!-- BEGIN THEME LAYOUT STYLES -->
    <link href="/assets/admin/layouts/layout3/css/layout.min.css" rel="stylesheet" type="text/css" />
    <link href="/assets/admin/layouts/layout3/css/themes/default.min.css" rel="stylesheet" type="text/css"
        id="style_color" />
    <link href="/assets/admin/global/plugins/summernote/summernote.css" rel="stylesheet">
    <link href="/assets/admin/layouts/layout3/css/custom.css?v=1" rel="stylesheet" type="text/css" />
    <link href="/assets/admin/global/plugins/icheck/skins/all.css?v=1" rel="stylesheet" type="text/css" />

    <link href="/assets/admin/global/css/custom.css?v=1" rel="stylesheet" type="text/css" />

    <style>
        th.dt-body-center.dt-checkboxes-select-all.sorting_disabled {
            text-align: center;
        }

        table.dataTable thead th,
        table.dataTable thead td {
            padding: 8px 10px;
        }

        table.dataTable tbody th,
        table.dataTable tbody td {
            padding: 4px 5px 4px 10px;
        }

        .flex-centered {
            display: flex !important;
            align-items: center;
        }

    </style>
    <style>
        .goog-te-banner-frame.skiptranslate {
            display: none !important;
        }

        body {
            top: 0px !important;
        }

        .goog-tooltip {
            display: none !important;
        }

        .goog-tooltip:hover {
            display: none !important;
        }

        .goog-text-highlight {
            background-color: transparent !important;
            border: none !important;
            box-shadow: none !important;
        }

    </style>
    <!-- END THEME LAYOUT STYLES -->
    <link rel="stylesheet" type="text/css"
        href="/assets/admin/global/plugins/bootstrap-select/css/bootstrap-select.css">
    @section('head')
    @show
</head>
<!-- END HEAD -->
<?php

$my_user_global = Auth::user();
?>

<body class="page-container-bg-solid page-boxed page-md">
    <!-- BEGIN HEADER -->
    <div class="page-header">
        <!-- BEGIN HEADER TOP -->
        <div class="page-header-top">
            <div class="container">
                <!-- BEGIN LOGO -->
                <div class="page-logo flex-centered">
                    <a href="{{ route('admin.dashboard') }}">
                        <img src="{{ \EasyShop\Models\AdminSettings::getField('logo') }}" 
                            alt="logo"
                            class="logo-default brand-logo">
                    </a>
                </div>
                <!-- END LOGO -->
                <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                <a href="javascript:;" class="menu-toggler"></a>
                <!-- END RESPONSIVE MENU TOGGLER -->
                <!-- BEGIN TOP NAVIGATION MENU -->
                <div class="top-menu">
                    <ul class="nav navbar-nav pull-right">
                        @if (\EasyShop\Models\AdminSettings::getField('locale') != 'mk')
                            <div style="float: left;padding-top: 15px;padding-right: 15px; "
                                id="google_translate_element">
                            </div>
                        @endif
                        <li style="padding-top:10px; padding-right: 10px;"><a class="btn btn-sm btn-info blue-soft"
                                href="{{ route('admin.contact') }}">Пријави Проблем</a></li>
                        <li class="dropdown dropdown-user dropdown-dark">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                                data-close-others="true">
                                {{-- <img alt="" class="img-circle" src="/assets/admin/layouts/layout3/img/avatar3.jpg"> --}}
                                <span class="username username-hide-mobile">{{ Auth::user()->email }}</span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-default">
                                <li>
                                    <a href="{{ route('admin.logout') }}">
                                        <i class="icon-key"></i> Одјава </a>
                                </li>
                            </ul>
                        </li>
                        <!-- END USER LOGIN DROPDOWN -->
                    </ul>
                </div>
                <!-- END TOP NAVIGATION MENU -->
            </div>
        </div>
        <!-- END HEADER TOP -->
        <!-- BEGIN HEADER MENU -->

        <div class="page-header-menu">
            <div class="container">
                <?php if (0) { ?>
                <!-- BEGIN HEADER SEARCH BOX -->
                <form class="search-form" action="page_general_search.html" method="GET">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search" name="query">
                        <span class="input-group-btn">
                            <a href="javascript:;" class="btn submit">
                                <i class="icon-magnifier"></i>
                            </a>
                        </span>
                    </div>
                </form>
                <!-- END HEADER SEARCH BOX -->
                <?php } ?>
                <!-- BEGIN MEGA MENU -->
                <!-- DOC: Apply "hor-menu-light" class after the "hor-menu" class below to have a horizontal menu with white background -->
                <!-- DOC: Remove data-hover="dropdown" and data-close-others="true" attributes below to disable the dropdown opening on mouse hover -->
                <div class="hor-menu  ">

                    <ul class="nav navbar-nav">
                        <li>
                            <a href="{{ route('admin.dashboard') }}"> Дома <span class="arrow"></span></a>
                        </li>
                        @if (\EasyShop\Models\AdminSettings::isSetTrue('catalogMenu', 'modules'))
                            @if ($my_user_global->canDo('katalog'))
                                <li class="menu-dropdown classic-menu-dropdown  ">
                                    <a href="javascript://;"> Каталог <span class="arrow"></span></a>
                                    <ul class="dropdown-menu pull-left">
                                        <li class="dropdown-submenu ">
                                            <a href="javascript:;" class="nav-link nav-toggle">
                                                Артикли
                                                <span class="arrow"></span>
                                            </a>
                                            <ul class="dropdown-menu">
                                                @if ($my_user_global->canDo('katalog_manage_articles'))
                                                    <li><a href="{{ route('admin.article.new') }}" class="nav-link ">
                                                            Нов
                                                            артикл
                                                        </a>
                                                    </li>
                                                @endif
                                                <li><a href="{{ route('admin.articles') }}" class="nav-link "> Листа
                                                        на
                                                        артикли
                                                    </a></li>
                                            </ul>
                                        </li>
                                        @if ($my_user_global->canDo('katalog_lager_lista') && \EasyShop\Models\AdminSettings::isSetTrue('lager', 'modules'))
                                            <li><a href="{{ route('admin.article.instock') }}"> Лагер листа </a></li>
                                        @endif
                                        @if (\EasyShop\Models\AdminSettings::isSetTrue('banners', 'modules'))
                                            <li class="dropdown-submenu ">
                                                <a href="javascript:;" class="nav-link nav-toggle">
                                                    Банери
                                                    <span class="arrow"></span>
                                                </a>
                                                <ul class="dropdown-menu">
                                                    @if ($my_user_global->canDo('katalog_baneri_front'))
                                                        <li><a href="{{ route('admin.banners.new') }}"
                                                                class="nav-link ">
                                                                Нов банер
                                                            </a>
                                                        </li>
                                                    @endif
                                                    <li><a href="{{ route('admin.banners') }}" class="nav-link ">
                                                            Листа
                                                            на
                                                            банери </a></li>
                                                </ul>
                                            </li>
                                        @endif
                                        @if (in_array(config('app.client'), \EasyShop\Models\Settings::CLIENT_NATURATHERAPY_SHOPS))
                                        <li><a href="/admin/mediaplan/media_plan1"> Медиа план 1</a></li>
                                        <li><a href="/admin/mediaplan/media_plan2"> Медиа план 2</a></li>
                                    @endif
                                        @if ($my_user_global->canDo('katalog_karta_artikl'))
                                            <li><a href="{{ route('admin.article.showKartaArtikal') }}"> Карта на
                                                    артикл
                                                </a></li>
                                        @endif
                                        @if ($my_user_global->canDo('katalog_atributi') && \EasyShop\Models\AdminSettings::isSetTrue('attributes', 'modules'))
                                            <li><a href="{{ route('admin.attributes') }}"> Атрибути </a></li>
                                        @endif

                                        @if (config( 'app.client') == 'in_design_studio')
                                            <li><a href="{{ route('admin.options') }}"> Опции </a></li>
                                        @endif


                                        @if (\EasyShop\Models\AdminSettings::getField('showManufacturer'))
                                            @if ($my_user_global->canDo('katalog_proizvoditeli'))
                                                <li class="dropdown-submenu ">
                                                    <a href="javascript:;" class="nav-link nav-toggle">
                                                        Производители
                                                        <span class="arrow"></span>
                                                    </a>
                                                    <ul class="dropdown-menu">
                                                        <li><a href="{{ route('admin.manufacturers.new') }}"
                                                                class="nav-link "> Нов
                                                                производител </a></li>
                                                        <li><a href="{{ route('admin.manufacturers') }}"
                                                                class="nav-link ">
                                                                Листа на
                                                                производители </a></li>
                                                    </ul>
                                                </li>
                                            @endif
                                        @endif
                                    </ul>
                                </li>
                            @endif
                        @endif
                        @if ($my_user_global->canDo('kategorii') && \EasyShop\Models\AdminSettings::isSetTrue('categoriesMenu', 'modules'))
                            <li class="menu-dropdown classic-menu-dropdown">
                                <a href="{{ route('admin.categories') }}"> Категории </a>
                            </li>
                        @endif

                        @if ($my_user_global->canDo('magacin') && \EasyShop\Models\AdminSettings::isSetTrue('magacinMenu', 'modules'))
                            <li class="menu-dropdown classic-menu-dropdown  ">
                                <a href="javascript:;"> Магацин <span class="arrow"></span></a>
                                <ul class="dropdown-menu pull-left">
                                    @if ($my_user_global->canDo('magacin_ispratnici'))
                                        <li class="dropdown-submenu ">
                                            <a href="{{ URL::to('admin/document/ispratnica') }}"> Испратници
                                                <span class="arrow"></span>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li><a href="{{ URL::to('admin/document/ispratnica/new') }}">Нoва
                                                        Испратница
                                                    </a>
                                                </li>
                                                <li><a href="{{ URL::to('admin/document/ispratnica') }}"
                                                        class="nav-link ">
                                                        Листа
                                                        на испратници </a></li>
                                            </ul>
                                        </li>
                                    @endif
                                    @if ($my_user_global->canDo('magacin_priemnici'))
                                        <li class="dropdown-submenu ">
                                            <a href="{{ URL::to('admin/document/priemnica') }}"> Приемници
                                                <span class="arrow"></span>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li><a href="{{ URL::to('admin/document/priemnica/new') }}">Нoва
                                                        Приемницa
                                                    </a>
                                                </li>
                                                <li><a href="{{ URL::to('admin/document/priemnica') }}"
                                                        class="nav-link ">
                                                        Листа
                                                        на приемници </a></li>
                                            </ul>
                                        </li>
                                    @endif
                                    @if ($my_user_global->canDo('magacin_povratnici'))
                                        <li class="dropdown-submenu ">
                                            <a href="{{ URL::to('admin/document/povratnica') }}"> Повратници
                                                <span class="arrow"></span>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li><a href="{{ URL::to('admin/document/povratnica/new') }}">Нoва
                                                        Повратница
                                                    </a>
                                                </li>
                                                <li><a href="{{ URL::to('admin/document/povratnica') }}"
                                                        class="nav-link ">
                                                        Листа
                                                        на повратници </a></li>
                                            </ul>
                                        </li>
                                        <li class="dropdown-submenu ">
                                            <a href="{{ URL::to('admin/document/povratnica_dobavuvac') }}">
                                                Повратници
                                                добавувач
                                                <span class="arrow"></span>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li><a
                                                        href="{{ URL::to('admin/document/povratnica_dobavuvac/new') }}">Нoва
                                                        Повратница добавувач</a></li>
                                                <li><a href="{{ URL::to('admin/document/povratnica_dobavuvac') }}"
                                                        class="nav-link ">
                                                        Листа на повратници добавувач</a></li>
                                            </ul>
                                        </li>
                                    @endif
                                    @if ($my_user_global->canDo('magacin_rezervacii') && \EasyShop\Models\AdminSettings::isSetTrue('reservations', 'modules'))
                                        <li class="dropdown-submenu ">
                                            <a href="{{ URL::to('admin/document/rezervacija') }}"> Резервации
                                                <span class="arrow"></span>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li><a href="{{ URL::to('admin/document/rezervacija/new') }}">Нoва
                                                        Резервација
                                                    </a></li>
                                                <li><a href="{{ URL::to('admin/document/rezervacija') }}"
                                                        class="nav-link ">
                                                        Листа
                                                        на резервации </a></li>
                                            </ul>
                                        </li>
                                    @endif
                                    {{-- @if ($my_user_global->canDo('magacin_paragon_blok'))
                                <li class="dropdown-submenu ">
                                    <a href="{{URL::to('admin/document/rezervacija')}}"> Парагон Блок
                                <span class="arrow"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{URL::to('admin/document/rezervacija/new')}}">Нoва Парагон Блок
                                        </a>
                                    </li>
                                    <li><a href="{{URL::to('admin/document/rezervacija')}}" class="nav-link "> Листа
                                            на
                                            Парагон Блок </a></li>
                                </ul>
                        </li>
                        @endif --}}
                                    @if ($my_user_global->canDo('magacin_vlez_izlez'))
                                        <li class="dropdown-submenu ">
                                            <a href="{{ URL::to('admin/document/predatnica') }}"> Излез / Влез во
                                                магацин
                                                <span class="arrow"></span>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li><a href="{{ URL::to('admin/document/izlez/new') }}">Нoв Излез
                                                    </a>
                                                </li>
                                                <li><a href="{{ URL::to('admin/document/vlez/new') }}">Нoв Влез </a>
                                                </li>
                                                <li><a href="{{ URL::to('admin/document/izlez') }}"
                                                        class="nav-link ">
                                                        Листа на излези
                                                    </a></li>
                                                <li><a href="{{ URL::to('admin/document/vlez') }}"
                                                        class="nav-link ">
                                                        Листа на влезови
                                                    </a></li>
                                            </ul>
                                        </li>
                                    @endif
                                    @if ($my_user_global->canDo('magacin_dobavuvaci'))
                                        <li class="dropdown-submenu ">
                                            <a href="javascript:;" class="nav-link nav-toggle">
                                                Добавувачи
                                                <span class="arrow"></span>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li><a href="{{ route('admin.suppliers.create') }}"
                                                        class="nav-link ">
                                                        Нов добавувач
                                                    </a>
                                                </li>
                                                <li><a href="{{ route('admin.suppliers') }}" class="nav-link ">
                                                        Листа
                                                        на добавувачи
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                    @endif
                                    @if ($my_user_global->canDo('magacin_uvoznici'))
                                        <li class="dropdown-submenu ">
                                            <a href="javascript:;" class="nav-link nav-toggle">
                                                Увозници
                                                <span class="arrow"></span>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li><a href="{{ route('admin.importers.create') }}"
                                                        class="nav-link ">
                                                        Нов увозник
                                                    </a>
                                                </li>
                                                <li><a href="{{ route('admin.importers') }}" class="nav-link ">
                                                        Листа
                                                        на увозници </a>
                                                </li>
                                            </ul>
                                        </li>
                                    @endif
                                </ul>
                            </li>
                        @endif
                        @if ($my_user_global->canDo('prodazba') && \EasyShop\Models\AdminSettings::isSetTrue('sales', 'modules'))
                            <li class="menu-dropdown classic-menu-dropdown">
                                <a href="javascript:;">Продажба<span class="arrow"></span></a>
                                <ul class="dropdown-menu pull-left">
                                    @if ($my_user_global->canDo('prodazba_naracki'))
                                        <li class="dropdown-submenu ">
                                            <a href="#">Нарачки
                                                <span class="arrow"></span>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li><a href="{{ URL::to('admin/document/narachka/new') }}">Нoва
                                                        нарачкa
                                                    </a></li>
                                                    
                                                @if ($my_user_global->canDo('lista_na_naracki'))
                                                    <li><a href="{{ URL::to('/admin/document/narachka') }}"
                                                            class="nav-link "> Листа на
                                                            нарачки </a></li>
                                                @endif
                                            </ul>
                                        </li>
                                    @endif
                                    @if ((in_array(config('app.client'), \EasyShop\Models\Settings::CLIENT_NATURATHERAPY_SHOPS)) && $my_user_global->canDo('call_center'))
                                        <li><a href="{{ URL::to('admin/call-center/narachka') }}">Јавувања</a></li>
                                    @endif
                                    @if ((in_array(config('app.client'), \EasyShop\Models\Settings::CLIENT_NATURATHERAPY_SHOPS) || config( 'app.client') == 'herline') && $my_user_global->canDo('kurir_sluzbi'))
                                        <li class="dropdown-submenu ">
                                            <a href="#"> Курир Служби
                                                <span class="arrow"></span>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li><a href="{{ route('admin.couriers.new') }}">Нoва служба </a></li>
                                                <li><a href="{{ route('admin.couriers') }}" class="nav-link ">
                                                        Листа
                                                        на
                                                        курир
                                                        служби</a></li>
                                            </ul>
                                        </li>
                                    @endif
                                    @if ($my_user_global->canDo('prodazba_plakjanja'))
                                        <li class="dropdown-submenu ">
                                            <a href="{{ route('admin.sales.payments') }}"> Плаќања
                                                <span class="arrow"></span>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li><a href="{{ route('admin.sales.createPayment') }}">Нoвo Плаќањe
                                                    </a></li>
                                                <li><a href="{{ route('admin.sales.payments') }}"
                                                        class="nav-link ">
                                                        Листа на
                                                        плаќањa
                                                    </a></li>
                                            </ul>
                                        </li>
                                    @endif
                                    @if ($my_user_global->canDo('prodazba_fakturi'))
                                        <li class="dropdown-submenu ">
                                            <a href="{{ URL::to('admin/document/faktura') }}"> Фактури
                                                <span class="arrow"></span>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li><a href="{{ URL::to('admin/document/faktura/new') }}">Нoва
                                                        Фактурa
                                                    </a></li>
                                                <li><a href="{{ URL::to('admin/document/faktura') }}"
                                                        class="nav-link "> Листа на
                                                        фактури </a></li>
                                            </ul>
                                        </li>
                                        @if (\EasyShop\Models\AdminSettings::getField('fakturaOnline'))
                                            <li class="dropdown-submenu ">
                                                <a href="{{ URL::to('admin/document/faktura') }}"> Фактури Оnline
                                                    <span class="arrow"></span>
                                                </a>
                                                <ul class="dropdown-menu">
                                                    <!-- <li><a href="{{ URL::to('admin/document/faktura_online/new') }}">Нoва Фактурa Оnline</a></li> -->
                                                    <li><a href="{{ URL::to('admin/document/faktura_online') }}"
                                                            class="nav-link ">
                                                            Листа
                                                            на фактури online</a></li>
                                                </ul>
                                            </li>
                                        @endif
                                    @endif
                                    @if ($my_user_global->canDo('prodazba_profakturi'))
                                        <li class="dropdown-submenu ">
                                            <a href="{{ URL::to('admin/document/profaktura') }}"> Профактури
                                                <span class="arrow"></span>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li><a href="{{ URL::to('admin/document/profaktura/new') }}">Нoва
                                                        Профактурa </a>
                                                </li>
                                                <li><a href="{{ URL::to('admin/document/profaktura') }}"
                                                        class="nav-link "> Листа
                                                        на
                                                        Профактури </a></li>
                                            </ul>
                                        </li>
                                    @endif
                                    @if (in_array(config('app.client'), \EasyShop\Models\Settings::CLIENT_NATURATHERAPY_SHOPS))
                                        <li><a href="{{ URL::to('admin/customers/checkCustomerNumber') }}">Проверка
                                                на
                                                број</a></li>
                                    @endif
                                    {{-- @if ($my_user_global->canDo('prodazba_fiskalni'))
                            <li  class="menu-dropdown classic-menu-dropdown  ">
                                <a href="{{URL::to('admin/fiskalni/all')}}"> Фискални</a>
                    </li>
                    @endif --}}
                                </ul>
                            </li>
                        @endif
                        @if ($my_user_global->canDo('klienti') && \EasyShop\Models\AdminSettings::isSetTrue('clientsMenu', 'modules'))
                            <li class="menu-dropdown classic-menu-dropdown  ">
                                <a href="javascript:;"> Клиенти <span class="arrow"></span></a>
                                <ul class="dropdown-menu pull-left">
                                    <li><a href="{{ route('admin.customers') }}"> Преглед </a></li>
                                    <li><a href="{{ route('admin.customers.create') }}"> Нов клиент </a></li>
                                </ul>
                            </li>
                        @endif
                        @if (\EasyShop\Models\AdminSettings::isSetTrue('promotionsMenu', 'modules'))
                            @if ($my_user_global->canDo('promocii'))
                                <li class="menu-dropdown classic-menu-dropdown  ">
                                    <a href="javascript:;"> Промоции <span class="arrow"></span></a>
                                    <ul class="dropdown-menu pull-left">
                                        <li class="dropdown-submenu ">
                                            <a href="javascript:;" class="nav-link nav-toggle">
                                                Попусти
                                                <span class="arrow"></span>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li><a href="{{ route('admin.discount') }}" class="nav-link ">
                                                        Листа
                                                        на
                                                        попусти
                                                    </a>
                                                </li>
                                                <li><a href="{{ route('admin.newdiscount') }}"
                                                        class="nav-link "> Нов
                                                        попуст </a>
                                                </li>
                                            </ul>
                                        </li>
                                        @if (\EasyShop\Models\AdminSettings::isSetTrue('stepenastPopust', 'modules'))
                                            <li class="dropdown-submenu ">
                                                <a href="javascript:;" class="nav-link nav-toggle">
                                                    Степенасти попусти
                                                    <span class="arrow"></span>
                                                </a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="{{ route('admin.gradual-discounts') }}"
                                                            class="nav-link "> Листа на
                                                            степенасти
                                                            попусти </a>
                                                    </li>
                                                    <li><a href="{{ route('admin.gradual-discounts.new') }}"
                                                            class="nav-link "> Нов
                                                            степенаст попуст
                                                        </a></li>
                                                </ul>
                                            </li>
                                        @endif
                                        @if (\EasyShop\Models\AdminSettings::isSetTrue('coupons', 'modules'))
                                            <li class="dropdown-submenu">
                                                <a href="javascript:;" class="nav-link nav-toggle">
                                                    Купони за попуст
                                                    <span class="arrow"></span>
                                                </a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="{{ route('admin.promo-codes') }}"
                                                            class="nav-link ">
                                                            Листа на купони
                                                            за
                                                            попуст </a></li>
                                                    <li><a href="{{ route('admin.promo-codes.new') }}"
                                                            class="nav-link "> Нов купон
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>
                                        @endif
                                        @if (\EasyShop\Models\AdminSettings::isSetTrue('popUpModal', 'modules'))
                                            <li>
                                                <a href="{{ route('admin.popup_modal') }}" class="nav-link">
                                                    Popup Модал
                                                </a>
                                            </li>
                                        @endif
                                        @if (\EasyShop\Models\AdminSettings::isSetTrue('stickers', 'modules'))
                                            <li><a href="{{ route('admin.stickers') }}" class="nav-link ">Стикери</a>
                                            </li>
                                        @endif
                                        <!--        <li><a href="{{ route('admin.categories') }}"> Гифт картички </a></li> -->
                                    </ul>
                                </li>
                            @endif
                        @endif
                        @if (\EasyShop\Models\AdminSettings::isSetTrue('ticketsMenu', 'modules'))
                            <li class="menu-dropdown classic-menu-dropdown  ">
                                <a href="javascript:;"> Тикети <span class="arrow"></span></a>
                                <ul class="dropdown-menu pull-left">
                                    <li><a href="{{ route('admin.articles') }}"> Преглед </a></li>
                                </ul>
                            </li>
                        @endif
                        @if (\EasyShop\Models\AdminSettings::isSetTrue('servisMenu', 'modules'))
                            @if ($my_user_global->canDo('servis'))
                                <li class="menu-dropdown classic-menu-dropdown  ">
                                    <a href="javascript:;"> Сервис <span class="arrow"></span></a>
                                    <ul class="dropdown-menu pull-left">
                                        <li><a href="{{ route('admin.services') }}"> Преглед </a></li>
                                        <li><a href="{{ route('admin.services.new') }}"> Приемници </a></li>
                                    </ul>
                                </li>
                            @endif
                        @endif
                        @if (\EasyShop\Models\AdminSettings::isSetTrue('blogsMenu', 'modules'))
                            @if ($my_user_global->canDo('blog'))
                                <li class="menu-dropdown classic-menu-dropdown  ">
                                    <a href="javascript:;"> Блог <span class="arrow"></span></a>
                                    <ul class="dropdown-menu pull-left">
                                        <li><a href="{{ route('admin.newblog') }}"> Внеси текст </a></li>
                                        <li><a href="{{ route('admin.blog') }}"> Преглед </a></li>
                                    </ul>
                                </li>
                            @endif
                        @endif
                        @if ($my_user_global->canDo('izvestai') && \EasyShop\Models\AdminSettings::isSetTrue('izvestaiMenu', 'modules'))
                            <li class="menu-dropdown classic-menu-dropdown  ">
                                <a href="javascript:;"> Извештаи <span class="arrow"></span></a>
                                <ul class="dropdown-menu pull-left">
                                    @if (!\EasyShop\Models\AdminSettings::isInArray('prodazba', 'hideIzvestai'))
                                        <li class="dropdown-submenu ">
                                            <a href="javascript:;" class="nav-link nav-toggle">Продажба<span
                                                    class="arrow"></span></a>
                                            <ul class="dropdown-menu">
                                                @if ($my_user_global->canDo('izvestai_prodazba_magacin'))
                                                    <li><a href="{{ route('admin.report.prodazba.artikli') }}"
                                                            class="nav-link ">
                                                            Продажба
                                                            по артикли </a></li>
                                                @endif
                                                @if ($my_user_global->canDo('izvestai_prodazba_denovi'))
                                                    <li><a href="" class="nav-link "> Продажба по денови </a></li>
                                                @endif
                                                @if ($my_user_global->canDo('izvestai_prodazba_proizvoditel'))
                                                    <li><a href="" class="nav-link "> Продажба по производител </a>
                                                    </li>
                                                @endif
                                                @if ($my_user_global->canDo('izvestai_prodazba_kategorija'))
                                                    <li><a href="" class="nav-link "> Продажба по категорија </a>
                                                    </li>
                                                @endif
                                            </ul>
                                        </li>
                                    @endif

                                    @if (!\EasyShop\Models\AdminSettings::isInArray('maloprodazba', 'hideIzvestai'))
                                        @if ($my_user_global->canDo('izvestai_maloprodazba'))
                                            <li class="dropdown-submenu ">
                                                <a href="javascript:;" class="nav-link nav-toggle">Малопродажба<span
                                                        class="arrow"></span></a>
                                                <ul class="dropdown-menu">
                                                    {{--  @if ($my_user_global->canDo('izvestai_maloprodazba_et'))
                                                        <li><a href="{{ route('admin.report.et') }}"
                                                                class="nav-link ">
                                                                ЕТ </a></li>
                                                    @endif
                                                    @if ($my_user_global->canDo('izvestai_maloprodazba_dfi'))
                                                        <li><a href="{{ route('admin.report.dfi') }}"
                                                                class="nav-link "> ДФИ </a></li>
                                                    @endif
                                                    @if ($my_user_global->canDo('izvestai_maloprodazba_kdfi'))
                                                        <li><a href="{{ route('admin.report.kdfi') }}"
                                                                class="nav-link "> КДФИ </a></li>
                                                    @endif
                                                    @if ($my_user_global->canDo('izvestai_maloprodazba_etu'))
                                                        <li><a href="" class="nav-link "> ЕТУ </a></li>
                                                    @endif
                                                    @if ($my_user_global->canDo('izvestai_maloprodazba_nivelacija'))
                                                        <li><a href="{{ route('admin.report.getNivelacijaReport') }}"
                                                                class="nav-link ">
                                                                Нивелација </a></li>
                                                    @endif  --}}
                                                </ul>
                                            </li>
                                        @endif
                                    @endif
                                    @if (!\EasyShop\Models\AdminSettings::isInArray('golemoprodazba', 'hideIzvestai'))
                                        @if ($my_user_global->canDo('izvestai_golemoprodazba'))
                                            <li class="dropdown-submenu ">
                                                <a href="javascript:;" class="nav-link nav-toggle">Големопродажба<span
                                                        class="arrow"></span></a>
                                                <ul class="dropdown-menu">
                                                    @if ($my_user_global->canDo('izvestai_golemoprodazba_metg'))
                                                        <li><a href="" class="nav-link "> МЕТГ </a></li>
                                                    @endif
                                                </ul>
                                            </li>
                                        @endif
                                    @endif
                                    @if (!\EasyShop\Models\AdminSettings::isInArray('internetprodazba', 'hideIzvestai'))
                                        @if ($my_user_global->canDo('izvestai_web'))
                                            <li class="dropdown-submenu ">
                                                <a href="javascript:;" class="nav-link nav-toggle">Интернет
                                                    продажба<span class="arrow"></span></a>
                                                <ul class="dropdown-menu">
                                                    @if ($my_user_global->canDo('izvestai_web_naracki'))
                                                        <li><a href="{{ route('admin.report.ordersStatByDates') }}"
                                                                class="nav-link ">
                                                                Нарачки
                                                            </a></li>
                                                    @endif
                                                    @if ($my_user_global->canDo('izvestai_web_artikli'))
                                                        <li><a href="{{ route('admin.report.salesbyproductView') }}"
                                                                class="nav-link ">
                                                                Продажба по артикли </a></li>
                                                    @endif
                                                    @if ((in_array(config('app.client'), \EasyShop\Models\Settings::CLIENT_NATURATHERAPY_SHOPS)) && $my_user_global->canDo('admin'))
                                                        <li><a href="{{ route('admin.report.operatorStatistics') }}"
                                                                class="nav-link ">
                                                                Статистики по оператор </a></li>
                                                    @endif
                                                    {{-- @if ($my_user_global->canDo('izvestai_web_denovi')) --}}
                                                    {{-- <li><a href="" class="nav-link "> Продажба по денови </a></li> --}}
                                                    {{-- @endif --}}
                                                    {{-- @if ($my_user_global->canDo('izvestai_web_proizvoditel')) --}}
                                                    {{-- <li><a href="" class="nav-link "> Продажба по производител </a></li> --}}
                                                    {{-- @endif --}}
                                                    {{-- @if ($my_user_global->canDo('izvestai_web_kategorija')) --}}
                                                    {{-- <li><a href="" class="nav-link "> Продажба по категорија </a></li> --}}
                                                    {{-- @endif --}}
                                                    {{-- @if ($my_user_global->canDo('izvestai_web_sto_ima_vo_kosnickite')) --}}
                                                    {{-- <li><a href="" class="nav-link "> Што има во кошничничките </a></li> --}}
                                                    {{-- @endif --}}
                                                    {{-- @if ($my_user_global->canDo('izvestai_web_napusteni_kosnicki')) --}}
                                                    {{-- <li><a href="" class="nav-link "> Напуштени кошнички </a></li> --}}
                                                    {{-- @endif --}}
                                                    {{-- @if ($my_user_global->canDo('izvestai_web_prebaruvanja')) --}}
                                                    {{-- <li><a href="" class="nav-link "> Пребарувања </a></li> --}}
                                                    {{-- @endif --}}
                                                    {{-- @if ($my_user_global->canDo('izvestai_web_novi_registracii')) --}}
                                                    {{-- <li><a href="" class="nav-link "> Нови регистрации </a></li> --}}
                                                    {{-- @endif --}}
                                                    {{-- @if ($my_user_global->canDo('izvestai_web_popusti')) --}}
                                                    {{-- <li><a href="" class="nav-link "> Попусти </a></li> --}}
                                                    {{-- @endif --}}
                                                    {{-- @if ($my_user_global->canDo('izvestai_web_kuponi')) --}}
                                                    {{-- <li><a href="" class="nav-link "> Купони </a></li> --}}
                                                    {{-- @endif --}}
                                                    {{-- @if ($my_user_global->canDo('izvestai_web_plakjanja')) --}}
                                                    {{-- <li><a href="" class="nav-link "> Плаќања </a></li> --}}
                                                    {{-- @endif --}}
                                                    {{-- @if ($my_user_global->canDo('izvestai_web_vrateni_naracki')) --}}
                                                    {{-- <li><a href="" class="nav-link "> Вратени нарачки </a></li> --}}
                                                    {{-- @endif --}}
                                                </ul>
                                            </li>
                                        @endif
                                    @endif
                                    @if (!\EasyShop\Models\AdminSettings::isInArray('ostanato', 'hideIzvestai'))
                                        @if ($my_user_global->canDo('izvestai_ostanato'))
                                            <li class="dropdown-submenu ">
                                                <a href="javascript:;" class="nav-link nav-toggle">Останато<span
                                                        class="arrow"></span></a>
                                                <ul class="dropdown-menu">
                                                    @if ($my_user_global->canDo('izvestai_ostanato_top_klienti'))
                                                        <li><a href="" class="nav-link "> Топ клиенти </a></li>
                                                    @endif
                                                    @if ($my_user_global->canDo('izvestai_ostanato_mala_zaliha'))
                                                        <li><a href="" class="nav-link "> Мала залиха </a></li>
                                                    @endif
                                                </ul>
                                            </li>
                                        @endif
                                    @endif
                                </ul>
                            </li>
                        @endif
                        @if(\EasyShop\Models\AdminSettings::isSetTrue('adminMenu', 'modules'))
                        @if ($my_user_global->canDo('admin'))
                            <li class="menu-dropdown classic-menu-dropdown  ">
                                <a href="javascript:;"> Админ <span class="arrow"></span></a>
                                <ul class="dropdown-menu pull-left">
                                    @if ($my_user_global->canDo('admin_vraboteni'))
                                        <li><a href="{{ route('admin.employee') }}"> Вработени </a></li>
                                    @endif
                                    @if ($my_user_global->canDo('admin_podesuvanja'))
                                        <li><a href="{{ route('admin.settings') }}"> Подесувања </a></li>
                                        <li class="dropdown-submenu ">
                                            <a href="javascript:;" class="nav-link nav-toggle">
                                                Дозвола за пристап
                                                <span class="arrow"></span>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li><a href="{{ route('admin.roles') }}" class="nav-link ">
                                                        Roles
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                    @endif
                                    @if ($my_user_global->canDo('admin_magacini'))
                                        {{-- <li class="dropdown-submenu "> --}}
                                        {{-- <a href="javascript:;" class="nav-link nav-toggle"> --}}
                                        {{-- Магацини --}}
                                        {{-- <span class="arrow"></span> --}}
                                        {{-- </a> --}}
                                        {{-- <ul class="dropdown-menu"> --}}
                                        {{-- <li><a href="{{route('admin.warehouses.new')}}" class="nav-link "> Нов магацин </a>
                    </li> --}}
                                        {{-- <li><a href="{{route('admin.warehouses.all')}}" class="nav-link "> Листа на магацини </a>
                    </li> --}}
                                        {{-- </ul> --}}
                                        {{-- </li> --}}
                                    @endif
                                    @if (config('clients.' . config( 'app.client') . '.najdi_razliki_menu'))
                                        <li><a href="{{ route('admin.document.findDiff') }}"> Најди разлики во
                                                документи </a></li>
                                    @endif
                                    @if (config('clients.' . config( 'app.client') . '.rekalkuliraj_kolicini_menu'))
                                        <li><a href="{{ route('admin.document.fixProductQtyView') }}"> Рекалкулација
                                                на
                                                количина на
                                                продукти
                                            </a></li>
                                    @endif
                                </ul>
                            </li>
                        @endif
                        @endif
                       
                        @if (auth()->user()->id == 1)
                            <li class="menu-dropdown classic-menu-dropdown">
                                <a href="/admin/adminSettings"><i class="fa fa-cog"></i></a>
                            </li>
                        @endif
                    </ul>
                </div>
                <!-- END MEGA MENU -->
            </div>
        </div>
        <!-- END HEADER MENU -->
    </div>
    <!-- END HEADER -->
    <!-- BEGIN CONTAINER -->
    <div class="page-container">
        <!-- BEGIN CONTENT -->
        <div class="page-content-wrapper">
            <!-- BEGIN CONTENT BODY -->
            <!-- BEGIN PAGE HEAD-->
            {{-- <div class="page-head"> --}}
            {{-- <div class="container"> --}}
            {{-- <!-- BEGIN PAGE TITLE --> --}}
            {{-- <div class="page-title"> --}}
            {{-- @if (isset($pageData) && isset($pageData['title'])) --}}
            {{-- <h1>{{ $pageData['title'] }}</h1> --}}
            {{-- @endif --}}
            {{-- </div> --}}
            {{-- <!-- END PAGE TITLE --> --}}
            {{-- </div> --}}
            {{-- </div> --}}
            <!-- END PAGE HEAD-->
            <!-- BEGIN PAGE CONTENT BODY -->
            <div class="page-content">
                <div class="container<?php
if ((request()->segment(2) == 'document' && request()->segment(4) == '') || request()->segment(2) == 'report' || request()->segment(2) == 'service' || (request()->segment(2) == 'fiskalni' || request()->segment(3) == 'all') || (request()->segment(2) == 'articles' && request()->segment(3) == 'instock') || (request()->segment(2) == 'articles' && request()->segment(3) == 'karta-artikl')) {
    echo '-fluid';
}
?>">


                    {{-- BREADCRUMBS --}}
                    {{-- @if (isset($pageData) && isset($pageData['breadcrumbs']) && is_array($pageData['breadcrumbs'])) --}}
                    {{-- <ul class="page-breadcrumb breadcrumb"> --}}
                    {{-- @foreach ($pageData['breadcrumbs'] as $breadcrumb) --}}
                    {{-- @if (isset($breadcrumb['link'])) --}}
                    {{-- <li> --}}
                    {{-- <a href="{{$breadcrumb['link']}}">{{$breadcrumb['title']}}</a> --}}
                    {{-- <i class="fa fa-circle"></i> --}}
                    {{-- </li> --}}
                    {{-- @else --}}
                    {{-- <li> --}}
                    {{-- <span>{{$breadcrumb['title']}}</span> --}}
                    {{-- </li> --}}
                    {{-- @endif --}}
                    {{-- @endforeach --}}
                    {{-- </ul> --}}
                    {{-- @endif --}}
                    {{-- // BREADCRUMBS --}}

                    {{-- Status messages --}}
                    @if (session('success'))
                        <div class="custom-alerts alert alert-success fade in">
                            <button type="button" class="close" data-dismiss="alert"
                                aria-hidden="true"></button>
                            {!! session('success') !!}
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="custom-alerts alert alert-danger fade in">
                            <button type="button" class="close" data-dismiss="alert"
                                aria-hidden="true"></button>
                            {!! session('error') !!}
                        </div>
                    @endif
                    {{-- // Status messages --}}

                    @yield('content')
                </div>
            </div>
            <!-- END PAGE CONTENT BODY -->
            <!-- END CONTENT BODY -->
        </div>
        <!-- END CONTENT -->
    </div>
    <!-- END CONTAINER -->
    <!-- BEGIN FOOTER -->
    <!-- BEGIN INNER FOOTER -->
    <div class="page-footer">
        <div class="container"> {{ date('Y') }} &copy; EasyShop.
            <a href="https://generadevelopment.com" target="_blank">Contact Us</a>
        </div>
    </div>
    <div class="scroll-to-top">
        <i class="icon-arrow-up"></i>
    </div>
    {{-- <div id="easyshop">
        <gradual-discounts-modal></gradual-discounts-modal>
    </div> --}}
    <!-- END INNER FOOTER -->
    <!-- END FOOTER -->
    <!--[if lt IE 9]>
<script src="/assets/admin/global/plugins/respond.min.js"></script>
<script src="/assets/admin/global/plugins/excanDovas.min.js"></script>
<![endif]-->
    <!-- BEGIN CORE PLUGINS -->
    <script type="text/javascript">
        (function() {
            window.ES = window.ES || {};
            ES.baseUrl = "{{ url('/') }}";
        })()
    </script>
    <script type="text/javascript">
        function isNumberKey(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode;
            if ((charCode < 48 || charCode > 57)) {
                if (charCode == 8) // backspace
                    return true;

                return false;
            }

            return true;
        }
    </script>
    <script src="/assets/admin/global/plugins/jquery.min.js" type="text/javascript"></script>
    <script src="/assets/admin/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="/assets/admin/global/plugins/js.cookie.min.js" type="text/javascript"></script>
    <script src="/assets/admin/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js"
        type="text/javascript"></script>
    <script src="/assets/admin/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript">
    </script>
    <script src="/assets/admin/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
    <script src="/assets/admin/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
    <script src="/assets/admin/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript">
    </script>
    <!-- END CORE PLUGINS -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="/assets/admin/global/plugins/moment.min.js" type="text/javascript"></script>
    <script src="/assets/admin/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js" type="text/javascript">
    </script>
    <script src="/assets/admin/global/plugins/bootstrap-sweetalert/sweetalert.min.js" type="text/javascript"></script>
    <script src="/assets/admin/global/scripts/datatable.js" type="text/javascript"></script>
    <script src="/assets/admin/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
    <script src="/assets/admin/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript">
    </script>
    <script src="/assets/admin/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript">
    </script>
    <script src="/assets/admin/js/vendor/dataTables.editor.min.js" type="text/javascript"></script>
    <script src="/assets/admin/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"
        type="text/javascript"></script>
    <script src="/assets/admin/global/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js" type="text/javascript">
    </script>
    <script src="/assets/admin/global/plugins/fancybox/source/jquery.fancybox.pack.js" type="text/javascript"></script>
    <script src="/assets/admin/global/plugins/plupload/js/plupload.full.min.js" type="text/javascript"></script>
    <script src="/assets/admin/global/plugins/jquery-nestable/jquery.nestable.js" type="text/javascript"></script>
    <script src="/assets/admin/global/plugins/bootstrap-editable/bootstrap-editable/js/bootstrap-editable.js"
        type="text/javascript"></script>
    <script src="/assets/admin/global/plugins/bootstrap-editable/inputs-ext/address/address.js" type="text/javascript">
    </script>
    <script src="/assets/admin/global/plugins/bootstrap-editable/inputs-ext/wysihtml5/wysihtml5.js" type="text/javascript">
    </script>
    <script src="/assets/admin/js/vendor/dataTables.checkboxes.js" type="text/javascript"></script>
    <script src="/assets/admin/js/vendor/dataTables.checkboxes.min.js" type="text/javascript"></script>

    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN THEME GLOBAL SCRIPTS -->
    <script src="/assets/admin/global/scripts/app.js" type="text/javascript"></script>

    <!-- END THEME GLOBAL SCRIPTS -->
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="/assets/admin/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
    <script src="/assets/admin/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>

    <!-- END PAGE LEVEL SCRIPTS -->
    <!-- BEGIN THEME LAYOUT SCRIPTS -->
    <script src="/assets/admin/layouts/layout3/scripts/layout.js" type="text/javascript"></script>
    {{-- <script src="/assets/admin/layouts/layout3/scripts/demo.js" type="text/javascript"></script> --}}
    <script src="/assets/admin/layouts/global/scripts/quick-sidebar.js" type="text/javascript"></script>
    <script src="/assets/admin/global/plugins/icheck/icheck.min.js" type="text/javascript"></script>
    <script src="/assets/admin/global/plugins/bootstrap-select/js/bootstrap-select.min.js" type="text/javascript">
    </script>
    <script src="/assets/admin/global/plugins/summernote/summernote.js"></script>

    <!-- END THEME LAYOUT SCRIPTS -->

    {{-- CUSTOM SCRIPTS --}}
    <script src="/assets/admin/js/modules/config.js" type="text/javascript"></script>
    <script src="/assets/admin/js/modules/global.js" type="text/javascript"></script>
    <script src="/assets/admin/js/pages/all.js" type="text/javascript"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/vue@2.6.12/dist/vue.js"></script>
    <script src="/assets/admin/global/genera-vue-components.js" type="module"></script> --}}

    <script>
        function number_format_js(number, decimals, dec_point, thousands_sep) {

            number = (number + '').replace(/[^0-9+\-Ee.]/g, '');
            var n = !isFinite(+number) ? 0 : +number,
                prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
                sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
                dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
                s = '',
                toFixedFix = function(n, prec) {
                    var k = Math.pow(10, prec);
                    return '' + Math.round(n * k) / k;
                };
            // Fix for IE parseFloat(0.55).toFixed(0) = 0;
            s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
            if (s[0].length > 3) {
                s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
            }
            if ((s[1] || '').length < prec) {
                s[1] = s[1] || '';
                s[1] += new Array(prec - s[1].length + 1).join('0');
            }
            return s.join(dec);
        }
    </script>



    @if (\EasyShop\Models\AdminSettings::getField('locale') == 'al')
        <script>
            function setCookie(key, value, expiry) {
                var expires = new Date();
                expires.setTime(expires.getTime() + (expiry * 24 * 60 * 60 * 1000));
                document.cookie = key + '=' + value + ';expires=' + expires.toUTCString();
            }
            setCookie('googtrans', '/sq', 1);

            function googleTranslateElementInit() {
                new google.translate.TranslateElement({
                    pageLanguage: 'mk',
                    includedLanguages: 'en,mk,sq',
                    layout: google.translate.TranslateElement.InlineLayout.SIMPLE
                }, 'google_translate_element');
            }
        </script>
        <script src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>


    @endif

    @section('scripts')
    @show

</body>

</html>

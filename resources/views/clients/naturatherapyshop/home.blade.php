@extends('clients.naturatherapyshop.layouts.default')
@section('content')
    <?php 
        $bigSliderBanner = \BannerHelper::getBannerByCategory('big-slider');
        $bigSliderBannerId = null;
        $bigSliderBannerImg = null;

        if(!empty($bigSliderBanner)) {
            $bigSliderBannerId = $bigSliderBanner[0]->id;
            $bigSliderBannerImg = $bigSliderBanner[0]->image;
        }
    ?>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <style id='marra-style-inline-css' type='text/css'>
        #qodef-page-inner {
            padding: 0px 60px 0px 60px;
        }
        .qodef-grid-item {
            margin: 0 !important;
        }
        #big-sliderImg{
            height: 100%; 
            width: 100%;
            content:url("{{ '/uploads/banners/' . \BannerHelper::getBannerByCategory('big-slider')[0]->id . '/lg_' . \BannerHelper::getBannerByCategory('big-slider')[0]->image }}");
        }
        @media only screen and (max-width: 1024px) {
            #qodef-page-inner {
                padding: 0px 20px 0px 20px;
            }
        }
        #qodef-top-area {
            background-color: rgba(255, 255, 255, 0);
        }
        #qodef-top-area-inner {
            padding-left: 60px;
            padding-right: 60px;
        }
        #qodef-top-area-wrapper {
            border-bottom-color: #cccccc;
            border-bottom-width: 1px;
        }
        .qodef-page-title {
            background-image: url(https://marra.qodeinteractive.com/wp-content/uploads/2020/08/portfolio-single.jpg);
        }
        .elementor-434 .elementor-element.elementor-element-d4f5689>.elementor-widget-container {
            padding: 0;
        }
        @media(min-width: 1024px) {
            .elementor-434 .elementor-element.elementor-element-d4f5689>.elementor-widget-container {
                padding: 0px 0px 0px 0px;
            }
        }
        .qodef-header--standard #qodef-page-header {
            height: 110px;
        }
        .modal_img_width {
            width: 80%;
            margin: auto;
            display: block;
        }
        @media(max-width: 767px) {
            .text_smaller_mob {
                font-size: 9px !important;
                padding: 7px !important;
            }
            .qodef-h4,
            h4 {
                font-size: 17px;
            }
            .modal_img_width {
                width: 100%
            }
            #big-sliderImg{
                height: 100%; 
                width: 100%;
                content:url("{{ '/uploads/banners/' . \BannerHelper::getBannerByCategory('big-slider')[0]->id . '/md_' . \BannerHelper::getBannerByCategory('big-slider')[0]->mobile_image }}");
            }
        }
        .qodef-header--standard #qodef-page-header-inner {
            padding-left: 60px;
            padding-right: 60px;
        }
       .elementor-434 .elementor-element.elementor-element-a2dc938:not(.elementor-motion-effects-element-type-background)>.elementor-column-wrap,
        .elementor-434 .elementor-element.elementor-element-a2dc938>.elementor-column-wrap>.elementor-motion-effects-container>.elementor-motion-effects-layer {
            background-image: url("{{ '/uploads/banners/' . $bigSliderBannerId . '/lg_' . $bigSliderBannerImg }}") no-repeat!important;
            background-size: cover;
        }
    </style>
    {{-- Page Preloader 

        <div class="loader-mask">
        <div class="loader">
            <div></div>
            <div></div>
        </div>
    </div> 
    
    --}}
    <!-- End of Slider -->
    <div id="qodef-page-outer">
        <div id="qodef-page-inner" class="qodef-content-full-width">
            <main id="qodef-page-content" class="qodef-grid qodef-layout--template ">
                <div class="qodef-grid-inner clear">
                    <div class="qodef-grid-item qodef-page-content-section qodef-col--12">
                        <div data-elementor-type="wp-page" data-elementor-id="434" class="elementor elementor-434"
                            data-elementor-settings="[]">
                            <div class="elementor-inner">
                                <div class="elementor-section-wrap">
                                    <section
                                        class="elementor-section elementor-top-section elementor-element elementor-element-7769caa elementor-section-full_width elementor-section-height-default elementor-section-height-default qodef-elementor-content-no"
                                        data-id="7769caa" data-element_type="section">
                                        <div class="elementor-container elementor-column-gap-default">
                                            <div class="elementor-row">
                                                <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-ed8f108"
                                                    data-id="ed8f108" data-element_type="column"
                                                    data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                                                    <div class="elementor-column-wrap elementor-element-populated">
                                                        <div class="elementor-widget-wrap">
                                                            <div class="elementor-element elementor-element-87ba4a3 elementor-widget elementor-widget-marra_core_banner"
                                                                data-id="87ba4a3" data-element_type="widget"
                                                                data-widget_type="marra_core_banner.default">
                                                                <div class="elementor-widget-container">
                                                                    <div
                                                                        class="qodef-shortcode qodef-m  qodef-banner qodef-layout--link-button qodef-content-padding-correction--default qodef-type--text-centered qodef-horizontal-text-align--center qodef-vertical-text-align--center qodef-overlay-color-active ">
                                                                        <div class="qodef-m-image-holder">
                                                                            <div class="qodef-m-image">
                                                                                <img width="1100" height="1106"
                                                                                    @if(!empty(\BannerHelper::getBannerByCategory('promotions')))
                                                                                    src="{{ '/uploads/banners/' . \BannerHelper::getBannerByCategory('promotions')[0]->id . '/md_' . \BannerHelper::getBannerByCategory('promotions')[0]->image }}"
                                                                                    @endif
                                                                                    class="attachment-full size-full"
                                                                                    alt="a" loading="lazy"
                                                                                    @if(!empty(\BannerHelper::getBannerByCategory('promotions')))
                                                                                    srcset="{{ '/uploads/banners/' . \BannerHelper::getBannerByCategory('promotions')[0]->id . '/md_' . \BannerHelper::getBannerByCategory('promotions')[0]->image }} 1100w, {{ '/uploads/banners/' . \BannerHelper::getBannerByCategory('promotions')[0]->id . '/md_' . \BannerHelper::getBannerByCategory('promotions')[0]->image }} 768w"
                                                                                    @endif
                                                                                    sizes="(max-width: 1100px) 100vw, 1100px" />
                                                                            </div>
                                                                        </div>
                                                                        <div class="qodef-m-content">
                                                                            <div class="qodef-m-content-inner">
                                                                                <div style="position: absolute; top: 30%; 
                                                                                            left: 50%;
                                                                                            transform: translateX(-50%);"
                                                                                    class="qodef-m-content-box">
                                                                                    <div style="margin: auto"
                                                                                        class="qodef-m-button">
                                                                                        <a class="qodef-shortcode qodef-m  qodef-button qodef-layout--outlined qodef-size--small qodef-html--link"
                                                                                            href="{{ url_assets('/naturatherapyshop/img/nagradna_igra.pdf') }}"
                                                                                            target="_self">
                                                                                            <span style="color: #fff"
                                                                                                class="qodef-m-text">Види
                                                                                                повеќе</span>
                                                                                        </a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-8 col-sm-12" style="padding: 0">
                                                    <img id="big-sliderImg">
                                                    <div class="qodef-m-content">
                                                        <div class="qodef-m-content-inner">
                                                            <div style="position: absolute; top: 20%; 
                                                                        left: 50%;
                                                                        transform: translateX(-50%);"
                                                                class="qodef-m-content-box">
                                                                <div style="margin: auto"
                                                                    class="qodef-m-button">
                                                                     <a class="qodef-shortcode qodef-m  qodef-button qodef-layout--outlined qodef-size--small qodef-html--link"
                                                                        href="{{ url_assets('/naturatherapyshop/img/katalog-2022.pdf') }}" target="_self" style="background:rgba(255, 255, 255, 0.5)">
                                                                        <span style="color: black" class="qodef-m-text">
                                                                            @if (\BannerHelper::getBannerByCategory('big-slider')[0]->short_description == null) Види Повеќе @else {{\BannerHelper::getBannerByCategory('big-slider')[0]->short_description}}
                                                                            @endif
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                    <div class="slideshow" id="main-banner">
                                        <div class="row">
                                            @foreach (\BannerHelper::getBannerByCategory('slider') as $banner)
                                                <div class="col-sm-4 col-xs-12">
                                                    <div style="margin-bottom: 2%">
                                                        <img style="height: auto"
                                                            src="{{ '/uploads/banners/' . $banner->id . '/md_' . $banner->image }}"
                                                            alt="">
                                                        @if ($banner->url != null)
                                                            <div class="qodef-m-content">
                                                                <div class="qodef-m-content-inner">
                                                                    <div style="position: absolute; top: 40%; left: 50%; transform: translateX(-50%); background-color: #558182"
                                                                        class="qodef-m-content-box">
                                                                        <div style="margin: auto" class="qodef-m-button">
                                                                            <a class="qodef-shortcode qodef-m  qodef-button qodef-layout--outlined qodef-size--small qodef-html--link"
                                                                                href="{{ $banner->url }}" target="_self">
                                                                                <span style="color:white"
                                                                                    class="qodef-m-text">@if ($banner->short_description == null) Види Повеќе @else {{$banner->short_description}}@endif</span></a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                        
                                        {{-- <section
                                            class="elementor-section elementor-top-section elementor-element elementor-element-1043512 elementor-section-full_width elementor-section-height-default elementor-section-height-default qodef-elementor-content-no"
                                            data-id="1043512" data-element_type="section">
                                            <div class="elementor-container elementor-column-gap-default">
                                                <div class="elementor-row">
                                                    <div class="elementor-column elementor-col-33 elementor-top-column elementor-element elementor-element-665f253"
                                                        data-id="665f253" data-element_type="column">
                                                        <div class="elementor-column-wrap elementor-element-populated">
                                                            <div class="elementor-widget-wrap">
                                                                <div class="elementor-element elementor-element-7e7b1d6 elementor-widget elementor-widget-marra_core_banner"
                                                                    data-id="7e7b1d6" data-element_type="widget"
                                                                    data-widget_type="marra_core_banner.default">
                                                                    <div class="elementor-widget-container">
                                                                        <div
                                                                            class="qodef-shortcode qodef-m  qodef-banner qodef-layout--link-button qodef-content-padding-correction--default qodef-type--text-on-left qodef-horizontal-text-align--left   ">
                                                                            <div class="qodef-m-image-holder">
                                                                                <div class="qodef-m-image">
                                                                                    <img width="1100" height="1106"
                                                                                        src="{{ url_assets('/naturatherapyshop/img/3.jpg') }}"
                                                                                        class="attachment-full size-full"
                                                                                        alt="a" loading="lazy"
                                                                                        srcset="{{ url_assets('/naturatherapyshop/img/3.jpg') }} 1100w, {{ url_assets('/naturatherapyshop/img/3.jpg') }} 298w, {{ url_assets('/naturatherapyshop/img/3.jpg') }} 1018w, {{ url_assets('/naturatherapyshop/img/3.jpg') }} 150w, {{ url_assets('/naturatherapyshop/img/3.jpg') }} 768w, {{ url_assets('/naturatherapyshop/img/3.jpg') }} 600w, {{ url_assets('/naturatherapyshop/img/3.jpg') }} 800w, {{ url_assets('/naturatherapyshop/img/3.jpg') }} 100w"
                                                                                        sizes="(max-width: 1100px) 100vw, 1100px" />
                                                                                </div>
                                                                                <div class="qodef-m-overlay">
                                                                                </div>
                                                                            </div>
                                                                            <div class="qodef-m-content">
                                                                                <div class="qodef-m-content-inner"
                                                                                    style="padding: 3% 0% 4% 13.5%">
                                                                                    <div style="position: absolute; top: 10%;
                                                                                left: 50%;
                                                                                transform: translateX(-50%);"
                                                                                        class="qodef-m-content-box">
                                                                                        <div style="color:#558182;"
                                                                                            class="qodef-m-subtitle">
                                                                                            За секој </div>
                                                                                        <h3 style="color:#558182;"
                                                                                            class="qodef-m-title">
                                                                                            Маж </h3>
                                                                                        <div style="margin: auto"
                                                                                            class="qodef-m-button">
                                                                                            <a class="qodef-shortcode qodef-m  qodef-button qodef-layout--outlined qodef-size--small qodef-html--link"
                                                                                                href="http://prostatol.mk/"
                                                                                                target="_self">
                                                                                                <span style="color: #558182"
                                                                                                    class="qodef-m-text">Види
                                                                                                    повеќе</span>
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="elementor-column elementor-col-33 elementor-top-column elementor-element elementor-element-1ae522d"
                                                        data-id="1ae522d" data-element_type="column"
                                                        data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                                                        <div class="elementor-column-wrap elementor-element-populated">
                                                            <div class="elementor-widget-wrap">
                                                                <div class="elementor-element elementor-element-bb50d3b elementor-widget elementor-widget-spacer"
                                                                    data-id="bb50d3b" data-element_type="widget"
                                                                    data-widget_type="spacer.default">
                                                                    <div class="elementor-widget-container">
                                                                        <div class="elementor-spacer">
                                                                            <div class="elementor-spacer-inner">
                                                                                <div class="qodef-m-content">
                                                                                    <div class="qodef-m-content-inner"
                                                                                        style="padding: 3% 0% 4% 13.5%">
                                                                                        <div style="position: absolute; margin-top: 20%; left: 50%; transform: translateX(-50%);"
                                                                                            class="qodef-m-content-box">
                                                                                            <div style="margin: auto; background-color: rgba(255,255,255,0.5)"
                                                                                                class="qodef-m-button">
                                                                                                <a class="qodef-shortcode qodef-m  qodef-button qodef-layout--outlined-white qodef-size--small qodef-html--link"
                                                                                                    href="nasite-prodavnici"
                                                                                                    target="_self"> <span
                                                                                                        style="color:white;"
                                                                                                        class="qodef-m-text">Нашите
                                                                                                        продавници</span></a>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="elementor-column elementor-col-33 elementor-top-column elementor-element elementor-element-38a5d08"
                                                        data-id="38a5d08" data-element_type="column">
                                                        <div class="elementor-column-wrap elementor-element-populated">
                                                            <div class="elementor-widget-wrap">
                                                                <div class="elementor-element elementor-element-b42a739 elementor-widget elementor-widget-marra_core_banner"
                                                                    data-id="b42a739" data-element_type="widget"
                                                                    data-widget_type="marra_core_banner.default">
                                                                    <div class="elementor-widget-container">
                                                                        <div
                                                                            class="qodef-shortcode qodef-m  qodef-banner qodef-layout--link-button qodef-content-padding-correction--default qodef-type--text-on-left qodef-horizontal-text-align--left">
                                                                            <div class="qodef-m-image-holder">
                                                                                <div class="qodef-m-image">
                                                                                    <img width="1100" height="1106"
                                                                                        src="{{ url_assets('/naturatherapyshop/img/5.jpg') }}"
                                                                                        class="attachment-full size-full"
                                                                                        alt="a" loading="lazy"
                                                                                        srcset="{{ url_assets('/naturatherapyshop/img/5.jpg') }} 1100w, {{ url_assets('/naturatherapyshop/img/5.jpg') }} 298w, {{ url_assets('/naturatherapyshop/img/5.jpg') }} 1018w, {{ url_assets('/naturatherapyshop/img/5.jpg') }} 150w, {{ url_assets('/naturatherapyshop/img/5.jpg') }} 768w, {{ url_assets('/naturatherapyshop/img/5.jpg') }} 600w, {{ url_assets('/naturatherapyshop/img/5.jpg') }} 800w, {{ url_assets('/naturatherapyshop/img/5.jpg') }} 100w"
                                                                                        sizes="(max-width: 1100px) 100vw, 1100px" />
                                                                                </div>
                                                                                <div class="qodef-m-overlay">
                                                                                </div>
                                                                            </div>
                                                                            <div class="qodef-m-content">
                                                                                <div class="qodef-m-content-inner"
                                                                                    style="padding: 3% 0% 4% 13.5%">
                                                                                    <div style="position: absolute; top: 10%;
                                                                                left: 50%;
                                                                                transform: translateX(-50%);"
                                                                                        class="qodef-m-content-box">
                                                                                        <div style="color:#558182;"
                                                                                            class="qodef-m-subtitle">
                                                                                            Погледнете ги </div>
                                                                                        <h3 style="color:#558182;"
                                                                                            class="qodef-m-title">
                                                                                            нашите пакети</h3>
                                                                                        <div style="margin: auto"
                                                                                            class="qodef-m-button">
                                                                                            <a class="qodef-shortcode qodef-m  qodef-button qodef-layout--outlined qodef-size--small qodef-html--link"
                                                                                                href="https://naturatherapy.mk/c/14/paketi"
                                                                                                target="_self"> <span
                                                                                                    style="color:#558182;"
                                                                                                    class="qodef-m-text">Види
                                                                                                    повеќе</span></a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </section> --}}
                                        <section
                                            class="elementor-section elementor-top-section elementor-element elementor-element-eadf5e1 elementor-section-full_width qodef-elementor-content-grid elementor-section-height-default elementor-section-height-default"
                                            data-id="eadf5e1" data-element_type="section">
                                            <div style="width: 100% !important"
                                                class="elementor-container elementor-column-gap-default">
                                                <div class="elementor-row">
                                                    <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-af837af"
                                                        data-id="af837af" data-element_type="column">
                                                        <div class="elementor-column-wrap elementor-element-populated">
                                                            <div class="elementor-widget-wrap">
                                                                <div class="elementor-element elementor-element-eae6cff elementor-widget elementor-widget-marra_core_clients_list"
                                                                    data-id="eae6cff" data-element_type="widget"
                                                                    data-widget_type="marra_core_clients_list.default">
                                                                    <div class="elementor-widget-container">
                                                                        <div
                                                                            class="qodef-shortcode qodef-m  qodef-clients-list qodef-grid brands qodef-layout--columns  qodef-gutter--medium qodef-col-num--4 qodef-item-layout--image-only qodef-responsive--custom qodef-col-num--1440--4 qodef-col-num--1366--4 qodef-col-num--1024--2 qodef-col-num--768--2 qodef-col-num--680--1 qodef-col-num--480--1 qodef-hover-animation--fade-in">
                                                                            <div
                                                                                class="qodef-grid-inner brand-slider-initz clear">
                                                                                <span class="qodef-e qodef-grid-item">
                                                                                    <span class="qodef-e-inner">
                                                                                        <span class="qodef-e-image">
                                                                                            <a itemprop="url"
                                                                                                href="http://prostatol.mk/"
                                                                                                target="_self">
                                                                                                <span
                                                                                                    class="qodef-e-logo">
                                                                                                    <img width="325"
                                                                                                        height="87"
                                                                                                        src="{{ url_assets('/naturatherapyshop/img/brands/01.png') }}"
                                                                                                        class="attachment-full size-full"
                                                                                                        alt="a"
                                                                                                        loading="lazy"
                                                                                                        srcset="{{ url_assets('/naturatherapyshop/img/brands/01.png') }} 325w, {{ url_assets('/naturatherapyshop/img/brands/01.png') }} 300w"
                                                                                                        sizes="(max-width: 325px) 100vw, 325px" />
                                                                                                </span>
                                                                                                <span
                                                                                                    class="qodef-e-hover-logo">
                                                                                                    <img width="325"
                                                                                                        height="87"
                                                                                                        src="{{ url_assets('/naturatherapyshop/img/brands/01.png') }}"
                                                                                                        class="attachment-full size-full"
                                                                                                        alt="a"
                                                                                                        loading="lazy"
                                                                                                        srcset="{{ url_assets('/naturatherapyshop/img/brands/01.png') }} 325w, {{ url_assets('/naturatherapyshop/img/brands/01.png') }} 300w"
                                                                                                        sizes="(max-width: 325px) 100vw, 325px" />
                                                                                                </span>
                                                                                            </a>
                                                                                        </span>
                                                                                    </span>
                                                                                </span>
                                                                                <span class="qodef-e qodef-grid-item">
                                                                                    <span class="qodef-e-inner">
                                                                                        <span class="qodef-e-image">
                                                                                            <a itemprop="url"
                                                                                                href="http://pms.mk/"
                                                                                                target="_self">
                                                                                                <span
                                                                                                    class="qodef-e-logo">
                                                                                                    <img width="325"
                                                                                                        height="87"
                                                                                                        src="{{ url_assets('/naturatherapyshop/img/brands/02.png') }}"
                                                                                                        class="attachment-full size-full"
                                                                                                        alt="a"
                                                                                                        loading="lazy"
                                                                                                        srcset="{{ url_assets('/naturatherapyshop/img/brands/02.png') }} 325w, {{ url_assets('/naturatherapyshop/img/brands/02.png') }} 300w"
                                                                                                        sizes="(max-width: 325px) 100vw, 325px" />
                                                                                                </span>
                                                                                                <span
                                                                                                    class="qodef-e-hover-logo">
                                                                                                    <img width="325"
                                                                                                        height="87"
                                                                                                        src="{{ url_assets('/naturatherapyshop/img/brands/02.png') }}"
                                                                                                        class="attachment-full size-full"
                                                                                                        alt="a"
                                                                                                        loading="lazy"
                                                                                                        srcset="{{ url_assets('/naturatherapyshop/img/brands/02.png') }} 325w, {{ url_assets('/naturatherapyshop/img/brands/01.png') }} 300w"
                                                                                                        sizes="(max-width: 325px) 100vw, 325px" />
                                                                                                </span>
                                                                                            </a>
                                                                                        </span>
                                                                                    </span>
                                                                                </span>
                                                                                <span class="qodef-e qodef-grid-item">
                                                                                    <span class="qodef-e-inner">
                                                                                        <span class="qodef-e-image">
                                                                                            <a itemprop="url" href="/m/1"
                                                                                                target="_self">
                                                                                                <span
                                                                                                    class="qodef-e-logo">
                                                                                                    <img width="325"
                                                                                                        height="87"
                                                                                                        src="{{ url_assets('/naturatherapyshop/img/brands/05.png') }}"
                                                                                                        class="attachment-full size-full"
                                                                                                        alt="a"
                                                                                                        loading="lazy"
                                                                                                        srcset="{{ url_assets('/naturatherapyshop/img/brands/05.png') }} 325w, {{ url_assets('/naturatherapyshop/img/brands/05.png') }} 300w"
                                                                                                        sizes="(max-width: 325px) 100vw, 325px" />
                                                                                                </span>
                                                                                                <span
                                                                                                    class="qodef-e-hover-logo">
                                                                                                    <img width="325"
                                                                                                        height="87"
                                                                                                        src="{{ url_assets('/naturatherapyshop/img/brands/05.png') }}"
                                                                                                        class="attachment-full size-full"
                                                                                                        alt="a"
                                                                                                        loading="lazy"
                                                                                                        srcset="{{ url_assets('/naturatherapyshop/img/brands/05.png') }} 325w, {{ url_assets('/naturatherapyshop/img/brands/02.png') }} 300w"
                                                                                                        sizes="(max-width: 325px) 100vw, 325px" />
                                                                                                </span>
                                                                                            </a>
                                                                                        </span>
                                                                                    </span>
                                                                                </span>
                                                                                <span class="qodef-e qodef-grid-item">
                                                                                    <span class="qodef-e-inner">
                                                                                        <span class="qodef-e-image">
                                                                                            <a itemprop="url" href="/m/3"
                                                                                                target="_self">
                                                                                                <span
                                                                                                    class="qodef-e-logo">
                                                                                                    <img width="325"
                                                                                                        height="87"
                                                                                                        src="{{ url_assets('/naturatherapyshop/img/brands/03.png') }}"
                                                                                                        class="attachment-full size-full"
                                                                                                        alt="a"
                                                                                                        loading="lazy"
                                                                                                        srcset="{{ url_assets('/naturatherapyshop/img/brands/03.png') }} 325w, {{ url_assets('/naturatherapyshop/img/brands/03.png') }} 300w"
                                                                                                        sizes="(max-width: 325px) 100vw, 325px" />
                                                                                                </span>
                                                                                                <span
                                                                                                    class="qodef-e-hover-logo">
                                                                                                    <img width="325"
                                                                                                        height="87"
                                                                                                        src="{{ url_assets('/naturatherapyshop/img/brands/03.png') }}"
                                                                                                        class="attachment-full size-full"
                                                                                                        alt="a"
                                                                                                        loading="lazy"
                                                                                                        srcset="{{ url_assets('/naturatherapyshop/img/brands/03.png') }} 325w, {{ url_assets('/naturatherapyshop/img/brands/03.png') }} 300w"
                                                                                                        sizes="(max-width: 325px) 100vw, 325px" />
                                                                                                </span>
                                                                                            </a>
                                                                                        </span>
                                                                                    </span>
                                                                                </span>
                                                                                <span class="qodef-e qodef-grid-item">
                                                                                    <span class="qodef-e-inner">
                                                                                        <span class="qodef-e-image">
                                                                                            <a itemprop="url" href="/m/4"
                                                                                                target="_self">
                                                                                                <span
                                                                                                    class="qodef-e-logo">
                                                                                                    <img width="325"
                                                                                                        height="87"
                                                                                                        src="{{ url_assets('/naturatherapyshop/img/brands/04.png') }}"
                                                                                                        class="attachment-full size-full"
                                                                                                        alt="a"
                                                                                                        loading="lazy"
                                                                                                        srcset="{{ url_assets('/naturatherapyshop/img/brands/04.png') }} 325w, {{ url_assets('/naturatherapyshop/img/brands/04.png') }} 300w"
                                                                                                        sizes="(max-width: 325px) 100vw, 325px" />
                                                                                                </span>
                                                                                                <span
                                                                                                    class="qodef-e-hover-logo">
                                                                                                    <img width="325"
                                                                                                        height="87"
                                                                                                        src="{{ url_assets('/naturatherapyshop/img/brands/04.png') }}"
                                                                                                        class="attachment-full size-full"
                                                                                                        alt="a"
                                                                                                        loading="lazy"
                                                                                                        srcset="{{ url_assets('/naturatherapyshop/img/brands/04.png') }} 325w, {{ url_assets('/naturatherapyshop/img/brands/04.png') }} 300w"
                                                                                                        sizes="(max-width: 325px) 100vw, 325px" />
                                                                                                </span>
                                                                                            </a>
                                                                                        </span>
                                                                                    </span>
                                                                                </span>
                                                                                <span class="qodef-e qodef-grid-item">
                                                                                    <span class="qodef-e-inner">
                                                                                        <span class="qodef-e-image">
                                                                                            <a itemprop="url" href="/m/5"
                                                                                                target="_self">
                                                                                                <span
                                                                                                    class="qodef-e-logo">
                                                                                                    <img width="325"
                                                                                                        height="87"
                                                                                                        src="{{ url_assets('/naturatherapyshop/img/brands/07.png') }}"
                                                                                                        class="attachment-full size-full"
                                                                                                        alt="a"
                                                                                                        loading="lazy"
                                                                                                        srcset="{{ url_assets('/naturatherapyshop/img/brands/07.png') }} 325w, {{ url_assets('/naturatherapyshop/img/brands/07.png') }} 300w"
                                                                                                        sizes="(max-width: 325px) 100vw, 325px" />
                                                                                                </span>
                                                                                                <span
                                                                                                    class="qodef-e-hover-logo">
                                                                                                    <img width="325"
                                                                                                        height="87"
                                                                                                        src="{{ url_assets('/naturatherapyshop/img/brands/07.png') }}"
                                                                                                        class="attachment-full size-full"
                                                                                                        alt="a"
                                                                                                        loading="lazy"
                                                                                                        srcset="{{ url_assets('/naturatherapyshop/img/brands/07.png') }} 325w, {{ url_assets('/naturatherapyshop/img/brands/05.png') }} 300w"
                                                                                                        sizes="(max-width: 325px) 100vw, 325px" />
                                                                                                </span>
                                                                                            </a>
                                                                                        </span>
                                                                                    </span>
                                                                                </span>
                                                                                <span class="qodef-e qodef-grid-item">
                                                                                    <span class="qodef-e-inner">
                                                                                        <span class="qodef-e-image">
                                                                                            <a itemprop="url" href="/m/6"
                                                                                                target="_self">
                                                                                                <span
                                                                                                    class="qodef-e-logo">
                                                                                                    <img width="325"
                                                                                                        height="87"
                                                                                                        src="{{ url_assets('/naturatherapyshop/img/brands/06.png') }}"
                                                                                                        class="attachment-full size-full"
                                                                                                        alt="a"
                                                                                                        loading="lazy"
                                                                                                        srcset="{{ url_assets('/naturatherapyshop/img/brands/06.png') }} 325w, {{ url_assets('/naturatherapyshop/img/brands/06.png') }} 300w"
                                                                                                        sizes="(max-width: 325px) 100vw, 325px" />
                                                                                                </span>
                                                                                                <span
                                                                                                    class="qodef-e-hover-logo">
                                                                                                    <img width="325"
                                                                                                        height="87"
                                                                                                        src="{{ url_assets('/naturatherapyshop/img/brands/06.png') }}"
                                                                                                        class="attachment-full size-full"
                                                                                                        alt="a"
                                                                                                        loading="lazy"
                                                                                                        srcset="{{ url_assets('/naturatherapyshop/img/brands/06.png') }} 325w, {{ url_assets('/naturatherapyshop/img/brands/06.png') }} 300w"
                                                                                                        sizes="(max-width: 325px) 100vw, 325px" />
                                                                                                </span>
                                                                                            </a>
                                                                                        </span>
                                                                                    </span>
                                                                                </span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                        <section
                                            class="elementor-section elementor-top-section elementor-element elementor-element-5059d73 elementor-section-full_width elementor-section-height-default elementor-section-height-default qodef-elementor-content-no"
                                            data-id="5059d73" data-element_type="section">
                                            <div class="elementor-container elementor-column-gap-default">
                                                <div class="elementor-row">
                                                    <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-8f298de"
                                                        data-id="8f298de" data-element_type="column">
                                                        <div class="elementor-column-wrap elementor-element-populated">
                                                            <div class="elementor-widget-wrap">
                                                                <div class="elementor-element elementor-element-e5cde47 elementor-widget elementor-widget-marra_core_product_list"
                                                                    data-id="e5cde47" data-element_type="widget"
                                                                    data-widget_type="marra_core_product_list.default">
                                                                    <div class="elementor-widget-container">
                                                                        <div class="qodef-shortcode qodef-m  qodef-woo-shortcode qodef-woo-product-list qodef-item-layout--info-below  qodef-grid qodef-layout--columns  qodef-gutter--small qodef-col-num--4 qodef-item-layout--info-below qodef--no-bottom-space qodef-pagination--off qodef-responsive--custom qodef-col-num--1440--4 qodef-col-num--1366--4 qodef-col-num--1024--2 qodef-col-num--768--2 qodef-col-num--680--2 qodef-col-num--480--1"
                                                                            data-options="{&quot;plugin&quot;:&quot;marra_core&quot;,&quot;module&quot;:&quot;plugins\/woocommerce\/shortcodes&quot;,&quot;shortcode&quot;:&quot;product-list&quot;,&quot;post_type&quot;:&quot;product&quot;,&quot;next_page&quot;:&quot;2&quot;,&quot;max_pages_num&quot;:5,&quot;behavior&quot;:&quot;columns&quot;,&quot;images_proportion&quot;:&quot;full&quot;,&quot;columns&quot;:&quot;4&quot;,&quot;columns_responsive&quot;:&quot;custom&quot;,&quot;columns_1440&quot;:&quot;4&quot;,&quot;columns_1366&quot;:&quot;4&quot;,&quot;columns_1024&quot;:&quot;2&quot;,&quot;columns_768&quot;:&quot;2&quot;,&quot;columns_680&quot;:&quot;2&quot;,&quot;columns_480&quot;:&quot;1&quot;,&quot;space&quot;:&quot;small&quot;,&quot;posts_per_page&quot;:&quot;8&quot;,&quot;orderby&quot;:&quot;menu_order&quot;,&quot;order&quot;:&quot;ASC&quot;,&quot;layout&quot;:&quot;info-below&quot;,&quot;title_tag&quot;:&quot;h5&quot;,&quot;pagination_type&quot;:&quot;no-pagination&quot;,&quot;object_class_name&quot;:&quot;MarraCoreProductListShortcode&quot;,&quot;taxonomy_filter&quot;:&quot;product_cat&quot;,&quot;space_value&quot;:10}">
                                                                            <div class="qodef-grid-inner clear">
                                                                                @foreach ($recommendedArticles as $product)
                                                                                    <div
                                                                                        class="qodef-e qodef-grid-item qodef-item--full product type-product post-16 status-publish first instock product_cat-hair-care product_tag-care product_tag-cosmetics product_tag-gloss has-post-thumbnail sale shipping-taxable purchasable product-type-simple">
                                                                                        <div
                                                                                            class="qodef-woo-product-inner">
                                                                                            <div class="product-img">
                                                                                                <div
                                                                                                    class="product-actions">
                                                                                                    <a data-add-to-wish-list=""
                                                                                                        value="{{ $product->id }}"
                                                                                                        class="product-add-to-wishlist">
                                                                                                        <i
                                                                                                            class="fa fa-heart"></i>
                                                                                                    </a>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div
                                                                                                class="qodef-woo-product-image">
                                                                                                {{-- <span
                                                                                        class="qodef-woo-product-mark qodef-woo-onsale">Sale</span> --}}
                                                                                                <img width="800"
                                                                                                    height="800"
                                                                                                    src="{{ \ImagesHelper::getProductImage($product, null, 'lg_') }}"
                                                                                                    class="attachment-full size-full wp-post-image"
                                                                                                    alt="a" loading="lazy"
                                                                                                    srcset=""
                                                                                                    sizes="(max-width: 800px) 100vw, 800px" />
                                                                                                <div
                                                                                                    class="qodef-woo-product-image-inner">
                                                                                                    <a href="{{ route('product', [$product->id, $product->url]) }}"
                                                                                                        value="{{ $product->id }}"
                                                                                                        style="padding: 5px 15px;"
                                                                                                        class="button product_type_simple add_to_cart_button ajax_add_to_cart"
                                                                                                        rel="nofollow">Види
                                                                                                        повеќе</a>
                                                                                                    <a value="{{ $product->id }}"
                                                                                                        data-add-to-cart
                                                                                                        style="padding: 5px 15px; margin-top: 5px;"
                                                                                                        class="button product_type_simple add_to_cart_button ajax_add_to_cart"
                                                                                                        rel="nofollow">Додади
                                                                                                        во
                                                                                                        кошничка</a>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div
                                                                                                class="qodef-woo-product-content qodef-woo-content-order">
                                                                                                <div
                                                                                                    class="qodef-woo-product-categories">
                                                                                                    <a href=""
                                                                                                        rel="tag"></a>
                                                                                                </div>
                                                                                                <h5 itemprop="name"
                                                                                                    class="qodef-woo-product-title entry-title">
                                                                                                    <a itemprop="url"
                                                                                                        class="qodef-woo-product-title-link"
                                                                                                        href="/p/{{ $product->id }}/{{ $product->title }}">
                                                                                                        {{ $product->title }}</a>
                                                                                                </h5>
                                                                                                <?php $discount = EasyShop\Models\Product::getPriceRetail1($product, true, 0); ?>
                                                                                                @if (\EasyShop\Models\Product::hasDiscount($product->discount))
                                                                                                    <div
                                                                                                        class="qodef-woo-product-price price">
                                                                                                        <del><span
                                                                                                                class="woocommerce-Price-amount amount">
                                                                                                                {{ number_format($product->price, 0, ',', '.') }}
                                                                                                                мкд</span></del>
                                                                                                        <span
                                                                                                            class="woocommerce-Price-amount amount">{{ $discount }}
                                                                                                            мкд.</span>
                                                                                                    </div>
                                                                                                @else
                                                                                                    <span
                                                                                                        class="woocommerce-Price-amount amount">{{ number_format($product->price, 0, ',', '.') }}
                                                                                                        мкд.</span>
                                                                                                @endif
                                                                                            </div>
                                                                                            <div
                                                                                                class="qodef-woo-product-content qodef-woo-content-order2">
                                                                                                <div
                                                                                                    class="qodef-woo-product-content-top">
                                                                                                    <div
                                                                                                        class="qodef-woo-product-categories">
                                                                                                        <a href="https://marra.qodeinteractive.com/product-category/hair-care/"
                                                                                                            rel="tag">Hair
                                                                                                            care</a>
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="qodef-woo-ratings qodef-m">
                                                                                                        <div
                                                                                                            class="qodef-m-inner">
                                                                                                            <div
                                                                                                                class="qodef-m-star qodef--initial">
                                                                                                                <span
                                                                                                                    class="qodef-icon-elegant-icons icon_star_alt"></span><span
                                                                                                                    class="qodef-icon-elegant-icons icon_star_alt"></span><span
                                                                                                                    class="qodef-icon-elegant-icons icon_star_alt"></span><span
                                                                                                                    class="qodef-icon-elegant-icons icon_star_alt"></span><span
                                                                                                                    class="qodef-icon-elegant-icons icon_star_alt"></span>
                                                                                                            </div>
                                                                                                            <div class="qodef-m-star qodef--active"
                                                                                                                style="width:100%">
                                                                                                                <span
                                                                                                                    class="qodef-icon-elegant-icons icon_star"></span><span
                                                                                                                    class="qodef-icon-elegant-icons icon_star"></span><span
                                                                                                                    class="qodef-icon-elegant-icons icon_star"></span><span
                                                                                                                    class="qodef-icon-elegant-icons icon_star"></span><span
                                                                                                                    class="qodef-icon-elegant-icons icon_star"></span>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <a href="/p/{{ $product->id }}/{{ $product->title }}"
                                                                                                class="woocommerce-LoopProduct-link woocommerce-loop-product__link"></a>
                                                                                        </div>
                                                                                    </div>
                                                                                @endforeach
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </section> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </main>
        </div>
    </div>
    {{-- @if (!Cookie::get('wheel_of_fortune'))
        <div id="modal" style="padding-right: 0 !important;" class="modal fade" tabindex="-1" role="basic"
            aria-hidden="true">
            <div>
                <div style="background: #558182;" class="modal-header">
                    <button type="button" class="close" style=" color: white; font-size: 17px;" data-dismiss="modal"
                        aria-hidden="true">X</button>
                    <h4 id="beforeSpinHeading" class="white text-center modal-title bold">Купи пакет со производи и <strong
                            class="white">освој</strong> вредни награди
                    </h4>
                    <h4 id="afterSpinHeading" class="white modal-title bold">Честито! Освоивте <strong id="discountValue"
                            class="white"></strong></h4>
                </div>
                <div class="modal-body">
                    <div class="row form-group">
                        <img class="modal_img_width" src="{{ url_assets('/naturatherapyshop/img/promotion7.jpg') }}"
                            alt="">
                    </div>
                </div> --}}
    {{-- <div style="background: #546e68;" class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" style=" color: white; font-size: 15px;"
                        data-dismiss="modal" aria-hidden="true">X</button>
                    <h4 id="beforeSpinHeading" class="white modal-title bold">Освој <strong
                            class="white">попуст!</strong>
                    </h4>
                    <h4 id="afterSpinHeading" class="white modal-title bold">Честито! Освоивте <strong
                            id="discountValue" class="white"></strong></h4>
                </div>
                <div class="modal-body">
                    <div class="row form-group">
                        <div class="col-md-12">
                            <div class="alert alert-danger" style="display: none" data-newsletter-placeholder>
                            </div>
                            <div id="beforeSpinContent">
                                <div class="white">
                                    Внесете валидна е- маил адреса за да го завртите тркалото!
                                </div>
                                <input class="custom-input" name="email" id="email" type="email" placeholder="Внесете е- маил адреса*">
                                <div>
                                    <input style="width: 100%; padding: 0 !important;" type="submit"
                                        class="btn btn-lg btn-submit" value="СВРТИ ГО ТРКАЛОТО!" id="spinWheel">
                                    <br><br>
                                    <label id="spinFail" class="red">* Ве молиме внесете е- маил адреса!</label>
                                </div>
                                <br>
                                <div class="white">
                                    <strong class="white">Правила</strong>
                                    <ul>
                                        <li>- Тркалото содржи попусти од 5% до 40%</li>
                                        <li>- Мора да внесете валиден е- маил</li>
                                        <li>- Кодот трае 7 дена</li>
                                        <li>- За производи кои се веќе на попуст - попустот од кодот не се
                                            пресметува
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div id="afterSpinContent">
                                <h5 class="white">
                                    *Кликнете на кодот за да го копирате бидејќи ако го исклучете модалот тој код ќе се изгуби!
                                </h5>
                                <br>
                                <div class="white">
                                    Овој код е вашиот код кој трае 7 дена и треба да се внесе при правење
                                    нарачка.
                                    Важи само за една употреба врз цела кошничка.
                                </div>
                                <br>
                                <label class="form-control" name="promo_code" id="promo_code" type="promo_code"
                                    placeholder="Промотивен код*" onclick="myFunction(this)"></label>
                                <div>
                                    <input id="afterSpinButton"
                                        style="padding:0 !important; white-space: normal !important; width: 100%;"
                                        type="submit" class="btn btn-lg btn-submit"
                                        value="ЗАТВОРИ И ПРОДОЛЖИ КОН ВЕБ ПРОДАВНИЦАТА!">
                                </div>
                                <br>
                            </div>
                            <div style="position: relative; height: 300px; width: auto; overflow: hidden;"
                                class="spin-container">
                                <i class="custom-arrow fa fa-arrow-down white"
                                    style="position: absolute; top: 30px;"></i>
                                <div class="spinit" id="spinneratlas"
                                    style="width:100%; background-image: url({{ url_assets('/naturatherapyshop/img/natura-therapy-wheel.png') }}); position:absolute; top: 50px;">
                                    <div class="" data-spinit-id="40" data-spinit-start="-20"
                                        data-spinit-end="25">
                                    </div>
                                    <div class="" data-spinit-id="20" data-spinit-start="25"
                                        data-spinit-end="70">
                                    </div>
                                    <div class="" data-spinit-id="40" data-spinit-start="70"
                                        data-spinit-end="115">
                                    </div>
                                    <div class="" data-spinit-id="5" data-spinit-start="115"
                                        data-spinit-end="160">
                                    </div>
                                    <div class="" data-spinit-id="10" data-spinit-start="160"
                                        data-spinit-end="205">
                                    </div>
                                    <div class="" data-spinit-id="20" data-spinit-start="205"
                                        data-spinit-end="250">
                                    </div>
                                    <div class="" data-spinit-id="30" data-spinit-start="250"
                                        data-spinit-end="295">
                                    </div>
                                    <div class="" data-spinit-id="30" data-spinit-start="295"
                                        data-spinit-end="340">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div style="display: none !important;" class="modal-footer">
                </div>
            </div> --}}
    {{-- </div>
        </div>
    @endif --}}
    {{-- <div id="infoModalGames" style="padding-right: 0 !important;" class="modal fade" tabindex="-1" role="basic"
        aria-hidden="true">
        <div>
            <div class="modal-header">
                <button type="button" class="close" style=" color: white; font-size: 17px;" data-dismiss="modal"
                    aria-hidden="true">X</button>
                <h4 class="white modal-title bold">Правила за учество во наградната игра </h4>
            </div>
            <div class="modal-body">
                <div class="row form-group">
                    <img class="modal_img_width" src="{{ url_assets('/naturatherapyshop/img/information.jpg') }}" alt="">
                </div>
            </div>
            <div style="background: #546e68;" class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" style=" color: white; font-size: 15px;"
                        data-dismiss="modal" aria-hidden="true">X</button>
                    <h4 id="beforeSpinHeading" class="white modal-title bold">Освој <strong
                            class="white">попуст!</strong>
                    </h4>
                    <h4 id="afterSpinHeading" class="white modal-title bold">Честито! Освоивте <strong
                            id="discountValue" class="white"></strong></h4>
                </div>
                <div class="modal-body">
                    <div class="row form-group">
                        <div class="col-md-12">
                            <div class="alert alert-danger" style="display: none" data-newsletter-placeholder>
                            </div>
                            <div id="beforeSpinContent">
                                <div class="white">
                                    Внесете валидна е- маил адреса за да го завртите тркалото!
                                </div>
                                <input class="custom-input" name="email" id="email" type="email" placeholder="Внесете е- маил адреса*">
                                <div>
                                    <input style="width: 100%; padding: 0 !important;" type="submit"
                                        class="btn btn-lg btn-submit" value="СВРТИ ГО ТРКАЛОТО!" id="spinWheel">
                                    <br><br>
                                    <label id="spinFail" class="red">* Ве молиме внесете е- маил адреса!</label>
                                </div>
                                <br>
                                <div class="white">
                                    <strong class="white">Правила</strong>
                                    <ul>
                                        <li>- Тркалото содржи попусти од 5% до 40%</li>
                                        <li>- Мора да внесете валиден е- маил</li>
                                        <li>- Кодот трае 7 дена</li>
                                        <li>- За производи кои се веќе на попуст - попустот од кодот не се
                                            пресметува
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div id="afterSpinContent">
                                <h5 class="white">
                                    *Кликнете на кодот за да го копирате бидејќи ако го исклучете модалот тој код ќе се изгуби!
                                </h5>
                                <br>
                                <div class="white">
                                    Овој код е вашиот код кој трае 7 дена и треба да се внесе при правење
                                    нарачка.
                                    Важи само за една употреба врз цела кошничка.
                                </div>
                                <br>
                                <label class="form-control" name="promo_code" id="promo_code" type="promo_code"
                                    placeholder="Промотивен код*" onclick="myFunction(this)"></label>
                                <div>
                                    <input id="afterSpinButton"
                                        style="padding:0 !important; white-space: normal !important; width: 100%;"
                                        type="submit" class="btn btn-lg btn-submit"
                                        value="ЗАТВОРИ И ПРОДОЛЖИ КОН ВЕБ ПРОДАВНИЦАТА!">
                                </div>
                                <br>
                            </div>
                            <div style="position: relative; height: 300px; width: auto; overflow: hidden;"
                                class="spin-container">
                                <i class="custom-arrow fa fa-arrow-down white"
                                    style="position: absolute; top: 30px;"></i>
                                <div class="spinit" id="spinneratlas"
                                    style="width:100%; background-image: url({{ url_assets('/naturatherapyshop/img/natura-therapy-wheel.png') }}); position:absolute; top: 50px;">
                                    <div class="" data-spinit-id="40" data-spinit-start="-20"
                                        data-spinit-end="25">
                                    </div>
                                    <div class="" data-spinit-id="20" data-spinit-start="25"
                                        data-spinit-end="70">
                                    </div>
                                    <div class="" data-spinit-id="40" data-spinit-start="70"
                                        data-spinit-end="115">
                                    </div>
                                    <div class="" data-spinit-id="5" data-spinit-start="115"
                                        data-spinit-end="160">
                                    </div>
                                    <div class="" data-spinit-id="10" data-spinit-start="160"
                                        data-spinit-end="205">
                                    </div>
                                    <div class="" data-spinit-id="20" data-spinit-start="205"
                                        data-spinit-end="250">
                                    </div>
                                    <div class="" data-spinit-id="30" data-spinit-start="250"
                                        data-spinit-end="295">
                                    </div>
                                    <div class="" data-spinit-id="30" data-spinit-start="295"
                                        data-spinit-end="340">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div style="display: none !important;" class="modal-footer">
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" id="is_modal_shown" value="{{ Cookie::get('wheel_of_fortune') }}"> --}}
@stop
@section('scripts')
    <script src="{{ url_assets('/naturatherapyshop/js/zoom.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#click').click();
            // if($("#is_modal_shown").val() != 1){
            //     setTimeout(function(){
            //         $("body").addClass("modal-open");
            //     }, 1000);
            // }
        });
        // $('.modal-body').click(function(evt) {
        //     //For descendants of menu_content being clicked, remove this check if you do not want to put constraint on descendants.
        //     if ($(evt.target).closest('.modal_img_width').length)
        //         return;
        //     $('#modal').modal('hide');
        // });
        // $('.modal-body').click(function(evt) {
        //     //For descendants of menu_content being clicked, remove this check if you do not want to put constraint on descendants.
        //     if ($(evt.target).closest('.modal_img_width').length)
        //         return;
        //     if ($(evt.target).closest('.modal_img_width').length)
        //         return;
        //     $('#modal').modal('hide');
        //     $('#infoModalGames').modal('hide');
        // });
        $('.brand-slider-initz').slick({
            autoPlay: true,
            arrows: false,
            slidesToShow: 6,
            responsive: [{
                    breakpoint: 768,
                    settings: {
                        autoPlay: true,
                        arrows: false,
                        slidesToShow: 3
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        autoPlay: true,
                        arrows: false,
                        slidesToShow: 2
                    }
                }
            ]
        });
    </script>
@stop

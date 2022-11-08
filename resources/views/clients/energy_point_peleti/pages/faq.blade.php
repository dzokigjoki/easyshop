@extends('clients.energy_point_peleti.layouts.default')
@section('content')
<div class="heading-container">
    <div class="container heading-standar">
        <div class="page-breadcrumb">
            <ul class="breadcrumb">
                <li><span><a href="#" class="home"><span>Home</span></a></span></li>
                <li><span>FAQ</span></li>
            </ul>
        </div>
    </div>
</div>
<div class="content-container">
    <div class="container">
        <div class="row">
            <div class="col-md-12 main-wrap">
                <div class="main-content">
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="wpb_wrapper">
                                <div class="row inner faq-wrapper">
                                    <div class="col-sm-12">
                                        <div class="content_element title">
                                            <h2>Генерални Прашања</h2>
                                        </div>
                                        <div class="toggle toggle_default toggle_color_default">
                                            <div class="toggle_title">
                                                <h4>Како да ве контактираме?</h4>
                                                <i class="toggle_icon"></i>
                                            </div>
                                            <div class="toggle_content">
                                                <p>
                                                    Можете да ни испратете е- пошта на:
                                                    <a
                                                        href="mailto:info@generadevelopment.com">info@generadevelopment.com</a>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="toggle toggle_default toggle_color_default">
                                            <div class="toggle_title">
                                                <h4>Каде сте лоцирани? </h4>
                                                <i class="toggle_icon"></i>
                                            </div>
                                            <div class="toggle_content">
                                                <p>Виеми 3&3 дооел Железничка 6, 6000 Охрид</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row inner faq-wrapper">
                                    <div class="col-sm-12">
                                        <div class="content_element title">
                                            <h2>Достава</h2>
                                        </div>
                                        <div class="toggle toggle_default toggle_color_default">
                                            <div class="toggle toggle_default toggle_color_default">
                                                <div class="toggle_title">
                                                    <h4>Како да ве контактираме?</h4>
                                                    <i class="toggle_icon"></i>
                                                </div>
                                                <div class="toggle_content">
                                                    <p>
                                                        Можете да ни испратете е- пошта на:
                                                        <a
                                                            href="mailto:info@generadevelopment.com">info@generadevelopment.com</a>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="toggle toggle_default toggle_color_default">
                                                <div class="toggle_title">
                                                    <h4>Каде сте лоцирани? </h4>
                                                    <i class="toggle_icon"></i>
                                                </div>
                                                <div class="toggle_content">
                                                    <p>Виеми 3&3 дооел Железничка 6, 6000 Охрид</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="row contact-info">
                                <div class="col-sm-12">
                                    <div class="title">
                                        <h4>Ви треба помош?</h4>
                                    </div>
                                    <div
                                        class="separator content_element separator_align_center sep_width_100 sep_pos_align_center separator_no_text">
                                        <span class="sep_holder sep_holder_l">
                                            <span class="sep_line"></span>
                                        </span>
                                        <span class="sep_holder sep_holder_r">
                                            <span class="sep_line"></span>
                                        </span>
                                    </div>
                                    <div class="content_element">
                                        <div class="support-icon">
                                            <i class="fa fa-map-marker"></i>
                                            Виеми 3&3 дооел Железничка 6, 6000 Охрид
                                        </div>
                                        <div class="support-icon">
                                            <i class="fa fa-phone"></i>
                                            <a href="tel:0038975261552"> +389 75 261 552</a>
                                        </div>
                                        <div class="support-icon">
                                            <i class="fa fa-phone"></i>
                                            <a href="tel:0038971231807"> +389 71 231 807</a>
                                        </div>
                                        <div class="support-icon">
                                            <i class="fa fa-envelope-o"></i>
                                            <a href="mailto:info@energy_point_peleti.com">
                                                info@energy_point_peleti.com
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
</div>
@stop
@section('scripts')
<script type='text/javascript' src='{{url_assets('/energy_point_peleti/js/custom.js')}}'></script>
@endsection
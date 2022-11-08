@extends('clients.energy_point_peleti.layouts.default')
@section('content')
{{-- <div class="heading-container heading-resize heading-no-button">
    <div class="heading-background heading-parallax bg-1">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="heading-wrap">
                        <div class="page-title">
                            <h1>Контактирајте не</h1>
                            <div class="page-breadcrumb">
                                <ul class="breadcrumb">
                                    <li><span><a class="home" href="#"><span>Почетна</span></a></span></li>
                                    <li><span>Контакт</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}
{{-- {!! htmlScriptTagJsApi() !!} --}}
<div class="content-container">
    <div class="container-full">
        <div class="row">
            <div class="col-md-12 main-wrap">
                <div class="main-content">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-8">
                                <div class="row contact-form-wrapper">
                                    <div class="col-sm-12">
                                        <div class="title">
                                            <h2>Контактирајте не</h2>
                                        </div>
                                        <form method="post" action="{{ route('kontakt-forma') }}">
                                            {{ csrf_field() }}
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <div>Име (задолжително)<br />
                                                        <p class="form-control-wrap your-name">
                                                            <input type="text" name="name" value="" size="40"
                                                                data-form-name
                                                                class="form-control text validates-as-required" />
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div>Е- пошта (задолжително)<br />
                                                        <p class="form-control-wrap your-email">
                                                            <input type="email" data-form-email name="email" id="email"
                                                                class="form-control text email validates-as-required validates-as-email" />
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div>Телефон (задолжително)<br />
                                                        <p class="form-control-wrap your-email">
                                                            <input type="text" data-form-phone name="phone" id="phone"
                                                                placeholder="Телефон" required
                                                                class="form-control text email validates-as-required validates-as-email" />
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div>Порака<br />
                                                        <p class="form-control-wrap your-message"> <textarea
                                                                name="message" id="message" cols="30" rows="8"
                                                                data-form-message required
                                                                class="form-control textarea"></textarea>
                                                        </p>
                                                    </div>
                                                </div>
                                                {{-- {!! htmlFormSnippet() !!} --}}
                                            </div>
                                            <input type="submit" value="Испрати" class="form-control submit" />
                                        </form>
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
                                            {{-- <div class="support-icon">
                                                <i class="fa fa-map-marker"></i>
                                                Виеми 3&3 дооел Железничка 6, 6000 Охрид
                                            </div> --}}
                                            <div class="support-icon">
                                                <i class="fa fa-phone"></i>
                                                <a href="tel:0038975261552"> +123 456 789</a>
                                            </div>
                                            <div class="support-icon">
                                                <i class="fa fa-phone"></i>
                                                <a href="tel:0038971231807"> +123 456 789</a>
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
</div>
@endsection
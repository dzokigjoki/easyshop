@extends('clients.naturatherapy.layouts.default')


@section('styles')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css">
@endsection

@section('scripts')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
@endsection


@section('content')

<section class="banner-section">
    <div class="banner banner-md bg-image" style="background-image: url( {{ url_assets('/naturatherapy/images/about-header.jpg') }}">
        <div class="banner-content text-white text-center py-5">
            <div class="container">
                <h2 class="h1">
                    {!! trans('naturatherapy/global.about') !!}</h2>
            </div>
        </div>
    </div>
</section>


<section class="breadcrumb-section bg-light">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb py-2 py-lg-3">
                <li class="breadcrumb-item">
                    <a href="/">
                        {!! trans('naturatherapy/global.home') !!}</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    {!! trans('naturatherapy/global.about') !!}</li>
            </ol>
        </nav>
    </div>
</section>

<section class="section elements py-5 py-xl-100 overflow-hidden">
    <div class="element-top">
        <img src="{{ url_assets('/naturatherapy/images/flower-element-1-left.svg') }}" class="element-img element-img-lg">
    </div>
    <div class="element-bottom">
        <img src="{{ url_assets('/naturatherapy/images/flower-element-2-right.svg') }}" class="element-img element-img-lg">
    </div>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6 pr-xl-5 mb-4 mb-md-0">
                <h2 class="h1 mb-4">{!! trans('naturatherapy/global.companyNamefull') !!}</h2>
                <div class="text-slider dots-style-1 dots-style-left pb-lg-4">
                    <div class="dynamic-content">
                        <p>{!! trans('naturatherapy/about.about_text') !!}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <img class="img-fluid" src="{{ url_assets('/naturatherapy/images/about-section-1.jpg') }}" alt="">
            </div>
        </div>
    </div>
</section>
<!-- <section class="section bg-light py-5 py-xl-100 overflow-hidden">
    <div class="container">
        <h2 class="h1 text-center mb-4 mb-md-5">{!! trans('naturatherapy/about.our_team') !!}</h2>
        <div class="row row-employees justify-content-center">
            <div class="col-6 col-md-4 col-employees text-center mb-4">
                <div class="img-wrapper mb-4 pb-lg-2">
                    <img src="https://naturatherapy.mk/assets/images/team/sasko-drvosanski.jpg?V=123123" class="img-fluid rounded-primary">

                    <div class="img-wrapper-flip">
                        <div class="img-wrapper-flip-2">
                            <p class="h5 mb-2">
                                <span>{!! trans('naturatherapy/about.team1') !!}</span>
                            </p>
                            {!! trans('naturatherapy/about.team1_text') !!}
                        </div>
                    </div>

                </div>
                <p class="h5 mb-2"><span class="heading-border">{!! trans('naturatherapy/about.team1') !!}</span></p>

                <p>{!! trans('naturatherapy/about.team2_title') !!}</p>


            </div>

            <div class="col-6 col-md-4 col-employees text-center mb-4">
                <div class="img-wrapper mb-4 pb-lg-2">
                    <img src="https://naturatherapy.mk/assets/images/team/marijana-filipov.jpg" class="img-fluid rounded-primary">
                    <div class="img-wrapper-flip">
                        <div class="img-wrapper-flip-2">
                            <p class="h5 mb-2">
                                <span>{!! trans('naturatherapy/about.team2') !!}</span>
                            </p>
                            {!! trans('naturatherapy/about.team2_text') !!}
                        </div>
                    </div>
                </div>
                <p class="h5 mb-2"><span class="heading-border">{!! trans('naturatherapy/about.team2') !!}</span></p>
                <p>{!! trans('naturatherapy/about.team2_title') !!}</p>

            </div>

            <div class="col-6 col-md-4 col-employees text-center mb-4">
                <div class="img-wrapper mb-4 pb-lg-2">
                    <img src="https://naturatherapy.mk/assets/images/team/hristina-angeloska.jpg" class="img-fluid rounded-primary">
                    <div class="img-wrapper-flip">
                        <div class="img-wrapper-flip-2">
                            <p class="h5 mb-2">
                                <span>{!! trans('naturatherapy/about.team3') !!}</span>
                            </p>
                            {!! trans('naturatherapy/about.team3_text') !!}


                        </div>
                    </div>
                </div>
                <p class="h5 mb-2"><span class="heading-border">{!! trans('naturatherapy/about.team3') !!}</span></p>
                <p>{!! trans('naturatherapy/about.team3_title') !!}</p>

            </div>

            <div class="col-6 col-md-4 col-employees text-center mb-4">
                <div class="img-wrapper mb-4 pb-lg-2">
                    <img src="https://placehold.jp/500x500.png" class="img-fluid rounded-primary">
                    <div class="img-wrapper-flip">
                        <div class="img-wrapper-flip-2">
                            <p class="h5 mb-2">
                                <span>{!! trans('naturatherapy/about.team4') !!}</span>
                            </p>
                            {!! trans('naturatherapy/about.team4_text') !!}


                        </div>
                    </div>
                </div>
                <p class="h5 mb-2"><span class="heading-border">{!! trans('naturatherapy/about.team4') !!}</span></p>
                <p>{!! trans('naturatherapy/about.team4_title') !!}</p>
            </div>

            <div class="col-6 col-md-4 col-employees text-center mb-4">
                <div class="img-wrapper mb-4 pb-lg-2">
                    <img src="https://placehold.jp/500x500.png" class="img-fluid rounded-primary">
                    <div class="img-wrapper-flip">
                        <div class="img-wrapper-flip-2">
                            <p class="h5 mb-2">
                                <span>{!! trans('naturatherapy/about.team5') !!}</span>
                            </p>
                            {!! trans('naturatherapy/about.team5_text') !!}



                        </div>
                    </div>
                </div>
                <p class="h5 mb-2"><span class="heading-border">{!! trans('naturatherapy/about.team5') !!}</span></p>
                <p>{!! trans('naturatherapy/about.team5_title') !!}</p>
            </div>
        </div>
    </div>
</section> -->
<section class="section elements py-5 py-xl-100">
    <div class="element-top">
        <img src="{{ url_assets('/naturatherapy/images/flower-element-1-left.svg') }}" class="element-img element-img-lg">
    </div>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6 order-2 order-md-1">
                <img class="img-fluid mb-lg-50" src="{{ url_assets('/naturatherapy/images/about-section-4.jpg') }}" alt="">
            </div>
            <div class="col-md-6 pl-xl-5 order-1 order-md-2 mb-4 mb-md-0">
                <div class="tabs-style-1">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="nav-tab-1-tab" data-toggle="tab" href="#nav-tab-1" role="tab" aria-controls="nav-tab-1" aria-selected="true">{!! trans('naturatherapy/about.mission') !!}</a>
                            <a class="nav-item nav-link" id="nav-tab-2-tab" data-toggle="tab" href="#nav-tab-2" role="tab" aria-controls="nav-tab-2" aria-selected="false">{!! trans('naturatherapy/about.vision') !!}</a>
                            <a class="nav-item nav-link" id="nav-tab-3-tab" data-toggle="tab" href="#nav-tab-3" role="tab" aria-controls="nav-tab-3" aria-selected="false">{!! trans('naturatherapy/about.cel') !!}</a>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade dynamic-content show active pb-0" id="nav-tab-1" role="tabpanel" aria-labelledby="nav-tab-1-tab">
                            <h3 class="h2 mb-4 mb-lg-4">{!! trans('naturatherapy/about.mission') !!}</h3>
                            {!! trans('naturatherapy/about.mission_text') !!}
                        </div>
                        <div class="tab-pane fade dynamic-content pb-0" id="nav-tab-2" role="tabpanel" aria-labelledby="nav-tab-2-tab">
                            <h3 class="h2 mb-4 mb-lg-4">{!! trans('naturatherapy/about.vision') !!}</h3>
                            <p>
                                {!! trans('naturatherapy/about.vision_text') !!}
                            </p>
                        </div>
                        <div class="tab-pane fade dynamic-content pb-0" id="nav-tab-3" role="tabpanel" aria-labelledby="nav-tab-3-tab">
                            <h3 class="h2 mb-4 mb-lg-4">{!! trans('naturatherapy/about.cel') !!}
                            </h3>

                            <p>{!! trans('naturatherapy/about.cel_text') !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section">
    <div class="banner banner-md bg-image overlay-secondary py-5 py-xl-100" style="background-image: url('{{ url_assets('/naturatherapy/images/about-parallax.jpg') }}');">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="row justify-content-center">
                        <div class="col-sm text-center mb-3 mb-md-0">
                            <p class="h1 font-weight-bold text-white">100%</p>
                            <hr class="my-3 hr-white hr-sm">
                            </hr>
                            <p class="h6 text-white mb-0">
                                {!! trans('naturatherapy/about.original') !!}</p>
                        </div>
                        <div class="col-sm text-center mb-3 mb-md-0">
                            <p class="h1 font-weight-bold text-white">10.000+</p>
                            <hr class="my-3 hr-white hr-sm">
                            </hr>
                            <p class="h6 text-white mb-0">
                                {!! trans('naturatherapy/about.happy') !!}</p>
                        </div>
                        <div class="col-sm text-center">
                            <p class="h1 font-weight-bold text-white">20+</p>
                            <hr class="my-3 hr-white hr-sm">
                            </hr>
                            <p class="h6 text-white mb-0">{!! trans('naturatherapy/about.unique') !!}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section bg-primary py-5 py-xl-100 ">
    <div class="container">
        <h3 class="h1 text-center mb-4 mb-lg-5">
            {!! trans('naturatherapy/about.testimonial_header') !!}</h3>
        <div id="clients-slider" class="slider slider-style-1 dots-style-1 pb-lg-4">
            <div>
                <div class="bg-white shadow-md rounded-primary text-center p-4 p-lg-5">
                    <div class="px-xl-4 position-relative">
                        <img src="{{ url_assets('/naturatherapy/images/icons/quotes.svg') }}" class="icon-quotes icon icon-lg d-inline-block mb-3 mb-md-4">
                        <p class="mb-lg-4"> {!! trans('naturatherapy/about.testimonial_1') !!}</p>
                        <div class="row align-items-center justify-content-center">
                            <div class="col-md-auto">
                                <img src="{{ url_assets('/naturatherapy/images/testimonials/sefije-selmani.jpg') }}" alt="" class="rounded-circle user-img">
                            </div>
                            <div class="col-md-auto pl-0 pl-lg-2">
                                <p class="h5 text-uppercase user-name mb-1 mb-lg-2">{!! trans('naturatherapy/about.testimonial_1_p') !!}</p>
                                <p class="h6 user-status font-italic font-weight-normal mb-0">{!! trans('naturatherapy/about.testimonial_satisfied') !!}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <div class="bg-white shadow-md rounded-primary text-center p-4 p-lg-5">
                    <div class="px-xl-4 position-relative">
                        <img src="{{ url_assets('/naturatherapy/images/icons/quotes.svg') }}" class="icon-quotes icon icon-lg d-inline-block mb-3 mb-md-4">
                        <p class="mb-lg-4"> {!! trans('naturatherapy/about.testimonial_2') !!} </p>
                        <div class="row align-items-center justify-content-center">
                            <div class="col-md-auto">
                                <img src="{{ url_assets('/naturatherapy/images/testimonials/stanka-kuc.jpg') }}" alt="" class="rounded-circle user-img">
                            </div>
                            <div class="col-md-auto pl-0 pl-lg-2">
                                <p class="h5 text-uppercase user-name mb-1 mb-lg-2">
                                    {!! trans('naturatherapy/about.testimonial_2_p') !!}</p>
                                <p class="h6 user-status font-italic font-weight-normal mb-0">{!! trans('naturatherapy/about.testimonial_satisfied') !!}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <div class="bg-white shadow-md rounded-primary text-center p-4 p-lg-5">
                    <div class="px-xl-4 position-relative">
                        <img src="{{ url_assets('/naturatherapy/images/icons/quotes.svg') }}" class="icon-quotes icon icon-lg d-inline-block mb-3 mb-md-4">
                        <p class="mb-lg-4"> {!! trans('naturatherapy/about.testimonial_3') !!} </p>
                        <div class="row align-items-center justify-content-center">
                            {{--
								<div class="col-md-auto">
									<img src="{{ url_assets('/naturatherapy/images/testimonials/') }}" alt="" class="rounded-circle user-img">
                        </div>
                        --}}
                        <div class="col-md-auto pl-0 pl-lg-2">
                            <p class="h5 text-uppercase user-name mb-1 mb-lg-2">{!! trans('naturatherapy/about.testimonial_3_p') !!}</p>
                            <p class="h6 user-status font-italic font-weight-normal mb-0">{!! trans('naturatherapy/about.testimonial_satisfied') !!}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div class="bg-white shadow-md rounded-primary text-center p-4 p-lg-5">
                <div class="px-xl-4 position-relative">
                    <img src="{{ url_assets('/naturatherapy/images/icons/quotes.svg') }}" class="icon-quotes icon icon-lg d-inline-block mb-3 mb-md-4">
                    <p class="mb-lg-4"> {!! trans('naturatherapy/about.testimonial_4') !!}
                        <div class="row align-items-center justify-content-center">
                            <div class="col-md-auto">
                                <img src="{{ url_assets('/naturatherapy/images/testimonials/zora-mladenovska.jpg') }}" alt="" class="rounded-circle user-img">
                            </div>

                            <div class="col-md-auto pl-0 pl-lg-2">
                                <p class="h5 text-uppercase user-name mb-1 mb-lg-2">
                                    {!! trans('naturatherapy/about.testimonial_4_p') !!}</p>
                                <p class="h6 user-status font-italic font-weight-normal mb-0">{!! trans('naturatherapy/about.testimonial_satisfied') !!}
                                </p>
                            </div>
                        </div>
                </div>
            </div>
        </div>
        <div>
            <div class="bg-white shadow-md rounded-primary text-center p-4 p-lg-5">
                <div class="px-xl-4 position-relative">
                    <img src="{{ url_assets('/naturatherapy/images/icons/quotes.svg') }}" class="icon-quotes icon icon-lg d-inline-block mb-3 mb-md-4">
                    <p class="mb-lg-4"> {!! trans('naturatherapy/about.testimonial_5') !!}</p>
                    <div class="row align-items-center justify-content-center">
                        {{--
								<div class="col-md-auto">
									<img src="{{ url_assets('/naturatherapy/images/testimonials/') }}" alt="" class="rounded-circle user-img">
                    </div>
                    --}}
                    <div class="col-md-auto pl-0 pl-lg-2">
                        <p class="h5 text-uppercase user-name mb-1 mb-lg-2">
                            {!! trans('naturatherapy/about.testimonial_5_p') !!}</p>
                        <p class="h6 user-status font-italic font-weight-normal mb-0">{!! trans('naturatherapy/about.testimonial_satisfied') !!}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div>
        <div class="bg-white shadow-md rounded-primary text-center p-4 p-lg-5">
            <div class="px-xl-4 position-relative">
                <img src="{{ url_assets('/naturatherapy/images/icons/quotes.svg') }}" class="icon-quotes icon icon-lg d-inline-block mb-3 mb-md-4">
                <p class="mb-lg-4">{!! trans('naturatherapy/about.testimonial_6') !!}</p>
                <div class="row align-items-center justify-content-center">
                    {{--
								<div class="col-md-auto">
									<img src="{{ url_assets('/naturatherapy/images/testimonials/') }}" alt="" class="rounded-circle user-img">
                </div>
                --}}
                <div class="col-md-auto pl-0 pl-lg-2">
                    <p class="h5 text-uppercase user-name mb-1 mb-lg-2">
                        {!! trans('naturatherapy/about.testimonial_6_p') !!}</p>
                    <p class="h6 user-status font-italic font-weight-normal mb-0">{!! trans('naturatherapy/about.testimonial_satisfied') !!}
                    </p>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
</section>




<section id="sovet" class="section elements py-5 py-xl-100">
    <div class="element-top">
        <img src="https://naturatherapy.mk/assets/images/flower-element-1-left.svg" class="element-img element-img-lg">
    </div>
    <div class="element-bottom">
        <img src="https://naturatherapy.mk/assets/images/flower-element-2-right.svg" class="element-img element-img-lg">
    </div>
    <div class="container">
        <div class="text-center">
            <h3 class="h1 mb-4 mb-lg-5">
                {!! trans('naturatherapy/about.sovet') !!}
            </h3>

        </div>
        <form method="post" id="newcareer" action="{{route('kontakt-forma')}}" name="newcareer" class="form-style-1" autocomplete="off">

            {{ csrf_field() }}

            <div class="row">
                <div class="col-md-6 form-group mb-md-4">
                    <label>{!! trans('naturatherapy/global.fullname') !!}
                    </label>
                    <input type="text" class="form-control" placeholder="{!! trans('naturatherapy/global.fullname') !!}" value="" name="name" data-form-name required>
                    <div class="invalid-tooltip">Vendosni një emër!
                    </div>
                </div>


                <div class="col-md-3 form-group mb-md-4">
                    <label>{!! trans('naturatherapy/global.email') !!}</label>
                    <input type="email" class="form-control" placeholder="{!! trans('naturatherapy/global.email') !!}" value="" name="email" required>
                </div>
                <div class="col-md-3 form-group mb-md-4">
                    <label>{!! trans('naturatherapy/global.phone') !!}</label>
                    <input type="text" class="form-control phoneformat" placeholder="{!! trans('naturatherapy/global.phone') !!}" value="" name="phone" required>
                </div>

                <div class="col-md-6 form-group mb-md-4">
                    <label>{!! trans('naturatherapy/global.city') !!}</label>
                    <select required id="City" class="form-control" name="city">
                        <option value="">-- {!! trans('naturatherapy/global.city') !!}--</option>
                        @foreach($all_cities as $city)
                        @if($city->id != 35)
                        <option @if(isset($user->city_id_shipping) && $user->city_id_shipping == $city->id)
                            selected
                            @endif
                            value="{{$city->id}}"
                            data-name="{{$city->city_name_en}}"
                            data-zip="{{$city->zip}}">
                            {{$city->city_name_en}}
                        </option>
                        @endif
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6 form-group mb-md-4"><label>
                        {!! trans('naturatherapy/global.opstina') !!}</label>
                    <input required type="text" class="form-control" placeholder="{!! trans('naturatherapy/global.opstina') !!}" value="" id="municipality" name="municipality">
                    <div class="invalid-tooltip">
                        Hyni në një zgjidhje!</div>
                </div>
                <div class="col-12 form-group mb-md-4">
                    <label>{!! trans('naturatherapy/about.request_sovet') !!}</label>
                    <textarea class="form-control" placeholder="{!! trans('naturatherapy/global.request_sovet') !!}" name="message" rows="6" data-validation="[NOTEMPTY]"> </textarea>
                </div>

                <div class="col-12 text-right">
                    <div id="showerrors__2"></div>
                    <button type="submit" class="btn btn-secondary submit-this">{!! trans('naturatherapy/global.send') !!}</button>
                </div>

                <input type="hidden" name="request_sovet_natura" value="true">
            </div>
        </form>

    </div>
</section>

@endsection
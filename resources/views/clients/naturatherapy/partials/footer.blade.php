<footer>
    <div class="footer-top py-4 py-md-5 py-xl-80">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-7 col-md-4 mb-4 mb-md-0">
                    <div class="mb-4 text-center text-md-left">
                        <a href="#">
                            <img class="logo" src="{{ url_assets('/naturatherapy/images/logo.svg') }}" alt="Logo">
                        </a>
                    </div>
                    <div class="d-none d-md-block">
                        <ul class="list-unstyled">
                            <li>
                                <span class="mr-3">
                                    {!! trans('naturatherapy/footer.workingdays') !!}</span>
                                <span class="">{!! trans('naturatherapy/footer.workinghours') !!}</span>
                            </li>
                            <li>
                                <span class="mr-3">
                                    {!! trans('naturatherapy/footer.saturday') !!}</span>
                                <span class="">{!! trans('naturatherapy/footer.saturdayhours') !!}</span>
                            </li>
                        </ul>
                        <hr class="my-4">
                        <div class="get-social">
                            <p class="d-inline-block mr-4">{!! trans('naturatherapy/footer.getsocial') !!}</p>
                            <ul class="d-inline-block list-inline mb-0">
                                <li class="list-inline-item">
                                    <a href="https://www.facebook.com/naturatherapy.ks/" target="_blank" class="link link-primary"><i class="fa fa-facebook icons" aria-hidden="true"></i></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="https://www.youtube.com/channel/UCSqpwiA5_ace07x3_NLlcqg" target="_blank" class="link link-primary"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="https://www.instagram.com/naturatherapy.ks/" target="_blank" class="link link-primary"><i class="fa fa-instagram icons mr-2" aria-hidden="true"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-sm-7 col-md-4 mb-4 mb-md-0">
                    <h6 class="h5 font-weight-bold text-center text-uppercase mb-4">{!! trans('naturatherapy/footer.contactus') !!}
                    </h6>
                    <p class="font-weight-bold text-green text-center">{!! trans('naturatherapy/footer.companyNamefull') !!}</p>
                    <ul class="list-unstyled text-center">
                        <li class="mb-2">
                            <a class="link" href="#">
                                <img src="{{ url_assets('/naturatherapy/images/icons/pointer-icon.svg') }}" class="icon icon-xs d-inline-block mr-1">
                                {!! trans('naturatherapy/footer.address') !!}

                            </a>
                        </li>
                        <li class="mb-2">
                            <a class="link" href="#">
                                <img src="{{ url_assets('/naturatherapy/images/icons/mail-icon.svg') }}" class="icon icon-xs d-inline-block mr-1"> contact@naturatherapy.al
                            </a>
                        </li>

                        <li class="mb-2">
                            <a class="link" href="#">
                                <img src="{{ url_assets('/naturatherapy/images/icons/mail-icon.svg') }}" class="icon icon-xs d-inline-block mr-1"> contact@naturaks.com
                            </a>
                        </li>

                        
                        <li class="mb-2">
                            <a class="link" href="#">
                                <img src="{{ url_assets('/naturatherapy/images/icons/call-icon.svg') }}" class="icon icon-xs d-inline-block mr-1"> +383 45 956 000
                            </a>
                        </li>
                    </ul>
                    <div class="d-md-none text-center">
                        <ul class="list-unstyled">
                            <li>
                                <span class="mr-3">
                                    Mon-pesë:</span>
                                <span class="">08:00am - 08:00pm</span>
                            </li>
                            <li>
                                <span class="mr-3">
                                    E shtune:</span>
                                <span class="">10:00am - 06:00pm</span>
                            </li>
                        </ul>
                        <hr class="my-4">
                        <div class="get-social">
                            <p class="d-inline-block mr-4">Rrjete sociale</p>
                            <ul class="d-inline-block list-inline mb-0">
                                <li class="list-inline-item">
                                    <a href="https://www.facebook.com/naturatherapy.mk/" target="_blank" class="link link-primary"><i class="fa fa-facebook icons" aria-hidden="true"></i></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="https://www.youtube.com/channel/UCUH7clLtbM5huq6hP1ZLkiA" target="_blank" class="link link-primary"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="https://www.instagram.com/naturatherapy.mk/" target="_blank" class="link link-primary"><i class="fa fa-instagram icons mr-2" aria-hidden="true"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-sm-7 col-md-4 text-center text-md-left">
                    <h2 class="h5 font-weight-bold text-uppercase mb-4">{!! trans('naturatherapy/footer.get_informed_header') !!}</h2>
                    <p class="mb-4">{!! trans('naturatherapy/footer.get_informed_text') !!}</p>
                    <a class="btn btn-secondary" href="https://naturatherapy.com/za-nas#sovet">{!! trans('naturatherapy/footer.get_informed_button') !!}</a>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom bg-light py-2 py-sm-3">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-12">
                    <p class="mb-0">© Copyright 2020 | <a href="https://naturatherapy.com" class="link">{!! trans('naturatherapy/global.companyNamefull') !!}</a></p>
                </div>
                <div class="col-md-8 col-12">
                    <ul class="footerlinks">


                        <li class=""><a href="/payment-infos">{!! trans('naturatherapy/footer.howtopay') !!}</a></li>
                        <li class=""><a href="/legal-info">{!! trans('naturatherapy/footer.legalinfo') !!}</a></li>

                    </ul>
                    <div class="col-md-12"></div>
                    <div class="footer-text-smaller">{!! trans('naturatherapy/footer.safepay') !!}</div>
                </div>
            </div>

        </div>
    </div>
</footer>
<!-- breadcrumb-section start -->
@extends('clients.expressbook_new.layouts.default')

@section('content')
    <nav class="breadcrumb-section theme1 bg-lighten2 pt-35 pb-35">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title text-center">
                        <h2 class="title pb-4 text-dark text-capitalize">Контакт</h2>
                    </div>
                </div>
                <div class="col-12">
                    <ol class="breadcrumb bg-transparent m-0 p-0 align-items-center justify-content-center">
                        <li class="breadcrumb-item"><a href="/">Почетна</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Контакт</li>
                    </ol>
                </div>
            </div>
        </div>
    </nav>
    <!-- breadcrumb-section end -->
    <!-- contact-section satrt -->
    <section class="contact-section pt-80 pb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-12 mb-30">
                    <!--  contact page side content  -->
                    <div class="contact-page-side-content">
                        <h3 class="contact-page-title">Контактирајте не</h3>
                        <p class="contact-page-message mb-30">
                            Нашиот тим е на располагање да ви одговори на сите прашања 24/7
                        </p>
                        <!--  single contact block  -->

                        <div class="single-contact-block">
                            <h4><i class="fa fa-fax"></i> Адреса</h4>
                            <p>1-3, Orce Nikolov 206, Skopje 1000</p>
                        </div>

                        <!--  End of single contact block -->

                        <!--  single contact block -->

                        <div class="single-contact-block">
                            <h4><i class="fa fa-phone"></i> Телефон</h4>
                            <p>
                                <a href="tel:+389 71 297 619">+389 71 297 619</a>
                            </p>
                        </div>

                        <!-- End of single contact block -->

                        <!--  single contact block -->

                        <div class="single-contact-block">
                            <h4><i class="fas fa-envelope"></i> Е-Пошта</h4>
                            <p>
                                <a href="mailto:marija@expressbook.mk">marija@expressbook.mk</a>
                            </p>
                        </div>

                        <!--=======  End of single contact block  =======-->
                    </div>

                    <!--=======  End of contact page side content  =======-->
                </div>
                <div class="col-lg-6 col-12 mb-30">
                    <!--  contact form content -->
                    <div class="contact-form-content">
                        <h3 class="contact-page-title">Напишете ни</h3>
                        <div class="contact-form">
                            <form id="contact-form" action="{{ route('kontakt-forma') }}" method="POST">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label>Вашето име <span class="required">*</span></label>
                                    <input required type="text" name="name" id="name" />
                                </div>
                                <div class="form-group">
                                    <label>Наслов <span class="required">*</span></label>
                                    <input required type="text" name="subject" id="subject" />
                                </div>
                                <div class="form-group">
                                    <label>Вашата е-пошта <span class="required">*</span></label>
                                    <input required type="email" name="email" id="email" />
                                </div>
                                <div class="form-group">
                                    <label>Телефон <span class="required">*</span></label>
                                    <input required type="text" name="phone" id="phone" />
                                </div>
                                <div class="form-group">
                                    <label>Вашата порака <span class="required">*</span></label>
                                    <textarea required name="message" class="pb-10" id="message"></textarea>
                                </div>
                                <div class="form-group mb-0">
                                    <button type="submit" value="submit" id="submit" class="btn btn-dark btn--lg"
                                        name="submit">
                                        Испрати
                                    </button>
                                </div>
                            </form>
                        </div>
                        <p class="form-message text-center mt-35"></p>
                    </div>
                    <!-- End of contact -->
                </div>
            </div>
        </div>
    </section>
    <!-- contact-section end -->
    <!-- map start -->
    <div class="map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2964.763799265046!2d21.40791371531027!3d42.00534447921231!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x135415af5a91031f%3A0x9a117477cbbb8efd!2sEkspres%20Buk%20ELT!5e0!3m2!1sen!2smk!4v1624991767052!5m2!1sen!2smk" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>
    <!-- map end -->

@stop

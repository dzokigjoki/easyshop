@extends('clients.skin-care.layouts.default')
@section('content')


<section class="page-title text-center bg-light">
    <div class="container relative clearfix">
        <div class="title-holder">
            <div class="title-text">
                <h1 class="uppercase">Контакт</h1>
            </div>
        </div>
    </div>
</section>


<div class="content-wrapper pt-30 oh">

    <!-- Contact -->
    <section class="section-wrap contact pb-40">
        <div class="container">
            <div class="row">

                <div class="col-md-8 mb-40">
                    <form method="POST" action="{{route('kontakt-forma')}}">
                        {{ csrf_field() }}
                        <div class="contact-name">
                            <input required name="name" id="name" type="text" placeholder="Име и презиме*">
                        </div>
                        <div class="contact-email">
                            <input required name="email" id="email" type="email" placeholder="Е-пошта*">
                        </div>
                        <div class="contact-subject">
                            <input required name="phone" id="phone" type="text" placeholder="Телефон*">
                        </div>
                        <div class="contact-subject">
                            <input required name="subject" id="subject" type="text" placeholder="Наслов">
                        </div>

                        <textarea required name="comment" id="comment" placeholder="Порака*" rows="9"></textarea>
                        <button type="submit" class="btn btn-lg btn-submit" data-contact-message-send>Испрати</button>
                    </form>
                </div> <!-- end col -->

                <div class="col-md-3 col-md-offset-1 col-sm-5 mb-40">
                    <div class="contact-item">
                        <h6>Адреса</h6>
                        <address>Skin Care inc.<br>
                            Улица<br>
                            Населено место<br>
                            Број</address>
                    </div> <!-- end address -->

                    <div class="contact-item">
                        <h6>Информации</h6>
                        <ul>
                            <li>
                                <i class="fa fa-envelope"></i><a href="mailto:/">info@skin-care.com</a>
                            </li>
                            <li>
                                <i class="fa fa-phone"></i><span>+1 1234567</span>
                            </li>
                            <li>
                                <i class="fa fa-print"></i><span>+1 1234567</span>
                            </li>
                        </ul>
                    </div> <!-- end information -->

                    <div class="contact-item">
                        <h6>Работно време</h6>
                        <ul>
                            <li>Понеделник – Петок: 9:00 to 19:00</li>
                            <li>Сабота: 9:00 to 17:00</li>
                        </ul>
                    </div> <!-- end business hours -->
                </div>

            </div>
        </div>
    </section> <!-- end contact -->

    <!-- Google Map -->
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d94881.60884972954!2d21.354849726077056!3d41.99919653805154!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x135415a58c9aa2a5%3A0xb2ed88c260872020!2sSkopje!5e0!3m2!1sen!2smk!4v1605182981945!5m2!1sen!2smk" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
</div>
@stop
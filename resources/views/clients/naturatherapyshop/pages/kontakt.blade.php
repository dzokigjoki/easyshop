@extends('clients.naturatherapyshop.layouts.default')
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
<div class="content-wrapper oh">
    <section class="section-wrap contact pb-40">
        <div class="container">
            <div class="row">
                <div class="col-md-8 mb-40">
                    <form method="POST" action="{{route('kontakt-forma')}}">
                        {{ csrf_field() }}
                        <div class="contact-name">
                            <input name="name" id="name" type="text" placeholder="Име и презиме*">
                        </div>
                        <div class="contact-email">
                            <input name="email" id="email" type="email" placeholder="Е- пошта*">
                        </div>
                        <div class="contact-email">
                            <input name="phone" id="phone" type="text" placeholder="Телефон*">
                        </div>
                        <div class="contact-subject">
                            <input name="subject" id="subject" type="text" placeholder="Наслов">
                        </div>
                        <textarea name="comment" id="comment" placeholder="Порака" rows="4"></textarea>
                        <input type="hidden" name="naturakontakt" id="naturakontakt">
                        <input type="submit" class="btn btn-lg btn-dark btn-submit" value="Испрати">
                    </form>
                </div>
                <div class="col-md-3 col-md-offset-1 col-sm-5 mb-40">
                    <div class="contact-item">
                        <h6>Адреса</h6>
                        <address>
                            Бул.Партизански Oдреди бр.41<br>
                            Скопје, Македонија<br>
                        </address>
                    </div>
                    <div class="contact-item">
                        <h6>Информации</h6>
                        <ul>
                            <li>
                                <a href="mailto:contact@naturatherapy.mk"><i
                                        class="fa fa-envelope"></i>contact@naturatherapy.mk</a>
                            </li>
                            <li><a href="tel:0038970230720"><i class="fa fa-phone"></i> +389 70 230 720</a></li>
                            <li><a href="tel:0038970230459"><i class="fa fa-phone"></i> +389 70 230 459</a></li>
                        </ul>
                    </div>
                    <div class="contact-item">
                        <h6>Работни саати</h6>
                        <ul>
                            <li>Пон-пет: 08:00am - 08:00pm</li>
                            <li>Сабота: 10:00am - 06:00pm</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d206.4500894671678!2d21.414598207248915!3d42.00073486874206!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1354144593506527%3A0x1d88b97b316b7cf5!2z0J_QsNGA0YLQuNC30LDQvdGB0LrQsCA0MSwg0KHQutC-0L_RmNC1IDEwMDA!5e0!3m2!1smk!2smk!4v1620742327027!5m2!1smk!2smk"
        width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false"
        tabindex="0"></iframe>
</div>
@stop
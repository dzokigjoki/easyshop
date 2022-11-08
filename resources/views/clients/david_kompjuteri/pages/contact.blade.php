@extends('clients.david_kompjuteri.layouts.default')
@section('content')



    <section class="page-title text-center bg-light">
        <div class="container relative clearfix">
            <div class="title-holder">
                <div class="title-text">
                    <h1 class="uppercase">Контакт</h1>
                </div>

                <div class="pt-10">

                </div>
            </div>
        </div>
    </section>
    <div class="content-wrapper oh">

        <!-- Contact -->
        <section class="section-wrap contact pb-20 pt-40">
            <div class="container">
                <div class="row">

                    <div class="col-md-8 mb-40">
                        <form id="contact-form" method="POST" action="{{ route('kontakt-forma') }}">
                            {{ csrf_field() }}
                            <div class="contact-name">
                                <p><b>Име и презиме :</b></p>
                            </div>
                            <div class="contact-name">
                                <input name="name" id="name" type="text" placeholder="Вашето име и презиме*" required>
                            </div>
                            <div class="mail">
                                <p><b>E-пошта :</b></p>
                            </div>
                            <div class="contact-email">
                                <input required name="email" id="email" type="email" placeholder="вашата е-пошта*">
                            </div>
                            <div class="phone">
                                <p><b>Телефон :</b></p>
                            </div>
                            <div class="contact-subject">
                                <input required name="phone" id="phone" type="text" placeholder="Вашиот телефон*">
                            </div>
                            <div class="subject">
                                <p><b>Наслов :</b></p>
                            </div>
                            <div class="contact-subject">
                                <input required name="subject" id="subject" type="text" placeholder="Вашиот наслов">
                            </div>
                            <div class="comment">
                                <p><b>Коментар :</b></p>
                            </div>
                            <textarea name="message" id="message" placeholder="Вашата порака овде" rows="9"></textarea>
                            <input type="submit" class="btn btn-lg btn-dark btn-submit" value="Испрати">
                        </form>
                    </div> <!-- end col -->

                    <div class="col-md-3 col-md-offset-1 col-sm-5 mb-40">
                        <div class="contact-item">
                            <h6>Aдреса</h6>
                            <address>David Kompjuteri inc.<br>
                                <strong>Адреса:</strong> Бул.„Јане Сандански“ бр.72 - Скопје<br>
                                <strong>Град:</strong> Скопје<br>
                            </address>
                        </div> <!-- end address -->

                        <div class="contact-item">
                            <h6>Информации</h6>
                            <ul>
                                <li>
                                    <i class="fa fa-envelope"><a href="mailto:theme@support.com">
                                            direktor@david_kompjuteri.com</a></i>
                                </li>
                                <li>
                                    <i class="fa fa-envelope"><a href="mailto:theme@support.com">
                                            programi@david.com.mk</a></i>
                                </li>
                                <li>
                                    <i class="fa fa-envelope"><a href="mailto:theme@support.com"> info@david.com.mk</a></i>
                                </li>
                                <li>
                                    <i class="fa fa-envelope"><a href="mailto:theme@support.com">
                                            support@david.com.mk</a></i>
                                </li>
                                <li>
                                    <i class="fa fa-envelope"><a href="mailto:theme@support.com">
                                            fiskalni@david.com.mk</a></i>
                                </li>
                                <li>
                                    <i class="fa fa-envelope"><a href="mailto:theme@support.com">
                                            servis@david.com.mk</a></i>
                                </li>
                                <li>
                                    <i class="fa fa-envelope"><a href="mailto:theme@support.com"> priem@david.com.mk</a></i>
                                </li>
                                <li>
                                    <i class="fa fa-phone"><span>078/414-736</span></i>
                                </li>
                                <li>
                                    <i class="fa fa-print"><span> +389-(0)2-2450-372</span></i>
                                </li>
                            </ul>
                        </div> <!-- end information -->

                        <div class="contact-item">
                            <h6>Работно време</h6>
                            <ul>
                                <li>Пон - Пет од 09:00 до 17:00</li>
                                <li>Сабота: </li>
                                <li>Недела: </li>
                            </ul>
                        </div> <!-- end business hours -->
                    </div>

                </div>
            </div>
        </section> <!-- end contact -->

        <!-- Google Map -->
        <div id="google-map" class="gmap" data-address="V Tytana St, Manila, Philippines">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2965.7621429893916!2d21.46209965114485!3d41.98391636666233!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x135415f2965555c7%3A0x525427768d69de2d!2zNzLQsdGD0LssINCR0YPQu9C10LLQsNGAINCI0LDQvdC1INCh0LDQvdC00LDQvdGB0LrQuCA3Miwg0KHQutC-0L_RmNC1IDEwMDA!5e0!3m2!1smk!2smk!4v1632401106209!5m2!1smk!2smk"
                width=100% height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
    @stop

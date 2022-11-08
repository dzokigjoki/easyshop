@extends('clients.sofu.layouts.default')
@section('content')
<section class="page-banner">
    <h2 class="page-title">Контакт</h2>
</section>
<section id="main-container" class="main-container">
    <div class="section-contact-v1 container">
        <div class="row">
            <div class="contact">
                <div class="col-md-8 col-sm-8">
                    <div id="respond" class="comment-respond">
                        <h3 id="reply-title" class="comment-reply-title"> <small><a rel="nofollow" id="cancel-comment-reply-link" href="" style="display:none;">Cancel</a></small></h3>
                        <form action="/kontact" method="POST" id="commentform" class="comment-form">
                            {{csrf_field()}}
                            <h4>Напишете ни</h4>
                            <div class="row">
                                <div class="col-md-12 col-sm-12"><input type="text" name="name" placeholder="Вашето име и презиме" required></div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-6"><input type="number" required name="phone" placeholder="Вашиот телефон"></div>
                                <div class="col-md-6  col-sm-6"><input type="text" name="email" id="email" class="input-form" required pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}" placeholder="Вашиот е- маил"></div>
                            </div>
                            <div class="message-comment"><textarea name="message" required placeholder="Вашата порака..." rows="5" class="textarea-form"></textarea></div>
                            <p class="form-submit"><input name="submit" type="submit" id="submit" class="submit" value="Испрати"> <input type="hidden" name="comment_post_ID" value="149" id="comment_post_ID">
                                <input type="hidden" name="comment_parent" id="comment_parent" value="0">
                            </p>
                        </form>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4">
                    <div class="contact-info">
                        <div class="contact-adress">
                            <h4>Контакт информации</h4>
                            <div class="ts-adress">
                                <address>
                                    <p>
                                        Ул.9 бб. н.Илинден Скопје
                                        Скопје Р.С.Македонија<br>
                                        Мобилен телефон: 070 219 226 <br>
                                        Фиксен телефон: 02 2 571 033 <br>
                                        Е - пошта: <a href="mailto:info@sofu.mk">info@sofu.mk</a>
                                    </p>
                                </address>
                            </div>
                        </div>
                        <div class="groud-share">
                            <h4>Социјални мрежи</h4>
                            <ul class="social-share">
                                <li>
                                    <a class="style1" href="https://www.facebook.com/Sofu-102385948343984/" target="_blank">
                                        <i class="fa fa-facebook social"></i>
                                    </a>
                                </li>
                                <li>
                                    <a class="style2" href="https://www.linkedin.com/company/sofu-mk" target="_blank">
                                        <i class="fa fa-instagram social"></i>
                                    </a>
                                </li>
                                <li>
                                    <a class="style2" href="https://www.instagram.com/SOFU.MK/" target="_blank">
                                        <i class="fa fa-linkedin"></i>
                                    </a>
                                </li>

                            </ul>
                        </div>
                        <div class="contact-time">
                            <h4>Работно време</h4>
                            <div class="ts-time">
                                <p>Понеделник до петок : 09:00 до 16:00
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section-contact-v2">
        <div class="contact-maps">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2965.406715338563!2d21.578387614818855!3d41.99154616628725!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x135438cfc4e36269%3A0xc4e1990df81a5ffe!2sPilana%20Tri%20Mil-R!5e0!3m2!1sen!2smk!4v1606131263713!5m2!1sen!2smk" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>    </div>
    </div>
    <!--<section id="map" class="map contact-map">
            <div id="map-canvas"> </div>
            </section>-->
</section>
@stop
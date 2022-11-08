@extends('clients.dobra_voda.layouts.default')
@section('content')
<!-- Quicky's Breadcrumb Area End Here -->

<!-- Begin Contact Main Page Area -->
<div class="contact-main-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="contact-page-side-content">
                    <h3 class="contact-page-title">Контактирајте не</h3>
                    <p class="contact-page-message">Доколку имате било какви прашања,
                        Ве молиме внесете ги овде вашите контакт информации заедно со вашето прашање</p>
                    <div class="single-contact-block">
                        <h4><i class="fa fa-fax"></i> Адреса</h4>
                        <p>ул.1732 бр.2, Скопје</p>
                    </div>
                    <div class="single-contact-block">
                        <h4><i class="fa fa-phone"></i> Телефонски број</h4>
                        <p>02 3228 458</p>
                    </div>
                    <div class="single-contact-block last-child">
                        <h4><i class="fa fa-envelope"></i> Е-Пошта</h4>
                        <p>eprodavnica@magroni.com.mk</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="contact-form-content">
                    <h3 class="contact-page-title">Напишете ни порака</h3>
                    <div class="contact-form">
                        <form id="contact-form" action="{{route('kontakt-forma')}}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label>Вашето име <span class="required">*</span></label>
                                <input type="text" name="name" id="name" required>
                            </div>
                            <div class="form-group">
                                <label>Вашата е-пошта <span class="required">*</span></label>
                                <input type="email" name="email" id="email" required>
                            </div>
                            <div class="form-group">
                                <label>Наслов</label>
                                <input type="text" name="subject" id="subject">
                            </div>
                            <div class="form-group form-group-2">
                                <label>Вашата порака</label>
                                <textarea name="message" id="message"></textarea>
                            </div>
                            <label class="privacy" required> <input style="-webkit-appearance: checkbox" type="checkbox">
                                Со пристапот на интернет страницата, потврдувате дека сте ги прочитале, разбрале и
                                дека се согласувате со условите на <a href="/politika-za-privatnost">Политиката за приватност</a>.

                                <span class="checkmark"></span>
                            </label>
                            <div class="form-group mb-0">
                                <button type="submit" value="submit" id="submit" class="contact-form_btn" name="submit">Испрати</button>
                            </div>
                        </form>
                    </div>
                    <p class="form-messege mb-0"></p>
                </div>
            </div>
        </div>
    </div>
    <div class="google-map_area ptb-100">
        <div class="container-fluid">
            <div id="google-map"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d19946.286190777064!2d21.42024151922185!3d41.99956341613007!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1354155ff5aae5ef%3A0xa1f48571384d39a7!2zTWFncm9uaSBET08gU2tvcGplINCc0LDQs9GA0L7QvdC4INCU0J7QniDQodC60L7Qv9GY0LU!5e0!3m2!1sen!2smk!4v1595251992119!5m2!1sen!2smk" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe></div>
        </div>
    </div>
</div>
@stop
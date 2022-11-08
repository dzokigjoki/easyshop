@extends('clients.peletcentar.layouts.default')
@section('content')

<div id="content" class="row-contact">
    <div class="container content-wrapper contact-page-wrapper">
        <div class="col-md-12">
            <div class="col-md-6 contact-form-wrapper">
                <p class="success-message">{{session('success')}}</p>
                <h3>Контактирајте не</h3>
                <br>
                <form action="/contact" method="post">
                    <label for="Name">Име: </label>
                    <input type="text" class="form-control" id="name" name="name" required>
                    <label for="Name">Е-маил: </label>
                    <input type="email" class="form-control" id="email" name="email" required>
                    <label for="message">Порака: </label>
                    <textarea type="text" class="luna-message" id="message" name="message" required></textarea>
                    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                    <button type="submit" class="send-btn" value="Send">Испрати</button>
                </form>
            </div>
            <div class="col-md-6">
                <ul class="flat-contact-info">
                    <li class="address">
                        <em class="fa fa-home"></em>&nbsp;ПОДРУЖНИЦА И ДЕЛОВЕН ОБЈЕКТ (магацини, изложбен салон и канцеларии) ПЕЛЕТ ЦЕНТАР СКОПЈЕ<br>
                        ул. 1409 бр.35, Ѓорче Петров (Индус. зона Лепенец) <br>
                        1000 Скопје, Карпош
                    </li>
                    <strong>Седиште, адреса за поштенска коресподенција и полн назив на компанијата:</strong> <br>
                    <li>ДПТУ ВиБ трејдинг груп ДОО увоз-извоз<br>
                        ул. Драгутин Аврамовски Гуте бр.22<br><br>
                        <strong>ЕДБ МК:</strong> 4057012519520<br>
                        <strong>ЕМБС:</strong> 6830862<br>
                        <strong>ПРО КРЕДИТ БАНКА: </strong>380177348800175</li>
                        <strong>ШПАРКАСЕ БАНКА: </strong>250025000200827</li>

                    <li class="time">
                        <img src="{{url_assets('/peletcentar/img/clock.png')}}"> Понеделник - Петок 09 -
                        17ч.<br>
                        <img src="{{url_assets('/peletcentar/img/clock.png')}}"> Сабота 09 - 14ч.
                    </li>
                    <li class="phone">
                        <em class="fa fa-phone"></em> <a href="tel:+38978333383">078 333 383</a><br>
                        <em class="fa fa-phone"></em> <a href="tel:+38972230120">072 230 120</a><br>
                        <em class="fa fa-phone"></em> <a href="tel:+3892 55 11 300">02 55 11 300</a><br>
                    </li>
                    <li class="email">
                        <em class="fa fa-envelope"></em> <a
                            href="email:info@peletcentar.mk">info@peletcentar.mk</a><em></em></li>
                </ul>
            </div>
            <div class="col-md-12">
                <br>
                <br>
                <div>
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2964.26868802764!2d21.36683571544545!3d42.01596807921153!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x13541384dbe24cbb%3A0xf35141aebe898135!2sPelet+Centar!5e0!3m2!1sen!2smk!4v1524732118618"
                        width="100%" height="440" frameborder="0" allowfullscreen="" scrolling="no" marginheight="0"
                        marginwidth="0"></iframe>
                </div>
            </div>
        </div>
    </div>
    <p> <br> </p>
    <p> </p>
    <p> <br> <br></p>
</div>

@endsection
@extends('clients.barbakan.layouts.default')
@section('content')
<!-- Page Title -->
<div class="page-title bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-4">
                <h1 class="mb-0">Контакт</h1>
                <h4 class="text-muted mb-0">Нашите контакт информации</h4>
            </div>
        </div>
    </div>
</div>

<!-- Section -->
<section class="section">

    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-4 offset-lg-1 col-md-6 mb-5 mb-md-0">
                <img src="assets/img/logo-horizontal-dark.svg" alt="" class="mb-5" width="130">
                <h4 class="mb-0">Бистро Барбакан</h4>
                <span class="text-muted">Булевар 8. Септември, 18 1000 Скопје</span>
                <hr class="hr-md">
                <div class="row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <h6 class="mb-1 text-muted">Телефон:</h6>
                        02 307 5093
                    </div>
                    <div class="col-sm-6">
                        <h6 class="mb-1 text-muted">Е-пошта:</h6>
                        <p>barbakanskopje@gmail.com</p>
                    </div>

                    <div class="col-sm-12">
                        <h6 class="mb-1 text-muted">Работни саати:</h6>
                        Пон-Пет: 08:30 - 23:45 <br>
                        Викенд: 08:30 - 23:45
                    </div>
                </div>
                <hr class="hr-md">
                <h6 class="mb-3 text-muted">Следете не!</h6>
                <a href="https://www.facebook.com/BarbakanBistroBar/" class="icon icon-social icon-circle icon-sm icon-facebook"><i class="fa fa-facebook"></i></a>
                <a href="https://www.instagram.com/bistro_bar_barbakan/" class="icon icon-social icon-circle icon-sm icon-instagram"><i class="fa fa-instagram"></i></a>
            </div>
            <div class="col-lg-5 offset-lg-2 col-md-6">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d94881.60884996863!2d21.354849858219996!3d41.999196537891194!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x135415a58c9aa2a5%3A0xb2ed88c260872020!2sSkopje!5e0!3m2!1sen!2smk!4v1616060124059!5m2!1sen!2smk" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </div>

</section>

@stop
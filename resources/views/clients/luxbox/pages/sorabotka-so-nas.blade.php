@extends('clients.luxbox.layouts.default')
@section('content')
<style>
    .contact-details {
        margin-left: 0px !important;
    }
</style>
<div class="page-content">
    <section class="contact-section section-box">
        <div class="container">
            <div class="contact-content">
                <div class="row">
                    <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-12">
                        <div class="contact-details">
                            <h3 class="text-left special-heading">Контактирајте не</h3>
                        </div>
                        <div class="quote-form">
                            <form class="form-contact js-contact-form" method="POST" action="{{ route('kontakt-forma') }}" enctype='multipart/form-data'>
                                {{ csrf_field() }}
                                <div class="form-input">
                                    <input type="text" name="name" placeholder="Вашето име" required>
                                </div>
                                <div class="form-input">
                                    <input type="email" required pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}" name="email" placeholder="Вашиот е- маил">
                                </div>
                                <div class="form-input">
                                    <input type="phone" required name="phone" placeholder="Вашиот телефон">
                                </div>
                                <div class="form-textarea">
                                    <textarea name="message" required placeholder="Вашата порака..."></textarea>
                                </div>
                                <div class="form-bottom">
                                    <input type="submit" class="end-quote-1" name="quote" value="Испрати">
                                    <span><i class="zmdi zmdi-arrow-right"></i></span>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                        <div class="contact-details">
                            <h2 class="special-heading">Детали</h2>
                            <div class="contact-info">
                                <div class="contact-inner">
                                    
                                    <p class="center"><i class="zmdi zmdi-email"></i> luxboxmk@gmail.com</p>
                                    <p><a href="tel:+38971384943"><i class="zmdi zmdi-phone"></i> (+389) 71 384 943</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
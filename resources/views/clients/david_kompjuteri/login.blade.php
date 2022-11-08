@extends('clients.david_kompjuteri.layouts.default')
@section('content')


<style>
    ul{
        list-style-type: disc;
        padding-left: 17px;
    }
</style>
<section class="page-title text-center bg-light">
    <div class="container relative clearfix">
        <div class="title-holder">
            <div class="title-text">
                <h1 class="uppercase">Најава</h1>
                
            </div>
        </div>
    </div>
</section>

<div class="content-wrapper pt-30 oh">
    <section class="pt-40 contact">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-xxs-12 col-sm-offset-2 mb-20">
                    <form method="POST" action="{{route('auth.login.post')}}">
                        {{csrf_field()}}
                        @include('clients.'.config( 'app.client').'.partials.errors')
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="contact-name">
                                    <input name="email" id="email" type="email" placeholder="Е- пошта*">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="contact-name">
                                    <input name="password" id="password" type="password" placeholder="Лозинка*">
                                </div>
                            </div>
                        </div>
                       
                        <div class="row pt-10">
                            <div class="col-sm-12">
                                <input type="submit"   class="btn btn-lg btn-dark btn-submit" value="Најава" id="register">
                            </div>
                        </div>
                         <div class="row pt-20">
                             <div class="col-sm-12">
                            <a style="color: red;" href="{{ route('auth.email_password.get') }}">Заборавена лозинка?</a>
                        </div>
                        </div>
                        <div class="row pt-10">
                            <div class="col-sm-12">
                                <p class="lost_password"> Нов корисник? <a href="/register" id="register"><strong>Регистрирај се</strong></a> </p>
                            </div>
                        </div>
                        
                    </form>
                </div> <!-- end col -->
      <!--       <div class="row">
                    <div class="col-xs-6 col-xxs-12 already_registered">
                        <h4 class="mb-10">Нов корисник?</h4>
                        <p class="mb-10">Регистирајте се за да бидете во тек со сите настани на Давид Компјутери</p>
                        <ul>
                            <li> Добивате можност за правење нарачки </li>
                            <li>Ќе имате преглед на претходно направените нарачки</li>
                            <li>Побрз шопинг</li>
                        </ul>
                        <form class="pt-20" action="{{route('auth.register.get')}}">
                            <input type="submit" class="btn btn-lg btn-dark btn-submit" value="Регистрација" id="register">
                        </form>
    
                    </div> 
                </div> -->

                
            </div>
        </div>
    </section> <!-- end contact -->
</div>
@stop
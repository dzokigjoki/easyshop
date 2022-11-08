@extends('clients.david_kompjuteri.layouts.default')
@section('content')



    <section class="page-title text-center bg-light">
        <div class="container relative clearfix">
            <div class="title-holder">
                <div class="title-text">
                    <h1 class="uppercase">Вработување</h1>
                </div>

                <div class="pt-10">

                </div>
            </div>
        </div>
    </section>



    <body class="relative">

        <div class="content-wrapper oh container">

            <!-- Contact -->
            <section class="section-wrap contact pb-0 pt-40">
                <div class="container">
                    <div class="row">

                        <div class="col-md-8 mb-40">
                            <form id="contact-form" method="POST" action="{{route('kontakt-forma')}}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="contact-name">
                                    <p> <b>Име и презиме :</b></p>
                                </div>
                                <div class="contact-name">
                                    <input name="name" id="name" type="text" placeholder="Внесете го вашето име и презиме*">
                                </div>
                                <div class="mail">
                                    <p><b>E-пошта :</b></p>
                                </div>
                                <div class="contact-email">
                                    <input name="email" id="email" type="email" placeholder="внесете ја вашата е-пошта*">
                                </div>
                                <div class="phone">
                                    <p><b>Телефон :</b></p>
                                </div>
                                <div class="contact-subject">
                                    <input required name="phone" id="phone" type="text"
                                        placeholder="Внесете го вашиот телефон*">
                                </div>
                                <div class="subject">
                                    <p><b>Наслов :</b></p>
                                </div>
                                <div class="contact-subject">
                                    <input name="subject" id="subject" type="text" placeholder="Внесете го вашиот наслов">
                                </div>
                                <div class="comment">
                                    <p><b>Коментар :</b></p>
                                </div>
                                <textarea name="message" id="message" placeholder="Внесете коментар" rows="9"></textarea>

                                <div class="row">
                                    <div class="col-xs-12">
                                        <p>Внесете го вашето CV :</p>
                                    </div>

                                    <div class="col-xs-12">
                                        <input type="file" name="cv" class="file-cv pb-20">
                                    </div>
                                    <div class="col-xs-12">
                                        <input type="submit" class="btn btn-lg btn-dark btn-submit" value="Испрати">
                                    </div>
                                </div>

                                <div id="msg" class="message"></div>
                            </form>
                        </div> <!-- end col -->
                        <div class="col-md-4">
                            <h3>Вработи се</h3>
                            <p>
                                Сакате да станете дел од Давид Компјутери тимот? Ние ви нудиме можност да аплицирате и
                                да
                                одберете работна позиција за која имате соодветни квалификации и способности.
                            </p>
                            <p>Се што треба да направите е да ги внесете вашите контакт информации и вашето CV,а ние ќе
                                ве контактираме во најбрзо можно време.</p>
                        </div>




                    </div>
                </div>
            </section> <!-- end contact -->







            <div id="back-to-top">
                <a href="#top"><i class="fa fa-angle-up"></i></a>
            </div>

        </div> <!-- end content wrapper -->


        <!-- jQuery Scripts -->
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="http://maps.google.com/maps/api/js"></script>
        <script type="text/javascript" src="js/gmap3.js"></script>
        <script type="text/javascript" src="js/plugins.js"></script>
        <script type="text/javascript" src="js/scripts.js"></script>



    </body>

@stop

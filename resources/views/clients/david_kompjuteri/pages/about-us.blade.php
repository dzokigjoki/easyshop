 @extends('clients.david_kompjuteri.layouts.default')
 @section('content')


     <section class="page-title text-center bg-light">
         <div class="container relative clearfix">
             <div class="title-holder">
                 <div class="title-text">
                     <h1 class="uppercase">За нас</h1>
                 </div>

                 <div class="pt-10">

                 </div>
             </div>
         </div>
     </section>



     <div class="content-wrapper oh container">

         <!-- Intro -->
         <section class="section-wrap intro pb-0">
             <div class="container">
                 <div class="row">
                     <div class="row">
                         <div class="col-lg-6 mb-50">
                             <h2 class="intro-heading text-center">Историја</h2>
                             <hr>
                             <p class="about-us-descr">ДАВИД Компјутери е реномирана компанија со традиција која е формирана
                                 во 1997
                                 година. Се наоѓа на булевар „Јане Сандански“ бр.72 во Скопје. Се занимава со
                                 изработка и продажба на софтвер, фискални каси и фискални принтери, продажба на
                                 хардверски компоненти а притоа нуди и целосна поддршка и одржување на истите. За
                                 тоа е задолжен стручен и добро обучен кадар кој ви стои на располагање како во
                                 Скопје така и низ целата држава.
                                 Од своето основање па се до денес, ДАВИД Компјутери континуирано работи на
                                 подобрување и проширување на продажниот асортиман на производите кои ги нуди и
                                 секако постојано усовршување на услугата кон своите купувачи и партнери, бидејќи
                                 задоволните купувачи се нашиот највисок приоритет.
                             </p>
                         </div>
                         <div class="col-lg-6 mb-50">
                             <h2 class="intro-heading text-center">Нашата мисија</h2>
                             <hr>
                             <p class="about-us-descr">Наша цел е да бидеме препознатлив фактор на пазарот, нудејќи голем
                                 асортиман на
                                 производи од најдобрите производители, воедно понудувајќи и пристапни производи за
                                 секој корисник, ставајќи посебен акцент на квалитетот на производот. Сметаме дека
                                 со постојана, комплетна и трпелива работа, како и целосно отворена соработка, ќе
                                 успееме да бидеме препознаени од страна на ИТ компаниите во регионот.</p>
                         </div>
                         
                     </div>
                     <div class="row">
                         <div class="col-md-12">
                            <h2 class="intro-heading text-center">Листа на услуги</h2>
                            <hr>
                            <div class="emptyn pb-20"></div>
                         </div>
                     </div>
                     <div class="row">
                         <div class="col-lg-6 mb-50">
                             <h2 class="intro-heading text-center">Фискални каси со GPRS</h2>
                             <hr>
                             <p class="about-us-descr">Тука ќе ги најдете најновите фискални каси и фискални принтери со
                                 вграден GPRS, SIM
                                 Card, SD Card, Krypto Module, како мобилни каси и поврзување преку безжична
                                 (bluetooth) врска. За сите фискални каси е обезбеден сервис низ големиот број на
                                 сервисни центри низ Република Македонија, како и гаранција за секој нов купен
                                 фискален апарат – фискални каси и фискални принтери.</p>
                         </div>
                         <div class="col-lg-6 mb-50">
                             <h2 class="intro-heading text-center">Софтверски решенија</h2>
                             <hr>
                             <p class="about-us-descr">Имаме голем број на софтверски решенија, за материјално работење и
                                 финансиско
                                 книговодство, пресметка на плати, работа со хотели, центри за услуги (спа центри,
                                 козметички салони, и друго), ресторантско работење, евидентирање на телефонски
                                 разговори и друго. Исто така изработуваме софтвер за ваши потреби, а нудиме и
                                 можности за подршка на истите. Софтверот е поддржан од ПИКСЕЛ Системи, која е
                                 партнер компанија на ДАВИД Компјутери.</p>
                         </div>
                     </div>

                     <!-- <div class="col-sm-3 col-sm-offset-1">
                                                                                                                      <span class="result">10</span>
                                                                                                                      <p>Years on Global Market.</p>
                                                                                                                      <span class="result">45</span>
                                                                                                                      <p>Partners are Working With Us.</p>
                                                                                                                     </div> -->
                 </div>

             </div>
         </section> <!-- end intro -->

         <!-- Our Team -->
         <section class="section-wrap  our-team pb-0 pt-10">
             <div class="container">
                 <div class="row heading-row">
                     <div class="col-md-12 text-center">
                         <!-- <span class="subheading">Who We Are</span> -->
                         <h2 class="heading bottom-line pb-20">
                             Локација
                         </h2>
                     </div>
                     <div class="row">
                        <div class="col-xs-12">
                            <div class="owl-carousel owl-theme owl-dark-dots text-center"></div>
                            <div id="locations-slider">
                                <a target="_blank" href="{{ url_assets('/david_kompjuteri/img/doma1.jpg') }}">
                                    <img src="{{ url_assets('/david_kompjuteri/img/doma1.jpg') }}" alt="">
                                </a>
                                <a target="_blank" href="{{ url_assets('/david_kompjuteri/img/doma2.jpg') }}">
                                    <img src="{{ url_assets('/david_kompjuteri/img/doma2.jpg') }}" alt="">
                                </a>
                                <a target="_blank" href="{{ url_assets('/david_kompjuteri/img/doma3.jpg') }}">
                                    <img src="{{ url_assets('/david_kompjuteri/img/doma3.jpg') }}" alt="">
                                </a>
                                <a target="_blank" href="{{ url_assets('/david_kompjuteri/img/doma4.jpg') }}">
                                    <img src="{{ url_assets('/david_kompjuteri/img/doma4.jpg') }}" alt="">
                                </a>
                                <a target="_blank" href="{{ url_assets('/david_kompjuteri/img/doma5.jpg') }}">
                                    <img src="{{ url_assets('/david_kompjuteri/img/doma5.jpg') }}" alt="">
                                </a>
                                <a target="_blank" href="{{ url_assets('/david_kompjuteri/img/doma6.jpg') }}">
                                    <img src="{{ url_assets('/david_kompjuteri/img/doma6.jpg') }}" alt="">
                                </a>
                            </div>
                        </div>
   
   
                    </div>
                 </div>
                 
                 <div class="row">
                    <div class="col-md-12 text-center pb-20">
                        <div class="title-characteristics">
                            <h3>Дирекција</h3>
                        </div>
                        <p>Булевар Јане Сандански бр. 72 – Скопје</p>
                        <p>тел/факс: +389 2 2450-372</p>
                        <p>моб: 078/414-736 и 078-414-731</p>
                        <p>е-пошта: servis@david.com.mk</p>
                    </div>
                 </div>
                 <div class="row">
                    <div class="col-md-12">
                        <h2 class="heading bottom-line text-center pb-40">
                            Сервисни центри
                        </h2>
                     </div>
                 </div>
                 <div class="row">
                    <div class="panel-group" id="accordion">
                        <div class="panel panel-default">
                          <div class="panel-heading">
                            <h4 class="panel-title">
                              <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                <span class="glyphicon glyphicon-menu-right text-success"></span> Битола, Демир Хисар, Ресен          
                              </a>
                            </h4>
                          </div>
                          <div id="collapseOne" class="panel-collapse collapse in">
                            <div class="panel-body">Адреса: бул.1-ви Мај 152</div>
                            <div class="panel-body">тел: <a href="tel:+38978414721">078/414-721</a></div>
                            <div class="panel-body">email: bitola@david.com.mk</div>
                          </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                              <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseEleven">
                                  <span class="glyphicon glyphicon-menu-right text-info"></span> Куманово, Крива Паланка, Кратово            
                                </a>
                              </h4>
                            </div>
                            <div id="collapseEleven" class="panel-collapse collapse">
                              <div class="panel-body">Адреса: /</div>
                              <div class="panel-body">тел: <a href="tel:+389414734">078/414-734</a></div>
                              <div class="panel-body">email: /</div>
                            </div>
                          </div>
                        <div class="panel panel-default">
                          <div class="panel-heading">
                            <h4 class="panel-title">
                              <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                <span class="glyphicon glyphicon-menu-right text-info"></span> Тетово            
                              </a>
                            </h4>
                          </div>
                          <div id="collapseTwo" class="panel-collapse collapse">
                            <div class="panel-body">Адреса: Зелен Пазар лок.72</div>
                            <div class="panel-body">тел: <a href="tel:+38978353337">078/353-337</a></div>
                            <div class="panel-body">email: tetovo@david.com.mk</div>
                          </div>
                        </div>
                        <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                                <span class="glyphicon glyphicon-menu-right text-info"></span> Кочани, Виница, Делчево          
                            </a>
                            </h4>
                        </div>
                        <div id="collapseThree" class="panel-collapse collapse">
                            <div class="panel-body">Адреса: Кеј на Револуцијата 29</div>
                            <div class="panel-body">тел: <a href="tel:+38978414730">078/414-730</a></div>
                            <div class="panel-body">email: kocani@david.com.mk</div>
                        </div>
                        </div>
                        <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
                                <span class="glyphicon glyphicon-menu-right text-info"></span> Прилеп, Крушево, МАК. Брод     
                            </a>
                            </h4>
                        </div>
                        <div id="collapseFour" class="panel-collapse collapse">
                            <div class="panel-body">Адреса: Мице Козар 5</div>
                            <div class="panel-body">тел: <a href="tel:+38978414713">078/414-713</a></div>
                            <div class="panel-body">email: prilep@david.com.mk</div>
                        </div>
                        </div>
                        <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseFive">
                                <span class="glyphicon glyphicon-menu-right text-info"></span> Охрид, Струга            
                            </a>
                            </h4>
                        </div>
                        <div id="collapseFive" class="panel-collapse collapse">
                            <div class="panel-body">Адреса: 1 ва Македонска ударна бригада
                                бр.38А</div>
                            <div class="panel-body">тел: <a href="tel:+38978414740">078/414-740</a></div>
                            <div class="panel-body">email: struga@david.com.mk</div>
                        </div>
                        </div>
                        <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseSix">
                                <span class="glyphicon glyphicon-menu-right text-info"></span> Струмица, Валандово, Берово, Гевгелија            
                            </a>
                            </h4>
                        </div>
                        <div id="collapseSix" class="panel-collapse collapse">
                            <div class="panel-body">Адреса:Маршал Тито 34</div>
                            <div class="panel-body">тел: <a href="tel:+38970335531">070/335-531</a></div>
                            <div class="panel-body">enail: strumica@david.com.mk</div>
                        </div>
                        </div>
                        <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseSeven">
                                <span class="glyphicon glyphicon-menu-right text-info"></span> Гостивар, Дебар, Кичево       
                            </a>
                            </h4>
                        </div>
                        <div id="collapseSeven" class="panel-collapse collapse">
                            <div class="panel-body">Адреса: Кочо Зози бр.5</div>
                            <div class="panel-body">тел: <a href="tel:+38970251578">070/251-578</a></div>
                            <div class="panel-body">email: gostivar@david.com.mk</div>
                        </div>
                        </div>
                        <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseEight">
                                <span class="glyphicon glyphicon-menu-right text-info"></span> Кавадарци, Неготино, Демир Капија           
                            </a>
                            </h4>
                        </div>
                        <div id="collapseEight" class="panel-collapse collapse">
                            <div class="panel-body">Адреса: ул.Никола Минчев бр.1</div>
                            <div class="panel-body">тел: <a href="tel:+38976422208">076/422-208</a></div>
                            <div class="panel-body">email: kavadarci@david.com.mk</div>
                        </div>
                        </div>
                        <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseNine">
                                <span class="glyphicon glyphicon-menu-right text-info"></span> Штип, Пробиштип, Св.Николе          
                            </a>
                            </h4>
                        </div>
                        <div id="collapseNine" class="panel-collapse collapse">
                            <div class="panel-body">Адреса Ул.Христијан Карпош бр.45 лок.2</div>
                            <div class="panel-body">тел: <a href="tel:+38978353275">078/353-275</a></div>
                            <div class="panel-body">email: stip@david.com.mk</div>
                        </div>
                        </div>
                        <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseTen">
                                <span class="glyphicon glyphicon-menu-right text-info"></span> Велес, Градско            
                            </a>
                            </h4>
                        </div>
                        <div id="collapseTen" class="panel-collapse collapse">
                            <div class="panel-body">Адреса: ул.11 Октомври 1/1</div>
                            <div class="panel-body">тел: <a href="tel:+38978414751">078/414-751</a></div>
                            <div class="panel-body">email: david@david.com.mk</div>
                        </div>
                        </div>
                 </div>

                 <div class="row heading-row">
                     <div class="col-md-12 text-center">
                         <!-- <span class="subheading">Who We Are</span> -->
                         <h2 class="heading bottom-line">
                             Сертификати
                         </h2>
                     </div>
                 </div>
                 <div class="row">
                     <div class="col-xs-12">
                         <div class="owl-carousel owl-theme owl-dark-dots text-center"></div>
                         <div id="certificates-slider">
                             <a target="_blank" href="{{ url_assets('/david_kompjuteri/img/sertifikat1.jpg') }}">
                                 <img src="{{ url_assets('/david_kompjuteri/img/sertifikat1.jpg') }}" alt="">
                             </a>
                             <a target="_blank" href="{{ url_assets('/david_kompjuteri/img/sertifikat2.jpg') }}">
                                 <img src="{{ url_assets('/david_kompjuteri/img/sertifikat2.jpg') }}" alt="">
                             </a>
                             <a target="_blank" href="{{ url_assets('/david_kompjuteri/img/sertifikat3.jpg') }}">
                                 <img src="{{ url_assets('/david_kompjuteri/img/sertifikat3.jpg') }}" alt="">
                             </a>
                             <a target="_blank" href="{{ url_assets('/david_kompjuteri/img/sertifikat4.jpg') }}">
                                 <img src="{{ url_assets('/david_kompjuteri/img/sertifikat4.jpg') }}" alt="">
                             </a>
                             <a target="_blank" href="{{ url_assets('/david_kompjuteri/img/sertifikat5.jpg') }}">
                                 <img src="{{ url_assets('/david_kompjuteri/img/sertifikat5.jpg') }}" alt="">
                             </a>
                         </div>
                     </div>


                 </div>
             </div>

         </section> <!-- end our team -->

         <!-- Promo Section -->

         <!-- Testimonials -->
         <section class="section-wrap testimonials">
             <div class="container">

                 <div class="row heading-row mb-20">
                     <div class="col-md-6 col-md-offset-3 text-center">
                         <h2 class="heading bottom-line">Среќни Клиенти</h2>
                     </div>
                 </div>

                 <div id="owl-testimonials" class="owl-carousel owl-theme owl-dark-dots text-center">

                     <div class="item">
                         <div class="testimonial">
                             <h3 class="testimonial-title pb-1"><small>Навистина сум фасцинирана!<small></h3>
                             <p class="testimonial-text">Работам со Давид веќе 8 години и навистина сум им благодарна за
                                 целата професионална поддршка и исклучиво лубезен и професионален однос од страна на
                                 вработените.</p>
                             <span>Ирина Ристовска</span>
                         </div>
                     </div>

                     <div class="item">
                         <div class="testimonial">
                             <h3 class="testimonial-title pb-1"><small>Фискални каси на кои им верувам</small></h3>
                             <p class="testimonial-text">5 години како ги користам нивните фискални уреди. Целиот период
                                 фискалните работат без никакви проблеми. Кога отворам нова продавница не размислувам за
                                 изборот- а тоа е Давид Компјутери.</p>
                             <span>Михаил Тимовски</span>
                         </div>
                     </div>


                 </div>
             </div>

         </section>
         <!--end testimonials -->








         <div id="back-to-top">
             <a href="#top"><i class="fa fa-angle-up"></i></a>
         </div>

     </div> <!-- end content wrapper -->


     <!-- jQuery Scripts -->
     <script type="text/javascript" src="js/jquery.min.js"></script>
     <script type="text/javascript" src="js/bootstrap.min.js"></script>
     <script type="text/javascript" src="js/plugins.js"></script>
     <script type="text/javascript" src="js/scripts.js"></script>




 @stop

@extends('clients.sofu.layouts.default')
@section('content')
<section class="page-banner">
    <h2 class="page-title">За нас</h2>
</section>
<section id="main-container" class="main-container">
    <div class="section-iconboxes-firts container">
        <div class="row">
            <div class="col-sm-12 col-60">
                <div class="nr_wrapper_about">
                    <h4>Креираме безвременси парчиња мебел кои ги исполнуваат желбите на секој клиент</h4>
                </div>
            </div>
        </div>
        <div class="text_about">
            <span class="text_about_text">Sofu е бренд основан во 2020 година како резултат на три генерациско несебично споделување идеи, креативност и искуство во работа со дрво и изработка на мебел од масивно дрво.
                Традиција пренесена од татко на син и на внук прераснува во персонализиран бренд за мебел кој ги исполнува
                желбите на секој клиент поединечно, од 1962 година. Нашата мантра е да креираме безвременски “state of the art”
                парчиња мебел, кои се софистицирани и го исполнуваат секој простор со својот специфичен карактер.</span>
            <br class="text_about_br_hide">
            <span class="text_about_text">Произведени локално во Скопје, секое парче мебел е направено со исклучително внимание до најситен детаљ, влучувајќи се максимално во секој поединечен процес на изработка.
                Вештината на работа со дрво ни дозволува да креираме карактеристичен мебел, направен користејќи ги најквалитетните и најретките
                локални дрва, комбинирани со природни материјали како што се мермер, железо, бакар и месинг.</span>
            <br class="text_about_br_hide">
            <span class="text_about_text">Нашето исклучително искуство во дизајнирање на мебел ни дава за право да ги трансформираме артистичките идеи во
                модерен и функционален мебел. Искусниот тим на дизајнери со кои располагаме со право си дозволува да излезе од зоната на комфортот со цел
                да дизајнира автентичен мебел, во кој се вградени најдобрите материјали, преточени во врвен квалитет.</span>
        </div>


    </div>
    <div class="section-iconboxes-four pt_15">
        <div class="parallax parallax-v1 background-img-v4 parallax-light">
            <div class="overlay-about"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="text-overlay">Ако имаш идеја и замисла и сакаш да го дизајнираш својот производ
                            испрати ни цртеж или закажи состанок</h3>
                    </div>
                    <div class="col-md-12 text-left">
                        <a class="btn btn-overlay btn-lg" href="/dizajniraj">

                            <h5 class="banner_text_button">ДИЗАЈНИРАЈ СВОЈ ПРОИЗВОД</h5>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section-feature-2 blog_faq ">
        <div class="row row_showroom slider_showroom">
            <div class="col-sm-4 blur">
                <div class="ts-feature feature-icon wow fadeInUp" data-wow-delay="0.4s">
                    <div class="info-feature">
                        <span class="icon icon-basic-lightbulb"></span>
                        <a href="#">
                            <h4>ИНСПИРИРАЈ СЕ</h4>
                            <p>Погледни дел од нашите изработки...</p>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="ts-feature feature-icon wow fadeInUp" data-wow-delay="0.4s">
                    <div class="info-feature">
                        <span class="icon icon-basic-sheet-pen"></span>
                        <a href="/blog">
                            <h4>БЛОГ</h4>
                            <p>Дознај уште повеќе...</p>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 blur">
                <div class="ts-feature feature-icon wow fadeInUp" data-wow-delay="0.4s">
                    <figure class="dots"></figure>
                    <div class="info-feature">
                        <span class="icon icon-basic-question"></span>
                        <a href="/faq">
                            <h4>НАЈЧЕСТИ ПРАШАЊА</h4>
                            <p>Информирај се...</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@stop
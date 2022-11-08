@extends('clients.naturatherapyshop.layouts.default')
@section('content')
    <style>
        .testimonials .testimonial-text {
            font-size: 14px !important;
        }
        ul li{
            padding-bottom: 9px;
        }

    </style>
    <section class="page-title text-center bg-light">
        <div class="container relative clearfix">
            <div class="title-holder">
                <div class="title-text">
                    <h1 class="uppercase">За нас</h1>
                </div>
            </div>
        </div>
    </section>
    <div class="content-wrapper oh">
        <section class="section-wrap intro pb-0">
            <div class="container">
                <div class="row">
                    <div class="text-justify col-sm-6 mb-50">
                        <h3 class="intro-heading">Natura Therapy</h3>
                        <p> <strong>NATURA THERAPY</strong> е водечка компанија на пазарот која се занимава со развој,
                            производство и
                            продажба на висококвалитетни, иновативни природни додатоци на исхраната наменети за подобрување
                            и одржување на здравјето на човекот. Силно придонесуваме во развивање на колективната свест и
                            информираност на граѓаните за значењето и потребата од промени во животниот стил и употребата на
                            природни додатоци на исхраната, со цел обезбедување на максимален животен потенцијал за секој
                            поединец.</p>

                        <p>Компанијата завзема лидерска позиција на домашниот пазар во развојот и понуда на широка палета
                            нови, иновативни додатоци на исхраната, кои ги следат актуелните светски пазарни трендови,
                            современите научни сознанија и здравствените потреби и предизвици на нашите граѓани и луѓето во
                            целина.</p>

                        <p>Нашата пракса вклучува редовно анализирање на пазарот и потрошувачите, следење и примена на
                            најновите научни откритија во сегментот на медицина на животен стил, нутриционизмот,
                            фитотерапијата и функционалната храна, набавка на специфични суровини со исклучителен квалитет
                            од реномирани добавувачи од земјата и светот, со цел развој на софистицирани формули за
                            производство на додатоци на исхраната кои докажано помагаат во превенцијата и третманот на широк
                            спектар заболувања, односно одржување и подобрување на здравјето на потрошувачите.</p>

                        <p>Создадовме модерен производен погон, со современа опрема за производство на иновативни додатоци
                            на исхраната во форма на уникатни екстракти, капсули, таблети и функционални напитоци, додека
                            развиените производи се под постојана контрола од страна на релевантните национални институции
                            за стандардизација, безбедност и квалитет.</p>

                        <p><strong>NATURA THERAPY</strong> обединува тим на експерти со повеќегодишно професионално искуство
                            и релевантно образование во технологијата и производството, медицината и нутриционизмот, со
                            докажани менаџери во областа на управувањето, маркетингот и односите со јавноста, здружени и
                            силно посветени на мисијата на компанијата.</p>
                    </div>
                    <div style="margin-top: 90px;" class="col-sm-5 col-sm-offset-1">
                        <img src="{{ url_assets('/naturatherapyshop/img/za-nas.jpg') }}" alt="">
                    </div>
                </div>
            </div>
            <hr class="mb-0">
    </div>
    </section>
    <section style="padding: 0 !important" class="section-wrap">
        <div>
            <img src="{{ url_assets('/naturatherapyshop/img/about-header.jpg') }}" alt="">
        </div>
    </section>
    <section class="section-wrap pb-40 our-team">
        <div class="container">
            <div class="row heading-row">
                <div class="col-md-12 text-center">
                    <span class="subheading"></span>
                    <h3 class="heading bottom-line">
                        Нашиот Тим
                    </h3>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4 col-xs-6 col-xxs-12 mb-40">
                    <div class="team-wrap">
                        <div class="team-member">
                            <div class="team-img hover-trigger">
                                <img src="{{ url_assets('/naturatherapyshop/img/team/sasko-drvosanski.jpg') }}" alt="">
                            </div>
                            <div class="team-details text-center">
                                <h4 class="team-title">Сашко Дрвошански</h4>
                                <span>Нутриционист - Главен менаџер за грижа за корисници, едукација и развој на
                                    производи</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-xs-6 col-xxs-12 mb-40">
                    <div class="team-wrap">
                        <div class="team-member">
                            <div class="team-img hover-trigger">
                                <img src="{{ url_assets('/naturatherapyshop/img/team/simona-ristevska.jpg') }}" alt="">
                            </div>
                            <div class="team-details text-center">
                                <h4 class="team-title">Симона Ристевска</h4>
                                <span>Менаџер на Call Center, продажба и грижа на корисници</span>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-sm-4 col-xs-6 col-xxs-12 mb-40">
                    <div class="team-wrap">
                        <div class="team-member">
                            <div class="team-img hover-trigger">
                                <img src="{{ url_assets('/naturatherapyshop/img/team/hristina-angeloska.jpg') }}" alt="">
                            </div>
                            <div class="team-details text-center">
                                <h4 class="team-title">Христина Ангелоска</h4>
                                <span>Менаџер за продажба и работа со надворешни соработници</span>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <div class="col-sm-4 col-xs-6 col-xxs-12 mb-40">
                    <div class="team-wrap">
                        <div class="team-member">
                            <div class="team-img hover-trigger">
                                <img src="{{ url_assets('/naturatherapyshop/img/team/miodrag_ivanoski.jpg') }}" alt="">
                            </div>
                            <div class="team-details text-center">
                                <h4 class="team-title">Миодраг Иваноски</h4>
                                <span>Менаџер за комерцијално работење со аптеки и здравствени установи</span>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-sm-4 col-xs-6 col-xxs-12 mb-40">
                    <div class="team-wrap">
                        <div class="team-member">
                            <div class="team-img hover-trigger">
                                <img src="{{ url_assets('/naturatherapyshop/img/team/daniel_konevski.jpg') }}" alt="">
                            </div>
                            <div class="team-details text-center">
                                <h4 class="team-title">Даниел Коневски</h4>
                                <span>Менаџер на ланец на Natura Therapy центри за продажба и советување</span>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </section>
    <section class="section-wrap pb-40 our-team">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-xs-12 col-xxs-12">
                    <div class="col-sm-6 mb-50">
                        <img class="img img-responsive" src="{{ url_assets('/naturatherapyshop/img/about-us-2.jpg') }}"
                            alt="">
                    </div>
                    <div class="col-sm-6 mb-50">
                        <div class="tabs">
                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a href="#tab-one" data-toggle="tab">Мисија</a>
                                </li>
                                <li>
                                    <a href="#tab-two" data-toggle="tab">Визија</a>
                                </li>
                                <li>
                                    <a href="#tab-three" data-toggle="tab">Цел</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="tab-one">
                                    <h4>Мисија</h4>
                                    <p>Нашата мисија е да овозможиме секој поединец, покрај сите фактори од средината,
                                        начинот на живот и ограничувањата кои ги носи неговото генетско наследство да го
                                        достигне своето најдобро здравје и психофизичка способност.</p>

                                    <p><strong>NATURA THERAPY</strong> тоа го овозможува со развој, производство и понуда на
                                        најсовремени природни додатоци на исхраната и долгорочни услуги на професионална
                                        едукација и советување на клиентите за подобрување на нивното здравје и
                                        благосостојба.</p>

                                    <p>Создаваме природни, иновативни додатоци на исхраната, кои ги следат актуелните
                                        пазарни трендови и најновите научни сознанија и одговараат на највисоките стандарди
                                        за квалитет.</p>
                                </div>
                                <div class="tab-pane fade" id="tab-two">
                                    <h4>Визија</h4>
                                    <p>Да станеме регионален лидер на пазарот во развој и производство на природни
                                        иновативни додатоци на исхраната и носител на промената на свеста, информираноста и
                                        животните навики на населението. Се стремиме да бидеме силно препознатлив бренд,
                                        синоним и прв избор за здравје и поддршка на здравјето со помош на природата,
                                        достапни до сите граѓани преку ланец на сопствени центри за продажба и советување на
                                        граѓаните ширум државата и регионот.</p>
                                </div>
                                <div class="tab-pane fade" id="tab-three">
                                    <h4>Наша цел</h4>
                                    <p>Здравјето е нашето најголемо богатство, а да го сочуваме денес, навистина ни е
                                        потребна голема поддршка! Живееме во време на голема загаденост на животната
                                        средина, постојан стрес и лоши животни и прехранбени навики, што директно се
                                        одразува на нашето здравје и е главна причина за појавата на многу болести. И покрај
                                        континуираниот развој на медицината, појавата и развојот на кардиоваскуларните
                                        болести, рак, дијабетес, автоимуни состојби и други хронични заболувања се во
                                        постојан пораст и сериозно го нарушуваат квалитетот на животот. Нашата цел е да
                                        направиме суштинска промена во свеста и навиките на секој поединец и општеството во
                                        целина, пренесувајки ја улогата и значењето на здравата исхрана, здравите животни
                                        навики и користењето на природни додатоци на исхраната, да помогнеме во подобра
                                        заштита од болестите и достигнување на максимален животен потенцијал за секој
                                        поединец.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-wrap testimonials">
        <div class="container">
            <div class="row heading-row mb-20">
                <div class="col-md-6 col-md-offset-3 text-center">
                    <h3 class="heading bottom-line">Искуства на корисници</h3>
                </div>
            </div>
            <div id="owl-testimonials" class="owl-carousel owl-theme owl-dark-dots text-center">
                <div class="item">
                    <div class="testimonial">
                        <p class="testimonial-text">Јас зедов и втора пратка од 3 литри Алое Вера гел, првата пратка беше со
                            ресвератрол, бев задоволна па затоа зедов и втора пратка. Втората пратка е Алое Вера гел со
                            аронија и оваа комбинација ми се допадна и го пијам гелот редовно.</p>
                        <span>Маре Настева / Задоволен корисник</span>
                    </div>
                </div>
                <div class="item">
                    <div class="testimonial">
                        <p class="testimonial-text">Многу нешта не се купуваат, една од нив е довербата, а довербата се
                            стекнува со резултати. Јас премногу сум задоволна од вашите производи, од вашата екипа, посебно
                            од вашиот продажен менаџер Валентина и од вашиот нутриционист Дрвошански и на двајцата едно
                            големо благодарам. Слободно можам да кажам благодарение на нив сеуште сум добра и многу верувам
                            дека ќе бидам уште подобра.</p>
                        <span>Шефије Селмани / Задоволен корисник</span>
                    </div>
                </div>
                <div class="item">
                    <div class="testimonial">
                        <p class="testimonial-text">Со стареењето имам многу проблеми здравстени, оваа компанија успеа да ми
                            ги детектира сите проблеми и да ми помогне да ми поминат сите болки кои ги имав.<br>
                            Презадоволна сум и потпрана сум на нив и им го доверив моето . навистина го ценам тоа што се
                            грижат цело време и ми се јавуааат да ме прашаат и како ми делува производот и дали дополнително
                            можат да направат нешто за мене.<br> Топло ги препорачувам на сите кои имаат здравствен проблем
                            да се јават.</p>
                        <span>Станка Куц / Задоволен корисник</span>
                    </div>
                </div>
                <div class="item">
                    <div class="testimonial">
                        <p class="testimonial-text">Јас, Зора Миленкоска, пензионерка од свои 66 години сум среќна и горда
                            што денес сум добра, здрава и жива. Потенцирав за мојата гордост затоа што пред еден извесен
                            период бев многу болна. Одев на испитувања, снимања и разни прегледи, ама за жал никој ништо не
                            ми се нафати да ме лечи а не пак да ме излечи. Слушнав за производите на Натура Терапи и одма
                            решив да се јавам и да почнам да ги употребувам. Како прво, за моја среќа го добив
                            нутриционистот Сашко Дрвошански кој со многу убаво, стручно и компетентно ми ги објасни сите
                            препарати, кои се направени на природна база. Јас ги добив потребните препарати и еве за кратко
                            време од околу 6 месеци сум многу подобра, дури можам да се пофалам дека сум здрава, среќна
                            витална и благодарна на целиот тим кој работи со нас клиентите. Навистина, ве уверувам сите оние
                            кои имаат разни болести и имаат потреба да се лечат со многу медикаменти нека се потрудат да ги
                            дознаат овие производи и оваа фирма. Јас сум многу благодарна заедно со мојот сопруг за ова
                            вистинско лекување и помагање, за нашите болести, души и срца. Ви благодарам! И би сакала
                            секогаш да бидам во контакт за совет и разговор со вас.
                        </p>
                        <span>Зора Миленкоска / Задоволен корисник</span>
                    </div>
                </div>
                <div class="item">
                    <div class="testimonial">
                        <p class="testimonial-text">Скоро половина година ги користам производите на Натура Терапи за
                            подобрување на мојата здравствена состојба. Благодарение на гелот од Алое Вера сега се
                            чувствувам многу подобро, со посилен имунитет и имам повеќе енергија, додека универзалниот мелем
                            многу ми помогна за надминување на проблемите со кожата. Искрено сум благодарна и топло ги
                            препорачувам производите на Натура Терапи.
                        </p>
                        <span>Борка Митревска / Задоволен корисник</span>
                    </div>
                </div>
                <div class="item">
                    <div class="testimonial">
                        <p class="testimonial-text">Имав проблеми со ослабнат имунитет поради што решив да ги набавам
                            производите од Натура Терапи. После неколку месеци употреба на гелот од Алое Вера и Реиши Имуно
                            Протект препаратите јас сум презадоволна, чувствувам дека сум поотпорна, а имунитетот и
                            целокупното здравје ми се подобри. Ќе продолжам да ги користам и понатаму да го одржувам моето
                            здравје на природен начин.
                        </p>
                        <span>Лила Мамудовска / Задоволен корисник</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-wrap pb-40 our-team">
        <div class="container">
            <div class="row heading-row">
                <div class="col-md-12 text-center">
                    <span class="subheading"></span>
                    <h3 class="heading bottom-line">
                        Стручни соработници
                    </h3>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4 col-xs-6 col-xxs-12 mb-40">
                    <div class="team-wrap">
                        <div class="team-member">
                            <div class="team-img hover-trigger">
                                <img src="{{ url_assets('/naturatherapyshop/img/team/snezana-spirovska.jpg') }}" alt="">
                            </div>
                            <div class="team-details text-center">
                                <h4 class="team-title">Прим. Др. Снежана Спировска</h4>
                                <span>Специјалист Микробиолог</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-xs-6 col-xxs-12 mb-40">
                    <div class="team-wrap">
                        <div class="team-member">
                            <div class="team-img hover-trigger">
                                <img src="{{ url_assets('/naturatherapyshop/img/team/ankica-stanojkovska.jpg') }}" alt="">
                            </div>
                            <div class="team-details text-center">
                                <h4 class="team-title">Др. Анкица Станојковска</h4>
                                <span>Специјалист по семејна медицина</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-xs-6 col-xxs-12 mb-40">
                    <div class="team-wrap">
                        <div class="team-member">
                            <div class="team-img hover-trigger">
                                <img src="{{ url_assets('/naturatherapyshop/img/team/zoran-mihailovski.jpg') }}" alt="">
                            </div>
                            <div class="team-details text-center">
                                <h4 class="team-title">Др. Зоран Михајловски</h4>
                                <span>Специјалист по интерна медицина</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-wrap pb-40 our-team">
        <div class="container">
            <div class="row heading-row">
                <div class="col-md-12 text-center">
                    <span class="subheading"></span>
                    <h3 class="heading bottom-line">
                        Локации на продажни центри
                    </h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h5>Седиште</h5>
                    <ul>
                        <li>
                            Ул. БУЛЕВАР “СВЕТИ КЛИМЕНТ ОХРИДСКИ“ Бр.15/приземје СКОПЈЕ - ЦЕНТАР
                        </li>
                    </ul>
                    <h5>Продавници</h5>
                    <ul>
                        <li>
                            Ул. БУЛЕВАР ПАРТИЗАНСКИ ОДРЕДИ Бр.27 СКОПЈЕ - ЦЕНТАР ЦЕНТАР
                        </li>
                        <li>
                            Ул. ЏОН КЕНЕДИ Бр.2 СКОПЈЕ - ЧАИР ЧАИР
                        </li>
                        <li>
                            Ул. БУЛЕВАР ЈАНЕ САНДАНСКИ Бр.113/б-лок.3 КП СКОПЈЕ - АЕРОДРОМ АЕРОДРОМ
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    </div>
@stop

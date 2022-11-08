@extends('clients.yeppeuda.layouts.default')
@section('content')


<style>
    .form-horizontal .form-group {
        margin: 0;
    }

    label {
        padding-bottom: 15px;
    }

    input:not([type="checkbox"]):not([type="radio"]) {
        margin: 15px 0;
    }
</style>
<section class="page-title text-center bg-light">
    <div class="container relative clearfix">
        <div class="title-holder">
            <div class="title-text">
                <h1 class="uppercase">Yeppeuda квиз</h1>
            </div>
        </div>
    </div>
</section>



<div class="content-wrapper pt-30 oh">

    <!-- Contact -->
    <section class="section-wrap contact pb-40">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2">
                    <form class="contact-form form-horizontal" method="POST" action="/kontact" enctype="multipart/form-data">
                        {{csrf_field()}}

                        <label style="padding-top: 15px;" for="infoUser">1. Податоци за корисникот</label><br>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input class="form-control" type="text" name="name" id="name" placeholder="Име и Презиме" required="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input class="form-control" type="email" name="email" id="email" placeholder="Е - пошта" required="">
                                </div>
                            </div>
                        </div>

                        <label style="padding-top: 15px;" for="age">2. Зависно од возраста, проблематиките варираат - во која возрасна група спаѓате?</label><br style="height: 15px;">
                        <input name="age" value="10-17" type="radio"> 10 год до 17 год<br style="height: 15px;">
                        <input name="age" value="18-24" type="radio"> 18 год до 24 год<br style="height: 15px;">
                        <input name="age" value="25-34" type="radio"> 25 год до 34 год<br style="height: 15px;">
                        <input name="age" value="35-43" type="radio"> 35 год до 43 год<br style="height: 15px;">
                        <input name="age" value="45-54" type="radio"> 45 год до 54 год<br style="height: 15px;">
                        <input name="age" value="55 +" type="radio"> 55 +<br style="height: 15px;">

                        <label style="padding-top: 15px;" for="time">3. Колку време би издвојувале за вашата рутина?</label><br>
                        <input name="time" value="помалку од 2 минути" type="radio"> Помалку од 2 минути<br>
                        <input name="time" value="2- 3 минути" type="radio"> 2 - 3 минути<br>
                        <input name="time" value="5 минути" type="radio"> 5 минути<br>
                        <input name="time" value="7 минути +" type="radio"> 7 минути +<br>

                        <label style="padding-top: 15px;" for="how">4. Како го чистите вашето лице?</label><br>
                        <input name="how" value="само со вода" type="radio"> Само со вода<br>
                        <input name="how" value="со чистач на база на масла" type="radio"> Со чистач на база на масла<br>
                        <input name="how" value="со чистач на база на масла и пена" type="radio"> Со чистач на база на масла и пена<br>
                        <input name="how" value="со чистач пена" type="radio"> Со чистач пена<br>
                        <input name="how" value="со сапун" type="radio"> Со сапун<br>
                        <input name="how" value="не го чистам" type="radio"> Не го чистам<br>

                        <label style="padding-top: 15px;" for="wishlist">5. Кои производи ви се на вашата wish листа?</label><br>
                        <input name="wishlist" value="производи со кислеини" type="radio"> Производи со кислеини<br>
                        <input name="wishlist" value="против стареење" type="radio"> Против стареење<br>
                        <input name="wishlist" value="што содржат витамин ц" type="radio"> Што содржат витамин ц<br>
                        <input name="wishlist" value="што ја штитат и обновуваат кожата" type="radio"> Што ја штитат и обновуваат кожата<br>
                        <input name="wishlist" value="отхранувачки и хидратантни" type="radio"> Отхранувачки и хидратантни<br>

                        <label style="padding-top: 15px;" for="amount">8. На скала од 1 до 5 колку е вашата кожа осетлива?</label><br>
                        <input name="amount" value="1" type="radio"> 1<br>
                        <input name="amount" value="2" type="radio"> 2<br>
                        <input name="amount" value="3" type="radio"> 3<br>
                        <input name="amount" value="4" type="radio"> 4<br>
                        <input name="amount" value="5" type="radio"> 5<br>


                        <label style="padding-top: 15px;" for="dayskin">9. Како се однесува вашата кожа во текот на денот?</label><br>
                        <input name="dayskin" value="Ретко се мрси, претежно е сува" type="radio"> Ретко се мрси, претежно е сува<br>
                        <input name="dayskin" value="Балансирана, ни мрсна, ни сува" type="radio"> Балансирана, ни мрсна, ни сува<br>
                        <input name="dayskin" value="Мрсна Т зона, претежно на крајот од денот лачи себум" type="radio"> Мрсна Т зона, претежно на крајот од денот лачи себум<br>
                        <input name="dayskin" value="Многу мрсна, се познава во текот на целиот ден" type="radio"> Многу мрсна, се познава во текот на целиот ден<br>


                        
                        <label style="padding-top: 15px;" for="morningskin">10. Наутро, кожата ми е...</label><br>
                        <input name="morningskin" value="Нормална" type="radio"> Нормална<br>
                        <input name="morningskin" value="Затегната" type="radio"> Затегната<br>
                        <input name="morningskin" value="Мека, мазна и сјајна" type="radio"> Мека, мазна и сјајна<br>
                        <input name="morningskin" value="Сува и рапава" type="radio"> Сува и рапава<br>


                        <label style="padding-top: 15px;" for="acnes">11. Колку често имате појава на акни?</label><br>
                        <input name="acnes" value="периодично" type="radio"> Периодично<br>
                        <input name="acnes" value="хормонално" type="radio"> Хормонално<br>
                        <input name="acnes" value="постојано" type="radio"> Постојано<br>
                        <input name="acnes" value="пред/ за време на циклус" type="radio"> Пред/ за време на циклус<br>
                        <input name="acnes" value="никогаш" type="radio"> Никогаш<br>


                        <label style="padding-top: 15px;" for="goal">12. Која е вашата цел?</label><br>
                        <input name="goal" value="ослободување од акните" type="radio"> Ослободување од акните<br>
                        <input name="goal" value="да се измазнат брчките" type="radio"> Да се измазнат брчките<br>
                        <input name="goal" value="изедначување на тенот, црвенило или иритации" type="radio"> Изедначување на тенот, црвенило или иритации<br>
                        <input name="goal" value="намалување на видливоста на порите" type="radio"> Намалување на видливоста на порите<br>
                        <input name="goal" value="хидратација и потхранување" type="radio"> Хидратација и потхранување<br>


                        <label style="padding-top: 15px;" for="stress">13. На скала од 1 до 5 колку имате стрес на дневно ниво?</label><br>
                        <input name="stress" value="1" type="radio"> 1<br>
                        <input name="stress" value="2" type="radio"> 2<br>
                        <input name="stress" value="3" type="radio"> 3<br>
                        <input name="stress" value="4" type="radio"> 4<br>
                        <input name="stress" value="5" type="radio"> 5<br>


                        <label style="padding-top: 15px;" for="skincare">14. Дали често користите некој тип на третман за кожата?</label><br>
                        <input name="skincare" value="Ласер" type="radio"> Ласер<br>
                        <input name="skincare" value="Козметички третман" type="radio"> Козметички третман<br>
                        <input name="skincare" value="Ботокс" type="radio"> Ботокс<br>
                        <input name="skincare" value="Филер" type="radio"> Филер<br>
                        <input name="skincare" value="Микродермоабразија" type="radio"> Микродермоабразија<br>

                        <label style="padding-top: 15px;" for="photoUpload">9. Прикачете слики доколку сакате подетално да ни посочите некој проблем.</label><br>
                        <input type="file" id="photoProblems" name="photoProblems"><br>
                        <input type="hidden" name="anketa_yeppeuda" value=true><br>
                        <div style="padding-bottom: 17px;" class="g-recaptcha" data-sitekey="{{ \EasyShop\Models\AdminSettings::getField('recaptchaSitekey') }}"></div>

                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-lg btn_white btn-submit">Испрати прашалник</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

@stop
@section("scripts")
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
@stop
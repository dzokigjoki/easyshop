@extends('clients.clarissabalkan.layouts.default')
@section('content')
<style>
    #questions {
        list-style: none;
    }

    #questions>li {
        padding-bottom: 15px;
    }

    #questions1 {
        list-style: none;
    }

    #questions1>li {
        padding-bottom: 15px;
    }

    #questions2 {
        list-style: none;
    }

    #questions2>li {
        padding-bottom: 15px;
    }
</style>
<main class="ps-main">
    <div class="container margin_30">
        <div class="page_header">
            <div class="breadcrumbs">
                <ul>
                    <li><a href="/">Почетна</a></li>
                    <li><a href="#" class="active">FAQ</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="page_header">
                    <h1>Често поставувани прашања</h1>
                </div>
                <ul id="questions">
                    <li>
                        <strong>Која е разликата помеѓу помеѓу УВ и Лед производите?</strong>
                        <br>
                        - Ув производите се полимеризираат во УВ лама а УВ/ЛЕД
                        производите во комбинирана (хибридна) или ЛЕД лампа.
                    </li>
                    <li>
                        <strong>Што е разликата помеѓу киселинскиот и безкиселинскиот прајмер?</strong>
                        <br>
                        - Киселинскиот прајмер е наменет за реконструкција на нокт во
                        екстремни должини и при изработка со гел или акрил, додека
                        безкиселинскиот прајмер се користи за гел лак техника.
                    </li>
                    <li>
                        <strong>Какви четки се користат за гел, а какви за акрил техника?</strong>
                        <br>
                        - За гел техника се користат четки од синтетичко влакно, а за акрил
                        техника се користат четки од природно влакно.
                    </li>
                    <li>
                        <strong>Дали акрилот е штетен за здравјето?</strong>
                        <br>
                        - Не. Акрилот е прилагоден за изработка на ноктот, при што не го
                        оштетува ноктот и не влијае негативно на здравјето.
                    </li>
                    <li>
                        <strong>Дали мономерот е штетен за здравјето?</strong>
                        <br>
                        - Не. Иако има специфичен мирис, мономерот го соединува
                        акрилниот прав создавајќи смеса за изработка на ноктот, но брзо
                        испарува и не остава штетни состојќи кои негативно влијаат на
                        ноктот или здравјето.
                    </li>
                    <li>
                        <strong>Дали Quick Fix завршниот сјај се пребришува?</strong>
                        <br>
                        - Не. Quick Fix после полимеризација не остава леплив слој.
                    </li>
                    <li>
                        <strong>Дали BASE TOP и WONDERBASE може да се користат како бази за гел
                            техника?</strong>
                        <br>
                        - Да. Иако се наменети за гел лак техника, истражувањата и
                        искуствата покажаа дека можат да се користат и како бази за гел
                        техника.
                    </li>
                    <li>
                        <strong>Дали колор геловите Flash and Shine може да се користат за цртање?</strong>
                        <br>
                        - Да. Поради големата концентрација на пигмент во гелот може да
                        се користат за цртање. Имаат покривност само со еден слој и не
                        се пребришуваат.
                    </li>
                    <li>
                        <strong>Дали производите на Clarissa може да се користат во комбинација со
                            со производи од друг бренд?</strong>
                        <br>
                        - Да. Секој производ на Clarissa е компатибилен со производите од
                        било кој бренд.
                    </li>
                    <li>
                        <strong>Дали билдер геловите предизвикуваат болка и печење при
                            полимеризација?</strong>
                        <br>
                        - Не. Високата технологија со која располага Clarissa е специјално
                        дизајнирана за лесна, квалитетна и безболна изработка на нокти.
                    </li>
                    <li>
                        <strong>Дали пигментите за микроблејдинг или перманентна шминка може
                            да се мешаат меѓусебе?</strong>
                        <br>
                        - Да. Микропигментите може да се мешаат меѓусебе за добивање
                        на саканата нијанса.
                    </li>
                    <li>
                        <strong>Дали трепките на Clarissa може да се употребуваат повеќекратно?</strong>
                        <br>
                        - Да. Трепките се изработени од 100% природно влакно и со
                        правилно негување и одржување може да се користат повеќе
                        пати.
                    </li>
                    <li>
                        <strong>Со што се раствора фарбата за веѓи, трепки и брада David Sebastian?</strong>
                        <br>
                        - Се раствора со 3% хидроген која се нанесува на трепките, веѓите
                        или брадата и стои од 3 до 5 мин.
                    </li>
                </ul>
                <div class="page_header">
                    <h1>За Kemon Cramer</h1>
                </div>
                <ul id="questions1">
                    <li>
                        <strong>Како работи технологијата Cramer Color?</strong>
                        <br>
                        - Нискиот процент на амонијак нежно ја отекува структурата на
                        косата, микропигментите со голема пенетрација минуваат лесно, а
                        кокосовото масло дава заштита и нежен допир на третманот со боја.
                    </li>
                    <li>
                        <strong>Дали е можно да се меша Cramer Color во однос 1: 2 за поголемо
                            осветлување?</strong>
                        <br>
                        - Не. Ова ќе ја промени pH вредноста на смесата и концентрацијата на
                        пигментите.
                    </li>
                    <li>
                        <strong>Дали е можно да се додаде малку белило во супер-осветлувач за да ја
                            зајакне својата моќ на осветлување?</strong>
                        <br>
                        - Не. Алкалноста на смесата ќе се промени и белилото ќе ги разложи
                        пигментите во супер-осветлувачот.
                    </li>
                    <li>
                        <strong>На основно ниво 5, ако се примени 7 со 20-волти. Uni.Color Oxy и се
                            постигне ниво 6, дали е потребно да се примени 8 со 20-вол. Uni.Color Oxy
                            да добие 7?</strong>
                        <br>
                        - Не. За да се постигне 7 на основно ниво 5, доволно е да се примени
                        7 со 30-вол. Уни.Колор Окси.
                    </li>
                    <li>
                        <strong>Дали е неопходен тест за алергија на кожата?</strong>
                        <br>
                        - Тестот за алергија на кожата (печ-тест) е неопходен, исто како и за
                        сите други производи за боја на коса.
                    </li>
                    <li>
                        <strong>Во случаи на особено тврдоглава 100% сива / бела коса, за да се постигне
                            7,34 и беспрекорна покриеност, дали е потребно да се меша 7,34 со серија
                            Супер Природен и 20-вол. Уни.Колор Окси?</strong>
                        <br>
                        - Не. Супер природната серија секогаш се меша со 30-вол. Uni.Color
                        Oxi, така што вистинската формула би била: 30 ml од 7,34 + 30 ml од
                        7.000 + 50 ml од 30-вол. Уни.Колор Окси.
                    </li>
                    <li>
                        <strong>Дали е можно да се покрие сивата коса со серијата Еш?</strong>
                        <br>
                        - Не. Серијата пепел (.1) опфаќа само до 30%. За совршено
                        покривање, треба да се меша или со сериите Природна или Северна
                        Природна (0,08) во однос 1: 1.
                    </li>
                    <li>
                        <strong>При употреба на засилувачот C.55 во мешавината на боја, потребно е да
                            додадете повеќе развивач?</strong>
                        <br>
                        - Да. Ако количината на С.55 надминува 1/4 од смесата со избраната
                        нијанса, потребно е да се додаде Uni.Color Oxi и за засилувачкиот
                        дел, исто така, во сооднос 1:1.
                    </li>
                    <li>
                        <strong>Може ли серијата Super Natural да се користи за тонирање на средината и
                            врвовите?</strong>
                        <br>
                        - Не. Не се препорачува употреба на тоа, бидејќи оваа серија се меша
                        само со 30-вол. Уни.Колор Окси.
                    </li>
                    <li>
                        <strong>Дали можат да се користат Супер-осветлувачи и ултра осветлувачи со
                            другите нијанси на Cramer Color?</strong>
                        <br>
                        - Не. Соодносот на мешање е различен.
                    </li>

                    <li>
                        <strong>Дали можат да се користат супер-осветлувачи и ултра осветлувачи за да се
                            покријат сивата / белата коса?</strong>
                        <br>
                        - Не. Супер-осветлувачи и ултра осветлувачи не се формулирани за да
                        се покријат сивата / белата коса, туку да се обезбеди интензивно
                        осветлување - над 4 нивоа - и да се спротивстави на несаканите
                        топли ефекти што обично се јавува при осветлување на косата.
                    </li>
                    <li>
                        <strong>Дали можат да се користат супер-осветлувачи и ултра осветлувачи за
                            тонирање на средината и краевите?</strong>
                        <br>
                        - Не. Супер-осветлувачи и ултра осветлувачи не се дизајнирани да ги
                        тонираат пред-осветлените средни вратила и краеви.
                    </li>
                </ul>
                <div class="page_header">
                    <h1>За Lunex System</h1>
                </div>
                <ul id="questions2">
                    <li>
                        <strong>Дали можам да ги користам средствата за отстранување на бојата од линијата на Lunex под
                            топлина?</strong>
                        <br>
                        - Не. Се советува да не се користат средствата за отстранување на боја со било каков
                        извор на топлина.
                    </li>
                    <li>
                        <strong>Дали Lunex Restore може да се користи со било кои производ од линијата на
                            Lunex?</strong>
                        <br>
                        - Не. Може да се мешаат само Lunex Decap Super и Lunex Ultra Cream.
                    </li>
                    <li>
                        <strong>Lunex Restore е компатибилен со сите производи за отстранување на боја?</strong>
                        <br>
                        - Lunex Restore, истражувано и создадено за да се користи со производите за
                        отстранување на боја на Lunex, гарантира максимална придобивка со Lunex Decap
                        Super и Lunex Ultra Cream.
                    </li>
                    <li>
                        <strong>Дали можам да го користам Lunex Restore со сите волумени Vol.?</strong>
                        <br>
                        - Да. Со сите Uni.Color Oxi од 10 до 40 Vol.
                    </li>
                    <li>
                        <strong>Што ќе се случи ако се користи Lunex Restore во количество кое се разликува од
                            препорачаното?</strong>
                        <br>
                        - Во случај на поголемо или помало количество од препорачаното, ефикасноста на
                        производот не е повеќе загарантирана.
                    </li>
                    <li>
                        <strong>Дали може да се користи Lunex Restore заедно со смеса за отстранувач на боја на
                            претходно
                            третирани прамени?</strong>
                        <br>
                        - Да. По консултација со професионален козметичар за да се одреди структурата и
                        условите на косата и влакното.
                    </li>
                    <li>
                        <strong>Дали со Lunex Restore времето на дејствување се менува?</strong>
                        <br>
                        - Не. Lunex Restore не го зголемува времето на дејствување на отстранувачот со кој се
                        меша. Следете го упатството на отстранувачот кој се користи.
                    </li>
                    <li>
                        <strong>Дали можам да ги тонирам прамените по отстранување на бојата со помош на Lunex
                            Restore?</strong>
                        <br>
                        - Да. Следејќи го истиот процес што следи за едно нормално отстранување на бојата.
                    </li>
                    <li>
                        <strong>За да постигнам поголемо осветлување со Lunex Light Fast, дали можам добро да го измијам
                            праменот од косата пред да го поминам со апаратот за исправување?</strong>
                        <br>
                        - Не. Праменот од косата не треба да биде премногу мокар, треба да биде само
                        навлажнат и нанесувањето на производот треба да биде рамномерно нанесен прво
                        со чешел а потоа со пегла, бидејќи доколку производот е во контакт со пеглата, може
                        да и наштети на структурата на косата.
                    </li>
                    <li>
                        <strong>Дали може да се нанесе повеќе пати од Lunex Light Fast на истиот прамен за да се
                            постигне
                            поголемо осветлување?</strong>
                        <br>
                        - Да. Ако косата е здрава може да се повтори процедурата најмногу до двапати со
                        нежно поминување со пеглата.
                    </li>

                    <li>
                        <strong>Дали може да се користи Lunex Light Fast на бојадисана коса со екстра осветлување од
                            40Vol.</strong>
                        <br>
                        - Ne. Lunex Light Fast може да се нанесува само на природна коса или бојадисана со
                        најмногу до 20 Vol. На здрава коса може да се нанесе и ако бојадисувањето е од 30
                        Vol.
                    </li>
                    <li>
                        <strong>За да го зголемам осветлувањето со Lunex Light дали можам да додадам Uni.Color Oxi
                            со кислород од 40 Vol.?</strong>
                        <br>
                        - Не. За да се зголеми моќноста на осветлувањето може да се додаде една мешавина
                        од Lunex Decap Super: 30 мл од Lunex Light 1 со 60 мл од Lunex Light 2 + 10 гр. од Lunex
                        Decap Super. Оставете да делува околу 20мин. ,според саканиот резултат и бојата на
                        основата на косата.
                    </li>
                    <li>
                        <strong>Зошто не се препорачува користење на Lunex Restore заедно со Lunex Super Powder?</strong>
                        <br>
                        - Lunex Restore ја менува текстурата на смесата губејќи ги карактеристиките;
                        резултатот може да биде спротивен.
                    </li>
                    <li>
                        <strong>Дали Lunex Super Powder се препорачува и за бришење ба бојата од кожата?</strong>
                        <br>
                        - Не. Идеален производ за бришење на бојата од кожата е Lunex Ultra Cream.
                    </li>
                    <li>
                        <strong>Дали се препорачува Lunex Super Powder да се користи со помош на алуминиумска фолија
                            или други помошни средства?</strong>
                        <br>
                        - Не. Нејзината структура ќе ја отежне работата . Идеален отстранувач кој се користи со
                        фолија или други помошни средства е Lunex Decap Super.
                    </li>
                    <li>
                        <strong>Колку тонови на осветлување можат да се добијат со Lunex Decap Super?</strong>
                        <br>
                        - Урамнотеженото помешување со козметичките масла и Uni.Color Oxi со кислород од
                        10, 20, 30 и 40 vol. Може да се добие и до 6 тонови на осветлување за околу 60 мин.
                        Без процес на загревање.
                    </li>
                    <li>
                        <strong>Кои броеви на хидроген можат да се користат со Lunex Ultra Cream?</strong>
                        <br>
                        - За бришење на бојата од кожата се препорачува користење на Uni.Color Oxi со 10/20
                        vol. Поврзување на 1:1 e 1:1,5. За други техники како на пример шатирање,се
                        користи Uni.Color Oxi од 10, 20, 30 и 40 vol. Со поврзување на 1:1 e 1:1,5.
                    </li>
                </ul>
            </div><br>
        </div>
    </div>
</main>
@endsection
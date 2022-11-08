<footer id="footer-area">
    <div class="container footer-area-container">
    <!-- Footer Links Starts -->
    <div class="footer-links row">

        <div class="col-md-2 col-sm-6">
            <h5>За нас</h5>
            <ul>
                <li><a href="{{route('blog', [2, 'politika-na-privatnost'])}}">Политика на приватност</a></li>
                <li><a href="{{route('blog', [1, 'uslovi-za-kupuvanje'])}}">Услови за купување</a></li>
                <li><a href="{{route('blog', [3, 'politika-na-zamena-na-proizvod'])}}">Политика на замена на производ</a></li>
                <li><a href="{{route('blog', [4, 'opshti-pravila-i-uslovi'])}}">Општи правила и услови</a></li>
            </ul>
        </div>
        <div class="col-md-2 col-sm-6">
            <h5>Информации</h5>
            <ul>
                <li><a href="{{route('blog', [5, 'kako-da-naracham'])}}">Како да нарачам?</a></li>
                <li><a href="{{route('blog', [6, 'lokacija-na-prodavnici'])}}">Локација на продавници</a></li>
            </ul>
        </div>
        <div class="col-md-2 col-sm-6">
            <h5>Профил</h5>
            <ul>
                <li><a href="/">Профил</a></li>
                <li><a href="/">Историја на нарачки</a></li>
            </ul>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class="fb-page" data-href="https://www.facebook.com/tehnopolis.mk/" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/tehnopolis.mk/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/tehnopolis.mk/">Tehnopolis.mk</a></blockquote></div>
        </div>
    </div>

    <div>
        <div class="footer-bottom">
            <ul class="footer_list">
                <li>Технополис ДОО Скопје&nbsp;</li>
                <li>ЕДБ: 4057017536970&nbsp;</li>
                <li>ЕМБГ: 7199210&nbsp;</li>
                <li>Жиро сметка бр. 200003170102970&nbsp;</li>
                <li>Стопанска Банка АД Скопје</li>
            </ul>
            <p>© {{date('Y')}} Технополис ДОО. Сите права се задржани.</p>
        </div>
    </div>
    </div>
    <input id="direct_buy" type="hidden" name="direct_buy" value="1">
</footer>

<!-- Footer Section Ends -->
<footer class="middlered-b">
    <div class="inner-footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-md-3">
                    <div class="f-about">
                        <h1>Контакт</h1>
                        <p class="mb20"><a style="color:white;" href="mailto:info@kinderlend.mk"> <i
                                    class="fa fa-envelope"></i> info@kinderlend.mk </a></p>
                        <p class="mb20"><a style="color:white;" href="tel:+38979279180"><i class="fa fa-phone"></i> +389
                                79 279 180</a> </p>
                        <p class="mb20"><a style="color:white;" href="tel:+38972320071 "><i class="fa fa-phone"></i>
                                +389 72 320 071</a> </p>
                        <p class="mb20"><a style="color:white;"><i class="fa fa-home"></i> Исаија Мажовски бр. 31 </a>
                        </p>
                        {{--<h1><a style="color:white;" href="#">Локација</a></h1>--}}
                        {{--<h5><a style="color:white;" href="#">Политика на приватност</a></h5>--}}
                        {{--<h5><a style="color:white;" href="#">Правила на купување</a></h5>--}}

                    </div>
                </div>
                <div class="col-sm-4 col-md-3">
                    <div class="infos">
                        <h1>Информации</h1>
                        <ul>
                            <li><a href="{{route('blog',[4,'za-nas'])}}">• За нас</a></li>
                            <li><a href="{{route('blog',[3,'kako-da-naracham?'])}}">• Како да нарачам? </a></li>
                            {{-- <li><a href="{{route('blog',[5,'dostava-i-vrakjanje-na-pratki'])}}">• Достава и враќање
                            на пратки</a></li> --}}
                            {{-- <li><a href="{{route('blog',[6,'zashtita-na-lichni-podatoci'])}}">• Заштита на лични
                            податоци</a></li> --}}
                            <li><a href="/contact">• Контакт</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3 hidden-sm hidden-md col-md-3">
                    <div class="infos">
                        <h1>Категории</h1>
                        <ul>
                            <?php $counter = 0 ?>
                            {{-- @if(isset($instagramItems))
                            @foreach($instagramItems->data as $instagramPost) --}}
                            <?php $counter = $counter + 1 ?>
                            {{-- <li>
                                <a style="display:inline" class="pull-left" href="{{ $instagramPost->link }}">
                                    <img width="80" src="{{ $instagramPost->images->standard_resolution->url }}"
                                        alt="instagram" />
                                </a>
                            </li> --}}
                            {{-- @if($counter == 8)
                            @break
                            @endif
                            @endforeach
                            @else --}}
                            @foreach($menuCategories as $item)
                            <li class="footer-categories-li">
                                <a href="{{route('category', [$item['id'], $item['url']])}}">{{$item['title']}}</a>
                            </li>
                            @endforeach
                            {{-- @endif --}}
                        </ul>
                    </div>
                </div>
                <div class="fb5SE col-sm-3 col-md-3 col-xs-12">
                    <div class="gettouch">
                        <div style="border:none; overflow:hidden; width:207px; height:216px;" class="fb-page"
                            data-href="https://www.facebook.com/kinderlendskopje/" data-small-header="false"
                            data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                            <blockquote cite="https://www.facebook.com/kinderlendskopje/" class="fb-xfbml-parse-ignore">
                                <a href="https://www.facebook.com/kinderlendskopje/">kinderlend.mk</a></blockquote>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div id="back-to-top">
            <a href="#top">Најгоре</a>
        </div> --}}
    </div>
    <!-- end contanir & inner-footer -->
    <div class="darkblue-b">
        <div class="container">
            <div class="last-div">
                <div class="row">
                    <div class="col-lg-2 text-center">
                        <img width='80' src="{{ url_assets('/shopathome/images/visa_master1.jpg') }}"
                            alt="visa_master">
                    </div>
                    <div class="col-lg-4" style="color:white; font-size:15px;" class="copyright">
                        KINDERLEND © {{ date('Y') }}. All Rights Reserved |
                    </div>

                    <div class="payment col-lg-4">
                        <div class="hidden-sm hidden-xs" style="font-size:15px; float:right"><a style="color:white;"
                                href="{{route('blog',[4,'politika-na-privatnost'])}}">Политика на приватност </a></div>
                        <div class="hidden-sm hidden-xs" style="font-size:15px; margin-right:10px;  float:right"><a
                                style="color:white;" href="{{route('blog',[3,'pravila-na-kupuvanje'])}}"> Правила на
                                купување</a></div>
                    </div>

                    <div class="col-lg-2">
                        <a class="" style="color:white;" href="https://generadevelopment.com" target="_blank">Powered
                            by: <img width="70"
                                src="{{ url_assets('/shopathome/images/genera_logo.png') }}"></a>
                    </div>
                    <div class="clear"></div>
                </div>

            </div>
        </div>
    </div>



</footer>
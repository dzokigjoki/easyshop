<footer class="bg12">
    <div class="bg-img2 p-b-74" style="background-image: url({{ url_assets('/bloomtea/images/symbol-36.png') }});">
        <div class="container">
            <div class="wrap-footer flex-w p-t-83 p-b-12">

                {{--<div class="footer-col4 p-b-50">--}}
                    {{--<div style="text-align: center;">--}}
                        {{----}}
                    {{--</div>--}}
                {{--</div>--}}

                <div class="footer-col3 p-b-50" id="informacii">
                    <div class="p-b-36">
							<span class="txt-m-109 cl10">
								Информации
							</span>
                    </div>

                    <ul>
                        <li class="p-b-16">
                            <a href="{{route('category',[8,'za-nas'])}}" class="txt-s-101 cl6 hov-cl10 trans-04 p-tb-5">
                                За нас
                            </a>
                        </li>

                        <li class="p-b-16">
                            <a href="{{route('product',[1,'super-green-detox-tea'])}}"
                               class="txt-s-101 cl6 hov-cl10 trans-04 p-tb-5">
                                Чаеви
                            </a>
                        </li>


                        <li class="p-b-16">
                            <a href="#" class="txt-s-101 cl6 hov-cl10 trans-04 p-tb-5">
                                Контакт
                            </a>
                        </li>
                        <li class="p-b-16">
                            <img style="width: 50%" src="{{ url_assets('/bloomtea/images/bloom-logo-square.png') }}">
                        </li>

                    </ul>
                </div>
                <div class="footer-col3 p-b-50" id="footer-za-nas">
                    <div class="p-b-36">
							<span class="txt-m-109 cl10">
								За нас
							</span>
                    </div>

                    <p class="txt-s-101 cl6 size-w-10 p-b-16" style="text-align: justify">
                        Bloom Tea е компанија посветена на високо квалитетни органски чаеви, со цел подобрување на
                        здравјето.
                        Нашиот млад и динамичен тим е составен од лица кои се грижат за здравјето и знаат што е потребно
                        за поздрав живот.
                    </p>

                    <ul>
                        <li class="txt-s-101 cl6 flex-t p-b-10">
								<span class="size-w-11">
									<img src="{{ url_assets('/bloomtea/images/icon-mail.png') }}" alt="ICON-MAIL">
								</span>

                            <span class="size-w-12 p-t-1">
                                <a href="mailto:info@bloomtea.mk">
									info@bloomtea.mk
                                    </a>
								</span>
                        </li>

                        <li class="txt-s-101 cl6 flex-t p-b-10">
								<span class="size-w-11">
									<img src="{{ url_assets('/bloomtea/images/icon-pin.png') }}" alt="ICON-MAIL">
								</span>

                            <span class="size-w-12 p-t-1">
									ул. Орце Николов 206/3 Скопје
								</span>
                        </li>

                    </ul>
                </div>
                <div class="footer-col3 p-b-50">
                    <div class="p-b-36">
                        {{--<span class="txt-m-109 cl10">--}}
                        {{--Subscribe--}}
                        {{--</span>--}}
                        {{--</div>--}}

                        <div id="fb" class="fb-page" data-href="https://www.facebook.com/BloomTea.mk/" data-small-header="false"
                             data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                            <blockquote cite="https://www.facebook.com/BloomTea.mk/" class="fb-xfbml-parse-ignore"><a
                                        href="https://www.facebook.com/BloomTea.mk/">bloomtea.mk</a></blockquote>
                        </div>

                    </div>
                </div>

                <div class="flex-w flex-sb-m bo-t-1 bocl14 p-tb-14">
					<span class="txt-s-101 cl9 p-tb-10 p-r-29">
						Copyright © Bloom Tea. All rights reserved.
					</span>

                </div>
            </div>
        </div>
    </div>
</footer>


<!-- Back to top -->
<div class="btn-back-to-top bg0-hov" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<span class="lnr lnr-chevron-up"></span>
		</span>
</div>

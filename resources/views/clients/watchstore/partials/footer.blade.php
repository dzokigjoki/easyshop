<footer class="entire_footer">
    <!-- FOOTER-TOP-AREA -->
    <div class="footer_top_area footer-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="top-border"></div>
                </div>
                <div class="col-sm-4 col-sm-4 col-xs-12">
                    <div class="footer_top_single" style="min-height: 111px;">
                        <i class="fa fa-gift" style="font-size: 40px;"></i>
                        <div style="padding-left: 30px;">

                            <h4 style="font-size:12px;">{{trans('watchstore.high_quality')}}!</h4>
                            <p>{{trans('watchstore.affordable_prices')}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-sm-4 col-xs-12">
                    <div class="footer_top_single" style="min-height: 111px;">
                        <i class="fa fa-plane" style="font-size: 40px;"></i>
                        <div style="padding-left: 30px;">

                            <h4 style="font-size:12px;">{{trans('watchstore.free_shipping_in_2_days')}}</h4>
                            <p>{{trans('watchstore.return_product')}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-sm-4 col-xs-12">
                    <div class="footer_top_single" style="min-height: 111px;">
                        <i class="fa fa-phone" style="font-size: 40px;"></i>
                        <div style="padding-left: 30px;">
                            <h4 style="font-size:12px;">{{trans('watchstore.contact_us')}}</h4>
                            <p><a style="color:#777777;" href="tel:0038970249789">+389 70 249 789</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- FOOTER-TOP-AREA:END -->

    <!-- FOOTER-WIDGET-AREA -->
    <div class="footer-widget">
        <div style="padding:40px 0 52px !important;" class="ovelay">
            <div class="container">
            <div class="row">
                <div class="col-sm-4 col-md-4 col-xs-12">
                        <div class="widget_single">
                            <h4><a href="#">{{trans('watchstore.about_us_footer')}}</a></h4>
                            <span style="color:white;">
                                {{trans('watchstore.about_us_footer_text')}}
                            </span>
                        </div>
                    </div>
                    <div class="col-sm-2 col-md-2 col-xs-12">
                        <div class="widget_logo">
                            <h4><a href="#">{{trans('watchstore.categories')}}</a></h4>
                            <ul>
                                @foreach($menuCategories as $item)
                                    <li {{ url()->current() == route('category', [$item['id'], $item['url']]) ? 'class="active"' : ''  }}>
                                        <a href="{{route('category', [$item['id'], $item['url']])}}">{{$item['title']}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-2 col-md-2 col-xs-12">
                        <div class="widget_single">
                            <div class="widget_single">
                                <h4><a href="">{{trans('watchstore.informations')}}</a></h4>
                                <ul>
                                    <li><a href="{{route('blog',[3,'kako-da-naracham?'])}}">Како да нарачам?</a>
                                    </li>
                                    <li><a href="">За нас?</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2 col-md-2 col-xs-12">
                        <div class="widget_single">
                            <div class="fb5SE col-sm-3 hidden-sm col-md-3">
                                <div class="gettouch">
                                    <div style="border:none; overflow:hidden; width:270px; height:216px;"
                                         class="fb-page" data-href="https://www.facebook.com/thewatchshop.mk/"
                                         data-small-header="false"
                                         data-adapt-container-width="true" data-hide-cover="false"
                                         data-show-facepile="true">
                                        <blockquote cite="https://www.facebook.com/thewatchshop.mk/"
                                                    class="fb-xfbml-parse-ignore"><a
                                                    href="https://www.facebook.com/thewatchshop.mk/">watchstore.mk</a>
                                        </blockquote>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- FOOTER-WIDGET-AREA:END -->

    <!-- FOOTER-AREA -->
    <div class="footer_area">
        <div class="container">
            <div class="row ">
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="footer_text ">
                        Powered By: <a href="https://generadevelopment.com" target="_blank"><img style="width: 100px; padding-left: 15px;" src="{{ url_assets('/watchstore/images/genera_logo.png') }}"></a>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="footer_text footer_right">
                        &copy; Twelve {{date("Y")}}. All Rights Reserved
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="pull-r footer_right ">
                        <a style="color:white; padding-right:10px;" href="">Privacy Policy</a>
                        <a style="color:white;" href="">Purchase Rules</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- FOOTER-AREA:END -->
</footer>
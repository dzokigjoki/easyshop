<footer id="footer">
<div class="fpart-second">
  <div class="container">
    <div id="powered" class="clearfix">
      <div class="powered_text pull-left flip">
        <p>Top Produkti © 2017
        &nbsp;<a href="/" target="_blank">Top Produkti</a>
        @if(trans('topprodukti.company_phone_footer'))
        &nbsp;<a href="callto://{{trans('topprodukti.company_phone_footer')}}"><i class="fa fa-phone"></i>{{trans('topprodukti.company_phone_footer')}}</a>
        @endif
        </p>
      </div>
        <div class="powered_text pull-right flip">
            <p>
                <a href="{{route('blog', [1, 'privacy-policy'])}}">Privacy Policy</a>
                &nbsp;
                &nbsp;
                &nbsp;
                <a href="{{route('blog', [10, '​terms-and-conditions-of-use'])}}">​Terms and Conditions of Use</a>
            </p>
        </div>
    </div>
  </div>
</div>
<input id="direct_buy" type="hidden" name="direct_buy" value="1">
</footer>
<!-- JS Part Start-->
<script type="text/javascript" src="{{URL::to('/')}}/assets/topprodukti/js/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="{{URL::to('/')}}/assets/topprodukti/js/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="{{URL::to('/')}}/assets/topprodukti/js/jquery.easing-1.3.min.js"></script>
<script type="text/javascript" src="{{URL::to('/')}}/assets/topprodukti/js/jquery.dcjqaccordion.min.js"></script>
<script type="text/javascript" src="{{URL::to('/')}}/assets/topprodukti/js/owl.carousel.min.js"></script>
<script type="text/javascript" src="{{URL::to('/')}}/assets/topprodukti/js/custom.js"></script>
<script src="/assets/perla/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<script src="/assets/perla/frontend/layout/scripts/back-to-top.js" type="text/javascript"></script>
<script src="/assets/perla/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="/assets/perla/global/plugins/fancybox/source/jquery.fancybox.pack.js" type="text/javascript"></script><!-- pop up -->
<script src="/assets/perla/global/plugins/carousel-owl-carousel/owl-carousel/owl.carousel.min.js" type="text/javascript"></script><!-- slider for products -->
<script src='/assets/perla/global/plugins/zoom/jquery.zoom.min.js' type="text/javascript"></script><!-- product zoom -->
<script src="/assets/perla/global/plugins/bootstrap-touchspin/bootstrap.touchspin.js" type="text/javascript"></script><!-- Quantity -->

<!-- BEGIN PAGE LEVEL JAVASCRIPTS (REQUIRED ONLY FOR CURRENT PAGE) -->
<script src="/assets/perla/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="/assets/perla/global/plugins/rateit/src/jquery.rateit.js" type="text/javascript"></script>
<script src="//code.jquery.com/ui/1.10.3/jquery-ui.js" type="text/javascript"></script><!-- for slider-range -->

<!-- BEGIN LayerSlider -->
<script src="/assets/perla/global/plugins/slider-layer-slider/js/greensock.js" type="text/javascript"></script><!-- External libraries: GreenSock -->
<script src="/assets/perla/global/plugins/slider-layer-slider/js/layerslider.transitions.js" type="text/javascript"></script><!-- LayerSlider script files -->
<script src="/assets/perla/global/plugins/slider-layer-slider/js/layerslider.kreaturamedia.jquery.js" type="text/javascript"></script><!-- LayerSlider script files -->
<script src="/assets/perla/frontend/pages/scripts/layerslider-init.js" type="text/javascript"></script>
<!-- END LayerSlider -->

<script src="/assets/topprodukti/js/layout.js" type="text/javascript"></script>
<script type="text/javascript">
    jQuery(document).ready(function() {
        Layout.init();
        Layout.initOWL();
        LayersliderInit.initLayerSlider();
        Layout.initImageZoom();
        Layout.initTouchspin();
        Layout.initTwitter();

        Layout.initUniform();
        Layout.initSliderRange();
    });
</script>
@include('clients._partials.es-object')
@include('clients._partials.global-scripts')
@section('scripts')
@show
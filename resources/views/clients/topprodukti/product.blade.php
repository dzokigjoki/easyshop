@extends('clients.topprodukti.layouts.default')
@section('content')
<div class="row">
@include('clients.topprodukti.product_middle')
</div>
@endsection
@section('scripts')
<script type="text/javascript" src="{{URL::to('assets/topprodukti/js')}}/jquery.elevateZoom-3.0.8.min.js"></script>
<script type="text/javascript" src="{{URL::to('assets/topprodukti/js')}}/swipebox/lib/ios-orientationchange-fix.js"></script>
<script type="text/javascript" src="{{URL::to('assets/topprodukti/js')}}/swipebox/src/js/jquery.swipebox.min.js"></script>
<script type="text/javascript">
// Elevate Zoom for Product Page image
if ($(window).width() >= 768) {
    $('[data-zoom-galery]').show();
    $("#zoom_01").elevateZoom({
        gallery:'gallery_01',
        cursor: 'pointer',
        galleryActiveClass: 'active',
        imageCrossfade: true,
        zoomWindowFadeIn: 500,
        zoomWindowFadeOut: 500,
        lensFadeIn: 500,
        lensFadeOut: 500,
        loadingIcon: 'image/progress.gif'
    });
//////pass the images to swipebox
    $("#zoom_01").bind("click", function(e) {
        var ez =   $('#zoom_01').data('elevateZoom');
        $.swipebox(ez.getGalleryList());
        return false;
    });
} else {


    $('[data-thumbnail]').on('click', function(e) {
        e.preventDefault();
        $("#zoom_01").attr('src', $(this).find('img').attr('src').replace('sm_', 'lg_'));
    });
}

</script>
@endsection
<style type="text/css">
    .zoomContainer{
        border-style: solid;
    }
</style>
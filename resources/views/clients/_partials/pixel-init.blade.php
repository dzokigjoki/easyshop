@if(isset($facebook_pixels))
<script>
    !function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
            n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
        n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
        t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
            document,'script','https://connect.facebook.net/en_US/fbevents.js');
    @foreach($facebook_pixels as $pixelCode)
    fbq('init', '{{ $pixelCode }}'); // Insert your pixel ID here.
    @endforeach
    fbq('track', 'PageView');
</script>
<noscript>
    @foreach($facebook_pixels as $pixelCode)

    <img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id={{ $pixelCode }}&ev=PageView&noscript=1"/>
    @endforeach
</noscript>
<!-- DO NOT MODIFY -->
@endif
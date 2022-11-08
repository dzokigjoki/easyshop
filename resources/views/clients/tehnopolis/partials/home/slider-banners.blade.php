<div id="main-carousel" class="carousel slide" data-ride="carousel" style="margin-bottom: 40px;">
    <!-- Wrapper For Slides Starts -->
    <div class="carousel-inner">
        <?php $counterBanner = 0 ?>
        @foreach($sliderBanners as $banner)
        <div class="item <?php if($counterBanner++ == 0){ echo 'active'; } ?>">
            <a href="{{$banner->url}}">
                <img class="img img-responsive"
                     src="{{\ImagesHelper::getBannerImage($banner, NULL, 'lg_')}}"
                     alt="{{$banner->title}}">
            </a>
        </div>
        @endforeach
    </div>
    <!-- Wrapper For Slides Ends -->
    <!-- Controls Starts -->
    <a class="left carousel-control" href="#main-carousel"
       role="button" data-slide="prev">
        <span class="fa fa-chevron-left"></span>
    </a>
    <a class="right carousel-control" href="#main-carousel"
       role="button" data-slide="next">
        <span class="fa fa-chevron-right"></span>
    </a>
    <!-- Controls Ends -->
</div>


<nav id="menu" class="navbar">
    <div class="container">
        <div class="navbar-header"><span class="visible-xs visible-sm"> {{trans('topprodukti.menu')}} <b></b></span>
        </div>
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav">
                <li><a class="home_link" title="Home"
                       style="height: 100%;
                        width: 40px;
                        display: inline-block;float: left;"
                       href="{{URL::to('/')}}"><span
                                style="vertical-align: top;top: 20px;left: 1px;"
                                >{{trans('topprodukti.homepage')}}</span></a>
                </li>

                <?php
                $navCategories = [];
                if (config( 'app.client') === 'topprodukti_mk') {
                    $navCategories = $menuCategories[0];
                } else if (config( 'app.client') === 'topprodukti_rs') {
                    $navCategories = $menuCategories[1];
                } else if (config( 'app.client') === 'topprodukti_bg') {
                    $navCategories = $menuCategories[2];
                } else if (config( 'app.client') === 'topprodukti_hr') {
                    $navCategories = $menuCategories[3];
                } else if (config( 'app.client') === 'topprodukti_si') {
                    $navCategories = $menuCategories[8];
                } else if (config( 'app.client') === 'topprodukti_sk') {
                    $navCategories = $menuCategories[7];
                } else if (config( 'app.client') === 'topprodukti_hu') {
                    $navCategories = $menuCategories[4];
                } else if (config( 'app.client') === 'topprodukti_pl') {
                    $navCategories = $menuCategories[6];
                } else if (config( 'app.client') === 'topprodukti_cz') {
                    $navCategories = $menuCategories[5];
                } else if (config( 'app.client') === 'topprodukti_ro') {
                    $navCategories = $menuCategories[9];
                }
                ?>

                @if(isset($navCategories['children']))
                    @foreach($navCategories['children'] as $mc)
                        <li class="dropdown">
                            @if(isset($mc['children']))
                                <span>{{$mc['title']}}</span>
                            @else
                                <a href="{{route('category', [$mc['id'], $mc['url']])}}">{{$mc['title']}}</a>
                            @endif
                            @if(isset($mc['children']))
                                <div class="dropdown-menu">
                                    <ul>
                                        @foreach($mc['children'] as $ch)
                                            <li>
                                                <a href="{{route('category', [$ch['id'], $ch['url']])}}">{{$ch['title']}}
                                                    <span></span></a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </li>
                    @endforeach
                @endif
            </ul>
        </div>
    </div>
</nav>
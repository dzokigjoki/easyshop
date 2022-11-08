<!-- ========================================= NAVIGATION ========================================= -->
<nav id="top-megamenu-nav" class="megamenu-vertical animate-dropdown">
    <div class="container">
        <div class="yamm navbar">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mc-horizontal-menu-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div><!-- /.navbar-header -->
            <div class="collapse navbar-collapse" id="mc-horizontal-menu-collapse">
                <ul class="nav navbar-nav">
                    @foreach(\EasyShop\Repositories\CategoryRepository\DBCategoryRepository::getActiveCategoryLists() as $menu)
                    <li {{ $menu->activeChild->count() ? "class=dropdown" : "" }}>
                        <a href="{{ route('category', $menu->url) }}" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown">{{ $menu->title }}</a>
                        @if($menu->activeChild->count())
                        <ul class="dropdown-menu">
                            @if($menu->childHasActiveChild())
                            <li>
                                <div class="yamm-content">
                                    <div class="row">
                                        @foreach($menu->activeChild as $child)
                                            <div class="col-xs-12 col-sm-{{ 12 / $menu->activeChild->count() }}">
                                                <h2><a href="{{ route('category', $child->url) }}">{{ $child->title }}</a></h2>
                                                <ul>
                                                    @foreach($child->activeChild as $subchild)
                                                    <li><a href="{{ route('category', $subchild->url) }}">{{ $subchild->title }}</a></li>
                                                    @endforeach
                                                </ul>
                                            </div><!-- /.col -->
                                        @endforeach
                                    </div>
                                </div>
                            </li>
                            @else
                                @foreach($menu->activeChild as $child)
                                    <li><a href="{{ route('category', $child->url) }}">{{ $child->title }}</a></li>
                                @endforeach                                    
                            @endif
                        </ul>
                        @endif    
                    </li>
                    @endforeach
                </ul><!-- /.navbar-nav -->
            </div><!-- /.navbar-collapse -->
        </div><!-- /.navbar -->
    </div><!-- /.container -->
</nav><!-- /.megamenu-vertical -->
<!-- ========================================= NAVIGATION : END ========================================= -->
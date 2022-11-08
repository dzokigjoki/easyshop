<div class="offcanvas open">
    <div class="offcanvas-wrap">
        <div class="offcanvas-user clearfix flex-centered">
            {{-- <a class="offcanvas-user-wishlist-link" href="wishlist.html">
                <i class="fa fa-heart-o"></i> My Wishlist
            </a> --}}
            <a class="offcanvas-user-account-link" href="#">
                Категории
            </a>
        </div>
        <nav class="offcanvas-navbar">
            <ul class="offcanvas-nav">
                {{-- <li class="menu-item-has-children dropdown">
                    <a href="/" class="dropdown-hover">Почетна</a>
                </li> --}}
                @foreach($menuCategories as $mc)
                @if(isset($mc['children']))
                <li class="menu-item-has-children dropdown">
                    @else
                <li>
                    @endif
                    <a href="{{route('category', [$mc['id'], $mc['url']])}}" class="dropdown-hover">{{ $mc['title'] }}
                        @if(isset($mc['children']))
                        <span class="caret"></span>
                        @endif
                    </a>
                    @if(isset($mc['children']))
                    <ul class="dropdown-menu">
                        @foreach($mc['children'] as $ch)
                        <li><a href="{{route('category', [$ch['id'], $ch['url']])}}">{{$ch['title']}}</a></li>
                        @endforeach
                    </ul>
                    @endif
                    @endforeach
                </li>
                {{-- <li style="vertical-align:middle; top:3px;" class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-hover">
                        <span class="underline">
                            <svg style="font-size:22px;" class="bi bi-person-circle" width="1em" height="1em"
                                viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M13.468 12.37C12.758 11.226 11.195 10 8 10s-4.757 1.225-5.468 2.37A6.987 6.987 0 0 0 8 15a6.987 6.987 0 0 0 5.468-2.63z" />
                                <path fill-rule="evenodd" d="M8 9a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                <path fill-rule="evenodd"
                                    d="M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1zM0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8z" />
                            </svg>
                        </span>
                        <span class="caret"></span>
                    </a> --}}
                    {{-- <ul class="dropdown-menu">
                        <li>
                            <a href="/login">Најава</a>
                            <a href="/register">Регистрација</a>
                        </li>
                    </ul> --}}
                </li>
            </ul>
        </nav>
    </div>
</div>
@extends('clients.luxbox.layouts.default')
@section('content')
<style>
    .panel-group {
        margin-bottom: 15px;
        padding: 15px 30px;
        background-color: #f9f7f7;
        -webkit-box-shadow: 0 5px 4px 0 rgba(0, 0, 0, 0.15);
        -moz-box-shadow: 0 5px 4px 0 rgba(0, 0, 0, 0.15);
        -ms-box-shadow: 0 5px 4px 0 rgba(0, 0, 0, 0.15);
        box-shadow: 0 5px 4px 0 rgba(0, 0, 0, 0.15);
    }

    .arrow:before {
        content: "\f107";
        font-family: FontAwesome;
        position: absolute;
        /* top: -10px; */
        right: -10px;
        color: black;
    }

    .down:before {
        content: "\f106" !important;
    }

    .panels {
        padding-top: 15px;
    }

    .sub-menu-categories {
        padding-top: 30px;
    }

    .sub-menu-categories > li{

        padding-bottom: 10px;
        text-transform: capitalize;
    }
    .img_categories {
        position: absolute;
        right: 0;
        bottom: -25px;
    }

    .mobile_categories_wrapper {
        padding: 15px 0;
        width: 90%;
    }

    #searchModal__input {
        border-radius: 10px;
    }

    .panel-title {
        position: relative;
    }
</style>
<div class="container mobile_categories_wrapper">
    <h3 class="text-center" style="padding: 15px 0">Производи</h3>
    <!-- <form id="searchModal__form" method="POST">
        <input id="searchModal__input" type="text" name="search" placeholder="Пребарувај ...">
    </form> -->
    <?php $index = 0 ?>


    <div class="panels">
        @foreach($categories as $category)
        <div class="panel-group">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a @if(isset($category['children'])) class="arrow" data-toggle="collapse" href="#collapse{{$index}}
                    @else 
                    @if($category['title']=="Аксесоари")
                    href="/naskoro" 
                    @else
                    href="{{route('category', [$category['id'], $category['url']])}}" 
                    @endif
                    @endif">{{ $category['title'] }}</a>
                    </h4>
                </div>
                @if(isset($category['children']))
                <div id="collapse{{$index}}" class="panel-collapse collapse">
                    <ul class="sub-menu-categories">

                        @foreach($category['children'] as $ch)
                        <li><a @if( $ch['title']=="П маси")
                        href="/naskoro"
                        @else
                        href="{{route('category', [$ch['id'], $ch['url']])}}"
                        @endif
                        >{{ $ch['title'] }}</a></li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </div>
        </div>
        <?php $index++ ?>
        @endforeach
    </div>
</div>
@stop
@section('scripts')

<script>
    $(document).ready(function() {
        $(".arrow").click(function() {

            $(this).toggleClass('down');
        })
    })
</script>


@stop
<style>
    @media(min-width: 992px) {
        .menu_bottom {
            display: none;
        }
    }

    .menu_bottom {
        z-index: 9999;
        overflow: hidden;
        background-color: white;
        position: fixed;
        bottom: 0;
        width: 100%;
        -webkit-box-shadow: 0px -0.1px 2.5px rgba(50, 50, 50, 0.75);
        -moz-box-shadow: 0px -0.1px 2.5px rgba(50, 50, 50, 0.75);
        padding-bottom: 10px;
        box-shadow: 0px -0.1px 2.5px rgba(50, 50, 50, 0.75);
    }

    .menu_bottom .col-3 {
        padding: 0 10px;
    }

    .menu_bottom .col-3:first-child {
        padding-left: 0;
    }

    .menu_bottom a {
        display: block;
        color: black;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
        font-size: 17px;
    }



    @media(max-width: 991px) {
        .menu_bottom a {
            padding: 5px 0px;
            font-size: 12px;
        }
    }

    @media(max-width: 575px) {
        .menu_bottom a {
            padding: 5px 0px;
            font-size: 10px;
        }
    }
</style>
<div class="menu_bottom">
    <div class="row">
        <div class="col-3">
            <a href="/" class="active"><svg width="1.5em" height="1.5em" viewBox="0 0 16 16" style="min-height:25px" class="bi bi-house-door" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M7.646 1.146a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 .146.354v7a.5.5 0 0 1-.5.5H9.5a.5.5 0 0 1-.5-.5v-4H7v4a.5.5 0 0 1-.5.5H2a.5.5 0 0 1-.5-.5v-7a.5.5 0 0 1 .146-.354l6-6zM2.5 7.707V14H6v-4a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5v4h3.5V7.707L8 2.207l-5.5 5.5z" />
                    <path fill-rule="evenodd" d="M13 2.5V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z" />
                </svg> <br>
                Почетна</a>
        </div>
        <div class="col-3" class="">
            <a href="{{route('mobileCategories')}}"><img style="padding: 1px 0 4px 0;" src="{{url_assets('/luxbox/images/icons/table.png')}}" /> <br>
                Производи</a>
        </div>
        <div class="col-3" class="">
            <a href="/po-naracka"><svg width="1.5em" height="1.5em" viewBox="0 0 16 16" style="min-height:25px" class="bi bi-brush" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M15.825.12a.5.5 0 0 1 .132.584c-1.53 3.43-4.743 8.17-7.095 10.64a6.067 6.067 0 0 1-2.373 1.534c-.018.227-.06.538-.16.868-.201.659-.667 1.479-1.708 1.74a8.117 8.117 0 0 1-3.078.132 3.658 3.658 0 0 1-.563-.135 1.382 1.382 0 0 1-.465-.247.714.714 0 0 1-.204-.288.622.622 0 0 1 .004-.443c.095-.245.316-.38.461-.452.393-.197.625-.453.867-.826.094-.144.184-.297.287-.472l.117-.198c.151-.255.326-.54.546-.848.528-.739 1.2-.925 1.746-.896.126.007.243.025.348.048.062-.172.142-.38.238-.608.261-.619.658-1.419 1.187-2.069 2.175-2.67 6.18-6.206 9.117-8.104a.5.5 0 0 1 .596.04zM4.705 11.912a1.23 1.23 0 0 0-.419-.1c-.247-.013-.574.05-.88.479a11.01 11.01 0 0 0-.5.777l-.104.177c-.107.181-.213.362-.32.528-.206.317-.438.61-.76.861a7.127 7.127 0 0 0 2.657-.12c.559-.139.843-.569.993-1.06a3.121 3.121 0 0 0 .126-.75l-.793-.792zm1.44.026c.12-.04.277-.1.458-.183a5.068 5.068 0 0 0 1.535-1.1c1.9-1.996 4.412-5.57 6.052-8.631-2.591 1.927-5.566 4.66-7.302 6.792-.442.543-.796 1.243-1.042 1.826a11.507 11.507 0 0 0-.276.721l.575.575zm-4.973 3.04l.007-.005a.031.031 0 0 1-.007.004zm3.582-3.043l.002.001h-.002z" />
                </svg> <br>
                Дизајнирај</a>
        </div>
        <div class="col-3" class="">
            @if(!auth()->check())
            <a href="/login">
                <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" style="min-height:25px" class="bi bi-person" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M10 5a2 2 0 1 1-4 0 2 2 0 0 1 4 0zM8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm6 5c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
                </svg> <br>
                Најава
            </a>
            @else
            <a href="/profile">
                <svg width="2em" height="2.5em" viewBox="0 0 16 16" class="bi bi-person-fill" fill="blackr" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                </svg>
                <br>
                Профил
            </a>
            @endif
        </div>
    </div>



</div>
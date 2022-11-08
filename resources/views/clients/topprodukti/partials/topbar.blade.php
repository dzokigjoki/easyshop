    <nav id="top" class="htop">
      <div class="container">
        <div class="row"> <span class="drop-icon visible-sm visible-xs"><i class="fa fa-align-justify"></i></span>
          <div class="pull-left flip left-top">
            <div class="links">
              <ul>
                @if(trans('topprodukti.company_phone'))
                <li class="mobile"><a href="callto://{{trans('topprodukti.company_phone')}}"><i class="fa fa-phone"></i>{{trans('topprodukti.company_phone')}}</a></li>
                @endif
                @if(trans('topprodukti.company_address'))
                <li class="email" style="padding: 0 10px;">{{trans('topprodukti.company_address')}}</li>
                @endif
                @if(trans('topprodukti.company_mail'))
                <li class="email"><a href="mailto:{{trans('topprodukti.company_mail')}}"><i class="fa fa-envelope"></i>{{trans('topprodukti.company_mail')}}</a></li>
                @endif
                <li class="email"><a href="{{URL::to('/cart')}}"><i class="fa fa-shopping-cart"></i>{{trans('topprodukti.cart')}}</a></li>
              </ul>
            </div>
          </div>
          <div id="top-links" class="nav pull-right flip">
            <ul>
              
            </ul>
          </div>
        </div>
      </div>
    </nav>
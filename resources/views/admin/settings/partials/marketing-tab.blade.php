<div class="tab-pane" id="marketing">
    <div class="tabbable-line">
        <ul class="nav nav-tabs">
            <li class="active">
                <a href="#mk" data-toggle="tab"> MK </a>
            </li>
            @if(config( 'app.client') === 'topprodukti_mk')
                @include('admin.settings.partials_topprodukti.marketing')
            @elseif(config( 'app.client') === 'globalstore_mk')
                @include('admin.settings.partials_globalstore.marketing')
            @else

            @endif
        </ul>
        <div class="tab-content">
            {{--tabs za razlicni zemji--}}
            @if(config( 'app.client') === 'topprodukti_mk')
                @include('admin.settings.partials_topprodukti.marketing-tabs')
            @elseif(config( 'app.client') === 'globalstore_mk')
                @include('admin.settings.partials_globalstore.marketing-tabs')
            @else
                @include('admin.settings.partials_general_client.marketing-tabs')
            @endif
        </div>
    </div>
</div>

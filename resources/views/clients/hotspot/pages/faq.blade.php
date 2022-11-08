@extends('clients.hotspot.layouts.default')
@section('content')
<style>
    #questions {
        list-style: none;
    }

    #questions>li {
        padding-bottom: 15px;
    }
</style>
<main class="ps-main">
    <div class="container margin_30">
        <div class="row">
            <div class="col-12">
                <div class="page_header">
                    <h1>Често поставувани прашања</h1>
                </div>
                <ul id="questions">
                    <li>
                        <strong>Имате ли достава?</strong>
                        <br>
                        -Да имаме низ цела Република Македонија.
                    </li>
                    <li>
                        <strong>За колку време пристигнуваат порачаните производи?</strong>
                        <br>
                        -За 2-3 работни дена.
                    </li>
                    <li>
                        <strong>Дали има гаранција на производите?</strong>
                        <br>
                        -На одредени производи има од 1-12 месеци.
                    </li>
                    <li>
                        <strong>За колку време се врши сервисирање на мобилен?</strong>
                        <br>
                        - Во зависност од дефектот, од 24h-48h.
                    </li>
                    <li>
                        <strong>Ако во моментот нема на залиха некој производ, дали истиот може да се нарача?</strong>
                        <br>
                        - Да може, но за истиот ќе треба да не исконтактирате.
                    </li>
                    <li>
                        <strong>УСЛУГИ</strong>
                        <br>
                        - Сервисирање на сите видови мобилни телефони
                    </li>
                </ul>
            </div><br>
        </div>
    </div>
</main>
@stop
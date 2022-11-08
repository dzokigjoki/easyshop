@extends('clients.yeppeuda.layouts.default')
@section('content')
<section class="page-title text-center bg-light">
    <div class="container relative clearfix">
        <div class="title-holder">
            <div class="title-text">
                <h1 class="uppercase">F.A.Q</h1>
            </div>
        </div>
    </div>
</section>

<div class="content-wrapper oh">

    <!-- FAQ -->
    <section class="section-wrap faq">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 pt-30">

                    <div class="panel-group accordion mb-50" id="accordion-1">
                        <div class="panel">
                            <div class="panel-heading">
                                <a data-toggle="collapse" data-parent="#accordion-1" href="#collapse-1" class="accordion_click plus">Начин и време на испорака?<span>&nbsp;</span>
                                </a>
                            </div>
                            <div id="collapse-1" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <p>
                                        Периодот за испорака е не подолго од 72 часа, освен во случај на викенд денови или државни и
                                        верски празници (неработни денови). Во рокот на испорака не се пресметуваат викендите и
                                        неработните денови. Доколку станува збор за процесирање на нарачка за производ кој не е
                                        достапен моментално на залиха, возможна е нарачка, со период на испорака од 21 ден. Доколку
                                        производот не биде достапен или испорачан во истиот рок, купувачот има право на поврат на
                                        средствата во целост.
                                    </p>
                                    <p>
                                        Јепуда ДООел увоз извоз Скопје го задржува правото да го продолжи рокот на испорака во
                                        претходен договор со купувачот.
                                        Испораката се врши преку наша сопствена дистрибутивна мрежа и преку служба за испорака на
                                        пратки, зависно од адресата.
                                    </p>
                                    <p>
                                        Испорака се врши секој работен ден од 10 до 20 часот и во сабота од 10 до 14 часот. Во недела и
                                        државни празници не се врши испорака.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="panel pt-10">
                            <div class="panel-heading">
                                <a data-toggle="collapse" data-parent="#accordion-1" href="#collapse-2" class="accordion_click plus">Начин на плакање?<span>&nbsp;</span>
                                </a>
                            </div>
                            <div id="collapse-2" class="panel-collapse collapse">
                                <div class="panel-body">
                                </div>
                            </div>
                        </div>
                        <div class="panel pt-10">
                            <div class="panel-heading">
                                <a data-toggle="collapse" data-parent="#accordion-1" href="#collapse-2" class="accordion_click plus">Оштетен производ или рекламација?<span>&nbsp;</span>
                                </a>
                            </div>
                            <div id="collapse-2" class="panel-collapse collapse">
                                <div class="panel-body">
                                </div>
                            </div>
                        </div>
                        <div class="panel pt-10">
                            <div class="panel-heading">
                                <a data-toggle="collapse" data-parent="#accordion-1" href="#collapse-2" class="accordion_click plus">Како функционира клубот на награди?<span>&nbsp;</span>
                                </a>
                            </div>
                            <div id="collapse-2" class="panel-collapse collapse">
                                <div class="panel-body">
                                </div>
                            </div>
                        </div>
                        <div class="panel pt-10">
                            <div class="panel-heading">
                                <a data-toggle="collapse" data-parent="#accordion-1" href="#collapse-2" class="accordion_click plus">Од каде потекнуваат нашите производи?<span>&nbsp;</span>
                                </a>
                            </div>
                            <div id="collapse-2" class="panel-collapse collapse">
                                <div class="panel-body">
                                </div>
                            </div>
                        </div>
                        <div class="panel pt-10">
                            <div class="panel-heading">
                                <a data-toggle="collapse" data-parent="#accordion-1" href="#collapse-2" class="accordion_click plus">Зашто корејската козметика е бр. 1?<span>&nbsp;</span>
                                </a>
                            </div>
                            <div id="collapse-2" class="panel-collapse collapse">
                                <div class="panel-body">
                                </div>
                            </div>
                        </div>
                    </div> <!-- end accordion -->

                </div> <!-- end col -->
            </div>
        </div>
    </section> <!-- end faq -->
</div>
@stop

@section('scripts')
<script>
    $(document).ready(function() {
        $(".accordion_click").click(function() {
            if ($(this).hasClass("plus")) {
                $(this).removeClass("plus");
                $(this).addClass("minus");
            } else {
                $(this).removeClass("minus");
                $(this).addClass("plus");
            }
        })
    });
</script>
@stop
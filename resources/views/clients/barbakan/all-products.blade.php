@extends('clients.barbakan.layouts.default')
@section('content')
<!-- Page Title -->
<div class="page-title bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-4">
                <h1 class="mb-0">Мени</h1>
            </div>
        </div>
    </div>
</div>

<!-- Page Content -->
<div class="page-content">
    <div class="container">
        <div class="row no-gutters">
            <div class="col-md-10 offset-md-1" role="tablist">
                <!-- Menu Category / Burgers -->
                <div id="Burgers" class="menu-category">
                    <div class="menu-category-title collapse-toggle" role="tab" data-target="#menuBurgersContent" data-toggle="collapse" aria-expanded="true">
                        <div class="bg-image"><img src="https://via.placeholder.com/900x337" alt=""></div>
                        <h2 class="title">Подметач</h2>
                    </div>
                    <div id="menuBurgersContent" class="menu-category-content padded collapse show">
                        <div class="p-4">
                            <div class="row gutters-sm">
                                @foreach( $products as $product )

                                @if(\ArticleHelper::checkIfInCategory($product->id, 3))

                                @include('clients.barbakan.partials.product')

                                @endif
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
                <!-- Menu Category / Pasta -->
                <div id="Pasta" class="menu-category">
                    <div class="menu-category-title collapse-toggle" role="tab" data-target="#menuPastaContent" data-toggle="collapse" aria-expanded="false">
                        <div class="bg-image"><img src="https://via.placeholder.com/900x337" alt=""></div>
                        <h2 class="title">Бургер</h2>
                    </div>
                    <div id="menuPastaContent" class="menu-category-content padded collapse">
                        <div class="p-4">
                            <div class="row gutters-sm">
                                @foreach( $products as $product )
                                @if(\ArticleHelper::checkIfInCategory($product->id, 4))

                                @include('clients.barbakan.partials.product')

                                @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Menu Category / Drinks -->
                <div id="Drinks" class="menu-category">
                    <div class="menu-category-title collapse-toggle" role="tab" data-target="#menuDrinksContent" data-toggle="collapse" aria-expanded="false">
                        <div class="bg-image"><img src="https://via.placeholder.com/900x337" alt=""></div>
                        <h2 class="title">Појадок</h2>
                    </div>
                    <div id="menuDrinksContent" class="menu-category-content padded collapse">
                        <div class="p-4">
                            <div class="row gutters-sm">
                                @foreach( $products as $product )

                                @if(\ArticleHelper::checkIfInCategory($product->id, 5))

                                @include('clients.barbakan.partials.product')

                                @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Menu Category / Pizza -->
                <div id="Pizza" class="menu-category">
                    <div class="menu-category-title collapse-toggle" role="tab" data-target="#menuPizzaContent" data-toggle="collapse" aria-expanded="false">
                        <div class="bg-image"><img src="https://via.placeholder.com/900x337" alt=""></div>
                        <h2 class="title">Смути</h2>
                    </div>
                    <div id="menuPizzaContent" class="menu-category-content padded collapse">
                        <div class="p-4">
                            <div class="row gutters-sm">
                                @foreach( $products as $product )


                                @if(\ArticleHelper::checkIfInCategory($product->id, 6))

                                @include('clients.barbakan.partials.product')

                                @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Menu Category / Sushi -->
                <div id="Sushi" class="menu-category">
                    <div class="menu-category-title collapse-toggle" role="tab" data-target="#menuSushiContent" data-toggle="collapse" aria-expanded="false">
                        <div class="bg-image"><img src="https://via.placeholder.com/900x337" alt=""></div>
                        <h2 class="title">Пијалок</h2>
                    </div>
                    <div id="menuSushiContent" class="menu-category-content padded collapse">
                        <div class="p-4">
                            <div class="row gutters-sm">
                                @foreach( $products as $product )

                                @if(\ArticleHelper::checkIfInCategory($product->id, 7))

                                @include('clients.barbakan.partials.product')

                                @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Menu Category / Desserts -->
                <div id="Desserts" class="menu-category">
                    <div class="menu-category-title collapse-toggle" role="tab" data-target="#menuDessertsContent" data-toggle="collapse" aria-expanded="false">
                        <div class="bg-image"><img src="https://via.placeholder.com/900x337" alt=""></div>
                        <h2 class="title">Вино</h2>
                    </div>
                    <div id="menuDessertsContent" class="menu-category-content padded collapse">
                        <div class="p-4">
                            <div class="row gutters-sm">
                                @foreach( $products as $product )

                                @if(\ArticleHelper::checkIfInCategory($product->id, 8))

                                @include('clients.barbakan.partials.product')

                                @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@stop
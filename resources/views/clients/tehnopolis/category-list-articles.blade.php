@extends('clients.tehnopolis.layouts.default')
@section('content')


        <!-- - - - - - - - - - - - - - Breadcrumbs - - - - - - - - - - - - - - - - -->

        <ul class="breadcrumb">
            <li><a href="/">Почетна</a></li>
            <li>{{$category->title}}</li>
        </ul>
        <section class="products-list">
            <!-- Heading Starts -->
            <h2 class="product-head">{{$category->title}}</h2>
            <!-- Heading Ends -->
            <!-- Products Row Starts -->
            <div class="row">
                <div class="sort-by col-sm-4">
                    <label>Подреди по:</label>

                    <select data-sort="" class="form-control">

                        <option value="created_at" {{$productFilters->selectedSort == 'created_at' ? 'selected="selected"': ''}}>
                            Најнови
                        </option>
                        <option value="price-ASC" {{$productFilters->selectedSort == 'price-ASC' ? 'selected="selected"': ''}}>
                            Цена (Ниска > Висока)
                        </option>
                        <option value="price-DESC" {{$productFilters->selectedSort == 'price-DESC' ? 'selected="selected"': ''}}>
                            Цена (Висока > Ниска)
                        </option>
                        <option value="title-ASC" {{$productFilters->selectedSort == 'title-ASC' ? 'selected="selected"': ''}}>
                            Име (A - Z)
                        </option>
                        <option value="title-DESC" {{$productFilters->selectedSort == 'title-DESC' ? 'selected="selected"': ''}}>
                            Име (Z - A)
                        </option>
                    </select>
                </div>
                <div class="sort-by col-sm-4">

                    <label>Прикажи: </label>

                    <select data-per-page="" class="form-control">
                        <option value="12" {{$productFilters->limit == 12 ? 'selected="selected"': ''}}>12</option>
                        <option value="36" {{$productFilters->limit == 36 ? 'selected="selected"': ''}}>36</option>
                        <option value="99" {{$productFilters->limit == 99 ? 'selected="selected"': ''}}>99</option>
                    </select>

                </div>
                <div class="z-index-0 sort-by col-sm-4" style="padding-top: 15px;">
                    @include('clients.tehnopolis.category-list-article-leftSide')
                </div>
            </div>
            <br>

            <div class="row product-list-row">

                <div data-products-list="">
                    @include('clients.tehnopolis.partials.category-products-list')
                </div>
            </div>
            <!-- - - - - - - - - - - - - - End of products - - - - - - - - - - - - - - - - -->


        </section>

@endsection
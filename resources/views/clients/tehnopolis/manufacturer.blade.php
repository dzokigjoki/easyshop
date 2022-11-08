@extends('clients.tehnopolis.layouts.default')
@section('content')


    <!-- - - - - - - - - - - - - - Page Wrapper - - - - - - - - - - - - - - - - -->

    <div class="secondary_page_wrapper">

        <div class="container">

            <!-- - - - - - - - - - - - - - Breadcrumbs - - - - - - - - - - - - - - - - -->

            <ul class="breadcrumb">

                <li><a href="/">Почетна</a></li>
                <li>{{$manufacturer->name}}</li>

            </ul>

            <div class="row">

                <main class="col-md-12 col-sm-12">


                    <section class="section_offset">

                        <h1>{{$manufacturer->name}}</h1>

                    </section>
            <br>
                    <!-- - - - - - - - - - - - - - Products - - - - - - - - - - - - - - - - -->

                    <div class="section_offset">

                        <div>
                            @include('clients.tehnopolis.partials.manufacturers.list-products')
                        </div>

                    </div>



                    <footer class="bottom_box on_the_sides manufacturers-pagination">
                        {{$products->links()}}
                    </footer>

                    <!-- - - - - - - - - - - - - - End of products - - - - - - - - - - - - - - - - -->

                </main>

            </div><!--/ .row -->

        </div><!--/ .container-->

    </div><!--/ .page_wrapper-->
@endsection
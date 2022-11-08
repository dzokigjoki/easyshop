@extends('clients.bloomtea.layouts.default')
@section('content')
    <section class="how-overlay2 bg-img1" style="background-image: url({{\ImagesHelper::getBlogImage($blog, NULL, 'sm_')}}"
             );">
        <div class="container">
            <div class="txt-center p-t-160 p-b-165">
                <h2 class="txt-l-101 cl0 txt-center p-b-14 respon1">
                    {{$blog->title}}
                </h2>


            </div>
        </div>
    </section>

    <!-- Content page -->
    <section class="bg0 p-t-100 p-b-20">
        <div class="container">
            <div class="row">
                <div class="col-sm-11 col-md-8 col-lg-9 m-rl-auto p-b-80">
                    <!-- detail blog -->
                    <div class="p-b-50">


                        <div class="p-t-30">


                            <div class="flex-w flex-m txt-s-115 cl9 p-t-14 p-b-22">
								<span class="m-r-22">
									{{$blog->created_at}}
								</span>
                            </div>

                            <p class="txt-s-101 cl6 p-b-12">
                                {!! $blog->description !!}
                            </p>

                        </div>

                        <div class="col-sm-11 col-md-4 col-lg-3 m-rl-auto p-b-80">
                            <div class="rightbar">

                                <div class="p-t-40">
                                    <h4 class="txt-m-101 cl3 p-b-37">
                                        Најнови постови
                                    </h4>

                                    <ul>
                                        @foreach($newest as $blog)
                                            <li class="flex-w flex-sb-t p-b-30">
                                                <a href="#" class="size-w-64 wrap-pic-w hov4">
                                                    <img src="{{\ImagesHelper::getBlogImage($blog, NULL, 'sm_')}}"
                                                         alt="{{$blog->title}}" alt="">

                                                </a>

                                                <div class="size-w-65 flex-col-l p-t-7">
                                                    <a href="#" class="txt-m-103 cl3 hov-cl10 trans-04 p-b-3">
                                                        {{$blog->title}}
                                                    </a>

                                                    <span class="txt-s-106 cl9">
											{{$blog->created_at}}
										</span>
                                                </div>
                                            </li>
                                        @endforeach


                                    </ul>
                                </div>

                                <!--  -->

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>




@endsection
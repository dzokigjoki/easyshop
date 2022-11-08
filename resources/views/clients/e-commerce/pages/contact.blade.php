@extends('clients.e-commerce.layouts.default')

@section('content')

    <body>
        <!-- pageWrapper -->
        <div id="pageWrapper">
            <main>
                <!-- introBannerHolder -->
                <section class="introBannerHolder d-flex w-100 bgCover">
                    <div class="container-fluid">
                        <div class="row bgTitle">
                            <div class="col-12 pt-lg-10 pt-md-15 pt-sm-10 pt-6 text-center">
                                <h1 class="headingIV fwEbold playfair mb-4">Contact</h1>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="contactSecBlock container">
                    {{-- <div class="row">
					<header class="col-12 mainHeader mb-10 text-center">
						<p>Lorem ipsum dolor consectetuer adipiscing elit sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna<br class="d-block"> aliquam erat volutpatcommodo consequat.</p>
					</header>
				</div> --}}
                    <div class="row">
                        <div class="col-12">
                            <form class="contactForm" action="send.php" method="POST">
                                {{-- <form id="contact-form" method="POST" action="{{ route('kontakt-forma') }}"> --}}
                                <div class="d-flex flex-wrap row1 mb-md-1">
                                    <div class="form-group coll mb-5">
                                        <input type="text" id="name" class="form-control" name="name"
                                            placeholder="Your name  *">
                                    </div>
                                    <div class="form-group coll mb-5">
                                        <input type="email" class="form-control" id="email" name="Email"
                                            placeholder="Your email  *">
                                    </div>
                                    <div class="form-group coll mb-5">
                                        <input type="tel" class="form-control" id="tel" name="tel"
                                            placeholder="Telephone number  *">
                                    </div>
                                </div>
                                <div class="form-group w-100 mb-6">
                                    <textarea class="form-control" placeholder="Meesage  *"></textarea>
                                </div>
                                <div class="text-center">
                                    <button type="submit"
                                        class="btn btnTheme btnShop md-round fwEbold text-white py-3 px-4 py-md-3 px-md-4">Send
                                        Message</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
                <div class="contactSec container pt-xl-24 pb-xl-23 py-lg-20 pt-md-16 pb-md-10 pt-10 pb-0">
                    <div class="row">
                        <div class="col-12">
                            <ul class="list-unstyled contactListHolder mb-0 d-flex flex-wrap text-center">
                                <li class="mb-lg-0 mb-6">
                                    <span class="icon d-block mx-auto bg-lightGray py-4 mb-4"><i
                                            class="fas fa-map-marker-alt"></i></span>
                                    <strong class="title text-uppercase playfair mb-5 d-block">address</strong>
                                    <address class="mb-0">7th floor - Palace Building - 221B Walk of Fame -<span
                                            class="d-block"> Boston - USA</span></address>
                                </li>
                                <li class="mb-lg-0 mb-6">
                                    <span class="icon d-block mx-auto bg-lightGray py-4 mb-3"><i
                                            class="fas fa-headphones"></i></span>
                                    <strong class="title text-uppercase playfair mb-5 d-block">phone</strong>
                                    <a href="tel:84123456789" class="d-block">(+389) - 70 - 336 - 688</a>
                                    <a href="tel:84321654987" class="d-block">(+389) - 70 - 313 - 233</a>
                                </li>
                                <li class="mb-lg-0 mb-6">
                                    <span class="icon d-block mx-auto bg-lightGray py-5 mb-3"><i
                                            class="fas fa-envelope"></i></span>
                                    <strong class="title text-uppercase playfair mb-5 d-block">email</strong>
                                    <a href="#" class="d-block">mstanojeski@gmail.com</a>
                                    <a href="#" class="d-block">info@Two.lnk</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- mapHolder -->
                <div class="mapHolder">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d193595.91477127143!2d-74.11976341808828!3d40.697403441901386!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew%20York%2C%20NY%2C%20USA!5e0!3m2!1sen!2s!4v1573223498837!5m2!1sen!2s"
                        style="border:0;" allowfullscreen="">
                    </iframe>
                </div>

            </main>
            <!-- footer -->
        </div>
        <!-- include jQuery library -->
        <script src="js/popper.min.js"></script>
        <script src="js/jquery-3.4.1.min.js"></script>
        <!-- include bootstrap popper JavaScript -->

        <!-- include bootstrap JavaScript -->
        <script src="js/bootstrap.min.js"></script>
        <!-- include custom JavaScript -->
        <script src="js/jqueryCustome.js"></script>
    </body>
@stop

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    @include('clients._partials.meta')
    @include('clients._partials.favicon')
    <meta name="facebook-domain-verification" content="8tiizxc79xshp7bd0brnpfnn62bpoc" />
    <link href="{{ url_assets('/naturatherapy/images/logo_tab.png') }}" rel="icon" type="image/png">
    <link rel="stylesheet" href="//stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="//fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ url_assets('/naturatherapy/css/styles.css?v=1') }}">
    <link rel="stylesheet" href="{{ url_assets('/naturatherapy/css/responsive.css') }}">

    @section('style')
    @show
    @include('clients._partials.pixel-init')
    @include('clients._partials.global-styles')


    <script src="{{ url_assets('/naturatherapy/js/jssor.slider-28.0.0.min.js') }}" type="text/javascript"></script>

    <script type="text/javascript">
        window.jssor_1_slider_init = function() {
            var jssor_1_SlideoTransitions = [

                [{
                    b: 500,
                    d: 1000,
                    x: 0,
                    e: {
                        x: 6
                    }
                }],

                [{
                    b: -1,
                    d: 1,
                    x: 100,
                    p: {
                        x: {
                            d: 1,
                            dO: 9
                        }
                    }
                }, {
                    b: 0,
                    d: 2000,
                    x: 0,
                    e: {
                        x: 6
                    },
                    p: {
                        x: {
                            dl: 0.1
                        }
                    }
                }],

                [{
                    b: -1,
                    d: 1,
                    x: 200,
                    p: {
                        x: {
                            d: 1,
                            dO: 9
                        }
                    }
                }, {
                    b: 0,
                    d: 2000,
                    x: 0,
                    e: {
                        x: 6
                    },
                    p: {
                        x: {
                            dl: 0.1
                        }
                    }
                }],

                [{
                    b: -1,
                    d: 1,
                    rX: 20,
                    rY: 90
                }, {
                    b: 0,
                    d: 4000,
                    rX: 0,
                    e: {
                        rX: 1
                    }
                }],

                [{
                    b: -1,
                    d: 1,
                    rY: -20
                }, {
                    b: 0,
                    d: 4000,
                    rY: -90,
                    e: {
                        rY: 7
                    }
                }],

                [{
                    b: -1,
                    d: 1,
                    sX: 2,
                    sY: 2
                }, {
                    b: 1000,
                    d: 3000,
                    sX: 1,
                    sY: 1,
                    e: {
                        sX: 1,
                        sY: 1
                    }
                }],

                [{
                    b: -1,
                    d: 1,
                    sX: 2,
                    sY: 2
                }, {
                    b: 1000,
                    d: 5000,
                    sX: 1,
                    sY: 1,
                    e: {
                        sX: 3,
                        sY: 3
                    }
                }],

                [{
                    b: -1,
                    d: 1,
                    tZ: 300
                }, {
                    b: 0,
                    d: 2000,
                    o: 1
                }, {
                    b: 3500,
                    d: 3500,
                    tZ: 0,
                    e: {
                        tZ: 1
                    }
                }],

                [{
                    b: -1,
                    d: 1,
                    x: 20,
                    p: {
                        x: {
                            o: 33,
                            r: 0.5
                        }
                    }
                }, {
                    b: 0,
                    d: 1000,
                    x: 0,
                    o: 0.5,
                    e: {
                        x: 3,
                        o: 1
                    },
                    p: {
                        x: {
                            dl: 0.05,
                            o: 33
                        },
                        o: {
                            dl: 0.02,
                            o: 68,
                            rd: 2
                        }
                    }
                }, {
                    b: 1000,
                    d: 1000,
                    o: 1,
                    e: {
                        o: 1
                    },
                    p: {
                        o: {
                            dl: 0.05,
                            o: 68,
                            rd: 2
                        }
                    }
                }],

                [{
                    b: -1,
                    d: 1,
                    rY: -720
                }, {
                    b: 0,
                    d: 4000,
                    rY: 60,
                    e: {
                        rY: 10
                    }
                }],

                [{
                    b: -1,
                    d: 1,
                    x: 400,
                    y: 200,
                    rX: 720,
                    rY: 720,
                    p: {
                        x: {
                            d: 1,
                            dO: 4,
                            c: 4
                        },
                        y: {
                            d: 1,
                            dO: 4,
                            c: 4
                        },
                        rX: {
                            d: 1,
                            dO: 68,
                            c: 4
                        },
                        rY: {
                            d: 1,
                            dO: 4,
                            c: 68
                        }
                    }
                }, {
                    b: 0,
                    d: 4000,
                    x: 0,
                    y: 0,
                    o: 1,
                    rX: 0,
                    rY: 0,
                    e: {
                        x: 13,
                        y: 13,
                        o: 13,
                        rX: 13,
                        rY: 13
                    },
                    p: {
                        x: {
                            dl: 0.02,
                            o: 4
                        },
                        y: {
                            dl: 0.02,
                            o: 4
                        },
                        o: {
                            dl: 0.05,
                            o: 4
                        },
                        rX: {
                            dl: 0.02,
                            o: 4
                        },
                        rY: {
                            dl: 0.02,
                            o: 4
                        }
                    }
                }],

                [{
                    b: 0,
                    d: 1000,
                    o: 1,
                    p: {
                        o: {
                            o: 4
                        }
                    }
                }],

                [{
                    b: 1000,
                    d: 1000,
                    o: 1,
                    p: {
                        o: {
                            o: 4
                        }
                    }
                }]

            ];



            var jssor_1_options = {

                $AutoPlay: 1,

                $CaptionSliderOptions: {

                    $Class: $JssorCaptionSlideo$,

                    $Transitions: jssor_1_SlideoTransitions

                },

                $ArrowNavigatorOptions: {

                    $Class: $JssorArrowNavigator$

                },

                $BulletNavigatorOptions: {

                    $Class: $JssorBulletNavigator$

                }

            };



            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);



            /*#region responsive code begin*/



            var MAX_WIDTH = 1100;



            function ScaleSlider() {

                var containerElement = jssor_1_slider.$Elmt.parentNode;

                var containerWidth = containerElement.clientWidth;



                if (containerWidth) {



                    var expectedWidth = Math.min(MAX_WIDTH || containerWidth, containerWidth);



                    jssor_1_slider.$ScaleWidth(expectedWidth);

                } else {

                    window.setTimeout(ScaleSlider, 30);

                }

            }



            ScaleSlider();



            $Jssor$.$AddEvent(window, "load", ScaleSlider);

            $Jssor$.$AddEvent(window, "resize", ScaleSlider);

            $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);

            /*#endregion responsive code end*/

        };
    </script>

    <link href="//fonts.googleapis.com/css?family=Roboto+Condensed:300,300italic,regular,italic,700,700italic&subset=latin-ext,greek-ext,cyrillic-ext,greek,vietnamese,latin,cyrillic" rel="stylesheet" type="text/css" />

    <style>
        /*jssor slider loading skin double-tail-spin css*/

        .jssorl-004-double-tail-spin img {

            animation-name: jssorl-004-double-tail-spin;

            animation-duration: 1.6s;

            animation-iteration-count: infinite;

            animation-timing-function: linear;

        }



        @keyframes jssorl-004-double-tail-spin {

            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(360deg);
            }

        }

        /*jssor slider bullet skin 031 css*/

        .jssorb031 {
            position: absolute;
        }

        .jssorb031 .i {
            position: absolute;
            cursor: pointer;
        }

        .jssorb031 .i .b {
            fill: #000;
            fill-opacity: 0.5;
            stroke: #fff;
            stroke-width: 1200;
            stroke-miterlimit: 10;
            stroke-opacity: 0.3;
        }

        .jssorb031 .i:hover .b {
            fill: #fff;
            fill-opacity: .7;
            stroke: #000;
            stroke-opacity: .5;
        }

        .jssorb031 .iav .b {
            fill: #fff;
            stroke: #000;
            fill-opacity: 1;
        }

        .jssorb031 .i.idn {
            opacity: .3;
        }



        /*jssor slider arrow skin 051 css*/

        .jssora051 {
            display: block;
            position: absolute;
            cursor: pointer;
        }

        .jssora051 .a {
            fill: none;
            stroke: #fff;
            stroke-width: 360;
            stroke-miterlimit: 10;
        }

        .jssora051:hover {
            opacity: .8;
        }

        .jssora051.jssora051dn {
            opacity: .5;
        }

        .jssora051.jssora051ds {
            opacity: .3;
            pointer-events: none;
        }
    </style>
    @yield('styles')

</head>

<body>
    @include('clients.naturatherapy.partials.header')

    @yield('content')

    @include('clients.naturatherapy.partials.footer')

    <!-- Your customer chat code -->
    <div class="fb-customerchat" attribution=setup_tool page_id="103811244334375" logged_in_greeting="Добродојдовте! Како можеме да Ви помогнеме?" logged_out_greeting="Добродојдовте! Како можеме да Ви помогнеме?">
    </div>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="//code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="//stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

    @include('clients._partials.es-object')
    @include('clients._partials.global-scripts')

    @yield('scripts')

    <script src="{{ url_assets('/naturatherapy/javascript/index.js') }}" charset="utf-8"></script>
    <script src="{{ url_assets('/naturatherapy/javascript/main-v1.js') }}" charset="utf-8"></script>
</body>

</html>
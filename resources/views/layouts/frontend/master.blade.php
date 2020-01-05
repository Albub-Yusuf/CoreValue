@yield('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{$title}}</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Sublime project">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{ asset('Frontend/styles/bootstrap4/bootstrap.min.css')}}">
    <link href="{{ asset('Frontend/plugins/font-awesome-4.7.0/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ asset('Frontend/plugins/OwlCarousel2-2.2.1/owl.carousel.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('Frontend/plugins/OwlCarousel2-2.2.1/owl.theme.default.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('Frontend/plugins/OwlCarousel2-2.2.1/animate.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('Frontend/styles/main_styles.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('Frontend/styles/responsive.css')}}">
    <!--Custom Product Grid CSS-->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />


    <style>

        h3.h3{text-align:center;margin:1em;text-transform:capitalize;font-size:1.7em;}

        /********************* Shopping Demo-4 **********************/
        .product-grid4,.product-grid4 .product-image4{position:relative}
        .product-grid4{font-family:Poppins,sans-serif;text-align:center;border-radius:5px;overflow:hidden;z-index:1;transition:all .3s ease 0s}
        .product-grid4:hover{box-shadow:0 0 10px rgba(0,0,0,.2)}
        .product-grid4 .product-image4 a{display:block}
        .product-grid4 .product-image4 img{width:100%;height:auto}
        .product-grid4 .pic-1{opacity:1;transition:all .5s ease-out 0s}
        .product-grid4:hover .pic-1{opacity:0}
        .product-grid4 .pic-2{position:absolute;top:0;left:0;opacity:0;transition:all .5s ease-out 0s}
        .product-grid4:hover .pic-2{opacity:1}
        .product-grid4 .social{width:180px;padding:0;margin:0 auto;list-style:none;position:absolute;right:0;left:0;top:50%;transform:translateY(-50%);transition:all .3s ease 0s}
        .product-grid4 .social li{display:inline-block;opacity:0;transition:all .7s}
        .product-grid4 .social li:nth-child(1){transition-delay:.15s}
        .product-grid4 .social li:nth-child(2){transition-delay:.3s}
        .product-grid4 .social li:nth-child(3){transition-delay:.45s}
        .product-grid4:hover .social li{opacity:1}
        .product-grid4 .social li a{color:#222;background:#fff;font-size:17px;line-height:36px;width:40px;height:36px;border-radius:2px;margin:0 5px;display:block;transition:all .3s ease 0s}
        .product-grid4 .social li a:hover{color:#fff;background:#16a085}
        .product-grid4 .social li a:after,.product-grid4 .social li a:before{content:attr(data-tip);color:#fff;background-color:#000;font-size:12px;line-height:20px;border-radius:3px;padding:0 5px;white-space:nowrap;opacity:0;transform:translateX(-50%);position:absolute;left:50%;top:-30px}
        .product-grid4 .social li a:after{content:'';height:15px;width:15px;border-radius:0;transform:translateX(-50%) rotate(45deg);top:-22px;z-index:-1}
        .product-grid4 .social li a:hover:after,.product-grid4 .social li a:hover:before{opacity:1}
        .product-grid4 .product-discount-label,.product-grid4 .product-new-label{color:#fff;background-color:#16a085;font-size:13px;font-weight:800;text-transform:uppercase;line-height:45px;height:45px;width:45px;border-radius:50%;position:absolute;left:10px;top:15px;transition:all .3s}
        .product-grid4 .product-discount-label{left:auto;right:10px;background-color:#d7292a}
        .product-grid4:hover .product-new-label{opacity:0}
        .product-grid4 .product-content{padding:25px}
        .product-grid4 .title{font-size:15px;font-weight:400;text-transform:capitalize;margin:0 0 7px;transition:all .3s ease 0s}
        .product-grid4 .title a{color:#222}
        .product-grid4 .title a:hover{color:#16a085}
        .product-grid4 .price{color:#16a085;font-size:17px;font-weight:700;margin:0 2px 15px 0;display:block}
        .product-grid4 .price span{color:#909090;font-size:13px;font-weight:400;letter-spacing:0;text-decoration:line-through;text-align:left;vertical-align:middle;display:inline-block}
        .product-grid4 .add-to-cart{border:1px solid #e5e5e5;display:inline-block;padding:10px 20px;color:#888;font-weight:600;font-size:14px;border-radius:4px;transition:all .3s}
        .product-grid4:hover .add-to-cart{border:1px solid transparent;background:#16a085;color:#fff}
        .product-grid4 .add-to-cart:hover{background-color:#505050;box-shadow:0 0 10px rgba(0,0,0,.5)}
        @media only screen and (max-width:990px){.product-grid4{margin-bottom:30px}
        }





    </style>


</head>
<body>

<div class="super_container">

    <!-- Header -->

    <header class="header">
        @include('layouts.frontend._header')
</header>

<!-- Menu -->

<div class="menu menu_mm trans_300">
    <div class="menu_container menu_mm">
        <div class="page_menu_content">

            <div class="page_menu_search menu_mm">
                <form action="#">
                    <input type="search" required="required" class="page_menu_search_input menu_mm" placeholder="Search for products...">
                </form>

            </div>
            <ul class="page_menu_nav menu_mm">
                <li class="page_menu_item has-children menu_mm">
                    <a href="index.html">Home<i class="fa fa-angle-down"></i></a>
                    <ul class="page_menu_selection menu_mm">
                        <li class="page_menu_item menu_mm"><a href="">Categories<i class="fa fa-angle-down"></i></a></li>
                        <li class="page_menu_item menu_mm"><a href="">Product<i class="fa fa-angle-down"></i></a></li>
                        <li class="page_menu_item menu_mm"><a href="">Cart<i class="fa fa-angle-down"></i></a></li>
                        <li class="page_menu_item menu_mm"><a href="">Checkout<i class="fa fa-angle-down"></i></a></li>
                        <li class="page_menu_item menu_mm"><a href="">Contact<i class="fa fa-angle-down"></i></a></li>
                    </ul>
                </li>
                <li class="page_menu_item has-children menu_mm">
                    <a href="categories.html">Categories<i class="fa fa-angle-down"></i></a>
                    <ul class="page_menu_selection menu_mm">
                        <li class="page_menu_item menu_mm"><a href="">Category<i class="fa fa-angle-down"></i></a></li>
                        <li class="page_menu_item menu_mm"><a href="">Category<i class="fa fa-angle-down"></i></a></li>
                        <li class="page_menu_item menu_mm"><a href="">Category<i class="fa fa-angle-down"></i></a></li>
                        <li class="page_menu_item menu_mm"><a href="">Category<i class="fa fa-angle-down"></i></a></li>
                    </ul>
                </li>
                <li class="page_menu_item menu_mm"><a href="index.html">Accessories<i class="fa fa-angle-down"></i></a></li>
                <li class="page_menu_item menu_mm"><a href="#">Offers<i class="fa fa-angle-down"></i></a></li>
                <li class="page_menu_item menu_mm"><a href="contact.html">Contact<i class="fa fa-angle-down"></i></a></li>
            </ul>
        </div>
    </div>

    <div class="menu_close"><i class="fa fa-times" aria-hidden="true"></i></div>

    <div class="menu_social">
        <ul>
            <li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
            <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
            <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
            <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
        </ul>
    </div>
</div>

<!-- Home -->

<div class="home" style="height:500px; width:90%; margin: 0 auto;">
    <div class="home_slider_container">

        <!-- Home Slider -->
        <div class="owl-carousel owl-theme home_slider">

            <!-- Slider Item -->
            <div class="owl-item home_slider_item">
                <div class="home_slider_background" style="background-image:url(Frontend/images/test.png)"></div>
                <div class="home_slider_content_container">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <div class="home_slider_content"  data-animation-in="fadeIn" data-animation-out="animate-out fadeOut">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slider Item -->
            <div class="owl-item home_slider_item">
                <div class="home_slider_background" style="background-image:url(Frontend/images/home_slider_1.jpg)"></div>
                <div class="home_slider_content_container">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <div class="home_slider_content"  data-animation-in="fadeIn" data-animation-out="animate-out fadeOut">
                                    <div class="home_slider_title">A new Online Shop experience.</div>
                                    <div class="home_slider_subtitle">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a ultricies metus. Sed nec molestie eros. Sed viverra velit venenatis fermentum luctus.</div>
                                    <div class="button button_light home_button"><a href="#">Shop Now</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slider Item -->
            <div class="owl-item home_slider_item">
                <div class="home_slider_background" style="background-image:url(Frontend/images/home_slider_1.jpg)"></div>
                <div class="home_slider_content_container">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <div class="home_slider_content"  data-animation-in="fadeIn" data-animation-out="animate-out fadeOut">
                                    <div class="home_slider_title">A new Online Shop experience.</div>
                                    <div class="home_slider_subtitle">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a ultricies metus. Sed nec molestie eros. Sed viverra velit venenatis fermentum luctus.</div>
                                    <div class="button button_light home_button"><a href="#">Shop Now</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!--
            <div class="container">
                <div class="row">
                    <div class="col">
                             <div class="home_slider_dots">
            <ul id="home_slider_custom_dots" class="home_slider_custom_dots">
                <li class="home_slider_custom_dot active">o</li>
                <li class="home_slider_custom_dot">o</li>
                <li class="home_slider_custom_dot">o</li>
            </ul>
        </div>
                    </div>
                </div>
            </div>
            -->
        </div>




</div>
    <!-- Home Slider Dots -->



<!-- Ads -->

<!--Custom Product Grid Test-->
    <div class="container">
        <h3 class="h3">Product </h3>
        <div class="row">
            @yield('product_content')
        </div>
    </div>
    <hr>

<!---->


<!-- Products -->
    <!--
<div class="products">
    <div class="container">
        <div class="row">
            <div class="col">

                <div class="product_grid">


                </div>

            </div>
        </div>
    </div>
</div>
-->
<!-- Ad -->


<!-- Icon Boxes -->
<!-- Newsletter -->
<!-- Footer -->

<div class="footer_overlay"></div>
<footer class="footer">
    <div class="footer_background" style="background-image:url(Frontend/images/footer.jpg)"></div>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="footer_content d-flex flex-lg-row flex-column align-items-center justify-content-lg-start justify-content-center">
                    <div class="footer_logo"><a href="#"></a></div>
                    <div class="copyright ml-auto mr-auto"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></div>
                    <div class="footer_social ml-lg-auto">
                        <ul>
                            <li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
</div>

@include('layouts.frontend._scripts')


</body>
</html>
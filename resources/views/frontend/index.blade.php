<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Wibu Shop</title>
  <meta name="_token" content="{{ csrf_token() }}"/>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta content="Metronic Shop UI description" name="description">
  <meta content="Metronic Shop UI keywords" name="keywords">
  <meta content="keenthemes" name="author">
  <meta property="og:site_name" content="-CUSTOMER VALUE-">
  <meta property="og:title" content="-CUSTOMER VALUE-">
  <meta property="og:description" content="-CUSTOMER VALUE-">
  <meta property="og:type" content="website">
  <meta property="og:image" content="-CUSTOMER VALUE-">
  <meta property="og:url" content="-CUSTOMER VALUE-">
  <link rel="shortcut icon" href="{{asset('favicon.ico')}}">
  <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|PT+Sans+Narrow|Source+Sans+Pro:200,300,400,600,700,900&amp;subset=all" rel="stylesheet" type="text/css">
  <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900&amp;subset=all" rel="stylesheet" type="text/css"><!--- fonts for slider on the index page -->
  <link href="{{asset('frontend/theme/assets/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
  <link href="{{asset('frontend/theme/assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('frontend/theme/assets/pages/css/animate.css')}}" rel="stylesheet">
  <link href="{{asset('frontend/theme/assets/plugins/fancybox/source/jquery.fancybox.css')}}" rel="stylesheet">
  <link href="{{asset('frontend/theme/assets/plugins/owl.carousel/assets/owl.carousel.css')}}" rel="stylesheet">
  <link href="{{asset('frontend/theme/assets/pages/css/components.css')}}" rel="stylesheet">
  <link href="{{asset('frontend/theme/assets/pages/css/slider.css')}}" rel="stylesheet">
  <link href="{{asset('frontend/theme/assets/pages/css/style-shop.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('frontend/theme/assets/corporate/css/style.css')}}" rel="stylesheet">
  <link href="{{asset('frontend/theme/assets/corporate/css/style-responsive.css')}}" rel="stylesheet">
  <link href="{{asset('frontend/theme/assets/corporate/css/themes/red.css')}}" rel="stylesheet" id="style-color">
  <link href="{{asset('frontend/theme/assets/corporate/css/custom.css')}}" rel="stylesheet">
  <style>
    /* Carousel Item Background Images */
.carousel-slider .carousel-item-one {
    background: url(../../../assets/onepage/img/slider/slide1.jpg);
    background-size: cover;
    background-position: center center;
}

.carousel-slider .carousel-item-two {
    background: url(../../../assets/onepage/img/slider/slide2.jpg);
    background-size: cover;
    background-position: center center;
}

.carousel-slider .carousel-item-three {
    background: url(../../../assets/onepage/img/slider/slide3.jpg);
    background-size: cover;
    background-position: center center;
}

.carousel-slider .carousel-item-four {
    background: url(../../../assets/pages/img/shop-slider/slide1/bg.jpg);
    background-size: cover;
    background-position: center center;
}

.carousel-slider .carousel-item-five {
    background: url(../../../assets/pages/img/shop-slider/slide2/bg.jpg);
    background-size: cover;
}

.carousel-slider .carousel-item-six {
    background: url(../../../assets/pages/img/shop-slider/slide3/bg.jpg);
    background-size: cover;
    background-position: center center;
}

.carousel-slider .carousel-item-seven {
    background: url(../../../assets/pages/img/shop-slider/slide4/bg.jpg);
    background-size: cover;
    background-position: center center;
}

.carousel-slider .carousel-item-eight {
    background: url(../../../assets/pages/img/frontend-slider/bg9.jpg);
    background-size: cover;
    background-position: center center;
}

.carousel-slider .carousel-item-nine {
    background: url(../../../assets/pages/img/frontend-slider/bg1.jpg);
    background-size: cover;
    background-position: center center;
}

.carousel-slider .carousel-item-ten {
    background: url(../../../assets/pages/img/frontend-slider/bg2.jpg);
    background-size: cover;
    background-position: center center;
}
  </style>
  @yield('css')
</head>
<body class="ecommerce">
@include('frontend.layout.bar')
@include('frontend.layout.header')
  @yield('produck')
@include('frontend.layout.pre-footer')
@include('frontend.layout.footer')
@include('frontend.layout.pop-up')
@include('frontend.layout.js')
@yield('js')
</body>
</html>

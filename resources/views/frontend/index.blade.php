<!DOCTYPE html>
<html lang="en" ng-app="sampleApp">
<head>
  <meta charset="utf-8">
  <title>Metronic Shop UI</title>
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
  <link rel="shortcut icon" href="favicon.ico">
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
  <link href="{{asset('frontend/theme/assets/pages/css/style-chat.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('frontend/theme/assets/corporate/css/style.css')}}" rel="stylesheet">
  <link href="{{asset('frontend/theme/assets/corporate/css/style-responsive.css')}}" rel="stylesheet">
  <link href="{{asset('frontend/theme/assets/corporate/css/themes/red.css')}}" rel="stylesheet" id="style-color">
  <link href="{{asset('frontend/theme/assets/corporate/css/custom.css')}}" rel="stylesheet">
  <link href="{{asset('frontend/theme/assets/pages/css/popupChat.css')}}" rel="stylesheet" type="text/css">

  <!-- Js Message -->
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.1/angular.min.js"></script>
  <script src="https://www.gstatic.com/firebasejs/3.6.6/firebase.js"></script>
  <!-- Firebase  -->
  <script type="text/javascript">
  // Initialize Firebase
  var config = {
    apiKey: "AIzaSyCaQJIqldPHu_dAgFk8s1F3B9zU_ty7TTE",
    authDomain: "wibu-shop-f5875.firebaseapp.com",
    databaseURL: "https://wibu-shop-f5875.firebaseio.com",
    projectId: "wibu-shop-f5875",
    storageBucket: "wibu-shop-f5875.appspot.com",
    messagingSenderId: "926586751495"
  };
  firebase.initializeApp(config);
  </script>
  <script src="{{asset('js/Chat.js')}}" type="text/javascript"></script>
  <script src="https://cdn.firebase.com/libs/angularfire/2.3.0/angularfire.min.js"></script>


</head>
<body class="ecommerce" ng-controller="SampleCtrl">
  @include('frontend.layout.bar')
@include('frontend.layout.header')
{{-- @include('frontend.layout.sider') --}}
{{-- <div class="main">
  <div class="container"> --}}
    {{-- @include('frontend.layout.ButonProduct') --}}
    @yield('produck')
  {{-- </div>
</div> --}}
@include('frontend.layout.chatPop-up')
@include('frontend.layout.pre-footer')
@include('frontend.layout.footer')
@include('frontend.layout.pop-up')
@include('frontend.layout.js')
</body>
</html>

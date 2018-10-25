<script src="{{asset('frontend/theme/assets/plugins/jquery.min.js')}}" type="text/javascript"></script>
<script src="{{asset('frontend/theme/assets/plugins/jquery-migrate.min.js')}}" type="text/javascript"></script>
<script src="{{asset('frontend/theme/assets/plugins/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('frontend/theme/assets/corporate/scripts/back-to-top.js')}}" type="text/javascript"></script>
<script src="{{asset('frontend/theme/assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js')}}" type="text/javascript"></script>
<script src="{{asset('frontend/theme/assets/plugins/fancybox/source/jquery.fancybox.pack.js')}}" type="text/javascript"></script><!-- pop up -->
<script src="{{asset('frontend/theme/assets/plugins/owl.carousel/owl.carousel.min.js')}}" type="text/javascript"></script><!-- slider for products -->
<script src='{{asset('frontend/theme/assets/plugins/zoom/jquery.zoom.min.js')}}' type="text/javascript"></script><!-- product zoom -->
<script src="{{asset('frontend/theme/assets/plugins/bootstrap-touchspin/bootstrap.touchspin.js')}}" type="text/javascript"></script><!-- Quantity -->
<script src="{{asset('frontend/theme/assets/plugins/uniform/jquery.uniform.min.js')}}" type="text/javascript"></script>
<script src="{{asset('frontend/theme/assets/corporate/scripts/layout.js')}}" type="text/javascript"></script>
<script src="{{asset('frontend/theme/assets/pages/scripts/bs-carousel.js')}}" type="text/javascript"></script>
<script src="{{asset('js/jquery-ui.js')}}" type="text/javascript"></script>
<script src="{{asset('frontend/login/vendor/animsition/js/animsition.min.js')}}"></script>
<script src="{{asset('frontend/login/vendor/bootstrap/js/popper.js')}}"></script>
<script src="{{asset('frontend/login/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('frontend/login/vendor/select2/select2.min.js')}}"></script>
<script src="{{asset('frontend/login/vendor/daterangepicker/moment.min.js')}}"></script>
<script src="{{asset('frontend/login/vendor/daterangepicker/daterangepicker.js')}}"></script>
<script src="{{asset('frontend/login/vendor/countdowntime/countdowntime.js')}}"></script>
<script src="{{asset('frontend/login/js/main.js')}}"></script>
<script src="{{asset('frontend/theme/assets/plugins/rateit/src/jquery.rateit.js')}}" type="text/javascript"></script>
<script type="text/javascript">
    jQuery(document).ready(function() {
        Layout.init();
        Layout.initOWL();
        Layout.initImageZoom();
        Layout.initTouchspin();
        Layout.initTwitter();
        Layout.initSliderRange();
        Layout.initUniform();
        
        //SET TIMEOUT ALERT
    setTimeout(function(){ $('.alert-notification').hide(1000); }, 3000);
    });
</script>
@yield('js.new')

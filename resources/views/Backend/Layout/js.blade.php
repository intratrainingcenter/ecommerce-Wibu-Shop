<script src="{{asset('template/bower_components/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('template/bower_components/jquery-ui/jquery-ui.min.js')}}"></script>
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<script src="{{asset('template/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<script src="{{asset('template/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js')}}"></script>
<script src="{{asset('template/bower_components/jquery-knob/dist/jquery.knob.min.js')}}"></script>
<script src="{{asset('template/bower_components/moment/min/moment.min.js')}}"></script>
<script src="{{asset('template/bower_components/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<script src="{{asset('template/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
<script src="{{asset('template/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
<script src="{{asset('template/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('template/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<script src="{{asset('template/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<script src="{{asset('template/bower_components/fastclick/lib/fastclick.js')}}"></script>
<script src="{{asset('template/dist/js/adminlte.min.js')}}"></script>
<script src="{{asset('template/bower_components/datatables.net-bs/js/dataTables.responsive.js')}}"></script>
{{-- <script src="{{asset('template/dist/js/pages/dashboard.js')}}"></script> --}}
<script src="{{asset('template/dist/js/select2.min.js')}}"></script>
<script src="{{asset('template/dist/js/demo.js')}}"></script>
<!-- onesignal -->
<link rel="manifest" href="/manifest.json" />
<script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>

<script type="text/javascript">
$(document).ready(function() {
  $('.edit_password').hide()
  $('.edit_password-confirm').hide()
  $('.Batal_Reset_password').hide()
  $(document).on('click','.Reset_password',function () {
    $('.edit_password').show()
    $('.edit_password-confirm').show()
    $('.Batal_Reset_password').show()
    $('.Reset_password').hide()
  })
  $(document).on('click','.Batal_Reset_password',function () {
    $('.edit_password').hide()
    $('.edit_password-confirm').hide()
    $('.Batal_Reset_password').hide()
    $('.Reset_password').show()
  })
  $(document).on('click','.Close',function () {
    $('.edit_password').hide()
    $('.edit_password-confirm').hide()
    $('.Batal_Reset_password').hide()
    $('.Reset_password').show()
    $('.edit').val('')
  })

  // SET TIMEOUT ALERT
  setTimeout(function(){ $('.MyAlert').hide(1000); }, 3000);

})
</script>
@yield('footer')

@section('title') User @endsection
@section('js')
<script type="text/javascript">
$(function () {
  // $('#example1').DataTable()
  $('#example2').DataTable({
    'paging'      : true,
    'lengthChange': false,
    'searching'   : false,
    'ordering'    : true,
    'info'        : true,
    'responsive'  : true,
    'autoWidth'   : false
  })
});
setTimeout(function(){$('.notif').hide('slow')}, 3000);
       function ShowImage(input) {
           if (input.files && input.files[0]) {
               var reader = new FileReader();
               reader.onload = function (e) {
                   $('.image')
                       .attr('src', e.target.result)
                       .height(150);
               };
               reader.readAsDataURL(input.files[0]);
           }
       }
</script>
@endsection

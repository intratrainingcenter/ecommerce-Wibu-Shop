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

</script>
@endsection

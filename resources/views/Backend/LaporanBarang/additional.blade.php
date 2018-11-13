@section('title') Laporan Barang @endsection
@section('js')
  <script type="text/javascript">
    function printlayer(layer) {
      var cetaklpBarang  = window.open("print");
      var layout  = document.getElementById(layer);
      cetaklpBarang.document.write(layout.innerHTML.replace('diprint'));
      cetaklpBarang.document.close();
      cetaklpBarang.print();
      cetaklpBarang.close();
    }
  </script>
@endsection

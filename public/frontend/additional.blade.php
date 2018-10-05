@section('header')
	<!-- untuk css kamu -->
@endsection

@section('footer')
	<!-- Untuk Javascript kamu -->
  <script type="text/javascript">
    function printlayer(layer) {
      var cetaklpkeuangan  = window.open("print");
      var layout  = document.getElementById(layer);
      cetaklpkeuangan.document.write(layout.innerHTML.replace('diprint'));
      cetaklpkeuangan.document.close();
      cetaklpkeuangan.print();
      cetaklpkeuangan.close();
    }
  </script>
@endsection

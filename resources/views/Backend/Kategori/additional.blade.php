@section('header')
@endsection
@section('footer')
    <script>
    $(document).ready(function(){
        $('#TableKategoriProduk').DataTable({
            'paging'      : true,
            'lengthChange': true,
            'searching'   : true,
            'ordering'    : true,
            'info'        : true,
            'responsive'  : true,
            'autoWidth'   : false
        })
    })
    </script>
@endsection

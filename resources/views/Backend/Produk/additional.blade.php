@section('header')   

@endsection

@section('footer')
    <script>
    $(document).ready(function(){
        $('#TableProduk').DataTable({
            'paging'      : true,
            'lengthChange': true,
            'searching'   : true,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : false
        })
    })
    </script>
@endsection
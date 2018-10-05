@section('header')   

@endsection

@section('footer')
    <script>
    $(document).ready(function(){
        $('#TablePromo').DataTable({
            'paging'      : true,
            'lengthChange': true,
            'searching'   : true,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : false,
            'responsive'  : true
        })
    })

    </script>
@endsection
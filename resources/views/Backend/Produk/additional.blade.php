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
            'autoWidth'   : false,
            'responsive'  : true
        })
    })

    // Show Image Product
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
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

    // SELECT JENIS PROMO
    $("#jenis_promo").change(function(){
        let Value = $("#jenis_promo").val();
        if (Value == 'Diskon') {
            console.log(Value);
            
            $("#diskon").show();
            $("#bonus").hide();
        } 
        else if (Value == 'Bonus') {
            console.log(Value);
            
            $("#diskon").hide();
            $("#bonus").show();
        } 
        else {
            console.log(Value);
            
            $("#diskon").hide();
            $("#bonus").hide();
        }
    })
    </script>
@endsection
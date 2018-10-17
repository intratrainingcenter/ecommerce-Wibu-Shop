@section('js')
    <script>
        $(document).ready(function(){
            
            $("#EditProfile").click(function(){
                $("#Profile").hide();
                $("#FormEdit").show();
            })

            $("#foto").change(function(){
                ShowImage(this);
            })

            // Show Profile Image
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

        })
    </script>
@endsection
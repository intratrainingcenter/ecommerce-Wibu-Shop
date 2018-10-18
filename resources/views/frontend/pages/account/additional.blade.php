@section('js')
<script>
    $(document).ready(function() {
        $("#EditProfile").click(function() {
            $("#Profile").hide();
            $("#FormEdit").show();
        })
        $("#AddAddress").click(function() {
            $("#Address").hide();
            $("#AddAddressForm").show();
        })
        $("#CancelEditProfile").click(function() {
            $("#Profile").show();
            $("#FormEdit").hide();
        })
        $(".CancelAddress").click(function() {
            $("#AddAddressForm").hide();
            $("#EditAddressForm").hide();
            $("#Address").show();
        })

        // Show Image Onchange
        $("#foto").change(function() {
            ShowImage(this);
        })

        // Show City Onchange
        $("#province").change(function(){
            let province = $("#province").val();
            if (province == "") {
                $("#city").html("<option value=''>--Select City--</option>");
            } else {
                GetCity(province);
            }
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

        // Show City By Province
        function GetCity(province) {
            let option = '';
            $.ajax({
                type: "GET",
                url: "city/"+province,
                data: "",
                success: function (response) {
                    console.log(response);
                    $.each(response, function(key, val){
                        option += "<option value='"+val.city_id+"'>"+val.city_name+"</option>";
                    })

                    $("#city").html("<option value=''>--Select City--</option>"+option);
                    
                }
            })
        }

    })
</script>
@endsection
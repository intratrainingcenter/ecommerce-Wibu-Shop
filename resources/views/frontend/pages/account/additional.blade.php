@section('css')
    <style>
    #Phone::-webkit-inner-spin-button, 
    #Phone::-webkit-outer-spin-button { 
        -webkit-appearance: none; 
        margin: 0; 
    }
    </style>
@endsection

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
            GetProvince();
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
        $("#EditAddress").click(function(){
            $("#DetailAddress").hide();
            $("#EditAddressForm").show();
            GetProvince();
        })
        // disable mousewheel on a input number field when in focus
        $('#EditForm').on('focus', 'input[type=number]', function (e) {
        $(this).on('mousewheel.disableScroll', function (e) {
            e.preventDefault()
        })
        })
        $('#EditForm').on('blur', 'input[type=number]', function (e) {
        $(this).off('mousewheel.disableScroll')
        })

        // Show Image Onchange
        $("#foto").change(function() {
            ShowImage(this);
        })

        // Show City Onchange
        $("#province").change(function(){
            let province = $("#province").val();
            let text     = $('#province option:selected').text();
            if (province == "") {
                $("#city").html("<option value=''>--Select City--</option>");
                $("#province_name").val('');
            } else {
                $("#province_name").val(text);
                GetCity(province);
            }
        })

        $("#city").change(function(){
            let text = $("#city option:selected").text();
            let city = $("#city").val();
            if (city == '') {
                $("#city_name").val('');
            } else {
                $("#city_name").val(text);
                
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

        // Show Province
        function GetProvince() {
            let option = '';
            $.ajax({
                type: "GET",
                url: "{{route('address.province')}}",
                data: "",
                success: function (response) {
                    $.each(response, function(key, val){
                        option += "<option value='"+val.province_id+"'>"+val.province+"</option>";
                    })

                    $("#province").html("<option value=''>--Select City--</option>"+option);
                    
                }
            })
        }

        // Show City By Province
        function GetCity(province) {
            let option = '';
            $.ajax({
                type: "GET",
                url: location.origin + "/pembeli/city/"+province,
                data: "",
                success: function (response) {
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
$(document).ready(function(){
    $("#address").change(function() {
        let code = $(this).val();
        if (code == '') {
            $("#label").html('<label>Please select your delivery address</label>');
        } else {
            Address(code);
        }
    })
})

function Address(code) {
    let text = '';
    $.ajax({
        type: "GET",
        url: location.origin + "/checkout-address",
        data: {
            code: code,
            _token: $("meta[name=_token]").attr("content"),
            _method:'GET'
        },
        success: function (response) {
            text = "<strong><p>" + response.alamat + ", " + response.kota + ", " + response.provinsi + "</p></strong>";
            $("#label").html(text);
            $("#city").val(response.id_kota);
            shippingCost(response.id_kota, 1);
        }
    });
}

function shippingCost(destination, weight) {
    let courier = '';
    let jneOption = '';
    let posOption = '';
    let tikiOption = '';
    $.ajax({
        type: "GET",
        url: location.origin + "/shipping-cost",
        data: {
            destination: destination,
            weight: weight,
            _token: $("meta[name=_token]").attr("content"),
            _method:'GET'
        },
        success: function (response) {
            $.each(response, function(index, collection) {
                courier += "<option value='" + collection[0]['code'] + "'>" + collection[0]['name'] + "</option>";
                $("#courier").html("<option value=''>--Select Courier--</option>" + courier);
                if (collection[0]['code'] == 'jne') {
                    $.each(collection[0]['costs'], function(index, object) {
                        jneOption += "<option value='" + collection[0]['costs'][index]['service'] + "'>" + collection[0]['costs'][index]['service'] + ' (Rp. ' + collection[0]['costs'][index]['cost'][0]['value'] + ') (' + collection[0]['costs'][index]['cost'][0]['etd'] + ' Days)' + "</option>"
                        
                    })
                    $("#jneOption").html(jneOption);
                } else if (collection[0]['code'] == 'pos') {
                    $.each(collection[0]['costs'], function(index, object) {
                        posOption += "<option value='" + collection[0]['costs'][index]['service'] + "'>" + collection[0]['costs'][index]['service'] + ' (Rp. ' + collection[0]['costs'][index]['cost'][0]['value'] + ') (' + collection[0]['costs'][index]['cost'][0]['etd'] + ' Days)' + "</option>"
                        
                    })
                    $("#posOption").html(posOption);
                } else {
                    $.each(collection[0]['costs'], function(index, object) {
                        tikiOption += "<option value='" + collection[0]['costs'][index]['service'] + "'>" + collection[0]['costs'][index]['service'] + ' (Rp. ' + collection[0]['costs'][index]['cost'][0]['value'] + ') (' + collection[0]['costs'][index]['cost'][0]['etd'] + ' Days)' + "</option>"
                        
                    })
                    $("#tikiOption").html(tikiOption);
                }  
            })
            $("#courier").change(function() {
                let value = $(this).val();
                if (value == 'jne') {
                    $("#pos").hide();
                    $("#tiki").hide();
                    $("#jne").show();
                } else if (value == 'pos') {
                    $("#jne").hide();
                    $("#tiki").hide();
                    $("#pos").show();
                } else if (value == 'tiki') {
                    $("#pos").hide();
                    $("#jne").hide();
                    $("#tiki").show();
                } else {
                    $("#pos").hide();
                    $("#jne").hide();
                    $("#tiki").hide();
                }
            })
        }
    });
}
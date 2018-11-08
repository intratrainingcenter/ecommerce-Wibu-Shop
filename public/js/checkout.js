$(document).ready(function(){
    $("#courier").prop('disabled', true);
    $("#courier").prop('title', 'Select address first!');

    $("#address").change(function() {
        let code = $(this).val();
        if (code == '') {
            $("#label").html('<label>Please select your delivery address</label>');
            $("#courier").prop('disabled', true);
            $("#courier").prop('title', 'Select address first!');
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
            $("#courier").val("");
            $("#pos").hide();
            $("#jne").hide();
            $("#tiki").hide();
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
                    let costs = [];
                    $.each(collection[0]['costs'], function(index, object) {
                        jneOption += "<option value='" + index + "'>" + collection[0]['costs'][index]['service'] + ' (Rp. ' + collection[0]['costs'][index]['cost'][0]['value'] + ') (' + collection[0]['costs'][index]['cost'][0]['etd'] + ' Days)' + "</option>";
                        costs.push(collection[0]['costs'][index]['cost'][0]['value']);
                    })
                    $("#jneOption").html("<option value=''>--Select Service--</option>" + jneOption);
                    $("#jneOption").change(function() {
                        let value = $(this).val();
                        let cost = costs[value];
                        if (value == '') {
                            $("#ongkir").val('')
                            $("#ongkirValue").html('<span>Rp.</span>' + addCommas(0));
                        } else {
                            $("#ongkir").val(cost)
                            $("#ongkirValue").html('<span>Rp.</span>' + addCommas(cost));
                            $("#jneOption option:selected").text();
                        }
                    });
                } else if (collection[0]['code'] == 'pos') {
                    let costs = [];
                    $.each(collection[0]['costs'], function(index, object) {
                        posOption += "<option value='" + index + "'>" + collection[0]['costs'][index]['service'] + ' (Rp. ' + collection[0]['costs'][index]['cost'][0]['value'] + ') (' + collection[0]['costs'][index]['cost'][0]['etd'] + ' Days)' + "</option>"
                        costs.push(collection[0]['costs'][index]['cost'][0]['value']);
                    })
                    $("#posOption").html("<option value=''>--Select Service--</option>" + posOption);
                    $("#posOption").change(function() {
                        let value = $(this).val();
                        let cost = costs[value];
                        if (value == '') {
                            $("#ongkir").val('')
                            $("#ongkirValue").html('<span>Rp.</span>' + addCommas(0));
                        } else {
                            $("#ongkir").val(cost)
                            $("#ongkirValue").html('<span>Rp.</span>' + addCommas(cost));
                            $("#posOption option:selected").text();
                        }
                    });
                } else {
                    let costs = [];
                    $.each(collection[0]['costs'], function(index, object) {
                        tikiOption += "<option value='" + index + "'>" + collection[0]['costs'][index]['service'] + ' (Rp. ' + collection[0]['costs'][index]['cost'][0]['value'] + ') (' + collection[0]['costs'][index]['cost'][0]['etd'] + ' Days)' + "</option>"
                        costs.push(collection[0]['costs'][index]['cost'][0]['value']);
                    })
                    $("#tikiOption").html("<option value=''>--Select Service--</option>" + tikiOption);
                    $("#tikiOption").change(function() {
                        let value = $(this).val();
                        let cost = costs[value];
                        if (value == '') {
                            $("#ongkir").val('')
                            $("#ongkirValue").html('<span>Rp.</span>' + addCommas(0));
                        } else {
                            $("#ongkir").val(cost)
                            $("#ongkirValue").html('<span>Rp.</span>' + addCommas(cost));
                            $("#tikiOption option:selected").text();
                        }
                    });
                }  
            })
            $("#courier").change(function() {
                let value = $(this).val();
                if (value == 'jne') {
                    $("#ongkir").val('')
                    $("#ongkirValue").html('<span>Rp.</span>' + addCommas(0));
                    $("#jneOption").val('');
                    $("#pos").hide();
                    $("#posOption").prop('required', false);
                    $("#tiki").hide();
                    $("#tikiOption").prop('required', false);
                    $("#jne").show();
                } else if (value == 'pos') {
                    $("#ongkir").val('')
                    $("#ongkirValue").html('<span>Rp.</span>' + addCommas(0));
                    $("#posOption").val('');
                    $("#jne").hide();
                    $("#tiki").hide();
                    $("#pos").show();
                } else if (value == 'tiki') {
                    $("#ongkir").val('')
                    $("#ongkirValue").html('<span>Rp.</span>' + addCommas(0));
                    $("#tikiOption").val('');
                    $("#pos").hide();
                    $("#jne").hide();
                    $("#tiki").show();
                } else {
                    $("#pos").hide();
                    $("#jne").hide();
                    $("#tiki").hide();
                    $("#ongkir").val('')
                    $("#ongkirValue").html('<span>Rp.</span>' + addCommas(0));
                }
            })

            $("#courier").prop('disabled', false);
            $("#courier").prop('title', '');
        }
    });
}

function addCommas(nStr)
{
	nStr += '';
	x = nStr.split('.');
	x1 = x[0];
	x2 = x.length > 1 ? '.' + x[1] : '';
	var rgx = /(\d+)(\d{3})/;
	while (rgx.test(x1)) {
		x1 = x1.replace(rgx, '$1' + ',' + '$2');
	}
	return x1 + x2;
}
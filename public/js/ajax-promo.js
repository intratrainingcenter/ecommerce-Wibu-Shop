$(document).ready(function(){

    $("#kode_promo").keyup(function() {
        let kode_promo = $(this).val();
        $.ajax({
            type: "GET",
            url: location.origin + "/promo/create",
            data: {
				kode_promo: kode_promo,
				_token: $("meta[name=_token]").attr("content"),
                _method:'GET'
            },
            success: function (data) {
                if (data > 0 || kode_promo == '') {
                    $("#div_kode").addClass('has-error');
                    $(".tooltipkode").tooltip('show');
                    $('#kode_promo').prop('readonly', false);
                    $(".TableOpsi").html('');
                    $("#jenis_promo").val('');
                    $(".diskon").hide();
                    $(".bonus").hide();
                    $('#simpan').prop('disabled',true);
                    $('#jenis_promo').prop('disabled', true);
                    $('#awal').prop('disabled', true);
                    $('#akhir').prop('disabled', true);
                    $('#min').prop('disabled', true);
                    $('#max').prop('disabled', true);
                    $('.AddOpsi').prop('disabled', true);
                    $('#kode_produk').prop('disabled', true);
                    $('#nama_promo').prop('disabled', true);
                } else {
                    $("#div_kode").removeClass('has-error');
                    $(".tooltipkode").tooltip('hide');
                    $('#jenis_promo').prop('disabled', false);
                    $('#awal').prop('disabled', false);
                    $('#akhir').prop('disabled', false);
                    $('#min').prop('disabled', false);
                    $('#max').prop('disabled', false);
                    $('.AddOpsi').prop('disabled', false);
                    $('#kode_produk').prop('disabled', false);
                    $('#nama_promo').prop('disabled', false);
                    
                }                
            }
        });
    })

    $(".AddOpsi").click(function(){
        var key = $(this).attr('key');
		if(key=='add'){
			var kode_promo = $('#kode_promo').val();
			var kode_produk = $('#kode_produk').val();
			$('#kode_promo').prop('readonly', false);	
		}else{
			var kode_promo = $('#kode_promoedit').val();
			var kode_produk = $('#kode_produkedit').val();	
        }
        $.ajax({
            type: "GET",
            url: "add-opsipromo",
            data: {
				kode_promo: kode_promo,
				kode_produk: kode_produk,
				_token: $("meta[name=_token]").attr("content"),
                _method:'GET'
            },
            success: function (response) {
                $('#kode_produk').select2().val('').trigger('change');
                $('#kode_produkedit').select2().val('').trigger('change');
                $('#kode_promo').prop('readonly', true);
                $('#simpan').prop('disabled',false);
                $('#simpan_edit').prop('disabled',false);
                $('.AddOpsi').prop('disabled', true)
                LoadOpsi(kode_promo, 'Add')
            }
        });
    });

    $(".ModalDetail").click(function() {
        let code = $(this).attr('code');
        $.ajax({
            type: "GET",
            url: "show-promo",
            data: {
				kode_promo: code,
				_token: $("meta[name=_token]").attr("content"),
                _method:'GET'
            },
            success: function (data) {
                LoadOpsi(code, 'Detail');
                $("#kode_promodetail").val(data.kode_promo);
                $("#nama_promodetail").val(data.nama_promo);
                $("#min_detail").val(data.min);
                $("#max_detail").val(data.max);
                $("#awal_detail").val(data.tanggal_awal);
                $("#akhir_detail").val(data.tanggal_akhir);
                if (data.jenis_promo == 'Diskon') {
                    $("#div_bonusdetail").hide();
                    $("#jenis_promodetail").val(data.jenis_promo);
                    $("#diskon_detail").val(data.diskon);
                    $("#div_diskondetail").show();
                } else {
                    $("#div_diskondetail").hide();
                    $("#jenis_promodetail").val(data.jenis_promo);
                    $("#bonus_detail").val(data.kode_produk_bonus);
                    $("#div_bonusdetail").show();
                }
                $("#ModalDetail").modal('show');
            }
        });
    })

    $(".ModalEdit").click(function() {
        let code = $(this).attr('code');
        $.ajax({
            type: "GET",
            url: "edit-promo",
            data: {
				kode_promo: code,
				_token: $("meta[name=_token]").attr("content"),
                _method:'GET'
            },
            success: function (data) {
                LoadOpsi(code, 'edit');
                $("#kode_promoedit").val(data.kode_promo);
                $("#nama_promoedit").val(data.nama_promo);
                $('#kode_produkedit').select2().val('').trigger('change');
                $("#min_edit").val(data.min);
                $("#max_edit").val(data.max);
                $("#awal_edit").val(data.tanggal_awal);
                $("#akhir_edit").val(data.tanggal_akhir);
                if (data.jenis_promo == 'Diskon') {
                    $("#div_bonusedit").hide();
                    $("#jenis_promoedit").val(data.jenis_promo);
                    $("#diskon_edit").val(data.diskon);
                    $("#div_diskonedit").show();
                } else {
                    $("#div_diskonedit").hide();
                    $("#jenis_promoedit").val(data.jenis_promo);
                    $('#produk_bonusedit').select2().val(data.kode_produk_bonus).trigger('change');
                    $("#div_bonusedit").show();
                }
                $("#ModalEdit").modal('show');
            }
        });
    })

    // UPDATE PROMO

    $("#FormEdit").submit(function(x) {
        x.preventDefault();
        let code = $("#kode_promoedit").val();
        $.ajax({
            type: "POST",
            url: location.origin + "/promo/" + code,
            data: $("#FormEdit").serialize(),
            success: function (response) {
                location.href = location.origin + "/update-promo";                          
            }
        });
    })

    $('.batalsimpan').click(function () {
		var key = $(this).attr('key');
		if(key == 'add'){
			kode_promo = $('#kode_promo').val();
		}else{
			kode_promo = $('#kode_promoedit').val();
		}
		clearOpsiTemporary(kode_promo);
		clearForm();
	});

})

function LoadOpsi(kode_promo, jenis) {
    $.ajax({
        type: 'GET',
        url: 'load-opsipromo',
        data: {
            kode_promo:kode_promo,
            jenis_promo: jenis,
            _token: $("meta[name=_token]").attr("content"),
            _method:'GET'
        },
        success: function (data) {
            $(".TableOpsi").html(data)
        }
    });
}

function clearOpsiTemporary(kode_promo) {
    $.ajax({
        type: 'DELETE',
        url: 'delete-opsipromo',
        data: {
            type: 'all',
            kode_promo:kode_promo,
            _token: $("meta[name=_token]").attr("content"),
            _method:'DELETE'

        },
        success: function (data) {
        }
    })
        
}

function DeleteOpsi(id, kode_promo) { 
    var row = $("#jumlah_opsi").val();
    $.ajax({
        type: 'DELETE',
        url: 'delete-opsipromo',
        data: {
            type: 'id',
            id:id,
            _token: $("meta[name=_token]").attr("content"),
            _method:'DELETE'
        },
        success: function (response) {
            LoadOpsi(kode_promo, 'show')
			if (row == 1)
			{
				$('#simpan').prop('disabled',true);
				$('#simpan_edit').prop('disabled', true);
				$('#kode_promo').prop('readonly',false);
			}
			else{
				$('#simpan').prop('disabled',false);
				$('#simpan_edit').prop('disabled', false);
				$('#kode_promo').prop('readonly',true);
			}
        }
    });
}


$(document).ready(function() {
    $('#TablePromo').DataTable({
        'paging'      : true,
        'lengthChange': true,
        'searching'   : true,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : false,
        'responsive'  : true
    })
    
    $("#kode_produk").select2();
    $('#produk_bonus').select2();
    $("#kode_produkedit").select2();
    $('#produk_bonusedit').select2();
    
    $("#ShowModalAdd").click(function(){
        $(".TableOpsi").html('');
        $("#jenis_promo").val('');
        $(".diskon").hide();
        $(".bonus").hide();
		$('#simpan').prop('disabled',true);
		$('#kode_promo').prop('readonly', false);
		$("input#kode_promo").on({ 
			keydown: function(e) { 
				if (e.which === 32) 
					return false; 
			}, 
			change: function() { 
				this.value = this.value.replace(/\s/g, ""); 
			} 
		});
		$('#jenis_promo').prop('disabled', true);
		$('#awal').prop('disabled', true);
		$('#akhir').prop('disabled', true);
		$('#min').prop('disabled', true);
		$('#max').prop('disabled', true);
		$('.AddOpsi').prop('disabled', true);
		$('#kode_produk').prop('disabled', true);
        $('#nama_promo').prop('disabled', true);
        $("#ModalAdd").modal('show');
    })

    
    $('#kode_produk').change(function () {
        let kode_produk = $('#kode_produk').val();
        if (kode_produk == '') {
            $('.AddOpsi').prop('disabled', true)
        } else {
            $('.AddOpsi').prop('disabled', false)
        }

    }); 
    $('#kode_produkedit').change(function () {
        let kode_produk = $('#kode_produkedit').val();
        if (kode_produk == '') {
            $('.AddOpsi').prop('disabled', true)
        } else {
            $('.AddOpsi').prop('disabled', false)
        }

    });
    
    // SELECT JENIS PROMO
    $("#jenis_promo").change(function() {
        let Value = $("#jenis_promo").val(); 
        $('#produk_bonus').select2('val','');
        $('#diskon').val('');
        
        if (Value == 'Diskon') {
            $(".diskon").show();
            $("#diskon").prop("required", true);
            $(".bonus").hide();
            $("#produk_bonus").prop("required", false);
        } 
        else if (Value == 'Bonus') {
            $(".diskon").hide();
        $("#diskon").prop("required", false);
        $(".bonus").show();
        $("#produk_bonus").prop("required", true);
        } 
        else {
            $(".diskon").hide();
            $(".bonus").hide();
            $("#diskon").prop("required", false);
            $("#produk_bonus").prop("required", false);
        }
    })

    $("#jenis_promoedit").change(function() {
        let Value = $("#jenis_promoedit").val();
        
        if (Value == 'Diskon') {
            $(".diskon").show();
            $(".input-diskon").prop("required", true);
            $(".bonus").hide();
            $(".input-bonus").prop("required", false);
        } 
        else if (Value == 'Bonus') {
            $(".diskon").hide();
            $(".input-diskon").prop("required", false);
            $(".bonus").show();
            $(".input-bonus").prop("required", true);
        } 
        else {
            $(".diskon").hide();
            $(".bonus").hide();
            $(".input-diskon").prop("required", false);
            $(".input-bonus").prop("required", false);
        }
    })
    // TOOLTIP KODE PROMO EXIST
    $(".tooltipkode").tooltip({
        trigger: 'manual',
        placement: 'top',
        title: 'Isi Kode Dengan Benar',
    });
    $(".tooltipkode").tooltip('hide');

    // TOOLTIP IF MIN AND MAX
    $(".tooltipmax").tooltip({
        trigger: 'manual',
        placement: 'top',
        title: 'Maximum Barang Kurang Dari Minimum Barang',
    });
    $(".tooltipmax").tooltip('hide');

    $(".tooltipmin").tooltip({
        trigger: 'manual',
        placement: 'top',
        title: 'Minimum Barang Lebih Dari Maximum Barang',
    });
    $(".tooltipmin").tooltip('hide');

    // TOOLTIP EXPIRE DATE
    $(".tooltipawal").tooltip({
        trigger: 'manual',
        placement: 'top',
        title: 'Masa Berlaku Awal Lebih Dari Masa Berlaku Akhir',
    });
    $(".tooltipawal").tooltip('hide');

    $(".tooltipakhir").tooltip({
        trigger: 'manual',
        placement: 'top',
        title: 'Masa Berlaku Akhir Kurang Dari Masa Berlaku Awal',
    });
    $(".tooltipakhir").tooltip('hide');

    // TRIGGER TOOLTIP
    $("#max").on('change paste keyup mousewheel click',function(){
        if ( parseInt($("#max").val()) < parseInt($("#min").val()) ) {
            $("#simpan").attr('disabled', true);
            $("#barang").addClass('has-error');
            $(".tooltipmax").tooltip('show');
            $(".tooltipmin").tooltip('hide');
        } else {
            $("#simpan").attr('disabled', false);
            $("#barang").removeClass('has-error');
            $(".tooltipmax").tooltip('hide');
            $(".tooltipmin").tooltip('hide');
        }
    })
    $("#min").on('change paste keyup mousewheel click',function(){
        if ( parseInt($("#min").val()) > parseInt($("#max").val()) ) {
            $("#simpan").attr('disabled', true);
            $("#barang").addClass('has-error');
            $(".tooltipmin").tooltip('show');
            $(".tooltipmax").tooltip('hide');
        } else {
            $("#simpan").attr('disabled', false);
            $("#barang").removeClass('has-error');
            $(".tooltipmin").tooltip('hide');
            $(".tooltipmax").tooltip('hide');
        }
    })
    $("#max_edit").on('change paste keyup mousewheel click',function(){
        if ( parseInt($("#max_edit").val()) < parseInt($("#min_edit").val()) ) {
            $("#simpan_edit").attr('disabled', true);
            $("#barang_edit").addClass('has-error');
            $(".tooltipmax").tooltip('show');
            $(".tooltipmin").tooltip('hide');
        } else {
            $("#simpan_edit").attr('disabled', false);
            $("#barang_edit").removeClass('has-error');
            $(".tooltipmax").tooltip('hide');
            $(".tooltipmin").tooltip('hide');
        }
    })
    $("#min_edit").on('change paste keyup mousewheel click',function(){
        if ( parseInt($("#min_edit").val()) > parseInt($("#max_edit").val()) ) {
            $("#simpan_edit").attr('disabled', true);
            $("#barang_edit").addClass('has-error');
            $(".tooltipmin").tooltip('show');
            $(".tooltipmax").tooltip('hide');
        } else {
            $("#simpan_edit").attr('disabled', false);
            $("#barang_edit").removeClass('has-error');
            $(".tooltipmin").tooltip('hide');
            $(".tooltipmax").tooltip('hide');
        }
    })
    $("#awal").on('change paste keyup mousewheel click',function(){
        if ( Date.parse($("#awal").val()) > Date.parse($("#akhir").val()) ) {
            $("#simpan").attr('disabled', true);
            $("#tanggal").addClass('has-error');
            $(".tooltipawal").tooltip('show');
            $(".tooltipakhir").tooltip('hide');
        } else {
            $("#simpan").attr('disabled', false);
            $("#tanggal").removeClass('has-error');
            $(".tooltipawal").tooltip('hide');
            $(".tooltipakhir").tooltip('hide');
        }
    })
    $("#akhir").on('change paste keyup mousewheel click',function(){
        if ( Date.parse($("#awal").val()) > Date.parse($("#akhir").val()) ) {
            $("#simpan").attr('disabled', true);
            $("#tanggal").addClass('has-error');
            $(".tooltipawal").tooltip('hide');
            $(".tooltipakhir").tooltip('show');
        } else {
            $("#simpan").attr('disabled', false);
            $("#tanggal").removeClass('has-error');
            $(".tooltipawal").tooltip('hide');
            $(".tooltipakhir").tooltip('hide');
        }
    })
    $("#awal_edit").on('change paste keyup mousewheel click',function(){
        if ( Date.parse($("#awal_edit").val()) > Date.parse($("#akhir_edit").val()) ) {
            $("#simpan_edit").attr('disabled', true);
            $("#tanggal_edit").addClass('has-error');
            $(".tooltipawal").tooltip('show');
            $(".tooltipakhir").tooltip('hide');
        } else {
            $("#simpan_edit").attr('disabled', false);
            $("#tanggal_edit").removeClass('has-error');
            $(".tooltipawal").tooltip('hide');
            $(".tooltipakhir").tooltip('hide');
        }
    })
    $("#akhir_edit").on('change paste keyup mousewheel click',function(){
        if ( Date.parse($("#awal_edit").val()) > Date.parse($("#akhir_edit").val()) ) {
            $("#simpan_edit").attr('disabled', true);
            $("#tanggal_edit").addClass('has-error');
            $(".tooltipawal").tooltip('hide');
            $(".tooltipakhir").tooltip('show');
        } else {
            $("#simpan_edit").attr('disabled', false);
            $("#tanggal_edit").removeClass('has-error');
            $(".tooltipawal").tooltip('hide');
            $(".tooltipakhir").tooltip('hide');
        }
    })

})

function clearForm() {
    $(".tooltipkode").tooltip('hide');
    $(".tooltipmin").tooltip('hide');
    $(".tooltipmax").tooltip('hide');
    $(".tooltipawal").tooltip('hide');
    $(".tooltipakhir").tooltip('hide');
    $('#FormAdd').closest('form').find(".form-control").val("");
    $('#FormAdd').closest('form').find(".bonus, .diskon").hide();
    $('#kode_produk').select2('val','');
}
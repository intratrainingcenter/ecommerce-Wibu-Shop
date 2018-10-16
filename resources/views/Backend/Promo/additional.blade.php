@section('header')@endsection

@section('footer')
    <script>
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
    })

    // SELECT JENIS PROMO
    $(".jenis_promo").change(function() {
        let Value = $(".jenis_promo").val();
        if (Value == 'Diskon') {
            $(".diskon").show();
            $(".bonus").hide();
        } 
        else if (Value == 'Bonus') {
            $(".diskon").hide();
            $(".bonus").show();
        } 
        else {
            $(".diskon").hide();
            $(".bonus").hide();
        }
    })

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
	$(".max").on('change paste keyup mousewheel click',function(){
		if ( parseInt($(".max").val()) < parseInt($(".min").val()) ) {
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
	$(".min").on('change paste keyup mousewheel click',function(){
		if ( parseInt($(".min").val()) > parseInt($(".max").val()) ) {
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
    $(".awal").on('change paste keyup mousewheel click',function(){
		if ( Date.parse($(".awal").val()) > Date.parse($(".akhir").val()) ) {
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
    $(".akhir").on('change paste keyup mousewheel click',function(){
		if ( Date.parse($(".awal").val()) > Date.parse($(".akhir").val()) ) {
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
    </script>
@endsection
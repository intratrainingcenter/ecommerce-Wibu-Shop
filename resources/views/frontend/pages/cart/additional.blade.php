@section('css')
@endsection
@section('js')
<script>
$(document).ready(function(){
    LoadCart();
    function Show() {
        $.ajax({
            type: "GET",
            url: "{{route('show.cart')}}",
            data: "",
            success: function (response) {
                $.each(response, function (index, value) {
                    $("#"+value.id).on('change paste keyup mousewheel', function(){
                    let jumlah = $(this).val();
                    if (jumlah == 0) {
                      UpdateItem(value.kode_keranjang, value.kode_produk, 1, value.harga)
                    }else {
                      UpdateItem(value.kode_keranjang, value.kode_produk, jumlah, value.harga)
                    }
                    })
                });
            }
        });
    }
    function LoadCart() {
        $.ajax({
            type: "GET",
            url: "{{route('load.cart')}}",
            data: "",
            success: function (response) {
                $("#shop-cart").html(response);
                Show();
            }
        });
    }
    function UpdateItem(kode_keranjang, kode_produk, jumlah, harga) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        $.ajax({
            type: "POST",
            url: location.origin + "/update-item/" + kode_keranjang + "/" + kode_produk,
            data: {
                jumlah            : jumlah,
                harga             : harga,
				'_method'         :'POST'
            },
            success: function (data) {
                LoadCart();
            }
        });
    }
})
</script>
@endsection

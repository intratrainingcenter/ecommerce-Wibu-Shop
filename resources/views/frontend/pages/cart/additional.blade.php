@section('css')
    <style>
    .quantity::-webkit-inner-spin-button,
    .quantity::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }
    </style>
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
                    // var id = $(this).attr('idproduct');
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
    // $(document).on('keyup','.quantity',function () {
    //   var qty = $(this).val();
    //   var diskon = "";
    //   var id = $(this).attr('idproduct');
    //   if (qty == 0) {
    //   }else {
    //     $.ajax({
    //       url: 'getPromo/' + id,
    //       type: 'GET',
    //       data: {param1: id,
    //             qty: qty,
    //           _method: 'GET'
    //         }
    //     })
    //     .done(function(data) {
    //       $.each(data,function(index, el) {
    //         $.each(el,function (ind,el2) {
    //           diskon += el2.diskon;
    //         })
    //         console.log(diskon);
    //       });
    //       $('.promo').html(diskon);
    //     })
    //     .fail(function() {
    //       console.log("error");
    //     });
    //   }
    // });
})
</script>
@endsection

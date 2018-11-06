@section('title')
    Penambahan stok Product
@endsection

@section('js')
  <script type="text/javascript">
  $(document).ready(function() {
// change
    $('#KodeBarang').on('change', function() {
        var kode = $(this).val();
        if (kode == "none") {
          $('#hargatampil').val(formatRupiah(0));
          $('#harga').val(0);
          $('#stock').val(0);
          $('#subtotal').val(0);
          $('.add').prop('disabled', true);
          $('.alertjumlah').tooltip('hide');
          $('#stock').prop('disabled', true)
        }else {
          $.getJSON('/pembelianProduct/product/' + kode , function(data) {
              $.each(data, function(index, object) {
                $('#hargatampil').val(formatRupiah(object.hpp));
                $('#harga').val(object.hpp);
                $('#stock').val(1);
                $('#subtotal').val(1 * object.hpp);
                $('.add').prop('disabled', false);
                $('.alertjumlah').tooltip('hide');
                $('#stock').prop('disabled', false)
              });
          });
        }
      });
// keyup
      $(document).on('keyup','#stock',function() {
        var stock = $(this).val();
        var subtotal = $('#harga').val();
        $('#subtotal').val(stock * subtotal);
        if (stock <= 0 ) {
          $(".alertjumlah").tooltip('show');
          $(".add").prop("disabled", true);
        } else if (stock == '') {
          $(".alertjumlah").tooltip('show');
          $(".add").prop("disabled", true);
        } else {
          $(".alertjumlah").tooltip('show');
          $(".add").prop("disabled", false);
        }
      });
// add
      $(document).on('click','.add',function () {
        var code = $('#kodePembelaian').val();

        text='';
        no= null;
        $.ajax({
          url: '/pembelianProduct/product/tambah',
          type: 'POST',
          data: {
            '_token': $('input[name=_token]').val(),
            'kodePembelian': $('#kodePembelaian').val(),
            'kodeUser': $('#kodeUser').val(),
            'kodebarang': $('#KodeBarang').val(),
            'harga': $('#harga').val(),
            'stock': $('#stock').val(),
            'subtotal': $('#subtotal').val(),
          },success: function (data) {
            loadopsi(code);
            $("#isikode").val(code);
    				$("#KodeBarang").val('none');
    				$("#hargatampil").val(formatRupiah(0));
    				$("#harga").val(0);
    				$("#stock").val(0);
    				$("#subtotal").val(0);
    				$("#stock").prop("disabled", true);
    				$("#showmodaltambah").prop("disabled", false);
    			}
        });
      });
//pengajuan
      $('#showmodaltambah').click(function() {
        var info = $('#isikode').val();
        $('#infokode').html(info);
        $('#simpan').modal('show');
      });
      $('#Diajukan').click(function() {
        var code = $('#isikode').val();
        let token = $('input[name=_token]').val();
        // alert(token);
        // alert(code);
        $.ajax({
          url: '/pembelianProduct/product/pengajuan/'+code,
          type: 'POST',
          data: { kode: code,
                _token:token,
                _method: 'POST',
            },
        })
        .done(function() {
          console.log("success");
          $('#simpan').modal('hide');
        })
        .fail(function() {
          console.log("error");
        });

      });
  });
  // loadOpsi
        function loadopsi(kode) {
          var opsi = "";
          $.ajax({
            url: '/pembelianProduct/product/loadopsi/'+kode,
            type: 'GET',
            data: { param1: kode },
          })
          .done(function(data) {
            $('#tempatdata').html(data);
              var sum = 0;
        				$(".sub").each(function() {
                sum += +this.value;
                $("#textgrandtot").html(formatRupiah(sum));
      					$("#isigrandtot").val(sum);
              });
            $('.add').prop('disabled', true);
          })
          .fail(function() {
            console.log("error");
          });
        }
  // format rupiah
          function formatRupiah(angka){
            var rupiah = '';
            var angkarev = angka.toString().split('').reverse().join('');
            for(var i = 0; i < angkarev.length; i++) if(i%3 == 0) rupiah += angkarev.substr(i,3)+'.';
            return "Rp " + rupiah.split('',rupiah.length-1).reverse().join('')+",00";
          }
// deleteOpsi
        function delopsi(id,kode) {
          var jumlah = $('#opsi').val();
          var code = $('#kodePembelaian').val();
          let token = $('input[name=_token]').val();

          $.ajax({
            url: '/pembelianProduct/product/hapusopsi',
            type: 'DELETE',
            data: { id: id,
                    _token: token,
            				_method: 'DELETE',
            }
          })
          .done(function(data) {
            loadopsi(code);
              var sum = 0;
        				$(".sub").each(function() {
                sum += +this.value;
                $("#textgrandtot").html(formatRupiah(sum));
      					$("#isigrandtot").val(sum);
              });
              if (jumlah == 1) {
        						$("#showmodaltambah").prop("disabled", true);
        						$("#textgrandtot").html(formatRupiah(0));

        					}
        			else{
        				$("#showmodaltambah").prop("disabled", false);
        				$("#textgrandtot").html(formatRupiah(sum));
        			}
          })
          .fail(function(data) {
            console.log("error");
          });

        }
// number
          function hanyaAngka(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57))

            return false;
            return true;
          }
  </script>
@endsection

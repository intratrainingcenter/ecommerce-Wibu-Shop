@section('title') User @endsection
@section('js')
<script type="text/javascript">
  $(document).ready(function() {
    $('.edit_password').hide()
    $('.edit_password-confirm').hide()
    $('.Batal_Reset_password').hide()
    $(document).on('click','.Reset_password',function () {
      $('.edit_password').show()
      $('.edit_password-confirm').show()
      $('.Batal_Reset_password').show()
      $('.Reset_password').hide()
    })
    $(document).on('click','.Batal_Reset_password',function () {
      $('.edit_password').hide()
      $('.edit_password-confirm').hide()
      $('.Batal_Reset_password').hide()
      $('.Reset_password').show()
    })
    $(document).on('click','.Close',function () {
      $('.edit_password').hide()
      $('.edit_password-confirm').hide()
      $('.Batal_Reset_password').hide()
      $('.Reset_password').show()
      $('.edit').val('')
    })
    // $(document).on('keyup','.password_edit',function () {
    //   $confrim_password = $('.password_confrimation').val();
    //   $password = $(this).val();
    //
    //   })
    // $(document).on('keyup','.password_confrimation',function () {
    //   $confrim_password = $(this).val()
    //   $password = $('.password_edit').val();
    //
    // })

  });
</script>
@endsection

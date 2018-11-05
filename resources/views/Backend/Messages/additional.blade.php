@section('header')
<link rel="stylesheet" href='https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css'>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.2/css/font-awesome.min.css'>
<link rel="stylesheet" href="{{asset('css/Chat_Backend.css')}}">
<input type="hidden" class="uEmail" name="" value="{{Auth::user()->email}}">
@endsection

@section('footer')
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js" type="text/javascript"></script>
<!-- Js Message -->
<script src="https://www.gstatic.com/firebasejs/3.6.6/firebase.js"></script>
<script src="{{asset('js/Chat_Backend.js')}}" charset="utf-8"></script>

<!-- Firebase  -->
<script src="{{asset('js/FireBase.js')}}" type="text/javascript"></script>
@endsection

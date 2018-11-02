@section('header')
<link rel="stylesheet" href='https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css'>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.2/css/font-awesome.min.css'>
<link rel="stylesheet" href="{{asset('css/Chat_Backend.css')}}">
@endsection

@section('footer')
<script src="{{asset('js/Chat_Backend.js')}}" charset="utf-8"></script>
<script src="{{asset('js/OneSignal.js')}}" type="text/javascript"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js" type="text/javascript"></script>
<!-- onesignal -->
<link rel="manifest" href="/manifest.json" />
<script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>
<!-- Js Message -->
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.1/angular.min.js"></script>
<script src="https://www.gstatic.com/firebasejs/3.6.6/firebase.js"></script>
<script src="{{asset('js/Chat_Push.js')}}" type="text/javascript"></script>
<script src="https://cdn.firebase.com/libs/angularfire/2.3.0/angularfire.min.js"></script>

<!-- Firebase  -->
<script src="{{asset('js/FireBase.js')}}" type="text/javascript"></script>
@endsection

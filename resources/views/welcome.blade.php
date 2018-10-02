<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif

            <div class="content">
                    @if ($message = Session::get('success'))
                    <div class="w3-panel w3-green w3-display-container">
                        <span onclick="this.parentElement.style.display='none'"
                                class="w3-button w3-green w3-large w3-display-topright">&times;</span>
                        <p>{!! $message !!}</p>
                    </div>
                    <?php Session::forget('success');?>
                    @endif

                    @if ($message = Session::get('error'))
                    <div class="w3-panel w3-red w3-display-container">
                        <span onclick="this.parentElement.style.display='none'"
                                class="w3-button w3-red w3-large w3-display-topright">&times;</span>
                        <p>{!! $message !!}</p>
                    </div>
                    <?php Session::forget('error');?>
                    @endif
                <div class="title m-b-md">
                    <pre id="test"></pre>
                </div>
            </div>
        </div>
    </body>
    <script src="https://www.gstatic.com/firebasejs/5.5.2/firebase.js"></script>
    <script src="js/app2.js" charset="utf-8"></script>
    <script type="text/javascript">
    var ref = firebase.database().ref("test");
    ref.on('value',function(snapshot){
      console.log(snapshot.val())
    })

    </script>
</html>

@extends('frontend.index')
@extends('frontend.pages.auth.additional')
@section('produck')
  <div class="main">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="/">Home</a></li>
            <li><a href="{{route('pembeli.login')}}">Login</a></li>
        </ul>
        @include('frontend.pages.account.alert')
        <div class="limiter" style="margin-top:50px;">
            <div class="container-login100">
                <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54"style="">
                    <form class="login100-form validate-form" method="POST" action="{{route('pembeli.login.submit')}}">
                        @csrf
                        <span class="login100-form-title p-b-49">
                            Login
                        </span>
    
                        <div class="wrap-input100 validate-input m-b-23" data-validate = "Email is required">
                            <span class="label-input100">Email</span>
                            <input class="input100" type="email" name="email" placeholder="Type your email">
                            <span class="focus-input100" data-symbol="&#xf206;"></span>
                        </div>
    
                        <div class="wrap-input100 validate-input" data-validate="Password is required">
                            <span class="label-input100">Password</span>
                            <input class="input100" type="password" name="password" placeholder="Type your password">
                            <span class="focus-input100" data-symbol="&#xf190;"></span>
                        </div>
                        <a href="#">Forgot Password?</a><br><br>
                        
                        <div class="container-login100-form-btn">
                            <div class="wrap-login100-form-btn">
                                <div class="login100-form-bgbtn"></div>
                                <button class="login100-form-btn" type="submit">
                                    Login
                                </button>
                            </div>
                        </div>
    
                        <div class="flex-col-c p-t-155" style="margin-top:-100px">
                            <span class="txt1 p-b-17">
                                Or 
                            </span>
    
                            <a href="{{route('pembeli.register')}}" class="txt2">
                                Sign Up
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
  </div>
@endsection

@extends('frontend.index')
@extends('frontend.pages.auth.additional')
@section('produck')
  <div class="main">
    <div class="container">
        <ul class="breadcrumb"><li><a href="/">Home</a></li><li><a href="{{route('pembeli.register')}}">Register</a></li></ul>
        @include('frontend.pages.account.alert')
        <div class="limiter" style="margin-top:50px;">
            <div class="container-login100">
                <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
                    <form class="login100-form validate-form" method="POST" action="{{route('pembeli.register.submit')}}">
                        @csrf
                        <span class="login100-form-title p-b-49">Register</span>
                        <div class="wrap-input100 validate-input m-b-23" >
                            <span class="label-input100">Nama</span>
                            <input class="input100" type="nama" name="nama">
                            <span class="focus-input100" data-symbol="&#xf206;"></span>
                        </div>
                        <div class="wrap-input100 validate-input m-b-23" >
                            <span class="label-input100">Jenis Kelamin</span>
                            <select class="input100" name="jenis_kelamin">
                                <option value="">--Pilih Jenis Kelamin--</option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                            <span class="focus-input100" data-symbol="&female;"></span>
                        </div>
                        <div class="wrap-input100 validate-input m-b-23" >
                            <span class="label-input100">Email</span>
                            <input class="input100" type="email" name="email">
                            <span class="focus-input100" data-symbol="&commat;"></span>
                        </div>
                        <div class="wrap-input100 validate-input" >
                            <span class="label-input100">Password</span>
                            <input class="input100" type="password" name="pass">
                            <span class="focus-input100" data-symbol="&#xf190;"></span>
                        </div>
                        <div class="text-right p-t-8 p-b-31">
                        </div>
                        <div class="container-login100-form-btn">
                            <div class="wrap-login100-form-btn">
                                <div class="login100-form-bgbtn"></div>
                                <button class="login100-form-btn" type="submit">Sign Up</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
  </div>
@endsection

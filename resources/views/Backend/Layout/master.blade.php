<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>@yield('title')</title>
  @include('Backend.Layout.css')
</head>
<body class="hold-transition skin-blue sidebar-mini-fixed fixed">
<div class="wrapper">

    @include('Backend.Layout.header')

    @yield('content')

    @include('Backend.User.Pop_Up_Edit_Profil_User')
    @include('Backend.Layout.footer')

</div>
</body>
<!-- ./wrapper -->
  @include('Backend.Layout.js')
  @yield('js')
</html>

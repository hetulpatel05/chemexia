<!DOCTYPE html>

<html lang="en">

<head>

  @include('Auth.Layout.auth_header') 

</head>

<body class="hold-transition login-page">

  <div class="login-box">

    <div class="login-logo">      

      <a href="#" class="mytextcolor">  ChemExia<b></b></a>

    </div>

    <!-- /.login-logo -->

    @yield('content')

  </div>

  <!-- /.login-box -->



  <!-- jQuery -->

  @include('Auth.Layout.auth_script')

</body>

</html>
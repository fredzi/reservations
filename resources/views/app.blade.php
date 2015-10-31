<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin </title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link href="{{ asset("/bower_components/AdminLTE/bootstrap/css/bootstrap.min.css") }}" rel="stylesheet" type="text/css" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link href="{{ asset("/bower_components/AdminLTE/dist/css/AdminLTE.min.css")}}" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset("/bower_components/AdminLTE/plugins/iCheck/square/blue.css")}}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition login-page">
    <div class="login-box">
      <div class="login-logo">
        <h1><b>Panel administracyjny</b><br><small>rezerwujemybilety.pl</small></h1>
      </div><!-- /.login-logo -->
      
      <div class="login-box-body">
        





        @yield('formularz')


        

        

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->
    <script src="{{ asset("/bower_components/AdminLTE/plugins/jQuery/jQuery-2.1.4.min.js")}}"></script>
    <!-- jQuery 2.1.4 -->
    
     <!-- iCheck -->
    <script src="{{ asset("/bower_components/AdminLTE/plugins/iCheck/icheck.min.js")}}"></script>

    <!-- Bootstrap 3.3.5 -->
    <script src="{{ asset("/bower_components/AdminLTE/bootstrap/js/bootstrap.min.js")}}"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>

    @section('js')

    
    @endsection
  </body>
</html>
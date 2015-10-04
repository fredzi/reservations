<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
  <head>
    <meta charset="UTF-8">
    <title>{{ "Panel administracyjny" }}</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="{{ asset("/bower_components/AdminLTE/bootstrap/css/bootstrap.min.css") }}" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="{{ asset("/bower_components/AdminLTE/dist/css/AdminLTE.min.css")}}" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect.
    -->
    <link href="{{ asset("/bower_components/AdminLTE/dist/css/skins/skin-blue.min.css")}}" rel="stylesheet" type="text/css" />

    
   
    <!-- Theme style -->
    
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <link href="{{ asset('/bower_components/AdminLTE/dist/css/skins/_all-skins.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="{{ asset('/bower_components/AdminLTE/plugins/iCheck/flat/blue.css') }}" rel="stylesheet" type="text/css" />
    <!-- Morris chart -->
    <link href="{{ asset('/bower_components/AdminLTE/plugins/morris/morris.css') }}" rel="stylesheet" type="text/css" />
    <!-- jvectormap -->
    <link href="{{ asset('/bower_components/AdminLTE/plugins/jvectormap/jquery-jvectormap-1.2.2.css') }}" rel="stylesheet" type="text/css" />
    <!-- Date Picker -->
    <link href="{{ asset('/bower_components/AdminLTE/plugins/datepicker/datepicker3.css') }}" rel="stylesheet" type="text/css" />
    <!-- Daterange picker -->
    <link href="{{ asset('/bower_components/AdminLTE/plugins/daterangepicker/daterangepicker-bs3.css') }}" rel="stylesheet" type="text/css" />
    <!-- bootstrap wysihtml5 - text editor -->
    <link href="{{ asset('/bower_components/AdminLTE/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}" rel="stylesheet" type="text/css" />
   
  </head>
  <body class="skin-blue">
    <div class="wrapper">

      <!-- Header -->
      @include('header')

      <!-- Sidebar -->
      @include('sidebar')

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            {{ $header_big or null }}
            <small>{{ $header_small or null }}</small>
          </h1>
          <!-- You can dynamically generate breadcrumbs here -->
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
            <li class="active">Here</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content" >          
          <!-- Your Page Content Here -->
          @yield('content')
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

      <!-- Footer -->
      

    </div><!-- ./wrapper -->

    <!-- REQUIRED JS SCRIPTS -->

    <!-- jQuery 2.1.3 -->
    <script src="{{ asset ("/bower_components/AdminLTE/plugins/jQuery/jQuery-2.1.3.min.js") }}"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="{{ asset ("/bower_components/AdminLTE/bootstrap/js/bootstrap.min.js") }}" type="text/javascript"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset ("/bower_components/AdminLTE/dist/js/app.min.js") }}" type="text/javascript"></script>

    <!-- Optionally, you can add Slimscroll and FastClick plugins. 
          Both of these plugins are recommended to enhance the 
          user experience -->
              <script src="{{ asset ("/bower_components/AdminLTE/plugins/jQuery/jQuery-2.1.4.min.js")}}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.5 -->
    <script src="{{ asset ("/bower_components/AdminLTE/bootstrap/js/bootstrap.min.js")}}"></script>
    <!-- Morris.js charts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="{{ asset ("/bower_components/AdminLTE/plugins/morris/morris.min.js")}}"></script>
    <!-- Sparkline -->
    <script src="{{ asset ("/bower_components/AdminLTE/plugins/sparkline/jquery.sparkline.min.js")}}"></script>
    <!-- jvectormap -->
    <script src="{{ asset ("/bower_components/AdminLTE/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js")}}"></script>
    <script src="{{ asset ("/bower_components/AdminLTE/plugins/jvectormap/jquery-jvectormap-world-mill-en.js")}}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ asset ("/bower_components/AdminLTE/plugins/knob/jquery.knob.js")}}"></script>
    <!-- daterangepicker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
    <script src="{{ asset ("/bower_components/AdminLTE/plugins/daterangepicker/daterangepicker.js")}}"></script>
    <!-- datepicker -->
    <script src="{{ asset ("/bower_components/AdminLTE/plugins/datepicker/bootstrap-datepicker.js")}}"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="{{ asset ("/bower_components/AdminLTE/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js")}}"></script>
    <!-- Slimscroll -->
    <script src="{{ asset ("/bower_components/AdminLTE/plugins/slimScroll/jquery.slimscroll.min.js")}}"></script>
    <!-- FastClick -->
    <script src="{{ asset ("/bower_components/AdminLTE/plugins/fastclick/fastclick.min.js")}}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset ("/bower_components/AdminLTE/dist/js/app.min.js")}}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset ("/bower_components/AdminLTE/dist/js/pages/dashboard.js")}}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset ("/bower_components/AdminLTE/dist/js/demo.js")}}"></script>
  </body>
</html>
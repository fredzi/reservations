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
    
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  
    <!-- mask money -->
    <script src="{{ asset ("/bower_components/AdminLTE/bootstrap/js/jquery.maskMoney.js")}}" ></script>
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="{{ asset("/bower_components/AdminLTE/dist/css/AdminLTE.min.css")}}" rel="stylesheet" type="text/css" />
    <!-- Skin-blue -->
    <link href="{{ asset("/bower_components/AdminLTE/dist/css/skins/skin-blue.min.css")}}" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset("/bower_components/AdminLTE/plugins/iCheck/flat/blue.css")}}">
    <!-- Morris chart -->
    <link rel="stylesheet" href="{{ asset("/bower_components/AdminLTE/plugins/morris/morris.css")}}">
    <!-- jvectormap -->
    <link rel="stylesheet" href="{{ asset("/bower_components/AdminLTE/plugins/jvectormap/jquery-jvectormap-1.2.2.css")}}">
    <!-- Date Picker -->
    <link rel="stylesheet" href="{{ asset("/bower_components/AdminLTE/plugins/datepicker/datepicker3.css")}}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset("/bower_components/AdminLTE/plugins/daterangepicker/daterangepicker-bs3.css")}}">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{{ asset("/bower_components/AdminLTE/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css")}}"> 
    <!-- All skins -->
    <link href="{{ asset("/bower_components/AdminLTE/dist/css/skins/_all-skins.min.css") }}" rel="stylesheet" type="text/css" />
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset("/bower_components/AdminLTE/plugins/datatables/dataTables.bootstrap.css")}}">  
   @yield('head')
  </head>


  <style>
  #prawa{
    text-align: right;
  }
  #texti:hover{
    color:white;
  }
  
  </style>

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
          @if(isset($stettings))
                @foreach($stettings as $stetting)
          
                
                @if($stetting->package == 1)
                <ol class="breadcrumb">
                  <li style="font-size:15px;"><a style="color:#00c0ef">Pakiet PODSTAWOWY</a> <a style="font-size:12px;">  Obowiązuje do: {{$stettings->package_payment_to}} </a></li>
                </ol>
                @elseif($stetting->package == 2)
                <ol class="breadcrumb">
                  <li style="font-size:15px;"><a style="color:gray">Pakiet SREBRNY</a> <a style="font-size:12px;"> Obowiązuje do: {{$stettings->package_payment_to}} </a></li>
                </ol>
                @elseif($stetting->package == 3)
                <ol class="breadcrumb">
                  <li style="font-size:15px;"><a style="color:#f39c12">Pakiet ZŁOTY </a> <a style="font-size:12px;"> Obowiązuje do: {{$stettings->package_payment_to}} </a></li>
                </ol>
                @elseif($stetting->package == 0 || $stetting->package == NULL)
                <ol class="breadcrumb">
                  <li style="font-size:15px;">Pakiet DARMOWY<a href="#" style="font-size:12px; color:#00c0ef" id="texti"> (kliknij tutaj żeby zobaczyć co zyskasz w płatnych pakietach)</a> </li>
                </ol>
            @endif
            @endforeach
          @endif












        </section>

        <!-- Main content -->
        <section class="content" >  
            
          <!-- Your Page Content Here -->
          @yield('content')

          
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
    
      <!-- Footer -->
      

    </div><!-- ./wrapper -->
    <!-- fastclick -->
    <script src="{{ asset ("/bower_components/AdminLTE/plugins/fastclick/fastclick.min.js")}}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset ("/bower_components/AdminLTE/dist/js/app.min.js")}}"></script>
    <!-- jvectormap-world-mill-en -->
    <script src="{{ asset ("/bower_components/AdminLTE/plugins/jvectormap/jquery-jvectormap-world-mill-en.js")}}"></script>
    <!-- SlimScroll 1.3.0 -->
    <script src="{{ asset ("/bower_components/AdminLTE/plugins/slimScroll/jquery.slimscroll.min.js")}}"></script>
    <!-- ChartJS 1.0.1 -->
    <script src="{{ asset ("/bower_components/AdminLTE/plugins/chartjs/Chart.min.js")}}"></script>
    <!-- Sparkline -->
    <script src="{{ asset ("/bower_components/AdminLTE/plugins/sparkline/jquery.sparkline.min.js")}}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ asset ("/bower_components/AdminLTE/plugins/knob/jquery.knob.js")}}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset ("/bower_components/AdminLTE/dist/js/demo.js")}}"></script>    
    <!-- jQuery UI 1.11.4 -->
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    
    

    
    @yield('js')
    <!-- jQuery 2.1.4 -->
    <script src="{{ asset("/bower_components/AdminLTE/plugins/jQuery/jQuery-2.1.4.min.js")}}"></script>    
    
    
    
  </body>
</html>
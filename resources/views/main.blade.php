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
    <!-- bootstrap css 3.3.5 -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <!-- jquery 1.11.3 min -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- bootstrap js 3.3.5 -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="{{ asset("/bower_components/AdminLTE/dist/css/AdminLTE.min.css")}}" rel="stylesheet" type="text/css" />
    <!-- All skins -->
    <link href="{{ asset("/bower_components/AdminLTE/dist/css/skins/_all-skins.min.css") }}" rel="stylesheet" type="text/css" />
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

        </section><!--/ end section -->

        <!-- Main content -->
        <section class="content" >  
          <!-- Your Page Content Here -->
          @yield('content')   
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <!-- Footer -->
    </div><!-- ./wrapper -->
    <!-- AdminLTE App -->
    <script src="{{ asset ("/bower_components/AdminLTE/dist/js/app.min.js")}}"></script>
   
    @yield('js')

  </body>
</html>
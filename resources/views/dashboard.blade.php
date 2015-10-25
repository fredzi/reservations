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
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" type="text/javascript"></script>

    <script src="{{ asset ("/bower_components/AdminLTE/bootstrap/js/jquery.maskMoney.js")}}" ></script>
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

    <link rel="stylesheet" href="{{ asset("/bower_components/AdminLTE/bootstrap/css/bootstrap.min.css")}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset("/bower_components/AdminLTE/dist/css/AdminLTE.min.css")}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ asset("/bower_components/AdminLTE/dist/css/skins/_all-skins.min.css")}}">
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
   
   <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="{{ asset('/bower_components/AdminLTE/bootstrap/css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('/bower_components/AdminLTE/plugins/datatables/dataTables.bootstrap.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('/bower_components/AdminLTE/dist/css/AdminLTE.min.css')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ asset('/bower_components/AdminLTE/dist/css/skins/_all-skins.min.css')}}">
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
          @if(isset($stetting2))
                @foreach($stetting2 as $stettings)
          
                
                @if($stettings->package == 1)
                <ol class="breadcrumb">
                  <li style="font-size:15px;"><a style="color:#00c0ef">Pakiet PODSTAWOWY</a> <a style="font-size:12px;">  Obowiązuje do: {{$stettings->package_payment_to}} </a></li>
                </ol>
                @elseif($stettings->package == 2)
                <ol class="breadcrumb">
                  <li style="font-size:15px;"><a style="color:gray">Pakiet SREBRNY</a> <a style="font-size:12px;"> Obowiązuje do: {{$stettings->package_payment_to}} </a></li>
                </ol>
                @elseif($stettings->package == 3)
                <ol class="breadcrumb">
                  <li style="font-size:15px;"><a style="color:#f39c12">Pakiet ZŁOTY </a> <a style="font-size:12px;"> Obowiązuje do: {{$stettings->package_payment_to}} </a></li>
                </ol>
                @elseif($stettings->package == 0 && $stettings->package == NULL)
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
    <script src="{{ asset ("/bower_components/AdminLTE/plugins/fastclick/fastclick.min.js")}}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset ("/bower_components/AdminLTE/dist/js/app.min.js")}}"></script>
    <!-- Sparkline -->
    <script src="{{ asset ("/bower_components/AdminLTE/plugins/sparkline/jquery.sparkline.min.js")}}"></script>
    <!-- jvectormap -->
    <script src="{{ asset ("/bower_components/AdminLTE/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js")}}"></script>
    <script src="{{ asset ("/bower_components/AdminLTE/plugins/jvectormap/jquery-jvectormap-world-mill-en.js")}}"></script>
    <!-- SlimScroll 1.3.0 -->
    <script src="{{ asset ("/bower_components/AdminLTE/plugins/slimScroll/jquery.slimscroll.min.js")}}"></script>
    <!-- ChartJS 1.0.1 -->
    <script src="{{ asset ("/bower_components/AdminLTE/plugins/chartjs/Chart.min.js")}}"></script>
    <!-- REQUIRED JS SCRIPTS -->
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
     <!-- InputMask -->
    <script src="{{ asset ("/bower_components/AdminLTE/plugins/input-mask/jquery.inputmask.js")}}"></script>
    <script src="{{ asset ("/bower_components/AdminLTE/plugins/input-mask/jquery.inputmask.date.extensions.js")}}"></script>
    <script src="{{ asset ("/bower_components/AdminLTE/plugins/input-mask/jquery.inputmask.extensions.js")}}"></script>
    <script src="{{ asset ('/bower_components/AdminLTE/plugins/input-mask/jquery.inputmask.numeric.extensions.js')}}"></script>
    <script src="{{ asset ('/bower_components/AdminLTE/plugins/input-mask/jquery.inputmask.phone.extensions.js')}}"></script>
    <script src="{{ asset ('/bower_components/AdminLTE/plugins/jQuery/jQuery-2.1.4.min.js')}}"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="{{ asset ('/bower_components/AdminLTE/bootstrap/js/bootstrap.min.js')}}"></script>
    <!-- Select2 -->
    <script src="{{ asset ('/bower_components/AdminLTE/plugins/select2/select2.full.min.js')}}"></script>
    <!-- InputMask -->
    <script src="{{ asset ('/bower_components/AdminLTE/plugins/input-mask/jquery.inputmask.js')}}"></script>
    <script src="{{ asset ('/bower_components/AdminLTE/plugins/input-mask/jquery.inputmask.date.extensions.js')}}"></script>
    <script src="{{ asset ('/bower_components/AdminLTE/plugins/input-mask/jquery.inputmask.extensions.js')}}"></script>
    <!-- date-range-picker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
    <script src="{{ asset ('/bower_components/AdminLTE/plugins/daterangepicker/daterangepicker.js')}}"></script>
    <!-- bootstrap color picker -->
    <script src="{{ asset ('/bower_components/AdminLTE/plugins/colorpicker/bootstrap-colorpicker.min.js')}}"></script>
    <!-- bootstrap time picker -->
    <script src="{{ asset ('/bower_components/AdminLTE/plugins/timepicker/bootstrap-timepicker.min.js')}}"></script>
    <!-- SlimScroll 1.3.0 -->
    <script src="{{ asset ('/bower_components/AdminLTE/plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
    <!-- iCheck 1.0.1 -->
    <script src="{{ asset ('/bower_components/AdminLTE/plugins/iCheck/icheck.min.js')}}"></script>
    <!-- FastClick -->
    <script src="{{ asset ('/bower_components/AdminLTE/plugins/fastclick/fastclick.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset ('/bower_components/AdminLTE/dist/js/app.min.js')}}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset ('/bower_components/AdminLTE/dist/js/demo.js')}}"></script>
     <!-- CK Editor -->
    <script src="https://cdn.ckeditor.com/4.4.3/standard/ckeditor.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="{{ asset ('/bower_components/AdminLTE/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
    
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" type="text/javascript"></script>

    <script src="{{ asset ('/bower_components/AdminLTE/bootstrap/js/jquery.maskMoney.js')}}" ></script><!-- Page script -->
    <script>
      $(function () {
       
        $("[data-mask]").priceFormat({
    prefix: 'R$ ',
    centsSeparator: ',',
    thousandsSeparator: '.'
});
CKEDITOR.replace('editor1');
        //bootstrap WYSIHTML5 - text editor
        $(".textarea").wysihtml5();
        $('#money').mask('000.000.000.000.000,00', {reverse: true});
      });
    </script>
    <script type="text/javascript">
$(".man").maskMoney({
prefix:'PLN ', // The symbol to be displayed before the value entered by the user
allowZero:false, // Prevent users from inputing zero
allowNegative:true, // Prevent users from inputing negative values
defaultZero:false, // when the user enters the field, it sets a default mask using zero
thousands: '.', // The thousands separator
decimal: '.' , // The decimal separator
precision: 2, // How many decimal places are allowed
affixesStay : false, // set if the symbol will stay in the field after the user exits the field. 
symbolPosition : 'left' // use this setting to position the symbol at the left or right side of the value. default 'left'
}); //
</script>
 <!-- jQuery 2.1.4 -->
    <script src="{{ asset('/bower_components/AdminLTE/plugins/jQuery/jQuery-2.1.4.min.js')}}"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="{{ asset('/bower_components/AdminLTE/bootstrap/js/bootstrap.min.js')}}"></script>
    <!-- DataTables -->
    <script src="{{ asset('/bower_components/AdminLTE/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('/bower_components/AdminLTE/plugins/datatables/dataTables.bootstrap.min.js')}}"></script>
    <!-- SlimScroll -->
    <script src="{{ asset('/bower_components/AdminLTE/plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
    <!-- FastClick -->
    <script src="{{ asset('/bower_components/AdminLTE/plugins/fastclick/fastclick.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('/bower_components/AdminLTE/dist/js/app.min.js')}}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('/bower_components/AdminLTE/dist/js/demo.js')}}"></script>
    <!-- page script -->
    <script src="{{ asset('/bower_components/AdminLTE/plugins/chartjs/Chart.min.js')}}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset('/bower_components/AdminLTE/dist/js/pages/dashboard2.js')}}"></script>
    <script src="{{ asset('/bower_components/AdminLTE/dist/js/pages/dashboard.js')}}"></script>
    <!-- ChartJS 1.0.1 -->
    <script src="{{ asset('/bower_components/AdminLTE/plugins/chartjs/Chart.min.js')}}"></script>
    <script>
      $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": true,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });
    </script>


  </body>
</html>
<!-- Main Header -->
<header class="main-header">

  <!-- Logo -->
  <a href="" class="logo" style="font-size:18px"><b>Panel administracyjny</b> </a>

  <!-- Header Navbar -->
  <nav class="navbar navbar-static-top" role="navigation">
    <!-- Sidebar toggle button-->
    
    <!-- Navbar Right Menu -->
    <div class="navbar-custom-menu">

          
      <ul class="nav navbar-nav">
        <!-- Messages: style can be found in dropdown.less-->
        
        
        <!-- Notifications: style can be found in dropdown.less -->
              <li class="dropdown notifications-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-bell-o"></i>
                  <span class="label label-danger">5</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">5 nowych powiadomień</li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                      @if(isset($pokaz))
                      @foreach($pokaz as $poka)
                      <li>
                        <a href="{{action('ReservationsController@show',['id'=>$poka->id])}}" style="font-size:12px;">
                          <i class="fa  fa-ticket text-green"></i> {{$poka->customer_first_name}} {{$poka->customer_last_name}} złożył rezerwację na film Avatar
                        </a>
                      </li>
                      @endforeach
                      @endif
                    </ul>
                  </li>
                  <li class="footer"><a href="#">Pokaż wszystko</a></li>
                </ul>
              </li>
       
        <li class="dropdown user user-menu">
          <!-- Menu Toggle Button -->
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <!-- The user image in the navbar-->
            
            <!-- hidden-xs hides the username on small devices so only the image appears. -->
            <span class="hidden-xs">{{Auth::user()->name}}</span>
            @if(Auth::check())
            <li><a href="{{asset('/auth/logout')}}">Wyloguj się</a></li>
            @endif
          </a>
          
        </li>
      </ul>
    </div>
  </nav>
</header>
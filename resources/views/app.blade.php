<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>System rezerwacji</title>
    <link href="http://getbootstrap.com/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    <div

    <nav class="navbar navbar-default">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="{{action('MainController@index')}}">System rezerwacji</a>
        </div>
        <div>
          <ul class="nav navbar-nav ">
            
            <li><a href="{{action('HallController@index')}}">Hall</a></li>
            <li><a href="{{action('MovieController@index')}}">Movie</a></li>
            
            
          </ul>

        </div>





        <div>
          <ul class="nav navbar-nav navbar-right">
            @if(Auth::check())
            <p style="margin-top:15px;">Witaj, <strong>{{{Auth::user()->email}}}</strong></p>
            <li><a href="{{asset('/auth/logout')}}">Wyloguj się</a></li>
            @else
            <li><a href="{{asset('/auth/login')}}">Zaloguj się</a></li>
            <li><a href="{{asset('/auth/register')}}">Zarejestruj się</a></li>
            @endif
          </ul>
        </div>
        
      </div>






      </div>
</nav>

      <div class="container">
          @yield('header')
          @yield('content')
      </div>

      
  </body>
</html>
<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">

  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">

    <!-- Sidebar user panel (optional) -->
    <div class="user-panel" style="height:70px;">
      
      <div class="pull-left info" style="margin-left:-50px; font-size:20px;">
        <p>{{Auth::user()->name}}</p>
        <!-- Status -->
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>

    <!-- search form (Optional) -->
    <form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Szukaj..."/>
        <span class="input-group-btn">
          <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
        </span>
      </div>
    </form>
    <!-- /.search form -->

    <!-- Sidebar Menu -->
    <ul class="sidebar-menu">
      <li class="header">Menu</li>
      <!-- Optionally, you can add icons to the links -->
      
      
      <li class="treeview">
              <a href="#">
                <i class="fa fa-table"></i> <span>Tabele</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{action('HallController@index')}}"><i class="fa fa-circle-o"></i> Halls</a></li>
                <li><a href="{{action('MovieController@index')}}"><i class="fa fa-circle-o"></i> Movies</a></li>
                <li><a href="{{action('SpectatorTypeController@index')}}"><i class="fa fa-circle-o"></i> Spectators</a></li>
                <li><a href="{{action('RepertoireController@index')}}"><i class="fa fa-circle-o"></i> Repertoires</a></li>
              </ul>
      </li>
      <li class="treeview">
              <a href="#">
                <i class="fa fa-table"></i> <span>Formularze</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{action('HallController@create')}}"><i class="fa fa-circle-o"></i> Add Halls</a></li>
                <li><a href="{{action('MovieController@create')}}"><i class="fa fa-circle-o"></i> Add Movies</a></li>
                <li><a href="{{action('SpectatorTypeController@create')}}"><i class="fa fa-circle-o"></i> Add Spectators</a></li>
                <li><a href="{{action('RepertoireController@create')}}"><i class="fa fa-circle-o"></i> Add Repertoires</a></li>
              </ul>
      </li>
    </ul><!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->
</aside>
@extends('dashboard')
@section('content')

                @if($stetting)
                @foreach($stetting as $stettings)
    <div class="col-md-4">
                 
              <!-- Profile Image -->
              <div class="box box-primary">
                <div class="box-body box-profile">
                  <h2>Logo kina - tutaj będzie logo</h2>  
                  <img src="public/" >
                  
                  <h2 class="profile-username text-center">Nazwa kina : {{$stettings->name}}<button href="#" style="margin-left:30px;" class="btn btn-success" >Edytuj</button></h2>
                  

                  

                  
                </div><!-- /.box-body -->
              </div><!-- /.box -->

              
          </div><!--/.col-md-->
          <div class="col-md-6">
                 
              <!-- Profile Image -->
              <div class="box box-primary">
                <div class="box-body box-profile">
                    <h2>Dane firmowe do faktury</h2>
                  
                  
                  

                  <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                      <b>Nazwa firmy:</b> <a class="pull-right">{{$stettings->name}}</a>
                    </li>
                    <li class="list-group-item">
                      <b>Email:</b> <a class="pull-right">{{$stettings->email}}</a>
                    </li>
                    <li class="list-group-item">
                      <b>Miasto:</b> <a class="pull-right">{{$stettings->city}}</a>
                    </li>
                    <li class="list-group-item">
                      <b>Ulica</b> <a class="pull-right">{{$stettings->street}}</a>
                    </li>
                    <li class="list-group-item">
                      <b>Kod pocztowy:</b> <a class="pull-right">{{$stettings->postcode}}</a>
                    </li>
                    <li class="list-group-item">
                      <b>WWW:</b> <a class="pull-right">{{$stettings->www}}</a>
                    </li>
                    
                    <a class="pull-right btn btn-success" href="{{action('StettingController@edit',['id'=>$stettings->id])}}" style="margin-top:10px;" >Edytuj</a>
                    </li>
                  </ul>

                  
                </div><!-- /.box-body -->
              </div><!-- /.box -->

              
          </div><!--/.col-md-->


          @endforeach
            @else
                    <tr><td colspan="7">Brak danych</td></tr>
            @endif
@endsection
<!--logo kina, nazwa kina, dane firmowe do faktury (nazwa firmy, ulica, kod pocztowy, miasto) -->


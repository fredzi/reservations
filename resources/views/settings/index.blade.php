@extends('main')
@section('content')
<div class="box">
        
    
  <div class="box-body">
                
    <div class="col-md-4">
                 
              <!-- Profile Image -->
              <div class="box box-primary">
                <div class="box-body box-profile">
                  <h2>Logo kina</h2>  
                  
                  @if(!file_exists($catalog.'/'.$folder.'/'.$filejpg.'.jpg') && !file_exists($catalog.'/'.$folder.'/'.$filepng.'.png'))
                  <img class=" img-responsive img-rounded" src="{{$catalog}}/{{$folder}}/brak_loga.jpg" alt="jpg" ><br>
                  <a href="{{ url('settings/create') }}" class="btn btn-info pull-right " >
                        <i class="fa fa-plus"></i> Dodaj logo
                  </a><br><br>
                  @else
                    @if(file_exists($catalog.'/'.$folder.'/'.$filejpg.'.jpg'))
                    <img class=" img-responsive img-rounded" src="{{$catalog}}/{{$folder}}/{{$filejpg}}.jpg" alt="jpg" ><br>
                    <a  href="{{ url('settings/create') }}" class="btn btn-success pull-right">
                        <i class="fa fa-edit"></i> Edytuj logo</a>

                    @elseif (file_exists($catalog.'/'.$folder.'/'.$filepng.'.png'))
                    <img class=" img-responsive img-rounded" src="{{$catalog}}/{{$folder}}/{{$filepng}}.png" alt="png" ><br>
                    <a  href="{{ url('settings/create') }}" class="btn btn-success pull-right">
                        <i class="fa fa-edit"></i> Edytuj logo</a>
                    @endif
                    
                  @endif

                  



                  @if($stettings)
                @foreach($stettings as $stetting)
                  <h2 class="profile-username text-center">Nazwa kina : {{$stetting->name}}</h2>
                  

                  

                  
                </div><!-- /.box-body -->
              </div><!-- /.box -->

              
          </div><!--/.col-md-->
          <div class="col-md-8">
                 
              <!-- Profile Image -->
              <div class="box box-primary">
                <div class="box-body box-profile">
                    <h2>Dane konta</h2>
                  
                  
                  

                  <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                      <b>Nazwa firmy:</b> <a class="pull-right">{{$stetting->name}}</a>
                    </li>
                    <li class="list-group-item">
                      <b>Email:</b> <a class="pull-right">{{$stetting->email}}</a>
                    </li>
                    <li class="list-group-item">
                      <b>Miasto:</b> <a class="pull-right">{{$stetting->city}}</a>
                    </li>
                    <li class="list-group-item">
                      <b>Ulica</b> <a class="pull-right">{{$stetting->street}}</a>
                    </li>
                    <li class="list-group-item">
                      <b>Kod pocztowy:</b> <a class="pull-right">{{$stetting->postcode}}</a>
                    </li>
                    <li class="list-group-item">
                      <b>WWW:</b> <a class="pull-right">{{$stetting->www}}</a>
                    </li>
                    
                    <a class="pull-right btn btn-success" href="{{action('SettingsController@edit',['id'=>$stetting->id])}}" style="margin-top:10px;" ><i class="fa fa-edit"></i>Edytuj</a>
                    </li>
                  </ul>


                  
                </div><!-- /.box-body -->
              </div><!-- /.box -->

              
          @endforeach
            @else
                    <tr><td colspan="7">Brak danych</td></tr>
            @endif
          </div>
</div><!--./box -->
@endsection



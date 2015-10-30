@extends('dashboard')
@section('content')

@include('forms/errors')

{!! Form::model($movie, array('url' => $action, 'class' => 'form-horizontal', 'enctype'=>'multipart/form-data')) !!}
<div class="row">
    <div class="col-md-6">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">
                    Uzupełnij podstawowe informacje o filmie
                </h3>
            </div><!-- /.box-header -->
            <!-- form start -->
                <div class="box-body">
                <!-- TYTUL -->
                <div class="form-group @if($errors->has('title'))  has-error @endif">
                  {!! Form::label('title', 'Tytuł', ['class' => 'col-sm-3 control-label']) !!}
                  <div class="col-md-8">
                      {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Podaj tytuł']) !!}
                  </div>
                </div>
                <!-- TYTUL ORIGINALNU -->
                <div class="form-group @if($errors->has('original_title'))  has-error @endif">
                  {!! Form::label('original_title', 'Tytuł oryginalny', ['class' => 'col-sm-3 control-label']) !!}
                  <div class="col-md-8">
                      {!! Form::text('original_title', null, ['class' => 'form-control', 'placeholder' => 'Podaj tytuł oryginalny']) !!}
                  </div>
                </div>
                <!-- CZAS TRWANIA -->
                <div class="form-group @if($errors->has('time'))  has-error @endif">
                  {!! Form::label('time', 'Czas trwania', ['class' => 'col-sm-3 control-label']) !!}
                  <div class="col-md-8">
                      {!! Form::text('time', null, ['class' => 'form-control', 'placeholder' => 'Czas trwania filmu w minutach']) !!}
                  </div>
                </div>
                <!-- OPIS -->
                <div class="form-group @if($errors->has('describtion'))  has-error @endif">
                  {!! Form::label('describe', 'Opis', ['class' => 'col-sm-3 control-label']) !!}
                  <div class="col-md-8">
                    {!! Form::textarea('describtion', null, ['class' => 'form-control', 'placeholder' => 'Tekst do 1000 znaków']) !!}
                  </div>
                </div>

                <!-- POBIERANIE DANYCH Z TABELI SPECTATORS_TYPES -->
                @foreach ($spectators_types as $spectator_type)
                <div class="form-group ">
                  <label class="col-sm-3 control-label">
                      Typ klienta : {{$spectator_type->name}}
                  </label>

                </div>

                <div class="form-group ">
                  {!! Form::label('price_'.$spectator_type->id, 'Cena', ['class' => 'col-sm-3 control-label']) !!}
                  <div class="col-md-8">
                      {!! Form::text('price_'.$spectator_type->id, null, ['class' => 'form-control', 'placeholder' => '', 'id'=>'money-bank']) !!}
                  </div>
                </div>        
                @endforeach

                <!-- MINIATURKA FILMU -->
                <div class="form-group @if($errors->has('image'))  has-error @endif" >
                    <label for="file" class="col-sm-3 control-label">Miniaturka filmu</label>
                    <div class="col-md-8 " >
                        <input  type="file" id="exampleInputFile" class="btn btn-default" name="image">
                    </div>
                </div>

                </div><!-- /.box-body -->
                @include('forms/buttons', ['submit_action' => 'MovieController@index'])
        </div><!-- /.box -->
    </div>
    <div class="col-md-6">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">
                    Określ czas wyświetlania filmu 
                </h3>
            </div><!-- /.box-header -->
            
            <!-- POLA REPERTUARU -->
            @foreach ($movie->repertoire as $repertoire)
                <!-- Date range -->
                <div class="form-group">
                  <label>Zakres dat wyświetlania (od - do):</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" class="form-control pull-right range-picker" id="reservation">
                  </div><!-- /.input group -->
                </div><!-- /.form group -->
            @endforeach
        </div>
    </div>
</div>
{!! Form::close() !!}
    
@endsection

@section('js')
<script src="{{ asset("/bower_components/AdminLTE/plugins/daterangepicker/daterangepicker.js")}}"></script>
<script src="{{ asset("/bower_components/AdminLTE/plugins/timepicker/bootstrap-timepicker.min.js")}}"></script>
<!-- Page script -->
<script>
  $(function () {
    //Date range picker
    console.log('test');
    $('.range-picker').daterangepicker();
  });
</script>
@endsection
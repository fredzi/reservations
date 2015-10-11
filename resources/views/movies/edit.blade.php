@extends('dashboard')
@section('content')



@include('forms/errors')

<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">
            
        </h3>
    </div><!-- /.box-header -->
    <!-- form start -->
      {!! Form::model($movie, array('url' => $action, 'class' => 'form-horizontal', 'enctype'=>'multipart/form-data')) !!}
        <div class="box-body">
        <!-- TYTUL -->
        <div class="form-group @if($errors->has('title'))  has-error @endif">
          {!! Form::label('title', 'Tytuł', ['class' => 'col-sm-2 control-label']) !!}
          <div class="col-xs-3">
              {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Podaj tytuł']) !!}
          </div>
        </div>
        <!-- TYTUL ORIGINALNU -->
        <div class="form-group @if($errors->has('original_title'))  has-error @endif">
          {!! Form::label('original_title', 'Tytuł oryginalny', ['class' => 'col-sm-2 control-label']) !!}
          <div class="col-xs-3">
              {!! Form::text('original_title', null, ['class' => 'form-control', 'placeholder' => 'Podaj tytuł oryginalny']) !!}
          </div>
        </div>
        <!-- CZAS TRWANIA -->
        <div class="form-group @if($errors->has('time'))  has-error @endif">
          {!! Form::label('time', 'Czas trwania', ['class' => 'col-sm-2 control-label']) !!}
          <div class="col-xs-3">
              {!! Form::text('time', null, ['class' => 'form-control', 'placeholder' => 'Czas trwania filmu w minutach']) !!}
          </div>
        </div>
        <!-- OPIS -->
        <div class="form-group @if($errors->has('describtion'))  has-error @endif">
          {!! Form::label('describe', 'Opis', ['class' => 'col-sm-2 control-label']) !!}
          <div class="col-xs-3">
            {!! Form::textarea('describtion', null, ['class' => 'form-control', 'placeholder' => 'Tekst do 1000 znaków']) !!}
          </div>
        </div>

           <!-- POBIERANIE DANYCH Z TABELI SPECTATORS_TYPES -->
        @foreach ($spectators_types as $spectator_type)
        <div class="form-group ">
          <label class="col-sm-2 control-label">
              Typ klienta : {{$spectator_type->name}}
          </label>
          
        </div>

        <div class="form-group ">
          {!! Form::label('price_'.$spectator_type->id, 'Cena', ['class' => 'col-sm-2 control-label']) !!}
          <div class="col-xs-3">
              {!! Form::text('price_'.$spectator_type->id, null, ['class' => 'form-control', 'placeholder' => '', 'id'=>'money-bank']) !!}
          </div>
        </div>        
        @endforeach

        <!-- MINIATURKA FILMU -->
        <div class="form-group @if($errors->has('image'))  has-error @endif" >
            <label for="file" class="col-sm-2 control-label">Miniaturka filmu</label>
            <div class="col-xs-3 " >
                <input  type="file" id="exampleInputFile" class="btn btn-default" name="image">
            </div>
        </div>

        </div><!-- /.box-body -->
        @include('forms/buttons', ['submit_action' => 'MovieController@index'])
    {!! Form::close() !!}
</div><!-- /.box -->

@endsection

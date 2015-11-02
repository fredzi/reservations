@extends('dashboard')
@section('content')



@include('forms/errors')

<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">
            
        </h3>
    </div><!-- /.box-header -->
    <!-- form start -->
      {!! Form::model($stettingss, array('url' => $action, 'class' => 'form-horizontal', 'enctype'=>'multipart/form-data')) !!}
        <div class="box-body">
        <!-- TYTUL -->
        <div class="form-group @if($errors->has('name'))  has-error @endif">
          {!! Form::label('name', 'Nazwa', ['class' => 'col-sm-2 control-label']) !!}
          <div class="col-xs-3">
              {!! Form::text('name', null, ['class' => 'form-control']) !!}
          </div>
        </div>
        <!-- TYTUL ORIGINALNU -->
        <div class="form-group @if($errors->has('email'))  has-error @endif">
          {!! Form::label('email', 'Email', ['class' => 'col-sm-2 control-label']) !!}
          <div class="col-xs-3">
              {!! Form::text('email', null, ['class' => 'form-control']) !!}
          </div>
        </div>
        <!-- CZAS TRWANIA -->
        <div class="form-group @if($errors->has('city'))  has-error @endif">
          {!! Form::label('city', 'Miasto', ['class' => 'col-sm-2 control-label']) !!}
          <div class="col-xs-3">
              {!! Form::text('city', null, ['class' => 'form-control']) !!}
          </div>
        </div>
        <!-- OPIS -->
        <div class="form-group @if($errors->has('street'))  has-error @endif">
          {!! Form::label('street', 'Ulica', ['class' => 'col-sm-2 control-label']) !!}
          <div class="col-xs-3">
            {!! Form::text('street', null, ['class' => 'form-control']) !!}
          </div>
        </div>
        <!-- OPIS -->
        <div class="form-group @if($errors->has('postcode'))  has-error @endif">
          {!! Form::label('postcode', 'Kod pocztowy', ['class' => 'col-sm-2 control-label']) !!}
          <div class="col-xs-3">
            {!! Form::text('postcode', null, ['class' => 'form-control']) !!}
          </div>
        </div>
        <!-- OPIS -->
        <div class="form-group @if($errors->has('www'))  has-error @endif">
          {!! Form::label('www', 'WWW', ['class' => 'col-sm-2 control-label']) !!}
          <div class="col-xs-3">
            {!! Form::text('www', null, ['class' => 'form-control']) !!}
          </div>
        </div>

           

        

        </div><!-- /.box-body -->
        @include('forms/buttons', ['submit_action' => 'SettingsController@index'])
    {!! Form::close() !!}
</div><!-- /.box -->

@endsection

@extends('dashboard')
@section('content')


@include('forms/errors')

<div class="box box-info">
	<div class="box-header with-border">
        <h3 class="box-title">
            Dodaj salę
        </h3>
    </div><!-- /.box-header -->

<!-- form start -->
      {!! Form::model($hall, array('url' => $action, 'class' => 'form-horizontal')) !!}



  <div class="box-body">
        <!-- NAZWA -->
        <div class="form-group @if($errors->has('repertoire_id'))  has-error @endif">
          {!! Form::label('name', 'Nazwa', ['class' => 'col-sm-2 control-label']) !!}
          <div class="col-xs-3">
              {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Podaj nazwę sali']) !!}
          </div>
        </div>
        <!-- ILOŚĆ MIEJSC W RZĘDZIE -->
        <div class="form-group @if($errors->has('x'))  has-error @endif">
          {!! Form::label('x', 'Ilość miejsc w rzędzie', ['class' => 'col-sm-2 control-label']) !!}
          <div class="col-xs-3">
              {!! Form::text('x', null, ['class' => 'form-control', 'placeholder' => '']) !!}
          </div>
        </div>
        <!-- ILOŚĆ RZĘDÓW -->
        <div class="form-group @if($errors->has('y'))  has-error @endif">
          {!! Form::label('y', 'Ilość rzędów', ['class' => 'col-sm-2 control-label']) !!}
          <div class="col-xs-3">
              {!! Form::text('y', null, ['class' => 'form-control', 'placeholder' => '']) !!}
          </div>
        </div>
        @include('forms/buttons', ['submit_action' => 'HallController@index'])
        {!! Form::close() !!}

	
    </div><!--/.box-body -->
  </div><!-- /.box -->
@endsection

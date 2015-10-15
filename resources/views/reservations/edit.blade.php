@extends('dashboard')
@section('content')

@include('forms/errors')

<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">
            
        </h3>
    </div><!-- /.box-header -->
    <!-- form start -->
      {!! Form::model($reservation, array('url' => $action, 'class' => 'form-horizontal')) !!}



	<div class="box-body">
        <!-- NR REPERTUARU -->
        <div class="form-group @if($errors->has('repertoire_id'))  has-error @endif">
        	{!! Form::label('repertoire_id', 'Nr repertuaru', ['class' => 'col-sm-2 control-label']) !!}
          <div class="col-xs-3">
              {!! Form::text('repertoire_id', null, ['class' => 'form-control', 'placeholder' => '']) !!}
          </div>
        </div>
        <!-- CENA REZERWACJI -->
        <div class="form-group @if($errors->has('summary'))  has-error @endif">
        	{!! Form::label('summary', 'Cena rezerwacji', ['class' => 'col-sm-2 control-label']) !!}
          <div class="col-xs-3">
              {!! Form::text('summary', null, ['class' => 'form-control', 'placeholder' => '']) !!}
          </div>
        </div>
        <!-- DATA POCZĄTKOWA -->
        <div class="form-group @if($errors->has('date_start'))  has-error @endif">
        	{!! Form::label('date_start', 'Data początkowa', ['class' => 'col-sm-2 control-label']) !!}
          <div class="col-xs-3">
              {!! Form::text('date_start', null, ['class' => 'form-control', 'placeholder' => '']) !!}
          </div>
        </div>
        <!-- DATA KOŃCOWA -->
        <div class="form-group @if($errors->has('date_end'))  has-error @endif">
        	{!! Form::label('date_end', 'Data końcowa', ['class' => 'col-sm-2 control-label']) !!}
          <div class="col-xs-3">
              {!! Form::text('date_end', null, ['class' => 'form-control', 'placeholder' => '']) !!}
          </div>
        </div>
        <!-- IMIĘ KLIENTA -->
        <div class="form-group @if($errors->has('customer_first_name'))  has-error @endif">
        	{!! Form::label('customer_first_name', 'Imię', ['class' => 'col-sm-2 control-label']) !!}
          <div class="col-xs-3">
              {!! Form::text('customer_first_name', null, ['class' => 'form-control', 'placeholder' => '']) !!}
          </div>
        </div>
        <!-- NAZWISKO KLIENTA -->
        <div class="form-group @if($errors->has('customer_last_name'))  has-error @endif">
        	{!! Form::label('customer_last_name', 'Nazwisko', ['class' => 'col-sm-2 control-label']) !!}
          <div class="col-xs-3">
              {!! Form::text('customer_last_name', null, ['class' => 'form-control', 'placeholder' => '']) !!}
          </div>
        </div>
        <!-- EMAIL -->
        <div class="form-group @if($errors->has('customer_email'))  has-error @endif">
        	{!! Form::label('customer_email', 'Email', ['class' => 'col-sm-2 control-label']) !!}
          <div class="col-xs-3">
              {!! Form::text('customer_email', null, ['class' => 'form-control', 'placeholder' => '']) !!}
          </div>
        </div>
        <!-- TELEFON -->
        <div class="form-group @if($errors->has('customer_phone'))  has-error @endif">
        	{!! Form::label('customer_phone', 'Telefon', ['class' => 'col-sm-2 control-label']) !!}
          <div class="col-xs-3">
              {!! Form::text('customer_phone', null, ['class' => 'form-control', 'placeholder' => '']) !!}
          </div>
        </div>
        <!-- STATUS REZERWACJI -->
        
        <div class="form-group @if($errors->has('status'))  has-error @endif">
          {!! Form::label('name','Status rezerwacji', ['class'=>'col-sm-2 control-label']) !!}
          <div class="col-xs-3">
          	<select class="form-control"  name="status">
              <option value="1">Nowy</option>
              <option value="2">Odebrany</option>
              <option value="3">Nieodebrany</option>
              <option value="4">Anulowany</option>
            </select>
          </div>
        </div>


		@include('forms/buttons', ['submit_action' => 'ReservationsController@index'])
    {!! Form::close() !!}
	</div><!-- box-body -->

</div><!-- box -->
	
	
@endsection
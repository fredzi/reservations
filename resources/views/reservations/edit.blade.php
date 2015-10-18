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
@extends('dashboard')
@section('content')


@include('forms/errors')

<div class="box box-info">
	<div class="box-header with-border">
        <h3 class="box-title">
            
        </h3>
    </div><!-- /.box-header -->

{!! Form::model($repertoire, array('url'=>$action , 'class'=>'form-horizontal')) !!}

	<div class="box-body">
		        <!-- NR SALI -->
		        <div class="form-group @if($errors->has('hall_id'))  has-error @endif">
		          {!! Form::label('hall_id', 'Nr sali', ['class'=> 'col-sm-2 control-label'])!!}
		          <div class="col-xs-3">
		            
		            {!! Form::text('hall_id', null, ['class' => 'form-control', 'placeholder'=>'Nr sali']) !!}
		          </div>
		        </div>
	
		        <!-- NR FILMU -->
		        <div class="form-group @if($errors->has('movies_id'))  has-error @endif">
		         {!! Form::label('movie_id', 'Nr filmu', ['class'=> 'col-sm-2 control-label'])!!}
		          <div class="col-xs-3">
		            {!! Form::text('movie_id', null, ['class' => 'form-control', 'placeholder'=>'Nr filmu']) !!}
		          </div>
		        </div>
	
		        <!-- GODZINA -->
		        <div class="form-group @if($errors->has('time'))  has-error @endif">
		          {!! Form::label('time', 'Godzina', ['class'=> 'col-sm-2 control-label'])!!}
		          <div class="col-xs-3">
		            {!! Form::text('time', null, ['class' => 'form-control', 'placeholder'=>'Godzina']) !!}
		          </div>
		        </div>

	</div><!--/.box-body -->
	@include('forms/buttons', ['submit_action' => 'RepertoireController@index'])
{!! Form::close() !!}






<br>


</div><!--/.box box-info -->
@endsection
@extends('dashboard')
@section('content')

@include('forms/errors')

<div class="box box-info">
	<div class="box-header with-border">
        <h3 class="box-title">
            Edytuj
        </h3>
    </div><!-- /.box-header -->

{!! Form::model($spectator, array('url' => $action, 'class' => 'form-horizontal')) !!}	
	<div class="box-body">
		        <!-- NAZWA -->
		        <div class="form-group @if($errors->has('name'))  has-error @endif">
		        	{!! Form::label('name', 'Nazwa', ['class'=> 'col-sm-2 control-label']) !!}
		          <div class="col-xs-3">
		            {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Podaj nazwę']) !!}
		          </div>		          
		        </div>
		         <!-- CENA -->
		        <div class="form-group @if($errors->has('price'))  has-error @endif">
		            {!! Form::label('price', 'Cena', ['class'=>'col-sm-2 control-label']) !!}
		          <div class="col-xs-3" >
		            {!! Form::text('price', null, ['class'=>'form-control man', 'placeholder'=>'Podaj cenę' ]) !!}
		          </div>
		        </div>
	</div><!--/.box-body --> 
    @include('forms/buttons', ['submit_action' => 'SpectatorTypeController@index'])
{!! Form::close() !!}

<br>
</div><!--/.box box-info -->
@endsection
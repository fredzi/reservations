@extends('dashboard')
@section('content')

@include('forms/errors')

<div class="box box-info">
	<div class="box-header with-border">
        <h3 class="box-title">
            Dodaj repertuar
        </h3>
    </div><!-- /.box-header -->


	<form method="POST" action="{{ action('RepertoireController@store') }}" class="form-horizontal">
	{!! csrf_field() !!}

		<div class="box-body">
		        <!-- NR SALI -->
		        <div class="form-group @if($errors->has('hall_id'))  has-error @endif">
		          <label for="hall_id" class="col-sm-2 control-label">
		              Nr sali
		          </label>
		          <div class="col-sm-10">
		            <input class="form-control" id="hall_id" value="{{ old('hall_id')}}" placeholder="Podaj numer sali" name="hall_id">
		          </div>
		        </div>
		
		        <!-- NR FILMU -->
		        <div class="form-group @if($errors->has('movies_id'))  has-error @endif">
		          <label for="movies_id" class="col-sm-2 control-label">
		              Nr filmu
		          </label>
		          <div class="col-sm-10">
		            <input class="form-control" id="movies_id" value="{{ old('movies_id')}}" placeholder="Podaj numer filmu" name="movies_id">
		          </div>
		        </div>
		
		        <!-- GODZINA -->
		        <div class="form-group @if($errors->has('time'))  has-error @endif">
		          <label for="time" class="col-sm-2 control-label">
		              Godzina
		          </label>
		          <div class="col-sm-10">
		            <input class="form-control" id="time" value="{{ old('time')}}" placeholder="Podaj godzinę" name="time">
		          </div>
		        </div>
		</div><!--/.box-body -->

		@include('forms/buttons', ['submit_action' => 'RepertoireController@index'])

	




	</form>



</div><!--/.box box-info -->

@endsection
@extends('dashboard')
@section('content')
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
		        <div class="form-group">
		          <label for="hall_id" class="col-sm-2 control-label">
		              Nr sali
		          </label>
		          <div class="col-sm-10">
		            <input class="form-control" id="hall_id" value="{{ old('hall_id')}}" placeholder="Podaj numer sali" name="hall_id">
		          </div>
		        </div>
		
		        <!-- NR FILMU -->
		        <div class="form-group">
		          <label for="movies_id" class="col-sm-2 control-label">
		              Nr filmu
		          </label>
		          <div class="col-sm-10">
		            <input class="form-control" id="movies_id" value="{{ old('movies_id')}}" placeholder="Podaj numer filmu" name="movies_id">
		          </div>
		        </div>
		
		        <!-- GODZINA -->
		        <div class="form-group">
		          <label for="time" class="col-sm-2 control-label">
		              Godzina
		          </label>
		          <div class="col-sm-10">
		            <input class="form-control" id="time" value="{{ old('time')}}" placeholder="Podaj godzinę" name="time">
		          </div>
		        </div>
		</div><!--/.box-body -->

		<div class="box-footer">
            <a href="{{ action('RepertoireController@index') }}" type="submit" class="btn btn-default pull-right">
                Anuluj
            </a>
            <button type="submit" class="btn btn-info pull-left">
                Dodaj
            </button>
        </div><!-- /.box-footer -->

	




	</form>

@if (count($errors) > 0)
          <div class="alert alert-danger fade in" role="alert">

            <ol>

              @foreach ($errors->all() as $error)
                <ul class="glyphicon glyphicon-exclamation-sign" aria-hidden="true" >{{ $error }}</ul>
              @endforeach

            </ol>

          </div>
        @endif


</div><!--/.box box-info -->

@endsection
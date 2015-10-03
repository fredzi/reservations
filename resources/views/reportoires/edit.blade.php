@extends('app')
@section('content')
<h1>
<p>Repertuar <a class="fa fa-angle-right"></a> Edytuj

</p>
</h1>

@include('forms/errors')

<div class="box box-info">
	<div class="box-header with-border">
        <h3 class="box-title">
            Edytuj
        </h3>
    </div><!-- /.box-header -->


<form method="POST" action="{{ action('RepertoireController@edit', ['id' => $repertoires->id]) }}" class="form-horizontal">
	<input name="_method" type="hidden" value="PATCH">
	{!! csrf_field() !!}
	<div class="box-body">
		        <!-- NR SALI -->
		        <div class="form-group" @if($errors->has('hall_id'))  has-error @endif>
		          <label for="hall_id" class="col-sm-2 control-label">
		              Nr sali
		          </label>
		          <div class="col-sm-10">
		            <input class="form-control" id="hall_id" value="<?= $repertoires->hall_id; ?>"  name="hall_id">
		          </div>
		        </div>
	</div><!--/.box-body -->
	<div class="box-body">
		        <!-- NR FILMU -->
		        <div class="form-group" @if($errors->has('movies_id'))  has-error @endif>
		          <label for="movies_id" class="col-sm-2 control-label">
		              Nr filmu
		          </label>
		          <div class="col-sm-10">
		            <input class="form-control" id="movies_id" value="<?= $repertoires->movies_id; ?>" name="movies_id">
		          </div>
		        </div>
	</div><!--/.box-body -->
	<div class="box-body">
		        <!-- GODZINA -->
		        <div class="form-group" @if($errors->has('time'))  has-error @endif>
		          <label for="time" class="col-sm-2 control-label">
		              Godzina
		          </label>
		          <div class="col-sm-10">
		            <input class="form-control" id="time" value="<?= $repertoires->time; ?>" placeholder="Podaj godzinę" name="time">
		          </div>
		        </div>
	</div><!--/.box-body -->
	@include('forms/buttons', ['submit_action' => 'RepertoireController@index'])
</form>





<form method="POST" action="{{ action('RepertoireController@destroy', ['id' => $repertoires->id]) }}" class="form-horizontal">
	<input name="_method" type="hidden" value="delete">
	{!! csrf_field() !!}
	<div class="box-body">
		<button type="submit" class="btn btn-danger">Usuń</button>
	</div>
</form>
<br>


</div><!--/.box box-info -->
@endsection
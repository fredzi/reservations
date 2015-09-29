@extends('app')

@section('header')
<h1>Edytuj film</h1>
@endsection

@section('content')
<form method="POST" action="{{ action('RepertoireController@edit', ['id' => $repertoires->id]) }}" class="form-group">
	<input name="_method" type="hidden" value="PATCH">
	{!! csrf_field() !!}
	<div class="row">
		<div class="col-sm-5">
		<label>Nr sali:</label> 
		<input type="text" name="hall_id" value="<?= $repertoires->hall_id; ?>" class="form-control">
		<label>Nr filmu:</label> 
		<input type="text" name="movies_id" value="<?= $repertoires->movies_id; ?>" class="form-control">
		<label>Godzina:</label> 
		<input type="text" name="time" value="<?= $repertoires->time; ?>" class="form-control">
		
		</div>
	</div>
	
	<br>
	<div>
		<button type="submit" class="btn btn-success">Aktualizuj</button>
	</div>
</form>
<form method="POST" action="{{ action('RepertoireController@destroy', ['id' => $repertoires->id]) }}">
	<input name="_method" type="hidden" value="delete">
	{!! csrf_field() !!}
	<div>
		<button type="submit" class="btn btn-danger">Usuń</button>
	</div>
</form>
<br>

@if ($errors->any())
	<ul class="alert alert-danger">
		@foreach ($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
	</ul>
@endif
@endsection
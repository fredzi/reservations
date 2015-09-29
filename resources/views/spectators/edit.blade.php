@extends('app')

@section('header')
<h1>Edytuj spectators</h1>
@endsection

@section('content')
<form method="POST" action="{{ action('SpectatorTypeController@edit', ['id' => $spectators->id]) }}" class="form-group">
	<input name="_method" type="hidden" value="PATCH">
	{!! csrf_field() !!}
	<div class="row">
		<div class="col-sm-5">
		<label>Nazwa:</label> 
		<input type="text" name="name" value="<?= $spectators->name; ?>" class="form-control">
		
		</div>
	</div>
	
	<br>
	<div>
		<button type="submit" class="btn btn-success">Aktualizuj</button>
	</div>
</form>
<form method="POST" action="{{ action('SpectatorTypeController@destroy', ['id' => $spectators->id]) }}">
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
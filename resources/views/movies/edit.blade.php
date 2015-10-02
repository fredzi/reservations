@extends('dashboard')



@section('content')
<h1>Edytuj film</h1>

<form method="POST" action="{{ action('MovieController@edit', ['id' => $movies->id]) }}" class="form-group">
	<input name="_method" type="hidden" value="PATCH">
	{!! csrf_field() !!}
	<div class="row">
		<div class="col-sm-5">
		<label>Tytuł:</label> 
		<input type="text" name="title" value="<?= $movies->title; ?>" class="form-control">
		<label>Oryginalny tytuł:</label> 
		<input type="text" name="original_title" value="<?= $movies->original_title; ?>" class="form-control">
		<label>Czas:</label> 
		<input type="text" name="time" value="<?= $movies->time; ?>" class="form-control">
		<label>Opis:</label> 
		<input type="text" name="describtion" value="<?= $movies->describtion; ?>" class="form-control">
		<label>Cena:</label> 
		<input type="text" name="price" value="<?= $movies->price; ?>" class="form-control">
		</div>
	</div>
	
	<br>
	<div>
		<button type="submit" class="btn btn-success">Aktualizuj</button>
	</div>
</form>
<form method="POST" action="{{ action('MovieController@destroy', ['id' => $movies->id]) }}">
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
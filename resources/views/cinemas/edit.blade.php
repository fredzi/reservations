@extends('app')

@section('header')
<h1>Edytuj dane</h1>
@endsection

@section('content')
<form method="POST" action="{{ action('CinemasController@edit', ['id' => $cinemas->id]) }}" class="form-group">
	<input name="_method" type="hidden" value="PATCH">
	{!! csrf_field() !!}
	<div class="row">
		<div class="col-sm-5">
		<label>Nazwa kina:</label> 
		<input type="text" name="name" value="<?= $cinemas->name; ?>" class="form-control">
		<label>Miasto:</label> 
		<input type="text" name="city" value="<?= $cinemas->city; ?>" class="form-control">
		<label>Ulica:</label> 
		<input type="text" name="street" value="<?= $cinemas->street; ?>" class="form-control">
		<label>Kod pocztowy:</label> 
		<input type="text" name="postcode" value="<?= $cinemas->postcode; ?>" class="form-control">
		<label>www:</label> 
		<input type="text" name="www" value="<?= $cinemas->www; ?>" class="form-control">
		<input type="hidden" name="user_id" value="<?= $cinemas->user_id; ?>" class="form-control">
		</div>
	</div>
	
	<br>
	<div>
		<button type="submit" class="btn btn-success">Aktualizuj</button>
	</div>
</form>
<form method="POST" action="{{ action('CinemasController@destroy', ['id' => $cinemas->id]) }}">
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
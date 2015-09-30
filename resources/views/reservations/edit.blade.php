@extends('app')

@section('header')
<h1>Edytuj wybraną rezerwacje</h1>
@endsection

@section('content')
<form method="POST" action="{{ action('ReservationsController@edit', ['id' => $reservations->id]) }}" class="form-group">
	<input name="_method" type="hidden" value="PATCH">
	{!! csrf_field() !!}
	<div class="row">
		<div class="col-sm-5">
		<label>Nr repertuaru:</label> 
		<input type="text" name="repertoire_id" value="<?= $reservations->repertoire_id; ?>" class="form-control">
		<label>Cena rezerwacji:</label> 
		<input type="text" name="summary" value="<?= $reservations->summary; ?>" class="form-control">
		
		<input type="hidden" name="date_start" value="<?= $reservations->date_start; ?>" class="form-control">
		<input type="hidden" name="date_end" value="<?= $reservations->date_end; ?>" class="form-control">
		
		<label>Imię:</label> 
		<input type="text" name="customer_first_name" value="<?= $reservations->customer_first_name; ?>" class="form-control">
		
		<label>Nazwisko:</label> 
		<input type="text" name="customer_last_name" value="<?= $reservations->customer_last_name; ?>" class="form-control">
		
		<label>Email:</label> 
		<input type="text" name="customer_email" value="<?= $reservations->customer_email; ?>" class="form-control">
		
		<label>Telefon:</label> 
		<input type="text" name="customer_phone" value="<?= $reservations->customer_phone; ?>" class="form-control">
		
		<label>Status rezerwacji:</label> 
		<input type="text" name="status" value="<?= $reservations->status; ?>" class="form-control">
		</div>

	</div>
	
	<br>
	<div>
		<button type="submit" class="btn btn-success">Aktualizuj</button>
	</div>
</form>
<form method="POST" action="{{ action('ReservationsController@destroy', ['id' => $reservations->id]) }}">
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
@extends('dashboard')







<!-- FORMULARZ DODAWANIA REPERTUARU -->
@section('content')
<h1>Dodaj repertuar</h1>
<div id="row">
	<div id="col-sm-4">
<form method="POST" action="{{ action('RepertoireController@store') }}" class="form-group">
{!! csrf_field() !!}
Nr sali: <input type="text" name="hall_id" value="{{ old('hall_id')}}" class="form-control"><br>

Nr filmu:<input type="text" name="movies_id" value="{{ old('movies_id')}}" class="form-control"><br>

Godzina:<input type="text" name="time" value="{{ old('time')}}" class="form-control"><br>


<input type="submit" value="Dodaj" class="btn btn-success">

</form>

</div>
<br>
</div>
@endsection
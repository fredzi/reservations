@extends('dashboard')


<!-- FORMULARZ DODAWANIA FILMU -->
@section('content')
<h2>Dodaj film</h2>
<div id="row">
	<div class="col-sm-3">
<form method="POST" action="{{ action('MovieController@store') }}" class="form-group">
{!! csrf_field() !!}
Tytuł: <input type="text" name="title" value="{{ old('title')}}" class="form-control"><br>
Oryginalny tytuł:<input type="text" name="original_title" value="{{ old('original_title')}}" class="form-control"><br>
Czas trwania:<input type="text" name="time" value="{{ old('time')}}" class="form-control"><br>
Opis:
<textarea name="describtion" value="{{ old('describtion')}}" type="text" class="form-control" ></textarea><br>
Cena:<input type="text" name="price" value="{{ old('price')}}" class="form-control"><br>
<input type="hidden" name="user_id" value="{{ old('user_id')}}" class="form-control"><br>
<input type="submit" value="Dodaj" class="btn btn-success">

</form>

</div>
<br>
</div>
@endsection
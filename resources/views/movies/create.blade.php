@extends('app')

@section('header')
<h1 >Dodaj film</h1>

@endsection





<!-- FORMULARZ DODAWANIA FILMU -->
@section('content')
<div id="row">
	<div id="col-sm-4">
<form method="POST" action="{{ action('MovieController@store') }}" class="form-group">
{!! csrf_field() !!}
Tytuł: <input type="text" name="title" value="{{ old('title')}}" class="form-control"><br>
Oryginalny tytuł:<input type="text" name="original_title" value="{{ old('original_title')}}" class="form-control"><br>
Czas trwania:<input type="text" name="time" value="{{ old('time')}}" class="form-control"><br>
Opis:<input type="text" name="describtion" value="{{ old('describtion')}}" class="form-control"><br>
Cena:<input type="text" name="price" value="{{ old('price')}}" class="form-control"><br>
<input type="submit" value="Dodaj" class="btn btn-success">

</form>

</div>
<br>
</div>
@endsection
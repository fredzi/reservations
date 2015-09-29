@extends('app')

@section('header')
<h1 >Dodaj spectators</h1>

@endsection





<!-- FORMULARZ DODAWANIA REPERTUARU -->
@section('content')
<div id="row">
	<div id="col-sm-4">
<form method="POST" action="{{ action('SpectatorTypeController@store') }}" class="form-group">
{!! csrf_field() !!}
Nazwa: <input type="text" name="name" value="{{ old('name')}}" class="form-control"><br>




<input type="submit" value="Dodaj" class="btn btn-success">

</form>

</div>
<br>
</div>
@endsection
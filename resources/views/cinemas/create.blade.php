@extends('app')

@section('header')
<h1 >Dodaj kino - Cinema</h1>

@endsection





<!-- FORMULARZ DODAWANIA KINA razem z USEREM {{{Auth::getUser()->id}}}-->
@section('content')
<div id="row">
	<div id="col-sm-4">
<form method="POST" action="{{ action('CinemasController@store') }}" class="form-group">
{!! csrf_field() !!}
Nazwa: <input type="text" name="name" value="{{ old('name')}}" class="form-control"><br>

Miasto:<input type="text" name="city" value="{{ old('city')}}" class="form-control"><br>

Ulica:<input type="text" name="street" value="{{ old('street')}}" class="form-control"><br>

Kod pocztowy:<input type="text" name="postcode" value="{{ old('postcode')}}" class="form-control"><br>

www:<input type="text" name="www" value="{{ old('www')}}" class="form-control"><br>
@if(Auth::check())
<input type="hidden" name="user_id" value="{{old('user_id',Auth::getUser()->id)}}"><br>
@endif



<input type="submit" value="Dodaj" class="btn btn-success">

</form>

</div>
<br>
</div>
@endsection
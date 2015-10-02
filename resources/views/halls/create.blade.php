@extends('dashboard')




@section('content')
<h1>Dodaj hall</h1>
<div id="row">
	<div class="col-sm-3">
<form method="POST" action="{{ action('HallController@store') }}" class="form-group">
{!! csrf_field() !!}
Nazwa: <input type="text" name="name" value="{{ old('name')}}" class="form-control"><br>
Miejsc w rzędzie:<input type="text" name="x" value="{{ old('x')}}" class="form-control"><br>
Rzędów:<input type="text" name="y" value="{{ old('y')}}" class="form-control"><br>
<input type="submit" value="Wybierz miejsca" class="btn btn-success">

</form>

</div>
<br>
</div>
@endsection

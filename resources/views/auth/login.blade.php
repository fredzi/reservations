@extends('app')


@section('header')
<h1>Zaloguj się</h1>
@endsection

@section('content')
<div class="row">
    <div class="col-sm-4">
<form method="POST" action="/auth/login" class="form-group" role="form">
    {!! csrf_field() !!}

    <div>
        <label>Email:</label>
        <input type="email" name="email" value="{{ old('email') }}" class="form-control">
    </div>

    <div>
        <label>Hasło:</label>
        <input type="password" name="password" id="password" class="form-control">
    </div>

    <div>
        <input type="checkbox" name="remember" > Zapamietaj mnie 
    </div>

    <div>
        <button type="submit" class="btn btn-success" style="margin-top:10px;">Login</button>
    </div>
</form>

@if (count($errors) > 0)
    <ul>
        <p class="alert alert-danger"><b>Błędne hasło lub nazwa użytkownika !</b> </p>
    </ul>
@endif
</div>
</div>
@endsection
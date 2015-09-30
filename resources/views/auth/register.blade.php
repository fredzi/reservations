@extends('app')

@section('header')
<h1>Zarejestruj się</h1>
@endsection

@section('content')
<div class="row">
    <div class="col-sm-4">
        <form method="POST" action="/auth/register" class="form-group" role="form">
            {!! csrf_field() !!}

            <div>
                <label>Nazwa kina:</label>
                <input type="text" name="name" value="{{ old('name') }}" class="form-control">
            </div>

            <div>
                <label>Miasto:</label>
                <input type="text" name="city" value="{{ old('city') }}" class="form-control">
            </div>

            <div>
                <label>Ulica:</label>
                <input type="text" name="street" value="{{ old('street') }}" class="form-control">
            </div>

            <div>
                <label>Kod pocztowy:</label>
                <input type="text" name="postcode" value="{{ old('postcode') }}" class="form-control">
            </div>

            <div>
                <label>www:</label>
                <input type="text" name="www" value="{{ old('www') }}" class="form-control">
            </div>

            <div>
                <label>Email:</label>
                <input type="email" name="email" value="{{ old('email') }}" class="form-control">
            </div>

            <div>
                <label>Hasło:</label>
                <input type="password" name="password" class="form-control">
            </div>

            <div>
                <label>Powtórz hasło:</label>
                <input type="password" name="password_confirmation" class="form-control">
            </div>

            <div>
                <button type="submit" class="btn btn-primary" style="margin-top:10px;">Zarejestruj się</button>
            </div>
        </form>
    </div>
</div>


<div >
    @if (count($errors) > 0)
        <ul>
        @foreach ($errors->all() as $error)
            <li class="alert alert-danger">{{ $error }}</li>
        @endforeach
        </ul>
    @endif
</div>

@endsection
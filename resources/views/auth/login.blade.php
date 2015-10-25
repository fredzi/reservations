@extends('app')



@section('formularz')
@include('forms/errors')
<p class="login-box-msg" style="font-size:15px;">Zaloguj się</p>

    
<form method="POST" action="/auth/login" >
    {!! csrf_field() !!}
    <div class="form-group has-feedback">
        <input type="email" name="email" value="{{ old('email') }}" placeholder="Email" class="form-control">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
    </div>

    <div class="form-group has-feedback">
        <input type="password" name="password" id="password" class="form-control" placeholder="Hasło">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
    </div>

    <div class="row">
        <div class="col-xs-8">
            <div class="checkbox icheck">
                <label>
                    <input type="checkbox" name="remember" > Zapamietaj mnie 
                </label>
            </div>
        </div>
        <div class="col-xs-4">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Zaloguj się </button>
        </div>
    </div>
    <a href="#">Nie pamiętam hasła</a><br>
        <a href="{{asset('/auth/register')}}" class="text-center">Nie masz konta ? Zajerestruj się !</a>


    
</form>



@endsection
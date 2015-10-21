@extends('dashboard')

@section('head')
<style>
input[type=checkbox] {
    display:none;
}

input[type=checkbox] + label{
    background:black;
    height: 32px;
    width: 32px;
    display:inline-block;
    padding: 0 0 0 0px;
}

input[type=checkbox]:checked + label{
    background:yellow;
    height: 32px;
    width: 32px;
    display:inline-block;
    padding: 0 0 0 0px;
}
</style>
@stop

@section('content')
@include('forms/errors')

<div class="box box-info">
    <div class="box-header with-border">
    <h3 class="box-title">
        Klikając na miejscach zaznacz, które będą możliwe do zarezerwowania 
    </h3>
</div><!-- /.box-header -->



<!--FORMULARZ DODAWANIA  -->


{!! Form::open(['url' => $action]) !!}

<div class="box-body text-center">
    
    @for($y = 0; $y < Session::get('y'); $y++)

        @for($x = 0; $x < Session::get('x'); $x++)

            
            <input type="checkbox" class="check" name="{{$x.'-'.$y}}" id="{{$x.'-'.$y}}" value='1'><label for="{{$x.'-'.$y}}"></label>
        @endfor

        <br />

    @endfor
    
    <div class="alert alert-info">
        Ekran
    </div>
    
</div>
@include('forms/buttons', ['submit_action' => 'ReservationsController@index'])


{!! Form::close() !!}

@stop
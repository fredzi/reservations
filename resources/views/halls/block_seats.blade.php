@extends('app')

@section('content')
    
<h1>Wybierz miejsca</h1>
    
<br />

{!! Form::open(['url' => 'hall']) !!}

@for($y = 0; $y < Session::get('y'); $y++)

    @for($x = 0; $x < Session::get('x'); $x++)

        {!! Form::checkbox($x.'-'.$y, '1') !!}

    @endfor
    
    <br />

@endfor

{!! Form::submit('Dodaj') !!}

{!! Form::close() !!}

@stop
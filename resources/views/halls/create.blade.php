@extends('app')

@section('content')
    
<h1>Tworzenie nowej sali</h1>
 
<br >

{!! Form::open(['url' => 'hall']) !!}

{!! Form::label('name', 'Nazwa:') !!}
{!! Form::text('name', null) !!}

{!! Form::label('x', 'Miejsc w rzędzie:') !!}
{!! Form::text('x', null) !!}

{!! Form::label('y', 'Rzędów:') !!}
{!! Form::text('y', null) !!}

{!! Form::submit('Wybierz miejsca') !!}

{!! Form::close() !!}

@stop


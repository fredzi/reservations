@extends('dashboard')


@section('content')
    <h1>Halls(sale-laragon)</h1>
    
    @foreach($halls as $hall)
        <h2><a href="{{ url('hall/'.$hall->id) }}">{{ $hall->name }}</a></h2>
    @endforeach
@stop
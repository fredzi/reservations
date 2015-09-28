@extends('app')


@section('content')
    <h1>Halls(sale-laragon)</h1>
    <div>
    	<a href="{{ asset('/hall/create')}}" class="btn btn-primary">Dodaj nową salę</a>
    </div>
    @foreach($halls as $hall)
        <h2><a href="{{ url('hall/'.$hall->id) }}">{{ $hall->name }}</a></h2>
    @endforeach
@stop
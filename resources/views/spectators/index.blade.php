@extends('dashboard')


@section('content')
    <h1>Spectators - typ klienta</h1>
    
    
        <table class="table table-hover">
        	<thead>
        		<tr>
        			<th>#</th>
        			<th>Nazwa</th>
        			
        		</tr>
        	</thead>
    @foreach($spectators as $spectator)
        	<tbody>
        		<tr>
        			<td>{{$spectator->id}}</td>
        			<td>{{$spectator->name}}</td>
        			
        			
        			<td><a href="{{action('SpectatorTypeController@edit',['id'=>$spectator->id])}}" class="btn btn-success">Edytuj</a></td>

        	</tbody>	

    @endforeach
@stop
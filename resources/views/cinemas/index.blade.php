@extends('app')


@section('content')
    <h1>Kino - Cinema</h1>
    <div>
    	<a href="{{action('CinemasController@create')}}" class="btn btn-primary">Dodaj kino</a>
    </div>
    
        <table class="table table-hover">
        	<thead>
        		<tr>
        			<th>#</th>
        			<th>Nazwa</th>
        			<th>Miasto</th>
        			<th>Ulica</th>
        			<th>Kod pocztowy</th>
        			<th>www</th>
        			<th>User_id</th>
                    <th>Edytuj</th>
                    
        		</tr>
        	</thead>
    @foreach($cinemas as $cinema)
        	@if(Auth::check())
                @if(Auth::user()->id)
                    <tbody>
                		<tr>
                			<td>{{$cinema->id}}</td>
                			<td>{{$cinema->name}}</td>
                			<td>{{$cinema->city}}</td>
                			<td>{{$cinema->street}} </td>
                			<td>{{$cinema->postcode}}</td>
                			<td>{{$cinema->www}} </td>
                			<td>{{$cinema->user_id}}</td>
                            <td><a href="{{action('CinemasController@edit',['id'=>$cinema->id])}}">Edytuj</a></td>
                            

                	</tbody>	
                @endif
            @endif

    @endforeach
@stop
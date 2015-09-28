@extends('app')


@section('content')
    <h1>Movies-filmy</h1>
    <div>
    	<a href="{{action('MovieController@create')}}" class="btn btn-primary">Dodaj film</a>
    </div>
    
        <table class="table table-hover">
        	<thead>
        		<tr>
        			<th>#</th>
        			<th>Tytuł</th>
        			<th>Oryginalny tytuł</th>
        			<th>Czas</th>
        			<th>Opis</th>
        			<th>Cena</th>
        			<th>Edycja</th>
        		</tr>
        	</thead>
    @foreach($movies as $movie)
        	<tbody>
        		<tr>
        			<td>{{$movie->id}}</td>
        			<td>{{$movie->title}}</td>
        			<td>{{$movie->original_title}}</td>
        			<td>{{$movie->time}} minut</td>
        			<td>{{$movie->describtion}}</td>
        			<td>{{$movie->price}} zł</td>
        			<td><a href="{{action('MovieController@edit',['id'=>$movie->id])}}" class="btn btn-success">Edytuj</a></td>

        	</tbody>	

    @endforeach
@stop
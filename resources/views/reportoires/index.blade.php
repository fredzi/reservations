@extends('app')


@section('content')
    <h1>Repertoise - repertuar</h1>
    <div>
    	<a href="{{action('RepertoireController@create')}}" class="btn btn-primary">Dodaj repertuar</a>
    </div>
    
        <table class="table table-hover">
        	<thead>
        		<tr>
        			<th>#</th>
        			<th>Nr sali(hall_id)</th>
        			<th>Nr filmu(movies_id)</th>
        			<th>Godzina</th>
        			<th>Edycja</th>
        		</tr>
        	</thead>
    @foreach($repertoires as $repertoire)
        	<tbody>
        		<tr>
        			<td>{{$reportoire->id}}</td>
        			<td>{{$reportoire->hall_id}}</td>
        			<td>{{$reportoire->movies_id}}</td>
        			<td>{{$reportoire->time}} </td>
        			
        			<td><a href="{{action('RepertoiseController@edit',['id'=>$repertoire->id])}}" class="btn btn-success">Edytuj</a></td>

        	</tbody>	

    @endforeach
@stop
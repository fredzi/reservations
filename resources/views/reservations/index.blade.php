@extends('app')


@section('content')
    <h1>Reservations - rezerwacje</h1>
    <div>
    	<a href="{{action('ReservationsController@create')}}" class="btn btn-primary">Dodaj rezerwacje</a>
    </div>
    
        <table class="table table-hover">
        	<thead>
        		<tr>
        			<th>#</th>
        			<th>Nr repertuaru</th>
        			<th>Cena całej rezerwacji</th>
        			<th>Data rozpoczęcia wybrania miejsc</th>
        			<th>Data zakończenia wybrania miejsc</th>
        			<th>Imię</th>
        			<th>Nazwisko</th>
                    <th>Email</th>
                    <th>Telefon</th>
                    <th>Status rezerwacji</th>
                    <th>Miejsca zarezerwowane</th>
        		</tr>
        	</thead>
    @foreach($reservations as $reservation)
        	<tbody>
        		<tr>
                    <td>{{$reservation->id}}</td>
        			<td>{{$reservation->repertoire_id}}</td>
        			<td>{{$reservation->summary}}</td>
        			<td>{{$reservation->date_start}}</td>
        			<td>{{$reservation->date_end}}</td>
        			<td>{{$reservation->customer_first_name}}</td>
        			<td>{{$reservation->customer_last_name}}</td>
                    <td>{{$reservation->customer_email}}</td>
                    <td>{{$reservation->customer_phone}}</td>
                    <td>{{$reservation->status}}</td>
                    <td></td>
        			<td><a href="{{action('ReservationsController@edit',['id'=>$reservation->id])}}" class="btn btn-success">Edytuj</a></td>

        	</tbody>	

    @endforeach
@stop
@extends('dashboard')
@section('content')

<div class="box">

    <div class="box-header">
       
    </div><!-- /.box-header -->
    
    <div class="box-body">
        <table class="table table-bordered table-hover">
        	<thead>
        		<tr>
        			<th>Nr rezerwacji</th>
        			<th>Suma za bilety</th>
        			<th>Imię</th>
        			<th>Nazwisko</th>
                    <th>Email</th>
                    <th>Telefon</th>
                    <th>Status rezerwacji</th>
                    <th>Komentarz</th>
                    <th>Info</th>
                    <th>Edycja</th>
                    
        		</tr>
        	</thead>
             @if($reservations)
                @foreach($reservations as $reservation)
        	<tbody>
        		<tr>
                    <td>{{$reservation->id}}</td>
        			<td>{{$reservation->summary}}</td>
        			<td>{{$reservation->customer_first_name}}</td>
        			<td>{{$reservation->customer_last_name}}</td>
                    <td>{{$reservation->customer_email}}</td>
                    <td>{{$reservation->customer_phone}}</td>
                    <td>{{$reservation->status}}</td>
                    
                        @if($reservation->status == 1)
                            <td>Nowy</td>
                        @elseif($reservation->status == 2)
                            <td>Odebrany</td>
                        @elseif($reservation->status == 3)
                            <td>Nieodebrany</td>
                        @elseif($reservation->status == 4)
                            <td>Anulowany</td>
                        @else
                            <td></td>
                        @endif

                    
                    <td><a href="{{action('ReservationsController@show',['id'=>$reservation->id])}}" class="btn btn-primary">Info</a></td>
        			<td><a href="{{action('ReservationsController@edit',['id'=>$reservation->id])}}" class="btn btn-success">Edytuj</a></td>
                    
                    </tr>
        	</tbody>	
            @endforeach
            @else
            <tr><td colspan="7">Brak danych</td></tr>
            @endif
        </table>
    </div><!--/.box-body -->
</div><!--/.box -->
@stop
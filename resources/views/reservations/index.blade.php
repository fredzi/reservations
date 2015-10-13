@extends('dashboard')
@section('content')

<div class="box">

    <div class="box-header">
        <a href="{{ url('reservations/create') }}" class="btn btn-info pull-left" style="margin-right: 5px;">
            <i class="fa fa-plus"></i> Dodaj
        </a>
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
                    <td><a href="" class="btn btn-primary">Info</a></td>
        			<td><a href="{{action('ReservationsController@edit',['id'=>$reservation->id])}}" class="btn btn-success">Edytuj</a></td>
                    <td>

                            <form method="POST" action="{{ action('ReservationsController@destroy', ['id' => $reservation->id]) }}" class="form-horizontal">
                                <input name="_method" type="hidden" value="delete">
                                {!! csrf_field() !!}
                                
                                    <button type="submit" class="btn btn-danger"><i class="fa fa-minus-square"></i> Usuń</button>
                                
                            </form>
                        </td>
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
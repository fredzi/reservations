@extends('dashboard')
@section('content')

    <div class="box">
        <div class="box-header">
            <a href="{{ url('spectators/create') }}" class="btn btn-success pull-left" style="margin-right: 5px;">
            <i class="fa fa-plus"></i> Dodaj
            </a>
        </div>
        
        <div class="box-body">
        <table class="table table-hover">
        	<thead>
        		<tr>
        			<th>#</th>
        			<th>Nazwa</th>
        			
        		</tr>
        	</thead>
             @if($spectators)
                @foreach($spectators as $spectator)
                	<tbody>
                       
                		<tr>
                			<td>{{$spectator->id}}</td>
                			<td>{{$spectator->name}}</td>
                			
                			
                			<td><a href="{{action('SpectatorTypeController@edit',['id'=>$spectator->id])}}" class="btn btn-success">Edytuj</a></td>
                        </tr>
                        
                	</tbody>	
                @endforeach
            @else
                    <tr><td colspan="7">Brak danych</td></tr>
            @endif
        </table>
        </div><!--/.box-body -->
    </div><!--/.box -->
@endsection
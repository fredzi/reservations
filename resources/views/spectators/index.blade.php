@extends('dashboard')
@section('content')


    <div class="box">
        <div class="box-header">
            <a href="{{ url('spectators/create') }}" class="btn btn-info pull-left" style="margin-right: 5px;">
            <i class="fa fa-plus"></i> Dodaj
            </a>
        </div>
        
        <div class="box-body">
        <table class="table table-bordered table-hover">
        	<thead>
        		<tr>
        			<th>#</th>
        			<th>Nazwa</th>
        			<th>Edytuj</th>
                    <th></th>
        		</tr>
        	</thead>
             @if($spectators)
                @foreach($spectators as $spectator)
                	<tbody>
                       
                		<tr>
                			<td>{{$spectator->id}}</td>
                			<td>{{$spectator->name}}</td>
                			
                			
                			<td><a href="{{action('SpectatorTypeController@edit',['id'=>$spectator->id])}}" class="btn btn-success"><i class="fa fa-edit"></i> Edytuj</a></td>
                            <td>
                                <form method="POST" action="{{ action('SpectatorTypeController@destroy', ['id' => $spectator->id]) }}" class="form-horizontal">
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
@endsection
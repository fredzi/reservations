@extends('dashboard')
@section('content')


    <div class="box">
    
        <div class="box-header">
        <a href="{{ url('repertoire/create') }}" class="btn btn-info pull-left" style="margin-right: 5px;">
            <i class="fa fa-plus"></i> Dodaj
        </a>
        </div><!-- /.box-header -->
    
        <div class="box-body">
        <table class="table table-bordered table-hover">
        	<thead>
        		<tr>
        			<th>#</th>
        			<th>Nr sali</th>
        			<th>Nr filmu</th>
        			<th>Godzina</th>
        			<th>Edycja</th>
        		</tr>
        	</thead>
            @if($repertoires)
            @foreach($repertoires as $repertoire)
        	<tbody>
        		<tr>
        			<td>{{$repertoire->id}}</td>
        			<td>{{$repertoire->hall_id}}</td>
        			<td>{{$repertoire->movie_id}}</td>
        			<td>{{$repertoire->time}} </td>
        			
        			<td><a href="{{action('RepertoireController@edit',['id'=>$repertoire->id])}}" class="btn btn-success"><i class="fa fa-edit"></i> Edytuj</a></td>
                    <td>
                                <form method="POST" action="{{ action('RepertoireController@destroy', ['id' => $repertoire->id]) }}" class="form-horizontal">
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
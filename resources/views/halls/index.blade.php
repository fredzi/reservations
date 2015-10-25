@extends('dashboard')
@section('content')

    
<div class="box">

    <div class="box-header">
        <a href="{{ url('hall/create') }}" class="btn btn-info pull-left" style="margin-right: 5px;">
            <i class="fa fa-plus"></i> Dodaj
        </a>
    </div><!-- /.box-header -->

    <div class="box-body">
    	<table class="table table-bordered table-hover">
    		<thead>
    			<tr>
    				<th class="col-xs-1">#</th>
    				<th class="col-xs-3">Nazwa</th>
    				<th class="col-xs-1" style="text-align:center">Akcje</th>
                    
    			</tr>
    		</thead>
    		<tbody>
    		@if($halls)
		    @foreach($halls as $hall)
		    	<tr>
                            <td>{{$hall->id}}</td>
                            <td>{{$hall->name}}</td>
                            <td>
                                <a href="{{action('HallController@edit',['id'=>$hall->id])}}" class="btn btn-success">
                                    <i class="fa fa-edit"></i> Edytuj
                                </a>
                            </td>
                            <td>
                                <form style="" method="POST" action="{{ action('HallController@destroy', ['id' => $hall->id]) }}" class="form-horizontal">
                                    <input name="_method" type="hidden" value="delete">
                                    {!! csrf_field() !!}

                                        <button type="submit" class="btn btn-danger"><i class="fa fa-minus-square"></i> Usuń</button>

                                </form>
                            </td>
		    	</tr>
		    @endforeach
		    @else
		    	<tr><td colspan="7">Brak danych</td></tr>
		   	@endif
			</tbody>
            
		</table>
	</div><!--/.box-body -->
</div><!--/.box -->
@endsection
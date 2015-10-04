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
    				<th>#</th>
    				<th>Nazwa</th>
    			</tr>
    		</thead>
    		<tbody>
    		@if($halls)
		    @foreach($halls as $hall)
		    	<tr>
		    		<td>{{$hall->id}}</td>
		    		<td>{{$hall->name}}</td>
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
@extends('main')
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
                    <th class="col-xs-1" style="text-align:center">Miejsca</th>
    				<th class="col-xs-1" style="text-align:center">Akcje</th>
                    
    			</tr>
    		</thead>
    		<tbody>
    		@if($halls)
		    @foreach($halls as $hall)
		    	<tr>
                            <td>{{$hall->id}}</td>
                            <td>{{$hall->name}}</td>
                            <td style="text-align:center"><a href="{{action('HallController@show',['id'=>$hall->id])}}" class="btn btn-primary">Podgląd miejsc</a></td>
                            <td >
                                
                                <a  href="{{action('HallController@edit',['id'=>$hall->id])}}" class="btn btn-success">
                                    <i class="fa fa-edit"></i> Edytuj
                                </a>
                            
                                <form style="margin-top:-34px; margin-left:90px;" method="POST" action="{{ action('HallController@destroy', ['id' => $hall->id]) }}" class="form-horizontal">
                                    <input name="_method" type="hidden" value="delete">
                                    {!! csrf_field() !!}

                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal"><i class="fa fa-minus-square"></i>Usuń</button>

                                  <!-- Modal -->
                                  <div class="modal fade" id="myModal" role="danger">
                                   
                                    <div class="modal-danger modal-sm" style="text-align:center; margin-left:auto; margin-right:auto; margin-top:100px;">
                                    
                                      <!-- Modal content-->
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                                          <h4 class="modal-title">Uwaga !</h4>
                                        </div>
                                        <div class="modal-body">
                                          <p>Czy jesteś pewien, że chcesz usunąć wybrany rekord ?</p>
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-default" data-dismiss="modal">Nie</button>
                                          <button type="submit" class="btn btn-default">Tak</button>
                                        </div>
                                      
                                  </div>
                                      
                                    </div>
                                  </div>

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
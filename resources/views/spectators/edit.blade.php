@extends('dashboard')
@section('content')
<h1>
<p>Typ klienta <a class="fa fa-angle-right"></a> Edytuj

</p>
</h1>
@include('forms/errors')

<div class="box box-info">
	<div class="box-header with-border">
        <h3 class="box-title">
            Edytuj
        </h3>
    </div><!-- /.box-header -->


<form method="POST" action="{{ action('SpectatorTypeController@edit', ['id' => $spectators->id]) }}" class="form-horizontal">
	<input name="_method" type="hidden" value="PATCH">
	{!! csrf_field() !!}
	
	<div class="box-body">
		        <!-- NAZWA -->
		        <div class="form-group" @if($errors->has('name'))  has-error @endif>
		          <label for="name" class="col-sm-2 control-label">
		              Nazwa
		          </label>
		          <div class="col-sm-10">
		            <input class="form-control" id="name" value="<?= $spectators->name; ?>"  name="name">
		          </div>
		        </div>
	</div><!--/.box-body --> 
    @include('forms/buttons', ['submit_action' => 'SpectatorTypeController@index'])
</form>
<form method="POST" action="{{ action('SpectatorTypeController@destroy', ['id' => $spectators->id]) }}" class="form-horizontal">
	<input name="_method" type="hidden" value="delete">
	{!! csrf_field() !!}

	<div class="box-body">
            
            <button type="submit" class="btn btn-danger pull-left">
                Usuń
            </button>
    </div><!-- /.box-footer -->
</form>
<br>
</div><!--/.box box-info -->
@endsection
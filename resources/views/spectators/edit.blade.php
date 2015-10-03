@extends('dashboard')
@section('content')
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
		        <div class="form-group">
		          <label for="name" class="col-sm-2 control-label">
		              Nazwa
		          </label>
		          <div class="col-sm-10">
		            <input class="form-control" id="name" value="<?= $spectators->name; ?>"  name="name">
		          </div>
		        </div>
	</div><!--/.box-body -->
	<div class="box-footer">
            <a href="{{ action('SpectatorTypeController@index') }}" type="submit" class="btn btn-default pull-right">
                Anuluj
            </a>
            <button type="submit" class="btn btn-info pull-left">
                Aktualizuj
            </button>


    </div><!-- /.box-footer -->
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

@if ($errors->any())
	<ul class="alert alert-danger">
		@foreach ($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
	</ul>
@endif
</div><!--/.box box-info -->
@endsection
@extends('dashboard')
@section('content')

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
		        <div class="form-group @if($errors->has('name'))  has-error @endif">
		          <label for="name" class="col-sm-2 control-label">
		              Nazwa
		          </label>
		          <div class="col-sm-10">
		            <input class="form-control" id="name" value="<?= $spectators->name; ?>"  name="name">
		          </div>
		        </div>
		         <!-- CENA -->
		        <div class="form-group @if($errors->has('price'))  has-error @endif">
		          <label for="price" class="col-sm-2 control-label">
		              Cena
		          </label>
		          <div class="col-sm-10">
		            <input class="form-control" id="price" value="<?= $spectators->price; ?>"  name="price">
		          </div>
		        </div>
	</div><!--/.box-body --> 
    @include('forms/buttons', ['submit_action' => 'SpectatorTypeController@index'])
</form>

<br>
</div><!--/.box box-info -->
@endsection
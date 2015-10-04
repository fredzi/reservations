@extends('dashboard')
@section('content')
<h1>
<p>Movies <a class="fa fa-angle-right"></a>Edytuj

</p>
</h1>

@include('forms/errors')

<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">
            Edytuj
        </h3>
    </div><!-- /.box-header -->



<form method="POST" action="{{ action('MovieController@edit', ['id' => $movies->id]) }}" class="form-horizontal">
	<input name="_method" type="hidden" value="PATCH">
	{!! csrf_field() !!}
		<div class="box-body">
        <!-- TYTUL -->
	        <div class="form-group @if($errors->has('title'))  has-error @endif">
	          <label for="title" class="col-sm-2 control-label">
	              Tytuł
	          </label>
	          <div class="col-sm-10">
	            <input class="form-control" id="title" value="<?= $movies->title; ?>" name="title">
	          </div>
	        </div>
	        <!--TYTUŁ ORYGINALNY -->
	        <div class="form-group" @if($errors->has('original_title'))  has-error @endif>
	          <label for="original_title" class="col-sm-2 control-label">
	              Tytuł oryginalny
	          </label>
	          <div class="col-sm-10">
	            <input class="form-control" id="original_title" value="<?= $movies->original_title; ?>" name="original_title">
	          </div>
	        </div>
	        <!--CZAS TRWANIA -->
	        <div class="form-group" @if($errors->has('time'))  has-error @endif>
	          <label for="time" class="col-sm-2 control-label">
	              Czas trwania
	          </label>
	          <div class="col-sm-10">
	            <input class="form-control" id="time" value="<?= $movies->time; ?>" name="time">
	          </div>
        	</div>
        	<!-- OPIS -->
	        <div class="form-group"@if($errors->has('describtion'))  has-error @endif>
	          <label for="describtion" class="col-sm-2 control-label">
	              Opis
	          </label>
	          <div class="col-sm-10">
	            <input class="form-control" id="describtion" value="<?= $movies->describtion; ?>" name="describtion">
	          </div>
	        </div>
	        <!-- CENA -->
	        <div class="form-group">
	          <label for="price" class="col-sm-2 control-label">
	              Cena
	          </label>
	          <div class="col-sm-10">
	            <input class="form-control" id="price" value="<?= $movies->price; ?>" name="price">
	          </div>
	        </div>
        </div><!-- /.box-body -->
        @include('forms/buttons', ['submit_action' => 'MovieController@index'])
	
</form>

<form method="POST" action="{{ action('MovieController@destroy', ['id' => $movies->id]) }}" class="form-horizontal">
	<input name="_method" type="hidden" value="delete">
	{!! csrf_field() !!}
	<div class="box-body">
		<button type="submit" class="btn btn-danger">Usuń</button>
	</div>
</form>
<br>


</div><!--/.box box-info -->
@endsection
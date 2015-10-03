@extends('dashboard')
@section('content')
<h1>
<p>Sale <a class="fa fa-angle-right"></a> Dodaj

</p>
</h1>

@include('forms/errors')

<div class="box box-info">
	<div class="box-header with-border">
        <h3 class="box-title">
            Dodaj salę
        </h3>
    </div><!-- /.box-header -->



	<form method="POST" action="{{ action('HallController@store') }}" class="form-horizontal">
	{!! csrf_field() !!}
	<div class="box-body">
        <!-- NAZWA -->
        <div class="form-group" @if($errors->has('name'))  has-error @endif>
          <label for="name" class="col-sm-2 control-label">
              Nazwa
          </label>
          <div class="col-sm-10">
            <input type="text" name="name" value="{{ old('name')}}" class="form-control" id="name" placeholder="Podaj nazwę">
          </div>
        </div>
        <!-- MIEJSC W RZĘDZIE -->
        <div class="form-group" @if($errors->has('x'))  has-error @endif>
          <label for="x" class="col-sm-2 control-label">
              Ilość miejsc w rzędzie
          </label>
          <div class="col-sm-10">
            <input type="text" name="x" value="{{ old('x')}}" class="form-control" placeholder="Ilość miejsc w rzędzie" id="x">
          </div>
        </div>
        <!-- ILOŚĆ RZĘDÓW -->
        <div class="form-group"@if($errors->has('y'))  has-error @endif>
          <label for="y" class="col-sm-2 control-label">
              Ilość rzędów
          </label>
          <div class="col-sm-10">
            <input type="text" name="y" value="{{ old('y')}}" class="form-control" placeholder="Ilość rzędów" id="y">
          </div>
        </div>
    </div><!--/.box-body -->
    	
@include('forms/buttons', ['submit_action' => 'RepertoireController@index'])



	
	
	

	</form>


@endsection

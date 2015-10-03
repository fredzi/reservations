@extends('dashboard')
@section('content')

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
        <div class="form-group">
          <label for="name" class="col-sm-2 control-label">
              Nazwa
          </label>
          <div class="col-sm-10">
            <input type="text" name="name" value="{{ old('name')}}" class="form-control" id="name" placeholder="Podaj nazwę">
          </div>
        </div>
        <!-- MIEJSC W RZĘDZIE -->
        <div class="form-group">
          <label for="x" class="col-sm-2 control-label">
              Ilość miejsc w rzędzie
          </label>
          <div class="col-sm-10">
            <input type="text" name="x" value="{{ old('x')}}" class="form-control" placeholder="Ilość miejsc w rzędzie" id="x">
          </div>
        </div>
        <!-- ILOŚĆ RZĘDÓW -->
        <div class="form-group">
          <label for="y" class="col-sm-2 control-label">
              Ilość rzędów
          </label>
          <div class="col-sm-10">
            <input type="text" name="y" value="{{ old('y')}}" class="form-control" placeholder="Ilość rzędów" id="y">
          </div>
        </div>
    </div><!--/.box-body -->
    	<div class="box-footer">
            <a href="{{ action('HallController@index') }}" type="submit" class="btn btn-default pull-right">
                Anuluj
            </a>
            <button type="submit" class="btn btn-info pull-left">
                Dodaj
            </button>
        </div><!-- /.box-footer -->




	
	
	

	</form>
@if (count($errors) > 0)
          <div class="alert alert-danger fade in" role="alert">

            <ol>

              @foreach ($errors->all() as $error)
                <ul class="glyphicon glyphicon-exclamation-sign" aria-hidden="true" >{{ $error }}</ul>
              @endforeach

            </ol>

          </div>
        @endif
</div><!--/.box box-info -->

@endsection

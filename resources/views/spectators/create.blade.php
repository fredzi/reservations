@extends('dashboard')
@section('content')

<div class="box box-info">
	<div class="box-header with-border">
        <h3 class="box-title">
            Dodaj typ klienta
        </h3>
    </div><!-- /.box-header -->


	<form method="POST" action="{{ action('SpectatorTypeController@store') }}" class="form-horizontal">
	{!! csrf_field() !!}
		<div class="box-body">
		        <!-- NAZWA -->
		        <div class="form-group">
		          <label for="name" class="col-sm-2 control-label">
		              Nazwa
		          </label>
		          <div class="col-sm-10">
		            <input class="form-control" id="name" value="{{ old('name')}}" placeholder="Podaj nazwę" name="name">
		          </div>
		        </div>
		</div><!--/.box-body -->

		 <div class="box-footer">
            <a href="{{ action('SpectatorTypeController@index') }}" type="submit" class="btn btn-default pull-right">
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

</div><!-- /.box box-info -->

@endsection
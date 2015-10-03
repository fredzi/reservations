@extends('dashboard')
@section('content')
<h1>
<p>Typ klienta <a class="fa fa-angle-right"></a> Dodaj

</p>
</h1>

@include('forms/errors')

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
		        <div class="form-group "@if($errors->has('name'))  has-error @endif>
		          <label for="name" class="col-sm-2 control-label">
		              Nazwa
		          </label>
		          <div class="col-sm-10">
		            <input class="form-control" id="name" value="{{ old('name')}}" placeholder="Podaj nazwę" name="name">
		          </div>
		        </div>
		</div><!--/.box-body -->

		 
         @include('forms/buttons', ['submit_action' => 'SpectatorTypeController@index'])
	</form>

	

</div><!-- /.box box-info -->

@endsection
@extends('dashboard')
@section('content')


@include('forms/errors')

<div class="box box-info">
	<div class="box-header with-border">
        <h3 class="box-title">
            
        </h3>
    </div><!-- /.box-header -->


	<!-- form start -->
      {!! Form::model($stetting, array('url' => $action, 'class' => 'form-horizontal', 'enctype'=>'multipart/form-data')) !!}
        <div class="box-body">        
        <!-- MINIATURKA FILMU -->
        <div class="form-group @if($errors->has('image'))  has-error @endif" >
            <label for="file" class="col-sm-2 control-label">Logo </label>
            <div class="col-xs-3 " >
                <input  type="file" id="exampleInputFile" class="btn btn-default" name="image">
            </div>
        </div>

        </div><!-- /.box-body -->
        @include('forms/buttons', ['submit_action' => 'StettingController@index'])
    {!! Form::close() !!}
	

</div><!-- /.box box-info -->

@endsection
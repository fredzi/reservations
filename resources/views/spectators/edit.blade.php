@extends('main')
@section('content')

@include('forms/errors')

<div class="box box-info">
	<div class="box-header with-border">
        <h3 class="box-title">
            Edytuj
        </h3>
    </div><!-- /.box-header -->

{!! Form::model($spectator, array('url' => $action, 'class' => 'form-horizontal')) !!}	
	<div class="box-body">
		        <!-- NAZWA -->
		        <div class="form-group @if($errors->has('name'))  has-error @endif">
		        	{!! Form::label('name', 'Nazwa', ['class'=> 'col-sm-2 control-label']) !!}
		          <div class="col-xs-3">
		            {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Podaj nazwę']) !!}
		          </div>		          
		        </div>
		         <!-- CENA -->
		        <div class="form-group @if($errors->has('price'))  has-error @endif">
		            {!! Form::label('price', 'Cena', ['class'=>'col-sm-2 control-label']) !!}
		          <div class="col-xs-3" >
		            {!! Form::text('price', null, ['class'=>'form-control man', 'placeholder'=>'Podaj cenę' ]) !!}
		          </div>
		        </div>
	</div><!--/.box-body --> 
    @include('forms/buttons', ['submit_action' => 'SpectatorTypeController@index'])
{!! Form::close() !!}

<br>
</div><!--/.box box-info -->
@endsection
@section('js')

<!-- InputMask -->
    <script src="{{ asset ("/bower_components/AdminLTE/plugins/input-mask/jquery.inputmask.js")}}"></script>
    <script src="{{ asset ("/bower_components/AdminLTE/plugins/input-mask/jquery.inputmask.date.extensions.js")}}"></script>
    <script src="{{ asset ("/bower_components/AdminLTE/plugins/input-mask/jquery.inputmask.extensions.js")}}"></script>
    <script src="{{ asset ("/bower_components/AdminLTE/plugins/input-mask/jquery.inputmask.numeric.extensions.js")}}"></script>
    <script src="{{ asset ("/bower_components/AdminLTE/plugins/input-mask/jquery.inputmask.phone.extensions.js")}}"></script>
<script src="{{ asset ("/bower_components/AdminLTE/bootstrap/js/jquery.maskMoney.js")}}" ></script><!-- Page script -->
    <script>
      $(function () {
               
                $("[data-mask]").priceFormat({
            prefix: 'R$ ',
            centsSeparator: ',',
            thousandsSeparator: '.'
        });
        CKEDITOR.replace('editor1');
                //bootstrap WYSIHTML5 - text editor
                $(".textarea").wysihtml5();
                $('#money').mask('000.000.000.000.000,00', {reverse: true});
              });
    </script>

<script type="text/javascript">
        $(".man").maskMoney({
        prefix:'PLN ', // The symbol to be displayed before the value entered by the user
        allowZero:false, // Prevent users from inputing zero
        allowNegative:true, // Prevent users from inputing negative values
        defaultZero:false, // when the user enters the field, it sets a default mask using zero
        thousands: '.', // The thousands separator
        decimal: '.' , // The decimal separator
        precision: 2, // How many decimal places are allowed
        affixesStay : false, // set if the symbol will stay in the field after the user exits the field. 
        symbolPosition : 'left' // use this setting to position the symbol at the left or right side of the value. default 'left'
        }); //
        </script>
@endsection
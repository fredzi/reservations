@extends('main')
@section('head')
<meta name="_token" content="{{ csrf_token() }}" />  

<style>
input[type=checkbox] {
    display:none;
}

input[type=checkbox] + label{
    background:url('/chair1.png');
    height: 32px;
    width: 32px;
    display:inline-block;
    padding: 0 0 0 0px;
}
input[type=checkbox] + label.klasa{
    background:url('/chair2.png');
    height: 32px;
    width: 32px;
    display:inline-block;
    padding: 0 0 0 0px;
}

</style>
@stop

@section('js')
<script>
$("#viewedit").hide();
$("#show").click(function(e){
   e.preventDefault();
   $("#viewedit").show();
   $("#show").hide();
});

$("#hide").click(function(e){
  e.preventDefault();
  $("#viewedit").hide();
   $("#show").show();
});

$(document).ready(function()
{
var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
var form = $('#form');
form.bind('submit',function(e)
{
    
    e.preventDefault();
    $.ajax({
        type: form.attr('method'),
        url: form.attr('action'),
        data: form.serialize(),
        success: function(data) {
            $("#show").show();
            $("#viewedit").hide();
            $("#hallname").html(data);
            console.log("czekaj");
        },
        error: function(data) {
            console.log('error');
        }
    });
});
});

$(".klasa").hover(function(){
    $('.klasa').css("background","url('/chair1.png')");
    }, function(){
    $('.klasa').css("background","url('/chair2.png')");
}); 



</script>
@endsection

@section('content')


@include('forms/errors')

<div class="box box-info">
    <div class="box-header with-border">
    <h3 class="box-title" id="hallname">
      @if(Request::ajax())
          <?php return $json; ?>
      @else
        <?= $hall->name ?>
      @endif

        
        
    </h3>
    <button id="show" class="btn btn-success" style="margin-left:20px;"> Edytuj</button>
</div><!-- /.box-header -->

<!-- form start -->
  {!! Form::model($hall, array('url' => $action, 'class' => 'form-horizontal', 'id' =>'form')) !!}

  <div class="box-body">
          
          <div class="col-xs-12" id="viewedit">
              <!-- NAZWA -->
              <div class="form-group @if($errors->has('repertoire_id'))  has-error @endif">
                {!! Form::label('name', 'Nazwa', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-xs-3">
                    {!! Form::text('name', null, ['id'=>'name', 'class' => 'form-control', 'placeholder' => 'Podaj nazwę sali']) !!}
                <button id="hide" class="btn btn-default pull-right" style="margin-top:8px; ">Anuluj</button>
                <button id="ok" type="submit" class="btn btn-info pull-right" style="margin-top:8px; margin-right:5px;">
                    OK
                </button>
                
                    
                
                </div>
              </div>
              
          </div>
        
        
        
        
        {!! Form::close() !!}

	
    </div><!--/.box-body -->

<div class="box-body text-center">
    
    @for($y = 0; $y < ($posy+1) ; $y++)
                    @for ($x = 0; $x < ($posx+1) ; $x++)
                        
                                @if((DB::table('seats_in_halls')->select('pos_y','pos_x')->where('pos_y',$y)->where('pos_x',$x)->where('hall_id',$downid)->get()))
                                <input type="checkbox" class="check" name="<?= $x.'-'.$y ?>" id="<?= $x.'-'.$y ?>" value='1'><label for="<?= $x.'-'.$y ?>"></label>
                                @else
                                <input type="checkbox" class="checkn" name="<?= $x.'-'.$y ?>" id="<?= $x.'-'.$y ?>" value='2'><label class="klasa" for="<?= $x.'-'.$y ?>"></label>
                                @endif
                    @endfor
                    <br>
                    
                @endfor   
    
    <div class="alert alert-info">
        Ekran 
        
    </div>
    
</div>
<div class="box-footer">
<a href="{{ action('HallController@index') }}" type="submit" class="btn btn-default pull-left" style="margin-left:10px;">
        Powrót
    </a>
  </div>
  </div><!-- /.box -->

@endsection

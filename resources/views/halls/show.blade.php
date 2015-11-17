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

@section('content')
@include('forms/errors')

<div class="box box-info">
    <div class="box-header with-border">
    <h3 class="box-title">
        <?= $hall->name ?>
    </h3>
</div><!-- /.box-header -->



<!--FORMULARZ DODAWANIA  -->


{!! Form::open(['url' => $action]) !!}

<div class="box-body text-center">
    
    @for($y = 0; $y < ($posy+1) ; $y++)
                    @for ($x = 0; $x < ($posx+1) ; $x++)
                        
                                @if((DB::table('seats_in_halls')->select('pos_y','pos_x')->where('pos_y',$y)->where('pos_x',$x)->where('hall_id',$downid)->get()))
                                <input type="checkbox" class="check" name="<?= $x.'-'.$y ?>" id="<?= $x.'-'.$y ?>" value='1'><label for="<?= $x.'-'.$y ?>"></label>
                                @else
                                <input type="checkbox" class="check" name="<?= $x.'-'.$y ?>" id="<?= $x.'-'.$y ?>" value='1'><label class="klasa" for="<?= $x.'-'.$y ?>"></label>
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

{!! Form::close() !!}

@stop 
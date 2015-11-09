@extends('main')
@section('content')

@include('forms/errors')

{!! Form::model($movie, array('url' => $action, 'class' => 'form-horizontal', 'enctype'=>'multipart/form-data', 'autocomplete' => false)) !!}
<div class="row" id="form-movie">
    <div class="col-md-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">
                    Uzupełnij podstawowe informacje o filmie
                </h3>
            </div>
            <div class="box-body">
                <!-- TYTUL -->
                <div class="form-group @if($errors->has('title'))  has-error @endif">
                    {!! Form::label('title', 'Tytuł', ['class' => 'col-sm-3 control-label']) !!}
                    <div class="col-md-8">
                        {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Podaj tytuł']) !!}
                    </div>
                </div>
                <!-- TYTUL ORIGINALNU -->
                <div class="form-group @if($errors->has('original_title'))  has-error @endif">
                    {!! Form::label('original_title', 'Tytuł oryginalny', ['class' => 'col-sm-3 control-label']) !!}
                    <div class="col-md-8">
                        {!! Form::text('original_title', null, ['class' => 'form-control', 'placeholder' => 'Podaj tytuł oryginalny']) !!}
                    </div>
                </div>
                <!-- CZAS TRWANIA -->
                <div class="form-group @if($errors->has('time'))  has-error @endif">
                    {!! Form::label('time', 'Czas trwania', ['class' => 'col-sm-3 control-label']) !!}
                    <div class="col-md-8">
                        {!! Form::text('time', null, ['class' => 'form-control', 'placeholder' => 'Czas trwania filmu w minutach']) !!}
                    </div>
                </div>
                <!-- OPIS -->
                <div class="form-group @if($errors->has('describtion'))  has-error @endif">
                    {!! Form::label('describe', 'Opis', ['class' => 'col-sm-3 control-label']) !!}
                    <div class="col-md-8">
                        {!! Form::textarea('describtion', null, ['class' => 'form-control', 'placeholder' => 'Tekst do 1000 znaków']) !!}
                    </div>
                </div>

                <!-- POBIERANIE DANYCH Z TABELI SPECTATORS_TYPES -->
                @foreach ($spectators_types as $spectator_type)
                <div class="form-group ">
                    <label class="col-sm-3 control-label">
                        Typ klienta : {{$spectator_type->name}}
                    </label>

                </div>

                <div class="form-group ">
                    {!! Form::label('price_'.$spectator_type->id, 'Cena', ['class' => 'col-sm-3 control-label']) !!}
                    <div class="col-md-8">
                        {!! Form::text('price_'.$spectator_type->id, null, ['class' => 'form-control', 'placeholder' => '', 'id'=>'money-bank']) !!}
                    </div>
                </div>
                @endforeach

                <!-- MINIATURKA FILMU -->
                <div class="form-group @if($errors->has('image'))  has-error @endif" >
                    <label for="file" class="col-sm-3 control-label">Miniaturka filmu</label>
                    <div class="col-md-8 " >
                        <input  type="file" id="exampleInputFile" class="btn btn-default" name="image">
                    </div>
                </div>

            </div><!-- /.box-body -->
            <div class="box-footer">
                <a id="add_repertoire" class="btn btn-default pull-left">Dodaj czas wyświetlania</a>
            </div>
        </div><!-- /.box -->
    </div>
    <div class="col-md-12" id="box-repertoire">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">
                    Określ czas wyświetlania filmu
                </h3>
            </div>
            
            <div class="box-body">
                <!-- POLA REPERTUARU -->
                @foreach ($movie_repertoire as $repertoire)
                
                <!-- checkbox -->
                <div class="form-group col-sm-4">
                    <div class="col-md-12">
                        <label>Sala:</label>
                        {!! Form::select('repertoire-'.$repertoire['id'].'-hall_id', $halls, null, ['class' => 'form-control']) !!}
                    </div>
                </div>
                
                <!-- time Picker -->
                <div class="bootstrap-timepicker col-sm-2">
                    <div class="form-group col-md-12">
                      <label>Czas:</label>
                      <div class="input-group">
                        {!! Form::text('repertoire-'.$repertoire['id'].'-time', $repertoire['time'], ['class' => 'form-control timepicker']) !!}
                        <div class="input-group-addon">
                          <i class="fa fa-clock-o"></i>
                        </div>
                      </div><!-- /.input group -->
                    </div><!-- /.form group -->
                </div>
                
                <!-- time Picker -->
                <div class="bootstrap-datepicker col-sm-3">
                    <div class="form-group col-md-12">
                      <label>Wyświetlaj od:</label>
                      <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        {!! Form::text('repertoire-'.$repertoire['id'].'-date_from', $repertoire['date_from'], ['class' => 'form-control datepicker']) !!}
                      </div><!-- /.input group -->
                    </div><!-- /.form group -->
                </div>
                
                <!-- time Picker -->
                <div class="bootstrap-datepicker col-sm-3">
                    <div class="form-group col-md-12">
                      <label>Wyświetlaj do:</label>
                      <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        {!! Form::text('repertoire-'.$repertoire['id'].'-date_to', $repertoire['date_to'], ['class' => 'form-control datepicker']) !!}
                      </div><!-- /.input group -->
                    </div><!-- /.form group -->
                </div>
                
                <!-- checkbox -->
                <div class="form-group">
                    <div class="checkbox col-xs-1">
                        <label>
                            {!! Form::checkbox('repertoire-'.$repertoire['id'].'-monday', '1', (($repertoire['monday'] == '1')?true:false), ['class' => 'minimal']) !!}
                            Poniedziałek
                        </label>
                    </div>
                    <div class="checkbox col-xs-1">
                        <label>
                            {!! Form::checkbox('repertoire-'.$repertoire['id'].'-tuesday', '1', (($repertoire['tuesday'] == '1')?true:false), ['class' => 'minimal']) !!}
                            Wtorek
                        </label>
                    </div>
                    <div class="checkbox col-xs-1">
                        <label>
                            {!! Form::checkbox('repertoire-'.$repertoire['id'].'-wednesday', '1', (($repertoire['tuesday'] == '1')?true:false), ['class' => 'minimal']) !!}
                            Środa
                        </label>
                    </div>
                    <div class="checkbox col-xs-1">
                        <label>
                            {!! Form::checkbox('repertoire-'.$repertoire['id'].'-thursday', '1', (($repertoire['tuesday'] == '1')?true:false), ['class' => 'minimal']) !!}
                            Czwartek
                        </label>
                    </div>
                    <div class="checkbox col-xs-1">
                        <label>
                            {!! Form::checkbox('repertoire-'.$repertoire['id'].'-friday', '1', (($repertoire['tuesday'] == '1')?true:false), ['class' => 'minimal']) !!}
                            Piątek
                        </label>
                    </div>
                    <div class="checkbox col-xs-1">
                        <label>
                            {!! Form::checkbox('repertoire-'.$repertoire['id'].'-saturday', '1', (($repertoire['tuesday'] == '1')?true:false), ['class' => 'minimal']) !!}
                            Sobota
                        </label>
                    </div>
                    <div class="checkbox col-xs-1">
                        <label>
                            {!! Form::checkbox('repertoire-'.$repertoire['id'].'-sunday', '1', (($repertoire['tuesday'] == '1')?true:false), ['class' => 'minimal']) !!}
                            Niedziela
                        </label>
                    </div>
                </div>
                <hr />
                @endforeach
            </div>
            @include('forms/buttons', ['submit_action' => 'MovieController@index'])
        </div>
    </div>
</div>
{!! Form::close() !!}

@endsection

@section('head')
<link rel="stylesheet" href="{{ asset("/bower_components/AdminLTE/plugins/timepicker/bootstrap-timepicker.min.css")}}">
@endsection

@section('js')
<script src="{{ asset("/bower_components/AdminLTE/plugins/daterangepicker/daterangepicker.js")}}"></script>
<script src="{{ asset("/bower_components/AdminLTE/plugins/timepicker/bootstrap-timepicker.min.js")}}"></script>
<script src="{{ asset("/bower_components/AdminLTE/plugins/datepicker/bootstrap-datepicker.js")}}"></script>
<script src="{{ asset("/bower_components/AdminLTE/plugins/datepicker/locales/bootstrap-datepicker.pl.js")}}"></script>

<!-- Page script -->
<script>
    $(function(){
        var count = 0;
        $('#add_repertoire').click(function(){
            count++;
            var box = $('#box-repertoire .box-body').clone();
            var inputs = box.find('input');
            $.each(inputs, function(ind, rec) {
                tmp_name = $(rec).attr('name').replace(/repertoire-([0-9])/, "repertoire-new"+count);
                $(rec).attr('name', tmp_name);
            });
            $('#box-repertoire .box-body').append(box);
        });
        
        //Timepicker
        $(".timepicker").timepicker({
          showInputs: false,
          showMeridian: false,
          minuteStep: 5
        });
        //Timepicker
        $(".datepicker").datepicker({
            format: 'yyyy-mm-dd'
        });
    });
    
</script>
@endsection
@extends('dashboard')
@section('content')

@include('forms/errors')

<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">
            Dodaj film
        </h3>
    </div><!-- /.box-header -->
    <!-- form start -->
    <form class="form-horizontal" method="POST" action="{{ action('MovieController@store') }}" >
        {!! csrf_field() !!}
        <div class="box-body">
        <!-- TYTUL -->
        <div class="form-group @if($errors->has('title'))  has-error @endif">
          <label for="title" class="col-sm-2 control-label">
              Tytuł
          </label>
          <div class="col-sm-10">
            <input class="form-control" id="title" value="{{ old('title')}}" placeholder="Podaj tytuł">
          </div>
        </div>
        <!-- TYTUL ORIGINALNU -->
        <div class="form-group">
          <label for="original_title" class="col-sm-2 control-label">
              Tytuł oryginalny
          </label>
          <div class="col-sm-10">
            <input class="form-control" id="original_title" value="{{ old('original_title')}}" placeholder="Podaj tytuł oryginalny">
          </div>
        </div>
        <!-- CZAS TRWANIA -->
        <div class="form-group">
          <label for="time" class="col-sm-2 control-label">
              Czas trwania
          </label>
          <div class="col-sm-10">
            <input class="form-control" id="time" value="{{ old('time')}}" placeholder="Czas trwania filmu w minutach">
          </div>
        </div>
        <!-- OPIS -->
        <div class="form-group">
          <label for="describtion" class="col-sm-2 control-label">
              Opis
          </label>
          <div class="col-sm-10">
            <input class="form-control" id="describtion" value="{{ old('describtion')}}" placeholder="Opis filmu do 1000 znaków">
          </div>
        </div>
        </div><!-- /.box-body -->
        <div class="box-footer">
            <a href="{{ action('MovieController@index') }}" type="submit" class="btn btn-default pull-right">
                Anuluj
            </a>
            <button type="submit" class="btn btn-info pull-left">
                Dodaj
            </button>
        </div><!-- /.box-footer -->
    </form>
</div><!-- /.box -->

@endsection
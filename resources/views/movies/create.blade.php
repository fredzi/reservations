@extends('dashboard')
@section('content')

<h1>
<p>Filmy <a class="fa fa-angle-right"></a> Dodaj

</p>
</h1>

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
        <div class="form-group"@if($errors->has('title'))  has-error @endif>
          <label for="title" class="col-sm-2 control-label">
              Tytuł
          </label>
          <div class="col-sm-10">
            <input class="form-control" id="title" value="{{ old('title')}}" placeholder="Podaj tytuł" name="title">
          </div>
        </div>
        <!-- TYTUL ORIGINALNU -->
        <div class="form-group"@if($errors->has('original_title'))  has-error @endif>
          <label for="original_title" class="col-sm-2 control-label">
              Tytuł oryginalny
          </label>
          <div class="col-sm-10">
            <input class="form-control" id="original_title" value="{{ old('original_title')}}" placeholder="Podaj tytuł oryginalny" name="original_title">
          </div>
        </div>
        <!-- CZAS TRWANIA -->
        <div class="form-group "@if($errors->has('time'))  has-error @endif>
          <label for="time" class="col-sm-2 control-label">
              Czas trwania
          </label>
          <div class="col-sm-10">
            <input class="form-control" id="time" value="{{ old('time')}}" placeholder="Czas trwania filmu w minutach" name="time">
          </div>
        </div>
        <!-- OPIS -->
        <div class="form-group "@if($errors->has('describtion'))  has-error @endif>
          <label for="describtion" class="col-sm-2 control-label">
              Opis
          </label>
          <div class="col-sm-10">
            <input class="form-control" id="describtion" value="{{ old('describtion')}}" placeholder="Opis filmu do 1000 znaków" name="describtion">
          </div>
        </div>
        </div><!-- /.box-body -->
        @include('forms/buttons', ['submit_action' => 'MovieController@index'])
    </form>
</div><!-- /.box -->

@endsection

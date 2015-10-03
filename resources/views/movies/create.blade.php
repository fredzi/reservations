@extends('dashboard')
@section('content')

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
        <div class="form-group">
          <label for="title" class="col-sm-2 control-label">
              Tytuł
          </label>
          <div class="col-sm-10">
            <input class="form-control" id="title" value="{{ old('title')}}" placeholder="Podaj tytuł" name="title">
          </div>
        </div>
        <!-- TYTUL ORIGINALNU -->
        <div class="form-group">
          <label for="original_title" class="col-sm-2 control-label">
              Tytuł oryginalny
          </label>
          <div class="col-sm-10">
            <input class="form-control" id="original_title" value="{{ old('original_title')}}" placeholder="Podaj tytuł oryginalny" name="original_title">
          </div>
        </div>
        <!-- CZAS TRWANIA -->
        <div class="form-group">
          <label for="time" class="col-sm-2 control-label">
              Czas trwania
          </label>
          <div class="col-sm-10">
            <input class="form-control" id="time" value="{{ old('time')}}" placeholder="Czas trwania filmu w minutach" name="time">
          </div>
        </div>
        <!-- OPIS -->
        <div class="form-group">
          <label for="describtion" class="col-sm-2 control-label">
              Opis
          </label>
          <div class="col-sm-10">
            <input class="form-control" id="describtion" value="{{ old('describtion')}}" placeholder="Opis filmu do 1000 znaków" name="describtion">
          </div>
        </div>
        <!-- CENA -->
        <div class="form-group">
          <label for="price" class="col-sm-2 control-label">
              Cena
          </label>
          <div class="col-sm-10">
            <input class="form-control" id="price" value="{{ old('price')}}" placeholder="Podaj cenę" name="price">
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
    @if (count($errors) > 0)
          <div class="alert alert-danger fade in" role="alert">

            <ol>

              @foreach ($errors->all() as $error)
                <ul class="glyphicon glyphicon-exclamation-sign" aria-hidden="true" >{{ $error }}</ul>
              @endforeach

            </ol>

          </div>
        @endif
</div><!-- /.box -->

@endsection
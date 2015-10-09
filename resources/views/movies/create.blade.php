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
    <form class="form-horizontal" method="POST" action="{{ action('MovieController@store') }}" enctype='multipart/form-data'>
        {!! csrf_field() !!}
        <div class="box-body">
        <!-- TYTUL -->
        <div class="form-group @if($errors->has('title'))  has-error @endif">
          <label for="title" class="col-sm-2 control-label">
              Tytuł
          </label>
          <div class="col-xs-3">
            <input class="form-control" id="title" value="{{ old('title')}}" placeholder="Podaj tytuł" name="title">
          </div>
        </div>
        <!-- TYTUL ORIGINALNU -->
        <div class="form-group @if($errors->has('original_title'))  has-error @endif">
          <label for="original_title" class="col-sm-2 control-label">
              Tytuł oryginalny
          </label>
          <div class="col-xs-3">
            <input class="form-control" id="original_title" value="{{ old('original_title')}}" placeholder="Podaj tytuł oryginalny" name="original_title">
          </div>
        </div>
        <!-- CZAS TRWANIA -->
        <div class="form-group @if($errors->has('time'))  has-error @endif">
          <label for="time" class="col-sm-2 control-label">
              Czas trwania
          </label>
          <div class="col-xs-3">
            <input class="form-control" id="time" value="{{ old('time')}}" placeholder="Czas trwania filmu w minutach" name="time">
          </div>
        </div>
        <!-- OPIS -->
        <div class="form-group @if($errors->has('describtion'))  has-error @endif">
          <label for="describtion" class="col-sm-2 control-label">
              Opis
          </label>
          <textarea id="describtion" name="describtion" value="{{ old('describtion')}}" rows="10" cols="80" maxlength="1000" placeholder="Tekst do 1000 znaków"></textarea>
           </div>

           <!-- POBIERANIE DANYCH Z TABELI SPECTATORS_TYPES -->
        @foreach ($spectator_type as $spectator_typ)
        <div class="form-group ">
          <label class="col-sm-2 control-label">
              Typ klienta : {{$spectator_typ->name}}

              <input type="hidden" name="id" value="{{old('spectator_type_id',$spectator_typ->id)}}">
              
          </label>
          
        </div>

        <div class="form-group ">
          <label for="price" class="col-sm-2 control-label">
              Cena
          </label>
          <div class="col-xs-3">
            <input class="form-control" id="price" value="{{ old('price',$spectator_typ->price)}}" name="price" data-inputmask='"mask": "99.99"' data-mask>
          </div>
        </div>        
        @endforeach

        <!-- MINIATURKA FILMU -->
        <div class="form-group @if($errors->has('image'))  has-error @endif" >
                      <label for="file" class="col-sm-2 control-label">Miniaturka filmu</label>
                      <div class="col-xs-3 " >
                      <input  type="file" id="exampleInputFile" class="btn btn-default" name="image">
                      </div>
                      <!-- <p class="help-block">Example block-level help text here.</p> -->
        </div>


    
    
        </div><!-- /.box-body -->
        @include('forms/buttons', ['submit_action' => 'MovieController@index'])
    </form>
</div><!-- /.box -->

@endsection

@extends('dashboard')
@section('content')

<div class="box">

    <div class="box-header">
        <a href="{{ url('movies/create') }}" class="btn btn-success pull-left" style="margin-right: 5px;">
            <i class="fa fa-plus"></i> Dodaj
        </a>
    </div><!-- /.box-header -->

    <div class="box-body">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tytuł</th>
                    <th>Oryginalny tytuł</th>
                    <th>Czas</th>
                    <th>Opis</th>
                    <th>Cena</th>
                    <th>Edycja</th>
                </tr>
            </thead>
            @if($movies)
                @foreach($movies as $movie)
                <tbody>
                    <tr>
                        <td>{{$movie->id}}</td>
                        <td>{{$movie->title}}</td>
                        <td>{{$movie->original_title}}</td>
                        <td>{{$movie->time}} minut</td>
                        <td>{{$movie->describtion}}</td>
                        <td>{{$movie->price}} zł</td>
                        <td><a href="{{action('MovieController@edit',['id'=>$movie->id])}}" class="btn btn-success">Edytuj</a></td>
                </tbody>	
                @endforeach
            @else
                <tr><td colspan="7">Brak danych</td></tr>
            @endif
        </table>
    </div><!-- /.box-body -->
</div><!-- /.box -->

@endsection
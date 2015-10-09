@extends('dashboard')
@section('content')

<div class="box">

    <div class="box-header">
        <a href="{{ url('movies/create') }}" class="btn btn-info pull-left" style="margin-right: 5px;">
            <i class="fa fa-plus"></i> Dodaj
        </a>
    </div><!-- /.box-header -->

    <div class="box-body">
    
        <table class="table table-bordered table-hover ">
            <thead>
                <tr>
<<<<<<< HEAD
                    <th>#</th>
                    <th>Tytuł</th>
                    <th>Oryginalny tytuł</th>
                    <th>Czas</th>
                    <th>Opis</th>
                    <th>Edycja</th>
                    <th></th>
=======
                    <th> nr </th>
                    <th >Tytuł</th>
                    <th >Oryginalny tytuł</th>
                    <th >Czas</th>
                    <th  >Opis</th>
                    <th >Cena</th>
                    <th >Edycja</th>
                    <th >Usuń</th>
                    
>>>>>>> 72e37b883ed2ba06c615b8a9d4f39f20021804ed
                </tr>
            </thead>
            @if($movies)
                @foreach($movies as $movie)

                <tbody  >
                    <tr>
                        <td>{{$movie->id}}</td>
                        <td>{{$movie->title}}</td>
                        <td>{{$movie->original_title}}</td>
                        <td>{{$movie->time}} minut</td>
<<<<<<< HEAD
                        <td>{{$movie->describtion}}</td>
=======
                        <td >{{$movie->describtion}}</td>
                        
                        <td>{{$movie->price}}</td>
                        

>>>>>>> 72e37b883ed2ba06c615b8a9d4f39f20021804ed
                        <td><a href="{{action('MovieController@edit',['id'=>$movie->id])}}" class="btn btn-success"><i class="fa fa-edit"></i> Edytuj</a></td>
                        <td>

                            <form method="POST" action="{{ action('MovieController@destroy', ['id' => $movie->id]) }}" class="form-horizontal">
                                <input name="_method" type="hidden" value="delete">
                                {!! csrf_field() !!}
                                
                                    <button type="submit" class="btn btn-danger"><i class="fa fa-minus-square"></i> Usuń</button>
                                
                            </form>
                        </td>
                </tbody>	
                @endforeach
            @else
                <tr><td colspan="7">Brak danych</td></tr>
            @endif
        </table>
    
    </div><!-- /.box-body -->
</div><!-- /.box -->

@endsection
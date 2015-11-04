<?php

namespace App\Http\Controllers;
use Validator;
use DB;
use Illuminate\Http\Request;
use App\User;
use App\Movies;
use Auth;
use App\Http\Requests;
use App\Http\Requests\CreateMovie;
use App\Http\Controllers\Controller;
use App\Movies_price;
use App\Spectator_type;
use App\Movies_repertoire;
use File;


class MovieController extends Controller
{
        /**
     * Autoryzacja
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $film = DB::table('movies')
            ->join('repertoire','repertoire.movie_id','=','movies.id')
            ->join('reservations', 'reservations.repertoire_id','=','repertoire.id')
            ->where('movies.user_id',Auth::User()->id)
            ->get();
        $notification = DB::table('reservations')->get();
        $stetting = DB::table('users')
            ->where('id', Auth::user()->id)    
            ->get();

        $movies = DB::table('movies')    
            ->where('user_id', Auth::user()->id)
            ->get();

        return view('movies.index')
        ->with('film',$film)
        ->with('stettings',$stetting)
        ->with('movies',$movies)
        ->with('header_big','Filmy')
        ->with('catalog','users')
        ->with('folder','logos')
        ->with('notifications',$notification)
        ->with('filejpg',Auth::user()->id)
        ->with('filepng',Auth::user()->id);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $film = DB::table('movies')
            ->join('repertoire','repertoire.movie_id','=','movies.id')
            ->join('reservations', 'reservations.repertoire_id','=','repertoire.id')
            ->where('movies.user_id',Auth::User()->id)
            ->get();
        $notification = DB::table('reservations')->get();
        $stetting = DB::table('users')
            ->where('id', Auth::user()->id)    
            ->get();
        
        $spectators_types = Spectator_type::all()
            ->where('user_id', Auth::user()->id);
        $movie = new Movies();
        return view('movies.edit', ['movie' => $movie])
            ->with('film',$film)
            ->with('header_big','Filmy')
            ->with('header_small','Dodaj')
            ->with('catalog','users')
            ->with('notifications',$notification)
            ->with('folder','logos')
            ->with('filejpg',Auth::user()->id)
            ->with('filepng',Auth::user()->id)
            ->with('spectators_types', $spectators_types)
            ->with('stettings',$stetting)
            ->with('action', action('MovieController@store'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Requests\CreateMovie $request)
    {
        // Typy widzow
        $prices = array();
        $spectators_types = Spectator_type::all()
            ->where('user_id', Auth::user()->id);
        foreach($spectators_types as $st)
        {
            if($request->has('price_'.$st->id))
            {
                $prices[] = new Movies_price([
                    'price' => $request->{'price_'.$st->id},
                    'spectator_type_id' => $st->id
                ]);
            }
        }
        
        $movie = new Movies($request->all());
        $movie->title = $request->title;
        $movie->original_title = $request->original_title;
        $movie->time = $request->time;
        $movie->describtion = $request->describtion;        
        $movie->user_id = Auth::user()->id;
        $movie->save();
        $movie->prices()->saveMany($prices);
        
        if($request->file('image'))
        {
            $imageName = $movie->id . '.' . 
            $request->file('image')->getClientOriginalExtension();
            
            $request->file('image')->move(
                base_path() . '/public/'.Auth::user()->name.'/', $imageName
            );
        }
        else
        {
            return redirect('movies');
        }
        
       
        return redirect('movies');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $movies=Movies::findOrFail($id);
        return view('movies.show',['movies'=>$movies]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $film = DB::table('movies')
            ->join('repertoire','repertoire.movie_id','=','movies.id')
            ->join('reservations', 'reservations.repertoire_id','=','repertoire.id')
            ->where('movies.user_id',Auth::User()->id)
            ->get();
       $notification = DB::table('reservations')->get();
        $stetting = DB::table('users')
            ->where('id', Auth::user()->id)    
            ->get();
            
        $spectators_types = Spectator_type::all()
            ->where('user_id', Auth::user()->id);
        $movie = Movies::findOrFail($id);
        foreach($movie->prices as $repertoire)
        {
            $movie->{'price_'.$repertoire->spectator_type_id} = $repertoire->price;
        }
        return view('movies.edit', ['movie' => $movie])
                ->with('film',$film)
                ->with('header_big','Filmy')
                ->with('header_small','Edytuj')
                ->with('spectators_types', $spectators_types)
                ->with('catalog','users')
                ->with('folder','logos')
                ->with('notifications',$notification)
                ->with('filejpg',Auth::user()->id)
                ->with('filepng',Auth::user()->id)
                ->with('stettings',$stetting)
                ->with('action', action('MovieController@edit', ['id' => $id]));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Requests\CreateMovie $request, $id)
    {
        $movie = Movies::findOrFail($id);
        $movie->title = $request->title;
        $movie->original_title = $request->original_title;
        $movie->time = $request->time;
        $movie->describtion = $request->describtion;        
        $movie->user_id = Auth::user()->id;
        $movie->save();
        // Typy widzow
        $price = array();
        $spectators_types = Spectator_type::all()
            ->where('user_id', Auth::user()->id);
            $movie_prices = $movie->prices()->get();
            $not_delete_ids = array();
        foreach($spectators_types as $st)
        {
            $exist = false;
            foreach($movie_prices as $price)
            {
                if($st->id == $price->spectator_type_id)
                {
                    $exist = true;
                    $movie->prices()
                    ->where('spectator_type_id', $st->id)
                    ->update([
                        'price'=>$request->{'price_'.$st->id}
                        ]);
                    $not_delete_ids[] = $price->id;
                }
            }
            if(!$exist)
            {
                $new_movie = $movie->prices()->save(
                
                    new Movies_price([
                        'price' => $request->{'price_'.$st->id},
                        'spectator_type_id' => $st->id
                    ])
                );
                $not_delete_ids[] = $new_movie->id;
            }
        }

        Movies_price::where('movie_id', $id)
           ->whereNotIn('id', $not_delete_ids)->delete();

        // Repertuar
        $input = $request->all();
        $input_repertoire = array();
        foreach($input as $name => $val)
        {
            $name = explode('-', $name);
            if($name[0] == 'repertoire')
            {
                if(!isset($input_repertoire[$name[1]]))
               {
                    $input_repertoire[$name[1]] = array(
                        'monday' => false,
                        'tuesday' => false,
                        'wednesday' => false,
                        'thursday' => false,
                        'friday' => false,
                        'saturday' => false,
                        'sunday' => false
                    );
                }
                $input_repertoire[$name[1]][$name[2]] = $val;
            }
        }
        $movie_repertoire = $movie->repertoire()->get();
        $not_delete_ids = array();
        foreach($input_repertoire as $repertoire_id => $ir)
        {
            $exist = false;
            foreach($movie_repertoire as $repertoire)
            {
                if($repertoire_id == $repertoire->id)
                {
                    $exist = true;
                    $movie->repertoire()
                        ->where('id', $repertoire_id)
                        ->update($ir);
                    $not_delete_ids[] = $repertoire_id;
                }
            }
            if(!$exist)
            {
                $new_repertoire = $movie->repertoire()->save(
                    new Movies_repertoire($ir)
                );
                $not_delete_ids[] = $new_repertoire->id;
            }
        }
        Movies_repertoire::where('movie_id', $id)
           ->whereNotIn('id', $not_delete_ids)->delete();
        
        // Miniaturka
        if($request->file('image'))
        {   
            $imageName = $movie->id . '.' . 
                $request->file('image')->getClientOriginalExtension();
                $request->file('image')->move(
                base_path() . '/public/'.Auth::user()->name.'/', $imageName
            );
        }
        else
        {
            return redirect('movies');
        }
        return redirect('movies');

    

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $movie = Movies::findOrFail($id);
        $movie->delete();
        return redirect('movies');
    }
}

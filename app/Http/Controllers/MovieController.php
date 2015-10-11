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
        $movies = DB::table('movies')    
            ->where('user_id', Auth::user()->id)
            ->get();

        return view('movies.index')->with('movies',$movies)->with('header_big','Filmy');
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $spectators_types = Spectator_type::all()
            ->where('user_id', Auth::user()->id);
        $movie = new Movies();
        return view('movies.edit', ['movie' => $movie])
            ->with('header_big','Filmy')
            ->with('header_small','Dodaj')
            ->with('spectators_types', $spectators_types)
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
        
        if($request->has('image'))
        {
            $imageName = $movie->title . '.' . 
            $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(
                base_path() . '/public/images/', $imageName
            );
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
        $spectators_types = Spectator_type::all()
            ->where('user_id', Auth::user()->id);
        $movie = Movies::findOrFail($id);
        foreach($movie->prices as $price)
        {
            $movie->{'price_'.$price->spectator_type_id} = $price->price;
        }
        return view('movies.edit', ['movie' => $movie])
                ->with('header_big','Filmy')
                ->with('header_small','Edytuj')
                ->with('spectators_types', $spectators_types)
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
                            'price' => $request->{'price_'.$st->id}
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

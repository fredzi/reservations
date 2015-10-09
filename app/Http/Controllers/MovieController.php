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
        $spectator_type = Spectator_type::all()->where('user_id',Auth::user()->id);
        return view('movies.create')->with('header_big','Filmy')->with('header_small','Dodaj')->with('spectator_type',$spectator_type);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Requests\CreateMovie $request)
    {
       
        $movies = new Movies($request->all());
        
        $movies->title = $request->title;
        $movies->original_title = $request->original_title;
        $movies->time = $request->time;
        $movies->describtion = $request->describtion;        
        $movies->user_id = Auth::user()->id;
        $movies->save();
        /*
        $spectator = new Spectator_type($request->all());
        $spectator->id = $requ                                                                                                                      est->id;
        $spectator->price = $request->price;
        
        $movies_prices = new Movies_price();
        $movies_prices['movie_id'] = $movies->id; 
        $movies_prices['spectator_type_id'] = $spectator->id;
        $movies_prices['price'] = $spectator->price;
        $movies_prices->save();
        */
        $imageName = $movies->title . '.' . 
        $request->file('image')->getClientOriginalExtension();
        $request->file('image')->move(
            base_path() . '/public/images/', $imageName
        );
       


                
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
        $movies=Movies::findOrFail($id);
        return view('movies.edit',['movies'=>$movies])->with('header_big','Filmy')->with('header_small','Edytuj');

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
        $movies = Movies::findOrFail($id);
        $movies->title = $request->title;
        $movies->original_title = $request->original_title;
        $movies->time = $request->time;
        $movies->describtion = $request->describtion;        
        $movies->user_id = Auth::user()->id;
        $movies->save();


        
        
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

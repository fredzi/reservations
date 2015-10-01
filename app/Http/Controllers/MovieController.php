<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\User;
use App\Movies;
use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;

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
        if(Auth::user()->id)
        {
        $movies = DB::table('movies')->where('user_id', Auth::user()->id)->get();
        
        return view('movies.index')->with('movies',$movies);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('movies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        if(Auth::check())
        {
        $movies = new Movies();
        $movies->title = $request->title;
        $movies->original_title = $request->original_title;
        $movies->time = $request->time;
        $movies->describtion = $request->describtion;
        $movies->price = $request->price;
        $movies->user_id = Auth::user()->id;
        }
        $movies->save();
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
        return view('movies.edit',['movies'=>$movies]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $movies = Movies::findOrFail($id);
        $movies->title = $request->title;
        $movies->original_title = $request->original_title;
        $movies->time = $request->time;
        $movies->describtion = $request->describtion;
        $movies->price = $request->price;
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
        $movies = Movies::findOrFail($id);
        $movies=delete();
        return redirect('movies');
    }
}

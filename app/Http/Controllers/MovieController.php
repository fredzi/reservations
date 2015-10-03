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
        
        $movies = DB::table('movies')->where('user_id', Auth::user()->id)->get();
        
        return view('movies.index')->with('movies',$movies);
        
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
       
        $movies = new Movies($request->all());
        $movies->title = $request->title;
        $movies->original_title = $request->original_title;
        $movies->time = $request->time;
        $movies->describtion = $request->describtion;
        $movies->price = $request->price;
        $movies->user_id = Auth::user()->id;

        $validator = Validator::make($request->all(),[
            $request->title = 'title' => 'required',
            $request->original_title = 'original_title' => 'required',
            $request->time = 'time' => 'required|integer',
            $request->describtion = 'describtion' => 'required|max:1000',
            $request->price = 'price' => 'required|integer']);

        if ($validator->fails()) {
            return redirect('movies/create')
                        ->withErrors($validator)
                        ->withInput();
        }
        else{
            $movies->save();
        return redirect('movies');
        }



        
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
        $movies->delete();
        return redirect('movies');
    }
}

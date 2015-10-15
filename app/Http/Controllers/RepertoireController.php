<?php

namespace App\Http\Controllers;
use Validator;
use Illuminate\Http\Request;
use App\Repertoire;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;

class RepertoireController extends Controller
{
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
        $repertoires = Repertoire::all();

        return view('reportoires.index')
            ->with('repertoires',$repertoires)
            ->with('header_big','Repertuar')
            ->with('katalog','users')
        ->with('folder','logos')
        ->with('plikjpg',Auth::user()->id)
        ->with('plikpng',Auth::user()->id);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        
        $repertoire = new Repertoire();
        return view('reportoires.edit',['repertoire'=>$repertoire])
            ->with('header_big','Repertuar')
            ->with('header_small','Dodaj')
            ->with('katalog','users')
            ->with('folder','logos')
            ->with('plikjpg',Auth::user()->id)
            ->with('plikpng',Auth::user()->id)
            ->with('action',action('RepertoireController@store'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Requests\CreateRepertoire $request)
    {
        $repertoires = new Repertoire($request->all());
        $repertoires->hall_id = $request->hall_id;
        $repertoires->movie_id = $request->movie_id;
        $repertoires->time = $request->time;
        $repertoires->save();
        return redirect('repertoire');



        


        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $repertoires=Repertoire::findOrFail($id);
        return view('reportoires.show',['repertoires'=>$repertoires]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $repertoire=Repertoire::findOrFail($id);
        return view('reportoires.edit',['repertoire'=>$repertoire])
        ->with('header_big','Repertuar')
        ->with('header_small','Edytuj')
        ->with('katalog','users')
        ->with('folder','logos')
        ->with('plikjpg',Auth::user()->id)
        ->with('plikpng',Auth::user()->id)
        ->with('action',action('RepertoireController@edit',['id'=>$id]));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Requests\CreateRepertoire $request, $id)
    {
        $repertoires = Repertoire::findOrFail($id);
        $repertoires->hall_id = $request->hall_id;
        $repertoires->movie_id = $request->movie_id;
        $repertoires->time = $request->time;
        $repertoires->save();
        return redirect('repertoire');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $repertoire = Repertoire::findOrFail($id);
        $repertoire->delete();
        return redirect('repertoire');
    }
}

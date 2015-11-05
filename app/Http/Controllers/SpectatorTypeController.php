<?php

namespace App\Http\Controllers;
use Validator;
use Auth;
use DB;
use Illuminate\Http\Request;
use App\Spectator_type;
use App\Http\Requests;
use App\Http\Requests\CreateSpectatorType;
use App\Http\Controllers\Controller;
use App\Movies_price;

class SpectatorTypeController extends Controller
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
        
        $films = DB::table('movies')
            ->join('repertoire','repertoire.movie_id','=','movies.id')
            ->join('reservations', 'reservations.repertoire_id','=','repertoire.id')
            ->where('movies.user_id',Auth::User()->id)
            ->get();
        $notification = DB::table('reservations')->get();
        $settings = DB::table('users')
            ->where('id', Auth::user()->id)    
            ->get();
        
        
            
        $spectators = DB::table('spectators_types')
            ->where('user_id', Auth::user()->id)
            ->get();

        return view('spectators.index')
            ->with('films',$films)
            ->with('catalog','users')
            ->with('folder','logos')           
            ->with('settings',$settings)
            ->with('notifications',$notification)
            ->with('filejpg',Auth::user()->id)
            ->with('filepng',Auth::user()->id)
            ->with('spectators',$spectators)
            ->with('header_big','Typ klienta');
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $films = DB::table('movies')
            ->join('repertoire','repertoire.movie_id','=','movies.id')
            ->join('reservations', 'reservations.repertoire_id','=','repertoire.id')
            ->where('movies.user_id',Auth::User()->id)
            ->get();
        $notification = DB::table('reservations')->get();
        $settings = DB::table('users')
            ->where('id', Auth::user()->id)    
            ->get();
            

        $spectator = new Spectator_type();
        return view('spectators.edit',['spectator'=>$spectator])
            ->with('header_big','Typ klienta')
            ->with('header_small','Dodaj')
            ->with('catalog','users')
            ->with('folder','logos')
            ->with('films',$films)
            ->with('notifications',$notification)
            ->with('settings',$settings)
            ->with('filejpg',Auth::user()->id)
            ->with('filepng',Auth::user()->id)
            ->with('action', action('SpectatorTypeController@store'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Requests\CreateSpectatorType $request)
    {
        
        $spectators = new Spectator_type($request->all());
        $spectators->name = $request->name;
        $spectators->price = $request->price;
        $spectators->user_id = Auth::user()->id;
        
        $spectators->save();
        
        return redirect('spectators');
        


        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $settings = DB::table('users')
            ->where('id', Auth::user()->id)    
            ->get();
            
        $spectators=Spectator_type::findOrFail($id);
        return view('spectators.show',['spectators'=>$spectators])
            ->with('settings',$settings);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $films = DB::table('movies')
            ->join('repertoire','repertoire.movie_id','=','movies.id')
            ->join('reservations', 'reservations.repertoire_id','=','repertoire.id')
            ->where('movies.user_id',Auth::User()->id)
            ->get();
        $notification = DB::table('reservations')->get();
        $settings = DB::table('users')
            ->where('id', Auth::user()->id)    
            ->get();

        $spectator=Spectator_type::findOrFail($id);
        return view('spectators.edit',['spectator'=>$spectator])
            ->with('films',$films)
            ->with('header_big','Typ klienta')
            ->with('header_small','Edytuj')
            ->with('catalog','users')
            ->with('folder','logos')            
            ->with('notifications',$notification)
            ->with('settings',$settings)
            ->with('filejpg',Auth::user()->id)
            ->with('filepng',Auth::user()->id)
            ->with('action',action('SpectatorTypeController@edit',['id'=>$id]));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Requests\CreateSpectatorType $request, $id)
    {
        $spectators = Spectator_type::findOrFail($id);
        $spectators->name = $request->name;
        $spectators->price = $request->price;
        $spectators->save();
        return redirect('spectators');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $spectator = Spectator_type::findOrFail($id);
        $spectator->delete();
        return redirect('spectators');
    }
}

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
        
        $spectators = DB::table('spectators_types')->where('user_id', Auth::user()->id)->get();
        return view('spectators.index')->with('spectators',$spectators)->with('header_big','Typ klienta');
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('spectators.create')->with('header_big','Typ klienta')->with('header_small','Dodaj');
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
        $spectators=Spectator_type::findOrFail($id);
        return view('spectators.show',['spectators'=>$spectators]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $spectators=Spectator_type::findOrFail($id);
        return view('spectators.edit',['spectators'=>$spectators])->with('header_big','Typ klienta')->with('header_small','Edytuj');
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
        $spectators = Spectator_type::findOrFail($id);
        $spectators->delete();
        return redirect('spectators');
    }
}

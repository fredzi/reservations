<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Auth;

class RepertoireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
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

        return view('repertoires.index')
            ->with('films',$films)
            ->with('settings',$settings)
            ->with('header_big','Repertuar')
            ->with('catalog','users')
            ->with('folder','logos')
            ->with('notifications',$notification)
            ->with('filejpg',Auth::user()->id)
            ->with('filepng',Auth::user()->id);





    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

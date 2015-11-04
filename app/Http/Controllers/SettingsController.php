<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Auth;
use App\Http\Requests\CreateUser;
use App\Http\Requests\CreateImage;

class SettingsController extends Controller
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
        $film = DB::table('movies')
            ->join('repertoire','repertoire.movie_id','=','movies.id')
            ->join('reservations', 'reservations.repertoire_id','=','repertoire.id')
            ->where('movies.user_id',Auth::User()->id)
            ->get();
        
         $notification = DB::table('reservations')->get();
        
        $stetting = DB::table('users')
            ->where('id', Auth::user()->id)    
            ->get();

        

        return view('settings.index')->with('stettings',$stetting)->with('header_big','Ustawienia')
        ->with('catalog','users')
        ->with('folder','logos')
        ->with('notifications',$notification)
        ->with('filejpg',Auth::user()->id)
        ->with('film',$film)
        ->with('filepng',Auth::user()->id);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
         $notification = DB::table('reservations')->get();
         $film = DB::table('movies')
            ->join('repertoire','repertoire.movie_id','=','movies.id')
            ->join('reservations', 'reservations.repertoire_id','=','repertoire.id')
            ->where('movies.user_id',Auth::User()->id)
            ->get();
        
        $stetting = DB::table('users')
            ->where('id', Auth::user()->id)    
            ->get();
        return view('settings.create', ['stettings' =>$stetting])
            ->with('film',$film)
            ->with('header_big','Ustawienia')
            ->with('header_small','Dodaj logo')
            ->with('catalog','users')
            ->with('folder','logos')
            ->with('notifications',$notification)
            ->with('filejpg',Auth::user()->id)
            ->with('filepng',Auth::user()->id)
            ->with('action', action('SettingsController@store'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Requests\CreateImage $request)
    {
        $imageName = Auth::user()->id . '.' . 
            $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(
                base_path() . '/public/users/logos/', $imageName
            );
            
            return redirect('settings');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
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
        $stettings = DB::table('users')->where('id',Auth::user()->id)->get();
        $stetting=User::findOrFail($id);
        return view('settings.edit')
            ->with('film',$film)
            ->with('stettingss',$stetting)
            ->with('header_big','Ustawienia')
            ->with('header_small','Edytuj')
            ->with('catalog','users')
            ->with('stettings',$stettings)
            ->with('notifications',$notification)
            ->with('folder','logos')
            ->with('filejpg',Auth::user()->id)
            ->with('filepng',Auth::user()->id)
            ->with('action',action('SettingsController@edit',['id'=>$id]));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Requests\CreateUser $request, $id)
    {
        $stetting = User::findOrFail($id);
        $stetting->name = $request->name;
        $stetting->email = $request->email;
        $stetting->city = $request->city;
        $stetting->street = $request->street;
        $stetting->postcode = $request->postcode;
        $stetting->www = $request->www;
        $stetting->save();
        return redirect('settings');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}

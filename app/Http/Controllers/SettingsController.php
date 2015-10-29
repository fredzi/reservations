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
        $pokazz = DB::table('reservations')->count();
        
         $pokaz = DB::table('reservations')->get();
        
        $stetting = DB::table('users')
            ->where('id', Auth::user()->id)    
            ->get();

        $stetting2 = DB::table('users')
            ->where('id', Auth::user()->id)    
            ->get();
        return view('ustawienia.index')->with('stetting',$stetting)->with('header_big','Ustawienia')
        ->with('katalog','users')
        ->with('folder','logos')
        ->with('pokaz',$pokaz)

        ->with('pokazz',$pokazz)
        ->with('stetting2',$stetting2)
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
         $pokaz = DB::table('reservations')->get();
        $stetting2 = DB::table('users')
            ->where('id', Auth::user()->id)    
            ->get();
        $pokazz = DB::table('reservations')->count();
        
        $stetting = new User();
        return view('ustawienia.create', ['stetting' =>$stetting])
            ->with('header_big','Ustawienia')
            ->with('header_small','Dodaj logo')
            ->with('katalog','users')
            ->with('folder','logos')
            ->with('pokazz',$pokazz)
            ->with('stetting2',$stetting2)
            ->with('pokaz',$pokaz)
            ->with('plikjpg',Auth::user()->id)
            ->with('plikpng',Auth::user()->id)
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
        $pokazz = DB::table('reservations')->count();
        $pokaz = DB::table('reservations')->get();
        $stetting2 = DB::table('users')
            ->where('id', Auth::user()->id)    
            ->get();
        $stetting=User::findOrFail($id);
        return view('ustawienia.edit',['stetting'=>$stetting])
            ->with('header_big','Ustawienia')
            ->with('header_small','Edytuj')
            ->with('katalog','users')
            ->with('stetting2',$stetting2)
            ->with('pokaz',$pokaz)
            ->with('pokazz',$pokazz)
            ->with('folder','logos')
            ->with('plikjpg',Auth::user()->id)
            ->with('plikpng',Auth::user()->id)
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

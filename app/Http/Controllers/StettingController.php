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

class StettingController extends Controller
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
        $stetting = DB::table('users')
            ->where('id', Auth::user()->id)    
            ->get();

        return view('ustawienia.index')->with('stetting',$stetting)->with('header_big','Ustawienia')
        ->with('katalog',Auth::user()->name)
        ->with('folder','logo')
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
        $stetting = new User();
        return view('ustawienia.create', ['stetting' =>$stetting])
            ->with('header_big','Ustawienia')
            ->with('header_small','Dodaj logo')
            ->with('action', action('StettingController@store'));
        
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
                base_path() . '/public/'.Auth::user()->name.'/logo/', $imageName
            );
            
            return redirect('stetting');
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
        $stetting=User::findOrFail($id);
        return view('ustawienia.edit',['stetting'=>$stetting])
            ->with('header_big','Ustawienia')
            ->with('header_small','Edytuj')
            ->with('action',action('StettingController@edit',['id'=>$id]));
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
        return redirect('stetting');
        
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

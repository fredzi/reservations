<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cinema;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CinemasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $cinemas = Cinema::all();

        return view('cinemas.index')->with('cinemas',$cinemas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('cinemas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
         $cinemas = new Cinema();
        $cinemas->name = $request->name;
        $cinemas->city = $request->city;
        $cinemas->street = $request->street;
        $cinemas->postcode = $request->postcode;
        $cinemas->www = $request->www;
        $cinemas->user_id = $request->user_id;
        $cinemas->save();
        return redirect('cinemas');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $cinemas=Cinema::findOrFail($id);
        return view('cinemas.show',['cinemas'=>$cinemas]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $cinemas=Cinema::findOrFail($id);
        return view('cinemas.edit',['cinemas'=>$cinemas]);
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
        $cinemas = Cinema::findOrFail($id);
        $cinemas->name = $request->name;
        $cinemas->city = $request->city;
        $cinemas->street = $request->street;
        $cinemas->postcode = $request->postcode;
        $cinemas->www = $request->www;
        $cinemas->user_id = $request->user_id;
        $cinemas->save();
        return redirect('cinemas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $cinemas = Cinema::findOrFail($id);
        $cinemas=delete();
        return redirect('cinemas');
    }
}

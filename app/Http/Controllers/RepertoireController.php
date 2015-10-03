<?php

namespace App\Http\Controllers;
use Validator;
use Illuminate\Http\Request;
use App\Repertoire;
use App\Http\Requests;
use App\Http\Controllers\Controller;

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

        return view('reportoires.index')->with('repertoires',$repertoires);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('reportoires.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $repertoires = new Repertoire($request->all());
        $repertoires->hall_id = $request->hall_id;
        $repertoires->movie_id = $request->movie_id;
        $repertoires->time = $request->time;

        $validator = Validator::make($request->all(),[
            $request->name = 'name' => 'required',
            $request->time = 'time' => 'required'
           ]);

        if ($validator->fails()) {
            return redirect('repertoire/create')
                        ->withErrors($validator)
                        ->withInput();
        }
        else{
            $repertoires->save();
            return redirect('repertoire');
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
        $repertoires=Repertoire::findOrFail($id);
        return view('reportoires.edit',['repertoires'=>$repertoires]);
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
        $repertoires = Repertoire::findOrFail($id);
        $repertoires->delete();
        return redirect('repertoire');
    }
}

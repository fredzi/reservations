<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Hall;
use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class HallController extends Controller
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
        $halls = DB::table('halls')    
            ->where('user_id', Auth::user()->id)
            ->get();
        return view('halls.index')
            ->with('halls', $halls)
            ->with('katalog','users')
            ->with('folder','logos')
            ->with('plikjpg',Auth::user()->id)
            ->with('plikpng',Auth::user()->id)
            ->with('header_big','Sale');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $hall = new Hall();
        return view('halls.edit',['hall' => $hall])
            ->with('header_big','Sale')
            ->with('header_small','Dodaj')
            ->with('katalog','users')
            ->with('folder','logos')
            ->with('plikjpg',Auth::user()->id)
            ->with('plikpng',Auth::user()->id)
            ->with('action', action('HallController@storeFirstStep'));
    }
    /* 1 KROK */
    public function storeFirstStep(Requests\CreateHall $request)
    {
        \Session::put('x', $request->input('x'));
        \Session::put('y', $request->input('y'));
        \Session::put('name', $request->input('name'));
        return redirect('hall/block_seats');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */

    /* 2 KROK */
    public function storeSecondStep(Requests\CreateHall $request)
    {
        DB::transaction(function($request) use ($request) {
            $name = \Session::get('name');
            $num_in_row = \Session::get('x');
            $rows = \Session::get('y');
            $hall_id = DB::table('halls')->insertGetId([
                'name' => $name,
                'user_id' => Auth::user()->id,
                'position' => 1
            ]);
            $seats_in_hall = [];
            for($y = 0; $y < $rows; $y++)
            {
                for($x = 0; $x < $num_in_row; $x++)
                {
                    if(!$request->has($x.'-'.$y))
                    {
                        $seats_in_hall[] = [
                            'pos_x' => $x, 
                            'pos_y' => $y, 
                            'hall_id' => $hall_id
                        ];
                    }
                }
            }
            DB::table('seats_in_halls')->insert($seats_in_hall);
        });
        return redirect('hall');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $hall = Hall::findOrFail($id);
        exit();
        return view('halls.show')->with('hall', $hall);
    }

    /**
     * Show the form for editing the specified resource.
     *  
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $hall = Hall::findOrFail($id);
        return view('halls.edit',['hall' => $hall])
            ->with('header_big','Sale')
            ->with('header_small','Edytuj')
            ->with('katalog','users')
            ->with('folder','logos')
            ->with('plikjpg',Auth::user()->id)
            ->with('plikpng',Auth::user()->id)           
            ->with('action', action('HallController@edit', ['id' => $id]));
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
        $hall = Hall::findOrFail($id);
        $hall->name = $request->name;
        $hall->save();
       
        return redirect('hall');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $hall = Hall::findOrFail($id);
        $hall->delete();
        return redirect('halls');
    }
    
    public function blockSeats(Request $request)
    {
        return view('halls.block_seats')
            ->with('header_big','Sale')
            ->with('header_small','Określ dostępne miejsa')
            ->with('katalog','users')
            ->with('folder','logos')
            ->with('plikjpg',Auth::user()->id)
            ->with('plikpng',Auth::user()->id)
            ->with('action', action('HallController@storeSecondStep'));
    }
}

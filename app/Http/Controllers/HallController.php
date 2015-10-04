<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Hall;
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
        $halls = Hall::all();
        
        return view('halls.index')->with('halls', $halls)->with('header_big','Sale');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('halls.create')->with('header_big','Sale')->with('header_small','Dodaj');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Requests\CreateHall $request)
    {
        $name = $request->input('name');
        if(isset($name))
        {
            \Session::put('x', $request->input('x'));
            \Session::put('y', $request->input('y'));
            \Session::put('name', $request->input('name'));
            return redirect('hall/block_seats');
        }
        else
        {
            DB::transaction(function($request) use ($request) {
                $name = \Session::get('name');
                $num_in_row = \Session::get('x');
                $rows = \Session::get('y');
                $hall_id = DB::table('halls')->insertGetId([
                    'name' => $name,
                    
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
        //
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
    
    public function blockSeats(Request $request)
    {
        return view('halls.block_seats')->with('header_big','Sale')->with('header_small','Wybierz miejsca');
    }
}

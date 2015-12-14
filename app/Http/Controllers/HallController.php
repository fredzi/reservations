<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BlockSeats;
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
        $films = DB::table('movies')
            ->join('repertoire','repertoire.movie_id','=','movies.id')
            ->join('reservations', 'reservations.repertoire_id','=','repertoire.id')
            ->where('movies.user_id',Auth::User()->id)
            ->get();
        $notification = DB::table('reservations')->get();
        $settings = DB::table('users')
            ->where('id', Auth::user()->id)    
            ->get();  
        $halls = DB::table('halls')    
            ->where('user_id', Auth::user()->id)
            ->get();
        return view('halls.index')
            ->with('films',$films)
            ->with('halls', $halls)
            ->with('catalog','users')
            ->with('folder','logos')
            ->with('notifications',$notification)
            ->with('settings',$settings)
            ->with('filejpg',Auth::user()->id)
            ->with('filepng',Auth::user()->id)
            ->with('header_big','Sale');
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
        $hall = new Hall();
        return view('halls.edit',['hall' => $hall])
            ->with('films',$films)
            ->with('header_big','Sale')
            ->with('header_small','Dodaj')
            ->with('catalog','users')
            ->with('folder','logos')
            ->with('notifications',$notification)
            ->with('settings',$settings)
            ->with('filejpg',Auth::user()->id)
            ->with('filepng',Auth::user()->id)
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
                            'hall_id' => $hall_id,
                            'name' => $name
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
        $films = DB::table('movies')
            ->join('repertoire','repertoire.movie_id','=','movies.id')
            ->join('reservations', 'reservations.repertoire_id','=','repertoire.id')
            ->where('movies.user_id',Auth::User()->id)
            ->get();
        
        $hall = Hall::findOrFail($id);
            
        $notification = DB::table('reservations')->get();
        $settings = DB::table('users')
            ->where('id', Auth::user()->id)    
            ->get();
        
        $posx = DB::table('seats_in_halls')->where('hall_id',$id)->max('pos_x');
        $posy = DB::table('seats_in_halls')->where('hall_id',$id)->max('pos_y');     
        
        return view('halls.show')
            ->with('films',$films)
            ->with('header_big','Sale')
            ->with('header_small','Miejsca')
            ->with('catalog','users')
            ->with('folder','logos')
            ->with('downid',$id)
            ->with('hall',$hall)
            ->with('posx',$posx)
            ->with('posy',$posy)
            ->with('notifications',$notification)
            ->with('settings',$settings)
            ->with('filejpg',Auth::user()->id)
            ->with('filepng',Auth::user()->id)
            ->with('action', action('HallController@show'), ['id' => $id]);
    }

    /**
     * Show the form for editing the specified resource.
     *  
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $encrypter = app('Illuminate\Encryption\Encrypter');
        $encrypted_token = $encrypter->encrypt(csrf_token());

    
        $films = DB::table('movies')
            ->join('repertoire','repertoire.movie_id','=','movies.id')
            ->join('reservations', 'reservations.repertoire_id','=','repertoire.id')
            ->where('movies.user_id',Auth::User()->id)
            ->get();
        $notification = DB::table('reservations')->get();
        $settings = DB::table('users')
            ->where('id', Auth::user()->id)    
            ->get();
        
        $posx = DB::table('seats_in_halls')->where('hall_id',$id)->max('pos_x');
        $posy = DB::table('seats_in_halls')->where('hall_id',$id)->max('pos_y');     
        $seats = DB::table('seats_in_halls')
            ->select('pos_y','pos_x','name')
            ->where('hall_id',$id)
            ->get();
        $seats_array = array();
        foreach($seats as $seat)
        {
            $seats_array[$seat->pos_x][$seat->pos_y] = $seat->name;
        }
        $hall = Hall::findOrFail($id);
        return view('halls.edit',['hall' => $hall])
            ->with('films',$films)
            ->with('header_big','Sale')
            ->with('header_small','Miejsca')
            ->with('catalog','users')
            ->with('folder','logos')
            ->with('downid',$id)
            ->with('posx',$posx)
            ->with('posy',$posy)
            ->with('seats',$seats_array)
            ->with('downid',$id)
            ->with('notifications',$notification)
            ->with('settings',$settings)
            ->with('filejpg',Auth::user()->id)
            ->with('filepng',Auth::user()->id)           
            
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

        $blockseats = BlockSeats::where('hall_id',$id)->get();
       
        foreach($blockseats as $blockseat)
        {      
            $blockseat->name =$request->name;
            $blockseat->save();          
        }
       if($request->ajax())
        {
            $json = $hall->name;
            return $json;

        }
        return redirect()->back();
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
        return redirect('hall');
    }
    
    public function blockSeats(Request $request)
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
            
        return view('halls.block_seats')
            ->with('films',$films)
            ->with('header_big','Sale')
            ->with('header_small','Określ dostępne miejsa')
            ->with('catalog','users')
            ->with('folder','logos')
            ->with('notifications',$notification)
            ->with('settings',$settings)
            ->with('filejpg',Auth::user()->id)
            ->with('filepng',Auth::user()->id)
            ->with('action', action('HallController@storeSecondStep'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reservation;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateReservation;
use App\Spectator_type;
use Auth;
use DB;
use Input;
class ReservationsController extends Controller
{   

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $notification = DB::table('reservations')->get();
        $settings = DB::table('users')
            ->where('id', Auth::user()->id)    
            ->get();
            $films = DB::table('movies')
            ->join('repertoire','repertoire.movie_id','=','movies.id')
            ->join('reservations', 'reservations.repertoire_id','=','repertoire.id')
            ->where('movies.user_id',Auth::User()->id)
            ->get();
            
        $reservations = Reservation::all();
        return view('reservations.index')
            ->with('films',$films)
            ->with('reservations',$reservations)
            ->with('header_big','Rezerwacje')
            ->with('catalog','users')
            ->with('notifications',$notification)
            ->with('settings',$settings)
            ->with('folder','logos')
            ->with('filejpg',Auth::user()->id)
            ->with('filepng',Auth::user()->id);
           


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $settings = DB::table('users')
            ->where('id', Auth::user()->id)    
            ->get();
            $notification = DB::table('reservations')->get();
           $films = DB::table('movies')
            ->join('repertoire','repertoire.movie_id','=','movies.id')
            ->join('reservations', 'reservations.repertoire_id','=','repertoire.id')
            ->where('movies.user_id',Auth::User()->id)
            ->get(); 
        
        $reservation = new Reservation();
        return view('reservations.edit',['reservation' => $reservation])
            ->with('films',$films)
            ->with('header_big','Rezerwacje')
            ->with('header_small','Dodaj')
            ->with('catalog','users')
            ->with('notifications',$notification)
            ->with('settings',$settings)
            ->with('folder','logos')
            ->with('filejpg',Auth::user()->id)
            ->with('filepng',Auth::user()->id)
            ->with('action', action('ReservationsController@store'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Requests\CreateReservation $request)
    {
        $reservations = new Reservation();
        $reservations->repertoire_id = $request->repertoire_id;
        $reservations->summary = $request->summary;
        $reservations->date_start = $request->date_start;
        $reservations->date_end = $request->date_end;
        $reservations->customer_first_name = $request->customer_first_name;
        $reservations->customer_last_name = $request->customer_last_name;
        $reservations->customer_email = $request->customer_email;
        $reservations->customer_phone = $request->customer_phone;
        $reservations->status = $request->status;
        $reservations->save();
        return redirect('reservations');
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

        $notification = DB::table('reservations')->get();
        $settings = DB::table('users')
            ->where('id', Auth::user()->id)    
            ->get();
        $reservation = Reservation::findOrFail($id);
        return view('reservations.show')
        ->with('films',$films)
        ->with('reservations',$reservation)
        ->with('notifications',$notification)
        ->with('catalog','users')
        ->with('folder','logos')
        ->with('filejpg',Auth::user()->id)
        ->with('filepng',Auth::user()->id)
        ->with('settings',$settings)
        ->with('header_big','Informacje')
        ->with('header_small',$reservation->customer_last_name.' '.$reservation->customer_first_name);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $notification = DB::table('reservations')->get();
        $films = DB::table('movies')
            ->join('repertoire','repertoire.movie_id','=','movies.id')
            ->join('reservations', 'reservations.repertoire_id','=','repertoire.id')
            ->where('movies.user_id',Auth::User()->id)
            ->get();
        $settings = DB::table('users')
            ->where('id', Auth::user()->id)    
            ->get();
        $reservations = DB::table('reservations')->get();
        $reservation = Reservation::findOrFail($id);
        return view('reservations.edit',['reservation'=>$reservation])
            ->with('films',$films)
            ->with('header_big','Rezerwacje')
            ->with('header_small','Edytuj')
            ->with('catalog','users')
            ->with('reservations',$reservations)
            ->with('settings',$settings)
            ->with('notifications',$notification)
            ->with('folder','logos')
            ->with('filejpg',Auth::user()->id)
            ->with('filepng',Auth::user()->id)
            ->with('action', action('ReservationsController@edit', ['id' => $id]));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Requests\CreateReservation $request, $id)
    {
        $reservations = Reservation::findOrFail($id);
        $reservations->status = $request->status;
        $reservations->save();
        return redirect('reservations');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $reservations = Reservation::findOrFail($id);
        $reservations->delete();
        return redirect('reservations');
    }
    public function pdf($id)
    {
        $data = Reservation::all();
        $pdf = PDF::loadView('reservations.index', $data);
        return $pdf->download('invoice.pdf');
    }
}

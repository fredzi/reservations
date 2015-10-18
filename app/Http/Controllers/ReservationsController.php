<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reservation;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateReservation;
use App\Spectator_type;
use Auth;
class ReservationsController extends Controller
{   

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $reservations = Reservation::all();
        return view('reservations.index')
            ->with('reservations',$reservations)
            ->with('header_big','Rezerwacje')
            ->with('katalog','users')
        ->with('folder','logos')
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
        $reservation = new Reservation();
        return view('reservations.edit',['reservation' => $reservation])
            ->with('header_big','Rezerwacje')
            ->with('header_small','Dodaj')
            ->with('katalog','users')
        ->with('folder','logos')
        ->with('plikjpg',Auth::user()->id)
        ->with('plikpng',Auth::user()->id)
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
        //$spectators = Spectator_type::all()
            //->where('user_id', Auth::user()->id);
        $reservations = Reservation::findOrFail($id);
        return view('reservations.show',['reservations'=>$reservations])
        ->with('katalog','users')
        ->with('folder','logos')
        ->with('plikjpg',Auth::user()->id)
        ->with('plikpng',Auth::user()->id)
           // ->with('spectators',$spectators)
            ->with('header_big','Informacje')
            ->with('header_small',$reservations->customer_last_name.' '.$reservations->customer_first_name);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $reservation = Reservation::findOrFail($id);
        return view('reservations.edit',['reservation'=>$reservation])
            ->with('header_big','Rezerwacje')
            ->with('header_small','Edytuj')
            ->with('katalog','users')
        ->with('folder','logos')
        ->with('plikjpg',Auth::user()->id)
        ->with('plikpng',Auth::user()->id)
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

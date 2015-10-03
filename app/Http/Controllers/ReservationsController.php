<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reservation;
use App\Http\Requests;
use App\Http\Controllers\Controller;

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
        return view('reservations.index')->with('reservations',$reservations);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('reservations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
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
        $reservations = Reservation::findOrFail($id);
        return view('reservations.show',['reservations'=>$reservations]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $reservations = Reservation::findOrFail($id);
        return view('reservations.edit',['reservations'=>$reservations]);
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
        $reservations = Reservation::findOrFail($id);
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
}

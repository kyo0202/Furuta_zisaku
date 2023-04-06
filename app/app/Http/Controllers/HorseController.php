<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Race_detail;
use App\Betting_ticket_registration;

class HorseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $idevtifications =[];
        $idevtifications = ['単勝', '複勝', '馬連', '馬単', 'ワイド', '三連複', '三連複',];
        for ($a = 1; $a < 19; $a++) {
            $b[] = $a;
        };

        $race_details = Race_detail::select('place','race_name')->get();
        return view('horse.create', [
            'race_details' => $race_details,
            'b' => $b, 
            'idevtifications' => $idevtifications,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $betting_ticket_registrations =new Betting_ticket_registration;
        $betting_ticket_registrations->date = $request->date;
        $betting_ticket_registrations->place = $request->place;
        $betting_ticket_registrations->race_name = $request->race_name;
        $betting_ticket_registrations->idevtification = $request->idevtification;
        $betting_ticket_registrations->first_num = $request->first_num ;
        $betting_ticket_registrations->second_num = $request->second_num;
        $betting_ticket_registrations->third_num = $request->third_num;
        $betting_ticket_registrations->amount = $request->amount;

        $betting_ticket_registrations->save();

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

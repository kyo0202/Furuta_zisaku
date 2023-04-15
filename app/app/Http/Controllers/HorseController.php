<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Betting_ticket_registration; 
use App\Race_detail;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreateDate;

class HorseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('horse.index', [
            'users' => $users,
        ]);
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
        $race_details = Race_detail::orderBy('id', 'desc')->get();
        $users= User::find(Auth::id());
        // $race_details = Race_detail::select('place','race_name')->get();
        return view('horse.create', [
            'race_details' => $race_details,
            'b' => $b, 
            'idevtifications' => $idevtifications,
            'users' => $users,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateDate $request)
    {

        $betting_ticket_registrations = new Betting_ticket_registration;
        $betting_ticket_registrations->race_details_id = $request->race_details_id;
        $betting_ticket_registrations->idevtification = $request->idevtification;
        $betting_ticket_registrations->first_num = $request->first_num ;
        $betting_ticket_registrations->second_num = $request->second_num;
        $betting_ticket_registrations->third_num = $request->third_num;
        $betting_ticket_registrations->amount = $request->amount;
        $betting_ticket_registrations->user_id = Auth::id();
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
        $val = Race_detail::findOrFail($id);
        $betting_ticket_registration = Betting_ticket_registration::where('race_details_id',$id)->first();
        return view('horse.show',[
            'betting_ticket_registration'=> $betting_ticket_registration,
            'val' => $val
       ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        for ($a = 1; $a < 19; $a++) {
            $b[] = $a;
        };
        $idevtification = [];
        $idevtification = ['単勝', '複勝', '馬連', '馬単', 'ワイド', '三連複', '三連複',];
        $betting_ticket_registration = Betting_ticket_registration::find($id);
        $race_detail=Race_detail::find($betting_ticket_registration->race_details_id);
        return view('horse.edit', [
            'b' => $b,
            'betting_ticket_registration' => $betting_ticket_registration,
            'race_detail' =>  $race_detail,
            'idevtifications' =>  $idevtification,
            'id'=> $betting_ticket_registration->race_details_id,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateDate  $request, $id)
    {
        $betting_ticket_registrations = Betting_ticket_registration::find($id);
        $betting_ticket_registrations->race_details_id = $request->race_details_id;
        $betting_ticket_registrations->idevtification = $request->idevtification;
        $betting_ticket_registrations->first_num = $request->first_num;
        $betting_ticket_registrations->second_num = $request->second_num;
        $betting_ticket_registrations->third_num = $request->third_num;
        $betting_ticket_registrations->amount = $request->amount;
        $betting_ticket_registrations->user_id = Auth::id();
        $betting_ticket_registrations->save();

        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $post = Betting_ticket_registration::find($id);
        $post->delete();
        return redirect('/');
    }

}

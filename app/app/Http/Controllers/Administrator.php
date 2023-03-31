<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Result_registration;
use App\Race_result;


class Administrator extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('administrator.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        for ($a = 1; $a < 19; $a++) {
            $b[] = $a;
        };
        return view('administrator.create1', [
            'b' => $b
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

        return redirect('administrator.create2');

        $wide1= $request->wide1;
        $wide2 = $request->wide2;
        $wide3 = $request->wide3;
        
        $wide=[];
        $wide = "[$wide1, $wide2, $wide3]";

        $multiple_wins1 = $request->multiple_wins1;
        $multiple_wins2 = $request->multiple_wins2;
        $multiple_wins3 = $request->multiple_wins3;

        $multiple_wins = [];
        $multiple_wins = "[$multiple_wins1, $multiple_wins2, $multiple_wins3]";

        $race_results =new Race_result;
        $race_results->first_place = $request->first_place;
        $race_results->second_place = $request->second_place;
        $race_results->third_place = $request->third_place;
        $race_results->win = $request->win;
        $race_results->baren	= $request->baren;
        $race_results->horse_single= $request->horse_single;
        $race_results->triplets = $request->triplets;
        $race_results->trio = $request->trio;

        $race_results->wide = $wide;
        $race_results->multiple_wins= $multiple_wins;

        $race_results->save();

    
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Administrator  $administrator
     * @return \Illuminate\Http\Response
     */
    public function show(Administrator $administrator)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Administrator  $administrator
     * @return \Illuminate\Http\Response
     */
    public function edit(Administrator $administrator)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Administrator  $administrator
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Administrator $administrator)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Administrator  $administrator
     * @return \Illuminate\Http\Response
     */
    public function destroy(Administrator $administrator)
    {
        //
    }

}

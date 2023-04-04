<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Race_detail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function rececreate(Request $request)
    {
        $race_details = new Race_detail;
        $race_details->date = $request->date;
        $race_details->place = $request->place;
        $race_details->race_name = $request->race_name;
        
        $race_details->save();

        $race_details = Race_detail::orderBy('id', 'desc')->take(1)->get();
        
        for ($a = 1; $a < 19; $a++) {
            $b[] = $a;
        };
        return view('administrator.create2', [
            'b' => $b,
            'race_details'=> $race_details
        ]);
          
        
    }

}

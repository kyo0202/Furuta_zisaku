<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Race_detail;

use App\Betting_ticket_registration;

use App\Auth;

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
    public function index(Request $request)
    {
        $betting_ticket_registrations = new Betting_ticket_registration;
        // $betting_ticket_registrations = $betting_ticket_registrations->get();
        $betting_ticket_registrations = $betting_ticket_registrations
        ->join('race_details', 'betting_ticket_registrations.race_details_id', 'race_details.id' )->get();

        // $user_id = Auth::id();
        $from = $request->input('from');
        $until = $request->input('until');

        // // sum()でamountの合計を足す。
        // foreach($betting_ticket_registrations as $val){

            $total_b=Betting_ticket_registration::selectRaw('sum(amount)as total_b' )->first();
        $string = $total_b;
        $num = preg_replace('/[^0-9]/', '', $string);

// dd($total_b);
        // 日付検索
        if (isset($from) && isset($until)) {

            $betting_ticket_registrations = $betting_ticket_registrations->whereBetween("date", [$from, $until])->join('race_details', 'betting_ticket_registrations.race_details_id', 'race_details.id')->get();
        }
        return view('home', [
            'betting_ticket_registrations' => $betting_ticket_registrations,
            'from' => $from,
            'until' => $until,
            'num' => $num,
        ]);

        return view('/', compact('from', 'until',));
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
            'race_details'=> $race_details,
        ]);
          
        
    }

}

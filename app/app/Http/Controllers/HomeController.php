<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Race_detail;

use App\User;

use Illuminate\Support\Facades\Auth;

use App\Betting_ticket_registration;

use App\Http\Requests\Validation;

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
        
        $image = User::find(Auth::id());
        $betting_ticket_registrations = new Betting_ticket_registration;
        // $betting_ticket_registrations = $betting_ticket_registrations->get();
        $betting_ticket_registrations = $betting_ticket_registrations
        ->join('race_details', 'betting_ticket_registrations.race_details_id', 'race_details.id' );

        // $user_id = Auth::id();
        $from = $request->input('from');
        $until = $request->input('until');
        //購入した馬券の計算
        $total_b=Betting_ticket_registration::selectRaw('sum(amount)as total_b' )->first();
        $string = $total_b;
        $num = preg_replace('/[^0-9]/', '', $string);

        //払い戻し計算
        // $total_r = Race_results::selectRaw('pow(amount)as total_b')->first();

        //回収率計算


        // 日付検索
        if (isset($from) && isset($until)) {
            $betting_ticket_registrations = $betting_ticket_registrations->whereBetween("date", [$from, $until]);
        }
        $keyword = $request->input('keyword');
        if($keyword){
            // dd($keyword);
            // 全角スペースを半角に変換
            $spaceConversion = mb_convert_kana($keyword, 's');

            // 単語を半角スペースで区切り、配列にする
            $wordArraySearched = preg_split('/[\s,]+/', $spaceConversion, -1, PREG_SPLIT_NO_EMPTY);

        if (!empty($keyword)) {
                // 単語をループで回し、ユーザーネームと部分一致するものがあれば、$queryとして保持される
            foreach ($wordArraySearched as $value) {
            $betting_ticket_registrations = $betting_ticket_registrations
            ->where('idevtification', 'LIKE', "%{$value}%")
            ->orWhere('place', 'LIKE', "%{$value}%");
                }
        }
    }
        $betting_ticket_registrations = $betting_ticket_registrations->where('user_id',Auth::id())->get();

        return view('home', [
            'betting_ticket_registrations' => $betting_ticket_registrations,
            'from' => $from,
            'until' => $until,
            'num' => $num, 
            'image' => $image,
            'keyword' =>$keyword,
        ]);

    }

    public function rececreate(Validation $request)
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
 
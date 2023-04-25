<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Race_detail;

use App\User;

use App\Race_result;

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
        $betting_ticket_registrations = $betting_ticket_registrations
            ->select('date','place', 'race_details_id','idevtification','betting_ticket_registrations.id')->join('race_details', 'betting_ticket_registrations.race_details_id', 'race_details.id');

        // $user_id = Auth::id();
        $from = $request->input('from');
        $until = $request->input('until');
        //購入した馬券の計算
        $total_b = Betting_ticket_registration::selectRaw('sum(amount)as total_b')->where('user_id', Auth::id())->first();
        $string = $total_b;
        $num = preg_replace('/[^0-9]/', '', $string);

        // $race_detail_id = Betting_ticket_registration::where('user_id', Auth::id())->select('race_details_id')->first();
      
        // $r_details_id = Race_detail::find($race_detail_id->race_details_id);
        // $race_results[] = Race_result::find($r_details_id->race_result_id);

        // $haraimodosi = 0;

        
        // foreach($race_results as $race_result){
        //     if ($race_detail_id->idevtification == '単勝') {
        //         if ($race_detail_id->first_num == $race_result->first_place) {
        //             $win = $race_result->win;
        //             $amount = $race_detail_id->amount;
        //             $haraimodosi = $win * $amount;
        //         }
        //     } elseif ($race_detail_id->idevtification == '複勝') {
        //         if ($race_detail_id->first_num == $race_result->first_place) {
        //             $multiple_wins = $race_result->multiple_wins;
        //             $amount = $race_detail_id->amount;
        //             $haraimodosi = $multiple_wins * $amount;
        //         }
        //     } elseif ($race_detail_id->idevtification == 'ワイド') {
        //         if ($race_detail_id->first_num == $race_result->first_place) {
        //             $multiple_wins = $race_result->multiple_wins;
        //             $amount = $race_detail_id->amount;
        //             $haraimodosi = $multiple_wins * $amount;
        //         }
        //     } elseif ($race_detail_id->idevtification == '馬連') {
        //         if (
        //             $race_detail_id->first_num == $race_result->first_place &&
        //             $race_detail_id->second_num == $race_result->second_place
        //         ) {
        //             $baren = $race_result->baren;
        //             $amount = $race_detail_id->amount;
        //             $haraimodosi = $baren * $amount;
        //         }
        //     } elseif ($race_detail_id->idevtification == '馬単') {
        //         if (
        //             $race_detail_id->first_num == $race_result->first_place &&
        //             $race_detail_id->second_num == $race_result->second_place
        //         ) {
        //             $horse_single = $race_result->horse_single;
        //             $amount = $race_detail_id->amount;
        //             $haraimodosi = $horse_single * $amount;
        //         }
        //     } elseif ($race_detail_id->idevtification == '三連複') {
        //         if (
        //             $race_detail_id->first_num == $race_result->first_place &&
        //             $race_detail_id->second_num == $race_result->second_place &&
        //             $race_detail_id->third_num == $race_result->third_place
        //         ) {
        //             $triplets = $race_result->triplets;
        //             $amount = $race_detail_id->amount;
        //             $haraimodosi = $triplets * $amount;
        //         }
        //     } elseif ($race_detail_id->idevtification == '三連単') {
        //         if (
        //             $race_detail_id->first_num == $race_result->first_place &&
        //             $race_detail_id->second_num == $race_result->second_place &&
        //             $race_detail_id->third_num == $race_result->third_place
        //         ) {
        //             $trio = $race_result->triplets;
        //             $amount = $race_detail_id->amount;
        //             $haraimodosi = $trio * $amount;
        //         }
        //     } else {
        //         $haraimodosi = 0;
        //     }
        // }
        // //収支計算
        // $syushi=$haraimodosi -$num;

        // //回収率計算
        // $recovery_rate= $haraimodosi/$num*100;

        // 日付検索
        if (isset($from) && isset($until)) {
            $betting_ticket_registrations = $betting_ticket_registrations->whereBetween("date", [$from, $until]);
        }
        $keyword = $request->input('keyword');
        if ($keyword) {
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
        $betting_ticket_registrations = $betting_ticket_registrations->where('user_id', Auth::id())->get();
        return view('home', [
            'betting_ticket_registrations' => $betting_ticket_registrations,
            'from' => $from,
            'until' => $until,
            'num' => $num,
            'image' => $image,
            'keyword' => $keyword,
            // 'haraimodosi' => $haraimodosi,
            // 'shyushi' => $syushi,
            // 'recovery_rate' =>$recovery_rate,
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
            'race_details' => $race_details,
        ]);
    }
}


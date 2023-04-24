<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Betting_ticket_registration; 
use App\Race_detail;
use App\Race_result;
use App\User;
use App\Like;
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
        $review=new User;
        $users = User::all();
        $recovery_rate = Betting_ticket_registration::orderBy('recovery_rate', 'desc')->first();
        return view('horse.index', [
            'users' => $users,
            'item' => $users,
            'review' => $review,
            'recovery_rate' =>$recovery_rate,
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
        $race_details_id = Betting_ticket_registration::where('user_id', Auth::id())->where('race_details_id', $id)->first();
        $r_details_id = Race_detail::find($race_details_id->race_details_id);
        $race_result = Race_result::find($r_details_id->race_result_id);
        $haraimodosi = 0;
        if ($race_details_id->idevtification == '単勝') {
            if ($race_details_id->first_num == $race_result->first_place) {
                $win = $race_result->win;
                $amount = $race_details_id->amount;
                $haraimodosi = $win * $amount;
            }
        } elseif ($race_details_id->idevtification == '複勝') {
            if ($race_details_id->first_num == $race_result->first_place) {
                $multiple_wins = $race_result->multiple_wins;
                $amount = $race_details_id->amount;
                $haraimodosi = $multiple_wins * $amount;
            }
        } elseif ($race_details_id->idevtification == 'ワイド') {
            if ($race_details_id->first_num == $race_result->first_place) {
                $multiple_wins = $race_result->multiple_wins;
                $amount = $race_details_id->amount;
                $haraimodosi = $multiple_wins * $amount;
            }
        } elseif ($race_details_id->idevtification == '馬連') {
            if (
                $race_details_id->first_num == $race_result->first_place &&
                $race_details_id->second_num == $race_result->second_place
            ) {
                $baren = $race_result->baren;
                $amount = $race_details_id->amount;
                $haraimodosi = $baren * $amount;
            }
        } elseif ($race_details_id->idevtification == '馬単') {
            if (
                $race_details_id->first_num == $race_result->first_place &&
                $race_details_id->second_num == $race_result->second_place
            ) {
                $horse_single = $race_result->horse_single;
                $amount = $race_details_id->amount;
                $haraimodosi = $horse_single * $amount;
            }
        } elseif ($race_details_id->idevtification == '三連複') {
            if (
                $race_details_id->first_num == $race_result->first_place &&
                $race_details_id->second_num == $race_result->second_place &&
                $race_details_id->third_num == $race_result->third_place
            ) {
                $triplets = $race_result->triplets;
                $amount = $race_details_id->amount;
                $haraimodosi = $triplets * $amount;
            }
        } elseif ($race_details_id->idevtification == '三連単') {
            if (
                $race_details_id->first_num == $race_result->first_place &&
                $race_details_id->second_num == $race_result->second_place &&
                $race_details_id->third_num == $race_result->third_place
            ) {
                $trio = $race_result->triplets;
                $amount = $race_details_id->amount;
                $haraimodosi = $trio * $amount;
            }
        } else {
            $haraimodosi = 0;
        }
        return view('horse.show',[
            'betting_ticket_registration'=> $betting_ticket_registration,
            'val' => $val,
            'haraimodosi' => $haraimodosi,
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
    public function like(Request $request){
        $user_id = Auth::user()->id; //1.ログインユーザーのid取得
        $user_liked_id = $request->user_liked_id; //2.投稿idの取得
        $already_liked = Like::where('user_id', $user_id)->where('user_liked_id', $user_liked_id)->first(); //3.

        if (!$already_liked) { //もしこのユーザーがこの投稿にまだいいねしてなかったら
            $like = new Like; //4.Likeクラスのインスタンスを作成
            $like->user_liked_id = $user_liked_id; //Likeインスタンスにuser_liked_id,user_idをセット
            $like->user_id = $user_id;
            $like->save();
        } else { //もしこのユーザーがこの投稿に既にいいねしてたらdelete
            Like::where('user_liked_id', $user_liked_id)->where('user_id', $user_id)->delete();
        }
        return response()->json(); //6.JSONデータをjQueryに返す
}

}
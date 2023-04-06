<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Race_result;
use App\Race_detail;
use App\User;

class Administrator extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('administrator.index', ['users' => $users]);
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
        $wide1= $request->wide1;
        $wide2 = $request->wide2;
        $wide3 = $request->wide3;
        
        $wide=[];
        $wide = "$wide1, $wide2, $wide3";

        $multiple_wins1 = $request->multiple_wins1;
        $multiple_wins2 = $request->multiple_wins2;
        $multiple_wins3 = $request->multiple_wins3;

        $multiple_wins = [];
        $multiple_wins = "$multiple_wins1, $multiple_wins2, $multiple_wins3";

        $race_results =new Race_result;
        $race_results->first_place = $request->first_place;
        $race_results->second_place = $request->second_place;
        $race_results->third_place = $request->third_place;
        $race_results->win = $request->win;
        $race_results->baren = $request->baren;
        $race_results->horse_single= $request->horse_single;
        $race_results->triplets = $request->triplets;
        $race_results->trio = $request->trio;

        $race_results->wide = $wide;
        $race_results->multiple_wins= $multiple_wins;

        $race_results->race_details_id =$request->race_detail_id;

        $race_results->save();

        $race_result_id = Race_result::orderBy('id', 'desc')->first();
        $race_detail = Race_detail::orderBy('id', 'desc')->first();
        $race_detail->race_result_id = $race_result_id->id;
        $race_detail->save();

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
    public function edit(int $id)
     {
        for ($a = 1; $a < 19; $a++) {
            $b[] = $a;
        };
            $val = Race_result::findOrFail($id);
            $a=$val->wide;
            $d= $val->multiple_wins;
            $wide = explode(",", $a);
            $multiple_wins = explode(",", $d);
                return view('administrator.edit', [
            'b' => $b,
            'multiple_wins'=>$multiple_wins,
            'wide'=>$wide,
            'val'=> $val
        ]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Administrator  $administrator
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        {
            $wide1 = $request->wide1;
            $wide2 = $request->wide2;
            $wide3 = $request->wide3;

            $wide = "$wide1, $wide2, $wide3";

            $multiple_wins1 = $request->multiple_wins1;
            $multiple_wins2 = $request->multiple_wins2;
            $multiple_wins3 = $request->multiple_wins3;

            $multiple_wins = "$multiple_wins1, $multiple_wins2, $multiple_wins3";
            
            // 同じIDの投稿を探して、上書き保存 できたら今後修正し実装
            // $post = Race_detail::where('race_result_id',$id)->get();
            // $post->date = $request->date;
            // $post->place = $request->place;
            // $post->race_name= $request->race_name;

            $post2 = Race_result::findOrFail($id);
            $post2->win = $request->win;
            $post2->multiple_wins =$multiple_wins;
            $post2->horse_single = $request->horse_single;
            $post2->baren = $request->baren;
            $post2->wide= $wide;

            $post2->triplets = $request->triplets;
            $post2->trio= $request->trio;
            $post2->save();

            return redirect('/index2');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Administrator  $administrator
     * @return \Illuminate\Http\Response
     */
    //ユーザー一覧後で　デストロイはアップデートと同じように別のブレードを経由してから
    public function destroy(int $id)
    {
        $post = Race_result::find($id);
        $post->delete();
        return redirect(route('index2'));
    }

    public function index2()
    {
        # race_resultsテーブルのレコードを全件取得
        $list = Race_result::orderBy('created_at', 'desc')->get();
        # data連想配列に代入&Viewファイルをindex2.blade.phpに指定
        return view('index2', ['list' => $list]);
    }

    public function index3(int $id)
    {
        for ($a = 1; $a < 19; $a++) {
            $b[] = $a;
        };
        $val = Race_result::findOrFail($id);
        $a = $val->wide;
        $d = $val->multiple_wins;
        $wide = explode(",", $a);
        $multiple_wins = explode(",", $d);
        return view('administrator.index3', [
            'b' => $b,
            'multiple_wins' => $multiple_wins,
            'wide' => $wide,
            'val' => $val
        ]);
    }
    
}

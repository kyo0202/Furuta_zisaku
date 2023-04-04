<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Race_result;
use App\Race_detail;

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
            
            // 同じIDの投稿を探して、上書き保存
            $post = Race_detail::findOrFail($id);
            $post->date = $request->date;
            $post->place = $request->place;
            $post->race_name= $request->race_name;

            $post = Race_result::findOrFail($id);
            $post->win = $request->win;
            $post->multiple_wins[0] = $request->multiple_wins[0];
            $post->multiple_wins[1] = $request->multiple_wins[1];
            $post->multiple_wins[2] = $request->multiple_wins[2];
            $post->horse_single = $request->horse_single;
            $post->baren = $request->baren;
            $post->wide[0]= $request->wide[0];
            $post->wide[1] = $request->wide[1];
            $post->wide[2] = $request->wide[2];
            $post->triplets = $request->triplets;
            $post->trio= $request->trio;
            $post->save();

            $wide = [];
            $wide = "$wide1, $wide2, $wide3";

            $multiple_wins1 = $request->multiple_wins1;
            $multiple_wins2 = $request->multiple_wins2;
            $multiple_wins3 = $request->multiple_wins3;

            $multiple_wins = [];
            $multiple_wins = "$multiple_wins1, $multiple_wins2, $multiple_wins3";

            $race_results = new Race_result;
            $race_results->first_place = $request->first_place;
            $race_results->second_place = $request->second_place;
            $race_results->third_place = $request->third_place;
            $race_results->win = $request->win;
            $race_results->baren = $request->baren;
            $race_results->horse_single = $request->horse_single;
            $race_results->triplets = $request->triplets;
            $race_results->trio = $request->trio;

            $race_results->wide = $wide;
            $race_results->multiple_wins = $multiple_wins;

            $race_results->save();

            return redirect() ->route('/index2');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Administrator  $administrator
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        for ($a = 1; $a < 19; $a++) {
            $b[] = $a;
        };
        $val = Race_result::findOrFail($id);
        $a = $val->wide;
        $d = $val->multiple_wins;
        $wide = explode(",", $a);
        $multiple_wins = explode(",", $d);
        return view('administrator.destroy', [
            'b' => $b,
            'multiple_wins' => $multiple_wins,
            'wide' => $wide,
            'val' => $val
        ]);
    }

    public function index2()
    {
        # race_resultsテーブルのレコードを全件取得
        $list = Race_result::orderBy('created_at', 'desc')->get();
        # data連想配列に代入&Viewファイルをindex2.blade.phpに指定
        return view('index2', ['list' => $list]);
    }
        
}

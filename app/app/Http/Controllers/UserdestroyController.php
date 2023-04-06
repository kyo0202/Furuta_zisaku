<?php

namespace App\Http\Controllers;

use App\Userdestroy;
use Illuminate\Http\Request;
use App\User;

class UserdestroyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('userdestroy.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Userdestroy  $userdestroy
     * @return \Illuminate\Http\Response
     */
    public function show(Userdestroy $userdestroy)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Userdestroy  $userdestroy
     * @return \Illuminate\Http\Response
     */
    public function edit(Userdestroy $userdestroy)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Userdestroy  $userdestroy
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Userdestroy $userdestroy)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Userdestroy  $userdestroy
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $post = User::find($id);
        $post->delete();
        return redirect(route('userdestroy.index'));
    }

    public function destroyform(int $id)
    {
        $post = User::find($id);
        $post->delete();
        return redirect(route('userdestroy.index'));
    }
}

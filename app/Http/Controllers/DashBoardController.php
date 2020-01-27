<?php

namespace App\Http\Controllers;

use App\DashBoard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

class DashBoardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(Auth()->user()->type_id);
        if (Gate::denies('is-admin', Auth()->user())) {
            abort(403, "You don't have for this permission");
        }
        return view('dashboard');
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
     * @param  \App\DashBoard  $dashBoard
     * @return \Illuminate\Http\Response
     */
    public function show(DashBoard $dashBoard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DashBoard  $dashBoard
     * @return \Illuminate\Http\Response
     */
    public function edit(DashBoard $dashBoard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DashBoard  $dashBoard
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DashBoard $dashBoard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DashBoard  $dashBoard
     * @return \Illuminate\Http\Response
     */
    public function destroy(DashBoard $dashBoard)
    {
        //
    }
}

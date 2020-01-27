<?php

namespace App\Http\Controllers;

use App\models\Institute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class InstitutesController extends Controller
{
    public function __construct()
    {
        if (Gate::denies('is-admin', Auth()->user())) {
            abort(403, "You don't have for this permission");
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = Institute::select('id', 'name');
        if ($request['search'] <> null) {
            $data = $data->where('name', 'LIKE', '%' . $request['search'] . '%');
        }
        $data = $data->paginate(10);
        return view('institutes.index', ['data' => $data]);
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

        Institute::create($request->except('_token'));
        $request->session()->flash('status', 'Institute was successfully created!');
        return redirect('/institutes');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\models\Institute  $institute
     * @return \Illuminate\Http\Response
     */
    public function show(Institute $institute)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\models\Institute  $institute
     * @return \Illuminate\Http\Response
     */
    public function edit(Institute $institute)
    {
        return view('institutes.edit', ['data' => $institute]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\models\Institute  $institute
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Institute $institute)
    {
        $institute->update($request->except(['_token', '_method']));
        $request->session()->flash('status', 'Institute was successfully updated!');
        return redirect('/institutes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\models\Institute  $institute
     * @return \Illuminate\Http\Response
     */
    public function destroy(Institute $institute, Request $request)
    {
        $institute->delete();
        $request->session()->flash('status', 'Institute was successfully deleted!');
        return redirect('/institutes');
    }
}

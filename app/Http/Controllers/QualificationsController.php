<?php

namespace App\Http\Controllers;

use App\Models\Qualification;
use Illuminate\Http\Request;

class QualificationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = Qualification::select('id', 'name');
        if ($request['search'] <> null) {
            $data = $data->where('name', 'LIKE', '%' . $request['search'] . '%');
        }
        $data = $data->paginate(10);
        return view('qualifications.index', ['data' => $data]);
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
        Qualification::create($request->except('_token'));
        $request->session()->flash('status', 'Qualification was successfully created!');
        return redirect('/qualifications');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\modelsQualification  $modelsQualification
     * @return \Illuminate\Http\Response
     */
    public function show(modelsQualification $modelsQualification)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Qualification  $qualification
     * @return \Illuminate\Http\Response
     */
    public function edit(Qualification $qualification)
    {
        return view('qualifications.edit', ['data' => $qualification]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Qualification  $qualification
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Qualification $qualification)
    {
        $qualification->update($request->except(['_token', 'method']));
        $request->session()->flash('status', 'Qualification was successfully updated!');
        return redirect('/qualifications');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Qualification  $qualification
     * @return \Illuminate\Http\Response
     */
    public function destroy(Qualification $qualification, Request $request)
    {
        $qualification->delete();
        $request->session()->flash('status', 'Qualification was successfully deleted!');
        return redirect('/qualifications');
    }
}

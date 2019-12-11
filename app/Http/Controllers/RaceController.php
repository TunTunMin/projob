<?php

namespace App\Http\Controllers;

use App\Models\Race;
use Illuminate\Http\Request;

class RaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = Race::select('id','name');
        $search_term = $request->search_term;
        if ($search_term != null) {
            $data = $data->where('name','LIKE','%'.$search_term.'%');
        } 
        $data = $data->paginate(10);

        return view('race.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('race.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $data = new Race;
        $data->create($request->except('_token'));
        return redirect('/race')
        ->with('status','Your data are successfully stored');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Race  $race
     * @return \Illuminate\Http\Response
     */
    public function show(Race $race)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Race  $race
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Race::find($id);
        return view('race.edit', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Race  $race
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Race::find($id)->update(['name' => $request->name]);
        return redirect('/race')
        ->with('status','Your data are successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Race  $race
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Race::destroy($id);
        return redirect('/race')
                ->with('status','Your data are successfully deleted');
    }
}

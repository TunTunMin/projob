<?php

namespace App\Http\Controllers;

use App\Models\Nationality;
use Illuminate\Http\Request;

class NationalityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = Nationality::select('id','name');
        $search_term = $request->search_term;
        if ($search_term != null) {
            $data = $data->where('name','LIKE','%'.$search_term.'%');
        } 
        $data = $data->paginate(10);
        return view('nationality.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('nationality.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Nationality;
        $data->create($request->except('_token'));
        return redirect('/nationality')
        ->with('status','Your data are successfully stored');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Nationality  $nationality
     * @return \Illuminate\Http\Response
     */
    public function show(Nationality $nationality)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Nationality  $nationality
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Nationality::find($id);
        return view('nationality.edit',['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Nationality  $nationality
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Nationality::find($id)->update(['name' => $request->name]);
        return redirect('/nationality')
        ->with('status','Your data are successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Nationality  $nationality
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Nationality::destroy($id);
        return redirect('/nationality')
            ->with('status','Your data are successfully deleted');
    }
}

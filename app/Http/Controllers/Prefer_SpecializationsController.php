<?php

namespace App\Http\Controllers;

use App\models\Prefer_Specialization;
use Illuminate\Http\Request;
use SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Prefer_SpecializationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (Gate::denies('is-admin', Auth()->user())) {
            abort(403, "You don't have for this permission");
        }
        $data = Prefer_Specialization::select('id', 'name');
        if ($request['search'] <> null) {
            $data = $data->where('name', 'LIKE', '%' . $request['search'] . '%');
        }
        $data = $data->paginate(10);
        return view('prefer_specializations.index', ['data' => $data]);
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
        Prefer_Specialization::create($request->except('_token'));
        $request->session()->flash('status', 'Prefer Specialization was successfully created!');
        return redirect('/prefer_specializations');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\models\Prefer_Specialization  $prefer_Specialization
     * @return \Illuminate\Http\Response
     */
    public function show(Prefer_Specialization $prefer_Specialization)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\models\Prefer_Specialization  $prefer_Specialization
     * @return \Illuminate\Http\Response
     */
    public function edit(Prefer_Specialization $prefer_Specialization, $id)
    {
        return view('prefer_specializations.edit', ['data' => Prefer_Specialization::findorFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\models\Prefer_Specialization  $prefer_Specialization
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Prefer_Specialization::find($id)->update($request->except(['_token', '_method']));
        $request->session()->flash('status', 'Prefer Specialization was successfully updated!');
        return redirect('/prefer_specializations');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\models\Prefer_Specialization  $prefer_Specialization
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        Prefer_Specialization::find($id)->delete();
        $request->session()->flash('status', 'Prefer Specialization was successfully deleted!');
        return redirect('/prefer_specializations');
    }
}

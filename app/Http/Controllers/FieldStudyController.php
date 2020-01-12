<?php

namespace App\Http\Controllers;

use App\Models\FieldStudy;
use Illuminate\Http\Request;
use DataTables;

class FieldStudyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $data = FieldStudy::select('id', 'name');
        if ($request['search'] <> null) {
            $data = $data->where('name', 'LIKE', '%' . $request['search'] . '%');
        }
        $data = $data->paginate(10);
        return view('field_studies.index', ['data' => $data]);
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
        FieldStudy::create($request->except('_token'));
        $request->session()->flash('status', 'Field of Study was created!');
        return redirect('/fieldstudies');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FieldStudy  $fieldStudy
     * @return \Illuminate\Http\Response
     */
    public function show(FieldStudy $fieldStudy)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FieldStudy  $fieldStudy
     * @return \Illuminate\Http\Response
     */
    public function edit(FieldStudy $fieldStudy, $id)
    {
        return view('field_studies.edit', ['data' => FieldStudy::findorFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FieldStudy  $fieldStudy
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FieldStudy $fieldStudy, $id)
    {

        FieldStudy::find($id)->update($request->except(['_token', '_method']));
        $request->session()->flash('status', 'Field of Study was updated!');
        return redirect('fieldstudies');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FieldStudy  $fieldStudy
     * @return \Illuminate\Http\Response
     */
    public function destroy(FieldStudy $fieldStudy, $id, Request $request)
    {
        FieldStudy::find($id)->delete();
        $request->session()->flash('status', 'Field of Study was deleted!');
        return redirect('fieldstudies');
    }
}

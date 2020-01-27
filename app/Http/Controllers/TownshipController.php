<?php

namespace App\Http\Controllers;

use App\Models\Township;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class TownshipController extends Controller
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
        $data = Township::select('id', 'name');
        $search_term = $request->search_term;
        if ($search_term != null) {
            $data = $data->where('name', 'LIKE', '%' . $search_term . '%');
        }
        $data = $data->paginate(10);
        return view('township.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('township.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Township;
        $data->create($request->except('_token'));
        return redirect('/township')
            ->with('status', 'Your data are successfully stored');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Township  $township
     * @return \Illuminate\Http\Response
     */
    public function show(Township $township)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Township  $township
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Township::find($id);
        return view('township.edit', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Township  $township
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Township::find($id)->update(['name' => $request->name]);
        return redirect('/township')
            ->with('status', 'Your data are successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Township  $township
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Township $township)
    {
        if (count($township->address()->get()) < 1) {
            $township->address()->delete();
            $township->delete();
            $status = "Your data are successfully deleted";
        } else {
            $status = "Don't delete this item because it has child elements";
        }
        return redirect('/township')
            ->with('status', $status);
    }
}

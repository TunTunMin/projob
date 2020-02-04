<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Township;
use App\Models\Street;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    public function __construct()
    { }
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
        $data = Address::join('townships', 'townships.id', 'addresses.township_id')->select('addresses.id', 'township_id', 'street_id', 'townships.name');
        $search_term = $request->search_term;
        if ($search_term != null) {
            $data = $data->where('townships.name', 'LIKE', '%' . $search_term . '%');
        }
        $data = $data->paginate(10);
        $townships = Township::all();
        $streets = Street::all();
        return view('address.index')
            ->with('data', $data)
            ->with('townships', $townships)
            ->with('streets', $streets);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $townships = Township::all();
        $streets = Street::all();
        // dd($streets);
        return view("address.create", ['townships' => $townships, 'streets' => $streets]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Address::create($request->except('_token'));
        return redirect('/address')
            ->with('status', 'Your data are successfully stored');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function show(Address $address)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $townships = Township::all();
        $streets = Street::all();
        $addresses = Address::find($id);
        // dd($townships);
        return view('address.edit', ['township' => $townships, 'address' => $addresses, 'street' => $streets]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Address::find($id)->update(['township_id' => $request->township_id, 'street_id' => $request->street_id]);
        return redirect('/address')
            ->with('status', 'Your data are successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Address::destroy($id);
        return redirect('/address')
            ->with('status', 'Your data are successfully deleted');
    }
}

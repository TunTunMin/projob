<?php

namespace App\Http\Controllers;

use App\Models\Street;
use Illuminate\Http\Request;

class StreetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = Street::select('id','name');
        $search_term = $request->search_term;
        if ($search_term != null) {
            $data = $data->where('name','LIKE','%'.$search_term.'%');
        } 
        $data = $data->paginate(10);
        return view('street.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('street.create');
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
        $data = new Street;
        $data->create($request->except('_token'));
        return redirect('/street');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Street  $street
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Street  $street
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Street::find($id);
        return view('street.edit',['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Street  $street
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        Street::find($id)->update(['name' => $request->name]);
        return redirect('/street');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Street  $street
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Street::destroy($id);
        return redirect('/street');    
    }

    public function search(Request $request) 
        {
            $searchTerm = $request->input('searchTerm');
            $posts = Post::all()
            ->search($searchTerm);
            return view('posts.index', compact('posts', 'searchTerm'));
        }

       public function show($id)
       {
           $post = Post::find($id);
           return view('posts.show', compact('post'));
       }
 
}

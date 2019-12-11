<?php

namespace App\Http\Controllers;

use App\Models\JobSpecification;
use Illuminate\Http\Request;

class JobSpecificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = JobSpecification::select('id','name','link');
        $search_name = $request['search_name'];
        if($search_name <> null){
            $data = $data->where('name','LIKE','%'.$search_name.'%');
        }
        $data = $data->paginate(10);
        return view('job_specification.index')->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('job_specification.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->);
        JobSpecification::create($request->except('_token'));
        return redirect('job_specification')
        ->with('status','Your data are successfully stored');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JobSpecification  $jobSpecification
     * @return \Illuminate\Http\Response
     */
    public function show(JobSpecification $jobSpecification)
    {
         return view('job_specification.show')->with('JobSpecification',$jobSpecification);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JobSpecification  $jobSpecification
     * @return \Illuminate\Http\Response
     */
    public function edit(JobSpecification $jobSpecification)
    {
        return view('job_specification.edit')->with('JobSpecification',$jobSpecification);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\JobSpecification  $jobSpecification
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JobSpecification $jobSpecification)
    {
        $jobSpecification->update($request->except(['_token', '_method']));
       return redirect('/job_specification')
       ->with('status','Your data are successfully updated');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JobSpecification  $jobSpecification
     * @return \Illuminate\Http\Response
     */
    public function destroy(JobSpecification $jobSpecification)
    {
         $jobSpecification->delete();
       return redirect('/job_specification')
       ->with('status','Your data are successfully deleted');
    
    }
}

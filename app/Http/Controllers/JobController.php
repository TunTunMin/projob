<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\JobType;
use App\Models\Specialization;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search_name = $request['search_name'];
        $jobs = Job::select('*');
        if ($search_name <> null) {
            $jobs = $jobs->where('title', 'LIKE', '%' . $search_name . '%');
        }
        $jobs = $jobs->paginate(10);
        return view('job.index')->with('data', $jobs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::all();
        $job_types = JobType::all();
        $specializations = Specialization::all();
        return view('job.create')
            ->with('companies', $companies)
            ->with('job_types', $job_types)
            ->with('specializations', $specializations);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request['post_date'] = date('Y-m-d H:i:s', strtotime($request['post_date']));
        Job::create($request->except(['_token', 'files']));
        return redirect('/job')
            ->with('status', 'Your data are successfully stored');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function show(Job $job)
    {
        return view('job.show')->with('job', $job);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function edit(Job $job)
    {
        $companies = Company::all();
        $job_types = JobType::all();
        $job_specifications = JobSpecification::all();
        return view('job.edit')
            ->with('job', $job)
            ->with('companies', $companies)
            ->with('job_types', $job_types)
            ->with('job_specifications', $job_specifications);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Job $job)
    {

        $request['post_date'] = date('Y-m-d H:i:s', strtotime($request['post_date']));
        $job->update($request->except(['_token', '_method']));
        return redirect('/job')
            ->with('status', 'Your data are successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function destroy(Job $job)
    {
        $job->delete();
        return redirect('/job')
            ->with('status', 'Your data are successfully deleted');
    }
}

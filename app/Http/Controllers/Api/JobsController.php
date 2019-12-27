<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\JobCollection;
use App\Models\Job;

class JobsController extends Controller
{
    /** JobCount and API  */
    public function JobCount()
    {
        $jobcounts['jobcount'] = Job::count();
        if ($jobcounts['jobcount'] == 0) {
            $jobcounts['status'] = false;
        } else {
            $jobcounts['status'] = true;
        }
        return response()->json($jobcounts);
    }
    // all jobs
    public static function AllJobs($request)
    {
        $jobs = Job::select('*');
        if (isset($request->title)) {
            $jobs = $jobs->where('title', 'LIKE', '%' . $request->title . '%');
        }
        if (isset($request->job_specification)) {
            $jobs = $jobs->where('job_specification_id', $request->job_specification);
        }
        if (isset($request->salary_min)) {

            $jobs = $jobs->whereRaw('? between salary_from and salary_to', [$request->salary_min]);
        }

        $jobs = $jobs->with('getCompany')->paginate(20);
        return response()->json($jobs);
    }
}
